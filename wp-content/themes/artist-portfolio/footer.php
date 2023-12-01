<?php
/**
 * The template for displaying the footer.
 * @package Artist Portfolio
 */
?>
<?php if( get_theme_mod( 'artist_portfolio_hide_show_scroll',true) != '' || get_theme_mod( 'artist_portfolio_display_scrolltop',true) != '') { ?>
    <?php $artist_portfolio_theme_lay = get_theme_mod( 'artist_portfolio_footer_options','Right');
    if($artist_portfolio_theme_lay == 'Left align'){ ?>
        <a href="#" id="scrollbutton" class="left"><i class="<?php echo esc_attr(get_theme_mod('artist_portfolio_back_to_top_icon','fas fa-long-arrow-alt-up')); ?>"></i><span class="screen-reader-text"><?php esc_html_e( 'Back to Top', 'artist-portfolio' ); ?></span></a>
    <?php }else if($artist_portfolio_theme_lay == 'Center align'){ ?>
        <a href="#" id="scrollbutton" class="center"><i class="<?php echo esc_attr(get_theme_mod('artist_portfolio_back_to_top_icon','fas fa-long-arrow-alt-up')); ?>"></i><span class="screen-reader-text"><?php esc_html_e( 'Back to Top', 'artist-portfolio' ); ?></span></a>
    <?php }else{ ?>
        <a href="#" id="scrollbutton"><i class="<?php echo esc_attr(get_theme_mod('artist_portfolio_back_to_top_icon','fas fa-long-arrow-alt-up')); ?>"></i><span class="screen-reader-text"><?php esc_html_e( 'Back to Top', 'artist-portfolio' ); ?></span></a>
    <?php }?>
<?php }?>
<footer role="contentinfo">
    <?php if (get_theme_mod('artist_portfolio_show_hide_footer', true)){ ?>
        <?php //Set widget areas classes based on user choice
            $artist_portfolio_widget_areas = get_theme_mod('footer_widget_areas', '4');
            if ($artist_portfolio_widget_areas == '3') {
                $cols = 'col-md-4';
            } elseif ($artist_portfolio_widget_areas == '4') {
                $cols = 'col-md-3';
            } elseif ($artist_portfolio_widget_areas == '2') {
                $cols = 'col-md-6';
            } else {
                $cols = 'col-md-12';
            }
        ?>
        <aside id="sidebar-footer" class="footer-wp" role="complementary">
            <div class="container">
                <div class="row">
                    <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                        <div class="sidebar-column <?php echo ( $cols ) ?>">
                            <?php dynamic_sidebar( 'footer-1'); ?>
                        </div>
                    <?php endif; ?> 
                    <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                        <div class="sidebar-column <?php echo ( $cols ) ?>">
                            <?php dynamic_sidebar( 'footer-2'); ?>
                        </div>
                    <?php endif; ?> 
                    <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                        <div class="sidebar-column <?php echo ( $cols ) ?>">
                            <?php dynamic_sidebar( 'footer-3'); ?>
                        </div>
                    <?php endif; ?> 
                    <?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
                        <div class="sidebar-column <?php echo ( $cols ) ?>">
                            <?php dynamic_sidebar( 'footer-4'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </aside>
    <?php }?>
    <?php if (get_theme_mod('artist_portfolio_show_hide_copyright', true)) {?>
    	<div class="copyright-wrapper py-3 px-0">
            <div class="container">
                <p><?php artist_portfolio_credit(); ?> <?php echo esc_html(get_theme_mod('artist_portfolio_footer_copy',__('By Buywptemplate','artist-portfolio'))); ?></p>
            </div>
            <div class="clear"></div>
        </div>
    <?php }?>
</footer>
    
<?php wp_footer(); ?>

</body>
</html>