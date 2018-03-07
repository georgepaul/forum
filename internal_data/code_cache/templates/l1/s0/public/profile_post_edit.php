<?php
// FROM HASH: f2e3d8c163a8338857d768d8aee9887f
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Edit profile post');
	$__finalCompiled .= '

';
	$__templater->breadcrumb($__templater->preEscaped($__templater->escape($__vars['profileUser']['username'])), $__templater->fn('link', array('members', $__vars['profileUser'], ), false), array(
	));
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__templater->method($__vars['profilePost'], 'canSendModeratorActionAlert', array())) {
		$__compilerTemp1 .= '
				' . $__templater->formRow('
					' . $__templater->callMacro('helper_action', 'author_alert', array(
			'row' => false,
		), $__vars) . '
				', array(
			'rowtype' => ($__vars['quickEdit'] ? 'fullWidth noLabel' : ''),
		)) . '
			';
	}
	$__compilerTemp2 = '';
	if ($__vars['quickEdit']) {
		$__compilerTemp2 .= '
					' . $__templater->button('Cancel', array(
			'class' => 'js-cancelButton',
		), '', array(
		)) . '
				';
	}
	$__compilerTemp3 = '';
	if ($__vars['noInlineMod']) {
		$__compilerTemp3 .= '
		' . $__templater->formHiddenVal('_xfNoInlineMod', '1', array(
		)) . '
	';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			<span class="u-anchorTarget js-editContainer"></span>
			' . $__templater->formTextAreaRow(array(
		'name' => 'message',
		'value' => $__vars['profilePost']['message'],
		'autosize' => 'true',
		'maxlength' => $__vars['xf']['options']['profilePostMaxLength'],
	), array(
		'rowtype' => ($__vars['quickEdit'] ? 'fullWidth noLabel' : ''),
		'label' => 'Message',
	)) . '

			' . $__compilerTemp1 . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'save',
		'sticky' => 'true',
	), array(
		'rowtype' => ($__vars['quickEdit'] ? 'simple' : ''),
		'html' => '
				' . $__compilerTemp2 . '
			',
	)) . '
	</div>

	' . $__compilerTemp3 . '
', array(
		'action' => $__templater->fn('link', array('profile-posts/edit', $__vars['profilePost'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
});