<?php
// FROM HASH: ba936cece380900bcfb2ddc6d1a635a9
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Confirm action');
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . 'Please confirm that you want to delete the following' . $__vars['xf']['language']['label_separator'] . '
				<strong>
					<a href="' . $__templater->fn('link', array('class-extensions/edit', $__vars['extension'], ), true) . '">' . $__templater->escape($__vars['extension']['to_class']) . '</a>
				</strong>
			', array(
		'rowtype' => 'confirm',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'delete',
	), array(
		'rowtype' => 'simple',
	)) . '
	</div>
	' . $__templater->fn('redirect_input', array(null, null, true)) . '
', array(
		'action' => $__templater->fn('link', array('class-extensions/delete', $__vars['extension'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
});