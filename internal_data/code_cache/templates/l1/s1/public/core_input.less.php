<?php
// FROM HASH: 3634862faf0ed2d4e5af2e977c153c16
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= '// ###################################### INPUTS ##########################

@_input-numberWidth: 150px;
@_input-numberNarrowWidth: 90px;
@_input-textColor: xf-default(@xf-input--color, @xf-textColor);
@_input-elementSpacer: @xf-paddingMedium;
@_input-checkBoxSpacer: 1.5em;

.m-inputReadOnly()
{
	color: mix(xf-default(@xf-input--color, @xf-textColor), xf-default(@xf-inputDisabled--color, @xf-textColorMuted));
	background: mix(xf-default(@xf-input--background-color, @xf-contentBg), xf-default(@xf-inputDisabled--background-color, @xf-paletteNeutral1));
}

.input
{
	.xf-input();
	display: block;
	width: 100%;
	line-height: @xf-lineHeightDefault;
	text-align: left; // this will be flipped in RTL
	word-wrap: break-word;
	-webkit-appearance: none;
	-moz-appearance: none;
	appearance: none;
	.m-transition();
	.m-placeholder({color: fade(@_input-textColor, 40%); });

	&:focus,
	&.is-focused
	{
		outline: 0;
		.xf-inputFocus();
		.m-placeholder({color: fade(@_input-textColor, 50%); });
	}

	&[readonly],
	&.is-readonly
	{
		.m-inputReadOnly();
	}

	&[disabled]
	{
		.xf-inputDisabled();
	}

	&[type=number],
	&[type=tel],
	&.input--number
	{
		text-align: right;
		width: @_input-numberWidth;

		&.input--numberNarrow
		{
			width: @_input-numberNarrowWidth;
		}
	}

	&.input--date
	{
		width: @_input-numberWidth;
	}

	textarea&
	{
		min-height: 0;
		max-height: 400px;
		max-height: 75vh;
		resize: vertical;

		&.input--fitHeight
		{
			resize: none;

			&.input--fitHeight--short
			{
				max-height: 200px;
				max-height: 35vh;
			}
		}

		&.input--code
		{
			overflow-x: auto;
			-ltr-rtl-text-align: left; // force blocks of code back to left align
		}

		&.input--maxHeight-300px
		{
			max-height: 300px;
		}

		.has-js &[rows="1"][data-single-line]
		{
			overflow: hidden;
			resize: none;
		}
	}

	// this makes select inputs consistent across all browsers and OSes
	select&,
	&.input--select
	{
		padding-right: 1em !important;
		.m-selectGadgetColor(@_input-textColor);
		background-size: 1em !important;
		background-repeat: no-repeat !important;
		-ltr-background-position: 100% !important;
		white-space: nowrap;
		word-wrap: normal;
		-webkit-appearance: none !important;
		-moz-appearance: none !important;
		appearance: none !important;

		&[disabled]
		{
			.m-selectGadgetColor(xf-default(@xf-inputDisabled--color, @xf-textColor));
		}

		&[size],
		&[multiple]
		{
			background-image: none !important;
			padding-right: xf-default(@xf-input--padding, 5px) !important;
		}
	}

	&.input--autoSize
	{
		width: auto;
	}

	&.input--inline
	{
		display: inline;
		width: auto;
	}

	&.input--code
	{
		font-family: @xf-fontFamilyCode;
		direction: ltr;
		//white-space: nowrap;
		word-wrap: normal;
	}

	&.input--title
	{
		font-size: @xf-fontSizeLargest;
	}

	&.input--avatarSizeS
	{
		min-height: @avatar-s;
	}

	.m-inputZoomFix();
}

@controlColor: xf-default(@xf-buttonPrimary--background-color, @xf-paletteColor4);
@controlColor--hover: xf-intensify(@controlColor, 25%);

