<?php
// FROM HASH: 96def6bfed7105e60b74a7878179fa01
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Help');
	$__finalCompiled .= '

';
	$__templater->wrapTemplate('help_wrapper', $__vars);
	$__finalCompiled .= '

';
	if (!$__templater->test($__vars['pages'], 'empty', array())) {
		$__finalCompiled .= '
	<div class="block">
		<div class="block-container">
			<div class="block-body">
				';
		if ($__templater->isTraversable($__vars['pages'])) {
			foreach ($__vars['pages'] AS $__vars['page']) {
				$__finalCompiled .= '
					<div class="block-row block-row--separated">
						<h3 class="block-textHeader"><a href="' . ((($__vars['page']['page_id'] == 'terms') AND $__vars['tosUrl']) ? $__templater->escape($__vars['tosUrl']) : $__templater->fn('link', array('help', $__vars['page'], ), true)) . '">' . $__templater->escape($__vars['page']['title']) . '</a></h3>
						' . $__templater->escape($__vars['page']['description']) . '
					</div>
				';
			}
		}
		$__finalCompiled .= '
			</div>
		</div>
	</div>
';
	} else {
		$__finalCompiled .= '
	<div class="blockMessage">' . 'No items have been created yet.' . '</div>
';
	}
	return $__finalCompiled;
});