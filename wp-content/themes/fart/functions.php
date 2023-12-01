<?php
/**
 * fArt functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @subpackage fArt
 * @author tishonator
 * @since fArt 1.0.0
 *
 */

/**
 * Set a constant that holds the theme's minimum supported PHP version.
 */
define( 'FART_MIN_PHP_VERSION', '5.6' );

/**
 * Immediately after theme switch is fired we we want to check php version and
 * revert to previously active theme if version is below our minimum.
 */
add_action( 'after_switch_theme', 'fart_test_for_min_php' );

/**
 * Switches back to the previous theme if the minimum PHP version is not met.
 */
function fart_test_for_min_php() {

	// Compare versions.
	if ( version_compare( PHP_VERSION, FART_MIN_PHP_VERSION, '<' ) ) {
		// Site doesn't meet themes min php requirements, add notice...
		add_action( 'admin_notices', 'fart_min_php_not_met_notice' );
		// ... and switch back to previous theme.
		switch_theme( get_option( 'theme_switched' ) );
		return false;

	};
}

if ( ! function_exists( 'wp_body_open' ) ) {
        function wp_body_open() {
                do_action( 'wp_body_open' );
        }
}

/**
 * An error notice that can be displayed if the Minimum PHP version is not met.
 */
function fart_min_php_not_met_notice() {
	?>
	<div class="notice notice-error is_dismissable">
		<p>
			<?php esc_html_e( 'You need to update your PHP version to run this theme.', 'fart' ); ?> <br />
			<?php
			printf(
				/* translators: 1 is the current PHP version string, 2 is the minmum supported php version string of the theme */
				esc_html__( 'Actual version is: %1$s, required version is: %2$s.', 'fart' ),
				PHP_VERSION,
				FART_MIN_PHP_VERSION
			); // phpcs: XSS ok.
			?>
		</p>
	</div>
	<?php
}


require_once( trailingslashit( get_template_directory() ) . 'customize-pro/class-customize.php' );

if ( ! function_exists( 'fart_setup' ) ) :
/**
 * fArt setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 */
