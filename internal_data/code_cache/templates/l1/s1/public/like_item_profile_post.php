<?php
// FROM HASH: 220c0c9699b1aac664f8fd15ca0f94c7
return array('macros' => array('like_snippet' => function($__templater, array $__arguments, array $__vars)
{
	$__vars = $__templater->setupBaseParamsForMacro($__vars, false);
	$__finalCompiled = '';
	$__vars = $__templater->mergeMacroArguments(array(
		'liker' => '!',
		'profilePost' => '!',
		'date' => '!',
		'fallbackName' => 'Unknown member',
	), $__arguments, $__vars);
	$__finalCompiled .= '
	<div class="contentRow-title">
		';
	if ($__vars['profilePost']['user_id'] == $__vars['profilePost']['profile_user_id']) {
		$__finalCompiled .= '
			';
		if ($__vars['profilePost']['user_id'] == $__vars['xf']['visitor']['user_id']) {
			$__finalCompiled .= '
				' . '' . $__templater->fn('username_link', array($__vars['liker'], false, array('defaultname' => $__vars['fallbackName'], ), ), true) . ' liked your <a ' . (('href="' . $__templater->fn('link', array('profile-posts', $__vars['profilePost'], ), true)) . '"') . '>status</a>.' . '
			';
		} else {
			$__finalCompiled .= '
				' . '' . $__templater->fn('username_link', array($__vars['liker'], false, array('defaultname' => $__vars['fallbackName'], ), ), true) . ' liked <a ' . (('href="' . $__templater->fn('link', array('profile-posts', $__vars['profilePost'], ), true)) . '"') . '>' . $__templater->escape($__vars['profilePost']['username']) . '\'s status</a>.' . '
			';
		}
		$__finalCompiled .= '
		';
	} else {
		$__finalCompiled .= '
			';
		if ($__vars['profilePost']['user_id'] == $__vars['xf']['visitor']['user_id']) {
			$__finalCompiled .= '
	
				' . '' . $__templater->fn('username_link', array($__vars['liker'], false, array('defaultname' => $__vars['fallbackName'], ), ), true) . ' liked <a ' . (('href="' . $__templater->fn('link', array('profile-posts', $__vars['profilePost'], ), true)) . '"') . '>your post</a> on ' . $__templater->escape($__vars['profilePost']['ProfileUser']['username']) . '\'s profile.' . '
			';
		} else if ($__vars['profilePost']['ProfileUser']['user_id'] == $__vars['xf']['visitor']['user_id']) {
			$__finalCompiled .= '
	
				' . '' . $__templater->fn('username_link', array($__vars['liker'], false, array('defaultname' => $__vars['fallbackName'], ), ), true) . ' liked <a ' . (('href="' . $__templater->fn('link', array('profile-posts', $__vars['profilePost'], ), true)) . '"') . '>' . $__templater->escape($__vars['profilePost']['username']) . '\'s post</a> on your profile.' . '
			';
		} else {
			$__finalCompiled .= '
	
				' . '' . $__templater->fn('username_link', array($__vars['liker'], false, array('defaultname' => $__vars['fallbackName'], ), ), true) . ' liked <a ' . (('href="' . $__templater->fn('link', array('profile-posts', $__vars['profilePost'], ), true)) . '"') . '>' . $__templater->escape($__vars['profilePost']['username']) . '\'s post</a> on ' . $__templater->escape($__vars['profilePost']['ProfileUser']['username']) . '\'s profile.' . '
			';
		}
		$__finalCompiled .= '
		';
	}
	$__finalCompiled .= '
	</div>
	
	<div class="contentRow-snippet">' . $__templater->fn('snippet', array($__vars['profilePost']['message'], $__vars['xf']['options']['newsFeedMessageSnippetLength'], array('stripPlainTag' => true, ), ), true) . '</div>

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
		'profilePost' => $__vars['content'],
		'date' => $__vars['like']['like_date'],
	), $__vars);
	return $__finalCompiled;
});