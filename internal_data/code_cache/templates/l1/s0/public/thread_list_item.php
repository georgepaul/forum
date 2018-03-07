<?php
// FROM HASH: c1265c1f98fb9772f3c44559bef24056
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->callMacro('thread_list_macros', 'item', array(
		'thread' => $__vars['thread'],
		'forum' => $__vars['forum'],
		'forceRead' => $__vars['inlineMode'],
	), $__vars);
	return $__finalCompiled;
});