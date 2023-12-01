<?php

add_action( 'admin_menu', 'artist_portfolio_gettingstarted' );
function artist_portfolio_gettingstarted() {    	
	add_theme_page( esc_html__('About Theme', 'artist-portfolio'), esc_html__('About Theme', 'artist-portfolio'), 'edit_theme_options', 'artist-portfolio-guide-page', 'artist_portfolio_guide');   
}

function artist_portfolio_admin_theme_style() {
   wp_enqueue_style('artist-portfolio-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/dashboard/get_started_info.css');
}
add_action('admin_enqueue_scripts', 'artist_portfolio_admin_theme_style');

function artist_portfolio_notice(){
    global $pagenow;
    if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {?>
    <div class="notice notice-success is-dismissible getting_started">
		<div class="notice-content">
			<h2><?php esc_html_e( 'Thanks for installing Artist Portfolio, you rock!', 'artist-portfolio' ) ?> </h2>
			<p><?php esc_html_e( 'Take benefit of a variety of features, functionalities, elements, and an exclusive set of customization options to build your own professional food website. Please Click on the link below to know the theme setup information.', 'artist-portfolio' ) ?></p>
			<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=artist-portfolio-guide-page' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Getting Started', 'artist-portfolio' ); ?></a></p>
		</div>
	</div>
	<?php }
}
add_action('admin_notices', 'artist_portfolio_notice');

/**
 * Theme Info Page
 */
