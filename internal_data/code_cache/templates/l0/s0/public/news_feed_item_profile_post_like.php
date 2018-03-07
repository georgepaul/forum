<?php
// FROM HASH: 79326fcec4bfb191ca2d9a88fcc8078c
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->callMacro('like_item_profile_post', 'like_snippet', array(
		'liker' => $__vars['user'],
		'profilePost' => $__vars['content'],
		'date' => $__vars['newsFeed']['event_date'],
	), $__vars);
	return $__finalCompiled;
});