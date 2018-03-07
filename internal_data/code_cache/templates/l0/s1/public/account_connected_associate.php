<?php
// FROM HASH: 63073fd0b9655a092b34ef679da6a618
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Associate with ' . $__templater->escape($__vars['provider']['title']) . '');
	$__finalCompiled .= '

';
	$__compilerTemp1 = $__vars;
	$__compilerTemp1['pageSelected'] = 'connected_account';
	$__templater->wrapTemplate('account_wrapper', $__compilerTemp1);
	$__finalCompiled .= '

';
	$__compilerTemp2 = '';
	if ($__vars['passwordEmailed']) {
		$__compilerTemp2 .= '
				' . $__templater->formInfoRow('
					<div class="blockMessage blockMessage--important blockMessage--iconic">' . 'To confirm your identity, we have sent an email to ' . $__templater->escape($__vars['user']['email']) . ' inviting you to create a password. Once you have followed that link, please enter your new password below.' . '</div>
				', array(
		)) . '
			';
	}
	$__finalCompiled .= $__templater->form('

	<div class="block-container">
		<div class="block-body">
			' . $__compilerTemp2 . '

			' . $__templater->formRow('
				' . $__templater->escape($__vars['xf']['visitor']['username']) . '
			', array(
		'label' => 'Associate with',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'password',
		'type' => 'password',
	), array(
		'label' => 'Password',
		'explain' => 'This is the password of the ' . $__templater->escape($__vars['xf']['options']['boardTitle']) . ' account that you wish to associate with.',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Associate',
	), array(
	)) . '
	</div>
	' . $__templater->fn('redirect_input', array($__vars['redirect'], null, true)) . '
', array(
		'action' => $__templater->fn('link', array('register/connected-accounts/associate', $__vars['provider'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
});