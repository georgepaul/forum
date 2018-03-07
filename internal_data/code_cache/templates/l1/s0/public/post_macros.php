<?php
// FROM HASH: 665c56947a70de7586ece568f9293987
return array('macros' => array('post' => function($__templater, array $__arguments, array $__vars)
{
	$__vars = $__templater->setupBaseParamsForMacro($__vars, false);
	$__finalCompiled = '';
	$__vars = $__templater->mergeMacroArguments(array(
		'post' => '!',
		'thread' => '!',
	), $__arguments, $__vars);
	$__finalCompiled .= '
	';
	$__templater->includeCss('message.less');
	$__finalCompiled .= '
	';
	$__vars['isIgnored'] = $__templater->method($__vars['post'], 'isIgnored', array());
	$__finalCompiled .= '
	<article class="message message--post js-post js-inlineModContainer ' . ($__vars['isIgnored'] ? 'is-ignored' : '') . ' ' . ($__templater->method($__vars['post'], 'isUnread', array()) ? ' is-unread' : '') . '"
		data-author="' . ($__templater->escape($__vars['post']['User']['username']) ?: $__templater->escape($__vars['post']['username'])) . '"
		data-content="post-' . $__templater->escape($__vars['post']['post_id']) . '"
		id="js-post-' . $__templater->escape($__vars['post']['post_id']) . '">

		<span class="u-anchorTarget" id="post-' . $__templater->escape($__vars['post']['post_id']) . '"></span>

		<div class="message-inner">
			<div class="message-cell message-cell--user">
				';
	$__vars['dateHtml'] = $__templater->preEscaped('<a href="' . $__templater->fn('link', array('threads/post', $__vars['thread'], array('post_id' => $__vars['post']['post_id'], ), ), true) . '" class="u-concealed" rel="nofollow">' . $__templater->fn('date_dynamic', array($__vars['post']['post_date'], array(
	))) . '</a>');
	$__finalCompiled .= '
				';
	$__vars['linkHtml'] = $__templater->preEscaped('<a href="' . $__templater->fn('link', array('threads/post', $__vars['thread'], array('post_id' => $__vars['post']['post_id'], ), ), true) . '" class="u-concealed" rel="nofollow">#' . $__templater->fn('number', array($__vars['post']['position'] + 1, ), true) . '</a>');
	$__finalCompiled .= '
				' . $__templater->callMacro('message_macros', 'user_info', array(
		'user' => $__vars['post']['User'],
		'fallbackName' => $__vars['post']['username'],
		'dateHtml' => $__vars['dateHtml'],
		'linkHtml' => $__vars['linkHtml'],
	), $__vars) . '
			</div>
			<div class="message-cell message-cell--main">
				<div class="message-main js-quickEditTarget">

					<header class="message-attribution">
						<a href="' . $__templater->fn('link', array('threads/post', $__vars['thread'], array('post_id' => $__vars['post']['post_id'], ), ), true) . '" class="message-attribution-main u-concealed" rel="nofollow">' . $__templater->fn('date_dynamic', array($__vars['post']['post_date'], array(
	))) . '</a>
						<div class="message-attribution-opposite">
							';
	if ($__templater->method($__vars['post'], 'isUnread', array())) {
		$__finalCompiled .= '
								<span class="message-newIndicator">' . 'New' . '</span>
							';
	}
	$__finalCompiled .= '
							<a href="' . $__templater->fn('link', array('threads/post', $__vars['thread'], array('post_id' => $__vars['post']['post_id'], ), ), true) . '" class="u-concealed" rel="nofollow">#' . $__templater->fn('number', array($__vars['post']['position'] + 1, ), true) . '</a>
						</div>
					</header>

					<div class="message-content js-messageContent">

						';
	if ($__vars['post']['message_state'] == 'deleted') {
		$__finalCompiled .= '
							<div class="messageNotice messageNotice--deleted">
								' . $__templater->callMacro('deletion_macros', 'notice', array(
			'log' => $__vars['post']['DeletionLog'],
		), $__vars) . '
							</div>
						';
	} else if ($__vars['post']['message_state'] == 'moderated') {
		$__finalCompiled .= '
							<div class="messageNotice messageNotice--moderated">
								' . 'This message is awaiting moderator approval, and is invisible to normal visitors.' . '
							</div>
						';
	}
	$__finalCompiled .= '
						';
	if ($__vars['post']['warning_message']) {
		$__finalCompiled .= '
							<div class="messageNotice messageNotice--warning">
								' . $__templater->escape($__vars['post']['warning_message']) . '
							</div>
						';
	}
	$__finalCompiled .= '
						';
	if ($__vars['isIgnored']) {
		$__finalCompiled .= '
							<div class="messageNotice messageNotice--ignored">
								' . 'You are ignoring content by this member.' . '
								' . $__templater->fn('show_ignored', array(array(
		))) . '
							</div>
						';
	}
	$__finalCompiled .= '

						<div class="message-userContent lbContainer js-lbContainer ' . ($__vars['isIgnored'] ? 'is-ignored' : '') . '"
							data-lb-id="post-' . $__templater->escape($__vars['post']['post_id']) . '"
							data-lb-caption-desc="' . ($__vars['post']['User'] ? $__templater->escape($__vars['post']['User']['username']) : $__templater->escape($__vars['post']['username'])) . ' &middot; ' . $__templater->fn('date_time', array($__vars['post']['post_date'], ), true) . '">

							';
	if ($__templater->method($__vars['post'], 'isFirstPost', array())) {
		$__finalCompiled .= '
								' . $__templater->callMacro('custom_fields_macros', 'custom_fields_view', array(
			'type' => 'threads',
			'group' => 'before',
			'onlyInclude' => $__vars['thread']['Forum']['field_cache'],
			'set' => $__vars['thread']['custom_fields'],
			'wrapperClass' => 'message-fields message-fields--before',
		), $__vars) . '
							';
	}
	$__finalCompiled .= '

							<article class="message-body js-selectToQuote">
								' . $__templater->callAdsMacro('post_above_content', array(
		'post' => $__vars['post'],
	), $__vars) . '
								' . $__templater->fn('bb_code', array($__vars['post']['message'], 'post', $__vars['post'], ), true) . '
								<div class="js-selectToQuoteEnd">&nbsp;</div>
								' . $__templater->callAdsMacro('post_below_content', array(
		'post' => $__vars['post'],
	), $__vars) . '
							</article>

							';
	if ($__templater->method($__vars['post'], 'isFirstPost', array())) {
		$__finalCompiled .= '
								' . $__templater->callMacro('custom_fields_macros', 'custom_fields_view', array(
			'type' => 'threads',
			'group' => 'after',
			'onlyInclude' => $__vars['thread']['Forum']['field_cache'],
			'set' => $__vars['thread']['custom_fields'],
			'wrapperClass' => 'message-fields message-fields--after',
		), $__vars) . '
							';
	}
	$__finalCompiled .= '

							';
	if ($__vars['post']['attach_count']) {
		$__finalCompiled .= '
								' . $__templater->callMacro('message_macros', 'attachments', array(
			'attachments' => $__vars['post']['Attachments'],
			'message' => $__vars['post'],
			'canView' => $__templater->method($__vars['thread'], 'canViewAttachments', array()),
		), $__vars) . '
							';
	}
	$__finalCompiled .= '
						</div>

						';
	if ($__vars['post']['last_edit_date']) {
		$__finalCompiled .= '
							<div class="message-lastEdit">
								';
		if ($__vars['post']['user_id'] == $__vars['post']['last_edit_user_id']) {
			$__finalCompiled .= '
									' . 'Last edited' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->fn('date_dynamic', array($__vars['post']['last_edit_date'], array(
			))) . '
								';
		} else {
			$__finalCompiled .= '
									' . 'Last edited by a moderator' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->fn('date_dynamic', array($__vars['post']['last_edit_date'], array(
			))) . '
								';
		}
		$__finalCompiled .= '
							</div>
						';
	}
	$__finalCompiled .= '

						' . $__templater->callMacro('message_macros', 'signature', array(
		'user' => $__vars['post']['User'],
	), $__vars) . '
					</div>

					<footer class="message-footer">
						';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
									';
	$__compilerTemp2 = '';
	$__compilerTemp2 .= '
											';
	if ($__templater->method($__vars['post'], 'canLike', array())) {
		$__compilerTemp2 .= '
												<a href="' . $__templater->fn('link', array('posts/like', $__vars['post'], ), true) . '" class="actionBar-action actionBar-action--like" data-xf-click="like" data-like-list="< .js-post | .js-likeList">';
		if ($__templater->method($__vars['post'], 'isLiked', array())) {
			$__compilerTemp2 .= 'Unlike';
		} else {
			$__compilerTemp2 .= 'Like';
		}
		$__compilerTemp2 .= '</a>
											';
	}
	$__compilerTemp2 .= '
											';
	if ($__templater->method($__vars['thread'], 'canReply', array())) {
		$__compilerTemp2 .= '
												';
		$__vars['quoteLink'] = $__templater->preEscaped($__templater->fn('link', array('threads/reply', $__vars['thread'], array('quote' => $__vars['post']['post_id'], ), ), true));
		$__compilerTemp2 .= '

												';
		if ($__vars['xf']['options']['multiQuote']) {
			$__compilerTemp2 .= '
													<a href="' . $__templater->escape($__vars['quoteLink']) . '"
														class="actionBar-action actionBar-action--mq u-jsOnly js-multiQuote"
														title="' . $__templater->filter('Toggle multi-quote', array(array('for_attr', array()),), true) . '"
														data-message-id="' . $__templater->escape($__vars['post']['post_id']) . '"
														data-mq-action="add">' . 'Quote' . '</a>
												';
		}
		$__compilerTemp2 .= '

												<a href="' . $__templater->escape($__vars['quoteLink']) . '"
													class="actionBar-action actionBar-action--reply"
													title="' . $__templater->filter('Reply, quoting this message', array(array('for_attr', array()),), true) . '"
													data-xf-click="quote"
													data-quote-href="' . $__templater->fn('link', array('posts/quote', $__vars['post'], ), true) . '">' . 'Reply' . '</a>
											';
	}
	$__compilerTemp2 .= '
										';
	if (strlen(trim($__compilerTemp2)) > 0) {
		$__compilerTemp1 .= '
										<div class="actionBar-set actionBar-set--external">
										' . $__compilerTemp2 . '
										</div>
									';
	}
	$__compilerTemp1 .= '

									';
	$__compilerTemp3 = '';
	$__compilerTemp3 .= '
											';
	if ($__templater->method($__vars['post'], 'canUseInlineModeration', array())) {
		$__compilerTemp3 .= '
												<span class="actionBar-action actionBar-action--inlineMod">
													' . $__templater->formCheckBox(array(
			'standalone' => 'true',
		), array(array(
			'value' => $__vars['post']['post_id'],
			'class' => 'js-inlineModToggle',
			'data-xf-init' => 'tooltip',
			'title' => $__templater->filter('Select for moderation', array(array('for_attr', array()),), false),
			'_type' => 'option',
		))) . '
												</span>
											';
	}
	$__compilerTemp3 .= '

											';
	if ($__templater->method($__vars['post'], 'canReport', array())) {
		$__compilerTemp3 .= '
												<a href="' . $__templater->fn('link', array('posts/report', $__vars['post'], ), true) . '"
													class="actionBar-action actionBar-action--report"
													data-xf-click="overlay">' . 'Report' . '</a>
											';
	}
	$__compilerTemp3 .= '

											';
	$__vars['hasActionBarMenu'] = false;
	$__compilerTemp3 .= '
											';
	if ($__templater->method($__vars['post'], 'canEdit', array())) {
		$__compilerTemp3 .= '
												';
		$__templater->includeJs(array(
			'src' => 'xf/message.js',
			'min' => '1',
		));
		$__compilerTemp3 .= '
												<a href="' . $__templater->fn('link', array('posts/edit', $__vars['post'], ), true) . '"
													class="actionBar-action actionBar-action--edit actionBar-action--menuItem"
													data-xf-click="quick-edit"
													data-editor-target="#js-post-' . $__templater->escape($__vars['post']['post_id']) . ' .js-quickEditTarget"
													data-menu-closer="true">' . 'Edit' . '</a>

												';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp3 .= '
											';
	}
	$__compilerTemp3 .= '
											';
	if ($__vars['post']['edit_count'] AND $__templater->method($__vars['post'], 'canViewHistory', array())) {
		$__compilerTemp3 .= '
												<a href="' . $__templater->fn('link', array('posts/history', $__vars['post'], ), true) . '"
													class="actionBar-action actionBar-action--history actionBar-action--menuItem"
													data-xf-click="toggle"
													data-target="#js-post-' . $__templater->escape($__vars['post']['post_id']) . ' .js-historyTarget"
													data-menu-closer="true">' . 'History' . '</a>

												';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp3 .= '
											';
	}
	$__compilerTemp3 .= '
											';
	if ($__templater->method($__vars['post'], 'canDelete', array('soft', ))) {
		$__compilerTemp3 .= '
												<a href="' . $__templater->fn('link', array('posts/delete', $__vars['post'], ), true) . '"
													class="actionBar-action actionBar-action--delete actionBar-action--menuItem"
													data-xf-click="overlay">' . 'Delete' . '</a>

												';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp3 .= '
											';
	}
	$__compilerTemp3 .= '
											';
	if ($__templater->method($__vars['post'], 'canCleanSpam', array())) {
		$__compilerTemp3 .= '
												<a href="' . $__templater->fn('link', array('spam-cleaner', $__vars['post'], ), true) . '"
													class="actionBar-action actionBar-action--spam actionBar-action--menuItem"
													data-xf-click="overlay">' . 'Spam' . '</a>

												';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp3 .= '
											';
	}
	$__compilerTemp3 .= '
											';
	if ($__templater->method($__vars['xf']['visitor'], 'canViewIps', array()) AND $__vars['post']['ip_id']) {
		$__compilerTemp3 .= '
												<a href="' . $__templater->fn('link', array('posts/ip', $__vars['post'], ), true) . '"
													class="actionBar-action actionBar-action--ip actionBar-action--menuItem"
													data-xf-click="overlay">' . 'IP' . '</a>

												';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp3 .= '
											';
	}
	$__compilerTemp3 .= '
											';
	if ($__templater->method($__vars['post'], 'canWarn', array())) {
		$__compilerTemp3 .= '

												<a href="' . $__templater->fn('link', array('posts/warn', $__vars['post'], ), true) . '"
													class="actionBar-action actionBar-action--warn actionBar-action--menuItem">' . 'Warn' . '</a>

												';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp3 .= '
											';
	} else if ($__vars['post']['warning_id'] AND $__templater->method($__vars['xf']['visitor'], 'canViewWarnings', array())) {
		$__compilerTemp3 .= '
												<a href="' . $__templater->fn('link', array('warnings', array('warning_id' => $__vars['post']['warning_id'], ), ), true) . '"
													class="actionBar-action actionBar-action--warn actionBar-action--menuItem"
													data-xf-click="overlay">' . 'View warning' . '</a>
												';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp3 .= '
											';
	}
	$__compilerTemp3 .= '

											';
	if ($__vars['hasActionBarMenu']) {
		$__compilerTemp3 .= '
												<a class="actionBar-action actionBar-action--menuTrigger"
													data-xf-click="menu"
													title="' . $__templater->filter('More options', array(array('for_attr', array()),), true) . '"
													role="button"
													tabindex="0"
													aria-expanded="false"
													aria-haspopup="true">&#8226;&#8226;&#8226;</a>

												<div class="menu" data-menu="menu" aria-hidden="true" data-menu-builder="actionBar">
													<div class="menu-content">
														<h4 class="menu-header">' . 'More options' . '</h4>
														<div class="js-menuBuilderTarget"></div>
													</div>
												</div>
											';
	}
	$__compilerTemp3 .= '
										';
	if (strlen(trim($__compilerTemp3)) > 0) {
		$__compilerTemp1 .= '
										<div class="actionBar-set actionBar-set--internal">
										' . $__compilerTemp3 . '
										</div>
									';
	}
	$__compilerTemp1 .= '

								';
	if (strlen(trim($__compilerTemp1)) > 0) {
		$__finalCompiled .= '
							<div class="message-actionBar actionBar">
								' . $__compilerTemp1 . '
							</div>
						';
	}
	$__finalCompiled .= '

						<div class="likesBar js-likeList ' . ($__vars['post']['likes'] ? 'is-active' : '') . '">
							' . $__templater->fn('likes_content', array($__vars['post'], $__templater->fn('link', array('posts/likes', $__vars['post'], ), false), array(
		'url' => $__templater->fn('link', array('posts/likes', $__vars['post'], ), false),
	))) . '
						</div>

						<div class="js-historyTarget message-historyTarget toggleTarget" data-href="trigger-href"></div>
					</footer>
				</div>
			</div>
		</div>
	</article>
