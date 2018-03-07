<?php
// FROM HASH: 0a91db86950fcdbde5203ee970351f05
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= '' . $__templater->fn('username_link', array($__vars['user'], false, array('defaultname' => $__vars['alert']['username'], ), ), true) . ' liked your message in the conversation ' . (((('<a href="' . $__templater->fn('link', array('conversations/messages', $__vars['content'], ), true)) . '" class="fauxBlockLink-blockLink">') . $__templater->escape($__vars['content']['Conversation']['title'])) . '</a>') . '.';
	return $__finalCompiled;
});