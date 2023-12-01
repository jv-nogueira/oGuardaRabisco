<?php
/**
 * @package Blogger Hub
 * @subpackage blogger-hub
 * Setup the WordPress core custom header feature.
 *
 * @uses blogger_hub_header_style()
*/

function blogger_hub_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'blogger_hub_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 400,
		'wp-head-callback'       => 'blogger_hub_header_style',
	) ) );

}

add_action( 'after_setup_theme', 'blogger_hub_custom_header_setup' );

if ( ! function_exists( 'blogger_hub_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see blogger_hub_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'blogger_hub_header_style' );
function blogger_hub_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$blogger_hub_custom_css = "
        .header-image{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		}";
	   	wp_add_inline_style( 'blogger-hub-basic-style', $blogger_hub_custom_css );
	endif;
}
endif; //blogger_hub_header_style