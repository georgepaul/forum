<?php
// FROM HASH: 8608d23ebb5b3fb5eeac1a4dea38f20a
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	if ($__vars['xf']['visitor']['user_id'] == $__vars['content']['ProfilePost']['user_id']) {
		$__finalCompiled .= '
	' . '' . $__templater->fn('username_link', array($__vars['user'], false, array('defaultname' => $__vars['alert']['username'], ), ), true) . ' liked <a ' . (('href="' . $__templater->fn('link', array('profile-posts/comments', $__vars['content'], ), true)) . '" class="fauxBlockLink-blockLink"') . '>your comment</a> on your profile post.' . '
';
	} else {
		$__finalCompiled .= '
	' . '' . $__templater->fn('username_link', array($__vars['user'], false, array('defaultname' => $__vars['alert']['username'], ), ), true) . ' liked <a ' . (('href="' . $__templater->fn('link', array('profile-posts/comments', $__vars['content'], ), true)) . '" class="fauxBlockLink-blockLink"') . '>your comment</a> on ' . $__templater->escape($__vars['content']['ProfilePost']['username']) . '\'s profile post.' . '
';
	}
	return $__finalCompiled;
});