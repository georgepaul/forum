<?php
// FROM HASH: 955310f0b4d6ae16de459bd1518f8a8b
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->formInfoRow('An email has been sent to <b>' . $__templater->escape($__vars['email']) . '</b> with a single-use code. Please enter that code to continue.', array(
	)) . '

' . $__templater->formTextBoxRow(array(
		'name' => 'code',
		'autofocus' => 'autofocus',
	), array(
		'label' => 'Email confirmation code',
	));
	return $__finalCompiled;
});