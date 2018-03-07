<?php

namespace XF\Import\Importer;

class vBulletin4 extends vBulletin
{
	public static function getListInfo()
	{
		return [
			'target' => 'XenForo',
			'source' => 'vBulletin 4.x',
			'beta' => true
		];
	}

	protected function getContentTypeId($contentType)
	{
		if (empty($this->session->extra['contentTypeId']))
		{
			$this->session->extra['contentTypeId'] = $this->sourceDb->fetchPairs($this->prepareImportSql($this->prefix, "
				SELECT class, contenttypeid
				FROM contenttype
			"));
		}

		return $this->session->extra['contentTypeId'][$contentType];
	}

	// ########################### STEP: CONTENT TAGS ###############################

	protected function getThreadTags($threadId)
	{
		return $this->sourceDb->fetchAll($this->prepareImportSql($this->prefix, "
			SELECT tagcontent.*, tag.tagtext
			FROM tagcontent AS
				tagcontent
			INNER JOIN tag AS
				tag ON (tag.tagid = tagcontent.tagid)
			WHERE tagcontent.contentid = ?
			AND tagcontent.contenttypeid = ?
		"), [$threadId, $this->getContentTypeId('Thread')]);
	}

	// ########################### STEP: ATTACHMENTS ###############################

	public function getStepEndAttachments()
	{
		return $this->sourceDb->fetchOne($this->prepareImportSql($this->prefix, "
			SELECT MAX(filedataid)
			FROM attachment
			WHERE contenttypeid = ?
		"), [$this->getContentTypeId('Post')]);
	}

	protected function getAttachments($startAfter, $end, $limit)
	{
		return $this->_getAttachments($startAfter, $end, $limit, $this->getContentTypeId('Post'));
	}

	protected function _getAttachments($startAfter, $end, $limit, $contentTypeId)
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
		"), [$startAfter, $end, $contentTypeId]);
	}

	protected function getAttachmentsGroupedByFile(array $attachments)
	{
		$attachments = $this->getAttachmentsForFileDataIds(array_keys($attachments), 'postid');

		$this->lookup('user', $this->pluck($attachments, ['userid', 'filedata_userid']));
		$this->lookup('post', $this->pluck($attachments, 'postid'));

		$grouped = [];

		foreach ($attachments AS $a)
		{
			$grouped[$a['filedataid']][$a['attachmentid']] = $a;
		}

		return $grouped;
	}

	protected function getAttachmentsForFileDataIds(array $fileDataIds, $contentIdKey = 'postid')
	{
		$fileDataIds = $this->sourceDb->quote($fileDataIds);

		return $this->sourceDb->fetchAll($this->prepareImportSql($this->prefix, "
			SELECT
				attachment.attachmentid, attachment.filename, attachment.userid,
				attachment.dateline, attachment.counter,
				attachment.contentid AS {$contentIdKey},
				filedata.filedataid,
				filedata.userid AS filedata_userid
			FROM attachment AS
				attachment
			INNER JOIN filedata AS
				filedata ON (filedata.filedataid = attachment.filedataid)
			WHERE filedata.filedataid IN({$fileDataIds})
			ORDER BY filedata.filedataid
		"));
	}

	protected function getAttachmentFilePath($sourcePath, array $attachment)
	{
		$path = $sourcePath
			. '/' . implode('/', str_split($attachment['filedata_userid']))
			. '/' . $attachment['filedataid'] . '.attach';

		if (!file_exists($path))
		{
			$path = $sourcePath
				. '/' . $attachment['filedata_userid']
				. '/' . $attachment['filedataid'] . '.attach';
		}

		return $path;
	}

	protected function getAttachmentFileData($fileDataId)
	{
		return $this->sourceDb->fetchOne($this->prepareImportSql($this->prefix, "
			SELECT filedata FROM filedata
			WHERE filedataid = ?
		"), $fileDataId);
	}
}