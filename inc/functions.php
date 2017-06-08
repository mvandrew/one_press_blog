<?php

if ( !function_exists('onepressblog_checkbox_sanitize') ) {
	/**
	 * Checkbox sanitization
	 *
	 * @param $input
	 *
	 * @see onepressblog_customize_register()
	 *
	 * @return int|string
	 */
	function onepressblog_checkbox_sanitize($input) {

		if ( $input == 1 ) {
			return 1;
		} else {
			return '';
		}

		// onepressblog_checkbox_sanitize
	}
}