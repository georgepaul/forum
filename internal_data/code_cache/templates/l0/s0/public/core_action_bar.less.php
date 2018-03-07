<?php
// FROM HASH: 5174154977c555f16de4c062777a1456
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= '.actionBar
{
	.m-clearFix();
}

.actionBar-set
{
	&.actionBar-set--internal
	{
		float: left;
		margin-left: -3px;

		> .actionBar-action:first-child
		{
			margin-left: 0;
		}
	}

	&.actionBar-set--external
	{
		float: right;
		margin-right: -3px;

		> .actionBar-action:last-child
		{
			margin-right: 0;
		}
	}
}

.actionBar-action
{
	padding: 3px;
	border: 1px solid transparent;
	border-radius: @xf-borderRadiusMedium;
	margin-left: 5px;

	&:before
	{
		.m-faBase();
		font-size: 90%;
	}

	&.actionBar-action--menuTrigger
	{
		display: none;

		&:after
		{
			.m-faBase();
			.m-faContent(" @{fa-var-caret-down}");
		}

		&.is-menuOpen
		{
			// get rid of text decoration when the menu opens
			text-decoration: none;
		}
	}

	&.actionBar-action--inlineMod input
	{
		.m-checkboxAligner();
	}

	&.actionBar-action--mq
	{
		&:before { .m-faContent("@{fa-var-plus}\\20"); }

		&.is-selected
		{
			background-color: @xf-contentHighlightBg;
			border-color: @xf-borderColorHighlight;

			&:before { .m-faContent("@{fa-var-minus}\\20"); }
		}
	}

	&.actionBar-action--reply:before { .m-faContent("@{fa-var-reply}\\20"); }
	&.actionBar-action--like:before { .m-faContent("@{fa-var-thumbs-o-up}\\20"); }
}

@media (max-width: @xf-responsiveNarrow)
{
	.actionBar-action
	{
		&.actionBar-action--menuItem
		{
			display: none !important;
		}

		&.actionBar-action--menuTrigger
		{
			display: inline;
		}
	}
}';
	return $__finalCompiled;
});