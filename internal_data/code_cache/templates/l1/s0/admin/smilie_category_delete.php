<?php
// FROM HASH: a1a517b60a21fae8433f7a5e1e9177ae
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
				<strong><a href="' . $__templater->fn('link', array('smilie-categories/edit', $__vars['smilieCategory'], ), true) . '">' . $__templater->escape($__vars['smilieCategory']['title']) . '</a></strong>
				<div class="blockMessage blockMessage--important blockMessage--iconic">' . 'Any smilies belonging to this category will be uncategorized following the deletion.' . '</div>
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
		'action' => $__templater->fn('link', array('smilie-categories/delete', $__vars['smilieCategory'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
});