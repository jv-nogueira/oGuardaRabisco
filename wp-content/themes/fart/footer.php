<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "body-content-wrapper" div and all content after.
 *
 * @subpackage fArt
 * @author tishonator
 * @since fArt 1.0.0
 *
 */
?>
			<a href="#" class="scrollup"></a>
			<div class="clear"></div>
			<footer id="footer-main">
			
				<div id="footer-content-wrapper">
				
					<?php get_sidebar( 'footer' ); ?>

					<nav id="footer-menu">
						<?php wp_nav_menu( array( 'theme_location' => 'footer', ) ); ?>
					</nav>
				
					<div class="clear">
					</div><!-- .clear -->
					
				</div><!-- #footer-content-wrapper -->
				
			</footer>
			<div id="footer-bottom-area">
				<div id="footer-bottom-content-wrapper">
					<div id="copyright">
					
						<p>
						 	<?php fart_show_copyright_text(); ?> <a href="<?php echo esc_url( 'https://tishonator.com/product/fart' ); ?>" title="<?php esc_attr_e( 'fart Theme', 'fart' ); ?>">
							<?php esc_html_e('fArt Theme', 'fart'); ?></a> <?php esc_attr_e( 'powered by', 'fart' ); ?> <a href="<?php echo esc_url( 'http://wordpress.org/' ); ?>" title="<?php esc_attr_e( 'WordPress', 'fart' ); ?>">
							<?php esc_html_e('WordPress', 'fart'); ?></a>
						</p>
						
					</div><!-- #copyright -->
				</div>
			</div><!-- #footer-main -->

		</div><!-- #body-content-wrapper -->
		<?php wp_footer(); ?>
	</body>
</html>