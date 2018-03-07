<?php
// FROM HASH: 6dbdd40892457c2f92ebf072a759296b
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Confirm action');
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . 'Please confirm that you want to ban the following IP address' . $__vars['xf']['language']['label_separator'] . '
				<strong><a href="' . $__templater->fn('link', array('users/ip-users', null, array('ip' => $__vars['ip']['ip'], ), ), true) . '" dir="ltr">' . $__templater->escape($__vars['ip']['ip']) . '</a></strong>
			', array(
		'rowtype' => 'confirm',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'reason',
		'value' => $__vars['ip']['reason'],
		'maxlength' => $__templater->fn('max_length', array($__vars['ip'], 'reason', ), false),
	), array(
		'label' => 'Reason',
		'hint' => 'Optional',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'save',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->fn('link', array('banning/ips/add', null, array('ip' => $__vars['ip']['ip'], ), ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
});