<?php

namespace XF\Service\Post;

use XF\Entity\Post;

class Approver extends \XF\Service\AbstractService
{
	/**
	 * @var Post
	 */
	protected $post;

	protected $notifyRunTime = 3;

	public function __construct(\XF\App $app, Post $post)
	{
		parent::__construct($app);
		$this->post = $post;
	}

	public function getPost()
	{
		return $this->post;
	}

	public function setNotifyRunTime($time)
	{
		$this->notifyRunTime = $time;
	}

	public function approve()
	{
		if ($this->post->message_state == 'moderated')
		{
			$this->post->message_state = 'visible';
			$this->post->save();

			$this->onApprove();
			return true;
		}
		else
		{
			return false;
		}
	}

	protected function onApprove()
	{
		// if this is not the last post, then another notification would have been triggered already
		if ($this->post->isLastPost())
		{
			/** @var \XF\Service\Post\Notifier $notifier */
			$notifier = $this->service('XF:Post\Notifier', $this->post, 'reply');
			$notifier->notifyAndEnqueue($this->notifyRunTime);
		}
	}
}