';
	return $__finalCompiled;
},
'post_deleted' => function($__templater, array $__arguments, array $__vars)
{
	$__vars = $__templater->setupBaseParamsForMacro($__vars, false);
	$__finalCompiled = '';
	$__vars = $__templater->mergeMacroArguments(array(
		'post' => '!',
		'thread' => '!',
	), $__arguments, $__vars);
	$__finalCompiled .= '
	';
	$__templater->includeCss('message.less');
	$__finalCompiled .= '
	<div class="message message--deleted message--post' . ($__templater->method($__vars['post'], 'isIgnored', array()) ? ' is-ignored' : '') . ($__templater->method($__vars['post'], 'isUnread', array()) ? ' is-unread' : '') . ' js-post js-inlineModContainer"
		data-author="' . ($__templater->escape($__vars['post']['User']['username']) ?: $__templater->escape($__vars['post']['username'])) . '"
		data-content="post-' . $__templater->escape($__vars['post']['post_id']) . '">

		<span class="u-anchorTarget" id="post-' . $__templater->escape($__vars['post']['post_id']) . '"></span>
		<div class="message-inner">
			<div class="message-cell message-cell--user">
				' . $__templater->callMacro('message_macros', 'user_info', array(
		'user' => $__vars['post']['User'],
		'fallbackName' => $__vars['post']['username'],
	), $__vars) . '
			</div>
			<div class="message-cell message-cell--main">
				<div class="message-attribution">
					<ul class="listInline listInline--bullet message-attribution-main">
						<li><a href="' . $__templater->fn('link', array('threads/post', $__vars['thread'], array('post_id' => $__vars['post']['post_id'], ), ), true) . '" class="u-concealed" rel="nofollow">' . $__templater->fn('date_dynamic', array($__vars['post']['post_date'], array(
	))) . '</a></li>
						<li>' . $__templater->fn('username_link', array($__vars['post']['User'], false, array(
		'defaultname' => $__vars['post']['username'],
		'class' => 'u-concealed',
	))) . '</li>
					</ul>
				</div>

				<div class="messageNotice messageNotice--deleted">
					' . $__templater->callMacro('deletion_macros', 'notice', array(
		'log' => $__vars['post']['DeletionLog'],
	), $__vars) . '

					<a href="' . $__templater->fn('link', array('posts/show', $__vars['post'], ), true) . '" class="u-jsOnly" data-xf-click="inserter" data-replace="[data-content=post-' . $__templater->escape($__vars['post']['post_id']) . ']">' . 'Show' . $__vars['xf']['language']['ellipsis'] . '</a>
				</div>
			</div>
		</div>
	</div>
';
	return $__finalCompiled;
},), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

';
	return $__finalCompiled;
});