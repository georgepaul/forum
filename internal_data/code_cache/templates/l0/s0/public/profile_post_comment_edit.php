<?php
// FROM HASH: 1bbd3e6e47911736b130fd50f0042792
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Edit profile post comment');
	$__finalCompiled .= '

';
	$__templater->breadcrumb($__templater->preEscaped($__templater->escape($__vars['profilePost']['ProfileUser']['username'])), $__templater->fn('link', array('members', $__vars['profilePost']['ProfileUser'], ), false), array(
	));
	$__finalCompiled .= '
';
	$__templater->breadcrumb($__templater->preEscaped('Profile post by ' . $__templater->escape($__vars['profilePost']['username']) . ''), $__templater->fn('link', array('profile-posts', $__vars['profilePost'], ), false), array(
	));
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['quickEdit']) {
		$__compilerTemp1 .= '
				' . $__templater->formRow('
					' . $__templater->formTextArea(array(
			'name' => 'message',
			'value' => $__vars['comment']['message'],
			'autosize' => 'true',
			'maxlength' => $__vars['xf']['options']['profilePostMaxLength'],
		)) . '
				', array(
			'rowtype' => 'fullWidth noLabel',
		)) . '
			';
	} else {
		$__compilerTemp1 .= '
				' . $__templater->formTextAreaRow(array(
			'name' => 'message',
			'value' => $__vars['comment']['message'],
			'autosize' => 'true',
			'maxlength' => $__vars['xf']['options']['profilePostMaxLength'],
		), array(
			'label' => 'Message',
		)) . '
			';
	}
	$__compilerTemp2 = '';
	if ($__templater->method($__vars['comment'], 'canSendModeratorActionAlert', array())) {
		$__compilerTemp2 .= '
				' . $__templater->formRow('
					' . $__templater->callMacro('helper_action', 'author_alert', array(
			'row' => false,
		), $__vars) . '
				', array(
			'rowtype' => ($__vars['quickEdit'] ? 'fullWidth noLabel' : ''),
		)) . '
			';
	}
	$__compilerTemp3 = '';
	if ($__vars['quickEdit']) {
		$__compilerTemp3 .= '
			' . $__templater->formRow('
				' . $__templater->button('', array(
			'type' => 'submit',
			'class' => 'button--primary',
			'icon' => 'save',
		), '', array(
		)) . '
				' . $__templater->button('Cancel', array(
			'class' => 'js-cancelButton',
		), '', array(
		)) . '
			', array(
			'rowtype' => 'fullWidth noLabel',
		)) . '
		';
	} else {
		$__compilerTemp3 .= '
			' . $__templater->formSubmitRow(array(
			'icon' => 'save',
		), array(
		)) . '
		';
	}
	$__finalCompiled .= $__templater->form('
	<div class="' . ((!$__vars['quickEdit']) ? 'block-container' : '') . '">
		<div class="' . ((!$__vars['quickEdit']) ? 'block-body' : '') . '">
			' . $__compilerTemp1 . '

			' . $__compilerTemp2 . '
		</div>
		' . $__compilerTemp3 . '
	</div>
', array(
		'action' => $__templater->fn('link', array('profile-posts/comments/edit', $__vars['comment'], ), false),
		'class' => ((!$__vars['quickEdit']) ? 'block' : ''),
		'ajax' => 'true',
	));
	return $__finalCompiled;
});