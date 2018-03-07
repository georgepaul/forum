<?php
// FROM HASH: 6d6f014ed1676a6948631c86dec60fd9
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= '// ########################################### CONTENT ROWS ############################

@_contentRow-faderHeight: 150px;
@_contentRow-faderCoverHeight: (@_contentRow-faderHeight) / 2;

.contentRow
{
	display: flex;

	&.contentRow--alignMiddle
	{
		align-items: center;
	}

	.has-no-flexbox &
	{
		display: table;
		width: 100%;
	}

	&.is-deleted
	{
		opacity: .7;

		.contentRow-header,
		.contentRow-title
		{
			text-decoration: line-through;
		}
	}
}
.contentRow-figure
{
	vertical-align: top;
	white-space: nowrap;
	word-wrap: normal;
	text-align: center;

	.has-no-flexbox &
	{
		display: table-cell;
		width: 1%;
	}

	img,
	i.fa,
	.avatar
	{
		vertical-align: bottom;
	}

	&.contentRow-figure--fixedSmall
	{
		width: 60px;

		img,
		i.fa,
		.avatar
		{
			max-height: 60px;
		}
	}

	&.contentRow-figure--fixedMedium
	{
		width: 100px;

		img,
		i.fa,
		.avatar
		{
			max-height: 100px;
		}
	}

	&.contentRow-figure--fixedLarge
	{
		width: 200px;

		img,
		i.fa,
		.avatar
		{
			max-height: 200px;
		}
	}

	&.contentRow-figure--text
	{
		font-size: @xf-fontSizeLargest;
	}
}
.contentRow-figureIcon
{
	text-align: center;
	color: @xf-textColorFeature;

	img,
	i.fa
	{
		width: 64px;
		overflow: hidden;
		white-space: nowrap;
		word-wrap: normal;
		border-radius: @xf-borderRadiusMedium;
	}
}
.contentRow-main
{
	flex: 1;
	min-width: 0;
	vertical-align: top;
	padding-left: @xf-paddingLarge;

	.has-no-flexbox &
	{
		display: table-cell;
	}

	&:before
	{
		// because of line height, there appears to be extra space at the top of this
		content: \'\';
		display: block;
		margin-top: -.18em;
	}

	&.contentRow-main--close
	{
		padding-left: @xf-paddingMedium;
	}

	&:first-child
	{
		padding-left: 0;
	}
}

.contentRow-header
{
	margin: 0;
	padding: 0;
	font-weight: @xf-fontWeightHeavy;
	font-size: @xf-fontSizeLarge;
}

.contentRow-title
{
	margin: 0;
	padding: 0;
	font-weight: @xf-fontWeightNormal;
	font-size: @xf-fontSizeLarge;
}

.contentRow-snippet
{
	font-size: @xf-fontSizeSmall;
	font-style: italic;
	margin: .25em 0;
}

.contentRow-muted
{
	color: @xf-textColorMuted;
}

.contentRow-lesser
{
	font-size: @xf-fontSizeSmall;
}

.contentRow-suffix
{
	white-space: nowrap;
	word-wrap: normal;

	.has-no-flexbox &
	{
		display: table-cell;
		width: 1%;
	}
}

.contentRow-faderContainer
{
	position: relative;
	overflow: hidden;
}

.contentRow-faderContent
{
	max-height: 150px;
	overflow: hidden;
}

.contentRow-fader
{
	position: absolute;
	top: (@_contentRow-faderHeight) + ((@xf-paddingMedium) * 2) - (@_contentRow-faderCoverHeight);
	left: 0;
	right: 0;
	height: @_contentRow-faderCoverHeight;

	.m-gradient(fade(@xf-contentBg, 0%), @xf-contentBg, transparent, 0%, 80%);
}

.contentRow-minor
{
	font-size: @xf-fontSizeSmall;
	color: @xf-textColorMuted;

	&.contentRow-minor--hideLinks
	{
		.m-hiddenLinks();
	}

	&.contentRow-minor--smaller
	{
		font-size: @xf-fontSizeSmaller;
	}

	&.contentRow-minor--singleLine
	{
		.m-overflowEllipsis();
	}
}

.contentRow-spaced
{
	margin: .5em 0;

	&:last-child
	{
		margin-bottom: 0;
	}
}

.contentRow-extra
{
	float: right;
	padding-left: @xf-paddingMedium;
	font-size: @xf-fontSizeSmallest;

	&.contentRow-extra--small
	{
		font-size: @xf-fontSizeSmall;
		color: @xf-textColorMuted;
	}

	&.contentRow-extra--normal
	{
		font-size: @xf-fontSizeNormal;
		color: @xf-textColorMuted;
	}

	&.contentRow-extra--large
	{
		font-size: @xf-fontSizeLarge;
		color: @xf-textColorMuted;
	}

	&.contentRow-extra--larger
	{
		font-size: @xf-fontSizeLarger;
		color: @xf-textColorMuted;
	}

	&.contentRow-extra--largest
	{
		font-size: @xf-fontSizeLargest;
		color: @xf-textColorMuted;
	}
}

@media (max-width: @xf-responsiveNarrow)
{
	.contentRow-figure .avatar--s
	{
		.m-avatarSize(@avatar-xs);
	}

	.contentRow--hideFigureNarrow
	{
		.contentRow-figure
		{
			display: none;
		}

		.contentRow-main
		{
			padding-left: 0;
		}
	}
}';
	return $__finalCompiled;
});