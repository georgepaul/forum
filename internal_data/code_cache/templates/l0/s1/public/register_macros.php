<?php
// FROM HASH: 466e47494b01b7832a53e7f8f39ce41b
return array('macros' => array('username_row' => function($__templater, array $__arguments, array $__vars)
{
	$__vars = $__templater->setupBaseParamsForMacro($__vars, false);
	$__finalCompiled = '';
	$__vars = $__templater->mergeMacroArguments(array(
		'fieldName' => 'username',
		'value' => '',
		'autoFocus' => true,
	), $__arguments, $__vars);
	$__finalCompiled .= '

	' . $__templater->formTextBoxRow(array(
		'name' => $__vars['fieldName'],
		'value' => $__vars['value'],
		'autocomplete' => 'off',
		'autofocus' => ($__vars['autoFocus'] ? 'autofocus' : false),
		'maxlength' => $__templater->fn('max_length', array($__vars['xf']['visitor'], 'username', ), false),
	), array(
		'label' => 'User name',
		'explain' => 'This is the name that will be shown with your messages. You may use any name you wish. Once set, this cannot be changed.',
	)) . '
';
	return $__finalCompiled;
},
'email_row' => function($__templater, array $__arguments, array $__vars)
{
	$__vars = $__templater->setupBaseParamsForMacro($__vars, false);
	$__finalCompiled = '';
	$__vars = $__templater->mergeMacroArguments(array(
		'fieldName' => 'email',
		'value' => '',
	), $__arguments, $__vars);
	$__finalCompiled .= '

	' . $__templater->formTextBoxRow(array(
		'name' => $__vars['fieldName'],
		'value' => $__vars['value'],
		'type' => 'email',
		'autocomplete' => 'off',
		'maxlength' => $__templater->fn('max_length', array($__vars['xf']['visitor'], 'email', ), false),
	), array(
		'label' => 'Email',
	)) . '
';
	return $__finalCompiled;
},
'dob_row' => function($__templater, array $__arguments, array $__vars)
{
	$__vars = $__templater->setupBaseParamsForMacro($__vars, false);
	$__finalCompiled = '';
	$__vars = $__templater->mergeMacroArguments(array(
		'dobData' => array(),
	), $__arguments, $__vars);
	$__finalCompiled .= '
	';
	if ($__vars['xf']['options']['registrationSetup']['requireDob']) {
		$__finalCompiled .= '
		' . $__templater->callMacro('helper_user_dob_edit', 'dob_edit', array(
			'dobData' => $__vars['dobData'],
			'required' => true,
		), $__vars) . '
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
},
'location_row' => function($__templater, array $__arguments, array $__vars)
{
	$__vars = $__templater->setupBaseParamsForMacro($__vars, false);
	$__finalCompiled = '';
	$__vars = $__templater->mergeMacroArguments(array(
		'fieldName' => 'location',
		'value' => '',
	), $__arguments, $__vars);
	$__finalCompiled .= '

	';
	if ($__vars['xf']['options']['registrationSetup']['requireLocation']) {
		$__finalCompiled .= '
		' . $__templater->formTextBoxRow(array(
			'name' => $__vars['fieldName'],
			'value' => $__vars['value'],
			'required' => 'true',
		), array(
			'label' => 'Location',
			'hint' => 'Required',
		)) . '
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
},
'custom_fields' => function($__templater, array $__arguments, array $__vars)
{
	$__vars = $__templater->setupBaseParamsForMacro($__vars, false);
	$__finalCompiled = '';
	$__vars = $__templater->mergeMacroArguments(array(), $__arguments, $__vars);
	$__finalCompiled .= '
	' . $__templater->callMacro('custom_fields_macros', 'custom_fields_edit', array(
		'type' => 'users',
		'group' => null,
		'set' => $__vars['xf']['visitor']['Profile']['custom_fields'],
		'additionalFilters' => array('registration', ),
	), $__vars) . '
';
	return $__finalCompiled;
},
'tos_row' => function($__templater, array $__arguments, array $__vars)
{
	$__vars = $__templater->setupBaseParamsForMacro($__vars, false);
	$__finalCompiled = '';
	$__vars = $__templater->mergeMacroArguments(array(), $__arguments, $__vars);
	$__finalCompiled .= '
	';
	if ($__vars['xf']['tosUrl'] OR $__vars['xf']['options']['privacyPolicyUrl']) {
		$__finalCompiled .= '
		';
		$__compilerTemp1 = '';
		if ($__vars['xf']['tosUrl'] AND $__vars['xf']['options']['privacyPolicyUrl']) {
			$__compilerTemp1 .= '
				' . 'By registering, you agree to our <a href="' . $__templater->escape($__vars['xf']['tosUrl']) . '" target="_blank">terms</a> and <a href="' . $__templater->escape($__vars['xf']['options']['privacyPolicyUrl']) . '" target="_blank">privacy policy</a>.' . '
			';
		} else if ($__vars['xf']['tosUrl']) {
			$__compilerTemp1 .= '
				' . 'By registering, you agree to our <a href="' . $__templater->escape($__vars['xf']['tosUrl']) . '" target="_blank">terms and rules</a>.' . '
			';
		} else {
			$__compilerTemp1 .= '
				' . 'By registering, you agree to our <a href="' . $__templater->escape($__vars['xf']['options']['privacyPolicyUrl']) . '" target="_blank">privacy policy</a>.' . '
			';
		}
		$__finalCompiled .= $__templater->formRow('
			' . $__compilerTemp1 . '
		', array(
		)) . '
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
},
'submit_row' => function($__templater, array $__arguments, array $__vars)
{
	$__vars = $__templater->setupBaseParamsForMacro($__vars, false);
	$__finalCompiled = '';
	$__vars = $__templater->mergeMacroArguments(array(), $__arguments, $__vars);
	$__finalCompiled .= '
	';
	$__compilerTemp1 = '';
	if ($__vars['xf']['options']['registrationTimer']) {
		$__compilerTemp1 .= '
				<span id="js-regTimer" data-timer-complete="' . 'Register' . '">
					' . $__vars['xf']['language']['parenthesis_open'] . 'Please wait ' . ('<span>' . $__templater->escape($__vars['xf']['options']['registrationTimer']) . '</span>') . ' seconds.' . $__vars['xf']['language']['parenthesis_close'] . '
				</span>
			';
	} else {
		$__compilerTemp1 .= '
				' . 'Register' . '
			';
	}
	$__finalCompiled .= $__templater->formSubmitRow(array(
	), array(
		'html' => '
		' . $__templater->button('
			' . $__compilerTemp1 . '
		', array(
		'type' => 'submit',
		'class' => 'button--primary',
		'id' => 'js-signUpButton',
	), '', array(
	)) . '
	',
	)) . '
';
	return $__finalCompiled;
},), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

' . '

' . '

' . '

' . '

' . '

';
	return $__finalCompiled;
});