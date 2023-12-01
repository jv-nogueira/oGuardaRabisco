<?php
/**
 * The Header for our theme.
 * @package Blogger Base
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
  } else {
    do_action( 'wp_body_open' );
  }?>
  <?php if(get_theme_mod('blogger_hub_preloader',true)){ ?>
    <?php if(get_theme_mod( 'blogger_hub_preloader_type','Square') == 'Square'){ ?>
      <div id="overlayer"></div>
      <span class="tg-loader">
        <span class="tg-loader-inner"></span>
      </span>
    <?php }else if(get_theme_mod( 'blogger_hub_preloader_type') == 'Circle') {?>    
      <div class="preloader text-center">
        <div class="preloader-container">
          <span class="animated-preloader"></span>
        </div>
      </div>
    <?php }?>
  <?php }?>
  <header role="banner">
    <div id="header">
      <?php if (has_nav_menu('primary')){ ?>
        <div class="toggle-menu responsive-menu p-2">
          <button><i class="<?php echo esc_html(get_theme_mod('blogger_hub_menu_open_icon','fas fa-bars')); ?> me-2"></i><?php echo esc_html( get_theme_mod('blogger_hub_mobile_menu_label', __('Menu','blogger-base'))); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('blogger_hub_mobile_menu_label', __('Menu','blogger-base'))); ?></span></button>
        </div>
      <?php }?>
      <div class="menu-sec <?php if( get_theme_mod( 'blogger_hub_sticky_header') != '') { ?> sticky-header"<?php } else { ?>close-sticky <?php } ?>">
        <div class="container">
          <a class="screen-reader-text skip-link" href="#maincontent"><?php esc_html_e( 'Skip to content', 'blogger-base' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Skip to Content', 'blogger-base' ); ?></span></a>
          <div class="row">
            <div class="menubox align-self-center <?php if(get_theme_mod('blogger_hub_show_search',true)) { ?>col-lg-8" <?php } else { ?>col-lg-10 <?php } ?>">
              <div id="sidelong-menu" class="nav side-nav">
                <nav id="primary-site-navigation" class="nav-menu" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'blogger-base' ); ?>">
                  <?php if (has_nav_menu('primary')){
                    wp_nav_menu( array( 
                      'theme_location' => 'primary',
                      'container_class' => 'main-menu-navigation clearfix' ,
                      'menu_class' => 'clearfix',
                      'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                      'fallback_cb' => 'wp_page_menu',
                    ) ); 
                  } ?>
                  <a href="javascript:void(0)" class="closebtn responsive-menu"><?php echo esc_html( get_theme_mod('blogger_hub_close_menu_label', __('Close Menu','blogger-base'))); ?><i class="<?php echo esc_html(get_theme_mod('blogger_hub_menu_close_icon','fas fa-times-circle')); ?> m-3"></i><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('blogger_hub_close_menu_label', __('Close Menu','blogger-base'))); ?></span></a>
                </nav>
              </div>
            </div>
            <div class="align-self-center <?php if(get_theme_mod('blogger_hub_show_search',true)) { ?>col-lg-2 col-md-7" <?php } else { ?>col-lg-2 col-md-12 <?php } ?>">
              <div class="social-links py-3">
                <?php if( get_theme_mod( 'blogger_hub_facebook_url' ) != '') { ?>
                  <a href="<?php echo esc_url( get_theme_mod( 'blogger_hub_facebook_url','' ) ); ?>"><i class="<?php echo esc_html(get_theme_mod('blogger_hub_facebook_icon','fab fa-facebook-f')); ?> me-xl-3 me-lg-2 me-3"></i><span class="screen-reader-text"><?php esc_html_e( 'Facebook', 'blogger-base' ); ?></span></a>
                <?php } ?>
                <?php if( get_theme_mod( 'blogger_hub_twitter_url' ) != '') { ?>
                  <a href="<?php echo esc_url( get_theme_mod( 'blogger_hub_twitter_url','' ) ); ?>"><i class="<?php echo esc_html(get_theme_mod('blogger_hub_twitter_icon','fab fa-twitter')); ?> me-xl-3 me-lg-2 me-3"></i><span class="screen-reader-text"><?php esc_html_e( 'Twitter', 'blogger-base' ); ?></span></a>
                <?php } ?>
                <?php if( get_theme_mod( 'blogger_hub_insta_url') != '') { ?>
                  <a href="<?php echo esc_url( get_theme_mod( 'blogger_hub_insta_url','' ) ); ?>"><i class="<?php echo esc_html(get_theme_mod('blogger_hub_insta_icon','fab fa-instagram')); ?> me-xl-3 me-lg-2 me-3"></i><span class="screen-reader-text"><?php esc_html_e( 'Instagram', 'blogger-base' ); ?></span></a>
                <?php } ?>
                <?php if( get_theme_mod( 'blogger_hub_linkdin_url') != '') { ?>
                  <a href="<?php echo esc_url( get_theme_mod( 'blogger_hub_linkdin_url','' ) ); ?>"><i class="<?php echo esc_html(get_theme_mod('blogger_hub_linkdin_icon','fab fa-linkedin-in')); ?> me-xl-3 me-lg-2 me-3"></i><span class="screen-reader-text"><?php esc_html_e( 'Linkedin', 'blogger-base' ); ?></span></a>
                <?php } ?>
                <?php if( get_theme_mod( 'blogger_hub_youtube_url' ) != '') { ?>
                  <a href="<?php echo esc_url( get_theme_mod( 'blogger_hub_youtube_url','' ) ); ?>"><i class="<?php echo esc_html(get_theme_mod('blogger_hub_youtube_icon','fab fa-youtube')); ?> me-xl-3 me-lg-2 me-3"></i><span class="screen-reader-text"><?php esc_html_e( 'Youtube', 'blogger-base' ); ?></span></a>
                <?php } ?>
              </div>
            </div>
            <?php if(get_theme_mod('blogger_hub_show_search',true) ){ ?>
              <div class="col-lg-2 col-md-5 align-self-center">
                <div class="search-box py-2">
                  <?php get_search_form(); ?>
                </div>
              </div>
            <?php }?>
          </div>
        </div>
      </div>
    </div>
    <div class="logo header-image text-center">
      <?php if ( has_custom_logo() ) : ?>
        <div class="site-logo"><?php the_custom_logo(); ?></div>
      <?php endif; ?>
      <?php $blog_info = get_bloginfo( 'name' ); ?>
      <?php if ( ! empty( $blog_info ) ) : ?>
        <?php if( get_theme_mod('blogger_hub_show_site_title',true) != ''){ ?>
          <?php if ( is_front_page() && is_home() ) : ?>
            <h1 class="site-title p-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
          <?php else : ?>
            <p class="site-title m-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
          <?php endif; ?>
        <?php }?>
      <?php endif; ?>
      <?php if( get_theme_mod('blogger_hub_show_tagline',true) != ''){ ?>
        <?php
        $description = get_bloginfo( 'description', 'display' );
        if ( $description || is_customize_preview() ) :
        ?>
          <p class="site-description m-0">
            <?php echo esc_html($description); ?>
          </p>
        <?php endif; ?>
      <?php }?>
    </div>
  </header>

  <?php if(get_theme_mod('blogger_hub_post_featured_image') == 'banner' ){
    if( is_singular() ) {?>
      <div id="page-site-header">
        <div class='page-header'> 
          <?php the_title( '<h1>', '</h1>' ); ?>
        </div>
      </div>
    <?php }
  }?>