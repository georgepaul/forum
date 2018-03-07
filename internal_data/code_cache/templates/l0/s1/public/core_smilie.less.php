<?php
// FROM HASH: 251745e6bc1e687e6f585749421c66ff
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= '.smilie
{
	vertical-align: text-bottom;
	max-width: none;

	&.is-clicked
	{
		transform: rotate(45deg);
		transition: all 0.25s;
	}
}

';
	if ($__vars['smilieSprites']) {
		$__finalCompiled .= '
	';
		if ($__templater->isTraversable($__vars['smilieSprites'])) {
			foreach ($__vars['smilieSprites'] AS $__vars['smilieId'] => $__vars['smilieSprite']) {
				$__finalCompiled .= '
		';
				if ($__vars['smilieSprite']['sprite_css']) {
					$__finalCompiled .= '
			.smilie--sprite.smilie--sprite' . $__templater->escape($__vars['smilieId']) . '
			{
				' . $__templater->filter($__vars['smilieSprite']['sprite_css'], array(array('raw', array()),), true) . '
			}
		';
				}
				$__finalCompiled .= '
	';
			}
		}
		$__finalCompiled .= '
';
	}
	return $__finalCompiled;
});