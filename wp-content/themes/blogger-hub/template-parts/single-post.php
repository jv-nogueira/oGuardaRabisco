<?php
/**
 * The template part for displaying post
 * @package Blogger Hub
 * @subpackage blogger_hub
 * @since 1.0
 */
?>
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?> 
<article>
	<h1><?php the_title(); ?></h1>
	<?php if(get_theme_mod('blogger_hub_single_post_date',true)==1 || get_theme_mod('blogger_hub_single_post_author',true)==1 || get_theme_mod('blogger_hub_single_post_comment_no',true)==1 || get_theme_mod('blogger_hub_single_post_time',true)==1){ ?>
		<div class="post-info py-2">
	        <?php if(get_theme_mod('blogger_hub_single_post_date',true)==1){ ?>
	            <i class="fa fa-calendar pe-2" aria-hidden="true"></i><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><span class="entry-date me-3"><?php echo esc_html( get_the_date() ); ?></span><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a>
	        <?php }?>
	        <?php if(get_theme_mod('blogger_hub_single_post_author',true)==1){ ?>
		        <i class="fa fa-user pe-2" aria-hidden="true"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><span class="entry-author me-3"> <?php the_author(); ?></span><span class="screen-reader-text"><?php the_author(); ?></span></a>
		    <?php }?>
	        <?php if(get_theme_mod('blogger_hub_single_post_comment_no',true)==1){ ?>
		        <i class="fa fa-comments pe-2" aria-hidden="true"></i><span class="entry-comments me-3"> <?php comments_number( __('0 Comments','blogger-hub'), __('0 Comments','blogger-hub'), __('% Comments','blogger-hub') ); ?></span> 
		    <?php }?>
		    <?php if( get_theme_mod( 'blogger_hub_single_post_time',true) != '') { ?>
        	<span class="entry-comments me-2"><i class="far fa-clock me-1" aria-hidden="true"></i> <?php echo esc_html( get_the_time() ); ?></span>
        <?php }?>
		</div>
	<?php }?>
	<?php if( get_theme_mod( 'blogger_hub_single_post_image',true) != '' && get_theme_mod('blogger_hub_post_featured_image','in-content') == 'in-content') { ?>
		<?php if(has_post_thumbnail()) { ?>
			<hr>
			<div class="feature-box">	
				<?php the_post_thumbnail(); ?>
			</div>
			<hr>					
		<?php } ?>
	<?php }?>
	<?php if( get_theme_mod( 'blogger_hub_single_post_category',true) != '') { ?>
		<div class="single-post-category mt-3">
			<span class="category"><?php esc_html_e('Categories:','blogger-hub'); ?></span>
			<?php the_category(); ?>
		</div>
	<?php }?>
	<div class="entry-content"><?php the_content(); ?></div>

	<?php 
	wp_link_pages( array(
		'before'      => '<div class="page-links"><span class="page-links-title p-3">' . __( 'Pages:', 'blogger-hub' ) . '</span>',
		'after'       => '</div>',
		'link_before' => '<span>',
		'link_after'  => '</span>',
		'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'blogger-hub' ) . ' </span>%',
		'separator'   => '<span class="screen-reader-text">, </span>',
	) );
		
	if ( is_singular( 'attachment' ) ) {
		// Parent post navigation.
		the_post_navigation( array(
			'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'blogger-hub' ),
		) );
	} 	elseif ( is_singular( 'post' ) ) {
		if( get_theme_mod( 'blogger_hub_single_post_nav',true) != '') {
			// Previous/next post navigation.
			the_post_navigation( array(
				'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html(get_theme_mod('blogger_hub_single_post_next_nav_text',__('Next','blogger-hub' )) )  . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Next post:', 'blogger-hub' ) . '</span> ' .
					'',
				'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html(get_theme_mod('blogger_hub_single_post_prev_nav_text',__('Previous','blogger-hub' )) ) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Previous post:', 'blogger-hub' ) . '</span> ' .
					'',
			) );
		}
	}

	echo '<div class="clearfix"></div>'; ?>

	<?php if( get_theme_mod( 'blogger_hub_metafields_tags') != '' || get_theme_mod( 'blogger_hub_metafields_share_link') != '') { ?>
      <div class="row">
        <div class="col-lg-6 col-md-6">
        	<?php if(get_theme_mod('blogger_hub_metafields_tags',true)==1){ ?>
	            <p class="post_tag text-md-start text-center"><?php
	              if( $tags = get_the_tags() ) {
	                echo '<span class="meta-sep"></span>';
	                foreach( $tags as $content_tag ) {
	                  $sep = ( $content_tag === end( $tags ) ) ? '' : ' ';
	                  echo '<a href="' . esc_url(get_term_link( $content_tag, $content_tag->taxonomy )) . '" class="mb-2 me-2">#' . esc_html($content_tag->name) . '</a>' . esc_html($sep);
	                }
	              } ?>
            	</p>
          	<?php }?>
        </div>
        <div class="col-lg-6 col-md-6">
    		<?php if(get_theme_mod('blogger_hub_metafields_share_link',true)==1){ ?>
	            <div class="att_socialbox text-md-end text-center">
	              	<i class="fas fa-share-alt"></i> <span><?php echo esc_html_e('Share :','blogger-hub'); ?></span>
	              	<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" class="m-1" target="_blank"><i class="fab fa-facebook-f" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Facebook', 'blogger-hub' ); ?></span></a>
	              	<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>" class="m-1" target="_blank"><i class="fab fa-linkedin-in" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Linkedin', 'blogger-hub' ); ?></span></a>
	              	<a href="https://twitter.com/share?url=<?php the_permalink(); ?>" class="m-1" target="_blank"><i class="fab fa-twitter" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Twitter', 'blogger-hub' ); ?></span></a>
	              	<a href="http://www.instagram.com/submit?url=<?php the_permalink(); ?>" class="m-1" target="_blank"><i class="fab fa-instagram"></i><span class="screen-reader-text"><?php esc_html_e( 'Instagram', 'blogger-hub' ); ?></span></a>
	            </div>
          	<?php }?>
        </div>
      </div>
    <?php }?>
    
	<?php
	if( get_theme_mod( 'blogger_hub_single_post_comment',true) != '') {
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
	}?>
</article>

<?php if (get_theme_mod('blogger_hub_related_posts',true) != '') {
	get_template_part( 'template-parts/related-post' );
}