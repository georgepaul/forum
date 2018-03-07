<?php

namespace XF\Entity;

use XF\Mvc\Entity\Entity;
use XF\Mvc\Entity\Structure;

/**
 * COLUMNS
 * @property int|null post_id
 * @property int thread_id
 * @property int user_id
 * @property string username
 * @property int post_date
 * @property string message
 * @property int ip_id
 * @property string message_state
 * @property int attach_count
 * @property int likes
 * @property array like_users
 * @property int warning_id
 * @property string warning_message
 * @property int position
 * @property int last_edit_date
 * @property int last_edit_user_id
 * @property int edit_count
 * @property array|null embed_metadata
 *
 * RELATIONS
 * @property \XF\Entity\Thread Thread
 * @property \XF\Entity\User User
 * @property \XF\Entity\Attachment[] Attachments
 * @property \XF\Entity\LikedContent[] Likes
 * @property \XF\Entity\DeletionLog DeletionLog
 * @property \XF\Entity\ApprovalQueue ApprovalQueue
 */
class Post extends Entity implements QuotableInterface, \XF\BbCode\RenderableContentInterface
{
	public function canView(&$error = null)
	{
		if (!$this->Thread || !$this->Thread->canView($error))
		{
			return false;
		}

		$visitor = \XF::visitor();
		$nodeId = $this->Thread->node_id;

		if ($this->message_state == 'moderated')
		{
			if (
				!$visitor->hasNodePermission($nodeId, 'viewModerated')
				&& (!$visitor->user_id || $visitor->user_id != $this->user_id)
			)
			{
				$error = \XF::phraseDeferred('requested_post_not_found');
				return false;
			}
		}
		else if ($this->message_state == 'deleted')
		{
			if (!$visitor->hasNodePermission($nodeId, 'viewDeleted'))
			{
				$error = \XF::phraseDeferred('requested_post_not_found');
				return false;
			}
		}

		return true;
	}

	public function canEdit(&$error = null)
	{
		$thread = $this->Thread;
		$visitor = \XF::visitor();
		if (!$visitor->user_id || !$thread)
		{
			return false;
		}

		if (!$thread->discussion_open && !$thread->canLockUnlock())
		{
			$error = \XF::phraseDeferred('you_may_not_perform_this_action_because_discussion_is_closed');
			return false;
		}

		$nodeId = $thread->node_id;

		if ($visitor->hasNodePermission($nodeId, 'editAnyPost'))
		{
			return true;
		}

		if ($this->user_id == $visitor->user_id && $visitor->hasNodePermission($nodeId, 'editOwnPost'))
		{
			$editLimit = $visitor->hasNodePermission($nodeId, 'editOwnPostTimeLimit');
			if ($editLimit != -1 && (!$editLimit || $this->post_date < \XF::$time - 60 * $editLimit))
			{
				$error = \XF::phraseDeferred('message_edit_time_limit_expired', ['minutes' => $editLimit]);
				return false;
			}

			if (!$thread->Forum || !$thread->Forum->allow_posting)
			{
				$error = \XF::phraseDeferred('you_may_not_perform_this_action_because_forum_does_not_allow_posting');
				return false;
			}

			return true;
		}

		return false;
	}

	public function canEditSilently(&$error = null)
	{
		$thread = $this->Thread;
		$visitor = \XF::visitor();
		if (!$visitor->user_id || !$thread)
		{
			return false;
		}

		$nodeId = $thread->node_id;

		if ($visitor->hasNodePermission($nodeId, 'editAnyPost'))
		{
			return true;
		}

		return false;
	}

	public function canUseInlineModeration(&$error = null)
	{
		return $this->Thread->canUseInlineModeration($error);
	}

	public function canViewHistory(&$error = null)
	{
		$visitor = \XF::visitor();
		if (!$visitor->user_id)
		{
			return false;
		}

		if (!$this->app()->options()->editHistory['enabled'])
		{
			return false;
		}

		if ($visitor->hasNodePermission($this->Thread->node_id, 'editAnyPost'))
		{
			return true;
		}

		return false;
	}

