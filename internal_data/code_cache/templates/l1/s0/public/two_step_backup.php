<?php
// FROM HASH: ec95d434b8fea7139d641fa5546c3ec6
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->formInfoRow('A backup code can be used when you don\'t have access to an alternative verification method. Once a backup code is used, it will no longer be usable. You will receive an email when you login using a backup code.', array(
	)) . '

' . $__templater->formTextBoxRow(array(
		'name' => 'code',
		'autofocus' => 'autofocus',
	), array(
		'label' => 'Backup code',
	));
	return $__finalCompiled;
});