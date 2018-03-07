<?php
// FROM HASH: cae9b892b0c6a17350b842d095c2223f
return array('macros' => array('upload_link' => function($__templater, array $__arguments, array $__vars)
{
	$__vars = $__templater->setupBaseParamsForMacro($__vars, false);
	$__finalCompiled = '';
	$__vars = $__templater->mergeMacroArguments(array(
		'type' => '!',
		'hash' => '!',
		'context' => '!',
		'constraints' => '!',
		'hiddenName' => 'attachment_hash',
	), $__arguments, $__vars);
	$__finalCompiled .= '

	';
	$__templater->includeJs(array(
		'prod' => 'xf/attachment_manager-compiled.js',
		'dev' => 'vendor/flow.js/flow-compiled.js, xf/attachment_manager.js',
	));
	$__finalCompiled .= '

	' . $__templater->button('', array(
		'href' => $__templater->fn('link', array('attachments/upload', null, array('type' => $__vars['type'], 'context' => $__vars['context'], 'hash' => $__vars['hash'], ), ), false),
		'target' => '_blank',
		'class' => 'button--link js-attachmentUpload',
		'icon' => 'attach',
		'data-accept' => '.' . $__templater->filter($__vars['constraints']['extensions'], array(array('join', array(',.', )),), false),
	), '', array(
	)) . '
	' . $__templater->formHiddenVal($__vars['hiddenName'], $__vars['hash'], array(
	)) . '
	' . $__templater->formHiddenVal($__vars['hiddenName'] . '_combined', $__templater->filter(array('type' => $__vars['type'], 'context' => $__vars['context'], 'hash' => $__vars['hash'], ), array(array('json', array()),), false), array(
	)) . '
';
	return $__finalCompiled;
},
'upload_link_from_data' => function($__templater, array $__arguments, array $__vars)
{
	$__vars = $__templater->setupBaseParamsForMacro($__vars, false);
	$__finalCompiled = '';
	$__vars = $__templater->mergeMacroArguments(array(
		'attachmentData' => '!',
		'forceHash' => '',
		'hiddenName' => 'attachment_hash',
	), $__arguments, $__vars);
	$__finalCompiled .= '
	' . $__templater->callMacro(null, 'upload_link', array(
		'type' => $__vars['attachmentData']['type'],
		'hash' => ($__vars['forceHash'] ? $__vars['forceHash'] : $__vars['attachmentData']['hash']),
		'context' => $__vars['attachmentData']['context'],
		'constraints' => $__vars['attachmentData']['constraints'],
		'hiddenName' => $__vars['hiddenName'],
	), $__vars) . '
';
	return $__finalCompiled;
},
'uploaded_files_list' => function($__templater, array $__arguments, array $__vars)
{
	$__vars = $__templater->setupBaseParamsForMacro($__vars, false);
	$__finalCompiled = '';
	$__vars = $__templater->mergeMacroArguments(array(
		'attachments' => array(),
		'listClass' => '',
	), $__arguments, $__vars);
	$__finalCompiled .= '
	';
	$__templater->includeCss('attachments.less');
	$__finalCompiled .= '
	<ul class="attachUploadList ' . $__templater->escape($__vars['listClass']) . ' js-attachmentFiles u-hidden ' . (!$__templater->test($__vars['attachments'], 'empty', array()) ? 'is-active' : '') . '">
		<li class="attachUploadList-insertAll js-attachmentInsertAllRow u-hidden">
			<span>' . 'Insert all' . $__vars['xf']['language']['label_separator'] . '</span>
			<span class="buttonGroup buttonGroup--aligned">
				' . $__templater->button('
					' . 'Thumbnail' . '
				', array(
		'class' => 'button--small js-attachmentAllAction',
		'data-action' => 'thumbnail',
	), '', array(
	)) . '
				' . $__templater->button('
					' . 'Full image' . '
				', array(
		'class' => 'button--small js-attachmentAllAction',
		'data-action' => 'full',
	), '', array(
	)) . '
			</span>
		</li>
	';
	if ($__templater->isTraversable($__vars['attachments'])) {
		foreach ($__vars['attachments'] AS $__vars['attachment']) {
			$__finalCompiled .= '
		' . $__templater->callMacro(null, 'uploaded_file', array(
				'attachment' => $__vars['attachment'],
			), $__vars) . '
	';
		}
	}
	$__finalCompiled .= '
	</ul>
	' . $__templater->callMacro(null, 'uploaded_file_template', array(), $__vars) . '
