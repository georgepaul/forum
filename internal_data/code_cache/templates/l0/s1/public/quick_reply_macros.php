<?php
// FROM HASH: 2faed7c83057fa628415443713991ec0
return array('macros' => array('body' => function($__templater, array $__arguments, array $__vars)
{
	$__vars = $__templater->setupBaseParamsForMacro($__vars, false);
	$__finalCompiled = '';
	$__vars = $__templater->mergeMacroArguments(array(
		'message' => '',
		'attachmentData' => null,
		'forceHash' => '',
		'messageSelector' => '',
		'multiQuoteHref' => '',
		'multiQuoteStorageKey' => '',
		'simple' => false,
		'showPreviewButton' => true,
		'submitText' => '',
		'lastDate' => '0',
		'lastKnownDate' => '0',
	), $__arguments, $__vars);
	$__finalCompiled .= '

	';
	$__templater->includeCss('message.less');
	$__finalCompiled .= '
	';
	$__vars['sticky'] = $__templater->fn('property', array('messageSticky', ), false);
	$__finalCompiled .= '

	<div class="message message--quickReply block-topRadiusContent block-bottomRadiusContent' . ($__vars['simple'] ? ' message--simple' : '') . '">
		<div class="message-inner">
			<div class="message-cell message-cell--user">
				<div class="message-user ' . ($__vars['sticky']['user_info'] ? 'is-sticky' : '') . '">
					<div class="message-avatar">
						<div class="message-avatar-wrapper">
							';
	$__vars['user'] = ($__vars['xf']['visitor']['user_id'] ? $__vars['xf']['visitor'] : null);
	$__finalCompiled .= '
							' . $__templater->fn('avatar', array($__vars['user'], ($__vars['simple'] ? 's' : 'm'), false, array(
		'defaultname' => '',
	))) . '
						</div>
					</div>
					<span class="message-userArrow"></span>
				</div>
			</div>
			<div class="message-cell message-cell--main">
				<div class="message-editorWrapper">
					' . $__templater->formEditor(array(
		'name' => 'message',
		'value' => $__vars['message'],
		'attachments' => ($__vars['attachmentData'] ? $__vars['attachmentData']['attachments'] : array()),
		'data-min-height' => '100',
		'placeholder' => 'Write your reply...',
		'previewable' => '0',
		'data-xf-key' => 'r',
	)) . '

					';
	if (!$__vars['xf']['visitor']['user_id']) {
		$__finalCompiled .= '
						' . $__templater->formTextBoxRow(array(
			'name' => '_xfUsername',
			'data-xf-init' => 'guest-username',
			'maxlength' => $__templater->fn('max_length', array($__vars['xf']['visitor'], 'username', ), false),
		), array(
			'rowtype' => 'fullWidth noGutter',
			'label' => 'Name',
		)) . '

						';
		if ($__templater->method($__vars['xf']['visitor'], 'isShownCaptcha', array())) {
			$__finalCompiled .= '
							<div class="js-captchaContainer" data-row-type="fullWidth noGutter"></div>
							<noscript>' . $__templater->formHiddenVal('no_captcha', '1', array(
			)) . '</noscript>
						';
		}
		$__finalCompiled .= '
					';
	}
	$__finalCompiled .= '

					';
	if ($__vars['attachmentData']) {
		$__finalCompiled .= '
						' . $__templater->callMacro('helper_attach_upload', 'uploaded_files_list', array(
			'attachments' => $__vars['attachmentData']['attachments'],
			'listClass' => 'attachUploadList--spaced',
		), $__vars) . '
					';
	}
	$__finalCompiled .= '

					';
	if ($__vars['showPreviewButton']) {
		$__finalCompiled .= '
						<div class="js-previewContainer"></div>
					';
	}
	$__finalCompiled .= '

					<div class="formButtonGroup">
						<div class="formButtonGroup-primary">
							' . $__templater->button('
								' . ($__templater->escape($__vars['submitText']) ?: 'Post reply') . '
							', array(
		'type' => 'submit',
		'class' => 'button--primary',
		'icon' => 'reply',
	), '', array(
	)) . '
							';
	if ($__vars['showPreviewButton']) {
		$__finalCompiled .= '
								' . $__templater->button('', array(
			'class' => 'u-jsOnly',
			'data-xf-click' => 'preview-click',
			'icon' => 'preview',
		), '', array(
		)) . '
							';
	}
	$__finalCompiled .= '
						</div>
						';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
									';
	if ($__vars['attachmentData']) {
		$__compilerTemp1 .= '
										' . $__templater->callMacro('helper_attach_upload', 'upload_link_from_data', array(
			'attachmentData' => $__vars['attachmentData'],
			'forceHash' => $__vars['forceHash'],
		), $__vars) . '
									';
	}
	$__compilerTemp1 .= '
									';
	if ($__vars['xf']['options']['multiQuote'] AND $__vars['multiQuoteHref']) {
		$__compilerTemp1 .= '
										' . $__templater->callMacro('multi_quote_macros', 'button', array(
			'href' => $__vars['multiQuoteHref'],
			'messageSelector' => $__vars['messageSelector'],
			'storageKey' => $__vars['multiQuoteStorageKey'],
		), $__vars) . '
									';
	}
	$__compilerTemp1 .= '
								';
	if (strlen(trim($__compilerTemp1)) > 0) {
		$__finalCompiled .= '
							<div class="formButtonGroup-extra">
								' . $__compilerTemp1 . '
							</div>
						';
	}
	$__finalCompiled .= '
					</div>
				</div>
			</div>
		</div>
		' . $__templater->formHiddenVal('last_date', $__vars['lastDate'], array(
	)) . '
		' . $__templater->formHiddenVal('last_known_date', $__vars['lastKnownDate'], array(
	)) . '
	</div>
';
	return $__finalCompiled;
},), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';

	return $__finalCompiled;
});