<?php
// FROM HASH: ae10165c269d126047a91ea51ef95034
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	if (!$__vars['providerData']) {
		$__finalCompiled .= '
	' . $__templater->callMacro('connected_account_provider_test_macros', 'explain', array(
			'providerTitle' => $__vars['provider']['title'],
			'keyName' => 'Client ID',
			'keyValue' => $__vars['provider']['options']['client_id'],
		), $__vars) . '
';
	} else {
		$__finalCompiled .= '
	' . $__templater->callMacro('connected_account_provider_test_macros', 'success', array(), $__vars) . '

	' . $__templater->callMacro('connected_account_provider_test_macros', 'display_name', array(
			'name' => $__vars['providerData']['username'],
		), $__vars) . '

	' . $__templater->callMacro(null, 'picture', array(
			'url' => $__vars['providerData']['avatar_url'],
		), $__vars) . '
';
	}
	return $__finalCompiled;
});