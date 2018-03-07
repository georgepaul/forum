<?php
// FROM HASH: 1d92038934af882ee226cb0731615e18
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Confirm action');
	$__finalCompiled .= '

' . $__templater->form('

	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . 'Please confirm that you want to delete the following' . $__vars['xf']['language']['label_separator'] . '
				<strong><a href="' . $__templater->fn('link', array('style-properties/groups/edit', $__vars['group'], ), true) . '">' . $__templater->escape($__vars['group']['title']) . '</a></strong>
			', array(
		'rowtype' => 'confirm',
	)) . '
		</div>

		' . $__templater->formSubmitRow(array(
		'icon' => 'delete',
	), array(
		'rowtype' => 'simple',
	)) . '
	</div>

	' . $__templater->fn('redirect_input', array(null, null, true)) . '

', array(
		'action' => $__templater->fn('link', array('style-properties/groups/delete', $__vars['group'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
});