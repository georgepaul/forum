<?php
// FROM HASH: fbc6c60c1c6dd0b151dfd840fc9b69fe
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->formTextBoxRow(array(
		'name' => 'options[live_publishable_key]',
		'value' => $__vars['profile']['options']['live_publishable_key'],
	), array(
		'label' => 'Live publishable key',
	)) . '

' . $__templater->formTextBoxRow(array(
		'name' => 'options[live_secret_key]',
		'value' => $__vars['profile']['options']['live_secret_key'],
	), array(
		'label' => 'Live secret key',
		'explain' => 'Enter the live secret and publishable keys from your <a href="https://dashboard.stripe.com/account/apikeys" target="_blank">Stripe Dashboard</a>.<br />
<br />
You will also need to set up a webhook endpoint in your Stripe account with the following URL: ' . $__templater->escape($__vars['xf']['options']['boardUrl']) . '/payment_callback.php?_xfProvider=stripe',
	)) . '

<hr class="formRowSep" />

' . $__templater->formTextBoxRow(array(
		'name' => 'options[test_publishable_key]',
		'value' => $__vars['profile']['options']['test_publishable_key'],
	), array(
		'label' => 'Test publishable key',
	)) . '

' . $__templater->formTextBoxRow(array(
		'name' => 'options[test_secret_key]',
		'value' => $__vars['profile']['options']['test_secret_key'],
	), array(
		'label' => 'Test secret key',
		'explain' => 'The test keys will only be used if <code>enableLivePayments</code> is set to false in <code>config.php</code>.<br />
<br /><b>Note:</b> Before accepting live payments, you must activate your Stripe account from the Stripe Dashboard.',
	)) . '

<hr class="formRowSep" />

' . $__templater->formCheckBoxRow(array(
	), array(array(
		'label' => 'Verify webhook with signing secret' . $__vars['xf']['language']['label_separator'],
		'selected' => $__vars['profile']['options']['signing_secret'],
		'_dependent' => array($__templater->formTextBox(array(
		'name' => 'options[signing_secret]',
		'value' => $__vars['profile']['options']['signing_secret'],
	))),
		'_type' => 'option',
	)), array(
		'explain' => 'To verify incoming webhook signatures and prevent replay attacks you must provide the &quot;Signing secret&quot; from your Stripe dashboard under the API > Webhooks section.',
	)) . '

<hr class="formRowSep" />

' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'options[apple_pay_enable]',
		'selected' => $__vars['profile']['options']['apple_pay_enable'],
		'label' => '
		' . 'Enable Apple Pay support' . '
	',
		'_type' => 'option',
	)), array(
		'explain' => 'Requires an Apple Developer account and additional setup in your Stripe Dashboard.',
	));
	return $__finalCompiled;
});