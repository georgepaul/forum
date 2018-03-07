<?php
// FROM HASH: 4f5d0d07677bf1116f5c45dfa1567757
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<h3 class="block-formSectionHeader">' . 'Source database configuration' . '</h3>
';
	if (!$__vars['baseConfig']['db']['host']) {
		$__finalCompiled .= '
	' . $__templater->formTextBoxRow(array(
			'name' => 'config[db][host]',
			'value' => 'localhost',
			'placeholder' => '$config[\'db\'][\'host\']',
		), array(
			'label' => 'MySQL server',
		)) . '
	' . $__templater->formTextBoxRow(array(
			'name' => 'config[db][port]',
			'value' => '3306',
			'placeholder' => '$config[\'db\'][\'port\']',
		), array(
			'label' => 'MySQL port',
		)) . '
	' . $__templater->formTextBoxRow(array(
			'name' => 'config[db][username]',
			'placeholder' => '$config[\'db\'][\'username\']',
		), array(
			'label' => 'MySQL user name',
		)) . '
	' . $__templater->formTextBoxRow(array(
			'name' => 'config[db][password]',
			'autocomplete' => 'off',
			'placeholder' => '$config[\'db\'][\'password\']',
		), array(
			'label' => 'MySQL password',
		)) . '
	' . $__templater->formTextBoxRow(array(
			'name' => 'config[db][dbname]',
			'placeholder' => '$config[\'db\'][\'dbname\']',
		), array(
			'label' => 'MySQL database name',
		)) . '
';
	} else {
		$__finalCompiled .= '
	' . $__templater->formRow($__templater->escape($__vars['fullConfig']['db']['host']) . ':' . $__templater->escape($__vars['fullConfig']['db']['dbname']), array(
			'label' => 'MySQL server',
		)) . '
';
	}
	$__finalCompiled .= '

';
	if (!$__vars['baseConfig']['data_dir']) {
		$__finalCompiled .= '
	<hr class="formRowSep" />

	' . $__templater->formTextBoxRow(array(
			'name' => 'config[data_dir]',
			'placeholder' => '$config[\'externalDataPath\']',
		), array(
			'label' => 'Data directory',
		)) . '
';
	} else {
		$__finalCompiled .= '
	' . $__templater->formRow($__templater->escape($__vars['fullConfig']['data_dir']), array(
			'label' => 'Data directory',
		)) . '
';
	}
	$__finalCompiled .= '
';
	if (!$__vars['baseConfig']['internal_data_dir']) {
		$__finalCompiled .= '
	' . $__templater->formTextBoxRow(array(
			'name' => 'config[internal_data_dir]',
			'placeholder' => '$config[\'internalDataPath\']',
		), array(
			'label' => 'Internal data directory',
		)) . '
';
	} else {
		$__finalCompiled .= '
	' . $__templater->formRow($__templater->escape($__vars['fullConfig']['internal_data_dir']), array(
			'label' => 'Internal data directory',
		)) . '
';
	}
	return $__finalCompiled;
});