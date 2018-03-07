<?php
// FROM HASH: 881f3703cf342343688b7ec1fd6f01b5
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= '.p-title
{
	display: flex;
	flex-wrap: wrap;
	align-items: center;
	max-width: 100%;
	margin-bottom: -5px;

	&.p-title--noH1
	{
		flex-direction: row-reverse;
	}

	.has-no-flexbox &
	{
		.m-clearFix();
	}
}

.p-title-value
{
	padding: 0;
	margin: 0 0 5px 0;
	font-size: @xf-fontSizeLargest;
	font-weight: @xf-fontWeightNormal;
	min-width: 0;
	margin-right: auto;

	.has-no-flexbox &
	{
		float: left;
	}
}

.p-title-pageAction
{
	margin-bottom: 5px;

	.has-no-flexbox &
	{
		float: right;
	}
}

.p-description
{
	margin: 5px 0 0;
	padding: 0;
	font-size: @xf-fontSizeSmall;
	color: @xf-textColorMuted;
}

@media (max-width: @xf-responsiveNarrow)
{
	.p-title-value
	{
		font-size: @xf-fontSizeLarger;
	}
}';
	return $__finalCompiled;
});