<?php

if ( !function_exists('onepressblog_customize_register') ) {
	/**
	 * Added additional parameters and the counters IDs of the analytical systems.
	 *
	 * @since One Press Blog 1.0
	 *
	 * @see onepressblog_checkbox_sanitize()
	 *
	 * @param WP_Customize_Manager $wp_customize The Customizer object.
	 */
	function onepressblog_customize_register( $wp_customize ) {

		//
		// Start of the Additional Options
		//
		$wp_customize->add_panel(   'onepressblog_additional_options', array(
			'capability'            => 'edit_theme_options',
			'description'           => __( 'Change the Additional Options from here as you want', 'onepressblog' ),
			'priority'              => 515,
			'title'                 => __( 'Additional Options', 'onepressblog' )
		));


		//
		// Display Settings
		//
		$wp_customize->add_section( 'onepressblog_display_settings', array(
			'priority'              => 1,
			'title'                 => __( 'Display Settings', 'onepressblog' ),
			'panel'                 => 'onepressblog_additional_options'
		));

		// Hide post author
		$wp_customize->add_setting( 'onepressblog_hide_post_author', array(
			'default'               => 0,
			'capability'            => 'edit_theme_options',
			'sanitize_callback'     => 'onepressblog_checkbox_sanitize'
		));
		$wp_customize->add_control( 'onepressblog_hide_post_author', array(
			'type'                  => 'checkbox',
			'label'                 => __('Hide post author', 'onepressblog'),
			'section'               => 'onepressblog_display_settings',
			'settings'              => 'onepressblog_hide_post_author'
		));

		// Hide powered link
		$wp_customize->add_setting( 'onepressblog_hide_powered_link', array(
			'default'               => 0,
			'capability'            => 'edit_theme_options',
			'sanitize_callback'     => 'onepressblog_checkbox_sanitize'
		));
		$wp_customize->add_control( 'onepressblog_hide_powered_link', array(
			'type'                  => 'checkbox',
			'label'                 => __('Hide powered link', 'onepressblog'),
			'section'               => 'onepressblog_display_settings',
			'settings'              => 'onepressblog_hide_powered_link'
		));


		//
		// Design Site Link
		//
		$wp_customize->add_section( 'onepressblog_design_site_settings', array(
			'priority'              => 2,
			'title'                 => __( 'Design Site Link', 'onepressblog' ),
			'panel'                 => 'onepressblog_additional_options'
		));

		// Show design site link
		$wp_customize->add_setting( 'onepressblog_show_design_site_link', array(
			'default'               => 0,
			'capability'            => 'edit_theme_options',
			'sanitize_callback'     => 'onepressblog_checkbox_sanitize'
		));
		$wp_customize->add_control( 'onepressblog_show_design_site_link', array(
			'type'                  => 'checkbox',
			'label'                 => __('Show design site link', 'onepressblog'),
			'section'               => 'onepressblog_design_site_settings',
			'settings'              => 'onepressblog_show_design_site_link'
		));

		// Design site link text
		$wp_customize->add_setting( 'onepressblog_design_site_label', array(
			'default'               => '',
			'capability'            => 'edit_theme_options'
		));
		$wp_customize->add_control( 'onepressblog_design_site_label', array(
			'type'                  => 'text',
			'label'                 => __('Design site link text', 'onepressblog'),
			'section'               => 'onepressblog_design_site_settings',
			'settings'              => 'onepressblog_design_site_label'
		));

		// Design site link URL
		$wp_customize->add_setting( 'onepressblog_design_site_url', array(
			'default'               => '',
			'capability'            => 'edit_theme_options'
		));
		$wp_customize->add_control( 'onepressblog_design_site_url', array(
			'type'                  => 'url',
			'label'                 => __('Design site link URL', 'onepressblog'),
			'section'               => 'onepressblog_design_site_settings',
			'settings'              => 'onepressblog_design_site_url'
		));

		// Design site link alias
		$wp_customize->add_setting( 'onepressblog_design_site_alias', array(
			'default'               => '',
			'capability'            => 'edit_theme_options'
		));
		$wp_customize->add_control( 'onepressblog_design_site_alias', array(
			'type'                  => 'text',
			'label'                 => __('Design site link alias', 'onepressblog'),
			'section'               => 'onepressblog_design_site_settings',
			'settings'              => 'onepressblog_design_site_alias'
		));

	} // onepressblog_customize_register
}