<?php

/**
 * System Template Hooks
 *
 * @see onepressblog_enqueue_scripts()
 * @see onepressblog_customize_register()
 * @see onepressblog_setup()
 */
add_action( 'wp_enqueue_scripts',                   'onepressblog_enqueue_scripts' );
add_action( 'customize_register',                   'onepressblog_customize_register' );
add_action( 'after_setup_theme',                    'onepressblog_setup' );


/**
 * Custom Template Hooks
 *
 * @see onepressblog_credits()
 */
add_action( 'onepressblog_credits',                 'onepressblog_credits' );