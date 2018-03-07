<?php
// FROM HASH: 48122b8543cea0ba33254e68ebfa0b85
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= '// SUB SECTION LINKS

.p-sectionLinks
{
	.xf-publicSubNav();

	.hScroller-action
	{
		.m-hScrollerActionColorVariation(
			xf-default(@xf-publicSubNav--background-color, transparent),
			@xf-publicSubNav--color,
			@xf-publicSubNavElHover--color
		);
	}

	&.p-sectionLinks--empty
	{
		height: 10px;
	}
}

.p-sectionLinks-inner
{
	.m-clearFix();
	.m-pageWidth();

	padding-left: max(0px, @xf-pageEdgeSpacer - @xf-publicSubNavPaddingH);
	padding-right: max(0px, @xf-pageEdgeSpacer - @xf-publicSubNavPaddingH);
}

.p-sectionLinks-list
{
	.m-listPlain();

	font-size: 0;

	a
	{
		color: inherit;
	}

	> li
	{
		display: inline-block;
	}

	.m-navElHPadding(@xf-publicSubNavPaddingH);

	.p-navEl
	{
		font-size: @xf-publicSubNav--font-size;

		&:hover
		{
			.xf-publicSubNavElHover();

			a
			{
				text-decoration: @xf-publicSubNavElHover--text-decoration;
			}
		}

		&.is-menuOpen
		{
			.xf-publicSubNavElMenuOpen();
			.m-borderBottomRadius(0);
			.m-dropShadow(0, 5px, 10px, 0, .35);
		}
	}

	.p-navEl-link,
	.p-navEl-splitTrigger
	{
		padding-top: @xf-publicSubNavPaddingV;
		padding-bottom: @xf-publicSubNavPaddingV;
	}
}

@media (max-width: @xf-publicNavCollapseWidth)
{
	.has-js .p-sectionLinks
	{
		display: none;
	}
}';
	return $__finalCompiled;
});