	public function canDelete($type = 'soft', &$error = null)
	{
		$thread = $this->Thread;
		$visitor = \XF::visitor();
		if (!$visitor->user_id || !$thread)
		{
			return false;
		}

		$nodeId = $thread->node_id;

		if ($type != 'soft' && !$visitor->hasNodePermission($nodeId, 'hardDeleteAnyPost'))
		{
			return false;
		}

		if (!$thread->discussion_open && !$thread->canLockUnlock())
		{
			$error = \XF::phraseDeferred('you_may_not_perform_this_action_because_discussion_is_closed');
			return false;
		}

		if ($this->isFirstPost())
		{
			return $thread->canDelete($type, $error);
		}

		if ($visitor->hasNodePermission($nodeId, 'deleteAnyPost'))
		{
			return true;
		}

		if ($this->user_id == $visitor->user_id && $visitor->hasNodePermission($nodeId, 'deleteOwnPost'))
		{
			$editLimit = $visitor->hasNodePermission($nodeId, 'editOwnPostTimeLimit');
			if ($editLimit != -1 && (!$editLimit || $this->post_date < \XF::$time - 60 * $editLimit))
			{
				$error = \XF::phraseDeferred('message_edit_time_limit_expired', ['minutes' => $editLimit]);
				return false;
			}

			if (!$thread->Forum || !$thread->Forum->allow_posting)
			{
				$error = \XF::phraseDeferred('you_may_not_perform_this_action_because_forum_does_not_allow_posting');
				return false;
			}

			return true;
		}

		return false;
	}

	public function canUndelete(&$error = null)
	{
		$thread = $this->Thread;
		$visitor = \XF::visitor();
		if (!$visitor->user_id || !$thread)
		{
			return false;
		}

		return $visitor->hasNodePermission($thread->node_id, 'undelete');
	}

	public function canApproveUnapprove(&$error = null)
	{
		if (!$this->Thread)
		{
			return false;
		}

		return $this->Thread->canApproveUnapprove();
	}

	public function canWarn(&$error = null)
	{
		$visitor = \XF::visitor();

		if ($this->warning_id
			|| !$this->user_id
			|| !$visitor->user_id
			|| $this->user_id == $visitor->user_id
			|| !$visitor->hasNodePermission($this->Thread->node_id, 'warn')
		)
		{
			return false;
		}

		return ($this->User && $this->User->isWarnable());
	}

	public function canMove(&$error = null)
	{
		return $this->Thread->canMove($error);
	}

	public function canCopy(&$error = null)
	{
		return $this->Thread->canCopy($error);
	}

	public function canMerge(&$error = null)
	{
		return $this->Thread->canMerge($error);
	}

	public function canReport(&$error = null, User $asUser = null)
	{
		$asUser = $asUser ?: \XF::visitor();
		return $asUser->canReport($error);
	}

	public function canLike(&$error = null)
	{
		$visitor = \XF::visitor();
		if (!$visitor->user_id)
		{
			return false;
		}

		if ($this->message_state != 'visible')
		{
			return false;
		}

		if ($this->user_id == $visitor->user_id)
		{
			$error = \XF::phraseDeferred('liking_own_content_cheating');
			return false;
		}

		if (!$this->Thread)
		{
			return false;
		}

		return $visitor->hasNodePermission($this->Thread->node_id, 'like');
	}

	public function canCleanSpam()
	{
		return (\XF::visitor()->canCleanSpam() && $this->User && $this->User->isPossibleSpammer());
	}

	public function canSendModeratorActionAlert()
	{
		$visitor = \XF::visitor();

		if (!$visitor->user_id || $visitor->user_id == $this->user_id)
		{
			return false;
		}

		if ($this->message_state != 'visible')
		{
			return false;
		}

		return true;
	}

	public function isVisible()
	{
		return (
			$this->message_state == 'visible'
			&& $this->Thread
			&& $this->Thread->discussion_state == 'visible'
		);
	}

	public function isLiked()
	{
		$visitor = \XF::visitor();
		if (!$visitor->user_id)
		{
			return false;
		}

		return isset($this->Likes[$visitor->user_id]);
	}

	public function isFirstPost()
	{
		$thread = $this->Thread;
		if (!$thread)
		{
			return false;
		}

		if ($this->post_id == $thread->first_post_id)
		{
			return true;
		}

		// this can be called during an insert where the thread hasn't actually been updated yet
		// just assume it's the first post
		if (!$thread->thread_id)
		{
			return true;
		}

		if (!$thread->first_post_id && $this->post_date == $thread->post_date)
		{
			return true;
		}

		return false;
	}

	public function isLastPost()
	{
		$thread = $this->Thread;
		if (!$thread)
		{
			return false;
		}

		return ($this->post_id == $thread->last_post_id);
	}

