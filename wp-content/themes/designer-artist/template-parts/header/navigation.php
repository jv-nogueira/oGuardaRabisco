<?php
/**
 * The template part for header
 *
 * @package Designer Artist 
 * @subpackage designer-artist
 * @since designer-artist 1.0
 */
?>

<div id="header" class="text-md-center">
  <?php if(has_nav_menu('primary')){ ?>
    <div class="toggle-nav mobile-menu text-center">
      <button role="tab" onclick="designer_artist_menu_open_nav()" class="responsivetoggle"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','designer-artist'); ?></span></button>
    </div>
  <?php } ?>
  <div id="mySidenav" class="nav sidenav">
    <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'designer-artist' ); ?>">
      <?php if(has_nav_menu('primary')){
        wp_nav_menu( array( 
          'theme_location' => 'primary',
          'container_class' => 'main-menu clearfix' ,
          'menu_class' => 'clearfix',
          'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
          'fallback_cb' => 'wp_page_menu',
        ) );
      } ?>
      <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="designer_artist_menu_close_nav()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','designer-artist'); ?></span></a>
    </nav>
  </div>
</div>