';
	return $__finalCompiled;
},
'uploaded_file' => function($__templater, array $__arguments, array $__vars)
{
	$__vars = $__templater->setupBaseParamsForMacro($__vars, false);
	$__finalCompiled = '';
	$__vars = $__templater->mergeMacroArguments(array(
		'attachment' => '!',
		'noJsFallback' => false,
	), $__arguments, $__vars);
	$__finalCompiled .= '
	<li class="js-attachmentFile" data-attachment-id="' . $__templater->escape($__vars['attachment']['attachment_id']) . '">
		<div class="contentRow">
			<span class="contentRow-figure attachUploadList-figure">
				';
	if ($__vars['attachment']['has_thumbnail']) {
		$__finalCompiled .= '
					<a href="' . $__templater->fn('link', array('attachments', $__vars['attachment'], array('hash' => $__vars['attachment']['temp_hash'], ), ), true) . '" target="_blank"><img src="' . $__templater->fn('base_url', array($__vars['attachment']['thumbnail_url'], ), true) . '" class="js-attachmentThumb" alt="' . $__templater->escape($__vars['attachment']['filename']) . '" /></a>
				';
	} else {
		$__finalCompiled .= '
					<a href="' . $__templater->fn('link', array('attachments', $__vars['attachment'], array('hash' => $__vars['attachment']['temp_hash'], ), ), true) . '" target="_blank"><i class="attachUploadList-placeholder" aria-hidden="true"></i></a>
				';
	}
	$__finalCompiled .= '
			</span>
			<div class="contentRow-main">
				';
	if ($__vars['noJsFallback']) {
		$__finalCompiled .= '
					<span class="contentRow-extra">
						' . $__templater->button('
							' . 'Delete' . '
						', array(
			'type' => 'submit',
			'class' => 'button--small',
			'name' => 'delete',
			'value' => $__vars['attachment']['attachment_id'],
		), '', array(
		)) . '
					</span>
				';
	} else {
		$__finalCompiled .= '
					<span class="contentRow-extra u-jsOnly">
						' . $__templater->button('
							' . 'Delete' . '
						', array(
			'class' => 'button--small js-attachmentAction',
			'data-action' => 'delete',
		), '', array(
		)) . '
					</span>
				';
	}
	$__finalCompiled .= '
				<div class="contentRow-title">
					<a href="' . $__templater->fn('link', array('attachments', $__vars['attachment'], array('hash' => $__vars['attachment']['temp_hash'], ), ), true) . '" class="js-attachmentView" target="_blank">' . $__templater->escape($__vars['attachment']['filename']) . '</a>
				</div>
				';
	if ($__vars['attachment']['has_thumbnail'] AND (!$__vars['noJsFallback'])) {
		$__finalCompiled .= '
					<div class="contentRow-spaced contentRow-minor attachUploadList-insertRow js-attachmentInsertRow">
						<span>' . 'Insert' . $__vars['xf']['language']['label_separator'] . '</span>
						<span class="buttonGroup buttonGroup--aligned">
							' . $__templater->button('
								' . 'Thumbnail' . '
							', array(
			'class' => 'button--small js-attachmentAction',
			'data-action' => 'thumbnail',
		), '', array(
		)) . '
							' . $__templater->button('
								' . 'Full image' . '
							', array(
			'class' => 'button--small js-attachmentAction',
			'data-action' => 'full',
		), '', array(
		)) . '
						</span>
					</div>
				';
	}
	$__finalCompiled .= '
			</div>
		</div>
	</li>
