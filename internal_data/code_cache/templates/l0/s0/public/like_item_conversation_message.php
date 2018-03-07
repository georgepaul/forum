<?php
// FROM HASH: 5c12817582b250f967de7d0b28f0a3ed
return array('macros' => array('like_snippet' => function($__templater, array $__arguments, array $__vars)
{
	$__vars = $__templater->setupBaseParamsForMacro($__vars, false);
	$__finalCompiled = '';
	$__vars = $__templater->mergeMacroArguments(array(
		'liker' => '!',
		'message' => '!',
		'date' => '!',
		'fallbackName' => 'Unknown member',
	), $__arguments, $__vars);
	$__finalCompiled .= '
	<div class="contentRow-title">
		';
	if ($__vars['message']['user_id'] == $__vars['xf']['visitor']['user_id']) {
		$__finalCompiled .= '
			' . '' . $__templater->fn('username_link', array($__vars['liker'], false, array('defaultname' => $__vars['fallbackName'], ), ), true) . ' liked your message in the conversation ' . (((('<a href="' . $__templater->fn('link', array('conversations/messages', $__vars['message'], ), true)) . '">') . $__templater->escape($__vars['message']['Conversation']['title'])) . '</a>') . '.' . '
		';
	} else {
		$__finalCompiled .= '
			' . '' . $__templater->fn('username_link', array($__vars['liker'], false, array('defaultname' => $__vars['fallbackName'], ), ), true) . ' liked <a ' . (('href="' . $__templater->fn('link', array('conversations/messages', $__vars['message'], ), true)) . '"') . '>' . $__templater->escape($__vars['message']['User']['username']) . '\'s message</a> in the conversation ' . (((('<a href="' . $__templater->fn('link', array('conversations/messages', $__vars['message'], ), true)) . '">') . $__templater->escape($__vars['message']['Conversation']['title'])) . '</a>') . '.' . '
		';
	}
	$__finalCompiled .= '
	</div>

	<div class="contentRow-snippet">' . $__templater->fn('snippet', array($__vars['message']['message'], $__vars['xf']['options']['newsFeedMessageSnippetLength'], array('stripQuote' => true, ), ), true) . '</div>

	<div class="contentRow-minor">' . $__templater->fn('date_dynamic', array($__vars['date'], array(
	))) . '</div>
';
	return $__finalCompiled;
},), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

' . $__templater->callMacro(null, 'like_snippet', array(
		'liker' => $__vars['like']['Liker'],
		'message' => $__vars['content'],
		'date' => $__vars['like']['like_date'],
	), $__vars);
	return $__finalCompiled;
});