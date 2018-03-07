<?php
// FROM HASH: 8b4a929c4b51d2b4f746cf10473c92dc
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__vars['extraKeysInput'] = $__templater->preEscaped($__templater->callMacro('option_macros', 'input_name', array(
		'id' => 'extraCaptchaKeys',
	), $__vars));
	$__finalCompiled .= '
' . $__templater->formRadioRow(array(
		'name' => $__vars['inputName'],
		'value' => $__vars['option']['option_value'],
	), array(array(
		'value' => '',
		'label' => 'None',
		'_type' => 'option',
	),
	array(
		'value' => 'ReCaptcha',
		'data-hide' => 'true',
		'label' => 'Use reCAPTCHA',
		'hint' => 'No extra configuration is required for this CAPTCHA. But if you would like additional features, such as security preferences and analytics, you should get your own API keys from <a href="https://www.google.com/recaptcha" target="_blank">https://www.google.com/recaptcha</a> and enter them below.<br />
<br />
<strong>Note:</strong> You must also use your own API keys and explicitly enable invisible mode if you wish to use "invisible reCAPTCHA".',
		'_dependent' => array('
			<div>' . 'Site key' . $__vars['xf']['language']['label_separator'] . '</div>
			' . $__templater->formTextBox(array(
		'name' => $__vars['extraKeysInput'] . '[reCaptchaSiteKey]',
		'value' => $__vars['xf']['options']['extraCaptchaKeys']['reCaptchaSiteKey'],
	)) . '
		', '
			<div>' . 'Secret key' . $__vars['xf']['language']['label_separator'] . '</div>
			' . $__templater->formTextBox(array(
		'name' => $__vars['extraKeysInput'] . '[reCaptchaSecretKey]',
		'value' => $__vars['xf']['options']['extraCaptchaKeys']['reCaptchaSecretKey'],
	)) . '
		', '
			' . $__templater->formCheckBox(array(
	), array(array(
		'name' => $__vars['extraKeysInput'] . '[reCaptchaInvisible]',
		'selected' => $__vars['xf']['options']['extraCaptchaKeys']['reCaptchaInvisible'],
		'label' => 'Use invisible reCAPTCHA',
		'_type' => 'option',
	))) . '
		'),
		'_type' => 'option',
	),
	array(
		'value' => 'Question',
		'label' => 'Use question &amp; answer CAPTCHA',
		'hint' => '<a href="' . $__templater->fn('link', array('captcha-questions', ), true) . '">' . 'Define your questions' . '</a>',
		'_type' => 'option',
	),
	array(
		'value' => 'TextCaptcha',
		'data-hide' => 'true',
		'label' => 'Use textCAPTCHA',
		'hint' => '<a href="http://textcaptcha.com/" target="_blank">http://textcaptcha.com/</a>',
		'_dependent' => array('
			<div>' . 'API key' . $__vars['xf']['language']['label_separator'] . '</div>
			' . $__templater->formTextBox(array(
		'name' => $__vars['extraKeysInput'] . '[textCaptchaApiKey]',
		'value' => $__vars['xf']['options']['extraCaptchaKeys']['textCaptchaApiKey'],
	)) . '
		'),
		'_type' => 'option',
	),
	array(
		'value' => 'SolveMedia',
		'data-hide' => 'true',
		'label' => 'Use Solve Media',
		'hint' => '<a href="http://www.solvemedia.com/" target="_blank">http://www.solvemedia.com/</a>',
		'_dependent' => array('
			<div>' . 'Challenge key' . $__vars['xf']['language']['label_separator'] . '</div>
			' . $__templater->formTextBox(array(
		'name' => $__vars['extraKeysInput'] . '[solveMediaCKey]',
		'value' => $__vars['xf']['options']['extraCaptchaKeys']['solveMediaCKey'],
	)) . '
		', '
			<div>' . 'Verification key' . $__vars['xf']['language']['label_separator'] . '</div>
			' . $__templater->formTextBox(array(
		'name' => $__vars['extraKeysInput'] . '[solveMediaVKey]',
		'value' => $__vars['xf']['options']['extraCaptchaKeys']['solveMediaVKey'],
	)) . '
		'),
		'_type' => 'option',
	),
	array(
		'value' => 'KeyCaptcha',
		'data-hide' => 'true',
		'label' => 'Use KeyCAPTCHA',
		'hint' => '<a href="https://www.keycaptcha.com/" target="_blank">https://www.keycaptcha.com/</a>',
		'_dependent' => array('
			<div>' . 'User ID' . $__vars['xf']['language']['label_separator'] . '</div>
			' . $__templater->formTextBox(array(
		'name' => $__vars['extraKeysInput'] . '[keyCaptchaUserId]',
		'value' => $__vars['xf']['options']['extraCaptchaKeys']['keyCaptchaUserId'],
	)) . '
		', '
			<div>' . 'Private key' . $__vars['xf']['language']['label_separator'] . '</div>
			' . $__templater->formTextBox(array(
		'name' => $__vars['extraKeysInput'] . '[keyCaptchaPrivateKey]',
		'value' => $__vars['xf']['options']['extraCaptchaKeys']['keyCaptchaPrivateKey'],
	)) . '
		'),
		'_type' => 'option',
	)), array(
		'label' => $__templater->escape($__vars['option']['title']),
		'hint' => $__templater->escape($__vars['hintHtml']),
		'explain' => $__templater->escape($__vars['explainHtml']),
		'html' => '
		' . $__templater->escape($__vars['listedHtml']) . '
		' . $__templater->callMacro('option_macros', 'listed_html', array(
		'id' => 'extraCaptchaKeys',
	), $__vars) . '
	',
	));
	return $__finalCompiled;
});