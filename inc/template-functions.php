<?php

if ( !function_exists('') ) {
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