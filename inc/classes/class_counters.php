<?php

if ( !class_exists('OnePressBlog_Counters') ) {
	/**
	 * Managing Counters Properties for the theme.
	 *
	 * Class OnePressBlog_Counters
	 */
	class OnePressBlog_Counters {

		/**
		 * Current Class Instance.
		 *
		 * @var OnePressBlog_Counters
		 */
		private static $INSTANCE = null;

		/**
		 * Create new Counters class and return it.
		 *
		 * @return OnePressBlog_Counters
		 */
		public static function get_instance() {

			if ( self::$INSTANCE == null ) {
				self::$INSTANCE = new OnePressBlog_Counters();
			}

			return self::$INSTANCE;

			// get_instance
		}

		/**
		 * Added counters settings.
		 *
		 * @since One Press Blog 1.0
		 *
		 * @param WP_Customize_Manager $wp_customize The Customizer object.
		 */
		public static function customize_register( $wp_customize ) {

			$section_id = 'onepressblog_counters_settings';
			$wp_customize->add_section( $section_id, array(
				'priority'              => 4,
				'title'                 => __( 'Counters IDs', 'onepressblog' ),
				'panel'                 => 'onepressblog_additional_options'
			));

			// Yandex Metrika ID
			$setting_id = 'onepressblog_counter_yandex_metrika';
			$wp_customize->add_setting( $setting_id, array(
				'default'               => '',
				'capability'            => 'edit_theme_options'
			));
			$wp_customize->add_control( $setting_id, array(
				'type'                  => 'text',
				'label'                 => __('Yandex Metrika ID', 'onepressblog'),
				'section'               => $section_id,
				'settings'              => $setting_id
			));

			// customize_register
		}

	}

}