function fart_setup() {

	load_theme_textdomain( 'fart', get_template_directory() . '/languages' );

	add_theme_support( "title-tag" );

	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

	add_theme_support( 'editor-styles' );

	// add the visual editor to resemble the theme style
	add_editor_style( 'css/editor-style.css' );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Primary Menu', 'fart' ),
		'footer'   => __( 'Footer Menu', 'fart' ),
	) );

	// Add wp_enqueue_scripts actions
	add_action( 'wp_enqueue_scripts', 'fart_load_scripts' );

	add_action( 'widgets_init', 'fart_widgets_init' );

	// add Custom background				 
	add_theme_support( 'custom-background', 
				   array ('default-color'  => '#FFFFFF')
				 );

	add_theme_support( 'post-thumbnails' );

	global $content_width;
	if ( ! isset( $content_width ) )
		$content_width = 900;

	add_theme_support( 'automatic-feed-links' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form', 'comment-list',
	) );

	// add custom header
	add_theme_support( 'custom-header', array (
                       'default-image'          => '',
                       'random-default'         => '',
                       'flex-height'            => true,
                       'flex-width'             => true,
                       'uploads'                => true,
                       'width'                  => 900,
                       'height'                 => 100,
                       'default-text-color'        => '#000000',
                       'wp-head-callback'       => 'fart_header_style',
                    ) );

    // add custom logo
    add_theme_support( 'custom-logo', array (
                       'width'                  => 75,
                       'height'                 => 75,
                       'flex-height'            => true,
                       'flex-width'             => true,
                    ) );

	// add custom header
		add_theme_support( 'custom-header', array (
		                   'default-image'          => '',
		                   'random-default'         => '',
		                   'flex-height'            => true,
		                   'flex-width'             => true,
		                   'uploads'                => true,
		                   'width'                  => 900,
		                   'height'                 => 100,
		                   'default-text-color'        => '#000000',
		                   'wp-head-callback'       => 'fart_header_style',
		                ) );

		// add custom logo
		add_theme_support( 'custom-logo', array (
		                   'width'                  => 145,
		                   'height'                 => 36,
		                   'flex-height'            => true,
		                   'flex-width'             => true,
		                ) );

		// Define and register starter content to showcase the theme on new sites.
		$starter_content = array(

			'widgets' => array(
			'sidebar-widget-area' => array(
				'search',
				'recent-posts',
				'categories',
				'archives',
			),

			'footer-column-1-widget-area' => array(
				'recent-comments'
			),

			'footer-column-2-widget-area' => array(
				'recent-posts'
			),

			'footer-column-3-widget-area' => array(
				'calendar'
			),
		),

		'posts' => array(
			'home',
			'blog',
			'about',
			'contact'
		),

		// Default to a static front page and assign the front and posts pages.
		'options' => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),

		// Set the front page section theme mods to the IDs of the core-registered pages.
		'theme_mods' => array(
			'fart_slider_display' => 1,
			'fart_slide1_image' => esc_url( get_template_directory_uri() . '/images/slider/1.jpg' ),
			'fart_slide1_content' => _x( '<h2>Slide 1 Title</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p><a href="#" title="Read more">Read more</a>', 'Theme starter content', 'fart' ),
			'fart_slide2_image' => esc_url( get_template_directory_uri() . '/images/slider/2.jpg' ),
			'fart_slide2_content' => _x( '<h2>Slide 2 Title</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p><a href="#" title="Read more">Read more</a>', 'Theme starter content', 'fart' ),
			'fart_slide3_image' => esc_url( get_template_directory_uri() . '/images/slider/3.jpg' ),
			'fart_slide3_content' => _x( '<h2>Slide 3 Title</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p><a href="#" title="Read more">Read more</a>', 'Theme starter content', 'fart' ),
			'fart_social_facebook' => _x( '#', 'Theme starter content', 'fart' ),
			'fart_social_twitter' => _x( '#', 'Theme starter content', 'fart' ),
			'fart_social_linkedin' => _x( '#', 'Theme starter content', 'fart' ),
			'fart_social_instagram' => _x( '#', 'Theme starter content', 'fart' ),
			'fart_social_rss' => _x( '#', 'Theme starter content', 'fart' ),
			'fart_social_tumblr' => _x( '#', 'Theme starter content', 'fart' ),
			'fart_social_youtube' => _x( '#', 'Theme starter content', 'fart' ),
			'fart_social_pinterest' => _x( '#', 'Theme starter content', 'fart' ),
			'fart_social_vk' => _x( '#', 'Theme starter content', 'fart' ),
			'fart_social_flickr' => _x( '#', 'Theme starter content', 'fart' ),
			'fart_social_vine' => _x( '#', 'Theme starter content', 'fart' ),
			'fart_header_phone' => _x( 'info@example.com', 'Theme starter content', 'fart' ),
			'fart_header_email' => _x( '1.555.555.555', 'Theme starter content', 'fart' ),
		),

		'nav_menus' => array(

			// Assign a menu to the "primary" location.
			'primary' => array(
				'name' => __( 'Primary Menu', 'fart' ),
				'items' => array(
					'link_home',
					'page_blog',
					'page_contact',
					'page_about',
				),
			),

			// Assign a menu to the "footer" location.
			'footer' => array(
				'name' => __( 'Footer Menu', 'fart' ),
				'items' => array(
					'link_home',
					'page_about',
					'page_blog',
					'page_contact',
				),
			),
		),
	);

	$starter_content = apply_filters( 'fart_starter_content', $starter_content );
	add_theme_support( 'starter-content', $starter_content );
}
endif; // fart_setup
add_action( 'after_setup_theme', 'fart_setup' );

/**
 * the main function to load scripts in the fArt theme
 * if you add a new load of script, style, etc. you can use that function
 * instead of adding a new wp_enqueue_scripts action for it.
 */
function fart_load_scripts() {

	// load main stylesheet.
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array( ) );
	wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/css/animate.css', array( ) );
	wp_enqueue_style( 'fart-style', get_stylesheet_uri(), array( ) );
	
	
	// Load thread comments reply script
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    wp_enqueue_script( 'viewportchecker', get_template_directory_uri() . '/js/viewportchecker.js',
			array( 'jquery' ) );
	
	// Load Utilities JS Script
	wp_enqueue_script( 'fart-js', get_template_directory_uri() . '/js/fart.js',
			array( 'jquery', 'viewportchecker' ) );

	$data = array(
		'loading_effect' => ( get_theme_mod('fart_animations_display', 1) == 1 ),
	);
	wp_localize_script('fart-js', 'fart_options', $data);
	
	
	wp_enqueue_script( 'jquery.easing', get_template_directory_uri() . '/js/jquery.easing.js', array( 'jquery' ) );
	wp_enqueue_script( 'camera', get_template_directory_uri() . '/js/camera.js', array( 'jquery' ) );
}


