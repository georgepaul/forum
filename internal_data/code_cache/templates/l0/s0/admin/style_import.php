<?php
// FROM HASH: a1e08da2daec3446f28c75f3c2f5a5dc
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Import a style');
	$__finalCompiled .= '

';
	$__compilerTemp1 = array(array(
		'label' => $__vars['xf']['language']['parenthesis_open'] . 'No parent' . $__vars['xf']['language']['parenthesis_close'],
		'_type' => 'option',
	));
	$__compilerTemp2 = $__templater->method($__vars['styleTree'], 'getFlattened', array(0, ));
	if ($__templater->isTraversable($__compilerTemp2)) {
		foreach ($__compilerTemp2 AS $__vars['treeEntry']) {
			$__compilerTemp1[] = array(
				'value' => $__vars['treeEntry']['record']['style_id'],
				'label' => '
								' . $__templater->fn('repeat', array('--', $__vars['treeEntry']['depth'], ), true) . ' ' . $__templater->escape($__vars['treeEntry']['record']['title']) . '
							',
				'_type' => 'option',
			);
		}
	}
	$__compilerTemp3 = array();
	$__compilerTemp4 = $__templater->method($__vars['styleTree'], 'getFlattened', array(0, ));
	if ($__templater->isTraversable($__compilerTemp4)) {
		foreach ($__compilerTemp4 AS $__vars['treeEntry']) {
			$__compilerTemp3[] = array(
				'value' => $__vars['treeEntry']['record']['style_id'],
				'label' => $__templater->fn('repeat', array('--', $__vars['treeEntry']['depth'], ), true) . '
								' . $__templater->escape($__vars['treeEntry']['record']['title']) . '
							',
				'_type' => 'option',
			);
		}
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formUploadRow(array(
		'name' => 'upload',
		'accept' => '.xml',
	), array(
		'label' => 'Import from uploaded XML file',
	)) . '

			' . $__templater->formRadioRow(array(
		'name' => 'target',
	), array(array(
		'value' => 'new',
		'checked' => 'checked',
		'label' => 'Child of style' . $__vars['xf']['language']['label_separator'],
		'_dependent' => array($__templater->formSelect(array(
		'name' => 'parent_style_id',
	), $__compilerTemp1)),
		'_type' => 'option',
	),
	array(
		'value' => 'overwrite',
		'label' => 'Overwrite style',
		'_dependent' => array($__templater->formSelect(array(
		'name' => 'overwrite_style_id',
	), $__compilerTemp3)),
		'_type' => 'option',
	)), array(
		'label' => 'Import as',
	)) . '

		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'import',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->fn('link', array('styles/import', ), false),
		'upload' => 'true',
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
});