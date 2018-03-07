<?php
// FROM HASH: f2f5621dd50fd40b4a1a8628dae29042
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	if ($__vars['providerData']['avatar_url']) {
		$__finalCompiled .= '
	<a href="https://profile.live.com/' . $__templater->escape($__vars['connectedAccounts']['microsoft']) . '" target="_blank">
		<img src="' . $__templater->escape($__vars['providerData']['avatar_url']) . '" width="48" alt="" />
	</a>
';
	}
	$__finalCompiled .= '
<div><a href="https://profile.live.com/' . $__templater->escape($__vars['connectedAccounts']['microsoft']) . '" target="_blank">' . ($__templater->escape($__vars['providerData']['username']) ?: 'Unknown account') . '</a></div>';
	return $__finalCompiled;
});