label.iconic
{
	&:hover > input + i:before
	{
		color: @controlColor--hover;
	}

	> input
	{
		.m-visuallyHidden();
		opacity: 0;

		+ i:before
		{
			.m-faBase();
			font-size: 120%;
			height: .9em; // this prevents some zoom related issues
			color: @controlColor;
			vertical-align: -.1em;
			visibility: visible;
			-ltr-rtl-text-align: left;
		}

		&:focus + i:before
		{
			outline: Highlight solid 2px;
			-moz-outline-radius: 5px;

			@media (-webkit-min-device-pixel-ratio: 0)
			{
				outline: -webkit-focus-ring-color auto 5px;
			}
		}

		&[readonly] + i:before,
		&[disabled]:not(.js-disablerExemption) + i:before
		{
			color: @xf-textColorMuted;
		}

		&[type="checkbox"]
		{
			+ i:before { .m-faContent(@fa-var-square-o, .93em); }
			&:checked + i:before { .m-faContent(@fa-var-check-square-o, .93em); }
		}

		&[type="radio"]
		{
			+ i:before { .m-faContent(@fa-var-circle-o, .86em); }
			&:checked + i:before { .m-faContent(@fa-var-check-circle, .86em); }
		}
	}

	&.iconic--toggle > input
	{
		+ i:before
		{
			color: fade(@controlColor, 50%);
		}

		&:checked + i:before
		{
			color: @controlColor;
		}

		&:hover + i:before
		{
			color: @controlColor--hover;
		}

		&[type="radio"] + i
		{
			width: .86em;
		}

		&[type="checkbox"]
		{
			+ i:before
			{
				.m-faContent(@fa-var-toggle-off, 1.15em);
			}
			&:checked + i:before
			{
				.m-faContent(@fa-var-toggle-on, 1.15em);
			}
		}
	}

	&:not(.inputGroup-text) > input + i
	{
		display: inline-block;
		text-align: left;
	}

	&.iconic--labelled > input + i
	{
		width: @_input-checkBoxSpacer;
	}

	.inputChoices &
	{
		> input,
		> input + i
		{
			position: absolute;
			left: 0;
		}

		&:not(.iconic--labelled)
		{
			> input,
			> input + i
			{
				top: .4em; // vertical center aligning for the control
			}
		}
	}

	.formRow-hint &,
	&.cssCustomHighlight,
	&.iconic--inherit-color
	{
		> input + i:before
		{
			color: inherit;
		}
	}
}

.dataList-cell.dataList-cell--iconic
{
	> label.iconic,
	> a.dataList-delete
	{
		color: @controlColor;

		&.dataList-delete,
		> i
		{
			font-size: 20px;
		}

		> input + i:before,
		&:after
		{
		}

		&:not(.iconic--toggle) > input[type="checkbox"] + i:before
		{
			font-size: 16px;
		}

		&:hover
		{
			color: @controlColor--hover;
		}
	}

	.fa
	{
		font-size: 16px;
	}
}

.u-inputSpacer
{
	margin-top: @_input-elementSpacer;
}

