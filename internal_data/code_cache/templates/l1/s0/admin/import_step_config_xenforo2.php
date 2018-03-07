<?php
// FROM HASH: f53b5033f22ff3436491493a0aa574b5
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	if ($__templater->fn('in_array', array('users', $__vars['steps'], ), false)) {
		$__finalCompiled .= '
	' . $__templater->callMacro('import_macros', 'step_users_config', array(
			'config' => $__vars['config'],
		), $__vars) . '
';
	}
	return $__finalCompiled;
});