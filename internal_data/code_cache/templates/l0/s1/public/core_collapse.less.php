<?php
// FROM HASH: b6ddaef24aebb1c4c4173fff74d574cc
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= '// ########################################## COLLAPSE / TOGGLERS ##############################

.toggleTarget
{
	display: none;
	.m-transition();
	.m-transitionProperty(all, -xf-height;);
	overflow: hidden;
	height: 0;
	opacity: 0;

	&.is-transitioning
	{
		display: block;
	}

	&.is-active
	{
		display: block;
		height: auto;
		opacity: 1;
	}
}

.collapseTrigger
{
	cursor: pointer;

	&:before
	{
		.m-faBase();
		.m-faContent(@fa-var-caret-right, .58em);
		font-size: 80%;
		margin-right: .2em;
	}

	&.is-active:before
	{
		.m-faContent(@fa-var-caret-down, .58em);
	}

	&.collapseTrigger--block
	{
		display: block;

		&:before
		{
			float: right;
			margin-right: 0;
			margin-left: 5px;
			font-size: 100%;
			line-height: inherit;
		}
	}
}';
	return $__finalCompiled;
});