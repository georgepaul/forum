<?php
// FROM HASH: 09b7ea544ae6a7e59def64a0093f386d
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= '// STICKY NAV SETUP

.p-navSticky
{
	z-index: @zIndex-1;

	&.is-sticky
	{
		z-index: @zIndex-4;
		.m-dropShadow(0, 0, 8px, 3px, 0.3);
	}
}

@supports (position: sticky) or (position: -webkit-sticky)
{
	.p-navSticky
	{
		position: -webkit-sticky;
		position: sticky;
		top: 0;

		&.is-sticky-broken,
		&.is-sticky-disabled
		{
			position: static;
			top: auto;
		}
	}
}';
	return $__finalCompiled;
});