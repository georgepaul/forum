<?php
// FROM HASH: 107ac6d9c54f8d9bd72df8785de522a5
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	if ($__vars['showUnicodeWarning']) {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--error blockMessage--iconic">
		' . 'Full Unicode support has been enabled in config.php but your database is not set to support this. Full Unicode support should be disabled or errors may occur.' . '
	</div>
';
	}
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['xf']['visitor'], 'hasAdminPermission', array('style', )) AND $__vars['outdatedTemplates']) {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--important blockMessage--iconic">
		<a href="' . $__templater->fn('link', array('templates/outdated', ), true) . '"> ' . 'There are templates that may be outdated. Click here to review them.' . '</a>
	</div>
';
	}
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['xf']['visitor'], 'hasAdminPermission', array('viewLogs', )) AND $__vars['serverErrorLogs']) {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--error blockMessage--iconic">
		<a href="' . $__templater->fn('link', array('logs/server-errors', ), true) . '"> ' . 'Server errors have been logged. You should review these.' . '</a>
	</div>
';
	}
	$__finalCompiled .= '

';
	if ($__vars['legacyConfig']) {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--important">
		' . 'Your old config file at <code>library/config.php</code> is still available on the server. If you no longer need it, please delete or rename it. Your current and active config file is stored at <code>src/config.php</code>.' . '
	</div>
';
	}
	$__finalCompiled .= '

';
	if ($__vars['hasStoppedManualJobs']) {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--important blockMessage--iconic">
		' . 'There are manual rebuild jobs awaiting completion. <a href="' . $__templater->fn('link', array('tools/run-job', ), true) . '">Continue running them.</a>' . '
	</div>
';
	}
	$__finalCompiled .= '

';
	$__vars['firstFileCheck'] = $__templater->filter($__vars['fileChecks'], array(array('first', array()),), false);
	$__finalCompiled .= '
';
	if ($__vars['firstFileCheck']['check_state'] == 'failure') {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--error blockMessage--iconic">
		<a href="' . $__templater->fn('link', array('tools/file-check/results', $__vars['firstFileCheck'], ), true) . '">
			' . 'There are ' . $__templater->filter($__vars['firstFileCheck']['total_missing'] + $__vars['firstFileCheck']['total_inconsistent'], array(array('number', array()),), true) . ' missing files or files with unexpected contents. You should review these.' . '
		</a>
	</div>
';
	}
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['xf']['visitor'], 'hasAdminPermission', array('user', ))) {
		$__finalCompiled .= '
	<div class="block">
		<div class="block-container">
			' . $__templater->form('
				<div class="block-body">
					' . $__templater->formTextBoxRow(array(
			'name' => 'query',
			'placeholder' => 'Username, email, IP' . $__vars['xf']['language']['ellipsis'],
			'value' => '',
		), array(
			'label' => 'Search for users',
		)) . '
					' . $__templater->formSubmitRow(array(
			'icon' => 'search',
		), array(
		)) . '
				</div>
			', array(
			'action' => $__templater->fn('link', array('users/quick-search', ), false),
		)) . '
		</div>
	</div>
';
	}
	$__finalCompiled .= '

';
	if (!$__templater->test($__vars['stats'], 'empty', array()) AND $__templater->method($__vars['xf']['visitor'], 'hasAdminPermission', array('viewStatistics', ))) {
		$__finalCompiled .= '
	';
		$__templater->includeCss('public:chartist.css');
		$__finalCompiled .= '
	';
		$__templater->includeCss('stats.less');
		$__finalCompiled .= '

	';
		$__templater->includeJs(array(
			'prod' => 'xf/stats-compiled.js',
			'dev' => 'vendor/chartist/chartist.min.js, xf/stats.js',
		));
		$__finalCompiled .= '

	<div class="block">
		<div class="block-container">
			<h2 class="block-header"><a href="' . $__templater->fn('link', array('stats', ), true) . '">' . 'Statistics' . '</a></h2>
			<div class="block-body block-row">
				<ul class="graphList">
					';
		if ($__templater->isTraversable($__vars['stats'])) {
			foreach ($__vars['stats'] AS $__vars['statsData']) {
				$__finalCompiled .= '
						<li data-xf-init="stats" data-max-ticks="4">
							<script class="js-statsData" type="application/json">
								' . $__templater->filter($__vars['statsData']['data'], array(array('json', array()),array('raw', array()),), true) . '
							</script>
							<script class="js-statsSeriesLabels" type="application/json">
								' . $__templater->filter($__vars['statsData']['phrases'], array(array('json', array()),array('raw', array()),), true) . '
							</script>
							<div class="ct-chart ct-chart--small ct-major-tenth js-statsChart"></div>
							<ul class="ct-legend js-statsLegend"></ul>
						</li>
					';
			}
		}
		$__finalCompiled .= '
				</ul>
			</div>
		</div>
	</div>
';
	}
	$__finalCompiled .= '

