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
<div class="col-lg-4 col-md-4">
    <article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
        <div class="blog-sec p-3 mb-4 text-center">
            <h2><a href="<?php echo esc_url(get_permalink() ); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
            <hr class="post-hr mx-auto mb-2">
            <?php if(get_theme_mod('blogger_hub_metafields_date',true)==1){ ?>
                <div class="post-info py-2">
                    <i class="<?php echo esc_attr(get_theme_mod('blogger_hub_postdate_icon',"fa fa-calendar pe-2" )); ?>"></i><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><span class="entry-date"><?php echo esc_html( get_the_date() ); ?></span><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a>
                </div>
            <?php }?>
            <div class="mainimage">
                <?php 
                if(has_post_thumbnail() && get_theme_mod('blogger_hub_featured_image',true) == true) { 
                    the_post_thumbnail(); 
                }
                ?>
            </div>
            <div class="post-info py-2">
                <?php if(get_theme_mod('blogger_hub_metafields_author',true)==1){ ?>
                    <i class="<?php echo esc_attr(get_theme_mod('blogger_hub_postauthor_icon',"fa fa-user pe-2" )); ?>"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><span class="entry-author me-3"> <?php the_author(); ?></span><span class="screen-reader-text"><?php the_author(); ?></span></a>
                <?php }?>
                <?php if(get_theme_mod('blogger_hub_metafields_comment',true)==1){ ?>
                    <i class="<?php echo esc_attr(get_theme_mod('blogger_hub_posttime_icon',"fa fa-clock pe-2" )); ?>"></i><span class="entry-comments me-3"> <?php comments_number( __('0 Comments','blogger-hub'), __('0 Comments','blogger-hub'), __('% Comments','blogger-hub') ); ?></span> 
                <?php }?>
            </div>
            <?php if(get_the_excerpt()) { ?>
                <div class="entry-content"><p class="m-0"><?php $blogger_hub_excerpt = get_the_excerpt(); echo esc_html( blogger_hub_string_limit_words( $blogger_hub_excerpt, esc_attr(get_theme_mod('blogger_hub_post_excerpt_number','20')))); ?> <?php echo esc_html( get_theme_mod('blogger_hub_button_excerpt_suffix','...') ); ?></p></div>
            <?php }?>
            <?php if ( get_theme_mod('blogger_hub_blog_button_text','READ MORE') != '' ) {?>
                <div class="blogbtn my-3">
                    <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small hvr-sweep-to-right"><?php echo esc_html( get_theme_mod('blogger_hub_blog_button_text',__('READ MORE', 'blogger-hub')) ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('blogger_hub_blog_button_text',__('READ MORE', 'blogger-hub')) ); ?></span></a>
                </div>
            <?php }?>
            <?php if( get_theme_mod( 'blogger_hub_metafields_tags') != '' || get_theme_mod( 'blogger_hub_metafields_share_link') != '') { ?>
                <div class="row">
                    <div class="col-lg-5 col-md-12">
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
                    <div class="col-lg-7 col-md-12">
                        <?php if(get_theme_mod('blogger_hub_metafields_share_link',true)==1){ ?>
                            <div class="att_socialbox text-md-end text-center">
                                <i class="fas fa-share-alt"></i> <span><?php echo esc_html_e('Share :','blogger-hub'); ?></span>
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" class="m-1" target="_blank"><i class="fab fa-facebook-f" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Facebook', 'blogger-hub' ); ?></span></a>
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>" class="m-1" target="_blank"><i class="fab fa-linkedin-in" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Linkedin', 'blogger-hub' ); ?></span></a>
                                <a href="https://twitter.com/share?url=<?php  the_permalink(); ?>" class="m-1" target="_blank"><i class="fab fa-twitter" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Twitter', 'blogger-hub' ); ?></span></a>
                                <a href="http://www.instagram.com/submit?url=<?php the_permalink(); ?>" class="m-1" target="_blank"><i class="fab fa-instagram"></i><span class="screen-reader-text"><?php esc_html_e( 'Instagram', 'blogger-hub' ); ?></span></a>
                            </div>
                        <?php }?>
                    </div>
                </div>
            <?php }?>
        </div>
    </article>
</div>