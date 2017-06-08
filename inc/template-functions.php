<?php

if ( !function_exists('onepressblog_enqueue_scripts') ) {
	function onepressblog_enqueue_scripts() {

		// Include Parent stylesheets
		$parent_style = 'twentysixteen-style';
		wp_enqueue_style( $parent_style, _OPB_PARENT_URI . '/style.css' );

		// Include current theme main stylesheet
		$onepressblog_style = 'onepressblog_style';
		wp_enqueue_style( $onepressblog_style, _OPB_CHILD_URI . '/stylesheets/style.css' );

		// onepressblog_enqueue_scripts
	}
}


if ( !function_exists('onepressblog_setup') ) {
	function onepressblog_setup() {

		/**
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 */
		load_theme_textdomain( 'onepressblog', _OPB_CHILD_DIR . '/languages' );

		// onepressblog_setup
	}
}


if ( !function_exists('onepressblog_credits') ) {
	/**
	 * Display information about the site developer and copyright in the page footer.
	 *
	 * @since One Press Blog 1.0
	 *
	 * @return void
	 */
	function onepressblog_credits() {

		//
		// Design Site Links
		//
		if ( get_theme_mod('onepressblog_show_design_site_link', false) ) {
			$design_site_label      = get_theme_mod( 'onepressblog_design_site_label'   , '' );
			$design_site_url        = get_theme_mod( 'onepressblog_design_site_url'     , '' );
			$design_site_alias      = get_theme_mod( 'onepressblog_design_site_alias'   , '' );

			if (    mb_strlen($design_site_label) > 0 &&
			        mb_strlen($design_site_url) > 0 &&
			        mb_strlen($design_site_alias) > 0 ) {

				printf( '<div class="credits_info designed_site">'
				        .'<a href="%s">%s</a>&nbsp;%s'
				        .'</div>',
					$design_site_url,
					$design_site_label,
					$design_site_alias);

			}

		}


		// onepressblog_credits
	}
}