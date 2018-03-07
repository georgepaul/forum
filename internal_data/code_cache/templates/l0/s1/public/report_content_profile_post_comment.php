<?php
// FROM HASH: 505189120f68f3a79c5324a8c59339fa
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<div class="block-row block-row--separated">
	' . $__templater->fn('structured_text', array($__vars['report']['content_info']['message'], ), true) . '
</div>

';
	if ($__vars['report']['content_info']['user']) {
		$__finalCompiled .= '
	';
		if ($__vars['report']['content_info']['user']['user_id'] != $__vars['report']['content_info']['profileUser']['user_id']) {
			$__finalCompiled .= '
		<div class="block-row block-row--separated block-row--minor">
			<dl class="pairs pairs--inline">
				<dt>' . 'Profile post' . '</dt>
				<dd><a href="' . $__templater->fn('link', array('profile-posts', $__vars['report']['content_info'], ), true) . '">' . 'Profile post for ' . $__templater->escape($__vars['report']['content_info']['profileUser']['username']) . '' . '</a></dd>
			</dl>
		</div>
	';
		}
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	<div class="block-row block-row--separated block-row--minor">
		<dl class="pairs pairs--inline">
			<dt>' . 'Profile post' . '</dt>
			<dd><a href="' . $__templater->fn('link', array('profile-posts', $__vars['report']['content_info'], ), true) . '">' . 'Profile post for ' . $__templater->escape($__vars['report']['content_info']['profile_username']) . '' . '</a></dd>
		</dl>
	</div>
';
	}
	return $__finalCompiled;
});