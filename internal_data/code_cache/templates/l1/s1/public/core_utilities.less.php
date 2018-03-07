<?php
// FROM HASH: a5613d7f723e400ccfa2731c9c76d546
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= '// ############################# BASIC UTILITY CLASSES #######################

.u-concealed,
.u-concealed a,
.u-cloaked,
.u-cloaked a
{
	text-decoration: inherit !important;
	color: inherit !important;
}

a.u-concealed:hover,
.u-concealed a:hover
{
	text-decoration: underline !important;

	.fa
	{
		color: @xf-linkHover--color;
	}
}

.u-dimmed { color: @xf-textColorDimmed; }
.u-muted { color: @xf-textColorMuted; }

.u-dimmed,
.u-muted,
.u-faint
{
	.m-hiddenLinks();
}

.u-featuredText { color: @xf-textColorFeature; }

.u-prependAsterisk:before { content: "* "; }
.u-appendAsterisk:after { content: " *"; }

.u-dt[title] { border: none; text-decoration: none; }

.u-clearFix
{
	.m-clearFix();
}

.u-appendColon
{
	.m-appendColon();
}

.u-pullLeft
{
	float: left !important;
}

.u-pullRight
{
	float: right !important;
}

.u-showWideInline,
.u-showWideBlock,
.u-showMediumInline,
.u-showMediumBlock,
.u-showNarrowInline,
.u-showNarrowBlock
{
	display: none;
}

.u-smaller
{
	font-size: small;
}

@media (max-width: @xf-responsiveWide)
{
	.u-hideWide { display: none !important; }
	.u-showWideInline { display: inline; }
	.u-showWideBlock { display: block; }
}
@media (max-width: @xf-responsiveMedium)
{
	.u-hideMedium { display: none !important; }
	.u-showMediumInline { display: inline; }
	.u-showMediumBlock { display: block; }
}
@media (max-width: @xf-responsiveNarrow)
{
	.u-hideNarrow { display: none !important; }
	.u-showNarrowInline { display: inline; }
	.u-showNarrowBlock { display: block; }
}

.u-ltr { direction: ltr; text-align: left; }
.u-rtl { direction: rtl; text-align: right; }

.generateDepth(@n, @i: 1) when (@i =< @n)
{
	.u-depth@{i} { padding-left: (@i * 1em); }
	.u-indentDepth@{i} { text-indent: (@i * 1em); }
	.generateDepth(@n, (@i + 1));
}
.generateDepth(9);

.u-hidden
{
	.m-hiddenEl(false);

	&.u-hidden--transition
	{
		.m-hiddenEl(true);
	}
}

.u-srOnly
{
	.m-visuallyHidden();
}

.has-no-js .u-jsOnly
{
	display: none !important;
}

.has-js .u-noJsOnly
{
	display: none !important;
}

img.u-imgContained
{
	max-height: 100%;
	max-width: 100%;
}

.u-bottomFixer
{
	position: fixed;
	left: 0;
	right: 0;
	bottom: 0;
	z-index: @zIndex-8;
	pointer-events: none;

	> *
	{
		pointer-events: auto;
	}
}

.u-anchorTarget
{
	display: block;
	height: 0;
	width: 0;
	visibility: hidden;
	pointer-events: none;
	position: absolute;
}';
	return $__finalCompiled;
});