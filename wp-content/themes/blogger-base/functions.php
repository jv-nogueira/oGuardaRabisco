<?php
/**
 * Theme Functions.
 */

/* Theme Setup */
if (!function_exists('blogger_base_setup')):

function blogger_base_setup() {

	$GLOBALS['content_width'] = apply_filters('blogger_base_content_width', 640);

	add_theme_support('automatic-feed-links');
	add_theme_support('post-thumbnails');
	add_theme_support('title-tag');
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support('custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	));

	add_theme_support('custom-background', array(
		'default-color' => 'f1f1f1',
	));

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style(array('css/editor-style.css', blogger_hub_font_url()));
}
endif;
add_action('after_setup_theme', 'blogger_base_setup');

add_action( 'wp_enqueue_scripts', 'blogger_base_enqueue_styles' );
function blogger_base_enqueue_styles() {
	$parent_style = 'blogger-hub-style'; // Style handle of parent theme.
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'blogger-base-style', get_stylesheet_uri(), array( $parent_style ) );
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
	wp_enqueue_style( 'blogger-base-block-patterns-style-frontend', get_theme_file_uri('/block-patterns/css/block-frontend.css') );
}
function blogger_base_customize_register() {     
	global $wp_customize;
	$wp_customize->remove_section( 'blogger_hub_theme_color_option' );  
	$wp_customize->remove_control( 'blogger_hub_metafields_date' );
	$wp_customize->remove_setting( 'blogger_hub_metafields_date' ); 
	$wp_customize->remove_control( 'blogger_hub_metafields_author' );
	$wp_customize->remove_setting( 'blogger_hub_metafields_author' );
	$wp_customize->remove_control( 'blogger_hub_metafields_comment' );
	$wp_customize->remove_setting( 'blogger_hub_metafields_comment' );
	$wp_customize->remove_control( 'blogger_hub_metafields_time' );
	$wp_customize->remove_setting( 'blogger_hub_metafields_time' );
} 
add_action( 'customize_register', 'blogger_base_customize_register', 11 );

function blogger_base_remove_parent_function() {
	remove_action( 'admin_notices', 'blogger_hub_activation_notice' );
	remove_action( 'admin_menu', 'blogger_hub_gettingstarted' );
}
add_action( 'init', 'blogger_base_remove_parent_function');

add_action( 'after_setup_theme', 'blogger_hub_override' );
function blogger_hub_override() {
    unregister_sidebar('home-page');   
    register_sidebar(array(
        'name' => 'Home Page Sidebar',
        'description'   => __('Appears on home page', 'blogger-base'),
		'id'            => 'home-page',
		'before_widget' => '<aside id="%1$s" class="widget %2$s mb-4">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title py-3 mb-3 text-center">',
		'after_title'   => '</h3>',
    )); 
}

/* Excerpt Limit Begin */
function blogger_base_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

/**
* Enqueue block editor style
*/
function blogger_base_block_editor_styles() {
	wp_enqueue_style( 'blogger_base-font', blogger_hub_font_url(), array() );
    wp_enqueue_style( 'blogger_base-block-patterns-style-editor', get_theme_file_uri( '/block-patterns/css/block-editor.css' ), false, '1.0', 'all' );
    wp_enqueue_style( 'font-awesome-css', get_template_directory_uri().'/css/fontawesome-all.css' );
}
add_action( 'enqueue_block_editor_assets', 'blogger_base_block_editor_styles' );

/* Block Pattern */
require get_theme_file_path('/block-patterns/block-patterns.php');