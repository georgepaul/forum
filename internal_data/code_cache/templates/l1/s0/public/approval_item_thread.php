<?php
// FROM HASH: 9721b36a7fe03179b3a3633cd7fc60c2
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->formRow('
	' . 'Thread <a href="' . $__templater->fn('link', array('threads', $__vars['content'], ), true) . '">' . $__templater->escape($__vars['content']['title']) . '</a> posted in forum <a href="' . $__templater->fn('link', array('forums', $__vars['content']['Forum'], ), true) . '">' . $__templater->escape($__vars['content']['Forum']['title']) . '</a>' . '
', array(
		'label' => 'Thread',
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
	' . $__templater->fn('bb_code', array($__vars['content']['FirstPost']['message'], 'post', $__vars['content']['FirstPost'], ), true) . '
', array(
		'label' => 'First post content',
	)) . '

' . $__templater->callMacro('approval_queue_macros', 'action_row', array(
		'unapprovedItem' => $__vars['unapprovedItem'],
		'handler' => $__vars['handler'],
	), $__vars);
	return $__finalCompiled;
});