.inputGroup
{
	display: flex;
	align-items: stretch;
	max-width: 100%;

	.has-no-flexbox &
	{
		display: table;
		width: 100%;
	}

	.inputGroup-text
	{
		flex-grow: 0;
		display: flex;
		align-items: center;

		.has-no-flexbox &
		{
			display: table-cell;
			width: 1%;
		}

		white-space: nowrap;
		vertical-align: middle;
		padding: 0 @xf-paddingMedium;

		&:first-child { padding-left: 0; }
		&:last-child { padding-right: 0; }
	}

	.inputGroup-splitter
	{
		display: inline-block;
		width: 5px;
		flex-shrink: 0;

		.has-no-flexbox &
		{
			display: table-cell;
		}
	}

	.input
	{
		flex-shrink: 1;
		min-width: 0; // firefox bug - https://bugzilla.mozilla.org/show_bug.cgi?id=1021913

		.has-no-flexbox &
		{
			display: table-cell;
			width: 100%;
		}
	}

	.button
	{
		flex-shrink: 0;

		.has-no-flexbox &
		{
			display: table-cell;
		}
	}

	.inputGroup-label
	{
		flex-shrink: 1;
		width: 100%;
		padding: 0 0 @xf-paddingMedium;

		.m-appendColon();

		.has-no-flexbox &
		{
			display: table-cell;
			width: 100%;
		}
	}

	@media (max-width: @xf-formResponsive)
	{
		.input:not(.input--autoSize):not(.input--numberNarrow)
		{
			width: 100%;
		}
	}

	&.inputGroup--inline
	{
		display: inline-flex;

		.has-no-flexbox &
		{
			display: inline-table;
			width: auto;
		}
	}

	&.inputGroup--auto
	{
		.input
		{
			width: auto;
		}
	}

	&.inputGroup--joined
	{
		.input
		{
			border-radius: 0;

			&:first-child
			{
				border-top-left-radius: @xf-borderRadiusMedium;
				border-bottom-left-radius: @xf-borderRadiusMedium;
				border-right: none;
			}

			&:last-child
			{
				border-top-right-radius: @xf-borderRadiusMedium;
				border-bottom-right-radius: @xf-borderRadiusMedium;
				border-left: none;
			}
		}

		.inputGroup-text
		{
			.xf-input(border);
			.xf-inputFocus(background);
			text-align: center;
			padding: @xf-paddingSmall @xf-paddingMedium;

			&.inputGroup-text--disabled,
			&.is-disabled,
			&[disabled]
			{
				.xf-inputDisabled();

				a { text-decoration: none; }
			}

			&:first-child
			{
				border-right: 0;
				border-top-left-radius: @xf-borderRadiusMedium;
				border-bottom-left-radius: @xf-borderRadiusMedium;
			}

			&:last-child
			{
				border-left: 0;
				border-top-right-radius: @xf-borderRadiusMedium;
				border-bottom-right-radius: @xf-borderRadiusMedium;
			}
		}

		.input + .inputGroup-text,
		.input + .input,
		.inputGroup-text + .input
		{
			border-left: @xf-borderSize solid @xf-borderColorLight;
		}

		.inputGroup-text + .inputGroup-text,
		.inputGroup-text + select.input
		{
			border-left: 0;
		}
	}
}

.inputGroup-container > .inputGroup
{
	margin-top: @xf-paddingMedium;

	&:first-child
	{
		margin-top: 0;
	}
}

.inputNumber
{
	.input--number
	{
		-moz-appearance: textfield !important;

		&::-webkit-inner-spin-button,
		&::-webkit-outer-spin-button
		{
			margin: 0 !important;
			-webkit-appearance: none !important;
		}

		@media (max-width: @xf-formResponsive)
		{
			width: 120px;
		}
	}
}

.inputNumber-button
{
	position: relative;

	.m-faBase();
	color: @controlColor;
	font-size: 1.0em;
	font-style: normal !important;
	line-height: .75em;
	vertical-align: -15%;

	width: 35px;
	justify-content: center;
	text-align: center;

	cursor: pointer;

	-webkit-touch-callout: none;
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;

	&.inputNumber-button--smaller
	{
		vertical-align: 0;
		width: 25px;
	}

	@media (max-width: @xf-formResponsive)
	{
		vertical-align: 0;
		width: 25px;
	}

	&--up::before
	{
		.m-faContent(@fa-var-plus, .79em);
	}

	&--down::before
	{
		.m-faContent(@fa-var-minus, .79em);
	}

	.inputGroup.inputGroup--joined &
	{
		&:hover,
		&:active,
		&:focus
		{
			background-color: saturate(xf-intensify(@xf-paletteColor1, 4%), 12%);
			color: @controlColor--hover;
		}
	}

	.input.input--number[readonly] ~ &
	{
		.m-inputReadOnly();
	}

	.input.input--number[disabled] ~ &
	{
		cursor: default;
		.xf-inputDisabled();
	}
}