function fart_display_social_sites() {

	echo '<ul class="header-social-widget">';

	$socialURL = get_theme_mod('fart_social_facebook');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Facebook', 'fart') . '" class="facebook16"></a></li>';
	}

	$socialURL = get_theme_mod('fart_social_twitter');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Twitter', 'fart') . '" class="twitter16"></a></li>';
	}

	$socialURL = get_theme_mod('fart_social_linkedin');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on LinkeIn', 'fart') . '" class="linkedin16"></a></li>';
	}

	$socialURL = get_theme_mod('fart_social_instagram');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Instagram', 'fart') . '" class="instagram16"></a></li>';
	}

	$socialURL = get_theme_mod('fart_social_rss');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow our RSS Feeds', 'fart') . '" class="rss16"></a></li>';
	}

	$socialURL = get_theme_mod('fart_social_tumblr');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Tumblr', 'fart') . '" class="tumblr16"></a></li>';
	}

	$socialURL = get_theme_mod('fart_social_youtube');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Youtube', 'fart') . '" class="youtube16"></a></li>';
	}

	$socialURL = get_theme_mod('fart_social_pinterest');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Pinterest', 'fart') . '" class="pinterest16"></a></li>';
	}

	$socialURL = get_theme_mod('fart_social_vk');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on VK', 'fart') . '" class="vk16"></a></li>';
	}

	$socialURL = get_theme_mod('fart_social_flickr');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Flickr', 'fart') . '" class="flickr16"></a></li>';
	}

	$socialURL = get_theme_mod('fart_social_vine');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Vine', 'fart') . '" class="vine16"></a></li>';
	}

	echo '</ul>';
}

/**
 * Display website's logo image
 */
function fart_show_website_logo_image_and_title() {

	if ( has_custom_logo() ) {

        the_custom_logo();
    }

    $header_text_color = get_header_textcolor();

    if ( 'blank' !== $header_text_color ) {
    
        echo '<div id="site-identity">';
        echo '<a href="' . esc_url( home_url('/') ) . '" title="' . esc_attr( get_bloginfo('name') ) . '">';
        echo '<h1 class="entry-title">' . esc_html( get_bloginfo('name') ) . '</h1>';
        echo '</a>';
        echo '<strong>' . esc_html( get_bloginfo('description') ) . '</strong>';
        echo '</div>';
    }
}

/**
 *	Displays the copyright text.
 */
function fart_show_copyright_text() {

	$footerText = get_theme_mod('fart_footer_copyright', null);

	if ( !empty( $footerText ) ) {

		echo esc_html( $footerText ) . ' | ';		
	}
}

/**
 *	widgets-init action handler. Used to register widgets and register widget areas
 */
function fart_widgets_init() {
	
	// Register Sidebar Widget.
	register_sidebar( array (
						'name'	 		 =>	 __( 'Sidebar Widget Area', 'fart'),
						'id'		 	 =>	 'sidebar-widget-area',
						'description'	 =>  __( 'The sidebar widget area', 'fart'),
						'before_widget'	 =>  '',
						'after_widget'	 =>  '',
						'before_title'	 =>  '<div class="sidebar-before-title"></div><h3 class="sidebar-title">',
						'after_title'	 =>  '</h3><div class="sidebar-after-title"></div>',
					) );
	
	// Register Footer Column #1
	register_sidebar( array (
							'name'			 =>  __( 'Footer Column #1', 'fart' ),
							'id' 			 =>  'footer-column-1-widget-area',
							'description'	 =>  __( 'The Footer Column #1 widget area', 'fart' ),
							'before_widget'  =>  '',
							'after_widget'	 =>  '',
							'before_title'	 =>  '<h2 class="footer-title">',
							'after_title'	 =>  '</h2><div class="footer-after-title"></div>',
						) );
	
	// Register Footer Column #2
	register_sidebar( array (
							'name'			 =>  __( 'Footer Column #2', 'fart' ),
							'id' 			 =>  'footer-column-2-widget-area',
							'description'	 =>  __( 'The Footer Column #2 widget area', 'fart' ),
							'before_widget'  =>  '',
							'after_widget'	 =>  '',
							'before_title'	 =>  '<h2 class="footer-title">',
							'after_title'	 =>  '</h2><div class="footer-after-title"></div>',
						) );
	
	// Register Footer Column #3
	register_sidebar( array (
							'name'			 =>  __( 'Footer Column #3', 'fart' ),
							'id' 			 =>  'footer-column-3-widget-area',
							'description'	 =>  __( 'The Footer Column #3 widget area', 'fart' ),
							'before_widget'  =>  '',
							'after_widget'	 =>  '',
							'before_title'	 =>  '<h2 class="footer-title">',
							'after_title'	 =>  '</h2><div class="footer-after-title"></div>',
						) );
}