';
	return $__finalCompiled;
},
'uploaded_file_template' => function($__templater, array $__arguments, array $__vars)
{
	$__vars = $__templater->setupBaseParamsForMacro($__vars, false);
	$__finalCompiled = '';
	$__vars = $__templater->mergeMacroArguments(array(), $__arguments, $__vars);
	$__finalCompiled .= '
	<script type="text/template" class="js-attachmentUploadTemplate">
		<li class="js-attachmentFile" ' . $__templater->fn('mustache', array('#attachment_id', 'data-attachment-id="{{attachment_id}}"', ), true) . '>
			<div class="contentRow">
				<span class="contentRow-figure attachUploadList-figure">
					' . $__templater->fn('mustache', array('#thumbnail_url', '
						<a href="' . $__templater->fn('mustache', array('link', ), true) . '" target="_blank"><img src="' . $__templater->fn('mustache', array('thumbnail_url', ), true) . '" class="js-attachmentThumb" alt="' . $__templater->fn('mustache', array('filename', ), true) . '" /></a>
					')) . '
					' . $__templater->fn('mustache', array('^thumbnail_url', '
						<i class="attachUploadList-placeholder" aria-hidden="true"></i>
					')) . '
				</span>
				<div class="contentRow-main">
					<span class="contentRow-extra u-jsOnly">
						' . $__templater->fn('mustache', array('^uploading', '
							' . $__templater->button('
								' . 'Delete' . '
							', array(
		'class' => 'button--small js-attachmentAction',
		'data-action' => 'delete',
	), '', array(
	)) . '
						')) . '
						' . $__templater->fn('mustache', array('#uploading', '
							' . $__templater->button('
								' . 'Cancel' . '
							', array(
		'class' => 'button--small js-attachmentAction',
		'data-action' => 'cancel',
	), '', array(
	)) . '
						')) . '
					</span>
					<div class="contentRow-title">
						' . $__templater->fn('mustache', array('#link', '
							<a href="' . $__templater->fn('mustache', array('link', ), true) . '" class="js-attachmentView" target="_blank">' . $__templater->fn('mustache', array('filename', ), true) . '</a>
						')) . '
						' . $__templater->fn('mustache', array('^link', '
							<span>' . $__templater->fn('mustache', array('filename', ), true) . '</span>
						')) . '
					</div>

					' . $__templater->fn('mustache', array('#uploading', '
						<div class="contentRow-spaced">
							<div class="attachUploadList-progress js-attachmentProgress"></div>
							<div class="attachUploadList-error js-attachmentError"></div>
						</div>
					')) . '

					' . $__templater->fn('mustache', array('^uploading', '
						' . $__templater->fn('mustache', array('#thumbnail_url', '
							<div class="contentRow-spaced attachUploadList-insertRow js-attachmentInsertRow">
								<span>' . 'Insert' . $__vars['xf']['language']['label_separator'] . '</span>
								<span class="buttonGroup buttonGroup--aligned">
									' . $__templater->button('
										' . 'Thumbnail' . '
									', array(
		'class' => 'button--small js-attachmentAction',
		'data-action' => 'thumbnail',
	), '', array(
	)) . '
									' . $__templater->button('
										' . 'Full image' . '
									', array(
		'class' => 'button--small js-attachmentAction',
		'data-action' => 'full',
	), '', array(
	)) . '
								</span>
							</div>
						')) . '
					')) . '
				</div>
			</div>
		</li>
	</script>
';
	return $__finalCompiled;
},
'upload_block' => function($__templater, array $__arguments, array $__vars)
{
	$__vars = $__templater->setupBaseParamsForMacro($__vars, false);
	$__finalCompiled = '';
	$__vars = $__templater->mergeMacroArguments(array(
		'attachmentData' => '!',
		'forceHash' => '',
		'hiddenName' => 'attachment_hash',
	), $__arguments, $__vars);
	$__finalCompiled .= '
	' . $__templater->callMacro(null, 'uploaded_files_list', array(
		'attachments' => $__vars['attachmentData']['attachments'],
	), $__vars) . '

	' . $__templater->callMacro(null, 'upload_link_from_data', array(
		'attachmentData' => $__vars['attachmentData'],
		'forceHash' => $__vars['forceHash'],
		'hiddenName' => $__vars['hiddenName'],
	), $__vars) . '
';
	return $__finalCompiled;
},), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

' . '

' . '

' . '

' . '

';
	return $__finalCompiled;
});