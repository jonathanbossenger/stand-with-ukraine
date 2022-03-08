<?php
/**
 * Plugin Name:     Stand With Ukraine
 * Description:     Displays a banner on your site to show your support for Ukraine.
 * Version:         1.0.4
 * Text Domain:     stand-with-ukraine
 * License:         GPLv2 or later
 *
 * @package         Stand_With_Ukraine
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SWU_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

/**
 * Enqueue JavaScript assets
 */
add_action( 'wp_enqueue_scripts', 'swu_enqueue_script' );
function swu_enqueue_script( $hook ) {

	$swu_text = __( 'Stand With Ukraine', 'stand-with-ukraine' );
	$swu_hash_tag = '#' . str_replace( ' ', '', $swu_text);
	$swu_url = __( 'https://war.ukraine.ua/', 'stand-with-ukraine' );

	wp_register_script(
		'stand-with-ukraine',
		SWU_PLUGIN_URL . 'stand_with_ukraine.js',
		array(),
		'1.0.3',
		true
	);

	wp_localize_script( 'stand-with-ukraine', 'swu_options', array(
		'text' => esc_html( $swu_text ),
		'hashtag' => esc_html( $swu_hash_tag ),
		'url'  => esc_url( $swu_url )
	) );

	wp_enqueue_script( 'stand-with-ukraine' );
}


add_action( 'wp_head', 'swu_output_css' );
function swu_output_css() {
	echo apply_filters( 'swu_banner_styles', '
		<style>
			#stand_with_ukraine_overlay {
				border: 10px solid #0057B8;
				padding: 5px;
				text-align: center;
				text-combine: #0057B8;
				background-color: #FFD700;
			}
			#stand_with_ukraine_overlay a {
				display: inline-block;
				padding: 3px 6px;
				color: #0057B8;
				text-decoration: underline;
			}
			#stand_with_ukraine_overlay a:hover,
			#stand_with_ukraine_overlay a:focus {
				border: 2px #0057B8 dashed;
				text-decoration: underline;
			}
		</style>
	' );
}
