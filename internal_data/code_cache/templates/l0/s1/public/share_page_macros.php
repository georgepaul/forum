<?php
// FROM HASH: 35872b74f470478f30e6ccac36f44474
return array('macros' => array('buttons' => function($__templater, array $__arguments, array $__vars)
{
	$__vars = $__templater->setupBaseParamsForMacro($__vars, false);
	$__finalCompiled = '';
	$__vars = $__templater->mergeMacroArguments(array(
		'iconic' => false,
		'label' => '',
	), $__arguments, $__vars);
	$__finalCompiled .= '
	';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '

				';
	if ($__vars['xf']['options']['facebookLike']) {
		$__compilerTemp1 .= '
					<a class="shareButtons-button shareButtons-button--facebook" data-href="https://www.facebook.com/sharer.php?u={url}">
						<i aria-hidden="true"></i>
						<span>' . 'Facebook' . '</span>
					</a>
				';
	}
	$__compilerTemp1 .= '

				';
	if ($__vars['xf']['options']['tweet']['enabled']) {
		$__compilerTemp1 .= '
					<a class="shareButtons-button shareButtons-button--twitter" data-href="https://twitter.com/intent/tweet?url={url}&amp;text={title}' . ($__vars['xf']['options']['tweet']['via'] ? ('&amp;via=' . $__templater->escape($__vars['xf']['options']['tweet']['via'])) : '') . ($__vars['xf']['options']['tweet']['related'] ? ('&amp;related=' . $__templater->escape($__vars['xf']['options']['tweet']['related'])) : '') . '">
						<i aria-hidden="true"></i>
						<span>' . 'Twitter' . '</span>
					</a>
				';
	}
	$__compilerTemp1 .= '

				';
	if ($__vars['xf']['options']['plusone']) {
		$__compilerTemp1 .= '
					<a class="shareButtons-button shareButtons-button--gplus" data-href="https://plus.google.com/share?url={url}">
						<i aria-hidden="true"></i>
						<span>' . 'Google+' . '</span>
					</a>
				';
	}
	$__compilerTemp1 .= '

				';
	if ($__vars['xf']['options']['redditShare']) {
		$__compilerTemp1 .= '
					<a class="shareButtons-button shareButtons-button--reddit" data-href="https://reddit.com/submit?url={url}&amp;title={title}">
						<i aria-hidden="true"></i>
						<span>' . 'Reddit' . '</span>
					</a>
				';
	}
	$__compilerTemp1 .= '

				';
	if ($__vars['xf']['options']['pinterestShare']) {
		$__compilerTemp1 .= '
					<a class="shareButtons-button shareButtons-button--pinterest" data-href="https://pinterest.com/pin/create/bookmarklet/?url={url}&amp;description={title}">
						<i></i>
						<span>' . 'Pinterest' . '</span>
					</a>
				';
	}
	$__compilerTemp1 .= '

				';
	if ($__vars['xf']['options']['tumblrShare']) {
		$__compilerTemp1 .= '
					<a class="shareButtons-button shareButtons-button--tumblr" data-href="https://www.tumblr.com/widgets/share/tool?canonicalUrl={url}&amp;title={title}">
						<i></i>
						<span>' . 'Tumblr' . '</span>
					</a>
				';
	}
	$__compilerTemp1 .= '

				';
	if ($__vars['xf']['options']['whatsAppShare']) {
		$__compilerTemp1 .= '
					<a class="shareButtons-button shareButtons-button--whatsApp" data-href="https://api.whatsapp.com/send?text={title}&nbsp;{url}">
						<i></i>
						<span>' . 'WhatsApp' . '</span>
					</a>
				';
	}
	$__compilerTemp1 .= '

				';
	if ($__vars['xf']['options']['emailShare']) {
		$__compilerTemp1 .= '
					<a class="shareButtons-button shareButtons-button--email" data-href="mailto:?subject={title}&amp;body={url}">
						<i></i>
						<span>' . 'Email' . '</span>
					</a>
				';
	}
	$__compilerTemp1 .= '

				';
	if ($__vars['xf']['options']['linkShare']) {
		$__compilerTemp1 .= '
					<a class="shareButtons-button shareButtons-button--link is-hidden" data-clipboard="{url}">
						<i></i>
						<span>' . 'Link' . '</span>
					</a>
					';
		$__templater->inlineJs('
						jQuery.extend(XF.phrases, {
							link_copied_to_clipboard: "' . $__templater->filter('Link copied to clipboard.', array(array('escape', array('js', )),), false) . '"
						});
					');
		$__compilerTemp1 .= '
				';
	}
	$__compilerTemp1 .= '
			';
	if (strlen(trim($__compilerTemp1)) > 0) {
		$__finalCompiled .= '
		';
		$__templater->includeCss('share_controls.less');
		$__finalCompiled .= '
		<div class="shareButtons ' . ($__vars['iconic'] ? 'shareButtons--iconic' : '') . '" data-xf-init="share-buttons">
			';
		if (!$__templater->test($__vars['label'], 'empty', array())) {
			$__finalCompiled .= '
				<span class="shareButtons-label">' . $__templater->escape($__vars['label']) . '</span>
			';
		}
		$__finalCompiled .= '

			' . $__compilerTemp1 . '
		</div>
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
},
'share_clipboard_input' => function($__templater, array $__arguments, array $__vars)
{
	$__vars = $__templater->setupBaseParamsForMacro($__vars, false);
	$__finalCompiled = '';
	$__vars = $__templater->mergeMacroArguments(array(
		'label' => '!',
		'text' => '!',
	), $__arguments, $__vars);
	$__finalCompiled .= '
	';
	$__templater->includeCss('share_controls.less');
	$__finalCompiled .= '

	';
	$__vars['id'] = $__templater->preEscaped($__templater->fn('unique_id', array(), true));
	$__finalCompiled .= '

	<div class="shareInput" data-xf-init="share-input">
		';
	if ($__vars['label']) {
		$__finalCompiled .= '
			<label class="shareInput-label" for="' . $__templater->escape($__vars['id']) . '">' . $__templater->escape($__vars['label']) . '</label>
		';
	}
	$__finalCompiled .= '
		<div class="inputGroup inputGroup--joined">
			<div class="shareInput-button inputGroup-text js-shareButton is-hidden"
				data-xf-init="tooltip" title="' . $__templater->filter('Copy to clipboard', array(array('for_attr', array()),), true) . '">

				<i></i>
			</div>
			' . $__templater->formTextBox(array(
		'class' => 'shareInput-input js-shareInput',
		'value' => $__vars['text'],
		'readonly' => 'true',
		'id' => $__vars['id'],
	)) . '
		</div>
	</div>

	';
	$__templater->inlineJs('
		jQuery.extend(XF.phrases, {
			text_copied_to_clipboard: "' . $__templater->filter('Text copied to clipboard.', array(array('escape', array('js', )),), false) . '"
		});
	');
	$__finalCompiled .= '
';
	return $__finalCompiled;
},), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

';
	return $__finalCompiled;
});