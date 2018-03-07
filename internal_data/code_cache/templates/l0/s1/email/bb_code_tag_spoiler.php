<?php
// FROM HASH: 84d330c101d4c9dfbc760b456ceff077
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<div class="spoilerPlaceholder">';
	if ($__vars['title']) {
		$__finalCompiled .= $__templater->escape($__vars['title']) . ' - ';
	}
	$__finalCompiled .= 'Spoiler content hidden.' . '</div>';
	return $__finalCompiled;
});