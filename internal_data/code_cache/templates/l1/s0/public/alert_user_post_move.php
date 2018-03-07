<?php
// FROM HASH: bff0b40de63ea6988aa04bca949ae2d1
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= 'Your post in the thread ' . $__templater->escape($__vars['extra']['title']) . ' was moved to ' . ((((('<a href="' . $__templater->fn('base_url', array($__vars['extra']['targetLink'], ), true)) . '" class="fauxBlockLink-blockLink">') . $__templater->fn('prefix', array('thread', $__vars['extra']['prefix_id'], ), true)) . $__templater->escape($__vars['extra']['targetTitle'])) . '</a>') . '.' . '
';
	if ($__vars['extra']['reason']) {
		$__finalCompiled .= 'Reason' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['extra']['reason']);
	}
	return $__finalCompiled;
});