<?php
// FROM HASH: 40f670d18188dc2f5c7a809844292825
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= '// MAIN HEADER ROW

.p-header
{
	.xf-publicHeader();

	a
	{
		color: inherit;
	}
}

.p-header-inner
{
	.m-pageWidth();
}

.p-header-content
{
	padding: @xf-paddingMedium 0;

	display: flex;
	flex-wrap: wrap;
	justify-content: space-between;
	align-items: center;
	max-width: 100%;

	.has-no-flexbox &
	{
		display: table;
		width: 100%;
	}
}

.p-header-logo
{
	.has-no-flexbox &
	{
		display: table-cell;
	}

	vertical-align: middle;
	margin-right: auto;

	a
	{
		color: inherit;
		text-decoration: none;
	}

	&.p-header-logo--text
	{
		font-size: @xf-fontSizeLargest;
	}

	&.p-header-logo--image
	{
		img
		{
			vertical-align: bottom;
			max-width: 100%;
			max-height: 200px;
		}
	}
}

@media (max-width: @xf-publicNavCollapseWidth)
{
	.has-js .p-header
	{
		display: none;
	}
}

@media (max-width: @xf-responsiveNarrow)
{
	.p-header-logo
	{
		max-width: 100px;

		&.p-header-logo--text
		{
			font-size: @xf-fontSizeLarge;
			font-weight: @xf-fontWeightNormal;
			.m-overflowEllipsis();
		}
	}
}';
	return $__finalCompiled;
});