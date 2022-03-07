<?php
/**
 * Plugin Name:     Stand With Ukraine
 * Description:     Displays a banner on your site to show your support for Ukraine.
 * Version:         1.0.3
 *
 * @package         Stand_With_Ukraine
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SWU_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'SWU_TEXT_DOMAIN', 'stand-with-ukraine' );

/**
 * Enqueue JavaScript assets
 */
add_action( 'wp_enqueue_scripts', 'swu_enqueue_script' );
function swu_enqueue_script( $hook ) {
	wp_register_script(
		'stand-with-ukraine',
		SWU_PLUGIN_URL . 'stand_with_ukraine.js',
		array(),
		'1.0.3',
		true
	);

	wp_localize_script( 'stand-with-ukraine', 'swu_options', array(
		'text' => esc_html( __( '#StandWithUkraine',      SWU_TEXT_DOMAIN ) ),
		'url'  => esc_url( __( 'https://war.ukraine.ua/', SWU_TEXT_DOMAIN ) )
	) );

	wp_enqueue_script( 'stand-with-ukraine' );

	wp_register_style(
		'stand-with-ukraine',
		SWU_PLUGIN_URL . 'stand_with_ukraine.css',
		array(),
		'1.0.0',
		'all'
	);
	wp_enqueue_style( 'stand-with-ukraine' );
}