	public function isUnread()
	{
		if (!$this->Thread)
		{
			return false;
		}

		$readDate = $this->Thread->getVisitorReadDate();
		if ($readDate === null)
		{
			return false;
		}

		return $readDate < $this->post_date;
	}

	public function isAttachmentEmbedded($attachmentId)
	{
		if (!$this->embed_metadata)
		{
			return false;
		}

		if ($attachmentId instanceof Attachment)
		{
			$attachmentId = $attachmentId->attachment_id;
		}

		return isset($this->embed_metadata['attachments'][$attachmentId]);
	}

	public function isIgnored()
	{
		return \XF::visitor()->isIgnoring($this->user_id);
	}

	public function getQuoteWrapper($inner)
	{
		return '[QUOTE="'
			. ($this->User ? $this->User->username : $this->username)
			. ', post: ' . $this->post_id
			. ($this->User ? ", member: $this->user_id" : '')
			. '"]'
			. $inner
			. "[/QUOTE]\n";
	}

	public function getBbCodeRenderOptions($context, $type)
	{
		return [
			'entity' => $this,
			'user' => $this->User,
			'attachments' => $this->attach_count ? $this->Attachments : [],
			'viewAttachments' => $this->Thread ? $this->Thread->canViewAttachments() : false
		];
	}

	protected function _postSave()
	{
		$visibilityChange = $this->isStateChanged('message_state', 'visible');
		$approvalChange = $this->isStateChanged('message_state', 'moderated');
		$deletionChange = $this->isStateChanged('message_state', 'deleted');

		if ($this->isUpdate())
		{
			if ($visibilityChange == 'enter')
			{
				$this->postMadeVisible();

				if ($approvalChange)
				{
					$this->submitHamData();
				}
			}
			else if ($visibilityChange == 'leave')
			{
				$this->postHidden();
			}

			if ($deletionChange == 'leave' && $this->DeletionLog)
			{
				$this->DeletionLog->delete();
			}

			if ($approvalChange == 'leave' && $this->ApprovalQueue)
			{
				$this->ApprovalQueue->delete();
			}
		}
		else
		{
			// insert
			if ($this->message_state == 'visible')
			{
				$this->postInsertedVisible();
			}
		}

		if ($approvalChange == 'enter')
		{
			$approvalQueue = $this->getRelationOrDefault('ApprovalQueue', false);
			$approvalQueue->content_date = $this->post_date;
			$approvalQueue->save();
		}
		else if ($deletionChange == 'enter' && !$this->DeletionLog)
		{
			$delLog = $this->getRelationOrDefault('DeletionLog', false);
			$delLog->setFromVisitor();
			$delLog->save();
		}

		$this->updateThreadRecord();

		if ($this->isUpdate() && $this->isChanged('likes') && $this->isFirstPost())
		{
			$this->Thread->first_post_likes = $this->likes;
			$this->Thread->save();
		}

		if ($this->isUpdate() && $this->getOption('log_moderator'))
		{
			$this->app()->logger()->logModeratorChanges('post', $this);
		}
	}

	protected function updateThreadRecord()
	{
		if (!$this->Thread || !$this->Thread->exists())
		{
			// inserting a thread, don't try to write to it
			return;
		}

		$visibilityChange = $this->isStateChanged('message_state', 'visible');
		if ($visibilityChange == 'enter')
		{
			$this->Thread->postAdded($this);
			$this->Thread->save();
		}
		else if ($visibilityChange == 'leave')
		{
			$this->Thread->postRemoved($this);
			$this->Thread->save();
		}
	}

