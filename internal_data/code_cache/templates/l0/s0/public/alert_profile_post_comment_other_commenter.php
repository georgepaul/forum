<?php
// FROM HASH: 606513fcc888cba4951701bd529bbfee
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	if ($__vars['content']['ProfilePost']['ProfileUser']['user_id'] == $__vars['content']['ProfilePost']['user_id']) {
		$__finalCompiled .= '
	' . '' . $__templater->fn('username_link', array($__vars['user'], false, array('defaultname' => $__vars['alert']['username'], ), ), true) . ' also commented on <a ' . (('href="' . $__templater->fn('link', array('profile-posts/comments', $__vars['content'], ), true)) . '" class="fauxBlockLink-blockLink"') . '>' . $__templater->escape($__vars['content']['ProfilePost']['username']) . '\'s status</a>' . '.
';
	} else {
		$__finalCompiled .= '
	' . '' . $__templater->fn('username_link', array($__vars['user'], false, array('defaultname' => $__vars['alert']['username'], ), ), true) . ' also commented on <a ' . (('href="' . $__templater->fn('link', array('profile-posts/comments', $__vars['content'], ), true)) . '" class="fauxBlockLink-blockLink"') . '>' . $__templater->escape($__vars['content']['ProfilePost']['username']) . '\'s profile post</a>' . '.
';
	}
	return $__finalCompiled;
});