/**
 * Displays the slider
 */
function fart_display_slider() { ?>
	 
	 <div class="camera_wrap camera_emboss" id="camera_wrap">
	 
		<?php
			// display slides
			for ( $i = 1; $i <= 3; ++$i ) {
					
					$defaultSlideImage = get_template_directory_uri().'/images/slider/' . $i .'.jpg';

					$slideContent = get_theme_mod( 'fart_slide'.$i.'_content' );
					$slideImage = get_theme_mod( 'fart_slide'.$i.'_image', $defaultSlideImage );
				?>
					<div data-thumb="<?php echo esc_attr( $slideImage ); ?>" data-src="<?php echo esc_attr( $slideImage ); ?>">
						<?php if ( $slideContent ) : ?>
								<div class="camera_caption fadeFromBottom">
									<?php echo $slideContent; ?>
								</div>
						<?php endif; ?>
					</div>
<?php		} ?>
	</div><!-- #camera_wrap -->
<?php 
}

/**
 *	Used to load the content for posts and pages.
 */
function fart_the_content() {

	// Display Thumbnails if thumbnail is set for the post
	if ( has_post_thumbnail() ) {
?>

		<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>">
			<?php the_post_thumbnail(); ?>
		</a>
								
<?php
	}

	the_content( __( 'Read More', 'fart') );
}

/**
 *	Displays the single content.
 */
function fart_the_content_single() {

	// Display Thumbnails if thumbnail is set for the post
	if ( has_post_thumbnail() ) {

		the_post_thumbnail();
	}
	the_content( __( 'Read More...', 'fart') );
}

function fart_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

function fart_sanitize_html( $html ) {
	return wp_kses_post( $html );
}

function fart_sanitize_url( $url ) {
	return esc_url_raw( $url );
}

/**
 * Register theme settings in the customizer
 */
