<?php
// FROM HASH: f0610782b488d78ef8be05cbcee0a1c3
return array('macros' => array('associate' => function($__templater, array $__arguments, array $__vars)
{
	$__vars = $__templater->setupBaseParamsForMacro($__vars, false);
	$__finalCompiled = '';
	$__vars = $__templater->mergeMacroArguments(array(
		'provider' => '!',
	), $__arguments, $__vars);
	$__finalCompiled .= '
	' . $__templater->formRow('

		' . $__templater->button('
			' . 'Associate with ' . $__templater->escape($__vars['provider']['title']) . '' . '
		', array(
		'href' => $__templater->fn('link', array('register/connected-accounts', $__vars['provider'], array('setup' => true, ), ), false),
		'class' => 'button--provider button--provider--' . $__vars['provider']['provider_id'],
	), '', array(
	)) . '
	', array(
		'label' => $__templater->escape($__vars['provider']['title']),
		'explain' => $__templater->filter($__vars['provider']['description'], array(array('raw', array()),), true),
	)) . '
';
	return $__finalCompiled;
},
'disassociate' => function($__templater, array $__arguments, array $__vars)
{
	$__vars = $__templater->setupBaseParamsForMacro($__vars, false);
	$__finalCompiled = '';
	$__vars = $__templater->mergeMacroArguments(array(
		'provider' => '!',
		'hasPassword' => '!',
	), $__arguments, $__vars);
	$__finalCompiled .= '
	';
	$__vars['explain'] = (((!$__vars['hasPassword']) AND ($__templater->fn('count', array($__vars['xf']['visitor']['Profile']['connected_accounts'], ), false) == 1)) ? 'Disassociating with all external accounts will cause a password to be generated for your account and emailed to ' . $__vars['xf']['visitor']['email'] . '.' : '');
	$__finalCompiled .= '
	' . $__templater->formRow('

		<div>' . $__templater->filter($__templater->method($__vars['provider'], 'renderAssociated', array()), array(array('raw', array()),), true) . '</div>

		' . $__templater->form('
			' . $__templater->formCheckBox(array(
	), array(array(
		'name' => 'disassociate',
		'label' => 'Disassociate ' . $__templater->escape($__vars['provider']['title']) . ' account',
		'_dependent' => array('
						' . $__templater->button('Confirm disassociation', array(
		'type' => 'submit',
	), '', array(
	)) . '
					'),
		'_type' => 'option',
	))) . '
		', array(
		'action' => $__templater->fn('link', array('account/connected-accounts/disassociate', $__vars['provider'], ), false),
		'class' => 'u-inputSpacer',
	)) . '
	', array(
		'label' => $__templater->escape($__vars['provider']['title']),
		'explain' => $__templater->escape($__vars['explain']),
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