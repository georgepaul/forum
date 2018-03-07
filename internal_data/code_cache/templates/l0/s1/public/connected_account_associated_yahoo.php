<?php
// FROM HASH: 507b29bab95552e830caa59250d51e73
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	if ($__vars['providerData']['avatar_url']) {
		$__finalCompiled .= '
	<img src="' . $__templater->escape($__vars['providerData']['avatar_url']) . '" width="48" alt="" />
';
	}
	$__finalCompiled .= '
<div>' . ($__templater->escape($__vars['providerData']['username']) ?: 'Unknown account') . '</div>';
	return $__finalCompiled;
});