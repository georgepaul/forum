<?php
// FROM HASH: 0e91eac1585c79f3c9c11d3bddbe6b70
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	if ($__vars['providerData']['profile_link']) {
		$__finalCompiled .= '
	<a href="' . $__templater->escape($__vars['providerData']['profile_link']) . '" target="_blank">
		<img src="' . ($__templater->escape($__vars['providerData']['avatar_url']) ?: 'https://avatars.githubusercontent.com/u/{$connectedAccounts.github}?v=3') . '" width="48" alt="" />
	</a>
	<div><a href="' . $__templater->escape($__vars['providerData']['profile_link']) . '" target="_blank">' . ($__templater->escape($__vars['providerData']['username']) ?: 'Unknown account') . '</a></div>
';
	} else {
		$__finalCompiled .= '
	<img src="h' . ($__templater->escape($__vars['providerData']['avatar_url']) ?: 'https://avatars.githubusercontent.com/u/{$connectedAccounts.github}?v=3') . '" width="48" alt="" />
	<div>' . ($__templater->escape($__vars['providerData']['username']) ?: 'Unknown account') . '</div>
';
	}
	return $__finalCompiled;
});