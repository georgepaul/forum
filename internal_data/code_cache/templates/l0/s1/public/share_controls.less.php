<?php
// FROM HASH: b3f7c077238c1f472f4465c2f08bef94
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= '.shareButtons
{
	.m-clearFix();
}

.shareButtons-label
{
	float: left;
	margin-right: 3px;
	color: @xf-textColorMuted;
	min-height: 35px;
	line-height: 35px;
}

.shareButtons-button
{
	float: left;
	margin-right: 3px;
	padding: 6px;
	color: @xf-textColorMuted;
	font-size: 20px;
	line-height: 20px;
	white-space: nowrap;
	min-width: 35px;
	border-radius: @xf-borderRadiusSmall;
	background-color: transparent;
	.m-transition();

	&:last-of-type
	{
		margin-right: 0;
	}

	&:hover
	{
		text-decoration: none;
		color: white;
	}

	> i
	{
		display: inline-block;
		vertical-align: middle;
		.m-faBase();
	}

	> span
	{
		font-weight: @xf-fontWeightNormal;
		font-size: @xf-fontSizeNormal;
	}

	.shareButtons--iconic &
	{
		text-align: center;

		> i
		{
			min-width: 20px;
		}

		> span
		{
			.m-visuallyHidden();
		}
	}

	&.shareButtons-button--facebook
	{
		&:hover { background-color: #3B5998; }
		> i:before { .m-faContent(@fa-var-facebook, .58em); }
	}

	&.shareButtons-button--twitter
	{
		&:hover { background-color: #1DA1F3; }
		> i:before { .m-faContent(@fa-var-twitter, .93em); }
	}

	&.shareButtons-button--gplus
	{
		&:hover { background-color: #dd4b39; }
		> i:before { .m-faContent(@fa-var-google-plus, 1.29em); }
	}

	&.shareButtons-button--pinterest
	{
		&:hover { background-color: #bd081c; }
		> i:before { .m-faContent(@fa-var-pinterest-p, .72em); }
	}

	&.shareButtons-button--tumblr
	{
		&:hover { background-color: #35465c; }
		> i:before { .m-faContent(@fa-var-tumblr, .58em); }
	}

	&.shareButtons-button--reddit
	{
		&:hover { background-color: #FF4500; }
		> i:before { .m-faContent(@fa-var-reddit-alien, 1em); }
	}

	&.shareButtons-button--whatsApp
	{
		&:hover { background-color: #25D366; }
		> i:before { .m-faContent(@fa-var-whatsapp, .86em); }
	}

	&.shareButtons-button--email
	{
		&:hover { background-color: #1289ff; }
		> i:before { .m-faContent(@fa-var-envelope-o, 1em); }
	}

	&.shareButtons-button--link
	{
		cursor: pointer;
		&:hover { background-color: #787878; }
		> i:before { .m-faContent(@fa-var-link, 1em); }
	}

	&.is-hidden
	{
		display: none;
	}
}

.shareInput
{
	margin-bottom: 5px;

	&:last-child
	{
		margin-bottom: 0;
	}
}

.shareInput-label
{
	font-size: @xf-fontSizeSmall;
	.m-appendColon();
}

.shareInput-button
{
	color: @xf-linkColor;
	cursor: pointer;

	> i
	{
		display: inline-block;
		vertical-align: middle;
		.m-faBase();

		&:before { .m-faContent(@fa-var-copy); }
	}

	&.is-hidden
	{
		display: none;
	}
}

.shareInput-input
{
	font-size: @xf-fontSizeSmall;

	.shareInput-button.is-hidden + &
	{
		border-radius: @xf-borderRadiusMedium;
	}
}';
	return $__finalCompiled;
});