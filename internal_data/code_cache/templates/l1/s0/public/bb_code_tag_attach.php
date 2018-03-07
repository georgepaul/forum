<?php
// FROM HASH: c30231d93d338f377d211ed996a8ce5b
return array('macros' => array(), 'code' => function($__templater, array $__vars)
{
	$__finalCompiled = '';
	if (!$__vars['attachment']) {
		$__finalCompiled .= '
	<a href="' . $__templater->fn('link', array('full:attachments', array('attachment_id' => $__vars['id'], ), ), true) . '" target="_blank">' . 'View attachment ' . $__templater->escape($__vars['id']) . '' . '</a>
';
	} else if (!$__vars['attachment']['has_thumbnail']) {
		$__finalCompiled .= '
	<a href="' . $__templater->fn('link', array('full:attachments', $__vars['attachment'], array('hash' => $__vars['attachment']['temp_hash'], ), ), true) . '" target="_blank">' . 'View attachment ' . $__templater->escape($__vars['attachment']['filename']) . '' . '</a>
';
	} else if ($__vars['canView'] AND $__vars['full']) {
		$__finalCompiled .= '
	';
		if ($__vars['noLightbox']) {
			$__finalCompiled .= '
		<img src="' . $__templater->fn('link', array('full:attachments', $__vars['attachment'], array('hash' => $__vars['attachment']['temp_hash'], ), ), true) . '" class="bbImage" alt="' . $__templater->escape($__vars['attachment']['filename']) . '" />
	';
		} else {
			$__finalCompiled .= '
		' . $__templater->callMacro('lightbox_macros', 'single_image', array(
				'canViewAttachments' => $__vars['canView'],
				'id' => 'attachment' . $__vars['attachment']['attachment_id'],
				'src' => $__templater->fn('link', array('full:attachments', $__vars['attachment'], array('hash' => $__vars['attachment']['temp_hash'], ), ), false),
				'alt' => $__vars['attachment']['filename'],
			), $__vars) . '
	';
		}
		$__finalCompiled .= '
';
	} else if ($__vars['canView']) {
		$__finalCompiled .= '
	' . $__templater->callMacro('lightbox_macros', 'setup', array(
			'canViewAttachments' => $__vars['canView'],
		), $__vars) . '

	<a href="' . $__templater->fn('link', array('full:attachments', $__vars['attachment'], array('hash' => $__vars['attachment']['temp_hash'], ), ), true) . '" target="_blank" class="js-lbImage"><img src="' . $__templater->escape($__vars['attachment']['thumbnail_url']) . '" class="bbImage" alt="' . $__templater->escape($__vars['attachment']['filename']) . '" /></a>
';
	} else {
		$__finalCompiled .= '
	<a href="' . $__templater->fn('link', array('full:attachments', $__vars['attachment'], array('hash' => $__vars['attachment']['temp_hash'], ), ), true) . '" target="_blank"><img src="' . $__templater->escape($__vars['attachment']['thumbnail_url']) . '" class="bbImage" alt="' . $__templater->escape($__vars['attachment']['filename']) . '" /></a>
';
	}
	return $__finalCompiled;
});