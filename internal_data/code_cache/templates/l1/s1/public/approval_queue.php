<?php
// FROM HASH: 20944c439c6d8f9d309da21b00cef515
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Approval queue');
	$__finalCompiled .= '

';
	if (!$__templater->test($__vars['unapprovedItems'], 'empty', array())) {
		$__finalCompiled .= '
	';
		$__compilerTemp1 = '';
		$__vars['i'] = 0;
		if ($__templater->isTraversable($__vars['unapprovedItems'])) {
			foreach ($__vars['unapprovedItems'] AS $__vars['unapprovedItem']) {
				$__vars['i']++;
				$__compilerTemp1 .= '
				<li class="block">
					<div class="block-container">
						<div class="block-body">
							' . $__templater->filter($__templater->method($__templater->method($__vars['unapprovedItem'], 'getHandler', array()), 'render', array($__vars['unapprovedItem'], )), array(array('raw', array()),), true) . '
						</div>
					</div>
				</li>
			';
			}
		}
		$__finalCompiled .= $__templater->form('
		<ul class="listPlain">
			' . $__compilerTemp1 . '
		</ul>

		<div class="block">
			<div class="block-container">
				' . $__templater->formSubmitRow(array(
			'icon' => 'save',
			'sticky' => '.js-stickyParent',
		), array(
		)) . '
			</div>
		</div>
	', array(
			'action' => $__templater->fn('link', array('approval-queue/process', ), false),
			'ajax' => 'true',
			'class' => 'js-stickyParent',
		)) . '
';
	} else {
		$__finalCompiled .= '
	<div class="blockMessage">' . 'There is no content currently awaiting approval.' . '</div>
';
	}
	return $__finalCompiled;
});