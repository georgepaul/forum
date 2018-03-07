<?php
// FROM HASH: 34f9de1e584e3a8ff559fb5d9528f5d0
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= '@_bbCodeBlock-spacing: .75em;
@_bbCodeBlock-paddingV: @xf-paddingMedium;
@_bbCodeBlock-paddingH: @xf-paddingLarge;
@_bbCodeBlock-expandTriggerHeight: (@xf-bbCodeBlockExpandHeight) / 2;

.bbCodeBlock
{
	margin: @_bbCodeBlock-spacing 0;
	.xf-bbCodeBlock();

	&.bbCodeBlock--quote
	{
		.bbCodeBlock-content
		{
			font-size: @xf-fontSizeSmall;
		}
	}
}

.bbCodeBlock-title
{
	padding: @_bbCodeBlock-paddingV @_bbCodeBlock-paddingH;
	.xf-bbCodeBlockTitle();
	.m-clearFix();
}

a.bbCodeBlock-sourceJump
{
	color: inherit;
	text-decoration: none;

	&:hover
	{
		text-decoration: underline;
	}

	&:after
	{
		.m-faBase();
		.m-faContent(@fa-var-arrow-circle-up, .86em);
		display: inline-block;
		margin-left: 5px;
	}
}

.bbCodeBlock-content
{
	position: relative;
	padding: @_bbCodeBlock-paddingV @_bbCodeBlock-paddingH;
}

.bbCodeBlock-expandLink
{
	display: none;
	position: absolute;
	top: (@xf-bbCodeBlockExpandHeight) + (@_bbCodeBlock-paddingV * 2) - (@_bbCodeBlock-expandTriggerHeight);
	left: 0;
	right: 0;
	height: @_bbCodeBlock-expandTriggerHeight;
	cursor: pointer;

	.m-gradient(
		fade(@xf-bbCodeBlock--background-color, 0%),
		xf-default(@xf-bbCodeBlock--background-color, transparent),
		transparent,
		0%,
		80%
	);

	a
	{
		position: absolute;
		bottom: @_bbCodeBlock-paddingV;
		left: 0;
		right: 0;
		text-align: center;
		font-size: @xf-fontSizeSmall;
		color: @xf-textColorAttention;
		text-decoration: none;
	}
}

.bbCodeBlock--screenLimited
{
	.bbCodeBlock-content
	{
		max-height: 300px;
		max-height: 70vh;
		overflow: auto;
	}
}

.bbCodeBlock--expandable
{
	overflow: hidden;
	.m-transition();
	.m-transitionProperty(-xf-height, height, padding, margin, border;);

	.bbCodeBlock-content
	{
		overflow: hidden;

		.bbCodeBlock:not(.bbCodeBlock--expandable) .bbCodeBlock-content
		{
			overflow: visible;
		}
		.bbCodeBlock.bbCodeBlock--screenLimited .bbCodeBlock-content
		{
			overflow: auto;
		}
	}

	.bbCodeBlock-expandContent
	{
		max-height: @xf-bbCodeBlockExpandHeight;
		overflow: hidden;
	}

	&.is-expandable
	{
		.bbCodeBlock-expandLink
		{
			display: block;
		}
	}

	&.is-expanded
	{
		.bbCodeBlock-expandContent
		{
			max-height: none;
		}

		.bbCodeBlock-expandLink
		{
			display: none;
		}
	}
}

.bbCodeCode
{
	margin: 0;
	padding: 0;

	font-family: @xf-fontFamilyCode;
	font-size: @xf-fontSizeSmall;
	line-height: @xf-lineHeightDefault;
	-ltr-rtl-text-align: left;

	direction: ltr;
	white-space: pre;
	position: relative;

	.m-tabSize();

	code
	{
		font-family: inherit;
	}

	.prism-token
	{
		&.prism-comment,
		&.prism-prolog,
		&.prism-doctype,
		&.prism-cdata
		{
			color: #a50;
		}

		&.prism-constant
		{
			color: #05a;
		}

		&.prism-tag
		{
			color: #170;
		}

		&.prism-boolean
		{
			color: #219;
		}

		&.prism-symbol,
		&.prism-atrule,
		&.prism-keyword
		{
			color: #708;
		}

		&.prism-selector,
		&.prism-function
		{
			color: #05a;
		}

		&.prism-deleted
		{
			color: #d44;
		}

		&.prism-inserted
		{
			color: #292;
		}

		&.prism-string,
		&.prism-attr-value
		{
			color: #a11;
		}

		&.prism-number
		{
			color: #164;
		}

		&.prism-attr-name,
		&.prism-char,
		&.prism-builtin
		{
			color: #00c;
		}

		&.prism-regex,
		&.prism-important,
		&.prism-variable,
		&.prism-package
		{
			color: #05a;
		}

		&.prism-class-name,
		&.prism-important,
		&.prism-bold
		{
			color: #00f;
		}

		&.prism-bold
		{
			font-weight: bold;
		}

		&.prism-italic,
		&.prism-constant
		{
			color: #05a;
			font-style: italic;
		}

		&.prism-entity
		{
			cursor: help;
		}
	}
}

.bbCodeInline
{
	margin: 0;
	.xf-bbCodeInlineCode();
	font-family: @xf-fontFamilyCode;
	line-height: @xf-lineHeightDefault;
	box-decoration-break: clone;
	-webkit-box-decoration-break: clone;
}

.bbCodeSpoiler
{
	margin: @_bbCodeBlock-spacing 0;
}

.bbCodeSpoiler-button
{
	.has-no-js & { display: none; }
}

.bbCodeSpoiler-content
{
	.m-hiddenEl(true);
	.has-no-js & { display: block !important; }

	> .bbCodeBlock--spoiler
	{
		margin: .2em 0 0;
	}
}';
	return $__finalCompiled;
});