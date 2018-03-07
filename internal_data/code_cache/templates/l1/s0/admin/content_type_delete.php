<?php
// FROM HASH: c4b6d96ee7007aab7adc4863a457f037
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
				<strong><a href="' . $__templater->fn('link', array('content-types/edit', $__vars['field'], ), true) . '">' . $__templater->escape($__vars['field']['content_type']) . ' - ' . $__templater->escape($__vars['field']['field_name']) . '</a></strong>
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
		'action' => $__templater->fn('link', array('content-types/delete', $__vars['field'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
});