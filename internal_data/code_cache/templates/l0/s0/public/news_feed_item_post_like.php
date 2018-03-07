<?php
// FROM HASH: 63e23f52fbe46031ecf08581c5bde61a
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->callMacro('like_item_post', 'like_snippet', array(
		'liker' => $__vars['user'],
		'post' => $__vars['content'],
		'date' => $__vars['newsFeed']['event_date'],
	), $__vars);
	return $__finalCompiled;
});