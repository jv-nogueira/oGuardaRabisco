<?php
/**
 * The default template for displaying content
 *
 * Used for single, index, archive, and search contents.
 *
 * @subpackage fart
 * @author tishonator
 * @since fArt 1.0.0
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( is_single() ) : ?>

			<h1 class="entry-title">
				<?php the_title(); ?>
			</h1>

	<?php else : ?>
	
			<h1 class="entry-title">
				<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			</h1>
	
	<?php endif; ?>

	<div class="before-content">
		
		<?php if ( !is_single() && get_the_title() === '' ) : ?>

				<span class="icon clock-icon">
					<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
						<time datetime="<?php the_date( DATE_W3C ); ?>"><?php echo get_the_date(); ?></time>
					</a>
				</span><!-- .clock-icon -->
	
		<?php else : ?>

				<span class="icon clock-icon">
					<time datetime="<?php the_date( DATE_W3C ); ?>"><?php echo get_the_date(); ?></time>
				</span><!-- .clock-icon -->
			
		<?php endif; ?>
		
		<span class="icon author-icon">
			<?php the_author_posts_link(); ?>
		</span><!-- .author-icon -->
		
		<?php if ( ! post_password_required() ) :
		
					$format = get_post_format();
						if ( current_theme_supports( 'post-formats', $format ) ) :
							printf( '<span class="%1$s-icon"> <a href="%2$s">%3$s</a></span>',
									$format,							
									esc_url( get_post_format_link( $format ) ),
									get_post_format_string( $format )
								);
						endif;
				
			   endif;
		?>
		
		<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>

					<span class="icon comments-icon">
						<?php comments_popup_link(__( 'No Comments', 'fart' ), __( '1 Comment', 'fart' ), __( '% Comments', 'fart' ), '', __( 'Comments are closed.', 'fart' )); ?>
					</span><!-- .comments-icon -->
		
		<?php endif; ?>
		
		<?php edit_post_link( __( 'Edit', 'fart' ), '<span class="edit-icon">', '</span>' ); ?>

	</div><!-- .before-content -->

	<?php if ( is_single() ) : ?>

				<div class="content">
					<?php fart_the_content_single(); ?> 
				</div><!-- .content -->

	<?php else : ?>

				<div class="content">
					<?php fart_the_content(); ?>
				</div><!-- .content -->

	<?php endif; ?>

	<div class="after-content">
		
		<?php if ( ! post_password_required() ) : ?>

					<?php if ( has_category() ) : ?>
					
								<span class="icon category-icon">
									<?php esc_html_e('Categories:', 'fart'); ?>
									<?php the_category( ', ' ) ?>
								</span><!-- .category-icon -->

					<?php endif; ?>
				
					<?php if ( has_tag() ) : ?>

								<span class="icon tags-icon">
										<?php esc_html_e('Tags:', 'fart'); ?>
										<?php the_tags(); ?>
								</span><!-- .tags-icon -->

					<?php endif; ?>

		<?php endif; // ! post_password_required()
			  ?>
		
	</div><!-- .after-content -->
	
	<?php if ( !is_single() ) : ?>

			<div class="separator">
			</div><!-- .separator -->

	<?php endif; ?>
	
</article><!-- #post-## -->
