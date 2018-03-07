<?php
// FROM HASH: 4c6b23aa4a097d35b8b2545746668ba1
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Confirm action');
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . 'Please confirm that you want to remove the following user as a moderator' . $__vars['xf']['language']['label_separator'] . '
				<strong><a href="' . $__templater->fn('link', array('moderators/content/edit', $__vars['contentModerator'], ), true) . '">' . $__templater->escape($__vars['contentModerator']['User']['username']) . '</a> ' . $__templater->filter($__vars['contentTitle'], array(array('parens', array()),), true) . '</strong>
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
		'action' => $__templater->fn('link', array('moderators/content/delete', $__vars['contentModerator'], ), false),
		'class' => 'block',
	));
	return $__finalCompiled;
});