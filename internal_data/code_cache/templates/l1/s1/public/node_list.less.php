<?php
// FROM HASH: 43ffbb776dcca99bce8c2bec0fadf163
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= '@_nodeList-statsCellBreakpoint: 1000px;

.node
{
	& + .node
	{
		border-top: @xf-borderSize solid @xf-borderColorFaint;
	}
}

.node-body
{
	display: table;
	table-layout: fixed;
	width: 100%;
}

.node-icon
{
	display: table-cell;
	vertical-align: middle;
	text-align: center;
	width: 46px;
	padding: @xf-paddingLarge 0 @xf-paddingLarge @xf-paddingLarge;

	i
	{
		display: block;
		line-height: 1.125;
		font-size: 32px;

		&:before
		{
			.m-faBase();

			color: @xf-nodeIconReadColor;
			text-shadow: 1px 1px 0.5px fade(xf-intensify(@xf-nodeIconReadColor, 50%), 50%);

			.node--unread &
			{
				opacity: 1;
				color: @xf-nodeIconUnreadColor;
				text-shadow: 1px 1px 0.5px fade(xf-intensify(@xf-nodeIconUnreadColor, 50%), 50%);
			}
		}

		.node--forum &:before,
		.node--category &:before
		{
			.m-faContent(@fa-var-comments, 1em);
		}

		.node--page &:before
		{
			.m-faContent(@fa-var-file-text, .86em);
		}

		.node--link &:before
		{
			.m-faContent(@fa-var-link, .93em);
		}
	}
}

.node-main
{
	display: table-cell;
	vertical-align: middle;
	padding: @xf-paddingLarge;
}

.node-stats
{
	display: table-cell;
	width: 170px;
	vertical-align: middle;
	text-align: center;
	padding: @xf-paddingLarge 0;

	> dl.pairs.pairs--rows
	{
		width: 50%;
		float: left;
		margin: 0;
		padding: 0 @xf-paddingMedium/2;

		&:first-child
		{
			padding-left: 0;
		}

		&:last-child
		{
			padding-right: 0;
		}
	}

	&.node-stats--single
	{
		width: 100px;

		> dl.pairs.pairs--rows
		{
			width: 100%;
			float: none;
		}
	}

	&.node-stats--triple
	{
		width: 240px;

		> dl.pairs.pairs--rows
		{
			width: 33.333%;
		}
	}

	@media (max-width: @_nodeList-statsCellBreakpoint)
	{
		display: none;
	}
}

.node-extra
{
	display: table-cell;
	vertical-align: middle;
	width: 230px;
	padding: @xf-paddingLarge;

	font-size: @xf-fontSizeSmall;
}

.node-extra-row
{
	.m-overflowEllipsis();
	color: @xf-textColorMuted;
}

.node-extra-placeholder
{
	font-style: italic;
}

.node-title
{
	margin: 0;
	padding: 0;
	font-size: @xf-fontSizeLarge;
	font-weight: @xf-fontWeightNormal;

	.node--unread &
	{
		font-weight: @xf-fontWeightHeavy;
	}
}

.node-description
{
	font-size: @xf-fontSizeSmall;
	color: @xf-textColorDimmed;

	&.node-description--tooltip
	{
		.has-js.has-no-touchevents &
		{
			display: none;
		}
	}
}

.node-meta
{
	font-size: @xf-fontSizeSmall;
}

.node-statsMeta
{
	display: none;

	@media (max-width: @_nodeList-statsCellBreakpoint)
	{
		display: inline;
	}
}

.node-bonus
{
	font-size: @xf-fontSizeSmall;
	color: @xf-textColorMuted;
	text-align: right;
}

.node-subNodesFlat
{
	font-size: @xf-fontSizeSmall;
	margin-top: .3em;

	.node-subNodesLabel
	{
		display: none;
	}
}

.node-subNodeMenu
{
	display: inline;

	.menuTrigger
	{
		color: @xf-textColorMuted;
	}
}

@media (max-width: @xf-responsiveMedium)
{
	.node-main
	{
		display: block;
		width: auto;
	}

	.node-extra
	{
		display: block;
		width: auto;
		// this gives an equivalent of medium padding between main and extra, with main still having large
		margin-top: (@xf-paddingMedium - @xf-paddingLarge);
		padding-top: 0;
	}

	.node-extra-row
	{
		display: inline-block;
		vertical-align: top;
		max-width: 100%;
	}

	.node-description,
	.node-stats,
	.node-subNodesFlat
	{
		display: none;
	}
}

@media (max-width: @xf-responsiveNarrow)
{
	.node-subNodeMenu
	{
		display: none;
	}
}

.subNodeLink
{
	&:before
	{
		display: inline-block;
		.m-faBase();
		width: 1em;
		padding-right: .3em;
		text-decoration: none;

		color: @xf-nodeIconReadColor;
		text-shadow: 1px 1px 0 fade(xf-intensify(@xf-nodeIconReadColor, 50%), 50%);
	}

	&:hover:before
	{
		text-decoration: none;
	}

	&.subNodeLink--unread
	{
		font-weight: @xf-fontWeightHeavy;

		&:before
		{
			color: @xf-nodeIconUnreadColor;
			text-shadow: 1px 1px 0 fade(xf-intensify(@xf-nodeIconUnreadColor, 50%), 50%);
		}
	}

	&.subNodeLink--forum:before,
	&.subNodeLink--category:before
	{
		.m-faContent(@fa-var-comments);
	}

	&.subNodeLink--page:before
	{
		.m-faContent(@fa-var-file-text);
	}

	&.subNodeLink--link:before
	{
		.m-faContent(@fa-var-link);
	}
}

.node-subNodeFlatList
{
	.m-listPlain();
	.m-clearFix();

	> li
	{
		float: left;
		margin-right: 1em;

		&:last-child
		{
			margin-right: 0;
		}
	}

	ol,
	ul,
	.node-subNodes
	{
		display: none;
	}
}

.subNodeMenu
{
	.m-listPlain();

	ol,
	ul
	{
		.m-listPlain();
	}

	.subNodeLink
	{
		display: block;
		padding: @xf-blockPaddingV @xf-blockPaddingH;
		text-decoration: none;
		cursor: pointer;

		&:hover
		{
			text-decoration: none;
			background: @xf-contentHighlightBg;
		}
	}

	li li .subNodeLink { padding-left: 1.5em; }
	li li li .subNodeLink { padding-left: 3em; }
	li li li li .subNodeLink { padding-left: 4.5em; }
	li li li li li .subNodeLink { padding-left: 6em; }
	li li li li li li .subNodeLink { padding-left: 7.5em; }
}';
	return $__finalCompiled;
});