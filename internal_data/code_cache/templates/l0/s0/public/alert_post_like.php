<?php
// FROM HASH: 05f97569c2f80ec03ee077e4b9ae4f4f
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= '' . $__templater->fn('username_link', array($__vars['user'], false, array('defaultname' => $__vars['alert']['username'], ), ), true) . ' liked your post in the thread ' . ((((('<a href="' . $__templater->fn('link', array('posts', $__vars['content'], ), true)) . '" class="fauxBlockLink-blockLink">') . $__templater->fn('prefix', array('thread', $__vars['content']['Thread'], ), true)) . $__templater->escape($__vars['content']['Thread']['title'])) . '</a>') . '.';
	return $__finalCompiled;
});