<?php
// FROM HASH: 6861148332ec50846bc213c48734cbd2
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->formRow('
	' . 'Posted in thread <a href="' . $__templater->fn('link', array('posts', $__vars['content'], ), true) . '">' . $__templater->escape($__vars['content']['Thread']['title']) . '</a> in forum <a href="' . $__templater->fn('link', array('forums', $__vars['content']['Thread']['Forum'], ), true) . '">' . $__templater->escape($__vars['content']['Thread']['Forum']['title']) . '</a>' . '
', array(
		'label' => 'Post',
	)) . '

' . $__templater->formRow('
	' . $__templater->fn('username_link', array($__vars['content']['User'], true, array(
		'defaultname' => $__vars['content']['username'],
	))) . '
', array(
		'label' => 'Author',
	)) . '

' . $__templater->formRow('
	' . $__templater->fn('date_dynamic', array($__vars['content']['post_date'], array(
	))) . '
', array(
		'label' => 'Post date',
	)) . '

' . $__templater->callMacro('approval_queue_macros', 'spam_log', array(
		'spamDetails' => $__vars['spamDetails'],
	), $__vars) . '

' . $__templater->formRow('
	' . $__templater->fn('bb_code', array($__vars['content']['message'], 'post', $__vars['content'], ), true) . '
', array(
		'label' => 'Content',
	)) . '

' . $__templater->callMacro('approval_queue_macros', 'action_row', array(
		'unapprovedItem' => $__vars['unapprovedItem'],
		'handler' => $__vars['handler'],
	), $__vars);
	return $__finalCompiled;
});