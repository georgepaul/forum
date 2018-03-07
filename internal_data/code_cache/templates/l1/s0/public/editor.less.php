<?php
// FROM HASH: 349f92415b927134858b5bfc9b54c1a1
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= '/* XF-RTL:disable */
' . $__templater->includeTemplate('editor_base.less', $__vars) . '
/* XF-RTL:enable */

// this allows us to ensure that when we scroll the editor into view, this goes below the fixed header
.fr-box.is-scrolling-to:before
{
	display: block;
	content: \'\';

	.m-stickyHeaderConfig(@xf-publicNavSticky);
	height: (@_stickyHeader-height + @_stickyHeader-offset);
	margin-top: -(@_stickyHeader-height + @_stickyHeader-offset);

	@media (max-height: 360px)
	{
		display: none;
	}
}

.fr-view
{
	.m-inputZoomFix();

	img.fr-draggable:not(.smilie),
	.bbImage
	{
		max-width: 100%;
		height: auto;
	}

	p
	{
		margin-bottom: 0;
		margin-top: 0;
	}
}

.fr-command.fr-btn + .fr-dropdown-menu
{
	display: none;

    .fr-dropdown-wrapper
	{
		background: @xf-contentBg;
		border: @xf-borderSize solid @xf-borderColor;
	}
}

.fr-toolbar .fr-btn.fr-active[data-cmd="xfBbCode"]
{
	color: @xf-textColorAttention;
}

.fr-popup
{
	background: @xf-contentBg;
}

.fr-popup .fr-input-line
{
	padding: 16px 0 8px;

	input[type="text"],
	textarea
	{
		.xf-input();
		margin: 0;
		line-height: @xf-lineHeightDefault;
		.m-transition();
		.m-transitionProperty(background, color;);

		&:focus
		{
			.xf-input(border);
			.xf-inputFocus();
		}

		.m-inputZoomFix();
	}

	input + label,
	textarea + label
	{
		line-height: 1.2;
		font-size: 12px;
		background: transparent;
	}

	input.fr-not-empty:focus + label,
	textarea.fr-not-empty:focus + label
	{
		color: @xf-textColorMuted;
	}
}

.fr-popup .fr-color-hex-layer
{
	.fr-input-line
	{
		padding-top: 16px;
		width: 150px;
	}

	.fr-action-buttons
	{
		margin-top: 18px;
	}
}

.fr-popup .fr-action-buttons
{
	height: auto;

	button.fr-command
	{
		.m-buttonBase();
		.xf-buttonPrimary();
		.m-buttonBlockColorVariationSimple(xf-default(@xf-buttonPrimary--background-color, transparent));
		height: auto;
		min-width: 0;
		line-height: @xf-lineHeightDefault;

		&:hover,
		&:active,
		&:focus
		{
			// overriding Froala\'s hover
			color: @xf-buttonPrimary--color;
		}
	}
}

// RTE disabled case
.fr-box textarea.input
{
	border-top: none;
	.border-radius(0 0 @border-radius @border-radius);
}

.editorDraftIndicator
{
	.m-transition();
	opacity: 0;
	position: absolute;
	bottom: 7px;
	right: 12px;
	width: 7px;
	height: 7px;
	border-radius: 3.5px;
	background: rgb(127, 185, 0);

	&.is-active
	{
		opacity: 1;
	}
}

@editorSmiliesBg: xf-intensify(@xf-contentBg, 1%);

.editorSmilies
{
	display: none;
	border: @xf-borderSize solid @xf-borderColorHeavy;
	border-top: none;
	background: @xf-editorToolbarBg;
	overflow: hidden;
	.m-transition();
	.m-transitionProperty(all, -xf-height;);
	height: 0;

	&.is-active
	{
		display: block;
		height: auto;
	}

	&.is-transitioning
	{
		display: block;
	}

	.smilie
	{
		cursor: pointer;
	}

	.tabPanes > li
	{
		padding: @xf-blockPaddingV @xf-blockPaddingH;
	}
}

.tabs--editor // takes some hints from .tabs--standalone
{
	color: @xf-paletteColor4;
	background: @editorSmiliesBg;
	font-weight: @xf-fontWeightNormal;
	border-bottom:  @xf-borderSize solid @xf-borderColor;

	.m-tabsTogether(@xf-fontSizeSmall);

	.tabs-tab
	{
		padding: @xf-blockPaddingV @xf-blockPaddingH max(0px, @xf-blockPaddingV - @xf-borderSizeFeature);
		border-bottom: @xf-borderSizeFeature solid transparent;

		&:hover
		{
			color: @xf-standaloneTab--color;
		}

		&.is-active
		{
			color: @xf-textColorFeature;
			border-color: @xf-borderColorFeature;
		}
	}

	.hScroller-action
	{
		.m-hScrollerActionColorVariation(
			@editorSmiliesBg,
			@xf-standaloneTab--color,
			@xf-standaloneTabSelected--color
		);
	}
}';
	return $__finalCompiled;
});