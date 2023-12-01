<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Designer Artist
 */

if ( ! function_exists( 'designer_artist_the_attached_image' ) ) :
/**
 * Prints the attached image with a link to the next attached image.
 */
function designer_artist_the_attached_image() {
	$post                = get_post();
	$attachment_size     = apply_filters( 'designer_artist_attachment_size', array( 1200, 1200 ) );
	$next_attachment_url = wp_get_attachment_url();
	$attachment_ids 	 = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    =>  1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

	wp_reset_postdata();

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}

	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category
 */
function designer_artist_categorized_blog() {
	if ( false === ( $designer_artist_all_the_cool_cats = get_transient( 'designer_artist_all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$designer_artist_all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$designer_artist_all_the_cool_cats = count( $designer_artist_all_the_cool_cats );

		set_transient( 'designer_artist_all_the_cool_cats', $designer_artist_all_the_cool_cats );
	}

	if ( '1' != $designer_artist_all_the_cool_cats ) {
		// This blog has more than 1 category so designer_artist_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so designer_artist_categorized_blog should return false
		return false;
	}
}

if ( ! function_exists( 'designer_artist_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since designer-artist
 */
function designer_artist_the_custom_logo() {	
	the_custom_logo();
}
endif;

/**
 * Flush out the transients used in designer_artist_categorized_blog
 */
function designer_artist_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'designer_artist_all_the_cool_cats' );
}
add_action( 'edit_category', 'designer_artist_category_transient_flusher' );
add_action( 'save_post',     'designer_artist_category_transient_flusher' );

add_theme_support( 'admin-bar', array( 'callback' => 'designer_artist_my_admin_bar_css') );
function designer_artist_my_admin_bar_css(){
?>
<style type="text/css" media="screen">	
	html body { margin-top: 0px !important; }
</style>
<?php
}


/*-- Custom metafield --*/
function designer_artist_custom_event_details() {
  	add_meta_box( 'bn_meta', __( 'Designer Artist Meta Feilds', 'designer-artist' ), 'designer_artist_meta_event_details_callback', 'post', 'normal', 'high' );
}
if (is_admin()){
  	add_action('admin_menu', 'designer_artist_custom_event_details');
}

function designer_artist_meta_event_details_callback( $post ) {
  	wp_nonce_field( basename( __FILE__ ), 'designer_artist_event_details_meta' );
  	$bn_stored_meta = get_post_meta( $post->ID );
  	$designer_artist_date = get_post_meta( $post->ID, 'designer_artist_date', true );
  	$designer_artist_time = get_post_meta( $post->ID, 'designer_artist_time', true );
  	$designer_artist_location = get_post_meta( $post->ID, 'designer_artist_location', true );
  	?>
  	<div id="custom_meta_feilds">
	    <table id="list">
	      	<tbody id="the-list" data-wp-lists="list:meta">
		        <tr id="meta-8">
		          	<td class="left">
		            	<?php esc_html_e( 'Event Date', 'designer-artist' )?>
		          	</td>
		          	<td class="left">
		            	<input type="text" name="designer_artist_date" id="designer_artist_date" value="<?php echo esc_attr($designer_artist_date); ?>" />
		          	</td>
		        </tr>
		        <tr id="meta-8">
		          	<td class="left">
		            	<?php esc_html_e( 'Event Time', 'designer-artist' )?>
		          	</td>
		          	<td class="left">
		            	<input type="text" name="designer_artist_time" id="designer_artist_time" value="<?php echo esc_attr($designer_artist_time); ?>" />
		          	</td>
		        </tr>
		        <tr id="meta-8">
		          	<td class="left">
		            	<?php esc_html_e( 'Event Location', 'designer-artist' )?>
		          	</td>
		          	<td class="left">
		            	<input type="text" name="designer_artist_location" id="designer_artist_location" value="<?php echo esc_attr($designer_artist_location); ?>" />
		          	</td>
		        </tr>
	      	</tbody>
	    </table>
  	</div>
  	<?php
}

function designer_artist_save( $post_id ) {
  	if (!isset($_POST['designer_artist_event_details_meta']) || !wp_verify_nonce( strip_tags( wp_unslash( $_POST['designer_artist_event_details_meta']) ), basename(__FILE__))) {
      	return;
  	}
  	if (!current_user_can('edit_post', $post_id)) {
   		return;
  	}
  	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    	return;
  	}
  	if( isset( $_POST[ 'designer_artist_date' ] ) ) {
    	update_post_meta( $post_id, 'designer_artist_date', strip_tags( wp_unslash( $_POST[ 'designer_artist_date' ]) ) );
  	}
  	if( isset( $_POST[ 'designer_artist_time' ] ) ) {
    	update_post_meta( $post_id, 'designer_artist_time', strip_tags( wp_unslash( $_POST[ 'designer_artist_time' ]) ) );
  	}
  	if( isset( $_POST[ 'designer_artist_location' ] ) ) {
    	update_post_meta( $post_id, 'designer_artist_location', strip_tags( wp_unslash( $_POST[ 'designer_artist_location' ]) ) );
  	}
}
add_action( 'save_post', 'designer_artist_save' );