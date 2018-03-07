<?php
// FROM HASH: 8449eceb2912e9e691da8537e0162c77
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__compilerTemp1 = '';
	if (!$__templater->test($__vars['prefixes'], 'empty', array())) {
		$__compilerTemp1 .= '
		<div class="menu-row menu-row--separated">
			' . 'Prefix' . $__vars['xf']['language']['label_separator'] . '
			<div class="u-inputSpacer">
				' . $__templater->callMacro('prefix_macros', 'select', array(
			'prefixes' => $__vars['prefixes'],
			'type' => 'thread',
			'selected' => ($__vars['filters']['prefix_id'] ? $__vars['filters']['prefix_id'] : 0),
			'name' => 'prefix_id',
			'noneLabel' => $__vars['xf']['language']['parenthesis_open'] . 'Any' . $__vars['xf']['language']['parenthesis_close'],
		), $__vars) . '
			</div>
		</div>
	';
	}
	$__finalCompiled .= $__templater->form('
	' . '
	' . $__compilerTemp1 . '

	' . '
	<div class="menu-row menu-row--separated">
		' . 'Started by' . $__vars['xf']['language']['label_separator'] . '
		<div class="u-inputSpacer">
			' . $__templater->formTextBox(array(
		'name' => 'starter',
		'value' => ($__vars['starterFilter'] ? $__vars['starterFilter']['username'] : ''),
		'ac' => 'single',
		'maxlength' => $__templater->fn('max_length', array($__vars['xf']['visitor'], 'username', ), false),
	)) . '
		</div>
	</div>

	' . '
	<div class="menu-row menu-row--separated">
		' . 'Last updated' . $__vars['xf']['language']['label_separator'] . '
		<div class="u-inputSpacer">
			' . $__templater->formSelect(array(
		'name' => 'last_days',
		'value' => ($__vars['filters']['last_days'] ?: $__vars['forum']['list_date_limit_days']),
	), array(array(
		'value' => '-1',
		'label' => 'Any time',
		'_type' => 'option',
	),
	array(
		'value' => '7',
		'label' => '' . '7' . ' days',
		'_type' => 'option',
	),
	array(
		'value' => '14',
		'label' => '' . '14' . ' days',
		'_type' => 'option',
	),
	array(
		'value' => '30',
		'label' => '' . '30' . ' days',
		'_type' => 'option',
	),
	array(
		'value' => '60',
		'label' => '' . '2' . ' months',
		'_type' => 'option',
	),
	array(
		'value' => '90',
		'label' => '' . '3' . ' months',
		'_type' => 'option',
	),
	array(
		'value' => '182',
		'label' => '' . '6' . ' months',
		'_type' => 'option',
	),
	array(
		'value' => '365',
		'label' => '1 year',
		'_type' => 'option',
	))) . '
		</div>
	</div>

	' . '
	<div class="menu-row menu-row--separated">
		' . 'Sort by' . $__vars['xf']['language']['label_separator'] . '
		<div class="inputGroup u-inputSpacer">
			' . $__templater->formSelect(array(
		'name' => 'order',
		'value' => ($__vars['filters']['order'] ?: $__vars['forum']['default_sort_order']),
	), array(array(
		'value' => 'last_post_date',
		'label' => 'Last message',
		'_type' => 'option',
	),
	array(
		'value' => 'post_date',
		'label' => 'First message',
		'_type' => 'option',
	),
	array(
		'value' => 'title',
		'label' => 'Title',
		'_type' => 'option',
	),
	array(
		'value' => 'reply_count',
		'label' => 'Replies',
		'_type' => 'option',
	),
	array(
		'value' => 'view_count',
		'label' => 'Views',
		'_type' => 'option',
	),
	array(
		'value' => 'first_post_likes',
		'label' => 'First message likes',
		'_type' => 'option',
	))) . '
			<span class="inputGroup-splitter"></span>
			' . $__templater->formSelect(array(
		'name' => 'direction',
		'value' => ($__vars['filters']['direction'] ?: $__vars['forum']['default_sort_direction']),
	), array(array(
		'value' => 'desc',
		'label' => 'Descending',
		'_type' => 'option',
	),
	array(
		'value' => 'asc',
		'label' => 'Ascending',
		'_type' => 'option',
	))) . '
		</div>
	</div>

	<div class="menu-footer">
		<span class="menu-footer-controls">
			' . $__templater->button('Filter', array(
		'type' => 'submit',
		'class' => 'button--primary',
	), '', array(
	)) . '
		</span>
	</div>
	' . $__templater->formHiddenVal('apply', '1', array(
	)) . '
', array(
		'action' => $__templater->fn('link', array('forums/filters', $__vars['forum'], ), false),
	));
	return $__finalCompiled;
});