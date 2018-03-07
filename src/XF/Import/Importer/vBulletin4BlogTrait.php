<?php

namespace XF\Import\Importer;

use XF\Import\StepState;

trait vBulletin4BlogTrait
{
	/**
	 * Traits can't inherit from traits, so this is a complete copy of getSteps()
	 * from vBulletinBlogTrait::getSteps(), with the blogAttachmentsVB4 step added
	 * and phrases for the two blog attachment steps altered so they can be distinguished.
	 *
	 * @return array
	 */
	public function getSteps()
	{
		return parent::getSteps() + [
				'blogUsers' => [
					'title' => \XF::phrase('import_blogs'),
					'depends' => ['users']
				],
				'blogEntries' => [
					'title' => \XF::phrase('import_blog_entries'),
					'depends' => ['blogUsers']
				],
				'blogAttachments' => [
					'title' => \XF::phrase('import_blog_attachments_vb3'),
					'depends' => ['blogEntries'],
					'force' => ['blogAttachmentsVB4']
				],
				'blogAttachmentsVB4' => [
					'title' => \XF::phrase('import_blog_attachments_vb4'),
					'depends' => ['blogEntries'],
					'force' => ['blogAttachments']
				],
				'blogComments' => [
					'title' => \XF::phrase('import_blog_comments'),
					'depends' => ['blogEntries']
				],
				'blogTags' => [
					'title' => \XF::phrase('import_blog_tags'),
					'depends' => ['blogEntries']
				],
				'blogModerators' => [
					'title' => \XF::phrase('import_blog_moderators'),
					'depends' => ['blogUsers']
				]
			];
	}

	/**
	 * Ensure that we have a valid location for vB4 blog attachments
	 *
	 * @param array $config
	 * @param array $stepConfig
	 * @param array $errors
	 */
	protected function validateStepConfigBlogAttachmentsVB4(array &$config, array &$stepConfig, array &$errors)
	{
		// blog attachments as files - vB4-style
		if (!empty($this->baseConfig['attachpath']))
		{
			if (!empty($config['path']))
			{
				$path = realpath(trim($config['path']));

				if (!file_exists($path) || !is_dir($path))
				{
					$errors[] = \XF::phrase('directory_specified_as_x_y_not_found_is_not_readable', [
						'type' => 'attachpath',
						'dir'  => $config['path']
					]);
				}

				$config['path'] = $path;
			}
			else
			{
				// we have no path, this will cause the step to skip
				$config['skip'] = true;
			}
		}
	}

	// ########################### STEP: BLOG ATTACHMENTS (vB4-style) ###############################

	public function getStepEndBlogAttachmentsVB4()
	{
		return $this->sourceDb->fetchOne($this->prepareImportSql($this->prefix, "
			SELECT MAX(filedataid)
			FROM attachment
			WHERE contenttypeid = ?
		"), [$this->getContentTypeId('BlogEntry')]);
	}

	public function stepBlogAttachmentsVB4(StepState $state, array $stepConfig, $maxTime, $limit = 500)
	{
		if (isset($stepConfig['skip']))
		{
			return $state->complete();
		}

		//$stepConfig['path'] = '/var/www/public/vb/41x/attachments';

		$timer = new \XF\Timer($maxTime);

		$attachments = $this->_getAttachments($state->startAfter, $state->end, $limit, $this->getContentTypeId('BlogEntry'));

		if (!$attachments)
		{
			return $state->complete();
		}

		$attachments = $this->getBlogAttachmentsVB4GroupedByFile($attachments);

		if (!$attachments)
		{
			return $state->complete();
		}

		foreach ($attachments AS $fileDataId => $attachmentsForFile)
		{
			$state->startAfter = $fileDataId;

			foreach ($attachmentsForFile AS $attachment)
			{
				if (!$newBlogTextId = $this->lookupId('blog_text', $attachment['blogtextid']))
				{
					continue;
				}

				if (!empty($stepConfig['path']))
				{
					// get the original attachment file
					$attachTempFile = $this->getAttachmentFilePath($stepConfig['path'], $attachment);

					if (!file_exists($attachTempFile))
					{
						continue;
					}
				}
				else
				{
					if (!$fileData = $this->getAttachmentFileData($fileDataId))
					{
						continue;
					}

					$attachTempFile = \XF\Util\File::getTempFile();
					\XF\Util\File::writeFile($attachTempFile, $fileData);
				}

				/** @var \XF\Import\Data\Attachment $import */
				$import = $this->newHandler('XF:Attachment');
				$import->preventRetainIds();

				$import->bulkSet([
					'content_type' => 'post',
					'content_id'   => $newBlogTextId,
					'attach_date'  => $attachment['dateline'],
					'view_count'   => $attachment['counter'],
					'unassociated' => false
				]);

				$import->setDataUserId($this->lookupId('user', $attachment['userid']));
				$import->setSourceFile($attachTempFile, $attachment['filename']);
				$import->setContainerCallback([$this, 'rewriteEmbeddedAttachments']);

				if ($newId = $import->save($attachment['attachmentid']))
				{
					$state->imported++;
				}
			}

			if ($timer->limitExceeded())
			{
				break;
			}
		}

		\XF\Util\File::cleanUpTempFiles();

		return $state->resumeIfNeeded();
	}

	protected function getBlogAttachmentsVB4($startAfter, $end, $limit)
	{
		/*
		 * For vB4, this actually only gets the filedata IDs with which we will be working,
		 * the meat of the task is performed by getAttachmentsGroupedByFile()
		 */

		return $this->sourceDb->fetchPairs($this->prepareImportSql($this->prefix, "
			SELECT filedata.filedataid, filedata.userid
			FROM filedata AS
				filedata
			INNER JOIN attachment AS
				attachment ON (attachment.filedataid = filedata.filedataid)
			WHERE filedata.filedataid > ? AND filedata.filedataid <= ?
			AND attachment.contenttypeid = ?
			ORDER BY filedata.filedataid
			LIMIT {$limit}
		"), [$startAfter, $end, $this->getContentTypeId('BlogEntry')]);
	}

	protected function getBlogAttachmentsVB4GroupedByFile(array $attachments)
	{
		$attachments = $this->getAttachmentsForFileDataIds(array_keys($attachments), 'blogtextid');

		$this->lookup('user', $this->pluck($attachments, ['userid', 'filedata_userid']));
		$this->lookup('blog_text', $this->pluck($attachments, 'blogtextid'));

		$grouped = [];

		foreach ($attachments AS $a)
		{
			$grouped[$a['filedataid']][$a['attachmentid']] = $a;
		}

		return $grouped;
	}

	// ########################### STEP: BLOG TAGS ###############################

	protected function getBlogTags($blogId)
	{
		return $this->sourceDb->fetchAll($this->prepareImportSql($this->prefix, "
			SELECT tagcontent.*, tag.tagtext
			FROM tagcontent AS
				tagcontent
			INNER JOIN tag AS
				tag ON (tag.tagid = tagcontent.tagid)
			WHERE tagcontent.contentid = ?
			AND tagcontent.contenttypeid = ?
		"), [$blogId, $this->getContentTypeId('BlogEntry')]);
	}
}