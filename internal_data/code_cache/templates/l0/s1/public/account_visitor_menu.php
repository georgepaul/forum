<?php
// FROM HASH: 11b1acc020277bc1c029ba0dcf65861c
return array('macros' => array('visitor_panel_row' => function($__templater, array $__arguments, array $__vars)
{
	$__vars = $__templater->setupBaseParamsForMacro($__vars, false);
	$__finalCompiled = '';
	$__vars = $__templater->mergeMacroArguments(array(), $__arguments, $__vars);
	$__finalCompiled .= '
	<div class="contentRow">
		<div class="contentRow-figure">
			' . $__templater->fn('avatar', array($__vars['xf']['visitor'], 'm', false, array(
		'href' => '',
		'notooltip' => 'true',
		'update' => $__templater->fn('link', array('account/avatar', $__vars['xf']['visitor'], ), false),
	))) . '
		</div>
		<div class="contentRow-main">
			<h3 class="contentRow-header">' . $__templater->fn('username_link', array($__vars['xf']['visitor'], true, array(
		'notooltip' => 'true',
	))) . '</h3>
			<div class="contentRow-lesser">
				' . $__templater->fn('user_title', array($__vars['xf']['visitor'], false, array(
	))) . '
			</div>

			<div class="contentRow-minor">
				' . '
				<dl class="pairs pairs--justified fauxBlockLink">
					<dt>' . 'Messages' . '</dt>
					<dd>
						<a href="' . $__templater->fn('link', array('search/member', null, array('user_id' => $__vars['xf']['visitor']['user_id'], ), ), true) . '" class="fauxBlockLink-linkRow u-concealed">
							' . $__templater->filter($__vars['xf']['visitor']['message_count'], array(array('number', array()),), true) . '
						</a>
					</dd>
				</dl>
				' . '
				<dl class="pairs pairs--justified fauxBlockLink">
					<dt>' . 'Likes' . '</dt>
					<dd>
						<a href="' . $__templater->fn('link', array('account/likes', ), true) . '" class="fauxBlockLink-linkRow u-concealed">
							' . $__templater->filter($__vars['xf']['visitor']['like_count'], array(array('number', array()),), true) . '
						</a>
					</dd>
				</dl>
				' . '
				';
	if ($__vars['xf']['options']['enableTrophies']) {
		$__finalCompiled .= '
					<dl class="pairs pairs--justified fauxBlockLink">
						<dt>' . 'Trophy points' . '</dt>
						<dd>
							<a href="' . $__templater->fn('link', array('members/trophies', $__vars['xf']['visitor'], ), true) . '" data-xf-click="overlay" class="fauxBlockLink-linkRow u-concealed">
								' . $__templater->filter($__vars['xf']['visitor']['trophy_points'], array(array('number', array()),), true) . '
							</a>
						</dd>
					</dl>
				';
	}
	$__finalCompiled .= '
			</div>
		</div>
	</div>
';
	return $__finalCompiled;
},), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<div class="menu-row menu-row--highlighted">
	' . $__templater->callMacro(null, 'visitor_panel_row', array(), $__vars) . '
</div>

' . '

' . '
<hr class="menu-separator menu-separator--hard" />

<ul class="listPlain listColumns listColumns--narrow listColumns--together">
	' . '
	<li><a href="' . $__templater->fn('link', array('whats-new/news-feed', ), true) . '" class="menu-linkRow">' . 'News feed' . '</a></li>
	<li><a href="' . $__templater->fn('link', array('search/member', null, array('user_id' => $__vars['xf']['visitor']['user_id'], ), ), true) . '" class="menu-linkRow">' . 'Your content' . '</a></li>
	<li><a href="' . $__templater->fn('link', array('account/likes', ), true) . '" class="menu-linkRow">' . 'Likes received' . '</a></li>
	' . '
</ul>

' . '
<hr class="menu-separator" />

<ul class="listPlain listColumns listColumns--narrow listColumns--together">
	' . '
	<li><a href="' . $__templater->fn('link', array('account/account-details', ), true) . '" class="menu-linkRow">' . 'Account details' . '</a></li>
	<li><a href="' . $__templater->fn('link', array('account/security', ), true) . '" class="menu-linkRow">' . 'Password and security' . '</a></li>
	<li><a href="' . $__templater->fn('link', array('account/privacy', ), true) . '" class="menu-linkRow">' . 'Privacy' . '</a></li>
	<li><a href="' . $__templater->fn('link', array('account/preferences', ), true) . '" class="menu-linkRow">' . 'Preferences' . '</a></li>
	';
	if ($__templater->method($__vars['xf']['visitor'], 'canEditSignature', array())) {
		$__finalCompiled .= '
		<li><a href="' . $__templater->fn('link', array('account/signature', ), true) . '" class="menu-linkRow">' . 'Signature' . '</a></li>
	';
	}
	$__finalCompiled .= '
	';
	if ($__vars['xf']['app']['userUpgradeCount']) {
		$__finalCompiled .= '
		<li><a href="' . $__templater->fn('link', array('account/upgrades', ), true) . '" class="menu-linkRow">' . 'Account upgrades' . '</a></li>
	';
	}
	$__finalCompiled .= '
	';
	if ($__vars['xf']['app']['connectedAccountCount']) {
		$__finalCompiled .= '
		<li><a href="' . $__templater->fn('link', array('account/connected-accounts', ), true) . '" class="menu-linkRow">' . 'Connected accounts' . '</a></li>
	';
	}
	$__finalCompiled .= '
	<li><a href="' . $__templater->fn('link', array('account/following', ), true) . '" class="menu-linkRow">' . 'Following' . '</a></li>
	<li><a href="' . $__templater->fn('link', array('account/ignored', ), true) . '" class="menu-linkRow">' . 'Ignoring' . '</a></li>
	' . '
</ul>

' . '
<hr class="menu-separator" />

<a href="' . $__templater->fn('link', array('logout', null, array('t' => $__templater->fn('csrf_token', array(), false), ), ), true) . '" class="menu-linkRow">' . 'Log out' . '</a>

';
	if ($__templater->method($__vars['xf']['visitor'], 'canPostOnProfile', array())) {
		$__finalCompiled .= '
	' . $__templater->form('

		' . $__templater->formTextArea(array(
			'name' => 'message',
			'rows' => '1',
			'autosize' => 'true',
			'maxlength' => $__vars['xf']['options']['profilePostMaxLength'],
			'placeholder' => 'Update your status' . $__vars['xf']['language']['ellipsis'],
			'data-xf-init' => 'focus-trigger user-mentioner',
			'data-display' => '< :next',
		)) . '
		<div class="u-hidden u-hidden--transition u-inputSpacer">
			' . $__templater->button('Post', array(
			'type' => 'submit',
			'class' => 'button--primary',
		), '', array(
		)) . '
		</div>
	', array(
			'action' => $__templater->fn('link', array('members/post', $__vars['xf']['visitor'], ), false),
			'ajax' => 'true',
			'data-redirect' => 'off',
			'data-reset-complete' => 'true',
			'data-no-auto-focus' => 'true',
			'class' => 'menu-footer',
		)) . '
';
	}
	return $__finalCompiled;
});