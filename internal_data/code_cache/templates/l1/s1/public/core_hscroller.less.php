<?php
// FROM HASH: edacdb8165ee159bba8b721b467405a3
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= '// ##################################### HORIZONTAL SCROLLER ###################

.hScroller
{
	overflow-y: hidden;
	position: relative;
	-webkit-tap-highlight-color: rgba(0, 0, 0, 0);
	-webkit-overflow-scrolling: touch;

	&.hScroller--scrollHidden
	{
		.hScroller-action
		{
			opacity: 0;
			.m-transition();
		}

		.has-no-touchevents &:hover .hScroller-action
		{
			opacity: 1;
		}
	}
}

.hScroller-scroll
{
	display: block;
	white-space: nowrap;
	word-wrap: normal;
	overflow-x: hidden;

	&.is-calculated
	{
		overflow-x: scroll;
		padding-bottom: 30px;
		margin-bottom: -30px;
		// pushes the scrollbar out of view
	}
}

.hScroller-action
{
	position: absolute;
	top: 0;
	bottom: 0;
	width: 40px;
	padding: 0 5px;
	display: none;
	cursor: pointer;

	&.is-active
	{
		display: block;
		display: flex;
		align-items: center;
	}

	&:after
	{
		.m-faBase();
		font-size: 120%;
	}

	&.hScroller-action--start
	{
		left: 0;
		justify-content: flex-start;
		text-align: left;

		&:after
		{
			.m-faContent(@fa-var-chevron-left, .72em, ltr);
			.m-faContent(@fa-var-chevron-right, .72em, rtl);
		}
	}

	&.hScroller-action--end
	{
		right: 0;
		justify-content: flex-end;
		text-align: right;

		&:after
		{
			.m-faContent(@fa-var-chevron-right, .72em, ltr);
			.m-faContent(@fa-var-chevron-left, .72em, rtl);
		}
	}
}

.scrollMeasure
{
	position: absolute;
	top: -1000px;
	width: 100px;
	height: 100px;
	overflow: scroll;
	visibility: hidden;
}';
	return $__finalCompiled;
});