<div class="iconicLinks">
	<ul class="iconicLinks-list">
		';
	if ($__templater->isTraversable($__vars['navigation'])) {
		foreach ($__vars['navigation'] AS $__vars['entry']) {
			$__finalCompiled .= '
			';
			$__vars['nav'] = $__vars['entry']['record'];
			$__finalCompiled .= '
			';
			if ($__vars['nav']['link']) {
				$__finalCompiled .= '
				<li><a href="' . $__templater->fn('link', array($__vars['nav']['link'], ), true) . '">
					<div class="iconicLinks-icon"><i class="fa fa-fw ' . $__templater->escape($__vars['nav']['icon']) . '" aria-hidden="true"></i></div>
					<div class="iconicLinks-title">' . $__templater->escape($__vars['nav']['title']) . '</div>
				</a></li>
			';
			}
			$__finalCompiled .= '
		';
		}
	}
	$__finalCompiled .= '
		<li class="iconicLinks-placeholder"></li>
		<li class="iconicLinks-placeholder"></li>
		<li class="iconicLinks-placeholder"></li>
		<li class="iconicLinks-placeholder"></li>
		<li class="iconicLinks-placeholder"></li>
	</ul>
</div>

';
	if (!$__templater->test($__vars['logCounts'], 'empty', array()) AND $__templater->method($__vars['xf']['visitor'], 'hasAdminPermission', array('viewLogs', ))) {
		$__finalCompiled .= '
	<div class="block">
		<div class="block-container">
			<h2 class="block-header">' . 'Logged activity' . '</h2>
			<div class="block-body">
				' . $__templater->dataList('
					' . $__templater->dataRow(array(
			'rowtype' => 'header',
		), array(array(
			'_type' => 'cell',
			'html' => 'Type',
		),
		array(
			'_type' => 'cell',
			'html' => 'Last day',
		),
		array(
			'_type' => 'cell',
			'html' => 'Last week',
		),
		array(
			'_type' => 'cell',
			'html' => 'Last month',
		),
		array(
			'_type' => 'cell',
			'html' => ' ',
		))) . '

					' . '
					' . $__templater->dataRow(array(
		), array(array(
			'_type' => 'cell',
			'html' => 'Moderator actions',
		),
		array(
			'_type' => 'cell',
			'html' => $__templater->filter($__vars['logCounts']['moderator']['day'], array(array('number', array()),), true),
		),
		array(
			'_type' => 'cell',
			'html' => $__templater->filter($__vars['logCounts']['moderator']['week'], array(array('number', array()),), true),
		),
		array(
			'_type' => 'cell',
			'html' => $__templater->filter($__vars['logCounts']['moderator']['month'], array(array('number', array()),), true),
		),
		array(
			'href' => $__templater->fn('link', array('logs/moderator', ), false),
			'_type' => 'action',
			'html' => 'View',
		))) . '

					' . $__templater->dataRow(array(
		), array(array(
			'_type' => 'cell',
			'html' => 'Spam triggers',
		),
		array(
			'_type' => 'cell',
			'html' => $__templater->filter($__vars['logCounts']['spamTrigger']['day'], array(array('number', array()),), true),
		),
		array(
			'_type' => 'cell',
			'html' => $__templater->filter($__vars['logCounts']['spamTrigger']['week'], array(array('number', array()),), true),
		),
		array(
			'_type' => 'cell',
			'html' => $__templater->filter($__vars['logCounts']['spamTrigger']['month'], array(array('number', array()),), true),
		),
		array(
			'href' => $__templater->fn('link', array('logs/spam-trigger', ), false),
			'_type' => 'action',
			'html' => 'View',
		))) . '

					' . $__templater->dataRow(array(
		), array(array(
			'_type' => 'cell',
			'html' => 'Spam cleanings',
		),
		array(
			'_type' => 'cell',
			'html' => $__templater->filter($__vars['logCounts']['spamCleaner']['day'], array(array('number', array()),), true),
		),
		array(
			'_type' => 'cell',
			'html' => $__templater->filter($__vars['logCounts']['spamCleaner']['week'], array(array('number', array()),), true),
		),
		array(
			'_type' => 'cell',
			'html' => $__templater->filter($__vars['logCounts']['spamCleaner']['month'], array(array('number', array()),), true),
		),
		array(
			'href' => $__templater->fn('link', array('logs/spam-cleaner', ), false),
			'_type' => 'action',
			'html' => 'View',
		))) . '

					' . $__templater->dataRow(array(
		), array(array(
			'_type' => 'cell',
			'html' => 'Emails bounced',
		),
		array(
			'_type' => 'cell',
			'html' => $__templater->filter($__vars['logCounts']['emailBounce']['day'], array(array('number', array()),), true),
		),
		array(
			'_type' => 'cell',
			'html' => $__templater->filter($__vars['logCounts']['emailBounce']['week'], array(array('number', array()),), true),
		),
		array(
			'_type' => 'cell',
			'html' => $__templater->filter($__vars['logCounts']['emailBounce']['month'], array(array('number', array()),), true),
		),
		array(
			'href' => $__templater->fn('link', array('logs/email-bounces', ), false),
			'_type' => 'action',
			'html' => 'View',
		))) . '

					' . $__templater->dataRow(array(
		), array(array(
			'_type' => 'cell',
			'html' => 'Payments received',
		),
		array(
			'_type' => 'cell',
			'html' => $__templater->filter($__vars['logCounts']['payment']['day'], array(array('number', array()),), true),
		),
		array(
			'_type' => 'cell',
			'html' => $__templater->filter($__vars['logCounts']['payment']['week'], array(array('number', array()),), true),
		),
		array(
			'_type' => 'cell',
			'html' => $__templater->filter($__vars['logCounts']['payment']['month'], array(array('number', array()),), true),
		),
		array(
			'href' => $__templater->fn('link', array('logs/payment-provider', ), false),
			'_type' => 'action',
			'html' => 'View',
		))) . '
					' . '
				', array(
			'data-xf-init' => 'responsive-data-list',
		)) . '
			</div>
		</div>
	</div>
