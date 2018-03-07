<?php
// FROM HASH: c8415f33699f3abf769344d4014860ad
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Contact us');
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if (!$__vars['xf']['visitor']['user_id']) {
		$__compilerTemp1 .= '
				' . $__templater->formTextBoxRow(array(
			'name' => 'username',
			'autofocus' => 'autofocus',
			'maxlength' => $__templater->fn('max_length', array($__vars['xf']['visitor'], 'username', ), false),
		), array(
			'label' => 'Your name',
		)) . '

				' . $__templater->formTextBoxRow(array(
			'name' => 'email',
			'maxlength' => $__templater->fn('max_length', array($__vars['xf']['visitor'], 'email', ), false),
			'type' => 'email',
		), array(
			'label' => 'Your email address',
		)) . '
			';
	} else {
		$__compilerTemp1 .= '
				' . $__templater->formRow($__templater->escape($__vars['xf']['visitor']['username']), array(
			'label' => 'Your name',
		)) . '
				';
		if ($__vars['xf']['visitor']['email']) {
			$__compilerTemp1 .= '

					' . $__templater->formRow($__templater->escape($__vars['xf']['visitor']['email']), array(
				'label' => 'Your email address',
			)) . '

				';
		} else {
			$__compilerTemp1 .= '

					' . $__templater->formTextBoxRow(array(
				'name' => 'email',
				'type' => 'email',
			), array(
				'label' => 'Your email address',
			)) . '

				';
		}
		$__compilerTemp1 .= '
			';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__compilerTemp1 . '

			' . $__templater->formRowIfContent($__templater->fn('captcha', array(false)), array(
		'label' => 'Verification',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'subject',
	), array(
		'label' => 'Subject',
	)) . '

			' . $__templater->formTextAreaRow(array(
		'name' => 'message',
		'rows' => '5',
		'autosize' => 'true',
	), array(
		'label' => 'Message',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Send',
	), array(
	)) . '
	</div>
	' . $__templater->fn('redirect_input', array(null, null, true)) . '
', array(
		'action' => $__templater->fn('link', array('misc/contact', ), false),
		'class' => 'block',
		'ajax' => 'true',
		'data-force-flash-message' => 'true',
	));
	return $__finalCompiled;
});