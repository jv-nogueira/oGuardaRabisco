<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @subpackage fArt
 * @author tishonator
 * @since fArt 1.0.0
 *
 */

 get_header(); ?>

<div id="main-content-wrapper">

	<div id="main-content">

		<?php if ( have_posts() ) :
				
					while ( have_posts() ) :
					
						the_post();
		
						// includes the single page content templata here
						get_template_part( 'content', 'page' );
		
						// if comments are open or there's at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}
					
					endwhile; // end of have_posts()
					
					wp_link_pages( array(
									'link_before'      => '<li>',
									'link_after'       => '</li>',
								 ) );
				
		      else : 
		  
					// if no content is loaded, show the 'no found' template
					get_template_part( 'content', 'none' );
	 
			  endif; // end of have_posts()
			  ?>

	</div><!-- #main-content -->

	<?php get_sidebar(); ?>

</div><!-- #main-content-wrapper -->

<?php get_footer(); ?>