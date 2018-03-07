<?php

namespace XF\InlineMod\Post;

use XF\Mvc\Entity\AbstractCollection;
use XF\Mvc\Entity\Entity;

class Move extends AbstractMoveCopy
{
	public function getTitle()
	{
		return \XF::phrase('move_posts...');
	}

	protected function canApplyToEntity(Entity $entity, array $options, &$error = null)
	{
		/** @var \XF\Entity\Post $entity */
		return $entity->canMove($error);
	}

	public function applyInternal(AbstractCollection $entities, array $options)
	{
		$thread = $this->getTargetThreadFromOptions($options);

		/** @var \XF\Service\Post\Mover $mover */
		$mover = $this->app()->service('XF:Post\Mover', $thread);
		$mover->setExistingTarget($options['thread_type']);

		if ($options['alert'])
		{
			$mover->setSendAlert(true, $options['alert_reason']);
		}

		if ($options['prefix_id'] !== null)
		{
			$mover->setPrefix($options['prefix_id']);
		}

		$mover->move($entities);

		$this->returnUrl = $this->app()->router('public')->buildLink('threads', $mover->getTarget());
	}

	public function renderForm(AbstractCollection $entities, \XF\Mvc\Controller $controller)
	{
		/** @var \XF\Repository\Node $nodeRepo */
		$nodeRepo = $this->app()->repository('XF:Node');
		$nodes = $nodeRepo->getFullNodeList()->filterViewable();

		$viewParams = [
			'posts' => $entities,
			'total' => count($entities),
			'nodeTree' => $nodeRepo->createNodeTree($nodes),
			'first' => $entities->first(),
			'prefixes' => $entities->first()->Thread->Forum->getUsablePrefixes()
		];
		return $controller->view('XF:Public:InlineMod\Post\Move', 'inline_mod_post_move', $viewParams);
	}
}