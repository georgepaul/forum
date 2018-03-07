<?php
// FROM HASH: c909e55fdc35ac315a5362277618263f
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Confirm action');
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . 'Please confirm that you want to remove the following user as a super moderator' . $__vars['xf']['language']['label_separator'] . '
				<strong><a href="' . $__templater->fn('link', array('moderators/super/edit', $__vars['generalModerator'], ), true) . '">' . $__templater->escape($__vars['generalModerator']['User']['username']) . '</a></strong>
				' . 'If this user is a content-specific moderator as well, those moderation privileges will be removed as well.' . '
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
		'action' => $__templater->fn('link', array('moderators/super/delete', $__vars['generalModerator'], ), false),
		'class' => 'block',
	));
	return $__finalCompiled;
});