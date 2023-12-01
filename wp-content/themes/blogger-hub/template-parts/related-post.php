<?php $related_posts = blogger_hub_related_posts_function(); ?>

<?php if ( $related_posts->have_posts() ): ?>

	<div class="related-posts clearfix py-3">
		<?php if ( get_theme_mod('blogger_hub_related_posts_title','You May Also Like') != '' ) {?>
			<h2 class="related-posts-main-title"><?php echo esc_html( get_theme_mod('blogger_hub_related_posts_title',__('You May Also Like','blogger-hub')) ); ?></h2>
		<?php }?>
		<div class="row">
			<?php while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>

				<div class="col-lg-4 col-md-4">
				    <article class="blog-sec p-3 mb-4 text-start">
				        <div class="mainimage">
				            <?php 
				                if(has_post_thumbnail() && get_theme_mod('blogger_hub_featured_image',true) == true) { 
				                  the_post_thumbnail(); 
				                }
				            ?>    
				        </div>
				        <h3><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h3>
			            <?php if(get_the_excerpt()) { ?>
			                <div class="entry-content"><p class="m-0"><?php $blogger_hub_excerpt = get_the_excerpt(); echo esc_html( blogger_hub_string_limit_words( $blogger_hub_excerpt, esc_attr(get_theme_mod('blogger_hub_related_post_excerpt_number','20')))); ?> <?php echo esc_html( get_theme_mod('blogger_hub_button_excerpt_suffix','...') ); ?></p></div>
			            <?php }?>
				        <?php if ( get_theme_mod('blogger_hub_blog_button_text','READ MORE') != '' ) {?>
				            <div class="blogbtn my-3">
				                <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small hvr-sweep-to-right"><?php echo esc_html( get_theme_mod('blogger_hub_blog_button_text',__('READ MORE', 'blogger-hub')) ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('blogger_hub_blog_button_text',__('READ MORE', 'blogger-hub')) ); ?></span></a>
				            </div>
				        <?php }?>
				    </article>
				</div>

			<?php endwhile; ?>
		</div>

	</div><!--/.post-related-->
<?php endif; ?>

<?php wp_reset_postdata(); ?>