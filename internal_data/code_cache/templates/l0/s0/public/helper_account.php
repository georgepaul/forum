<?php
// FROM HASH: 39b8370092bfcb0dbb4ba1faef33e637
return array('macros' => array('dob_privacy_row' => function($__templater, array $__arguments, array $__vars)
{
	$__vars = $__templater->setupBaseParamsForMacro($__vars, false);
	$__finalCompiled = '';
	$__vars = $__templater->mergeMacroArguments(array(
		'hint' => '',
	), $__arguments, $__vars);
	$__finalCompiled .= '
	' . $__templater->formCheckBoxRow(array(
	), array(array(
		'value' => '1',
		'name' => 'option[show_dob_date]',
		'checked' => $__vars['xf']['visitor']['Option']['show_dob_date'],
		'label' => 'Show day and month of birth',
		'_dependent' => array($__templater->formCheckBox(array(
	), array(array(
		'value' => '1',
		'name' => 'option[show_dob_year]',
		'checked' => $__vars['xf']['visitor']['Option']['show_dob_year'],
		'label' => 'Show year of birth',
		'hint' => 'This will allow people to see your age.',
		'_type' => 'option',
	)))),
		'_type' => 'option',
	)), array(
		'hint' => ($__vars['hint'] ? $__templater->escape($__vars['hint']) : ''),
	)) . '
';
	return $__finalCompiled;
},
'activity_privacy_row' => function($__templater, array $__arguments, array $__vars)
{
	$__vars = $__templater->setupBaseParamsForMacro($__vars, false);
	$__finalCompiled = '';
	$__vars = $__templater->mergeMacroArguments(array(), $__arguments, $__vars);
	$__finalCompiled .= '
	' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'user[visible]',
		'checked' => $__vars['xf']['visitor']['visible'],
		'label' => 'Show your online status',
		'hint' => 'This will allow other people to see when you are online.',
		'_dependent' => array($__templater->formCheckBox(array(
	), array(array(
		'name' => 'user[activity_visible]',
		'checked' => $__vars['xf']['visitor']['activity_visible'],
		'label' => 'Show your current activity',
		'hint' => 'This will allow other people to see what page you are currently viewing.',
		'_type' => 'option',
	)))),
		'_type' => 'option',
	)), array(
	)) . '
';
	return $__finalCompiled;
},), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

';
	return $__finalCompiled;
});