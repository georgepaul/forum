<?php
// FROM HASH: d3579f094a617e0dd789aca1bbcafe78
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Edit tags');
	$__finalCompiled .= '

';
	$__templater->breadcrumbs($__templater->method($__vars['thread'], 'getBreadcrumbs', array()));
	$__finalCompiled .= '

' . $__templater->callMacro('tag_macros', 'edit_form', array(
		'action' => $__templater->fn('link', array('threads/tags', $__vars['thread'], ), false),
		'uneditableTags' => $__vars['uneditableTags'],
		'editableTags' => $__vars['editableTags'],
		'minTags' => $__vars['forum']['min_tags'],
	), $__vars) . '
';
	return $__finalCompiled;
});