	protected function adjustUserMessageCountIfNeeded($amount)
	{
		if ($this->user_id
			&& !empty($this->Thread->Forum->count_messages)
			&& $this->Thread->discussion_state == 'visible'
		)
		{
			$this->db()->query("
				UPDATE xf_user
				SET message_count = GREATEST(0, message_count + ?)
				WHERE user_id = ?
			", [$amount, $this->user_id]);
		}
	}

	protected function adjustThreadUserPostCount($amount)
	{
		if ($this->user_id)
		{
			$db = $this->db();

			if ($amount > 0)
			{
				$db->insert('xf_thread_user_post', [
					'thread_id' => $this->thread_id,
					'user_id' => $this->user_id,
					'post_count' => $amount
				], false, 'post_count = post_count + VALUES(post_count)');
			}
			else
			{
				$existingValue = $db->fetchOne("
					SELECT post_count
					FROM xf_thread_user_post
					WHERE thread_id = ?
						AND user_id = ?
				", [$this->thread_id, $this->user_id]);
				if ($existingValue !== null)
				{
					$newValue = $existingValue + $amount;
					if ($newValue <= 0)
					{
						$this->db()->delete('xf_thread_user_post',
							'thread_id = ? AND user_id = ?', [$this->thread_id, $this->user_id]
						);
					}
					else
					{
						$this->db()->update('xf_thread_user_post',
							['post_count' => $newValue],
							'thread_id = ? AND user_id = ?', [$this->thread_id, $this->user_id]
						);
					}
				}
			}
		}
	}

	protected function postInsertedVisible()
	{
		$this->adjustUserMessageCountIfNeeded(1);
		$this->adjustThreadUserPostCount(1);
	}

	protected function postMadeVisible()
	{
		if ($this->isChanged('position'))
		{
			// if we've updated the position, we need to trust what we had is accurate...
			$basePosition = $this->getExistingValue('position');
		}
		else
		{
			// ...otherwise, we should always double check the DB for the latest position since this function won't
			// update cached entities
			$basePosition = $this->db()->fetchOne("
				SELECT position
				FROM xf_post
				WHERE post_id = ?
			", $this->post_id);
			if ($basePosition === null || $basePosition === false)
			{
				$basePosition = $this->getExistingValue('position');
			}

			// also, since we haven't changed the position yet, we need to update that
			$this->fastUpdate('position', $basePosition + 1);
		}

		$this->db()->query("
			UPDATE xf_post
			SET position = position + 1
			WHERE thread_id = ?
				AND (
					position > ?
					OR (position = ? AND post_date > ?)
				)
				AND post_id <> ?
		", [$this->thread_id, $basePosition, $basePosition, $this->post_date, $this->post_id]);

		$this->adjustUserMessageCountIfNeeded(1);
		$this->adjustThreadUserPostCount(1);
	}

	protected function postHidden($hardDelete = false)
	{
		if ($hardDelete || $this->isChanged('position'))
		{
			// if we've deleted the post or updated the position, we need to trust what we had is accurate...
			$basePosition = $this->getExistingValue('position');
		}
		else
		{
			// ...otherwise, we should always double check the DB for the latest position since this function won't
			// update cached entities
			$basePosition = $this->db()->fetchOne("
				SELECT position
				FROM xf_post
				WHERE post_id = ?
			", $this->post_id);
			if ($basePosition === null || $basePosition === false)
			{
				$basePosition = $this->getExistingValue('position');
			}

			// also, since we haven't changed the position yet, we need to update that
			$this->fastUpdate('position', $basePosition - 1);
		}

		$this->db()->query("
			UPDATE xf_post
			SET position = IF(position > 0, position - 1, 0)
			WHERE thread_id = ?
				AND position >= ?
				AND post_id <> ?
		", [$this->thread_id, $basePosition, $this->post_id]);

		$this->adjustUserMessageCountIfNeeded(-1);
		$this->adjustThreadUserPostCount(-1);

		/** @var \XF\Repository\UserAlert $alertRepo */
		$alertRepo = $this->repository('XF:UserAlert');
		$alertRepo->fastDeleteAlertsForContent('post', $this->post_id);
	}

	protected function submitHamData()
	{
		/** @var \XF\Spam\ContentChecker $submitter */
		$submitter = $this->app()->container('spam.contentHamSubmitter');
		$submitter->submitHam('post', $this->post_id);
	}

	protected function _postDelete()
	{
		if ($this->message_state == 'visible')
		{
			$this->postHidden(true);
		}

		if ($this->Thread && $this->message_state == 'visible')
		{
			$this->Thread->postRemoved($this);
			$this->Thread->save();
		}

		if ($this->message_state == 'deleted' && $this->DeletionLog)
		{
			$this->DeletionLog->delete();
		}

		if ($this->message_state == 'moderated' && $this->ApprovalQueue)
		{
			$this->ApprovalQueue->delete();
		}

		if ($this->getOption('log_moderator'))
		{
			$this->app()->logger()->logModeratorAction('post', $this, 'delete_hard');
		}

		$this->db()->delete('xf_edit_history', 'content_type = ? AND content_id = ?', ['post', $this->post_id]);

		/** @var \XF\Repository\Attachment $attachRepo */
		$attachRepo = $this->repository('XF:Attachment');
		$attachRepo->fastDeleteContentAttachments('post', $this->post_id);
	}

	public function softDelete($reason = '', User $byUser = null)
	{
		$byUser = $byUser ?: \XF::visitor();
		$thread = $this->Thread;

		if ($this->isFirstPost())
		{
			return $thread->softDelete($reason, $byUser);
		}
		else
		{
			if ($this->message_state == 'deleted')
			{
				return false;
			}

			$this->message_state = 'deleted';

			/** @var \XF\Entity\DeletionLog $deletionLog */
			$deletionLog = $this->getRelationOrDefault('DeletionLog');
			$deletionLog->setFromUser($byUser);
			$deletionLog->delete_reason = $reason;

			$this->save();

			return true;
		}
	}

	public static function getStructure(Structure $structure)
	{
		$structure->table = 'xf_post';
		$structure->shortName = 'XF:Post';
		$structure->contentType = 'post';
		$structure->primaryKey = 'post_id';
		$structure->columns = [
			'post_id' => ['type' => self::UINT, 'autoIncrement' => true, 'nullable' => true],
			'thread_id' => ['type' => self::UINT, 'required' => true],
			'user_id' => ['type' => self::UINT, 'required' => true],
			'username' => ['type' => self::STR, 'maxLength' => 50,
				'required' => 'please_enter_valid_name'
			],
			'post_date' => ['type' => self::UINT, 'required' => true, 'default' => \XF::$time],
			'message' => ['type' => self::STR,
				'required' => 'please_enter_valid_message'
			],
			'ip_id' => ['type' => self::UINT, 'default' => 0],
			'message_state' => ['type' => self::STR, 'default' => 'visible',
				'allowedValues' => ['visible', 'moderated', 'deleted']
			],
			'attach_count' => ['type' => self::UINT, 'max' => 65535, 'forced' => true, 'default' => 0],
			'likes' => ['type' => self::UINT, 'forced' => true, 'default' => 0],
			'like_users' => ['type' => self::SERIALIZED_ARRAY, 'default' => []],
			'warning_id' => ['type' => self::UINT, 'default' => 0],
			'warning_message' => ['type' => self::STR, 'default' => ''],
			'position' => ['type' => self::UINT, 'forced' => true],
			'last_edit_date' => ['type' => self::UINT, 'default' => 0],
			'last_edit_user_id' => ['type' => self::UINT, 'default' => 0],
			'edit_count' => ['type' => self::UINT, 'forced' => true, 'default' => 0],
			'embed_metadata' => ['type' => self::JSON_ARRAY, 'nullable' => true, 'default' => null]
		];
		$structure->behaviors = [
			'XF:Likeable' => ['stateField' => 'message_state'],
			'XF:Indexable' => [
				'checkForUpdates' => ['message', 'user_id', 'thread_id', 'post_date', 'message_state']
			],
			'XF:NewsFeedPublishable' => [
				'usernameField' => 'username',
				'dateField' => 'post_date'
			]
		];
		$structure->getters = [];
		$structure->relations = [
			'Thread' => [
				'entity' => 'XF:Thread',
				'type' => self::TO_ONE,
				'conditions' => 'thread_id',
				'primary' => true,
				'with' => ['Forum', 'Forum.Node']
			],
			'User' => [
				'entity' => 'XF:User',
				'type' => self::TO_ONE,
				'conditions' => 'user_id',
				'primary' => true
			],
			'Attachments' => [
				'entity' => 'XF:Attachment',
				'type' => self::TO_MANY,
				'conditions' => [
					['content_type', '=', 'post'],
					['content_id', '=', '$post_id']
				],
				'with' => 'Data',
				'order' => 'attach_date'
			],
			'Likes' => [
				'entity' => 'XF:LikedContent',
				'type' => self::TO_MANY,
				'conditions' => [
					['content_type', '=', 'post'],
					['content_id', '=', '$post_id']
				],
				'key' => 'like_user_id',
				'order' => 'like_date'
			],
			'DeletionLog' => [
				'entity' => 'XF:DeletionLog',
				'type' => self::TO_ONE,
				'conditions' => [
					['content_type', '=', 'post'],
					['content_id', '=', '$post_id']
				],
				'primary' => true
			],
			'ApprovalQueue' => [
				'entity' => 'XF:ApprovalQueue',
				'type' => self::TO_ONE,
				'conditions' => [
					['content_type', '=', 'post'],
					['content_id', '=', '$post_id']
				],
				'primary' => true
			]
		];
		$structure->options = [
			'log_moderator' => true
		];

		return $structure;
	}
}