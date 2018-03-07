<?php
// FROM HASH: f9481d784d494615547a716284a8dea2
return array('macros' => array('like_snippet' => function($__templater, array $__arguments, array $__vars)
{
	$__vars = $__templater->setupBaseParamsForMacro($__vars, false);
	$__finalCompiled = '';
	$__vars = $__templater->mergeMacroArguments(array(
		'liker' => '!',
		'comment' => '!',
		'date' => '!',
		'fallbackName' => 'Unknown member',
	), $__arguments, $__vars);
	$__finalCompiled .= '
	<div class="contentRow-title">
		';
	if ($__vars['comment']['user_id'] == $__vars['xf']['visitor']['user_id']) {
		$__finalCompiled .= '
			' . '' . $__templater->fn('username_link', array($__vars['liker'], false, array('defaultname' => $__vars['fallbackName'], ), ), true) . ' liked <a ' . (('href="' . $__templater->fn('link', array('profile-posts/comments', $__vars['comment'], ), true)) . '"') . '>your comment</a> on ' . $__templater->escape($__vars['comment']['ProfilePost']['username']) . '\'s profile post.' . '
		';
	} else if ($__vars['comment']['ProfilePost']['user_id'] == $__vars['xf']['visitor']['user_id']) {
		$__finalCompiled .= '
			' . '' . $__templater->fn('username_link', array($__vars['liker'], false, array('defaultname' => $__vars['fallbackName'], ), ), true) . ' liked <a ' . (('href="' . $__templater->fn('link', array('profile-posts/comments', $__vars['comment'], ), true)) . '"') . '>' . $__templater->escape($__vars['comment']['username']) . '\'s comment</a> on your profile post.' . '
		';
	} else {
		$__finalCompiled .= '
	
			' . '' . $__templater->fn('username_link', array($__vars['liker'], false, array('defaultname' => $__vars['fallbackName'], ), ), true) . ' liked <a ' . (('href="' . $__templater->fn('link', array('profile-posts/comments', $__vars['comment'], ), true)) . '"') . '>' . $__templater->escape($__vars['comment']['username']) . '\'s comment</a> on ' . $__templater->escape($__vars['comment']['ProfilePost']['username']) . '\'s profile post' . '
		';
	}
	$__finalCompiled .= '
	</div>
	
	<div class="contentRow-snippet">' . $__templater->fn('snippet', array($__vars['comment']['message'], $__vars['xf']['options']['newsFeedMessageSnippetLength'], array('stripPlainTag' => true, ), ), true) . '</div>

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
		'comment' => $__vars['content'],
		'date' => $__vars['like']['like_date'],
	), $__vars);
	return $__finalCompiled;
});