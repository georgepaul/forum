<?php
// FROM HASH: 9d2579519605715d9c6472ed65082c33
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= '// ############################ FIXED MESSAGE BAR ################

.fixedMessageBar
{
	.xf-fixedMessage();
	.m-transitionFadeDown();
	.m-clearFix();
}

.fixedMessageBar-inner
{
	display: flex;
	align-items: center;
	justify-content: space-between;
}

.fixedMessageBar-message
{
	order: 1;
}

.fixedMessageBar-close
{
	float: right;
	margin-left: 1em;
	order: 2;
	color: inherit;

	&:before
	{
		.m-faBase();
		.m-faContent(@fa-var-remove, .79em);
	}

	&:hover
	{
		text-decoration: none;
		color: xf-intensify(@xf-fixedMessage--color, 10%);
	}
}';
	return $__finalCompiled;
});