<?php
// FROM HASH: 979bb583edf10c70271363a3d0004a0e
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Preferences');
	$__finalCompiled .= '

';
	$__templater->wrapTemplate('account_wrapper', $__vars);
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__templater->method($__vars['xf']['visitor'], 'canChangeStyle', array())) {
		$__compilerTemp1 .= '

				';
		$__compilerTemp2 = array(array(
			'value' => '0',
			'label' => 'Use default style' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['defaultStyle']['title']),
			'_type' => 'option',
		));
		$__compilerTemp2[] = array(
			'label' => 'Styles' . $__vars['xf']['language']['label_separator'],
			'_type' => 'optgroup',
			'options' => array(),
		);
		end($__compilerTemp2); $__compilerTemp3 = key($__compilerTemp2);
		if ($__templater->isTraversable($__vars['styles'])) {
			foreach ($__vars['styles'] AS $__vars['style']) {
				$__compilerTemp2[$__compilerTemp3]['options'][] = array(
					'value' => $__vars['style']['style_id'],
					'label' => $__templater->fn('repeat', array('--', $__vars['style']['depth'], ), true) . ' ' . $__templater->escape($__vars['style']['title']) . ((!$__vars['style']['user_selectable']) ? ' *' : ''),
					'_type' => 'option',
				);
			}
		}
		$__compilerTemp1 .= $__templater->formSelectRow(array(
			'name' => 'user[style_id]',
			'value' => $__vars['xf']['visitor']['style_id'],
		), $__compilerTemp2, array(
			'label' => 'Style',
		)) . '
			';
	} else {
		$__compilerTemp1 .= '
				' . $__templater->formHiddenVal('user[style_id]', $__vars['xf']['visitor']['style_id'], array(
		)) . '
			';
	}
	$__compilerTemp4 = '';
	if ($__templater->method($__vars['xf']['visitor'], 'canChangeLanguage', array())) {
		$__compilerTemp4 .= '
				';
		$__compilerTemp5 = array();
		$__compilerTemp6 = $__templater->method($__vars['languageTree'], 'getFlattened', array(0, ));
		if ($__templater->isTraversable($__compilerTemp6)) {
			foreach ($__compilerTemp6 AS $__vars['treeEntry']) {
				$__compilerTemp5[] = array(
					'value' => $__vars['treeEntry']['record']['language_id'],
					'label' => $__templater->fn('repeat', array('--', $__vars['treeEntry']['depth'], ), true) . ' ' . $__templater->escape($__vars['treeEntry']['record']['title']),
					'_type' => 'option',
				);
			}
		}
		$__compilerTemp4 .= $__templater->formSelectRow(array(
			'name' => 'user[language_id]',
			'value' => $__vars['xf']['visitor']['language_id'],
		), $__compilerTemp5, array(
			'label' => 'Language',
		)) . '
			';
	} else {
		$__compilerTemp4 .= '
				' . $__templater->formHiddenVal('user[language_id]', ($__vars['xf']['visitor']['language_id'] ? $__vars['xf']['visitor']['language_id'] : $__vars['xf']['options']['defaultLanguageId']), array(
		)) . '
			';
	}
	$__compilerTemp7 = $__templater->mergeChoiceOptions(array(), $__vars['timeZones']);
	$__compilerTemp8 = '';
	if ($__vars['xf']['options']['enableNotices'] AND ($__templater->fn('count', array($__vars['xf']['session']['dismissedNotices'], ), false) > 0)) {
		$__compilerTemp8 .= '
				<hr class="formRowSep" />

				' . $__templater->formCheckBoxRow(array(
		), array(array(
			'name' => 'restore_notices',
			'label' => 'Restore dismissed notices',
			'hint' => 'Any notices you have previously dismissed will be restored to view if you check this option.',
			'_type' => 'option',
		)), array(
		)) . '
			';
	}
	$__vars['showLabel'] = true;
	$__compilerTemp9 = '';
	if ($__templater->isTraversable($__vars['alertOptOuts'])) {
		foreach ($__vars['alertOptOuts'] AS $__vars['contentType'] => $__vars['options']) {
			$__compilerTemp9 .= '
				';
			$__compilerTemp10 = array();
			if ($__templater->isTraversable($__vars['options'])) {
				foreach ($__vars['options'] AS $__vars['action'] => $__vars['label']) {
					$__compilerTemp10[] = array(
						'name' => 'alert[' . $__vars['contentType'] . '_' . $__vars['action'] . ']',
						'checked' => $__templater->method($__vars['xf']['visitor']['Option'], 'doesReceiveAlert', array($__vars['contentType'], $__vars['action'], )),
						'label' => '
							' . $__templater->escape($__vars['label']) . '
						',
						'_type' => 'option',
					);
				}
			}
			$__compilerTemp9 .= $__templater->formCheckBoxRow(array(
			), $__compilerTemp10, array(
				'rowtype' => 'noColon',
				'label' => ($__vars['showLabel'] ? 'Receive an alert when someone' . $__vars['xf']['language']['ellipsis'] : ''),
			)) . '
				';
			$__vars['showLabel'] = false;
			$__compilerTemp9 .= '
			';
		}
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__compilerTemp1 . '

			' . $__compilerTemp4 . '

			' . $__templater->formSelectRow(array(
		'name' => 'user[timezone]',
		'value' => $__vars['xf']['visitor']['timezone'],
	), $__compilerTemp7, array(
		'label' => 'Time zone',
	)) . '
			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'value' => 'watch_no_email',
		'name' => 'option[creation_watch_state]',
		'checked' => ($__vars['xf']['visitor']['Option']['creation_watch_state'] ? true : false),
		'label' => 'Automatically watch content you create' . $__vars['xf']['language']['ellipsis'],
		'_dependent' => array($__templater->formCheckBox(array(
	), array(array(
		'value' => 'watch_email',
		'name' => 'option[creation_watch_state]',
		'checked' => ($__vars['xf']['visitor']['Option']['creation_watch_state'] == 'watch_email'),
		'label' => 'and receive email notifications',
		'_type' => 'option',
	)))),
		'_type' => 'option',
	),
	array(
		'value' => 'watch_no_email',
		'name' => 'option[interaction_watch_state]',
		'checked' => ($__vars['xf']['visitor']['Option']['interaction_watch_state'] ? true : false),
		'label' => 'Automatically watch content you interact with' . $__vars['xf']['language']['ellipsis'],
		'_dependent' => array($__templater->formCheckBox(array(
	), array(array(
		'value' => 'watch_email',
		'name' => 'option[interaction_watch_state]',
		'checked' => ($__vars['xf']['visitor']['Option']['interaction_watch_state'] == 'watch_email'),
		'label' => 'and receive email notifications',
		'_type' => 'option',
	)))),
		'_type' => 'option',
	),
	array(
		'name' => 'option[email_on_conversation]',
		'checked' => $__vars['xf']['visitor']['Option']['email_on_conversation'],
		'label' => 'Receive email when a new conversation message is received',
		'_type' => 'option',
	),
	array(
		'name' => 'option[receive_admin_email]',
		'checked' => $__vars['xf']['visitor']['Option']['receive_admin_email'],
		'label' => 'Receive site mailings',
		'hint' => 'You will receive a copy of emails sent by the administrator to all members of the site.',
		'_type' => 'option',
	),
	array(
		'name' => 'option[content_show_signature]',
		'checked' => $__vars['xf']['visitor']['Option']['content_show_signature'],
		'label' => 'Show people\'s signatures with their messages',
		'_type' => 'option',
	)), array(
	)) . '
			' . $__templater->callMacro('helper_account', 'activity_privacy_row', array(), $__vars) . '

			' . $__templater->callMacro('custom_fields_macros', 'custom_fields_edit', array(
		'type' => 'users',
		'group' => 'preferences',
		'set' => $__vars['xf']['visitor']['Profile']['custom_fields'],
	), $__vars) . '

			' . $__compilerTemp8 . '
		</div>

		<h2 class="block-formSectionHeader"><span class="block-formSectionHeader-aligner">' . 'Alert preferences' . '</span></h2>
		<div class="block-body">
			' . '' . '

			' . $__compilerTemp9 . '
		</div>

		' . $__templater->formSubmitRow(array(
		'icon' => 'save',
		'sticky' => 'true',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->fn('link', array('account/preferences', ), false),
		'ajax' => 'true',
		'class' => 'block',
		'data-force-flash-message' => 'true',
	));
	return $__finalCompiled;
});