<?php
// FROM HASH: 1f5f2ff8b6be873b9abe7ae37b8ec501
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->formRow('

	<dl class="inputLabelPair">
		<dt><label for="spamuc_mc">' . 'Maximum message count' . '</label></dt>
		<dd>' . $__templater->formNumberBox(array(
		'name' => $__vars['inputName'] . '[message_count]',
		'value' => $__vars['option']['option_value']['message_count'],
		'min' => '0',
		'id' => 'spamuc_mc',
	)) . '</dd>
	</dl>
	<dl class="inputLabelPair">
		<dt><label for="spamuc_rd">' . 'Maximum days since registration' . '</label></dt>
		<dd>' . $__templater->formNumberBox(array(
		'name' => $__vars['inputName'] . '[register_date]',
		'value' => $__vars['option']['option_value']['register_date'],
		'min' => '0',
		'id' => 'spamuc_rd',
	)) . '</dd>
	</dl>
	<dl class="inputLabelPair">
		<dt><label for="spamuc_tl">' . 'Maximum likes received' . '</label></dt>
		<dd>' . $__templater->formNumberBox(array(
		'name' => $__vars['inputName'] . '[like_count]',
		'value' => $__vars['option']['option_value']['like_count'],
		'min' => '0',
		'id' => 'spamuc_tl',
	)) . '</dd>
	</dl>
', array(
		'rowtype' => 'inputLabelPair',
		'label' => $__templater->escape($__vars['option']['title']),
		'hint' => $__templater->escape($__vars['hintHtml']),
		'explain' => $__templater->escape($__vars['explainHtml']),
		'html' => $__templater->escape($__vars['listedHtml']),
	));
	return $__finalCompiled;
});