<?php
// FROM HASH: 8f52836cce312faa996282b0d4b79781
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__compilerTemp1 = '';
	if ($__templater->method($__vars['xf']['visitor'], 'canBypassUserPrivacy', array()) AND $__vars['user']['email']) {
		$__compilerTemp1 .= '
			<li>' . $__templater->escape($__vars['user']['email']) . '</li>
		';
	}
	$__finalCompiled .= $__templater->formRow('
	' . $__templater->fn('avatar', array($__vars['content'], 's', false, array(
	))) . '
	<ul class="listInline listInline--bullet">
		<li>' . $__templater->fn('username_link', array($__vars['content'], true, array(
	))) . '</li>
		' . $__compilerTemp1 . '
	</ul>
', array(
		'label' => 'User',
	)) . '

';
	$__vars['userIp'] = $__templater->method($__vars['user'], 'getIp', array('register', ));
	$__finalCompiled .= '
';
	if ($__templater->method($__vars['xf']['visitor'], 'canViewIps', array()) AND $__vars['userIp']) {
		$__finalCompiled .= '
	' . $__templater->formRow('
		<a href="' . $__templater->fn('link', array('misc/ip-info', null, array('ip' => $__templater->filter($__vars['userIp'], array(array('ip', array()),), false), ), ), true) . '" target="_blank">' . $__templater->filter($__vars['userIp'], array(array('ip', array()),), true) . '</a>
	', array(
			'label' => 'IP address',
		)) . '
';
	}
	$__finalCompiled .= '

' . $__templater->formRow('
	' . $__templater->fn('date_dynamic', array($__vars['content']['register_date'], array(
	))) . '
', array(
		'label' => 'Register date',
	)) . '

';
	$__vars['fromRegFields'] = $__templater->preEscaped(trim('
	' . $__templater->callMacro('custom_fields_macros', 'custom_fields_view', array(
		'type' => 'users',
		'group' => null,
		'set' => $__vars['user']['Profile']['custom_fields'],
		'additionalFilters' => array('registration', ),
	), $__vars) . '
'));
	$__finalCompiled .= '
';
	if (!$__templater->test($__vars['fromRegFields'], 'empty', array())) {
		$__finalCompiled .= '
	' . $__templater->formRow('
		' . $__templater->escape($__vars['fromRegFields']) . '
	', array(
			'label' => 'Custom fields',
		)) . '
';
	}
	$__finalCompiled .= '

' . $__templater->callMacro('approval_queue_macros', 'spam_log', array(
		'spamDetails' => $__vars['spamDetails'],
	), $__vars) . '

';
	if ($__vars['changesGrouped']) {
		$__finalCompiled .= '
	';
		$__compilerTemp2 = '';
		if ($__templater->isTraversable($__vars['changesGrouped'])) {
			foreach ($__vars['changesGrouped'] AS $__vars['group']) {
				$__compilerTemp2 .= '
				<tbody class="dataList-rowGroup">
				';
				if ($__templater->isTraversable($__vars['group']['changes'])) {
					foreach ($__vars['group']['changes'] AS $__vars['change']) {
						$__compilerTemp2 .= '
					' . $__templater->dataRow(array(
						), array(array(
							'_type' => 'cell',
							'html' => $__templater->escape($__vars['change']['label']),
						),
						array(
							'_type' => 'cell',
							'html' => $__templater->escape($__vars['change']['old']),
						),
						array(
							'_type' => 'cell',
							'html' => $__templater->escape($__vars['change']['new']),
						))) . '
				';
					}
				}
				$__compilerTemp2 .= '
				</tbody>
			';
			}
		}
		$__finalCompiled .= $__templater->formRow('
		' . $__templater->dataList('
			<thead>
			' . $__templater->dataRow(array(
			'rowtype' => 'header',
		), array(array(
			'_type' => 'cell',
			'html' => 'Field name',
		),
		array(
			'_type' => 'cell',
			'html' => 'Old value',
		),
		array(
			'_type' => 'cell',
			'html' => 'New value',
		))) . '
			</thead>
			' . $__compilerTemp2 . '
		', array(
			'data-xf-init' => 'responsive-data-list',
			'class' => 'dataList--separated',
		)) . '
	', array(
			'label' => 'Change log',
			'rowclass' => 'formRow--valueToEdge',
		)) . '
';
	}
	$__finalCompiled .= '

' . $__templater->formRadioRow(array(
		'name' => 'queue[' . $__vars['unapprovedItem']['content_type'] . '][' . $__vars['unapprovedItem']['content_id'] . ']',
	), array(array(
		'value' => '',
		'checked' => 'checked',
		'label' => 'Do nothing',
		'_type' => 'option',
	),
	array(
		'value' => 'approve',
		'label' => 'Approve',
		'_type' => 'option',
	),
	array(
		'value' => 'reject',
		'label' => 'Reject with rejection reason' . $__vars['xf']['language']['label_separator'],
		'_dependent' => array($__templater->formTextBox(array(
		'name' => 'reason[' . $__vars['unapprovedItem']['content_type'] . '][' . $__vars['unapprovedItem']['content_id'] . ']',
		'maxlength' => $__templater->fn('max_length', array('XF:UserReject', 'reject_reason', ), false),
		'placeholder' => 'Optional',
	))),
		'html' => '
			<div class="formRow-explain">' . 'Rejected users will not be deleted but their user state will be set to \'rejected\'. If a reason is provided above, it will be displayed when they next log in.' . '</div>
		',
		'_type' => 'option',
	)), array(
		'label' => 'Action',
	)) . '

' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'notify[' . $__vars['unapprovedItem']['content_type'] . '][' . $__vars['unapprovedItem']['content_id'] . ']',
		'value' => '1',
		'checked' => (!$__vars['spamDetails']),
		'label' => '
		' . 'Notify user if action was taken' . '
	',
		'_type' => 'option',
	)), array(
	));
	return $__finalCompiled;
});