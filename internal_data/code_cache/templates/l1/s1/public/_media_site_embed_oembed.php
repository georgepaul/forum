<?php
// FROM HASH: 20d3c24a15d962f6ea63f6a8e2c94a63
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__templater->includeJs(array(
		'src' => 'xf/embed.js',
		'min' => '1',
	));
	$__finalCompiled .= '

';
	$__templater->setPageParam('jsState.' . $__vars['jsState'], true);
	$__finalCompiled .= '

<span class="bbOembed"
	  data-xf-init="oembed"
	  data-provider="' . $__templater->escape($__vars['provider']) . '"
	  data-id="' . $__templater->escape($__vars['id']) . '">
	<a href="' . $__templater->escape($__vars['url']) . '" rel="external" target="_blank"><i class="fa fa-' . $__templater->escape($__vars['provider']) . ' fa-' . $__templater->escape($__vars['provider']) . '-square" aria-hidden="true"></i>
		' . $__templater->escape($__vars['url']) . '</a>
</span>';
	return $__finalCompiled;
});