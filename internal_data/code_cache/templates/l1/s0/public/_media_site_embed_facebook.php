<?php
// FROM HASH: 3ae2269c99fe5446c01fe3c26c2cc8c2
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__templater->setPageParam('jsState.fbSdk', true);
	$__finalCompiled .= '

';
	if ($__vars['type'] == 'video') {
		$__finalCompiled .= '
	';
		$__vars['fbClass'] = 'fb-video';
		$__finalCompiled .= '
	';
		$__vars['fbHref'] = 'https://www.facebook.com/video.php?v=' . $__vars['id'];
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__vars['fbClass'] = 'fb-post';
		$__finalCompiled .= '
	';
		$__vars['fbHref'] = 'https://www.facebook.com/' . $__vars['idPlain'];
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

<div class="bbMediaJustifier ' . $__templater->escape($__vars['fbClass']) . '"
	 data-href="' . $__templater->escape($__vars['fbHref']) . '"
	 data-width="500"
	 data-show-text="true"
	 data-show-captions="true">
	<div class="fb-xfbml-parse-ignore">
		<a href="' . $__templater->escape($__vars['fbHref']) . '" rel="external" target="_blank">
			<i class="fa fa-facebook-official" aria-hidden="true"></i> ' . $__templater->escape($__vars['fbHref']) . '</a>
	</div>
</div>

';
	return $__finalCompiled;
});