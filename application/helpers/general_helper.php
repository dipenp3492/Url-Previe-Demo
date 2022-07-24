<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Translates the string to the current selected language.
 *
 * @param  str  $line   The key for the string
 * @param  str  $label  (optional)The sub string if there is any
 *
 * @return str  The translated string
 */
function _l($line, $label = ''){
	$CI = &get_instance();
	$output = $CI->lang->line($line);

	if ($label != '')
	{
		$output = str_replace('%s', $label, $output);
	}

	return $output;
}?>