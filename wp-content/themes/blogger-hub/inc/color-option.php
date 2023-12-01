<?php
	
	$blogger_hub_first_theme_color = get_theme_mod('blogger_hub_first_theme_color');

	$blogger_hub_second_theme_color = get_theme_mod('blogger_hub_second_theme_color');

	$blogger_hub_custom_css = '';

	if($blogger_hub_first_theme_color != false){
		$blogger_hub_custom_css .='input[type="submit"], a.button, #footer input[type="submit"], #comments input[type="submit"].submit, #comments a.comment-reply-link:hover, #sidebar input[type="submit"], #footer input[type="submit"], span.page-number,span.page-links-title, .nav-menu ul ul a:hover, h1.page-title, h1.search-title, #category_post h1, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, nav.woocommerce-MyAccount-navigation ul li , .blogbtn a, .inner, .footerinner .tagcloud a, .bradcrumbs a, #sidebar h3, #sidebar .tagcloud a:hover, .pagination .current, span.meta-nav, #comments a.comment-reply-link, .woocommerce span.onsale {';
			$blogger_hub_custom_css .='background-color: '.esc_attr($blogger_hub_first_theme_color).';';
		$blogger_hub_custom_css .='}';
	}
	if($blogger_hub_first_theme_color != false){
		$blogger_hub_custom_css .=' a, .nav-menu ul ul a, .nav-menu li a:hover, .social-links i:hover, span.post-title, .logo h1 a, .logo p.site-title a, .logo p, .nav-menu ul li a:active, .nav-menu ul li a:hover{';
			$blogger_hub_custom_css .='color: '.esc_attr($blogger_hub_first_theme_color).';';
		$blogger_hub_custom_css .='}';
	}
	if($blogger_hub_first_theme_color != false){
		$blogger_hub_custom_css .='  #header .nav ul li:hover > ul{';
			$blogger_hub_custom_css .='border-color: '.esc_attr($blogger_hub_first_theme_color).';';
		$blogger_hub_custom_css .='}';
	}
	if($blogger_hub_first_theme_color != false){
		$blogger_hub_custom_css .=' #sidebar h3:after, #category_post h1:after {';
			$blogger_hub_custom_css .='border-top-color: '.esc_attr($blogger_hub_first_theme_color).';';
		$blogger_hub_custom_css .='}';
	}


	if($blogger_hub_second_theme_color != false){
		$blogger_hub_custom_css .=' .nav-menu ul ul a, body{';
			$blogger_hub_custom_css .='background-color: '.esc_attr($blogger_hub_second_theme_color).';';
		$blogger_hub_custom_css .='}';
	}
	if($blogger_hub_second_theme_color != false){
		$blogger_hub_custom_css .='
		@media screen and (max-width:1000px){
			.nav-menu .current_page_item > a, .nav-menu .current-menu-item > a, .nav-menu .current_page_ancestor > a, .nav-menu ul li a:hover{';
			$blogger_hub_custom_css .='color: '.esc_attr($blogger_hub_second_theme_color).';';
		$blogger_hub_custom_css .='} }';
	}
	if($blogger_hub_second_theme_color != false){
		$blogger_hub_custom_css .='.nav-menu ul ul{';
			$blogger_hub_custom_css .='border-color: '.esc_attr($blogger_hub_second_theme_color).';';
		$blogger_hub_custom_css .='}';
	}
	if($blogger_hub_second_theme_color != false){
		$blogger_hub_custom_css .='.nav-menu ul ul a:hover, .nav-menu ul li a:hover,  		.nav-menu li a:hover{';
			$blogger_hub_custom_css .='border-left-color: '.esc_attr($blogger_hub_second_theme_color).';';
		$blogger_hub_custom_css .='}';
	}

	// Layout Options
	$blogger_hub_theme_layout = get_theme_mod( 'blogger_hub_theme_layout_options','Default Theme');
    if($blogger_hub_theme_layout == 'Container Theme'){
		$blogger_hub_custom_css .='body{';
			$blogger_hub_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$blogger_hub_custom_css .='}';
	}else if($blogger_hub_theme_layout == 'Box Container Theme'){
		$blogger_hub_custom_css .='body{';
			$blogger_hub_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$blogger_hub_custom_css .='}';
		$blogger_hub_custom_css .='.search-box label{';
			$blogger_hub_custom_css .=' width: 72%; ';
		$blogger_hub_custom_css .='}';
	}

	/*--------- , .preloaderader Color Option -------*/
	$blogger_hub_preloader_color = get_theme_mod('blogger_hub_preloader_color');

	if($blogger_hub_preloader_color != false){
		$blogger_hub_custom_css .=' .tg-loader{';
			$blogger_hub_custom_css .='border-color: '.esc_attr($blogger_hub_preloader_color).';';
		$blogger_hub_custom_css .='} ';
		$blogger_hub_custom_css .=' .tg-loader-inner, .preloader .preloader-container .animated-preloader, .preloader .preloader-container .animated-preloader:before{';
			$blogger_hub_custom_css .='background-color: '.esc_attr($blogger_hub_preloader_color).';';
		$blogger_hub_custom_css .='} ';
	}

	$blogger_hub_preloader_bg_color = get_theme_mod('blogger_hub_preloader_bg_color');

	if($blogger_hub_preloader_bg_color != false){
		$blogger_hub_custom_css .=' #overlayer, .preloader{';
			$blogger_hub_custom_css .='background-color: '.esc_attr($blogger_hub_preloader_bg_color).';';
		$blogger_hub_custom_css .='} ';
	}

	/*------------ Button Settings option-----------------*/

	$blogger_hub_top_button_padding = get_theme_mod('blogger_hub_top_button_padding');
	$blogger_hub_bottom_button_padding = get_theme_mod('blogger_hub_bottom_button_padding');
	$blogger_hub_left_button_padding = get_theme_mod('blogger_hub_left_button_padding');
	$blogger_hub_right_button_padding = get_theme_mod('blogger_hub_right_button_padding');
	if($blogger_hub_top_button_padding != false || $blogger_hub_bottom_button_padding != false || $blogger_hub_left_button_padding != false || $blogger_hub_right_button_padding != false){
		$blogger_hub_custom_css .='.blogbtn a, #comments input[type="submit"].submit{';
			$blogger_hub_custom_css .='padding-top: '.esc_attr($blogger_hub_top_button_padding).'px; padding-bottom: '.esc_attr($blogger_hub_bottom_button_padding).'px; padding-left: '.esc_attr($blogger_hub_left_button_padding).'px; padding-right: '.esc_attr($blogger_hub_right_button_padding).'px; display:inline-block;';
		$blogger_hub_custom_css .='}';
	}

	$blogger_hub_button_border_radius = get_theme_mod('blogger_hub_button_border_radius',4);
	$blogger_hub_custom_css .='.blogbtn a, #comments input[type="submit"].submit, .hvr-sweep-to-right:before{';
		$blogger_hub_custom_css .='border-radius: '.esc_attr($blogger_hub_button_border_radius).'px;';
	$blogger_hub_custom_css .='}';

	/*----------- Copyright css -----*/
	$blogger_hub_copyright_top_padding = get_theme_mod('blogger_hub_top_copyright_padding');
	$blogger_hub_copyright_bottom_padding = get_theme_mod('blogger_hub_bottom_copyright_padding');
	if($blogger_hub_copyright_top_padding != false || $blogger_hub_copyright_bottom_padding != false){
		$blogger_hub_custom_css .='.inner{';
			$blogger_hub_custom_css .='padding-top: '.esc_attr($blogger_hub_copyright_top_padding).'px; padding-bottom: '.esc_attr($blogger_hub_copyright_bottom_padding).'px; ';
		$blogger_hub_custom_css .='}';
	} 

	$blogger_hub_copyright_alignment = get_theme_mod('blogger_hub_copyright_alignment', 'center');
	if($blogger_hub_copyright_alignment == 'center' ){
		$blogger_hub_custom_css .='#footer .copyright p{';
			$blogger_hub_custom_css .='text-align: '. $blogger_hub_copyright_alignment .';';
		$blogger_hub_custom_css .='}';
	}elseif($blogger_hub_copyright_alignment == 'left' ){
		$blogger_hub_custom_css .='#footer .copyright p{';
			$blogger_hub_custom_css .=' text-align: '. $blogger_hub_copyright_alignment .';';
		$blogger_hub_custom_css .='}';
	}elseif($blogger_hub_copyright_alignment == 'right' ){
		$blogger_hub_custom_css .='#footer .copyright p{';
			$blogger_hub_custom_css .='text-align: '. $blogger_hub_copyright_alignment .';';
		$blogger_hub_custom_css .='}';
	}

	$blogger_hub_copyright_font_size = get_theme_mod('blogger_hub_copyright_font_size');
	$blogger_hub_custom_css .='#footer .copyright p{';
		$blogger_hub_custom_css .='font-size: '.esc_attr($blogger_hub_copyright_font_size).'px;';
	$blogger_hub_custom_css .='}';

	/*------ Woocommerce ----*/
	$blogger_hub_product_border = get_theme_mod('blogger_hub_product_border',true);

	if($blogger_hub_product_border == false){
		$blogger_hub_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$blogger_hub_custom_css .='border: 0;';
		$blogger_hub_custom_css .='}';
	}

	$blogger_hub_product_top = get_theme_mod('blogger_hub_product_top_padding', 10);
	$blogger_hub_product_bottom = get_theme_mod('blogger_hub_product_bottom_padding', 10);
	$blogger_hub_product_left = get_theme_mod('blogger_hub_product_left_padding', 10);
	$blogger_hub_product_right = get_theme_mod('blogger_hub_product_right_padding', 10);

	$blogger_hub_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$blogger_hub_custom_css .='padding-top: '.esc_attr($blogger_hub_product_top).'px; padding-bottom: '.esc_attr($blogger_hub_product_bottom).'px; padding-left: '.esc_attr($blogger_hub_product_left).'px; padding-right: '.esc_attr($blogger_hub_product_right).'px;';
	$blogger_hub_custom_css .='}';

	$blogger_hub_product_border_radius = get_theme_mod('blogger_hub_product_border_radius');

	$blogger_hub_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$blogger_hub_custom_css .='border-radius: '.esc_attr($blogger_hub_product_border_radius).'px;';
	$blogger_hub_custom_css .='}';
	

	/*----- WooCommerce button css --------*/
	$blogger_hub_product_button_top = get_theme_mod('blogger_hub_product_button_top_padding',10);
	$blogger_hub_product_button_bottom = get_theme_mod('blogger_hub_product_button_bottom_padding',10);
	$blogger_hub_product_button_left = get_theme_mod('blogger_hub_product_button_left_padding',15);
	$blogger_hub_product_button_right = get_theme_mod('blogger_hub_product_button_right_padding',15);

	$blogger_hub_custom_css .='.woocommerce ul.products li.product .button, .woocommerce div.product form.cart .button, a.button.wc-forward, .woocommerce .cart .button, .woocommerce .cart input.button, .woocommerce #payment #place_order, .woocommerce-page #payment #place_order, button.woocommerce-button.button.woocommerce-form-login__submit, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled]{';
		$blogger_hub_custom_css .='padding-top: '.esc_attr($blogger_hub_product_button_top).'px; padding-bottom: '.esc_attr($blogger_hub_product_button_bottom).'px; padding-left: '.esc_attr($blogger_hub_product_button_left).'px; padding-right: '.esc_attr($blogger_hub_product_button_right).'px;';
	$blogger_hub_custom_css .='}';

	$blogger_hub_product_button_border_radius = get_theme_mod('blogger_hub_product_button_border_radius');

	$blogger_hub_custom_css .='.woocommerce ul.products li.product .button, .woocommerce div.product form.cart .button, a.button.wc-forward, .woocommerce .cart .button, .woocommerce .cart input.button, a.checkout-button.button.alt.wc-forward, .woocommerce #payment #place_order, .woocommerce-page #payment #place_order, button.woocommerce-button.button.woocommerce-form-login__submit{';
		$blogger_hub_custom_css .='border-radius: '.esc_attr($blogger_hub_product_button_border_radius).'px;';
	$blogger_hub_custom_css .='}';

	/*----- WooCommerce product sale css --------*/
	$blogger_hub_product_sale_top = get_theme_mod('blogger_hub_product_sale_top_padding');
	$blogger_hub_product_sale_bottom = get_theme_mod('blogger_hub_product_sale_bottom_padding');
	$blogger_hub_product_sale_left = get_theme_mod('blogger_hub_product_sale_left_padding');
	$blogger_hub_product_sale_right = get_theme_mod('blogger_hub_product_sale_right_padding');

	$blogger_hub_custom_css .='.woocommerce span.onsale {';
		$blogger_hub_custom_css .='padding-top: '.esc_attr($blogger_hub_product_sale_top).'px; padding-bottom: '.esc_attr($blogger_hub_product_sale_bottom).'px; padding-left: '.esc_attr($blogger_hub_product_sale_left).'px; padding-right: '.esc_attr($blogger_hub_product_sale_right).'px;';
	$blogger_hub_custom_css .='}';

	$blogger_hub_product_sale_border_radius = get_theme_mod('blogger_hub_product_sale_border_radius',50);
	
	$blogger_hub_custom_css .='.woocommerce span.onsale {';
		$blogger_hub_custom_css .='border-radius: '.esc_attr($blogger_hub_product_sale_border_radius).'px;';
	$blogger_hub_custom_css .='}';

	$blogger_hub_menu_case = get_theme_mod('blogger_hub_product_sale_position', 'Right');
	if($blogger_hub_menu_case == 'Right' ){
		$blogger_hub_custom_css .='.woocommerce ul.products li.product .onsale{';
			$blogger_hub_custom_css .=' left:auto; right:0;';
		$blogger_hub_custom_css .='}';
	}elseif($blogger_hub_menu_case == 'Left' ){
		$blogger_hub_custom_css .='.woocommerce ul.products li.product .onsale{';
			$blogger_hub_custom_css .=' left:-10px; right:auto;';
		$blogger_hub_custom_css .='}';
	}

	$blogger_hub_product_sale_font_size = get_theme_mod('blogger_hub_product_sale_font_size',13);
	$blogger_hub_custom_css .='.woocommerce span.onsale {';
		$blogger_hub_custom_css .='font-size: '.esc_attr($blogger_hub_product_sale_font_size).'px;';
	$blogger_hub_custom_css .='}';

	/*---- Comment form ----*/
	$blogger_hub_comment_width = get_theme_mod('blogger_hub_comment_width', '100');
	$blogger_hub_custom_css .='#comments textarea{';
		$blogger_hub_custom_css .=' width:'.esc_attr($blogger_hub_comment_width).'%;';
	$blogger_hub_custom_css .='}';

	$blogger_hub_comment_submit_text = get_theme_mod('blogger_hub_comment_submit_text', 'Post Comment');
	if($blogger_hub_comment_submit_text == ''){
		$blogger_hub_custom_css .='#comments p.form-submit {';
			$blogger_hub_custom_css .='display: none;';
		$blogger_hub_custom_css .='}';
	}

	$blogger_hub_comment_title = get_theme_mod('blogger_hub_comment_title', 'Leave a Reply');
	if($blogger_hub_comment_title == ''){
		$blogger_hub_custom_css .='#comments h2#reply-title {';
			$blogger_hub_custom_css .='display: none;';
		$blogger_hub_custom_css .='}';
	}

	/*------ Footer background css -------*/
	$blogger_hub_footer_bg_color = get_theme_mod('blogger_hub_footer_bg_color');
	if($blogger_hub_footer_bg_color != false){
		$blogger_hub_custom_css .='#footer{';
			$blogger_hub_custom_css .='background-color: '.esc_attr($blogger_hub_footer_bg_color).';';
		$blogger_hub_custom_css .='}';
	}

	$blogger_hub_footer_bg_image = get_theme_mod('blogger_hub_footer_bg_image');
	if($blogger_hub_footer_bg_image != false){
		$blogger_hub_custom_css .='#footer{';
			$blogger_hub_custom_css .='background: url('.esc_attr($blogger_hub_footer_bg_image).');';
		$blogger_hub_custom_css .='}';
	}

	/*----- Featured image css -----*/
	$blogger_hub_feature_image_border_radius = get_theme_mod('blogger_hub_feature_image_border_radius');
	if($blogger_hub_feature_image_border_radius != false){
		$blogger_hub_custom_css .='.blog-sec img{';
			$blogger_hub_custom_css .='border-radius: '.esc_attr($blogger_hub_feature_image_border_radius).'px;';
		$blogger_hub_custom_css .='}';
	}

	$blogger_hub_feature_image_shadow = get_theme_mod('blogger_hub_feature_image_shadow');
	if($blogger_hub_feature_image_shadow != false){
		$blogger_hub_custom_css .='.blog-sec img{';
			$blogger_hub_custom_css .='box-shadow: '.esc_attr($blogger_hub_feature_image_shadow).'px '.esc_attr($blogger_hub_feature_image_shadow).'px '.esc_attr($blogger_hub_feature_image_shadow).'px #aaa;';
		$blogger_hub_custom_css .='}';
	}

	/*------ Sticky header padding ------------*/
	$blogger_hub_top_sticky_header_padding = get_theme_mod('blogger_hub_top_sticky_header_padding');
	$blogger_hub_bottom_sticky_header_padding = get_theme_mod('blogger_hub_bottom_sticky_header_padding');
	$blogger_hub_custom_css .=' .fixed-header{';
		$blogger_hub_custom_css .=' padding-top: '.esc_attr($blogger_hub_top_sticky_header_padding).'px; padding-bottom: '.esc_attr($blogger_hub_bottom_sticky_header_padding).'px';
	$blogger_hub_custom_css .='}';

	// featured image dimention
	$blogger_hub_blog_image_dimension = get_theme_mod('blogger_hub_blog_image_dimension', 'default');
	$blogger_hub_feature_image_custom_width = get_theme_mod('blogger_hub_feature_image_custom_width',250);
	$blogger_hub_feature_image_custom_height = get_theme_mod('blogger_hub_feature_image_custom_height',250);
	if($blogger_hub_blog_image_dimension == 'custom'){
		$blogger_hub_custom_css .='.blog-sec img{';
			$blogger_hub_custom_css .='width: '.esc_attr($blogger_hub_feature_image_custom_width).'px; height: '.esc_attr($blogger_hub_feature_image_custom_height).'px;';
		$blogger_hub_custom_css .='}';
	}

	/*------ Related products ---------*/
	$blogger_hub_related_products = get_theme_mod('blogger_hub_single_related_products',true);
	if($blogger_hub_related_products == false){
		$blogger_hub_custom_css .=' .related.products{';
			$blogger_hub_custom_css .='display: none;';
		$blogger_hub_custom_css .='}';
	}

	/*-------- Menu Font Size --------*/
	$blogger_hub_menu_font_size = get_theme_mod('blogger_hub_menu_font_size',15);
	if($blogger_hub_menu_font_size != false){
		$blogger_hub_custom_css .='.nav-menu li a{';
			$blogger_hub_custom_css .='font-size: '.esc_attr($blogger_hub_menu_font_size).'px;';
		$blogger_hub_custom_css .='}';
	}

	$blogger_hub_menu_font_weight = get_theme_mod('blogger_hub_menu_font_weight');
	$blogger_hub_custom_css .='.nav-menu li a{';
		$blogger_hub_custom_css .='font-weight: '.esc_attr($blogger_hub_menu_font_weight).';';
	$blogger_hub_custom_css .='}';

	$blogger_hub_menu_case = get_theme_mod('blogger_hub_menu_case', 'capitalize');
	if($blogger_hub_menu_case == 'uppercase' ){
		$blogger_hub_custom_css .='.nav-menu li a{';
			$blogger_hub_custom_css .=' text-transform: uppercase;';
		$blogger_hub_custom_css .='}';
	}elseif($blogger_hub_menu_case == 'capitalize' ){
		$blogger_hub_custom_css .='.nav-menu li a{';
			$blogger_hub_custom_css .=' text-transform: capitalize;';
		$blogger_hub_custom_css .='}';
	}

	// Social Icons Font Size
	$blogger_hub_social_icons_font_size = get_theme_mod('blogger_hub_social_icons_font_size', '13');
	$blogger_hub_custom_css .='.social-links i{';
		$blogger_hub_custom_css .='font-size: '.esc_attr($blogger_hub_social_icons_font_size).'px;';
	$blogger_hub_custom_css .='}';

	// Featured image header
	$header_image_url = blogger_hub_banner_image( $image_url = '' );
	$blogger_hub_custom_css .='#page-site-header{';
		$blogger_hub_custom_css .='background-image: url('. esc_url( $header_image_url ).'); background-size: cover;';
	$blogger_hub_custom_css .='}';

	$blogger_hub_post_featured_image = get_theme_mod('blogger_hub_post_featured_image', 'in-content');
	if($blogger_hub_post_featured_image == 'banner' ){
		$blogger_hub_custom_css .='.single #wrapper h1, .page #wrapper h1, .page #wrapper img, .page-template-custom-front-page #page-site-header{';
			$blogger_hub_custom_css .=' display: none;';
		$blogger_hub_custom_css .='}';
	}

	// Woocommerce Shop page pagination
	$blogger_hub_shop_page_navigation = get_theme_mod('blogger_hub_shop_page_navigation',true);
	if ($blogger_hub_shop_page_navigation == false) {
		$blogger_hub_custom_css .='.woocommerce nav.woocommerce-pagination{';
			$blogger_hub_custom_css .='display: none;';
		$blogger_hub_custom_css .='}';
	}

	/*-------- Blog Post Alignment ------*/
	$blogger_hub_post_alignment = get_theme_mod('blogger_hub_blog_post_alignment', 'center');
	if($blogger_hub_post_alignment == 'left' ){
		$blogger_hub_custom_css .='.blog-sec, .blog-sec h2, .post-info, .blogbtn{';
			$blogger_hub_custom_css .=' text-align: '. $blogger_hub_post_alignment .'!important;';
		$blogger_hub_custom_css .='}';
		$blogger_hub_custom_css .='.post-hr{';
			$blogger_hub_custom_css .='float:left;';
		$blogger_hub_custom_css .='}';
		$blogger_hub_custom_css .='.post-info,mainimage{';
			$blogger_hub_custom_css .='margin-top:10px;';
		$blogger_hub_custom_css .='}';
	}elseif($blogger_hub_post_alignment == 'right' ){
		$blogger_hub_custom_css .='.blog-sec, .blog-sec h2, .post-info, .blogbtn{';
			$blogger_hub_custom_css .='text-align: '. $blogger_hub_post_alignment .'!important;';
		$blogger_hub_custom_css .='}';
		$blogger_hub_custom_css .='.post-hr{';
			$blogger_hub_custom_css .='float:right;';
		$blogger_hub_custom_css .='}';
		$blogger_hub_custom_css .='.post-info,mainimage{';
			$blogger_hub_custom_css .='margin-top:10px;';
		$blogger_hub_custom_css .='}';
	}

	/*----- Blog Post display type css ------*/
	$blogger_hub_blog_post_display_type = get_theme_mod('blogger_hub_blog_post_display_type', 'blocks');
	if($blogger_hub_blog_post_display_type == 'without blocks' ){
		$blogger_hub_custom_css .='.blog .blog-sec{';
			$blogger_hub_custom_css .='border: 0; background: transparent;';
		$blogger_hub_custom_css .='}';
	}

	// Metabox Seperator
	$blogger_hub_metabox_seperator = get_theme_mod('blogger_hub_metabox_seperator');
	if($blogger_hub_metabox_seperator != '' ){
		$blogger_hub_custom_css .='.post-info span:after{';
			$blogger_hub_custom_css .=' content: "'.esc_attr($blogger_hub_metabox_seperator).'"; padding-left:10px;';
		$blogger_hub_custom_css .='}';
		$blogger_hub_custom_css .='.post-info span:last-child:after, span.entry-date:after{';
			$blogger_hub_custom_css .=' content: none;';
		$blogger_hub_custom_css .='}';
	}

	// Site title Font Size
	$blogger_hub_site_title_font_size = get_theme_mod('blogger_hub_site_title_font_size', '50');
	$blogger_hub_custom_css .='.logo h1 a, .logo p.site-title a{';
		$blogger_hub_custom_css .='font-size: '.esc_attr($blogger_hub_site_title_font_size).'px;';
	$blogger_hub_custom_css .='}';

	// Site tagline Font Size
	$blogger_hub_site_tagline_font_size = get_theme_mod('blogger_hub_site_tagline_font_size', '15');
	$blogger_hub_custom_css .='.logo p.site-description{';
		$blogger_hub_custom_css .='font-size: '.esc_attr($blogger_hub_site_tagline_font_size).'px;';
	$blogger_hub_custom_css .='}';

	// responsive settings

	// scroll to top
	$blogger_hub_scroll = get_theme_mod( 'blogger_hub_backtotop_responsive',true);
	if (get_theme_mod('blogger_hub_backtotop_responsive',true) == true && get_theme_mod('blogger_hub_hide_scroll',true) == false) {
    	$blogger_hub_custom_css .='.show-back-to-top{';
			$blogger_hub_custom_css .='visibility: hidden !important;';
		$blogger_hub_custom_css .='} ';
	}
    if($blogger_hub_scroll == true){
    	$blogger_hub_custom_css .='@media screen and (max-width:575px) {';
		$blogger_hub_custom_css .='.show-back-to-top{';
			$blogger_hub_custom_css .='visibility: visible !important;';
		$blogger_hub_custom_css .='} }';
	}else if($blogger_hub_scroll == false){
		$blogger_hub_custom_css .='@media screen and (max-width:575px) {';
		$blogger_hub_custom_css .='.show-back-to-top{';
			$blogger_hub_custom_css .='visibility: hidden !important;';
		$blogger_hub_custom_css .='} }';
	}

	$blogger_hub_resp_sidebar = get_theme_mod( 'blogger_hub_sidebar_hide_show',true);
    if($blogger_hub_resp_sidebar == true){
    	$blogger_hub_custom_css .='@media screen and (max-width:575px) {';
		$blogger_hub_custom_css .='#sidebar{';
			$blogger_hub_custom_css .='display:block;';
		$blogger_hub_custom_css .='} }';
	}else if($blogger_hub_resp_sidebar == false){
		$blogger_hub_custom_css .='@media screen and (max-width:575px) {';
		$blogger_hub_custom_css .='#sidebar{';
			$blogger_hub_custom_css .='display:none;';
		$blogger_hub_custom_css .='} }';
	}

	//Toggle Button Color Option
	$blogger_hub_toggle_button_bg_color_settings = get_theme_mod('blogger_hub_toggle_button_bg_color_settings');
	$blogger_hub_custom_css .='.toggle-menu{';
	$blogger_hub_custom_css .='background-color: '.esc_attr($blogger_hub_toggle_button_bg_color_settings).';';
	$blogger_hub_custom_css .='} ';

	if (get_theme_mod('blogger_hub_preloader_responsive',false) == true && get_theme_mod('blogger_hub_preloader',false) == false) {
		$blogger_hub_custom_css .='@media screen and (min-width: 575px){
			.preloader, #overlayer, .tg-loader{';
			$blogger_hub_custom_css .=' visibility: hidden;';
		$blogger_hub_custom_css .='} }';
	}
	if (get_theme_mod('blogger_hub_preloader_responsive',false) == false) {
		$blogger_hub_custom_css .='@media screen and (max-width: 575px){
			.preloader, #overlayer, .tg-loader{';
			$blogger_hub_custom_css .=' visibility: hidden;';
		$blogger_hub_custom_css .='} }';
	}

	if (get_theme_mod('blogger_hub_sticky_header_responsive') == false) {
		$blogger_hub_custom_css .='@media screen and (max-width: 575px){
			.sticky-menu{';
			$blogger_hub_custom_css .=' position: static;';
		$blogger_hub_custom_css .='} }';
	}

	/*------ Footer background css -------*/
	$blogger_hub_copyright_bg_color = get_theme_mod('blogger_hub_copyright_bg_color');
	if($blogger_hub_copyright_bg_color != false){
		$blogger_hub_custom_css .='.inner{';
			$blogger_hub_custom_css .='background-color: '.esc_attr($blogger_hub_copyright_bg_color).';';
		$blogger_hub_custom_css .='}';
	}

	// site logo padding 
	$blogger_hub_logo_spacing = get_theme_mod('blogger_hub_logo_spacing', '');
	$blogger_hub_custom_css .='.logo{';
	$blogger_hub_custom_css .='padding: '.esc_attr($blogger_hub_logo_spacing).'px;';
	$blogger_hub_custom_css .='}';

	// site title color
	$blogger_hub_site_title_text_color = get_theme_mod('blogger_hub_site_title_text_color');
	$blogger_hub_custom_css .='.logo h1 a, .logo p.site-title a{';
		$blogger_hub_custom_css .='color: '.esc_attr($blogger_hub_site_title_text_color).' !important;';
	$blogger_hub_custom_css .='}';

	// site tagline color
	$blogger_hub_site_tagline_text_color = get_theme_mod('blogger_hub_site_tagline_text_color');
	$blogger_hub_custom_css .='.logo p.site-description{';
		$blogger_hub_custom_css .='color: '.esc_attr($blogger_hub_site_tagline_text_color).' !important;';
	$blogger_hub_custom_css .='}';

	// menu padding
	$blogger_hub_menu_padding = get_theme_mod('blogger_hub_menu_padding',22);
	$blogger_hub_custom_css .='.nav-menu ul li a, .sf-arrows ul .sf-with-ul, .sf-arrows .sf-with-ul{';
		$blogger_hub_custom_css .='padding: '.esc_attr($blogger_hub_menu_padding).'px;';
	$blogger_hub_custom_css .='}';

	// menu color
	$blogger_hub_menu_color = get_theme_mod('blogger_hub_menu_color');
	$blogger_hub_custom_css .='.nav-menu a, .nav-menu .current-menu-item > a, .nav-menu .current_page_ancestor > a, .nav ul li a{';
			$blogger_hub_custom_css .='color: '.esc_attr($blogger_hub_menu_color).' !important;';
	$blogger_hub_custom_css .='}';

	// menu hover color
	$blogger_hub_menu_hover_color = get_theme_mod('blogger_hub_menu_hover_color');
	$blogger_hub_custom_css .='.nav-menu a:hover, .nav-menu ul li a:hover, .nav-menu ul.sub-menu a:hover, .nav-menu ul.sub-menu li a:hover, .nav ul li a:hover{';
			$blogger_hub_custom_css .='color: '.esc_attr($blogger_hub_menu_hover_color).' !important;';
	$blogger_hub_custom_css .='}';

	// Submenu color
	$blogger_hub_submenu_menu_color = get_theme_mod('blogger_hub_submenu_menu_color');
	$blogger_hub_custom_css .='.nav-menu ul.sub-menu a, .nav-menu ul.sub-menu li a{';
			$blogger_hub_custom_css .='color: '.esc_attr($blogger_hub_submenu_menu_color).' !important;';
	$blogger_hub_custom_css .='}';

	// site logo margin 
	$blogger_hub_logo_margin = get_theme_mod('blogger_hub_logo_margin', '');
	$blogger_hub_custom_css .='.logo{';
	$blogger_hub_custom_css .='margin: '.esc_attr($blogger_hub_logo_margin).'px;';
	$blogger_hub_custom_css .='}';

	// Single post image border radious
	$blogger_hub_single_post_img_border_radius = get_theme_mod('blogger_hub_single_post_img_border_radius', 0);
	$blogger_hub_custom_css .='.feature-box img{';
		$blogger_hub_custom_css .='border-radius: '.esc_attr($blogger_hub_single_post_img_border_radius).'px;';
	$blogger_hub_custom_css .='}';

	// Single post image box shadow
	$blogger_hub_single_post_img_box_shadow = get_theme_mod('blogger_hub_single_post_img_box_shadow',0);
	$blogger_hub_custom_css .='.feature-box img{';
		$blogger_hub_custom_css .='box-shadow: '.esc_attr($blogger_hub_single_post_img_box_shadow).'px '.esc_attr($blogger_hub_single_post_img_box_shadow).'px '.esc_attr($blogger_hub_single_post_img_box_shadow).'px #ccc;';
	$blogger_hub_custom_css .='}';