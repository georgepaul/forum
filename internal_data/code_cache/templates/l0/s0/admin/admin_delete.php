<?php
// FROM HASH: b8d5209e96456fb3e405a9545b675de6
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Confirm action');
	$__finalCompiled .= '

' . $__templater->form('

	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . 'Please confirm that you want to remove the following user as an administrator' . $__vars['xf']['language']['label_separator'] . '
				<strong><a href="' . $__templater->fn('link', array('admins/edit', $__vars['admin'], ), true) . '">' . $__templater->escape($__vars['admin']['username']) . '</a></strong>
			', array(
		'rowtype' => 'confirm',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'visitor_password',
		'type' => 'password',
	), array(
		'label' => 'Your password',
		'explain' => 'You must enter your current password to validate this request.',
	)) . '
		</div>

		' . $__templater->formSubmitRow(array(
		'icon' => 'delete',
	), array(
	)) . '
	</div>

', array(
		'action' => $__templater->fn('link', array('admins/delete', $__vars['admin'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
});