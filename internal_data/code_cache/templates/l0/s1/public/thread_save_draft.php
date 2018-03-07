<?php
// FROM HASH: 0ab3fa67a4d4f4ebb91ca98421fb6869
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	if ($__vars['hasNewPost']) {
		$__finalCompiled .= '
	<div class="message js-newMessagesIndicator">
		<div class="message-inner">
			<div class="message-cell message-cell--alert">
				' . 'Messages have been posted since you loaded this page.' . '
				<a data-href="' . $__templater->fn('link', array('threads/new-posts', $__vars['thread'], array('after' => $__vars['lastDate'], ), ), true) . '" data-xf-click="message-loader">' . 'View them?' . '</a>
			</div>
		</div>
	</div>
';
	}
	return $__finalCompiled;
});