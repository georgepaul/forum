<?php
// FROM HASH: ecba47c5487c5780f24d415556e24b8c
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->formRow('
	' . 'Posted on profile post by <a href="{commentLink}">' . $__templater->escape($__vars['content']['ProfilePost']['username']) . '</a>' . '
', array(
		'label' => 'Profile post comment',
	)) . '

' . $__templater->formRow('
	' . $__templater->fn('username_link', array($__vars['content']['User'], true, array(
	))) . '
', array(
		'label' => 'Author',
	)) . '

' . $__templater->formRow('
	' . $__templater->fn('date_dynamic', array($__vars['content']['comment_date'], array(
	))) . '
', array(
		'label' => 'Comment date',
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