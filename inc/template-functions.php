<?php

if ( !function_exists('onepressblog_enqueue_scripts') ) {
	function onepressblog_enqueue_scripts() {

		// Include Parent stylesheets
		//$parent_style = 'twentysixteen-style';
		//wp_enqueue_style( $parent_style, _OPB_PARENT_URI . '/style.css' );

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
		// Copyright Info
		//
		if ( get_theme_mod('onepressblog_show_copyright', 0) ) {
			$copyright_owner        = get_theme_mod( 'onepressblog_copyright_owner', get_bloginfo( 'name' ) );
			$copyright_owner        = mb_strlen($copyright_owner) > 0 ? $copyright_owner : get_bloginfo( 'name' );
			$cur_date               = new DateTime();
			$cur_year               = $cur_date->format('Y');
			$first_year             = get_theme_mod( 'onepressblog_copyright_year', $cur_year );
			$first_year             = mb_strlen($first_year) == 4 ? $first_year : $cur_year;

			if ( $cur_year == $first_year ) {
				printf( '<div class="credits_info designed_site">' .
				        __('&copy; %s &mdash; %s, All Rights Reserved.', 'onepressblog') .
				        '</div>',
					$cur_year,
					$copyright_owner);
			} else {
				printf( '<div class="credits_info designed_site">' .
				        __('&copy; %s-%s &mdash; %s, All Rights Reserved.', 'onepressblog') .
				        '</div>',
					$first_year,
					$cur_year,
					$copyright_owner);
			}

		}


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


if ( !function_exists('onepressblog_after_body') ) {
	/**
	 * Displays information after the BODY tag.
	 *
	 * @return void
	 */
	function onepressblog_after_body() {

		OnePressBlog_Counters::get_instance()->yandex_metrika_code();
		OnePressBlog_Counters::get_instance()->google_analytics_code();

		// onepressblog_after_body
	}
}


if ( !function_exists('onepressblog_head') ) {
	/**
	 * Displays additional info in the HEAD tag
	 *
	 * @return void
	 */
	function onepressblog_head() {

		OnePressBlog_Counters::get_instance()->yandex_webmaster_code();
		OnePressBlog_Counters::get_instance()->google_webmaster_code();

		// onepressblog_head
	}
}