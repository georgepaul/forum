<?php
// FROM HASH: c451664b3291abe064f489886e38bf76
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	if ($__vars['xf']['options']['googleAnalyticsWebPropertyId']) {
		$__finalCompiled .= '
	';
		if ($__vars['xf']['cookie']['domain']) {
			$__finalCompiled .= '
		';
			$__vars['gaConfig'] = $__templater->preEscaped('{\'cookie_domain\': \'' . $__templater->escape($__vars['xf']['cookie']['domain']) . '\'}');
			$__finalCompiled .= '
	';
		} else {
			$__finalCompiled .= '
		';
			$__vars['gaConfig'] = $__templater->preEscaped('{}');
			$__finalCompiled .= '
	';
		}
		$__finalCompiled .= '
	<script async src="https://www.googletagmanager.com/gtag/js?id=' . $__templater->escape($__vars['xf']['options']['googleAnalyticsWebPropertyId']) . '"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag(\'js\', new Date());
		gtag(\'config\', \'' . $__templater->filter($__vars['xf']['options']['googleAnalyticsWebPropertyId'], array(array('escape', array('js', )),), true) . '\', ' . $__templater->escape($__vars['gaConfig']) . ');
	</script>
';
	}
	return $__finalCompiled;
});