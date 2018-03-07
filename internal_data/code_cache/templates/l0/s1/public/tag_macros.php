<?php
// FROM HASH: 3cb6dc9c05a7851df072af5c8ba85649
return array('macros' => array('edit_rows' => function($__templater, array $__arguments, array $__vars)
{
	$__vars = $__templater->setupBaseParamsForMacro($__vars, false);
	$__finalCompiled = '';
	$__vars = $__templater->mergeMacroArguments(array(
		'uneditableTags' => '!',
		'editableTags' => '!',
		'minTags' => 0,
	), $__arguments, $__vars);
	$__finalCompiled .= '

	';
	if ($__vars['uneditableTags']) {
		$__finalCompiled .= '
		' . $__templater->formRow('
			' . $__templater->filter($__vars['uneditableTags'], array(array('pluck', array('tag', )),array('join', array(', ', )),), true) . '
		', array(
			'label' => 'Uneditable tags',
		)) . '
	';
	}
	$__finalCompiled .= '

	';
	$__compilerTemp1 = '';
	if ($__vars['minTags']) {
		$__compilerTemp1 .= '
				' . 'This content must have at least ' . $__templater->escape($__vars['minTags']) . ' tag(s).' . '
			';
	}
	$__finalCompiled .= $__templater->formTokenInputRow(array(
		'name' => 'tags',
		'value' => $__templater->filter($__vars['editableTags'], array(array('pluck', array('tag', )),array('join', array(', ', )),), false),
		'href' => $__templater->fn('link', array('misc/tag-auto-complete', ), false),
	), array(
		'label' => 'Tags',
		'explain' => '
			' . 'Multiple tags may be separated by commas.' . '
			' . $__compilerTemp1 . '
		',
	)) . '
';
	return $__finalCompiled;
},
'edit_form' => function($__templater, array $__arguments, array $__vars)
{
	$__vars = $__templater->setupBaseParamsForMacro($__vars, false);
	$__finalCompiled = '';
	$__vars = $__templater->mergeMacroArguments(array(
		'action' => '!',
		'uneditableTags' => '!',
		'editableTags' => '!',
		'minTags' => 0,
	), $__arguments, $__vars);
	$__finalCompiled .= '

	' . $__templater->form('
		<div class="block-container">
			<div class="block-body">
				' . $__templater->callMacro(null, 'edit_rows', array(
		'uneditableTags' => $__vars['uneditableTags'],
		'editableTags' => $__vars['editableTags'],
		'minTags' => $__vars['minTags'],
	), $__vars) . '
			</div>
			' . $__templater->formSubmitRow(array(
		'icon' => 'save',
	), array(
	)) . '
		</div>
	', array(
		'action' => $__vars['action'],
		'class' => 'block',
		'ajax' => 'true',
	)) . '
';
	return $__finalCompiled;
},), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

';
	return $__finalCompiled;
});