function fart_customize_register( $wp_customize ) {

    /**
	 * Add Social Sites Section
	 */
	$wp_customize->add_section(
		'fart_social_section',
		array(
			'title'       => __( 'Social Sites', 'fart' ),
			'capability'  => 'edit_theme_options',
		)
	);
	
	// Add facebook url
	$wp_customize->add_setting(
		'fart_social_facebook',
		array(
		    'sanitize_callback' => 'fart_sanitize_url',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fart_social_facebook',
        array(
            'label'          => __( 'Facebook Page URL', 'fart' ),
            'section'        => 'fart_social_section',
            'settings'       => 'fart_social_facebook',
            'type'           => 'text',
            )
        )
	);

	// Add twitter url
	$wp_customize->add_setting(
		'fart_social_twitter',
		array(
		    'sanitize_callback' => 'fart_sanitize_url',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fart_social_twitter',
        array(
            'label'          => __( 'Twitter Page URL', 'fart' ),
            'section'        => 'fart_social_section',
            'settings'       => 'fart_social_twitter',
            'type'           => 'text',
            )
        )
	);

	// Add LinkedIn url
	$wp_customize->add_setting(
		'fart_social_linkedin',
		array(
		    'sanitize_callback' => 'fart_sanitize_url',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fart_social_linkedin',
        array(
            'label'          => __( 'LinkedIn Page URL', 'fart' ),
            'section'        => 'fart_social_section',
            'settings'       => 'fart_social_linkedin',
            'type'           => 'text',
            )
        )
	);

	// Add Instagram url
	$wp_customize->add_setting(
		'fart_social_instagram',
		array(
		    'sanitize_callback' => 'fart_sanitize_url',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fart_social_instagram',
        array(
            'label'          => __( 'instagram Page URL', 'fart' ),
            'section'        => 'fart_social_section',
            'settings'       => 'fart_social_instagram',
            'type'           => 'text',
            )
        )
	);

	// Add RSS Feeds url
	$wp_customize->add_setting(
		'fart_social_rss',
		array(
		    'sanitize_callback' => 'fart_sanitize_url',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fart_social_rss',
        array(
            'label'          => __( 'RSS Feeds URL', 'fart' ),
            'section'        => 'fart_social_section',
            'settings'       => 'fart_social_rss',
            'type'           => 'text',
            )
        )
	);

	// Add Tumblr url
	$wp_customize->add_setting(
		'fart_social_tumblr',
		array(
		    'sanitize_callback' => 'fart_sanitize_url',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fart_social_tumblr',
        array(
            'label'          => __( 'Tumblr Page URL', 'fart' ),
            'section'        => 'fart_social_section',
            'settings'       => 'fart_social_tumblr',
            'type'           => 'text',
            )
        )
	);

	// Add YouTube channel url
	$wp_customize->add_setting(
		'fart_social_youtube',
		array(
		    'sanitize_callback' => 'fart_sanitize_url',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fart_social_youtube',
        array(
            'label'          => __( 'YouTube channel URL', 'fart' ),
            'section'        => 'fart_social_section',
            'settings'       => 'fart_social_youtube',
            'type'           => 'text',
            )
        )
	);

	// Add Pinterest page url
	$wp_customize->add_setting(
		'fart_social_pinterest',
		array(
		    'sanitize_callback' => 'fart_sanitize_url',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fart_social_pinterest',
        array(
            'label'          => __( 'Pinterest Page URL', 'fart' ),
            'section'        => 'fart_social_section',
            'settings'       => 'fart_social_pinterest',
            'type'           => 'text',
            )
        )
	);

	// Add VK page url
	$wp_customize->add_setting(
		'fart_social_vk',
		array(
		    'sanitize_callback' => 'fart_sanitize_url',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fart_social_vk',
        array(
            'label'          => __( 'VK Page URL', 'fart' ),
            'section'        => 'fart_social_section',
            'settings'       => 'fart_social_vk',
            'type'           => 'text',
            )
        )
	);

	// Add Flickr page url
	$wp_customize->add_setting(
		'fart_social_flickr',
		array(
		    'sanitize_callback' => 'fart_sanitize_url',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fart_social_flickr',
        array(
            'label'          => __( 'Flickr Page URL', 'fart' ),
            'section'        => 'fart_social_section',
            'settings'       => 'fart_social_flickr',
            'type'           => 'text',
            )
        )
	);

	// Add Vine page url
	$wp_customize->add_setting(
		'fart_social_vine',
		array(
		    'sanitize_callback' => 'fart_sanitize_url',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fart_social_vine',
        array(
            'label'          => __( 'Vine Page URL', 'fart' ),
            'section'        => 'fart_social_section',
            'settings'       => 'fart_social_vine',
            'type'           => 'text',
            )
        )
	);
	
	/**
	 * Add Slider Section
	 */
	$wp_customize->add_section(
		'fart_slider_section',
		array(
			'title'       => __( 'Slider', 'fart' ),
			'capability'  => 'edit_theme_options',
		)
	);

	// Add display slider option
	$wp_customize->add_setting(
			'fart_slider_display',
			array(
					'default'           => 0,
					'sanitize_callback' => 'fart_sanitize_checkbox',
			)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fart_slider_display',
							array(
								'label'          => __( 'Display Slider on a Static Front Page', 'fart' ),
								'section'        => 'fart_slider_section',
								'settings'       => 'fart_slider_display',
								'type'           => 'checkbox',
							)
						)
	);
	
	// Add slide 1 content
	$wp_customize->add_setting(
		'fart_slide1_content',
		array(
		    'sanitize_callback' => 'fart_sanitize_html',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fart_slide1_content',
        array(
            'label'          => __( 'Slide #1 Content', 'fart' ),
            'section'        => 'fart_slider_section',
            'settings'       => 'fart_slide1_content',
            'type'           => 'textarea',
            )
        )
	);
	
	// Add slide 1 background image
	$wp_customize->add_setting( 'fart_slide1_image',
		array(
			'default' => get_template_directory_uri().'/images/slider/' . '1.jpg',
    		'sanitize_callback' => 'fart_sanitize_url'
		)
	);

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'fart_slide1_image',
			array(
				'label'   	 => __( 'Slide 1 Image', 'fart' ),
				'section' 	 => 'fart_slider_section',
				'settings'   => 'fart_slide1_image',
			) 
		)
	);
	
	// Add slide 2 content
	$wp_customize->add_setting(
		'fart_slide2_content',
		array(
		    'sanitize_callback' => 'fart_sanitize_html',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fart_slide2_content',
        array(
            'label'          => __( 'Slide #2 Content', 'fart' ),
            'section'        => 'fart_slider_section',
            'settings'       => 'fart_slide2_content',
            'type'           => 'textarea',
            )
        )
	);
	
	// Add slide 2 background image
	$wp_customize->add_setting( 'fart_slide2_image',
		array(
			'default' => get_template_directory_uri().'/images/slider/' . '2.jpg',
    		'sanitize_callback' => 'fart_sanitize_url'
		)
	);

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'fart_slide2_image',
			array(
				'label'   	 => __( 'Slide 2 Image', 'fart' ),
				'section' 	 => 'fart_slider_section',
				'settings'   => 'fart_slide2_image',
			) 
		)
	);
	
	// Add slide 3 content
	$wp_customize->add_setting(
		'fart_slide3_content',
		array(
		    'sanitize_callback' => 'fart_sanitize_html',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fart_slide3_content',
        array(
            'label'          => __( 'Slide #3 Content', 'fart' ),
            'section'        => 'fart_slider_section',
            'settings'       => 'fart_slide3_content',
            'type'           => 'textarea',
            )
        )
	);
	
	// Add slide 3 background image
	$wp_customize->add_setting( 'fart_slide3_image',
		array(
			'default' => get_template_directory_uri().'/images/slider/' . '3.jpg',
    		'sanitize_callback' => 'fart_sanitize_url'
		)
	);

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'fart_slide3_image',
			array(
				'label'   	 => __( 'Slide 3 Image', 'fart' ),
				'section' 	 => 'fart_slider_section',
				'settings'   => 'fart_slide3_image',
			) 
		)
	);

	/**
	 * Add Footer Section
	 */
	$wp_customize->add_section(
		'fart_footer_section',
		array(
			'title'       => __( 'Footer', 'fart' ),
			'capability'  => 'edit_theme_options',
		)
	);
	
	// Add footer copyright text
	$wp_customize->add_setting(
		'fart_footer_copyright',
		array(
		    'default'           => '',
		    'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fart_footer_copyright',
        array(
            'label'          => __( 'Copyright Text', 'fart' ),
            'section'        => 'fart_footer_section',
            'settings'       => 'fart_footer_copyright',
            'type'           => 'text',
            )
        )
	);

	/**
	 * Add Animations Section
	 */
	$wp_customize->add_section(
		'fart_animations_display',
		array(
			'title'       => __( 'Animations', 'fart' ),
			'capability'  => 'edit_theme_options',
		)
	);

	// Add display Animations option
	$wp_customize->add_setting(
			'fart_animations_display',
			array(
					'default'           => 1,
					'sanitize_callback' => 'fart_sanitize_checkbox',
			)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize,
						'fart_animations_display',
							array(
								'label'          => __( 'Enable Animations', 'fart' ),
								'section'        => 'fart_animations_display',
								'settings'       => 'fart_animations_display',
								'type'           => 'checkbox',
							)
						)
	);
}

