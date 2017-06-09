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
		 * Yandex Metrika Setting Name
		 * @var string
		 */
		public static $YANDEX_METRIKA_NAME = 'onepressblog_counter_yandex_metrika';

		/**
		 * Yandex Webmaster Setting Name
		 * @var string
		 */
		public static $YANDEX_WEBMASTER_NAME = 'onepressblog_counter_yandex_webmaster';

		/**
		 * Google Analytics Setting Name
		 * @var string
		 */
		public static $GOOGLE_ANALYTICS_NAME = 'onepressblog_counter_google_analytics';

		/**
		 * Google Webmaster Setting Name
		 * @var string
		 */
		public static $GOOGLE_WEBMASTER_NAME = 'onepressblog_counter_google_webmaster';

		/**
		 * Yandex Metrika Counter ID
		 * @var string
		 */
		public $yandex_metrika_id;

		/**
		 * Yandex Webmaster ID
		 * @var string
		 */
		public $yandex_webmaster_id;

		/**
		 * Google Analytics ID
		 * @var string
		 */
		public $google_analytics_id;

		/**
		 * Google Webmaster ID
		 * @var string
		 */
		public $google_webmaster_id;

		/**
		 * OnePressBlog_Counters constructor.
		 */
		public function __construct() {

			$this->yandex_metrika_id = get_theme_mod( self::$YANDEX_METRIKA_NAME, '' );
			$this->yandex_webmaster_id = get_theme_mod( self::$YANDEX_WEBMASTER_NAME, '' );

			$this->google_analytics_id = get_theme_mod( self::$GOOGLE_ANALYTICS_NAME, '' );
			$this->google_webmaster_id = get_theme_mod( self::$GOOGLE_WEBMASTER_NAME, '' );

			// __construct
		}

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
			$setting_id = self::$YANDEX_METRIKA_NAME;
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

			// Yandex Webmaster ID
			$setting_id = self::$YANDEX_WEBMASTER_NAME;
			$wp_customize->add_setting( $setting_id, array(
				'default'               => '',
				'capability'            => 'edit_theme_options'
			));
			$wp_customize->add_control( $setting_id, array(
				'type'                  => 'text',
				'label'                 => __('Yandex Webmaster ID', 'onepressblog'),
				'section'               => $section_id,
				'settings'              => $setting_id
			));

			// Google Analytics ID
			$setting_id = self::$GOOGLE_ANALYTICS_NAME;
			$wp_customize->add_setting( $setting_id, array(
				'default'               => '',
				'capability'            => 'edit_theme_options'
			));
			$wp_customize->add_control( $setting_id, array(
				'type'                  => 'text',
				'label'                 => __('Google Analytics ID', 'onepressblog'),
				'section'               => $section_id,
				'settings'              => $setting_id
			));

			// Google Webmaster ID
			$setting_id = self::$GOOGLE_WEBMASTER_NAME;
			$wp_customize->add_setting( $setting_id, array(
				'default'               => '',
				'capability'            => 'edit_theme_options'
			));
			$wp_customize->add_control( $setting_id, array(
				'type'                  => 'text',
				'label'                 => __('Google Webmaster ID', 'onepressblog'),
				'section'               => $section_id,
				'settings'              => $setting_id
			));

			// customize_register
		}

		/**
		 * Displays Yandex Metrika code.
		 *
		 * @return void
		 */
		public function yandex_metrika_code() {

			$template_file = _OPB_TEMPLATE_ELEMENTS_DIR . '/counter_yandex_metrika.php';
			if ( mb_strlen($this->yandex_metrika_id) > 0 && file_exists($template_file) ) {
				include ($template_file);
			}

			// yandex_metrika_code
		}

		/**
		 * Displays Yandex Webmaster code.
		 *
		 * @return void
		 */
		public function yandex_webmaster_code() {

			if ( mb_strlen($this->yandex_webmaster_id) > 0 ) {
				printf( '<meta name="yandex-verification" content="%s" />',
					$this->yandex_webmaster_id );
			}

			// yandex_webmaster_code
		}

		/**
		 * Displays Google Analytics code.
		 *
		 * @return void
		 */
		public function google_analytics_code() {

			$template_file = _OPB_TEMPLATE_ELEMENTS_DIR . '/counter_google_analytics.php';
			if ( mb_strlen($this->google_analytics_id) > 0 && file_exists($template_file) ) {
				include ($template_file);
			}

			// google_analytics_code
		}

		/**
		 * Displays Google Webmaster code.
		 *
		 * @return void
		 */
		public function google_webmaster_code() {

			if ( mb_strlen($this->google_webmaster_id) > 0 ) {
				printf( '<meta name="google-site-verification" content="%s" />',
					$this->google_webmaster_id );
			}

			// google_webmaster_code
		}

	}

}