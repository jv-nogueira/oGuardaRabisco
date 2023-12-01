<?php
/**
 * Template Name: Custom home page
 */

get_header(); ?>
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?> 
<main id="maincontent" role="main">
  <?php do_action('blogger_hub_above_post_section'); ?>

  <div id="main-post" class="container py-5">
    <div class="row m-0">
      <div id="sidebar" class="col-lg-3 col-md-3">
        <?php dynamic_sidebar('home-page'); ?>
      </div>
      <div id="category_post" class="col-lg-9 col-md-9">
        <?php if( get_theme_mod('blogger_hub_section_title') != ''){ ?>
          <h1 class="py-3 mb-4 text-center"><?php echo esc_html(get_theme_mod('blogger_hub_section_title','')); ?></h1>
        <?php }?>
        <div class="row">
          <?php
            $blogger_hub_catData = get_theme_mod('blogger_hub_our_category');
            if($blogger_hub_catData){              
              $page_query = new WP_Query(array( 'category_name' => esc_html( $blogger_hub_catData ,'blogger-hub')));?>
              <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
              <div class="col-lg-6 col-md-6">
                <div class="blog-sec p-3 mb-4 text-center">
                  <h2><?php the_title(); ?></h2>
                  <hr class="post-hr mx-auto mb-2">
                  <?php if(get_theme_mod('blogger_hub_metafields_date',true)==1){ ?>
                    <div class="post-info py-2">
                      <i class="fa fa-calendar me-1" aria-hidden="true"></i><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><span class="entry-date"><?php echo esc_html( get_the_date() ); ?></span><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a>
                    </div>
                  <?php }?>
                  <div class="mainimage">
                    <?php 
                      if(has_post_thumbnail()) { 
                        the_post_thumbnail(); 
                      }
                    ?>    
                  </div>  
                  <div class="post-info py-2">
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
                  <?php if(get_theme_mod('blogger_hub_blog_post_content') == 'Full Content'){ ?>
                    <?php the_content(); ?>
                  <?php }
                  if(get_theme_mod('blogger_hub_blog_post_content', 'Excerpt Content') == 'Excerpt Content'){ ?>
                    <?php if(get_the_excerpt()) { ?>
                      <div class="entry-content"><p class="m-0"><?php $blogger_hub_excerpt = get_the_excerpt(); echo esc_html( blogger_hub_string_limit_words( $blogger_hub_excerpt, esc_attr(get_theme_mod('blogger_hub_post_excerpt_number','20')))); ?> <?php echo esc_html( get_theme_mod('blogger_hub_button_excerpt_suffix','...') ); ?></p></div>
                    <?php }?>
                  <?php }?>
                  <?php if ( get_theme_mod('blogger_hub_blog_button_text','READ MORE') != '' ) {?>
                    <div class="blogbtn my-3">
                      <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small hvr-sweep-to-right"><?php echo esc_html( get_theme_mod('blogger_hub_blog_button_text',__('READ MORE', 'blogger-hub')) ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('blogger_hub_blog_button_text',__('READ MORE', 'blogger-hub')) ); ?></span></a>
                    </div>
                  <?php }?>
                  <?php if( get_theme_mod( 'blogger_hub_metafields_tags') != '' || get_theme_mod( 'blogger_hub_metafields_share_link') != '') { ?>
                    <div class="row">
                      <div class="col-lg-6 col-md-12">
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
                      <div class="col-lg-6 col-md-12">
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
                </div>
                <div class="navigation">
                  <?php
                    // Previous/next page navigation.
                    the_posts_pagination( array(
                      'prev_text'          => __( 'Previous page', 'blogger-hub' ),
                      'next_text'          => __( 'Next page', 'blogger-hub' ),
                      'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'blogger-hub' ) . ' </span>',
                    ) );
                  ?>
                  <div class="clearfix"></div>
                </div>
              </div>
              <?php endwhile; 
              wp_reset_postdata();
            }
          ?>
        </div>
      </div>
    </div>
  </div>

  <?php do_action('blogger_hub_below_post_section'); ?>

  <div class="container">
    <div class="feature-box">
      <?php while ( have_posts() ) : the_post(); ?>
        <div class="entry-content"><?php the_content(); ?></div>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div> 
</main>

<?php get_footer(); ?>