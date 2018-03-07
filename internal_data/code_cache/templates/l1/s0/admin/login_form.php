<?php
// FROM HASH: 4657faccea77edff04fc1a9f66bc7816
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	$__templater->setPageParam('template', 'LOGIN_CONTAINER');
	$__finalCompiled .= '

' . $__templater->form('
	<div><a href="' . $__templater->escape($__vars['xf']['options']['boardUrl']) . '"><img src="' . $__templater->fn('base_url', array('styles/default/xenforo/xenforo-logo.png', ), true) . '"
		srcset="' . $__templater->fn('base_url', array('styles/default/xenforo/xenforo-logo2x.png 2x', ), true) . '" alt="XenForo Ltd." /></a></div>
	<!--<h1>' . $__templater->escape($__vars['xf']['options']['boardTitle']) . '</h1>-->
	<dl class="adminLogin-row">
		<dt>' . 'Your name or email address' . $__vars['xf']['language']['label_separator'] . '</dt>
		<dd>
		' . $__templater->formTextBox(array(
		'name' => 'login',
		'value' => $__vars['xf']['visitor']['username'],
		'placeholder' => 'User name or email' . $__vars['xf']['language']['ellipsis'],
		'aria-label' => 'User name or email',
		'autofocus' => 'autofocus',
	)) . '
		<i class="fa fa-user" aria-hidden="true"></i>
		</dd>
	</dl>
	<dl class="adminLogin-row">
		<dt>' . 'Password' . $__vars['xf']['language']['label_separator'] . '</dt>
		<dd>
		' . $__templater->formTextBox(array(
		'name' => 'password',
		'type' => 'password',
		'placeholder' => 'Password' . $__vars['xf']['language']['ellipsis'],
		'aria-label' => 'Password',
	)) . '
		<i class="fa fa-key" aria-hidden="true"></i>
		</dd>
	</dl>
	<div class="adminLogin-row adminLogin-row--submit">
		' . $__templater->button('Administrator log in', array(
		'type' => 'submit',
		'icon' => 'login',
	), '', array(
	)) . '
		<div class="adminLogin-boardTitle">' . $__templater->escape($__vars['xf']['options']['boardTitle']) . '</div>
	</div>
', array(
		'action' => $__templater->fn('link', array('login/login', ), false),
		'ajax' => 'true',
		'class' => 'adminLogin-contentForm',
	));
	return $__finalCompiled;
});