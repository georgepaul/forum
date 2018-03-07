<?php
// FROM HASH: a96661b76f06949d5750a0a33c6e3772
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Routes');
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__templater->isTraversable($__vars['routeTypes'])) {
		foreach ($__vars['routeTypes'] AS $__vars['routeTypeId'] => $__vars['routeType']) {
			$__compilerTemp1 .= '
		' . $__templater->button('Add route' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['routeType']), array(
				'href' => $__templater->fn('link', array('routes/add', null, array('type' => $__vars['routeTypeId'], ), ), false),
				'icon' => 'add',
			), '', array(
			)) . '
	';
		}
	}
	$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__compilerTemp1 . '
');
	$__finalCompiled .= '

<div class="block">
	<div class="block-container">
		<h2 class="block-tabHeader tabs hScroller" data-xf-init="tabs h-scroller" data-state="replace" role="tablist">
			<span class="hScroller-scroll">
			';
	if ($__templater->isTraversable($__vars['routeTypes'])) {
		foreach ($__vars['routeTypes'] AS $__vars['routeTypeId'] => $__vars['routeType']) {
			$__finalCompiled .= '
				<a class="tabs-tab ' . (($__vars['routeTypeId'] == $__vars['selectedTab']) ? 'is-active' : '') . '"
					role="tab"
					tabindex="0"
					aria-controls="route-' . $__templater->escape($__vars['routeTypeId']) . '"
					id="' . (($__vars['routeTypeId'] != 'public') ? $__templater->escape($__vars['routeTypeId']) : '') . '">' . $__templater->escape($__vars['routeType']) . '</a>
			';
		}
	}
	$__finalCompiled .= '
			</span>
		</h2>
		<ul class="tabPanes">
			';
	if ($__templater->isTraversable($__vars['routeTypes'])) {
		foreach ($__vars['routeTypes'] AS $__vars['routeTypeId'] => $__vars['routeType']) {
			$__finalCompiled .= '
				<li class="block-body ' . (($__vars['routeTypeId'] == $__vars['selectedTab']) ? 'is-active' : '') . '"
					role="tabpanel" id="route-' . $__templater->escape($__vars['routeTypeId']) . '">

					';
			if (!$__templater->test($__vars['routesGrouped'][$__vars['routeTypeId']], 'empty', array())) {
				$__finalCompiled .= '
						';
				$__compilerTemp2 = '';
				if ($__templater->isTraversable($__vars['routesGrouped'][$__vars['routeTypeId']])) {
					foreach ($__vars['routesGrouped'][$__vars['routeTypeId']] AS $__vars['route']) {
						$__compilerTemp2 .= '
								' . $__templater->dataRow(array(
							'hash' => $__vars['route']['route_id'],
							'href' => $__templater->fn('link', array('routes/edit', $__vars['route'], ), false),
							'label' => $__templater->escape($__vars['route']['unique_name']),
							'hint' => $__templater->escape($__vars['route']['route_prefix']) . '/' . $__templater->escape($__vars['route']['format']),
							'delete' => $__templater->fn('link', array('routes/delete', $__vars['route'], ), false),
							'dir' => 'auto',
						), array()) . '
							';
					}
				}
				$__finalCompiled .= $__templater->dataList('
							' . $__compilerTemp2 . '
						', array(
				)) . '
					';
			} else {
				$__finalCompiled .= '
						<div class="block-row">' . 'No items have been created yet.' . '</div>
					';
			}
			$__finalCompiled .= '
				</li>
			';
		}
	}
	$__finalCompiled .= '
		</ul>
		<div class="block-footer">
			<span class="block-footer-counter">' . $__templater->fn('display_totals', array($__vars['totalRoutes'], ), true) . '</span>
		</div>
	</div>
</div>';
	return $__finalCompiled;
});