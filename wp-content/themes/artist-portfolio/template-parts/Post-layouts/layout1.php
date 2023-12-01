<?php
/**
 * The template part for displaying content
 * @package Artist Portfolio
 * @subpackage artist_portfolio
 * @since 1.0
 */

$archive_year  = get_the_time('Y'); 
$archive_month = get_the_time('m'); 
$archive_day   = get_the_time('d'); 

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="layout1 text-center">
    <h2><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
    <?php if( get_theme_mod('artist_portfolio_metafields_date', true) != '' || get_theme_mod('artist_portfolio_metafields_author', true) != '' || get_theme_mod('artist_portfolio_metafields_comment', true) != '' || get_theme_mod('artist_portfolio_metafields_time', true) != '' ||  get_theme_mod('artist_portfolio_display_post_date', true) != '' || get_theme_mod('artist_portfolio_display_post_author', true) != '' || get_theme_mod('artist_portfolio_display_post_comment', true) != '' || get_theme_mod('artist_portfolio_display_post_time', true) != ''){ ?>
      <div class="metabox mb-3">
        <?php if( get_theme_mod( 'artist_portfolio_metafields_date',true) != '' || get_theme_mod( 'artist_portfolio_display_post_date',true) != '') { ?>
          <span class="entry-date me-3"><i class="<?php echo esc_attr(get_theme_mod('artist_portfolio_post_date_icon','far fa-calendar-alt')); ?> me-1"></i> <a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><?php echo esc_html( get_theme_mod('artist_portfolio_blog_post_meta_seperator') ); ?>
        <?php }?>
        <?php if( get_theme_mod( 'artist_portfolio_metafields_author',true) != '' || get_theme_mod( 'artist_portfolio_display_post_author',true) != '') { ?>
          <span class="entry-author me-3"><i class="<?php echo esc_attr(get_theme_mod('artist_portfolio_post_author_icon','fas fa-user')); ?> me-1"></i> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></span><?php echo esc_html( get_theme_mod('artist_portfolio_blog_post_meta_seperator') ); ?>
        <?php }?>
        <?php if( get_theme_mod( 'artist_portfolio_metafields_comment',true) != '' || get_theme_mod( 'artist_portfolio_display_post_comment',true) != '') { ?>
          <span class="entry-comments me-3"><i class="<?php echo esc_attr(get_theme_mod('artist_portfolio_post_comment_icon','fas fa-comments')); ?> me-1"></i> <?php comments_number( __('0 Comment', 'artist-portfolio'), __('0 Comments', 'artist-portfolio'), __('% Comments', 'artist-portfolio') ); ?></span>
        <?php }?>
        <?php if( get_theme_mod( 'artist_portfolio_metafields_time',false) != '' || get_theme_mod( 'artist_portfolio_display_post_time',false) != '') { ?>
          <span class="entry-time me-3"><i class="<?php echo esc_attr(get_theme_mod('artist_portfolio_post_time_icon','fas fa-clock')); ?> me-1"></i> <?php echo esc_html( get_the_time() ); ?></span>
        <?php }?>
      </div>
    <?php }?>
    <?php $artist_portfolio_postimg_lay = get_theme_mod( 'artist_portfolio_post_featured_image','Image');
    if($artist_portfolio_postimg_lay == 'Image'){ ?>
      <div class="box-image">
        <?php the_post_thumbnail(); ?>
      </div>
    <?php }
    if($artist_portfolio_postimg_lay == 'Color'){ ?>
      <div class="post-color text-center"></div>
    <?php }?>
    <div class="new-text mt-3">
      <?php $artist_portfolio_theme_lay = get_theme_mod( 'artist_portfolio_content_settings','Excerpt');
      if($artist_portfolio_theme_lay == 'Content'){ ?>
        <?php the_content(); ?>
      <?php }
      if($artist_portfolio_theme_lay == 'Excerpt'){ ?>
        <?php if(get_the_excerpt()) { ?>
          <?php $artist_portfolio_excerpt = get_the_excerpt(); echo esc_html( artist_portfolio_string_limit_words( $artist_portfolio_excerpt, esc_attr(get_theme_mod('artist_portfolio_post_excerpt_number','30')))); ?> <?php echo esc_html( get_theme_mod('artist_portfolio_post_discription_suffix','[...]') ); ?>
        <?php }?>
      <?php }?>
    </div>
    <?php if( get_theme_mod('artist_portfolio_button_text','View More') != ''){ ?>
      <div class="postbtn text-center mt-4">
        <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('artist_portfolio_button_text','View More'));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('artist_portfolio_button_text','View More'));?></span></a>
      </div>
    <?php }?>
  </div>
</article>