<?php
// FROM HASH: 941142e382e602646e6657b41488ed3a
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->formRow('
	' . 'Posted on profile <a href="' . $__templater->fn('link', array('profile-posts', $__vars['content'], ), true) . '">' . $__templater->escape($__vars['content']['ProfileUser']['username']) . '</a>' . '
', array(
		'label' => 'Profile post',
	)) . '

' . $__templater->formRow('
	' . $__templater->fn('username_link', array($__vars['content']['User'], true, array(
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
	' . $__templater->fn('structured_text', array($__vars['content']['message'], ), true) . '
', array(
		'label' => 'Content',
	)) . '

' . $__templater->callMacro('approval_queue_macros', 'action_row', array(
		'unapprovedItem' => $__vars['unapprovedItem'],
		'handler' => $__vars['handler'],
	), $__vars);
	return $__finalCompiled;
});