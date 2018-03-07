<?php
// FROM HASH: 684ba6c9b92b555f3e0f3a05b6b8b6a2
return array('macros' => array('quick_filter' => function($__templater, array $__arguments, array $__vars)
{
	$__vars = $__templater->setupBaseParamsForMacro($__vars, false);
	$__finalCompiled = '';
	$__vars = $__templater->mergeMacroArguments(array(
		'key' => '',
		'ajax' => '',
		'class' => '',
	), $__arguments, $__vars);
	$__finalCompiled .= '
	';
	$__templater->includeJs(array(
		'src' => 'xf/filter.js',
		'min' => '1',
	));
	$__finalCompiled .= '
	<div class="' . $__templater->escape($__vars['class']) . ' quickFilter u-jsOnly" data-xf-init="filter" data-key="' . $__templater->escape($__vars['key']) . '" data-ajax="' . $__templater->escape($__vars['ajax']) . '">
		<div class="inputGroup inputGroup--inline inputGroup--joined">
			<input type="text" class="input js-filterInput" placeholder="' . 'Filter' . $__vars['xf']['language']['ellipsis'] . '" data-xf-key="' . 'f' . '" />
			' . $__templater->formCheckBox(array(
		'standalone' => 'true',
	), array(array(
		'labelclass' => 'inputGroup-text',
		'class' => 'js-filterPrefix',
		'label' => 'Prefix',
		'_type' => 'option',
	))) . '
			<i class="inputGroup-text js-filterClear is-disabled" aria-hidden="true"></i>
		</div>
	</div>
';
	return $__finalCompiled;
},), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
';
	return $__finalCompiled;
});