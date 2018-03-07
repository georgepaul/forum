<?php
// FROM HASH: 0d56e9703ae1ff67e7ed09b5d3689a91
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
				<strong><a href="' . $__templater->fn('link', array('widgets/positions/edit', $__vars['widgetPosition'], ), true) . '">' . $__templater->escape($__vars['widgetPosition']['position_id']) . '</a></strong>
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
		'action' => $__templater->fn('link', array('widgets/positions/delete', $__vars['widgetPosition'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
});