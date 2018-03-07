<?php
// FROM HASH: 56aba0a5c2b57527f604e9e3076d84c5
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= '// ############################ BLOCK MESSAGE ###################

.block-rowMessage
{
	margin: @xf-blockPaddingV 0;
	padding: @xf-blockPaddingV @xf-blockPaddingH;
	.xf-blockBorder();
	border-radius: @xf-blockBorderRadius;

	.m-clearFix();

	&:first-child
	{
		margin-top: 0;
	}

	&:last-child
	{
		margin-bottom: 0;
	}

	&.block-rowMessage--small
	{
		font-size: @xf-fontSizeSmall;
		padding: @xf-blockPaddingV/2 @xf-blockPaddingH/2;
	}

	.m-blockMessageVariants();
}

.blockMessage
{
	margin-bottom: @xf-elementSpacer;
	padding: @xf-blockPaddingV @xf-blockPaddingH;
	.xf-contentBase();
	.xf-blockBorder();
	border-radius: @xf-blockBorderRadius;

	.m-clearFix();

	.m-transition(); .m-transitionProperty(border margin); // edgeSpacerRemoval

	&.blockMessage--none
	{
		background: none;
		border: none;
		color: @xf-textColor;
		padding: 0;
	}

	&.blockMessage--close
	{
		margin-top: 5px;
		margin-bottom: 5px;
	}

	&.blockMessage--small
	{
		font-size: @xf-fontSizeSmall;
		padding: @xf-blockPaddingV/2 @xf-blockPaddingH/2;
	}

	.m-blockMessageVariants();
}

.blockMessage--iconic,
.block-rowMessage--iconic
{
	text-align: left;
	position: relative;
	padding-left: 4em;
	min-height: 3.5em;

	&:before
	{
		.m-faBase();
		font-size: 280%; // 2 x line height
		position: absolute;
		left: @xf-blockPaddingH;
	}
}

.m-blockMessageVariants()
{
	// note: the double && is correct here -- it enforces output like ".x.x--variant". The extra specificity helps
	// prevent issues from things like media query overrides.

	&&--highlight
	{
		.xf-contentHighlightBase();
	}
	&--highlight&--iconic:before
	{
		.m-faContent(@fa-var-info-circle);
	}

	@important-featureColor: @xf-borderColorAttention;
	&&--important
	{
		.xf-contentAccentBase();
		border-left: @xf-borderSizeFeature solid @important-featureColor;

		a { .xf-contentAccentLink(); }
	}
	&--important&--iconic:before
	{
		.m-faContent(@fa-var-exclamation-circle);
		color: @important-featureColor;
	}

	@success-featureColor: #63b265;
	&&--success
	{
		border-left: @xf-borderSizeFeature solid @success-featureColor;
		background: #daf3d8;
		color: #3d793f;

		.m-textColoredLinks();
	}
	&--success&--iconic:before
	{
		.m-faContent(@fa-var-check-circle);
		color: @success-featureColor;
	}

	@warning-featureColor: #dcda54;
	&&--warning
	{
		border-left: @xf-borderSizeFeature solid @warning-featureColor;
		background: #fbf7e2;
		color: #84653d;

		.m-textColoredLinks();
	}
	&--warning&--iconic:before
	{
		.m-faContent(@fa-var-warning);
		color: @warning-featureColor;
	}

	@error-featureColor: #c84448;
	&&--error
	{
		border-left: @xf-borderSizeFeature solid @error-featureColor;
		background: #fde9e9;
		color: @error-featureColor;

		.m-textColoredLinks();
	}
	&--error&--iconic:before
	{
		.m-faContent(@fa-var-times-circle);
		color: @error-featureColor;
	}
}';
	return $__finalCompiled;
});