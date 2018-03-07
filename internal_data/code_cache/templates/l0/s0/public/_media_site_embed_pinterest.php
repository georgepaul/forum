<?php
// FROM HASH: d44272aac831cc79117a464b398cd546
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__templater->setPageParam('jsState.pinterest', true);
	$__finalCompiled .= '

<div class="bbMediaJustifier">
	<a data-pin-do="embedPin"
		data-pin-width="large"
		href="https://www.pinterest.com/pin/' . $__templater->escape($__vars['idDigits']) . '/">
		<i class="fa fa-pinterest-square" aria-hidden="true"></i> https://www.pinterest.com/pin/' . $__templater->escape($__vars['idDigits']) . '/</a>
</div>';
	return $__finalCompiled;
});