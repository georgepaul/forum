<?php
// FROM HASH: 91df06d3da95a720367a40c40c6a45c2
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<a href="https://plus.google.com/u/0/' . $__templater->escape($__vars['connectedAccounts']['google']) . '" target="_blank">
	';
	if ($__vars['providerData']['avatar_url']) {
		$__finalCompiled .= '
		<img src="' . $__templater->escape($__vars['providerData']['avatar_url']) . '" width="48" alt="" />
	';
	}
	$__finalCompiled .= '
</a>
<div><a href="https://plus.google.com/u/0/' . $__templater->escape($__vars['connectedAccounts']['google']) . '" target="_blank">' . ($__templater->escape($__vars['providerData']['username']) ?: 'Unknown account') . '</a></div>';
	return $__finalCompiled;
});