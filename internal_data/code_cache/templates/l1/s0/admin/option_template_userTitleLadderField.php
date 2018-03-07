<?php
// FROM HASH: fd75575c76b265688ecc491381cdbd1e
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->formRadioRow(array(
		'name' => $__vars['inputName'],
		'value' => $__vars['option']['option_value'],
	), array(array(
		'value' => 'trophy_points',
		'class' => 'js-trophy_points',
		'label' => 'Trophy points',
		'_type' => 'option',
	),
	array(
		'value' => 'message_count',
		'class' => 'js-messages',
		'label' => 'Messages',
		'_type' => 'option',
	),
	array(
		'value' => 'like_count',
		'class' => 'js-likes',
		'label' => 'Likes',
		'_type' => 'option',
	)), array(
		'label' => $__templater->escape($__vars['option']['title']),
		'hint' => $__templater->escape($__vars['hintHtml']),
		'explain' => $__templater->escape($__vars['explainHtml']),
		'html' => $__templater->escape($__vars['listedHtml']),
	));
	return $__finalCompiled;
});