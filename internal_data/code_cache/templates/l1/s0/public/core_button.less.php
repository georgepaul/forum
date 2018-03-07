<?php
// FROM HASH: 9c2af3401b2419dbf926d9fc629e4b25
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= '// ############################ BUTTONS #################

.button,
a.button // needed for specificity over a:link
{
	.m-buttonBase();

	a
	{
		color: inherit;
		text-decoration: none;
	}

	.xf-buttonDefault();
	.m-buttonBlockColorVariationSimple(xf-default(@xf-buttonDefault--background-color, transparent));

	&.button--primary
	{
		.xf-buttonPrimary();
		.m-buttonBlockColorVariationSimple(xf-default(@xf-buttonPrimary--background-color, transparent));
	}

	&.button--cta
	{
		.xf-buttonCta();
		.m-buttonBlockColorVariationSimple(xf-default(@xf-buttonCta--background-color, transparent));
	}

	&.button--link
	{
		// block colors
		background: @xf-contentBg;
		color: @xf-linkColor;
		.m-buttonBorderColorVariation(@xf-borderColor);

		&:hover,
		&:active,
		&:focus
		{
			text-decoration: none;
			background: @xf-contentHighlightBg;
		}
	}

	&.button--longText
	{
		white-space: normal;
		text-align: left;
	}

	&.is-disabled
	{
		.xf-buttonDisabled();
		.m-buttonBorderColorVariation(xf-default(@xf-buttonDisabled--background-color, transparent));

		&:hover,
		&:active,
		&:focus
		{
			background: xf-default(@xf-buttonDisabled--background-color, transparent) !important;
		}
	}

	&.button--scroll
	{
		background: fade(xf-default(@xf-buttonDefault--background-color, transparent), 75%);
		padding: 5px 8px;

		.m-dropShadow();
	}

	&.button--small
	{
		font-size: @xf-fontSizeSmaller;
		padding: 3px 6px;
	}

	&.button--fullWidth
	{
		display: block;
	}

	&.button--icon
	{
		> .button-text:before
		{
			.m-faBase();
			font-size: 120%;
			vertical-align: -.1em;
			display: inline-block;
			margin: -.255em 6px -.255em 0;
		}

		&.button--iconOnly > .button-text
		{
			&:before
			{
				margin: 0;
			}
		}

		&--add          { .m-buttonIcon(@fa-var-plus-square, .79em); }
		&--confirm      { .m-buttonIcon(@fa-var-check, 1em); }
		&--write	    { .m-buttonIcon(@fa-var-pencil-square-o, 1em); }
		&--import  	    { .m-buttonIcon(@fa-var-upload, .93em); }
		&--export  	    { .m-buttonIcon(@fa-var-download, .93em); }
		&--download	    { .m-buttonIcon(@fa-var-download, .93em); }
		&--disable      { .m-buttonIcon(@fa-var-power-off); }
		&--edit         { .m-buttonIcon(@fa-var-pencil, .86em); }
		&--save         { .m-buttonIcon(@fa-var-save, .86em); }
		&--reply	    { .m-buttonIcon(@fa-var-mail-reply, 1em); }
		&--quote	    { .m-buttonIcon(@fa-var-quote-left, .93em); }
		&--purchase	    { .m-buttonIcon(@fa-var-credit-card, 1.11em); }
		&--payment	    { .m-buttonIcon(@fa-var-credit-card, 1.08em); }
		&--convert	    { .m-buttonIcon(@fa-var-flash, .5em); }
		&--search	    { .m-buttonIcon(@fa-var-search, .93em); }
		&--sort         { .m-buttonIcon(@fa-var-sort, .58em); }
		&--upload	    { .m-buttonIcon(@fa-var-upload, .93em); }
		&--attach	    { .m-buttonIcon(@fa-var-paperclip, .79em); }
		&--login        { .m-buttonIcon(@fa-var-lock, .65em); }
		&--rate         { .m-buttonIcon(@fa-var-star-half-empty, .93em); }
		&--config       { .m-buttonIcon(@fa-var-cog, .86em); }
		&--refresh      { .m-buttonIcon(@fa-var-refresh, .86em); }
		&--translate    { .m-buttonIcon(@fa-var-globe, .86em); }
		&--vote         { .m-buttonIcon(@fa-var-check-circle-o, .86em); }
		&--result       { .m-buttonIcon(@fa-var-bar-chart-o, 1.15em); }
		&--history	    { .m-buttonIcon(@fa-var-history, .86em); }
		&--cancel       { .m-buttonIcon(@fa-var-remove, .86em); }
		&--preview      { .m-buttonIcon(@fa-var-eye, 1em); }
		&--conversation { .m-buttonIcon(@fa-var-comments-o, 1em); }
		&--bolt         { .m-buttonIcon(@fa-var-bolt, .5em); }
		&--list         { .m-buttonIcon(@fa-var-list, .86em); }
		&--prev			{ .m-buttonIcon(@fa-var-chevron-left, .71em); }
		&--next			{ .m-buttonIcon(@fa-var-chevron-right, .71em); }
		&--markRead     { .m-buttonIcon(@fa-var-check-square-o, .93em); }

		&--notificationsOn  { .m-buttonIcon(@fa-var-bell-o, 1em); }
		&--notificationsOff { .m-buttonIcon(@fa-var-bell-slash-o, 1.15em); }

		// for inline mod confirmations
		&--merge { .m-buttonIcon(@fa-var-compress, .86em); }
		&--move { .m-buttonIcon(@fa-var-share, 1em); }
		&--copy { .m-buttonIcon(@fa-var-clone, 1em); }
		&--approve, &--unapprove { .m-buttonIcon(@fa-var-shield, .72em); }
		&--delete, &--undelete { .m-buttonIcon(@fa-var-trash-o, .79em); }
		&--stick, &--unstick { .m-buttonIcon(@fa-var-thumb-tack, .65em); }
		&--lock { .m-buttonIcon(@fa-var-lock, .65em); }
		&--unlock { .m-buttonIcon(@fa-var-unlock, .93em); }




		//&--login:hover, &--login:active { .m-buttonIcon(@fa-var-unlock-alt, .65em); }
	}

	&.button--provider
	{
		> .button-text:before
		{
			.m-faBase();
			font-size: 120%;
			vertical-align: middle;
			display: inline-block;
			margin: -4px 6px -4px 0;
		}

		&--facebook
		{
			.m-buttonColorVariation(#3B5998, white);
			.m-buttonIcon(@fa-var-facebook, .58em);
		}

		&--twitter
		{
			.m-buttonColorVariation(#1DA1F3, white);
			.m-buttonIcon(@fa-var-twitter, .93em);
		}

		&--google
		{
			.m-buttonColorVariation(#4285F4, white);
			.m-buttonIcon(@fa-var-google, .86em);
		}

		&--github
		{
			.m-buttonColorVariation(#666666, white);
			.m-buttonIcon(@fa-var-github, .86em);
		}

		&--linkedin
		{
			.m-buttonColorVariation(#0077b5, white);
			.m-buttonIcon(@fa-var-linkedin, .86em);
		}

		&--microsoft
		{
			.m-buttonColorVariation(#00bcf2, white);
			.m-buttonIcon(@fa-var-windows, .93em);
		}

		&--yahoo
		{
			.m-buttonColorVariation(#410093, white);
			.m-buttonIcon(@fa-var-yahoo, .86em);
		}
	}

	&.button--splitTrigger
	{
		// button-text and button-menu are always children of button--splitTrigger
		// but are defined here for reasons of specificity, as these border colors
		// are overwritten by .m-buttonBorderColorVariation()
		> .button-text { border-right: @xf-borderSize solid transparent; }
		> .button-menu { border-left: @xf-borderSize solid transparent; }

		.m-clearFix();
		padding: 0;
		font-size: 0;

		button.button-text
		{
			background: transparent;
			border: none;
			border-right: @xf-borderSize solid transparent;
			color: inherit;
		}

		> .button-text,
		> .button-menu
		{
			.xf-buttonBase();
			display: inline-block;

			&:hover
			{
				&:after
				{
					opacity: 1;
				}
			}
		}

		> .button-text
		{
			.m-borderRightRadius(0);
		}

		> .button-menu
		{
			.m-borderLeftRadius(0);
			padding-right: xf-default(@xf-buttonBase--padding-right, 0);// * (2/3);
			padding-left: xf-default(@xf-buttonBase--padding-left, 0);// * (2/3);

			&:after
			{
				.m-faBase();
				.m-faContent(@fa-var-caret-down, .58em);
				unicode-bidi: isolate;
				opacity: .5;
			}
		}
	}
}

.buttonGroup
{
	display: inline-block;
	vertical-align: top;
	.m-clearFix();

	&.buttonGroup--aligned
	{
		vertical-align: middle;
	}

	> .button
	{
		float: left;

		&:not(:first-child)
		{
			border-left: none;
		}

		&:not(:first-child):not(:last-child)
		{
			border-radius: 0;
		}

		&:first-child:not(:last-child)
		{
			.m-borderRightRadius(0);
		}

		&:last-child:not(:first-child)
		{
			.m-borderLeftRadius(0);
		}
	}

	> .buttonGroup-buttonWrapper
	{
		float: left;

		&:not(:first-child) > .button
		{
			border-left: none;
		}

		&:not(:first-child):not(:last-child) > .button
		{
			border-radius: 0;
		}

		&:first-child:not(:last-child) > .button
		{
			.m-borderRightRadius(0);
		}

		&:last-child:not(:first-child) > .button
		{
			.m-borderLeftRadius(0);
		}
	}
}

.toggleButton
{
	> input
	{
		display: none;
	}

	> span
	{
		.xf-buttonDisabled();
		.m-buttonBorderColorVariation(xf-default(@xf-buttonDisabled--background-color, transparent));
	}

	&.toggleButton--small > span
	{
		font-size: @xf-fontSizeSmaller;
		padding: @xf-paddingSmall;
	}

	> input:checked + span
	{
		.xf-buttonDefault();
		.m-buttonBlockColorVariationSimple(xf-default(@xf-buttonDefault--background-color, transparent));
	}
}

.u-scrollButtons
{
	position: fixed;
	bottom: 30px;
	right: (@xf-pageEdgeSpacer) / 2;

	.has-hiddenscroll &
	{
		right: 20px;
	}

	z-index: @zIndex-9;

	.m-transition(opacity, @xf-animationSpeed);
	opacity: 0;
	display: none;

	&.is-transitioning
	{
		display: block;
	}

	&.is-active
	{
		display: block;
		opacity: 1;
	}

	.button
	{
		display: block;

		+ .button
		{
			margin-top: (@xf-pageEdgeSpacer) / 2;
		}
	}
}';
	return $__finalCompiled;
});