<?php
/**
 * The template part for displaying Post
 * @package Blogger Base
 * @subpackage blogger_base
 * @since 1.0
 */
?>
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?> 
<?php
  $content = apply_filters( 'the_content', get_the_content() );
  $video   = false;

  // Only get video from the content if a playlist isn't present.
  if ( false === strpos( $content, 'wp-playlist-script' ) ) {
    $video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
  }
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="blog-sec p-3 mb-4 text-center">
    <div class="mainimage">
      <?php
        if ( ! is_single() ) {
          // If not a single post, highlight the video file.
          if ( ! empty( $video ) ) {
            foreach ( $video as $video_html ) {
              echo '<div class="entry-video">';
                echo $video_html;
              echo '</div>';
            }
          };
        };
      ?>
    </div>
    <h2 class="mb-0"><a href="<?php echo esc_url(get_permalink() ); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
    <hr class="post-hr mx-auto mb-2 mt-0">
    <div class="post-info py-2">
      <?php if(get_theme_mod('blogger_hub_metafields_date',true)==1){ ?>
        <div class="post-info py-2">
          <i class="<?php echo esc_attr(get_theme_mod('blogger_hub_postdate_icon',"fa fa-calendar pe-2" )); ?>"></i><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><span class="entry-date"><?php echo esc_html( get_the_date() ); ?></span><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a>
        </div>
      <?php }?>
      <?php if(get_theme_mod('blogger_hub_metafields_author',true)==1){ ?>
        <i class="<?php echo esc_attr(get_theme_mod('blogger_hub_postauthor_icon',"fa fa-user pe-2" )); ?>"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><span class="entry-author me-3"> <?php the_author(); ?></span><span class="screen-reader-text"><?php the_author(); ?></span></a>
      <?php }?>
      <?php if(get_theme_mod('blogger_hub_metafields_comment',true)==1){ ?>
        <i class="<?php echo esc_attr(get_theme_mod('blogger_hub_postcomment_icon',"fa fa-comments pe-2" )); ?>"></i><span class="entry-comments me-3"> <?php comments_number( __('0 Comments','blogger-hub'), __('0 Comments','blogger-hub'), __('% Comments','blogger-hub') ); ?></span> 
      <?php }?> 
      <?php if( get_theme_mod( 'blogger_hub_metafields_time',true) != '') { ?>
        <i class="<?php echo esc_attr(get_theme_mod('blogger_hub_posttime_icon',"fa fa-clock pe-2" )); ?>"></i><span class="entry-comments me-3"> <?php echo esc_html( get_the_time() ); ?></span>
      <?php }?>
    </div>
    <?php if(get_theme_mod('blogger_hub_blog_post_content') == 'Full Content'){ ?>
      <?php the_content(); ?>
    <?php }
    if(get_theme_mod('blogger_hub_blog_post_content', 'Excerpt Content') == 'Excerpt Content'){ ?>
      <?php if(get_the_excerpt()) { ?>
        <div class="entry-content"><p><?php $blogger_base_excerpt = get_the_excerpt(); echo esc_html( blogger_hub_string_limit_words( $blogger_base_excerpt, esc_attr(get_theme_mod('blogger_hub_post_excerpt_number','20')))); ?> <?php echo esc_html( get_theme_mod('blogger_hub_button_excerpt_suffix','...') ); ?></p></div>
      <?php }?>
    <?php }?>
    <?php if ( get_theme_mod('blogger_hub_blog_button_text','READ MORE') != '' ) {?>
      <div class="blogbtn">
        <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small hvr-sweep-to-right"><?php echo esc_html( get_theme_mod('blogger_hub_blog_button_text',__('READ MORE', 'blogger-base')) ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('blogger_hub_blog_button_text',__('READ MORE', 'blogger-base')) ); ?></span></a>
      </div>
    <?php }?>
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
</article>