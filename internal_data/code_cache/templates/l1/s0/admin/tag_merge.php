<?php
// FROM HASH: 0653ef2a340874d71b3e588673bb9384
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Merge tags');
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formRow('
				' . $__templater->escape($__vars['tag']['tag']) . '
			', array(
		'explain' => 'This tag will be deleted.',
		'label' => 'Source tag',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'target',
	), array(
		'label' => 'Target tag',
		'explain' => 'All content tagged with ' . $__templater->escape($__vars['tag']['tag']) . ' will now be tagged with this tag.',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Merge',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->fn('link', array('tags/merge', $__vars['tag'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
});