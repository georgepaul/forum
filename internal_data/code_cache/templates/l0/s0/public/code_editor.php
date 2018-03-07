<?php
// FROM HASH: 36cb4ddb5fc860f9dde1084e94e8a965
return array('macros' => array('editor_setup' => function($__templater, array $__arguments, array $__vars)
{
	$__vars = $__templater->setupBaseParamsForMacro($__vars, false);
	$__finalCompiled = '';
	$__vars = $__templater->mergeMacroArguments(array(
		'modeConfig' => '!',
	), $__arguments, $__vars);
	$__finalCompiled .= '
	';
	$__templater->includeJs(array(
		'src' => 'vendor/codemirror/codemirror.min.js',
	));
	$__finalCompiled .= '

	';
	if ($__vars['modeConfig']['addons']) {
		$__finalCompiled .= '
		';
		if ($__templater->fn('is_array', array($__vars['modeConfig']['addons'], ), false)) {
			$__finalCompiled .= '
			';
			if ($__templater->isTraversable($__vars['modeConfig']['addons'])) {
				foreach ($__vars['modeConfig']['addons'] AS $__vars['addon']) {
					$__finalCompiled .= '
				';
					$__templater->includeJs(array(
						'src' => 'vendor/codemirror/addon/' . $__vars['addon'] . '.min.js',
					));
					$__finalCompiled .= '
			';
				}
			}
			$__finalCompiled .= '
		';
		} else {
			$__finalCompiled .= '
			';
			$__templater->includeJs(array(
				'src' => 'vendor/codemirror/addon/' . $__vars['modeConfig']['addons'] . '.min.js',
			));
			$__finalCompiled .= '
		';
		}
		$__finalCompiled .= '
	';
	}
	$__finalCompiled .= '

	';
	if ($__vars['modeConfig']['modes']) {
		$__finalCompiled .= '
		';
		if ($__templater->fn('is_array', array($__vars['modeConfig']['modes'], ), false)) {
			$__finalCompiled .= '
			';
			if ($__templater->isTraversable($__vars['modeConfig']['modes'])) {
				foreach ($__vars['modeConfig']['modes'] AS $__vars['mode']) {
					$__finalCompiled .= '
				';
					$__templater->includeJs(array(
						'src' => 'vendor/codemirror/mode/' . $__vars['mode'] . '/' . $__vars['mode'] . '.min.js',
					));
					$__finalCompiled .= '
			';
				}
			}
			$__finalCompiled .= '
		';
		} else {
			$__finalCompiled .= '
			';
			$__templater->includeJs(array(
				'src' => 'vendor/codemirror/mode/' . $__vars['modeConfig']['modes'] . '/' . $__vars['modeConfig']['modes'] . '.min.js',
			));
			$__finalCompiled .= '
		';
		}
		$__finalCompiled .= '
	';
	}
	$__finalCompiled .= '

	';
	$__templater->includeJs(array(
		'src' => 'xf/code_editor.js',
		'min' => '1',
	));
	$__finalCompiled .= '
';
	return $__finalCompiled;
},), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__templater->includeCss('code_editor.less');
	$__finalCompiled .= '

' . $__templater->callMacro(null, 'editor_setup', array(
		'modeConfig' => $__vars['modeConfig'],
	), $__vars) . '

<textarea name="' . $__templater->escape($__vars['name']) . '"
	class="codeEditor' . ($__vars['extraClasses'] ? (' ' . $__templater->escape($__vars['extraClasses'])) : '') . ' js-codeEditor u-jsOnly"
	dir="ltr"
	data-xf-init="code-editor"
	data-mode="' . ($__templater->escape($__vars['modeConfig']['mime']) ?: $__templater->filter($__vars['modeConfig']['modes'], array(array('first', array()),), true)) . '"
	data-lang="' . $__templater->escape($__vars['lang']) . '"
	data-config="' . $__templater->filter($__vars['modeConfig']['config'], array(array('json', array()),), true) . '"
	' . ($__vars['readOnly'] ? 'readonly="readonly"' : '') . '
	style="display: none;" ' . $__templater->filter($__vars['attrsHtml'], array(array('raw', array()),), true) . '>' . $__templater->escape($__vars['value']) . '</textarea>
<noscript>
	<textarea name="' . $__templater->escape($__vars['name']) . '" class="input input--code" dir="ltr" ' . ($__vars['readOnly'] ? 'readonly="readonly"' : '') . '>' . $__templater->escape($__vars['value']) . '</textarea>
</noscript>

';
	return $__finalCompiled;
});