.inputDate
{
	.inputDate-icon
	{
		position: relative;

		.m-faBase();
		color: @xf-linkColor;
		font-size: 1.0em;
		font-style: normal !important;
		line-height: .75em;
		vertical-align: -15%;

		width: 45px;
		justify-content: center;
		text-align: center;

		-webkit-touch-callout: none;
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;

		@media (max-width: @xf-formResponsive)
		{
			vertical-align: 0;
			width: 25px;
		}

		&::before
		{
			.m-faContent(@fa-var-calendar, .79em);
		};
	}
}

.inputList
{
	.m-listPlain();

	> li
	{
		margin-top: @xf-paddingMedium;

		&:first-child
		{
			margin-top: 0;
		}
	}
}

.inputPair
{
	.m-clearFix();

	> .input,
	.inputPair-input
	{
		float: right;
		width: 49%; // fallback
		width: ~"calc(50% - 2px)";

		&:first-child
		{
			float: left;
		}
	}
}

.inputPair-container > .inputPair
{
	margin-top: @xf-paddingMedium;

	&:first-child
	{
		margin-top: 0;
	}
}

.inputLabelPair
{
	.m-clearFix();
	margin: @xf-paddingMedium 0;
	padding: 0;

	> dt,
	> dd
	{
		float: left;
		margin: 0;
		padding: 0;
	}

	> dt
	{
		width: 65%;
		padding-right: @xf-paddingMedium;
		padding-top: .6em;

		> label
		{
			.m-appendColon();
		}
	}

	> dd
	{
		width: 35%;
		text-align: right;

		.input
		{
			width: 100%;
			max-width: none;
		}
	}

	@media (max-width: @xf-responsiveNarrow)
	{
		> dt,
		> dd
		{
			width: 50%;
		}
	}
}

.inputChoices
{
	list-style: none;
	padding: 0;
	margin: 0;

	> .inputChoices-choice
	{
		margin-bottom: @_input-elementSpacer;
		padding-left: @_input-checkBoxSpacer;
		position: relative;

		&:last-child
		{
			margin-bottom: 0;
		}

		> .inputChoices,
		.inputChoices-spacer
		{
			margin-top: @_input-elementSpacer;
		}
	}

	&.inputChoices--noChoice > .inputChoices-choice,
	.inputChoices-plainChoice
	{
		padding-left: 0;
	}

	&.inputChoices--inline > .inputChoices-choice
	{
		display: inline-block;
		margin-right: @_input-elementSpacer;
		margin-bottom: 0;

		&:last-child
		{
			margin-right: 0;
		}
	}

	.inputChoices-label
	{
		padding-left: 0;
		font-size: @xf-fontSizeSmall;
		color: @xf-textColorMuted;
	}

	+ .inputChoices:not(.inputChoices--inline)
	{
		margin-top: @_input-elementSpacer;
	}
}

.inputChoices-group + .inputChoices-group,
.inputChoices-choice + .inputChoices-group
{
	margin-top: (@xf-paddingMedium) * 2;
}

.inputChoices-spacer + .inputChoices
{
	margin-top: @_input-elementSpacer;
}

.inputChoices-heading
{
	color: @xf-textColorMuted;
	padding-bottom: (@xf-paddingMedium) / 2;
	border-bottom: @xf-borderSize solid @xf-borderColorFaint;
	margin-bottom: @xf-paddingMedium;
	position: relative;

	label.iconic.inputChoices-heading-checkAll
	{
		margin-left: 0;

		& > input + i
		{
			position: absolute;
			right: 0;
			left: auto;
			width: auto;
		}
	}
}

.inputChoices-explain
{
	.m-formElementExplain();

	&.inputChoices-explain--after
	{
		margin-top: @_input-elementSpacer;
	}
}

.inputChoices-dependencies
{
	list-style: none;
	padding: 0;
	margin: 0;

	> li
	{
		margin-top: @_input-elementSpacer;

		> label
		{
			display: block;
			padding: @xf-paddingSmall 0;

			&.iconic--labelled > input + i
			{
				margin-left: 0;
			}
		}
	}
}

@media (max-width: @xf-responsiveNarrow)
{
	.input.input--title
	{
		font-size: @xf-fontSizeLarge;
	}
}';
	return $__finalCompiled;
});