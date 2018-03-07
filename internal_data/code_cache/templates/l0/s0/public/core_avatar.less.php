<?php
// FROM HASH: c372d387dea97c980f45af4abb2a26ad
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= '// ################################### AVATARS #############################

.avatar
{
	display: inline-block;
	border-radius: @xf-avatarBorderRadius;
	vertical-align: top;
	overflow: hidden;

	img { background-color: @xf-avatarBg; }

	&.avatar--default
	{
		&.avatar--default--dynamic,
		&.avatar--default--text
		{
			font-family: @xf-avatarDynamicFont;
			font-weight: normal;
			text-align: center;
			text-decoration: none !important;

			// converts our avatar sized LH to a font sized version which adapts based solely on font-size
			line-height: (@xf-avatarDynamicLineHeight) / ((@xf-avatarDynamicTextPercent) / 100);

			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
		}

		&.avatar--default--text
		{
			color: @xf-textColorMuted !important;
			background: mix(@xf-textColorMuted, @xf-avatarBg, 25%) !important;
			> span:before { content: ~"\'@{xf-avatarDefaultTextContent}\'"; }
		}

		&.avatar--default--image
		{
			background-color: @xf-avatarBg;
			background-image: url(@xf-avatarDefaultImage);
			background-size: cover;
			> span { display: none; }
		}
	}

	&:hover
	{
		text-decoration: none;
	}

	&.avatar--updateLink
	{
		position: relative;
	}

	&.avatar--separated
	{
		border: 1px solid @xf-avatarBg;
	}

	&.avatar--xxs
	{
		.m-avatarSize(@avatar-xxs);
	}

	&.avatar--xs
	{
		.m-avatarSize(@avatar-xs);
	}

	&.avatar--s
	{
		.m-avatarSize(@avatar-s);
	}

	&.avatar--m
	{
		.m-avatarSize(@avatar-m);
	}

	&.avatar--l
	{
		.m-avatarSize(@avatar-l);
	}

	&.avatar--o
	{
		.m-avatarSize(@avatar-o);
	}

	img:not(.cropImage)
	{
		.m-hideText;
		display: block;
		border-radius: inherit;
		width: 100%;
		height: 100%;
	}

	&:not(a)
	{
		cursor: default;
	}
}

.avatar-update
{
	width: 100%;
	height: 30px;
	bottom: -30px;
	position: absolute;

	.m-hiddenLinks();
	.m-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.3), #000);
	.m-transition();

	padding: @xf-paddingSmall;
	overflow: hidden;

	font-size: @xf-fontSizeSmaller;

	display: none;
	align-items: flex-end;
	justify-content: center;

	.avatar--updateLink &
	{
		display: flex;
	}

	.has-no-flexbox &
	{
		display: table;
		width: 100%;
	}

	.has-touchevents &,
	.avatar:hover &
	{
		bottom: 0;
	}

	a
	{
		text-shadow: 0 0 2px rgba(0, 0, 0, 0.6);
		color: #fff;

		&:hover
		{
			text-decoration: none;
		}
	}
}';
	return $__finalCompiled;
});