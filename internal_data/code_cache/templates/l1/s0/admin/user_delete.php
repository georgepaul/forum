<?php
// FROM HASH: cf78fc05d90c6cd1d7020b2ec1d1fe37
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Confirm action');
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['user']['is_super_admin']) {
		$__compilerTemp1 .= '
				' . $__templater->formTextBoxRow(array(
			'name' => 'visitor_password',
			'type' => 'password',
		), array(
			'label' => 'Your password',
			'explain' => 'You must enter your current password to validate this request.',
		)) . '
			';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . 'Please confirm that you want to delete the following' . $__vars['xf']['language']['label_separator'] . '
				<strong><a href="' . $__templater->fn('link', array('users/edit', $__vars['user'], ), true) . '">' . $__templater->escape($__vars['user']['username']) . '</a></strong>
				' . 'This will not remove any content this user has already created.' . '
			', array(
		'rowtype' => 'confirm',
	)) . '
			' . $__compilerTemp1 . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'delete',
	), array(
		'rowtype' => ($__vars['user']['is_super_admin'] ? '' : 'simple'),
	)) . '
	</div>
	' . $__templater->fn('redirect_input', array(null, null, true)) . '
', array(
		'action' => $__templater->fn('link', array('users/delete', $__vars['user'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
});