<?php
// FROM HASH: 65fcf70908793dd8b7c61353eedd6d36
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Likes received');
	$__finalCompiled .= '

';
	$__templater->wrapTemplate('account_wrapper', $__vars);
	$__finalCompiled .= '

';
	if ($__vars['total'] > 0) {
		$__finalCompiled .= '
	<div class="block">
		<div class="block-container">
			<ul class="block-body">
				';
		if ($__templater->isTraversable($__vars['likes'])) {
			foreach ($__vars['likes'] AS $__vars['like']) {
				$__finalCompiled .= '
					<li class="block-row block-row--separated">
						<div class="contentRow">
							<span class="contentRow-figure">
								' . $__templater->fn('avatar', array($__vars['like']['Liker'], 's', false, array(
				))) . '
							</span>
							<div class="contentRow-main">
								' . $__templater->filter($__templater->method($__vars['like'], 'render', array()), array(array('raw', array()),), true) . '
							</div>
						</div>
					</li>
				';
			}
		}
		$__finalCompiled .= '
			</ul>
		</div>

		' . $__templater->fn('page_nav', array(array(
			'link' => 'account/likes',
			'page' => $__vars['page'],
			'total' => $__vars['total'],
			'wrapperclass' => 'block-outer block-outer--after',
			'perPage' => $__vars['perPage'],
		))) . '
	</div>
';
	} else {
		$__finalCompiled .= '
	<div class="blockMessage">' . 'Unfortunately, none of your content has received any likes yet. You\'ll need to keep posting!' . '</div>
';
	}
	return $__finalCompiled;
});