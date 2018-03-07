<?php
// FROM HASH: f4d298c6319ec32ec5063ee246332215
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
				<strong><a href="' . $__templater->fn('link', array('style-properties/edit', $__vars['property'], ), true) . '">' . $__templater->escape($__vars['property']['title']) . '</a></strong>
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
		'action' => $__templater->fn('link', array('style-properties/delete', $__vars['property'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
});