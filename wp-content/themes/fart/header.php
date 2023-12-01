<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "body-content-wrapper" div.
 *
 * @subpackage fArt
 * @author tishonator
 * @since fArt 1.0.0
 *
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<?php
            if ( is_singular() && pings_open() ) :
                printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
            endif;
        ?>
        <meta name="viewport" content="width=device-width" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php wp_body_open(); ?>
		<a class="skip-link screen-reader-text" href="#main-content-wrapper">
			<?php _e( 'Skip to content', 'fart' ); ?>
		</a>
		<div id="body-content-wrapper">
			
			<header id="header-main-fixed">

				<div id="header-content-wrapper">

					<div id="header-top">
						<?php fart_display_social_sites(); ?>
					</div>
						
						<div class="clear"></div>
				
					<div id="header-logo">
						<?php fart_show_website_logo_image_and_title(); ?>
					</div><!-- #header-logo -->
					
					<nav id="navmain">
					
						<?php wp_nav_menu( array( 'theme_location' => 'primary',
												  'fallback_cb'    => 'wp_page_menu',
												  
												  ) ); ?>
					</nav><!-- #navmain -->
					
					<div class="clear">
					</div><!-- .clear -->
					
				</div><!-- #header-content-wrapper -->
				
			</header><!-- #header-main-fixed -->
			
			<div id="header-spacer">
				&nbsp;
			</div><!-- #header-spacer -->
<?php
			if ( is_front_page() && get_option( 'show_on_front' ) == 'page' ) :

				if ( get_theme_mod('fart_slider_display', 0) == 1 ) :

					fart_display_slider();

				endif;

			endif;
?>