<?php
// FROM HASH: ef3cadbe7260a8cd23bba845b0776f10
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= '.bbWrapper
{
	// This approach is needed to normalize browser differences that normalize.css won\'t handle within BB code/rich text
	// sections. You may need higher specificity to override some situations because of this.

	ol:not(.is-structureList),
	ul:not(.is-structureList)
	{
		margin-top: 1em;
		margin-bottom: 1em;
	}

	ol:not(.is-structureList) ol:not(.is-structureList),
	ol:not(.is-structureList) ul:not(.is-structureList),
	ul:not(.is-structureList) ol:not(.is-structureList),
	ul:not(.is-structureList) ul:not(.is-structureList)
	{
		margin-top: 0;
		margin-bottom: 0;
	}
}

.bbImage
{
	max-width: 100%;
}

.bbMediaWrapper,
.bbMediaJustifier
{
	width: 560px;
	max-width: 100%;
	margin: 0;

	// we want this to still be a block element but to inherit the alignment a user has set - this approximates that
	[style="text-align: center"] &
	{
		margin-left: auto;
		margin-right: auto;
	}

	[style="text-align: left"] &
	{
		-ltr-rtl-margin-left: 0;
		-ltr-rtl-margin-right: auto;
	}

	[style="text-align: right"] &
	{
		-ltr-rtl-margin-left: auto;
		-ltr-rtl-margin-right: 0;
	}
}

.bbMediaWrapper-inner
{
	position: relative;
	padding-bottom: 56.25%; /* 16:9 ratio */
	height: 0;

	&.bbMediaWrapper-inner--4to3
	{
		padding-bottom: 75%; /* 4:3 ratio */
	}

	&.bbMediaWrapper-inner--104px
	{
		padding-bottom: 104px;
	}

	&.bbMediaWrapper-inner--110px
	{
		padding-bottom: 110px;
	}

	&.bbMediaWrapper-inner--500px
	{
		padding-bottom: 500px;
	}

	iframe,
	object,
	embed,
	video,
	audio,
	.bbMediaWrapper-fallback
	{
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
	}
}

.bbMediaWrapper-fallback
{
	display: flex;
	justify-content: center;
	align-items: center;
	max-width: 100%;
	.xf-minorBlockContent();
}

.bbOembed
{
	margin: auto;
	max-width: 500px;

	&.bbOembed--loaded
	{
		display: block;
	}

	.reddit-card
	{
		margin: 0;
	}
}';
	return $__finalCompiled;
});