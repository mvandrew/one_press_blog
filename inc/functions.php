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


if ( ! function_exists( 'twentysixteen_fonts_url' ) ) {
	/**
	 * Register Google fonts for Twenty Sixteen.
	 *
	 * @since Twenty Sixteen 1.0
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function twentysixteen_fonts_url() {

		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'cyrillic,cyrillic-ext,latin-ext';

		$fonts[] = 'Open Sans:300,400,400i,600,700';

		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), 'https://fonts.googleapis.com/css' );
		}

		return $fonts_url;
	}
}