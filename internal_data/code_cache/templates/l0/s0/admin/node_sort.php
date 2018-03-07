<?php
// FROM HASH: 44e0eb01559a468055348346f251e9f8
return array('macros' => array('node_list' => function($__templater, array $__arguments, array $__vars)
{
	$__vars = $__templater->setupBaseParamsForMacro($__vars, false);
	$__finalCompiled = '';
	$__vars = $__templater->mergeMacroArguments(array(
		'children' => '!',
	), $__arguments, $__vars);
	$__finalCompiled .= '
	<ol class="nestable-list">
		';
	if ($__templater->isTraversable($__vars['children'])) {
		foreach ($__vars['children'] AS $__vars['id'] => $__vars['child']) {
			$__finalCompiled .= '
			' . $__templater->callMacro(null, 'node_list_entry', array(
				'node' => $__vars['child'],
				'children' => $__vars['child']['children'],
			), $__vars) . '
		';
		}
	}
	$__finalCompiled .= '
	</ol>
';
	return $__finalCompiled;
},
'node_list_entry' => function($__templater, array $__arguments, array $__vars)
{
	$__vars = $__templater->setupBaseParamsForMacro($__vars, false);
	$__finalCompiled = '';
	$__vars = $__templater->mergeMacroArguments(array(
		'node' => '!',
		'children' => '!',
	), $__arguments, $__vars);
	$__finalCompiled .= '
	<li class="nestable-item" data-id="' . $__templater->escape($__vars['node']['id']) . '">
		<div class="nestable-handle" aria-label="' . 'Drag handle' . '"><i class="fa fa-bars" aria-hidden="true"></i></div>
		<div class="nestable-content">' . $__templater->escape($__vars['node']['record']['title']) . '</div>
		';
	if (!$__templater->test($__vars['node']['children'], 'empty', array())) {
		$__finalCompiled .= '
			' . $__templater->callMacro(null, 'node_list', array(
			'children' => $__vars['node']['children'],
		), $__vars) . '
		';
	}
	$__finalCompiled .= '
	</li>
';
	return $__finalCompiled;
},), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Sort nodes');
	$__finalCompiled .= '

' . $__templater->callMacro('public:nestable_macros', 'setup', array(), $__vars) . '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			<div class="nestable-container" data-xf-init="nestable">
				' . $__templater->callMacro(null, 'node_list', array(
		'children' => $__vars['nodeTree'],
	), $__vars) . '
				' . $__templater->formHiddenVal('nodes', '', array(
	)) . '
			</div>
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'save',
	), array(
		'rowtype' => 'simple',
	)) . '
	</div>
', array(
		'action' => $__templater->fn('link', array('nodes/sort', ), false),
		'class' => 'block',
		'ajax' => 'true',
	)) . '

' . '

';
	return $__finalCompiled;
});