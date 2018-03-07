<?php
// FROM HASH: 0024a0718e12b3da2ebc3b477636801e
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
				<strong>' . $__templater->escape($__vars['entry']['shortMessage']) . ' - ' . $__templater->escape($__vars['entry']['filename']) . ':' . $__templater->escape($__vars['entry']['line']) . '</strong>
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
', array(
		'action' => $__templater->fn('link', array('logs/server-errors/delete', $__vars['entry'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
});