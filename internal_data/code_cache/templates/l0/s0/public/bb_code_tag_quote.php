<?php
// FROM HASH: cfa9312702f8503b1c8a61f149bd07f9
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__templater->includeCss('bb_code.less');
	$__finalCompiled .= '

<div class="bbCodeBlock bbCodeBlock--expandable bbCodeBlock--quote' . (($__vars['attributes']['member'] AND $__templater->method($__vars['xf']['visitor'], 'isIgnoring', array($__vars['attributes']['member'], ))) ? ' is-ignored' : '') . '">
	';
	if ($__vars['name']) {
		$__finalCompiled .= '
		<div class="bbCodeBlock-title">
			';
		if ($__vars['source']) {
			$__finalCompiled .= '
				<a href="' . $__templater->fn('link', array('goto/' . $__vars['source']['type'], null, array('id' => $__vars['source']['id'], ), ), true) . '"
					class="bbCodeBlock-sourceJump"
					data-xf-click="attribution"
					data-content-selector="#' . $__templater->escape($__vars['source']['type']) . '-' . $__templater->escape($__vars['source']['id']) . '">' . '' . $__templater->escape($__vars['name']) . ' said' . $__vars['xf']['language']['label_separator'] . '</a>
			';
		} else {
			$__finalCompiled .= '
				' . '' . $__templater->escape($__vars['name']) . ' said' . $__vars['xf']['language']['label_separator'] . '
			';
		}
		$__finalCompiled .= '
		</div>
	';
	}
	$__finalCompiled .= '
	<div class="bbCodeBlock-content">
		<div class="bbCodeBlock-expandContent">
			' . $__templater->escape($__vars['content']) . '
		</div>
		<div class="bbCodeBlock-expandLink"><a>' . 'Click to expand...' . '</a></div>
	</div>
</div>';
	return $__finalCompiled;
});