<?php
// FROM HASH: 6c57546a37d2173c474ac32e300541f5
return array('macros' => array('spam_log' => function($__templater, array $__arguments, array $__vars)
{
	$__vars = $__templater->setupBaseParamsForMacro($__vars, false);
	$__finalCompiled = '';
	$__vars = $__templater->mergeMacroArguments(array(
		'spamDetails' => '!',
	), $__arguments, $__vars);
	$__finalCompiled .= '
	';
	if ($__vars['spamDetails']) {
		$__finalCompiled .= '
		' . $__templater->formRow('
			' . $__templater->escape($__vars['spamDetails']) . '
		', array(
			'label' => 'Spam log',
		)) . '
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
},
'action_row' => function($__templater, array $__arguments, array $__vars)
{
	$__vars = $__templater->setupBaseParamsForMacro($__vars, false);
	$__finalCompiled = '';
	$__vars = $__templater->mergeMacroArguments(array(
		'unapprovedItem' => '!',
		'handler' => '!',
	), $__arguments, $__vars);
	$__finalCompiled .= '
	';
	$__compilerTemp1 = array();
	$__compilerTemp2 = $__templater->method($__vars['handler'], 'getDefaultActions', array());
	if ($__templater->isTraversable($__compilerTemp2)) {
		foreach ($__compilerTemp2 AS $__vars['action'] => $__vars['label']) {
			$__compilerTemp1[] = array(
				'value' => $__vars['action'],
				'checked' => ((!$__vars['action']) ? 'checked' : ''),
				'label' => $__templater->escape($__vars['label']),
				'_type' => 'option',
			);
		}
	}
	$__finalCompiled .= $__templater->formRadioRow(array(
		'name' => 'queue[' . $__vars['unapprovedItem']['content_type'] . '][' . $__vars['unapprovedItem']['content_id'] . ']',
	), $__compilerTemp1, array(
		'label' => 'Action',
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