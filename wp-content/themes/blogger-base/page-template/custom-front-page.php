<?php
/**
 * Template Name: Custom home page
 */
get_header(); ?>

<div id="main-post" class="py-5">
  <div  class="container">
    <div class="row">
      <div class="col-lg-9 col-md-9">
        <div id="category_post">
          <?php if( get_theme_mod('blogger_hub_section_title') != ''){ ?>
          <h1 class="py-3 mb-4 text-center"><?php echo esc_html(get_theme_mod('blogger_hub_section_title','')); ?></h1>
          <?php }?>
          <div class="row">
            <?php 
            $page_query = new WP_Query(array( 'category_name' => get_theme_mod('blogger_hub_our_category','theblog')));?>
            <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
              <div class="col-lg-4">
                <div class="blog-sec p-3 mb-4 text-center">
                  <div class="mainimage">
                    <?php 
                      if(has_post_thumbnail()) { 
                        the_post_thumbnail(); 
                      }
                    ?>
                  </div>
                  <h2><a href="<?php echo esc_url(get_permalink() ); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
                  <hr class="post-hr mx-auto my-2">     
                  <div class="post-info py-2">
                    <?php if(get_theme_mod('blogger_hub_metafields_date',true)==1){ ?>
                      <div class="post-info py-2">
                        <i class="fa fa-calendar me-1" aria-hidden="true"></i><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><span class="entry-date"><?php echo esc_html( get_the_date() ); ?></span><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a>
                      </div>
                    <?php }?>
                    <?php if(get_theme_mod('blogger_hub_metafields_author',true)==1){ ?>
                      <i class="fa fa-user me-1" aria-hidden="true"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><span class="entry-author me-3"> <?php the_author(); ?></span><span class="screen-reader-text"><?php the_author(); ?></span></a>
                    <?php }?>
                    <?php if(get_theme_mod('blogger_hub_metafields_comment',true)==1){ ?>
                      <i class="fa fa-comments me-1" aria-hidden="true"></i><span class="entry-comments me-3"> <?php comments_number( __('0 Comments','blogger-hub'), __('0 Comments','blogger-hub'), __('% Comments','blogger-hub') ); ?></span> 
                    <?php }?>
                    <?php if( get_theme_mod( 'blogger_hub_metafields_time',true) != '') { ?>
                      <i class="far fa-clock me-1" aria-hidden="true"></i><span class="entry-comments me-3"> <?php echo esc_html( get_the_time() ); ?></span>
                    <?php }?>
                  </div>         
                  <p><?php $blogger_base_excerpt = get_the_excerpt(); echo esc_html( blogger_base_string_limit_words( $blogger_base_excerpt,15 ) ); ?></p>
                  <div class="blogbtn">
                    <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small hvr-sweep-to-right" title="<?php esc_attr_e( 'Read Full', 'blogger-base' ); ?>"><?php esc_html_e('Read Full','blogger-base'); ?><span class="screen-reader-text"><?php esc_html_e('Read Full','blogger-base'); ?></span></a>
                  </div>
                  <?php if(get_theme_mod('blogger_hub_metafields_tags',true)==1){ ?>
                    <p class="post_tag"><?php
                      if( $tags = get_the_tags() ) {
                        echo '<span class="meta-sep"></span>';
                        foreach( $tags as $content_tag ) {
                          $sep = ( $content_tag === end( $tags ) ) ? '' : ' ';
                          echo '<a href="' . esc_url(get_term_link( $content_tag, $content_tag->taxonomy )) . '">#' . esc_html($content_tag->name) . '</a>' . esc_html($sep);
                        }
                      } ?>
                    </p>
                  <?php }?>
                </div>
                <div class="navigation">
                  <?php
                    // Previous/next page navigation.
                    the_posts_pagination( array(
                      'prev_text'          => __( 'Previous page', 'blogger-base' ),
                      'next_text'          => __( 'Next page', 'blogger-base' ),
                      'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'blogger-base' ) . ' </span>',
                    ) );
                  ?>
                  <div class="clearfix"></div>
                </div>
              </div>  
            <?php endwhile; 
            wp_reset_postdata();
            ?>
          </div>
        </div>
        <div class="clearfix"></div>
        <div id="wrapper">
          <div class="feature-box">
            <?php while ( have_posts() ) : the_post(); ?>
              <div class="entry-content"><?php the_content(); ?></div>
            <?php endwhile; // end of the loop. ?>
          </div>
        </div>
      </div>
      <div id="sidebar" class="col-lg-3 col-md-3">
        <?php get_sidebar('home-page'); ?>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>