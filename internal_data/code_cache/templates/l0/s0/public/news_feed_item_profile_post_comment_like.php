<?php
// FROM HASH: 6ec0a58dff2ea0f9dd5299dfede990fd
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->callMacro('like_item_profile_post_comment', 'like_snippet', array(
		'liker' => $__vars['user'],
		'comment' => $__vars['content'],
		'date' => $__vars['newsFeed']['event_date'],
	), $__vars);
	return $__finalCompiled;
});