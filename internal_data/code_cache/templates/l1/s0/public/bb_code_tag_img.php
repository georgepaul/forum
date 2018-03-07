<?php
// FROM HASH: e5a456befd12165e83d48f9763a3771c
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->callMacro('lightbox_macros', 'single_image', array(
		'canViewAttachments' => true,
		'id' => $__templater->fn('unique_id', array(), false),
		'src' => $__vars['imageUrl'],
		'dataUrl' => $__vars['validUrl'],
	), $__vars) . '
';
	return $__finalCompiled;
});