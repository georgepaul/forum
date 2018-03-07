<?php
// FROM HASH: 666deff1ec491aae74b331a92c68c082
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= '// NOTE: THIS DOES NOT HAVE ACCESS TO public:setup.less automatically!
// THE LESS HERE SHOULD BE KEPT AS SIMPLE AS POSSIBLE

body
{
	margin: 0;
	padding: 0;
	word-wrap: break-word;
	-ms-text-size-adjust: 100%;
	-webkit-text-size-adjust: 100%;

	background-color: @xf-emailBg;
	font-size: @xf-fontSizeNormal;
	font-family: @xf-emailFont;
	line-height: @xf-lineHeightDefault;
	color: @xf-textColor;
}

table
{
	border-spacing: 0;
	mso-table-lspace: 0pt;
	mso-table-rspace: 0pt;
}

table,
td
{
	border-collapse: collapse;
}

a
{
	color: @xf-linkColor;
	text-decoration: none;
}

#bodyTable
{
	height: 100% !important;
	width: 100% !important;
	margin: 0;
	padding: 0;
	background-color: @xf-emailBg;
}

#bodyTableContainer
{
	background-color: @xf-emailBg;
}

.container
{
	width: 100%;
	max-width: 600px;
}

.header
{
	color: @xf-emailHeaderColor;
	padding: @xf-paddingMedium @xf-paddingLarge;
	border-top-left-radius: @xf-borderRadiusMedium;
	border-top-right-radius: @xf-borderRadiusMedium;
	font-family: @xf-emailFont;
	font-size: @xf-fontSizeLargest;
	line-height: @xf-lineHeightDefault;
}

.header a
{
	color: @xf-emailHeaderColor;
}

.content
{
	background-color: @xf-contentBg;
	border-radius: @xf-borderRadiusSmall;
	color: @xf-textColor;
	padding: @xf-paddingLarge;
	font-size: @xf-fontSizeNormal;
	font-family: @xf-emailFont;
	line-height: @xf-lineHeightDefault;
}

.content .bbImage
{
	max-width: 100%;
}

.content > p:first-child
{
	margin-top: 0;
}

.content > p:last-child
{
	margin-bottom: 0;
}

.footer
{
	padding: @xf-paddingMedium @xf-paddingLarge;
	text-align: center;
	color: @xf-textColorMuted;
	font-size: @xf-fontSizeSmall;
	font-family: @xf-emailFont;
	line-height: @xf-lineHeightDefault;
}

.footer a
{
	color: @xf-textColorMuted;
	text-decoration: underline;
}

.footerExtra
{
	margin-top: 1em;
}

h2
{
	font-size: @xf-fontSizeLargest;
	font-weight: normal;
	margin: @xf-paddingLarge 0;
	padding: 0;
}

hr
{
	border: 0;
	border-bottom: @xf-borderSize solid @xf-borderColor;
}

div.message
{
	border-left: @xf-borderSizeFeature solid @xf-borderColorFeature;
	margin: @xf-paddingLarge 0;
	padding: @xf-paddingLarge;
}

div.quote
{
	border-left: @xf-borderSizeFeature solid @xf-borderColorAttention;
	border-top: @xf-borderSize solid @xf-borderColor;
	border-bottom: @xf-borderSize solid @xf-borderColor;
	border-right: @xf-borderSize solid @xf-borderColor;
	background: @xf-contentAltBg;
	margin: @xf-paddingLarge 0;
	padding: @xf-paddingLarge;
}

.quote-name
{
	color: @xf-textColorAttention;
	font-size: @xf-fontSizeSmall;
	margin-bottom: @xf-paddingMedium;
}

pre.code
{
	margin: @xf-paddingLarge 0;
	padding: @xf-paddingLarge;
	border-right: @xf-borderSize solid @xf-borderColor;
	background: @xf-contentAltBg;
	width: 100%;
	max-width: 600px;
	overflow: scroll;
}

.textLink
{
	color: @xf-textColor;
	text-decoration: none;
}

.linkBar
{
	padding: @xf-paddingMedium;
	background-color: @xf-contentAltBg;
	border-top: @xf-borderSize solid @xf-borderColor;
}

.button
{
	display: inline-block;
	padding: 5px 10px;
	background-color: @xf-paletteColor4;
	border: none;
	border-radius: @xf-borderRadiusMedium;
	font-size: @xf-fontSizeSmall;
	color: @xf-paletteColor1;
	text-decoration: none;
}

.buttonFake
{
	display: inline-block;
	padding: 5px 10px;
	font-size: @xf-fontSizeSmall;
}

.minorText,
.unsubscribeLink
{
	font-size: @xf-fontSizeSmall;
	color: @xf-textColorMuted;
}

.minorText a,
.unsubscribeLink a
{
	color: @xf-textColorMuted;
	text-decoration: underline;
}

.unsubscribeLink
{
	margin-top: 1em;
	text-align: center;
}

.mediaPlaceholder,
.spoilerPlaceholder
{
	border-radius: @xf-borderRadiusSmall;
	margin: @xf-paddingMedium 0;
	padding: @xf-paddingMedium;
	font-size: @xf-fontSizeLargest;
	line-height: 3;
	text-align: center;
	border: @xf-borderSize solid @xf-borderColor;
	background-color: @xf-contentAltBg;
}';
	return $__finalCompiled;
});