';
	}
	$__finalCompiled .= '

';
	if (!$__templater->test($__vars['staffOnline'], 'empty', array())) {
		$__finalCompiled .= '
	<div class="block">
		<div class="block-container">
			<h2 class="block-header">' . 'Staff online' . '</h2>
			<ul class="block-body">
				';
		if ($__templater->isTraversable($__vars['staffOnline'])) {
			foreach ($__vars['staffOnline'] AS $__vars['user']) {
				$__finalCompiled .= '
					<li class="block-row">
						<div class="contentRow">
							<div class="contentRow-figure">
								' . $__templater->fn('avatar', array($__vars['user'], 'xs', false, array(
				))) . '
							</div>
							<div class="contentRow-main contentRow-main--close">
								' . $__templater->fn('username_link', array($__vars['user'], true, array(
				))) . '
								<div class="contentRow-minor">
									' . $__templater->fn('user_title', array($__vars['user'], false, array(
				))) . '
								</div>
							</div>
						</div>
					</li>
				';
			}
		}
		$__finalCompiled .= '
			</ul>
		</div>
	</div>
';
	}
	$__finalCompiled .= '

';
	if (!$__templater->test($__vars['fileChecks'], 'empty', array())) {
		$__finalCompiled .= '
	<div class="block">
		<div class="block-container">
			<h3 class="block-header">' . 'File health check results' . '</h3>
			<div class="block-body">
				' . $__templater->callMacro('tools_file_check', 'file_check_list', array(
			'fileChecks' => $__vars['fileChecks'],
		), $__vars) . '
			</div>
		</div>
	</div>
';
	}
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['xf']['visitor'], 'hasAdminPermission', array('addOn', ))) {
		$__finalCompiled .= '
	';
		$__templater->includeCss('addon_list.less');
		$__finalCompiled .= '
	<div class="addOnList">
		' . $__templater->callMacro('addon_list_macros', 'addon_list_block', array(
			'addOns' => $__vars['installedAddOns'],
			'heading' => 'Installed add-ons',
		), $__vars) . '
	</div>
';
	}
	return $__finalCompiled;
});