function artist_portfolio_guide() {

	// Theme info
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'artist-portfolio' ); ?>

	<div class="wrap getting-started">
		<div class="getting-started__header">
			<div class="row">
				<div class="col-md-5 intro">
					<div class="pad-box">
						<h2><?php esc_html_e( 'Welcome to Artist Portfolio', 'artist-portfolio' ); ?></h2>
						<p>Version: <?php echo esc_html($theme['Version']);?></p>
						<span class="intro__version"><?php esc_html_e( 'Congratulations! You are about to use the most easy to use and flexible WordPress theme.', 'artist-portfolio' ); ?>	
						</span>
						<div class="powered-by">
							<p><strong><?php esc_html_e( 'Theme created by Buy WP Templates', 'artist-portfolio' ); ?></strong></p>
							<p>
								<img class="logo" src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/theme-logo.png'); ?>"/>
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-7">
					<div class="pro-links">
				    	<a href="<?php echo esc_url( ARTIST_PORTFOLIO_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'artist-portfolio'); ?></a>
						<a href="<?php echo esc_url( ARTIST_PORTFOLIO_BUY_PRO ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'artist-portfolio'); ?></a>
						<a href="<?php echo esc_url( ARTIST_PORTFOLIO_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'artist-portfolio'); ?></a>
					</div>
					<div class="install-plugins">
						<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/responsive1.png'); ?>" alt="" />
					</div>
				</div>
			</div>
			<h2 class="tg-docs-section intruction-title" id="section-4"><?php esc_html_e( '1). Setup Artist Portfolio Theme', 'artist-portfolio' ); ?></h2>
			<div class="row">
				<div class="theme-instruction-block col-md-7">
					<div class="pad-box">
	                    <p><?php esc_html_e( 'Artist Portfolio is a beautiful free WordPress theme for artists, art lovers, art galleries, animations, graphic designers, photographers, tattoo artists, bodypaint artists, creative professionals, etc. Designed with secure and clean codes, this theme makes sure that you get the best online experience and deliver your visitors the web pages with faster page load time. Personalization options available with the theme make it easy for you to get the best suitable design and make changes to the favicon, color, fonts, and typography. You can upload a custom logo to make your website look exceedingly professional. For a splendid view of your website across several devices and screens, this theme comes with a retina-ready display and responsive layout. It is made mobile-friendly and cross-browser compatible as well so that mobile users can easily access it through any popular web browser. Call to Action Buttons (CTA) added to the design will make sure that your visitors are guided properly and this will also result in better conversions. SEO-optimized codes will work wonders for your website as people could easily spot you in the top search engine results. WPML and RTL compatibility of this theme makes it translation-ready and its Bootstrap framework makes it easy to work with.', 'artist-portfolio' ); ?><p><br>
						<ol>
							<li><?php esc_html_e( 'Start','artist-portfolio'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizing','artist-portfolio'); ?></a> <?php esc_html_e( 'your website.','artist-portfolio'); ?> </li>
							<li><?php esc_html_e( 'Artist Portfolio','artist-portfolio'); ?> <a target="_blank" href="<?php echo esc_url( ARTIST_PORTFOLIO_FREE_DOC ); ?>"><?php esc_html_e( 'Documentation','artist-portfolio'); ?></a> </li>
						</ol>
                    </div>
              	</div>
				<div class="col-md-5">
					<div class="pad-box">
              			<img class="logo" src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/screenshot.png'); ?>"/>
              		 </div> 
              	</div>
            </div>
			<div class="col-md-12 text-block">
					<h2 class="dashboard-install-title"><?php esc_html_e( '2.) Premium Theme Information.','artist-portfolio'); ?></h2>
					<div class="row">
						<div class="col-md-7">
							<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/responsive.png'); ?>" alt="">
							<div class="pad-box">
								<h3><?php esc_html_e( 'Pro Theme Description','artist-portfolio'); ?></h3>
	                    		<p class="pad-box-p"><?php esc_html_e( 'As an artist, your primary objective of getting a website is to stand out and this is exactly what you will get with Artist Portfolio WordPress Theme. When you start working with this theme, it will unfold many incredible options that you will find absolutely useful for your profile or portfolio as an artist. Although this theme has all the modern features and functionality, its highly optimized codes make it work impressively and efficiently across various devices and browsers without bloating or causing any delay. Besides all these things, you can easily configure its layout as per your needs as it brings you many customization options that don’t need you to write any kind of code.', 'artist-portfolio' ); ?><p>
	                    	</div>
						</div>
						<div class="col-md-5 install-plugin-right">
							<div class="pad-box">								
								<h3><?php esc_html_e( 'Pro Theme Features','artist-portfolio'); ?></h3>
								<div class="dashboard-install-benefit">
									<ul>
										<li><?php esc_html_e( 'Theme options using customizer API','artist-portfolio'); ?></li>
										<li><?php esc_html_e( 'Responsive design','artist-portfolio'); ?></li>
										<li><?php esc_html_e( 'Site Icon and Logo option','artist-portfolio'); ?></li>
										<li><?php esc_html_e( 'Header Images option','artist-portfolio'); ?></li>
										<li><?php esc_html_e( 'Favicon, Logo, title, and tagline customization','artist-portfolio'); ?></li>
										<li><?php esc_html_e( 'Advanced Color options and color pallets.','artist-portfolio'); ?></li>
										<li><?php esc_html_e( '100+ Font Family Options','artist-portfolio'); ?></li>
										<li><?php esc_html_e( 'Pagination option','artist-portfolio'); ?></li>
										<li><?php esc_html_e( 'Demo Importer','artist-portfolio'); ?></li>
										<li><?php esc_html_e( 'Enable-Disable options on All sections.','artist-portfolio'); ?></li>
										<li><?php esc_html_e( 'Main Slider','artist-portfolio'); ?></li>
										<li><?php esc_html_e( 'Woocommerce Compatible','artist-portfolio'); ?></li>
										<li><?php esc_html_e( 'Unlimited Slides','artist-portfolio'); ?></li>
										<li><?php esc_html_e( 'Section to show categories','artist-portfolio'); ?></li>
										<li><?php esc_html_e( 'Product Listing based on category','artist-portfolio'); ?></li>
										<li><?php esc_html_e( 'Top Categories Section','artist-portfolio'); ?></li>
										<li><?php esc_html_e( 'Best Seller Tab','artist-portfolio'); ?></li>
										<li><?php esc_html_e( 'Testimonial with custom post type','artist-portfolio'); ?></li>
										<li><?php esc_html_e( 'Promotional Banners','artist-portfolio'); ?></li>
										<li><?php esc_html_e( 'Partner Listing','artist-portfolio'); ?></li>
										<li><?php esc_html_e( 'Shortcodes for Testimonials','artist-portfolio'); ?></li>
										<li><?php esc_html_e( 'Newsletter with the help of contact form 7.','artist-portfolio'); ?></li>
										<li><?php esc_html_e( 'Well sanitized as per WordPress standards.','artist-portfolio'); ?></li>
										<li><?php esc_html_e( 'Responsive layout for all devices','artist-portfolio'); ?></li>
										<li><?php esc_html_e( 'Typography for the complete website, Colors Editor','artist-portfolio'); ?></li>
										<li><?php esc_html_e( 'Global Color pallete, Colors Editor','artist-portfolio'); ?></li>
										<li><?php esc_html_e( 'Section specific Color pallete, Colors Editor','artist-portfolio'); ?></li>
										<li><?php esc_html_e( 'Fully integrated with Font Awesome Icon, Colors Editor','artist-portfolio'); ?></li>
										<li><?php esc_html_e( 'Instagram Section, Colors Editor','artist-portfolio'); ?></li>
										<li><?php esc_html_e( 'Partner Listing, Colors Editor','artist-portfolio'); ?></li>
										<li><?php esc_html_e( 'Background Image Option, Colors Editor','artist-portfolio'); ?></li>
										<li><?php esc_html_e( 'Custom page templates, Colors Editor','artist-portfolio'); ?></li>
										<li><?php esc_html_e( 'Allow setting site title, tagline, logo, Colors Editor','artist-portfolio'); ?></li>
										<li><?php esc_html_e( 'Left and Right Sidebar, Colors Editor','artist-portfolio'); ?></li>
										<li><?php esc_html_e( 'Sticky post & Comment threads
											, Colors Editor','artist-portfolio'); ?></li>
										<li><?php esc_html_e( 'Customizable Home Page, Colors Editor','artist-portfolio'); ?></li>
										<li><?php esc_html_e( 'Multiple inner page templates, Colors Editor','artist-portfolio'); ?></li>
										<li><?php esc_html_e( 'Contact Page Template, Colors Editor','artist-portfolio'); ?></li>
										<li><?php esc_html_e( 'Blog Full width and right and left sidebar, Colors Editor','artist-portfolio'); ?></li>
										<li><?php esc_html_e( 'Recent post widget with images, Related post, Colors Editor','artist-portfolio'); ?></li>
									</ul>
								</div>
							</div>
						</div>
				</div>
			</div>
		</div>
		<div class="dashboard__blocks">
			<div class="row">
				<div class="col-md-3">
					<h3><?php esc_html_e( 'Get Support','artist-portfolio'); ?></h3>
					<ol>
						<li><a target="_blank" href="<?php echo esc_url( ARTIST_PORTFOLIO_FREE_SUPPORT ); ?>"><?php esc_html_e( 'Free Theme Support','artist-portfolio'); ?></a></li>
						<li><a target="_blank" href="<?php echo esc_url( ARTIST_PORTFOLIO_PRO_SUPPORT ); ?>"><?php esc_html_e( 'Premium Theme Support','artist-portfolio'); ?></a></li>
					</ol>
				</div>

				<div class="col-md-3">
					<h3><?php esc_html_e( 'Getting Started','artist-portfolio'); ?></h3>
					<ol>
						<li><?php esc_html_e( 'Start','artist-portfolio'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizing','artist-portfolio'); ?></a> <?php esc_html_e( 'your website.','artist-portfolio'); ?> </li>
					</ol>
				</div>
				<div class="col-md-3">
					<h3><?php esc_html_e( 'Help Docs','artist-portfolio'); ?></h3>
					<ol>
						<li><a target="_blank" href="<?php echo esc_url( ARTIST_PORTFOLIO_FREE_DOC ); ?>"><?php esc_html_e( 'Free Theme Documentation','artist-portfolio'); ?></a></li>
						<li><a target="_blank" href="<?php echo esc_url( ARTIST_PORTFOLIO_PRO_DOC ); ?>"><?php esc_html_e( 'Premium Theme Documentation','artist-portfolio'); ?></a></li>
					</ol>
				</div>
				<div class="col-md-3">
					<h3><?php esc_html_e( 'Buy Premium','artist-portfolio'); ?></h3>
					<ol>
						<a href="<?php echo esc_url( ARTIST_PORTFOLIO_BUY_PRO ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'artist-portfolio'); ?></a>
					</ol>
				</div>
			</div>
		</div>
	</div>

<?php }?>