add_action('customize_register', 'fart_customize_register');

function fart_header_style() {

    $header_text_color = get_header_textcolor();

    if ( ! has_header_image()
        && ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color
             || 'blank' === $header_text_color ) ) {

        return;
    }

    $headerImage = get_header_image();
?>
    <style type="text/css">
        <?php if ( has_header_image() ) : ?>

                #header-main-fixed {background-image: url("<?php echo esc_url( $headerImage ); ?>");}

        <?php endif; ?>


        <?php if ( get_theme_support( 'custom-header', 'default-text-color' ) !== $header_text_color
                    && 'blank' !== $header_text_color ) : ?>

                #header-main-fixed, #header-main-fixed h1.entry-title {color: #<?php echo sanitize_hex_color_no_hash( $header_text_color ); ?>;}

        <?php endif; ?>
    </style>
<?php
}

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function fart_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'fart_skip_link_focus_fix' );

function fart_register_block_styles() {

	register_block_style(
		'core/button',
		array(
			'name'  => 'btn',
			'label' => __( 'Hover Effect', 'fart' ),
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'  => 'tgroup',
			'label' => __( 'Margin Bottom Space', 'fart' ),
		)
	);

	register_block_style(
		'core/site-title',
		array(
			'name'  => 'tsitetitle',
			'label' => __( 'Bold', 'fart' ),
		)
	);

	register_block_style(
		'core/post-title',
		array(
			'name'  => 'tposttitle',
			'label' => __( 'Bold', 'fart' ),
		)
	);

	register_block_style(
		'core/social-link',
		array(
			'name'  => 'tsociallinks',
			'label' => __( 'Square', 'fart' ),
		)
	);
}
add_action( 'init', 'fart_register_block_styles' );

?>
