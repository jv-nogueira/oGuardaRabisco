<?php
/**
 * Blogger Hub Theme Customizer
 * @package Blogger Hub
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function blogger_hub_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-selector.php' );

	class Blogger_Hub_WP_Customize_Range_Control extends WP_Customize_Control{
	    public $type = 'custom_range';
	    public function enqueue(){
	        wp_enqueue_script(
	            'cs-range-control',
	            false,
	            true
	        );
	    }
	    public function render_content(){?>
	        <label>
	            <?php if ( ! empty( $this->label )) : ?>
	                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
	            <?php endif; ?>
	            <div class="cs-range-value"><?php echo esc_html($this->value()); ?></div>
	            <input data-input-type="range" type="range" <?php $this->input_attrs(); ?> value="<?php echo esc_attr($this->value()); ?>" <?php $this->link(); ?> />
	            <?php if ( ! empty( $this->description )) : ?>
	                <span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
	            <?php endif; ?>
	        </label>
        <?php }
	}		

	//add home page setting pannel
	$wp_customize->add_panel( 'blogger_hub_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'TG Settings', 'blogger-hub' ),
	    'description' => __( 'Description of what this panel does.', 'blogger-hub' ),
	) );

	// Add the Theme Color Option section.
	$wp_customize->add_section( 'blogger_hub_theme_color_option', array( 
		'panel' => 'blogger_hub_panel_id', 
		'title' => esc_html__( 'Global Color Settings', 'blogger-hub' ) 
	) );

  	$wp_customize->add_setting( 'blogger_hub_first_theme_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blogger_hub_first_theme_color', array(
  		'label' => 'Color Option 1',
	    'description' => __('One can change complete theme global color settings on just one click.', 'blogger-hub'),
	    'section' => 'blogger_hub_theme_color_option',
	    'settings' => 'blogger_hub_first_theme_color',
  	)));

  	$wp_customize->add_setting( 'blogger_hub_second_theme_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blogger_hub_second_theme_color', array(
  		'label' => 'Color Option 2',
	    'description' => __('One can change complete theme global color settings on just one click.', 'blogger-hub'),
	    'section' => 'blogger_hub_theme_color_option',
	    'settings' => 'blogger_hub_second_theme_color',
  	)));

    $blogger_hub_font_array = array(
        '' =>'No Fonts',
        'Abril Fatface' => 'Abril Fatface',
        'Acme' =>'Acme', 
        'Anton' => 'Anton', 
        'Architects Daughter' =>'Architects Daughter',
        'Arimo' => 'Arimo', 
        'Arsenal' =>'Arsenal',
        'Arvo' =>'Arvo',
        'Alegreya' =>'Alegreya',
        'Alfa Slab One' =>'Alfa Slab One',
        'Averia Serif Libre' =>'Averia Serif Libre', 
        'Bangers' =>'Bangers', 
        'Boogaloo' =>'Boogaloo', 
        'Bad Script' =>'Bad Script',
        'Bitter' =>'Bitter', 
        'Bree Serif' =>'Bree Serif', 
        'BenchNine' =>'BenchNine',
        'Cabin' =>'Cabin',
        'Cardo' =>'Cardo', 
        'Courgette' =>'Courgette', 
        'Cherry Swash' =>'Cherry Swash',
        'Cormorant Garamond' =>'Cormorant Garamond', 
        'Crimson Text' =>'Crimson Text',
        'Cuprum' =>'Cuprum', 
        'Cookie' =>'Cookie',
        'Chewy' =>'Chewy',
        'Days One' =>'Days One',
        'Dosis' =>'Dosis',
        'Droid Sans' =>'Droid Sans', 
        'Economica' =>'Economica', 
        'Fredoka One' =>'Fredoka One',
        'Fjalla One' =>'Fjalla One',
        'Francois One' =>'Francois One', 
        'Frank Ruhl Libre' => 'Frank Ruhl Libre', 
        'Gloria Hallelujah' =>'Gloria Hallelujah',
        'Great Vibes' =>'Great Vibes', 
        'Handlee' =>'Handlee', 
        'Hammersmith One' =>'Hammersmith One',
        'Inconsolata' =>'Inconsolata',
        'Indie Flower' =>'Indie Flower', 
        'IM Fell English SC' =>'IM Fell English SC',
        'Julius Sans One' =>'Julius Sans One',
        'Josefin Slab' =>'Josefin Slab',
        'Josefin Sans' =>'Josefin Sans',
        'Kanit' =>'Kanit',
        'Lobster' =>'Lobster',
        'Lato' => 'Lato',
        'Lora' =>'Lora', 
        'Libre Baskerville' =>'Libre Baskerville',
        'Lobster Two' => 'Lobster Two',
        'Merriweather' =>'Merriweather',
        'Monda' =>'Monda',
        'Montserrat' =>'Montserrat',
        'Muli' =>'Muli',
        'Marck Script' =>'Marck Script',
        'Noto Serif' =>'Noto Serif',
        'Open Sans' =>'Open Sans',
        'Overpass' => 'Overpass', 
        'Overpass Mono' =>'Overpass Mono',
        'Oxygen' =>'Oxygen',
        'Orbitron' =>'Orbitron',
        'Patua One' =>'Patua One',
        'Pacifico' =>'Pacifico',
        'Padauk' =>'Padauk',
        'Playball' =>'Playball',
        'Playfair Display' =>'Playfair Display',
        'PT Sans' =>'PT Sans',
        'Philosopher' =>'Philosopher',
        'Permanent Marker' =>'Permanent Marker',
        'Poiret One' =>'Poiret One',
        'Quicksand' =>'Quicksand',
        'Quattrocento Sans' =>'Quattrocento Sans',
        'Raleway' =>'Raleway',
        'Rubik' =>'Rubik',
        'Rokkitt' =>'Rokkitt',
        'Russo One' => 'Russo One', 
        'Righteous' =>'Righteous', 
        'Slabo' =>'Slabo', 
        'Source Sans Pro' =>'Source Sans Pro',
        'Shadows Into Light Two' =>'Shadows Into Light Two',
        'Shadows Into Light' =>  'Shadows Into Light',
        'Sacramento' =>'Sacramento',
        'Shrikhand' =>'Shrikhand',
        'Tangerine' => 'Tangerine',
        'Ubuntu' =>'Ubuntu',
        'VT323' =>'VT323',
        'Varela Round' =>'Varela Round',
        'Vampiro One' =>'Vampiro One',
        'Vollkorn' => 'Vollkorn',
        'Volkhov' =>'Volkhov',
        'Yanone Kaffeesatz' =>'Yanone Kaffeesatz',
        'Exo' =>'Exo'
    );

	//Typography
	$wp_customize->add_section( 'blogger_hub_typography', array(
    	'title'      => __( 'Typography', 'blogger-hub' ),
		'priority'   => null,
		'panel' => 'blogger_hub_panel_id'
	) );
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'blogger_hub_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blogger_hub_paragraph_color', array(
		'label' => __('Paragraph Color', 'blogger-hub'),
		'section' => 'blogger_hub_typography',
		'settings' => 'blogger_hub_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('blogger_hub_paragraph_font_family',array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'blogger_hub_sanitize_choices'
	));
	$wp_customize->add_control(
	    'blogger_hub_paragraph_font_family', array(
	    'section'  => 'blogger_hub_typography',
	    'label'    => __( 'Paragraph Fonts','blogger-hub'),
	    'type'     => 'select',
	    'choices'  => $blogger_hub_font_array,
	));

	$wp_customize->add_setting('blogger_hub_paragraph_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('blogger_hub_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','blogger-hub'),
		'section'	=> 'blogger_hub_typography',
		'setting'	=> 'blogger_hub_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'blogger_hub_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blogger_hub_atag_color', array(
		'label' => __('"a" Tag Color', 'blogger-hub'),
		'section' => 'blogger_hub_typography',
		'settings' => 'blogger_hub_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('blogger_hub_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'blogger_hub_sanitize_choices'
	));
	$wp_customize->add_control(
	    'blogger_hub_atag_font_family', array(
	    'section'  => 'blogger_hub_typography',
	    'label'    => __( '"a" Tag Fonts','blogger-hub'),
	    'type'     => 'select',
	    'choices'  => $blogger_hub_font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'blogger_hub_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blogger_hub_li_color', array(
		'label' => __('"li" Tag Color', 'blogger-hub'),
		'section' => 'blogger_hub_typography',
		'settings' => 'blogger_hub_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('blogger_hub_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'blogger_hub_sanitize_choices'
	));
	$wp_customize->add_control(
	    'blogger_hub_li_font_family', array(
	    'section'  => 'blogger_hub_typography',
	    'label'    => __( '"li" Tag Fonts','blogger-hub'),
	    'type'     => 'select',
	    'choices'  => $blogger_hub_font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'blogger_hub_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blogger_hub_h1_color', array(
		'label' => __('H1 Color', 'blogger-hub'),
		'section' => 'blogger_hub_typography',
		'settings' => 'blogger_hub_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('blogger_hub_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'blogger_hub_sanitize_choices'
	));
	$wp_customize->add_control(
	    'blogger_hub_h1_font_family', array(
	    'section'  => 'blogger_hub_typography',
	    'label'    => __( 'H1 Fonts','blogger-hub'),
	    'type'     => 'select',
	    'choices'  => $blogger_hub_font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('blogger_hub_h1_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('blogger_hub_h1_font_size',array(
		'label'	=> __('H1 Font Size','blogger-hub'),
		'section'	=> 'blogger_hub_typography',
		'setting'	=> 'blogger_hub_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'blogger_hub_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blogger_hub_h2_color', array(
		'label' => __('H2 Color', 'blogger-hub'),
		'section' => 'blogger_hub_typography',
		'settings' => 'blogger_hub_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('blogger_hub_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'blogger_hub_sanitize_choices'
	));
	$wp_customize->add_control(
	    'blogger_hub_h2_font_family', array(
	    'section'  => 'blogger_hub_typography',
	    'label'    => __( 'H2 Fonts','blogger-hub'),
	    'type'     => 'select',
	    'choices'  => $blogger_hub_font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('blogger_hub_h2_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('blogger_hub_h2_font_size',array(
		'label'	=> __('H2 Font Size','blogger-hub'),
		'section'	=> 'blogger_hub_typography',
		'setting'	=> 'blogger_hub_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'blogger_hub_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blogger_hub_h3_color', array(
		'label' => __('H3 Color', 'blogger-hub'),
		'section' => 'blogger_hub_typography',
		'settings' => 'blogger_hub_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('blogger_hub_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'blogger_hub_sanitize_choices'
	));
	$wp_customize->add_control(
	    'blogger_hub_h3_font_family', array(
	    'section'  => 'blogger_hub_typography',
	    'label'    => __( 'H3 Fonts','blogger-hub'),
	    'type'     => 'select',
	    'choices'  => $blogger_hub_font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('blogger_hub_h3_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('blogger_hub_h3_font_size',array(
		'label'	=> __('H3 Font Size','blogger-hub'),
		'section'	=> 'blogger_hub_typography',
		'setting'	=> 'blogger_hub_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'blogger_hub_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blogger_hub_h4_color', array(
		'label' => __('H4 Color', 'blogger-hub'),
		'section' => 'blogger_hub_typography',
		'settings' => 'blogger_hub_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('blogger_hub_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'blogger_hub_sanitize_choices'
	));
	$wp_customize->add_control(
	    'blogger_hub_h4_font_family', array(
	    'section'  => 'blogger_hub_typography',
	    'label'    => __( 'H4 Fonts','blogger-hub'),
	    'type'     => 'select',
	    'choices'  => $blogger_hub_font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('blogger_hub_h4_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('blogger_hub_h4_font_size',array(
		'label'	=> __('H4 Font Size','blogger-hub'),
		'section'	=> 'blogger_hub_typography',
		'setting'	=> 'blogger_hub_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'blogger_hub_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blogger_hub_h5_color', array(
		'label' => __('H5 Color', 'blogger-hub'),
		'section' => 'blogger_hub_typography',
		'settings' => 'blogger_hub_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('blogger_hub_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'blogger_hub_sanitize_choices'
	));
	$wp_customize->add_control(
	    'blogger_hub_h5_font_family', array(
	    'section'  => 'blogger_hub_typography',
	    'label'    => __( 'H5 Fonts','blogger-hub'),
	    'type'     => 'select',
	    'choices'  => $blogger_hub_font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('blogger_hub_h5_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('blogger_hub_h5_font_size',array(
		'label'	=> __('H5 Font Size','blogger-hub'),
		'section'	=> 'blogger_hub_typography',
		'setting'	=> 'blogger_hub_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'blogger_hub_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blogger_hub_h6_color', array(
		'label' => __('H6 Color', 'blogger-hub'),
		'section' => 'blogger_hub_typography',
		'settings' => 'blogger_hub_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('blogger_hub_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'blogger_hub_sanitize_choices'
	));
	$wp_customize->add_control(
	    'blogger_hub_h6_font_family', array(
	    'section'  => 'blogger_hub_typography',
	    'label'    => __( 'H6 Fonts','blogger-hub'),
	    'type'     => 'select',
	    'choices'  => $blogger_hub_font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('blogger_hub_h6_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('blogger_hub_h6_font_size',array(
		'label'	=> __('H6 Font Size','blogger-hub'),
		'section'	=> 'blogger_hub_typography',
		'setting'	=> 'blogger_hub_h6_font_size',
		'type'	=> 'text'
	));

	$wp_customize->add_section('blogger_hub_header',array(
		'title'	=> __('Header','blogger-hub'),
		'priority'	=> null,
		'panel' => 'blogger_hub_panel_id',
	));

	$wp_customize->add_setting('blogger_hub_menu_case',array(
        'default' => 'capitalize',
        'sanitize_callback' => 'blogger_hub_sanitize_choices'
	));
	$wp_customize->add_control('blogger_hub_menu_case',array(
        'type' => 'select',
        'label' => __('Menu Case','blogger-hub'),
        'section' => 'blogger_hub_header',
        'choices' => array(
            'uppercase' => __('Uppercase','blogger-hub'),
            'capitalize' => __('Capitalize','blogger-hub'),
        ),
	) );

	$wp_customize->add_setting( 'blogger_hub_menu_font_size', array(
		'default'=> '15',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Blogger_Hub_WP_Customize_Range_Control( $wp_customize, 'blogger_hub_menu_font_size', array(
        'label'  => __('Menu Font Size','blogger-hub'),
        'section'  => 'blogger_hub_header',
        'description' => __('Measurement is in pixel.','blogger-hub'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        )
    )));

    $wp_customize->add_setting('blogger_hub_menu_font_weight',array(
        'default' => '',
        'sanitize_callback' => 'blogger_hub_sanitize_choices'
	));
	$wp_customize->add_control('blogger_hub_menu_font_weight',array(
        'type' => 'select',
        'label' => __('Menu Font Weight','blogger-hub'),
        'section' => 'blogger_hub_header',
        'choices' => array(
            '100' => __('100','blogger-hub'),
            '200' => __('200','blogger-hub'),
            '300' => __('300','blogger-hub'),
            '400' => __('400','blogger-hub'),
            '500' => __('500','blogger-hub'),
            '600' => __('600','blogger-hub'),
            '700' => __('700','blogger-hub'),
            '800' => __('800','blogger-hub'),
            '900' => __('900','blogger-hub'),
        ),
	) );

	$wp_customize->add_setting('blogger_hub_menu_padding',array(
		'default'=> 22,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new blogger_hub_WP_Customize_Range_Control( $wp_customize,'blogger_hub_menu_padding',array(
		'label'	=> __('Menu Font Padding','blogger-hub'),
		'section'=> 'blogger_hub_header',
		'input_attrs' => array(
         'step'  => 1,
			'min'   => 0,
			'max'   => 50,
        ),
	)));

	$wp_customize->add_setting('blogger_hub_show_search',array(
       'default' => 'true',
       'sanitize_callback'	=> 'blogger_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('blogger_hub_show_search',array(
       'type' => 'checkbox',
       'label' => __('Show/Hide Search','blogger-hub'),
       'section' => 'blogger_hub_header'
    ));

    $wp_customize->add_setting('blogger_hub_search_placeholder',array(
       'default' => __('Search','blogger-hub'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('blogger_hub_search_placeholder',array(
       'type' => 'text',
       'label' => __('Search Placeholder text','blogger-hub'),
       'section' => 'blogger_hub_header'
    ));

	$wp_customize->add_setting('blogger_hub_sticky_header',array(
       'default' => '',
       'sanitize_callback'	=> 'blogger_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('blogger_hub_sticky_header',array(
       'type' => 'checkbox',
       'label' => __('Stick header on Desktop','blogger-hub'),
       'section' => 'blogger_hub_header'
    ));

    $wp_customize->add_setting('blogger_hub_sticky_header_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('blogger_hub_sticky_header_padding',array(
		'label'	=> esc_html__('Sticky Header Padding','blogger-hub'),
		'section'=> 'blogger_hub_header',
		'type' => 'hidden',
	));

    $wp_customize->add_setting('blogger_hub_top_sticky_header_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'blogger_hub_sanitize_float'
	));
	$wp_customize->add_control('blogger_hub_top_sticky_header_padding',array(
		'description'	=> __('Top','blogger-hub'),
		'input_attrs' => array(
            'step' => 1,
			'min' => 0,
			'max' => 50,
        ),
		'section'=> 'blogger_hub_header',
		'type'=> 'number'
	));

	$wp_customize->add_setting('blogger_hub_bottom_sticky_header_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'blogger_hub_sanitize_float'
	));
	$wp_customize->add_control('blogger_hub_bottom_sticky_header_padding',array(
		'description'	=> __('Bottom','blogger-hub'),
		'input_attrs' => array(
            'step' => 1,
			'min' => 0,
			'max' => 50,
        ),
		'section'=> 'blogger_hub_header',
		'type'=> 'number'
	));

	$wp_customize->add_setting('blogger_hub_menu_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blogger_hub_menu_color', array(
		'label'    => __('Menu Color', 'blogger-hub'),
		'section'  => 'blogger_hub_header',
		'settings' => 'blogger_hub_menu_color',
	)));

	$wp_customize->add_setting('blogger_hub_menu_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blogger_hub_menu_hover_color', array(
		'label'    => __('Menu Hover Color', 'blogger-hub'),
		'section'  => 'blogger_hub_header',
		'settings' => 'blogger_hub_menu_hover_color',
	)));

	$wp_customize->add_setting('blogger_hub_submenu_menu_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blogger_hub_submenu_menu_color', array(
		'label'    => __('Submenu Color', 'blogger-hub'),
		'section'  => 'blogger_hub_header',
		'settings' => 'blogger_hub_submenu_menu_color',
	)));

	//Topbar section
	$wp_customize->add_section('blogger_hub_social_link',array(
		'title'	=> __('Social Links','blogger-hub'),
		'description'	=> __('Add Social Link here','blogger-hub'),
		'priority'	=> null,
		'panel' => 'blogger_hub_panel_id',
	));

	$wp_customize->add_setting('blogger_hub_facebook_icon',array(
		'default'	=> 'fab fa-facebook-f',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Blogger_Hub_Icon_Selector(
        $wp_customize,'blogger_hub_facebook_icon',array(
		'label'	=> __('Facebook Icon','blogger-hub'),
		'section' => 'blogger_hub_social_link',
		'type'	  => 'icon',
	)));

	$wp_customize->add_setting('blogger_hub_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('blogger_hub_facebook_url',array(
		'label'	=> __('Facebook url','blogger-hub'),
		'section'	=> 'blogger_hub_social_link',
		'type'		=> 'url'
	));	

	$wp_customize->add_setting('blogger_hub_twitter_icon',array(
		'default'	=> 'fab fa-twitter',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Blogger_Hub_Icon_Selector(
        $wp_customize,'blogger_hub_twitter_icon',array(
		'label'	=> __('Twitter Icon','blogger-hub'),
		'section' => 'blogger_hub_social_link',
		'type'	  => 'icon',
	)));

	$wp_customize->add_setting('blogger_hub_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('blogger_hub_twitter_url',array(
		'label'	=> __('Twitter url','blogger-hub'),
		'section'	=> 'blogger_hub_social_link',
		'type'		=> 'url'
	));	

	$wp_customize->add_setting('blogger_hub_insta_icon',array(
		'default'	=> 'fab fa-instagram',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Blogger_Hub_Icon_Selector(
        $wp_customize,'blogger_hub_insta_icon',array(
		'label'	=> __('Instagram Icon','blogger-hub'),
		'section' => 'blogger_hub_social_link',
		'type'	  => 'icon',
	)));

	$wp_customize->add_setting('blogger_hub_insta_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('blogger_hub_insta_url',array(
		'label'	=> __('Instagram url','blogger-hub'),
		'section'	=> 'blogger_hub_social_link',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('blogger_hub_linkdin_icon',array(
		'default'	=> 'fab fa-linkedin-in',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Blogger_Hub_Icon_Selector(
        $wp_customize,'blogger_hub_linkdin_icon',array(
		'label'	=> __('Linkedin Icon','blogger-hub'),
		'section' => 'blogger_hub_social_link',
		'type'	  => 'icon',
	)));

	$wp_customize->add_setting('blogger_hub_linkdin_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('blogger_hub_linkdin_url',array(
		'label'	=> __('Linkedin url','blogger-hub'),
		'section'	=> 'blogger_hub_social_link',
		'type'		=> 'url'
	));	

	$wp_customize->add_setting('blogger_hub_youtube_icon',array(
		'default'	=> 'fab fa-youtube',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Blogger_Hub_Icon_Selector(
        $wp_customize,'blogger_hub_youtube_icon',array(
		'label'	=> __('Youtube Icon','blogger-hub'),
		'section' => 'blogger_hub_social_link',
		'type'	  => 'icon',
	)));

	$wp_customize->add_setting('blogger_hub_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('blogger_hub_youtube_url',array(
		'label'	=> __('Youtube url','blogger-hub'),
		'section'	=> 'blogger_hub_social_link',
		'type'		=> 'url'
	));

	$wp_customize->add_setting( 'blogger_hub_social_icons_font_size', array(
		'default'=> '13',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Blogger_Hub_WP_Customize_Range_Control( $wp_customize, 'blogger_hub_social_icons_font_size', array(
        'label'  => __('Social Icons Font Size','blogger-hub'),
        'section'  => 'blogger_hub_social_link',
        'description' => __('Measurement is in pixel.','blogger-hub'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        )
    )));

	//Our Blog Category section
  	$wp_customize->add_section('blogger_hub_category_post',array(
	    'title' => __('Our Blog Category Section','blogger-hub'),
	    'description' => '',
	    'priority'  => null,
	    'panel' => 'blogger_hub_panel_id',
	));

	$wp_customize->add_setting('blogger_hub_section_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('blogger_hub_section_title',array(
		'label'	=> __('Section Title','blogger-hub'),
		'section'	=> 'blogger_hub_category_post',
		'type'		=> 'text'
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('blogger_hub_our_category',array(
	    'default' => 'select',
	    'sanitize_callback' => 'blogger_hub_sanitize_choices',
  	));
  	$wp_customize->add_control('blogger_hub_our_category',array(
	    'type'    => 'select',
	    'choices' => $cat_post,
	    'label' => __('Select Category to display Latest Post','blogger-hub'),
	    'section' => 'blogger_hub_category_post',
	));

	//layout setting
	$wp_customize->add_section( 'blogger_hub_theme_layout', array(
    	'title' => __( 'Blog Settings', 'blogger-hub' ),
		'priority'   => null,
		'panel' => 'blogger_hub_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('blogger_hub_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'blogger_hub_sanitize_choices'	        
    ));
	$wp_customize->add_control('blogger_hub_layout',
	    array(
	        'type' => 'radio',
	        'section' => 'blogger_hub_theme_layout',
       		'label' => __('Blog Layout','blogger-hub'),
	        'choices' => array(
	            'Left Sidebar' => __('Left Sidebar','blogger-hub'),
	            'Right Sidebar' => __('Right Sidebar','blogger-hub'),
	            'One Column' => __('One Column','blogger-hub'),
	            'Three Columns' => __('Three Columns','blogger-hub'),
	            'Four Columns' => __('Four Columns','blogger-hub'),
	            'Grid Layout' => __('Grid Layout','blogger-hub')
	        ),
	    )
    );

    $wp_customize->add_setting('blogger_hub_blog_post_alignment',array(
        'default' => 'center',
        'sanitize_callback' => 'blogger_hub_sanitize_choices'
    ));
	$wp_customize->add_control('blogger_hub_blog_post_alignment', array(
        'type' => 'select',
        'label' => __( 'Blog Post Alignment', 'blogger-hub' ),
        'section' => 'blogger_hub_theme_layout',
        'choices' => array(
            'left' => __('Left Align','blogger-hub'),
            'right' => __('Right Align','blogger-hub'),
            'center' => __('Center Align','blogger-hub')
        ),
    ));

    $wp_customize->add_setting('blogger_hub_blog_post_display_type',array(
        'default' => 'blocks',
        'sanitize_callback' => 'blogger_hub_sanitize_choices'
    ));
	$wp_customize->add_control('blogger_hub_blog_post_display_type', array(
        'type' => 'select',
        'label' => __( 'Blog Page Display Type', 'blogger-hub' ),
        'section' => 'blogger_hub_theme_layout',
        'choices' => array(
            'blocks' => __('Blocks','blogger-hub'),
            'without blocks' => __('Without Blocks','blogger-hub'),
        ),
    ));

    $wp_customize->add_setting('blogger_hub_featured_image',array(
       'default' => 'true',
       'sanitize_callback'	=> 'blogger_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('blogger_hub_featured_image',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Featured Image','blogger-hub'),
       'section' => 'blogger_hub_theme_layout'
    ));

    $wp_customize->add_setting('blogger_hub_metafields_date',array(
       'default' => 'true',
       'sanitize_callback'	=> 'blogger_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('blogger_hub_metafields_date',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Date ','blogger-hub'),
       'section' => 'blogger_hub_theme_layout'
    ));

    $wp_customize->add_setting('blogger_hub_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Blogger_Hub_Icon_Selector(
        $wp_customize,'blogger_hub_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','blogger-hub'),
		'transport' => 'refresh',
		'section'	=> 'blogger_hub_theme_layout',
		'setting'	=> 'blogger_hub_postdate_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('blogger_hub_metafields_author',array(
       'default' => 'true',
       'sanitize_callback'	=> 'blogger_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('blogger_hub_metafields_author',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Author','blogger-hub'),
       'section' => 'blogger_hub_theme_layout'
    ));

     $wp_customize->add_setting('blogger_hub_postauthor_icon',array(
		'default'	=> 'fa fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Blogger_Hub_Icon_Selector(
        $wp_customize,'blogger_hub_postauthor_icon',array(
		'label'	=> __('Post Author Icon','blogger-hub'),
		'transport' => 'refresh',
		'section'	=> 'blogger_hub_theme_layout',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('blogger_hub_metafields_comment',array(
       'default' => 'true',
       'sanitize_callback'	=> 'blogger_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('blogger_hub_metafields_comment',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Comments','blogger-hub'),
       'section' => 'blogger_hub_theme_layout'
    ));

    $wp_customize->add_setting('blogger_hub_postcomment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Blogger_Hub_Icon_Selector(
        $wp_customize,'blogger_hub_postcomment_icon',array(
		'label'	=> __('Post Comments Icon','blogger-hub'),
		'transport' => 'refresh',
		'section'	=> 'blogger_hub_theme_layout',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('blogger_hub_metafields_time',array(
       'default' => 'true',
       'sanitize_callback'	=> 'blogger_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('blogger_hub_metafields_time',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Time','blogger-hub'),
       'section' => 'blogger_hub_theme_layout'
    ));

    $wp_customize->add_setting('blogger_hub_posttime_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Blogger_Hub_Icon_Selector(
        $wp_customize,'blogger_hub_posttime_icon',array(
		'label'	=> __('Post Time Icon','blogger-hub'),
		'transport' => 'refresh',
		'section'	=> 'blogger_hub_theme_layout',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('blogger_hub_metafields_tags',array(
       'default' => 'true',
       'sanitize_callback'	=> 'blogger_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('blogger_hub_metafields_tags',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Tags','blogger-hub'),
       'section' => 'blogger_hub_theme_layout'
    ));

    $wp_customize->add_setting('blogger_hub_metafields_share_link',array(
       'default' => 'true',
       'sanitize_callback'	=> 'blogger_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('blogger_hub_metafields_share_link',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Share links','blogger-hub'),
       'section' => 'blogger_hub_theme_layout'
    ));

    $wp_customize->add_setting('blogger_hub_post_navigation',array(
       'default' => 'true',
       'sanitize_callback' => 'blogger_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('blogger_hub_post_navigation',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Post Navigation','blogger-hub'),
       'section' => 'blogger_hub_theme_layout'
    ));

    $wp_customize->add_setting('blogger_hub_metabox_seperator',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('blogger_hub_metabox_seperator',array(
       'type' => 'text',
       'label' => __('Metabox Seperator','blogger-hub'),
       'description' => __('Ex: "/", "|", "-", ...','blogger-hub'),
       'section' => 'blogger_hub_theme_layout'
    ));

    $wp_customize->add_setting('blogger_hub_blog_post_content',array(
    	'default' => 'Excerpt Content',
        'sanitize_callback' => 'blogger_hub_sanitize_choices'
	));
	$wp_customize->add_control('blogger_hub_blog_post_content',array(
        'type' => 'radio',
        'label' => __('Blog Post Content Type','blogger-hub'),
        'section' => 'blogger_hub_theme_layout',
        'choices' => array(
            'No Content' => __('No Content','blogger-hub'),
            'Full Content' => __('Full Content','blogger-hub'),
            'Excerpt Content' => __('Excerpt Content','blogger-hub'),
        ),
	) );

   $wp_customize->add_setting( 'blogger_hub_post_excerpt_number', array(
		'default'              => 20,
       'sanitize_callback'	=> 'blogger_hub_sanitize_float'
	) );
	$wp_customize->add_control( 'blogger_hub_post_excerpt_number', array(
		'label'       => esc_html__( 'Blog Post Excerpt Number (Max 50)','blogger-hub' ),
		'section'     => 'blogger_hub_theme_layout',
		'type'        => 'number',
		'settings'    => 'blogger_hub_post_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
		'active_callback' => 'blogger_hub_excerpt_enabled'
	) );

	$wp_customize->add_setting( 'blogger_hub_button_excerpt_suffix', array(
		'default'   => '...',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'blogger_hub_button_excerpt_suffix', array(
		'label'       => esc_html__( 'Post Excerpt Suffix','blogger-hub' ),
		'section'     => 'blogger_hub_theme_layout',
		'type'        => 'text',
		'settings'    => 'blogger_hub_button_excerpt_suffix',
		'active_callback' => 'blogger_hub_excerpt_enabled'
	) );

	//Featured Image
	$wp_customize->add_setting('blogger_hub_blog_image_dimension',array(
       'default' => 'default',
       'sanitize_callback'	=> 'blogger_hub_sanitize_choices'
    ));
    $wp_customize->add_control('blogger_hub_blog_image_dimension',array(
       'type' => 'radio',
       'label'	=> __('Blog Post Featured Image Dimension','blogger-hub'),
       'choices' => array(
            'default' => __('Default','blogger-hub'),
            'custom' => __('Custom Image Size','blogger-hub'),
        ),
      	'section'	=> 'blogger_hub_theme_layout',
    ));

    $wp_customize->add_setting( 'blogger_hub_feature_image_custom_width', array(
		'default'=> '250',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Blogger_Hub_WP_Customize_Range_Control( $wp_customize, 'blogger_hub_feature_image_custom_width', array(
        'label'  => __('Featured Image Custom Width','blogger-hub'),
        'section'  => 'blogger_hub_theme_layout',
        'description' => __('Measurement is in pixel.','blogger-hub'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 400,
        ),
		'active_callback' => 'blogger_hub_blog_image_dimension'
    )));

    $wp_customize->add_setting( 'blogger_hub_feature_image_custom_height', array(
		'default'=> '250',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Blogger_Hub_WP_Customize_Range_Control( $wp_customize, 'blogger_hub_feature_image_custom_height', array(
        'label'  => __('Featured Image Custom Height','blogger-hub'),
        'section'  => 'blogger_hub_theme_layout',
        'description' => __('Measurement is in pixel.','blogger-hub'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 400,
        ),
		'active_callback' => 'blogger_hub_blog_image_dimension'
    )));

	$wp_customize->add_setting( 'blogger_hub_feature_image_border_radius', array(
		'default'=> '0',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Blogger_Hub_WP_Customize_Range_Control( $wp_customize, 'blogger_hub_feature_image_border_radius', array(
        'label'  => __('Featured Image Border Radius','blogger-hub'),
        'section'  => 'blogger_hub_theme_layout',
        'description' => __('Measurement is in pixel.','blogger-hub'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        ),
    )));

    $wp_customize->add_setting( 'blogger_hub_feature_image_shadow', array(
		'default'=> '0',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Blogger_Hub_WP_Customize_Range_Control( $wp_customize, 'blogger_hub_feature_image_shadow', array(
        'label'  => __('Featured Image Shadow','blogger-hub'),
        'section'  => 'blogger_hub_theme_layout',
        'description' => __('Measurement is in pixel.','blogger-hub'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        ),
    )));

    $wp_customize->add_setting( 'blogger_hub_pagination_type', array(
        'default'			=> 'page-numbers',
        'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control( 'blogger_hub_pagination_type', array(
        'section' => 'blogger_hub_theme_layout',
        'type' => 'select',
        'label' => __( 'Blog Pagination Style', 'blogger-hub' ),
        'choices'		=> array(
            'page-numbers'  => __( 'Number', 'blogger-hub' ),
        	'next-prev' => __( 'Next/Prev', 'blogger-hub' ),
    )));

    $wp_customize->add_setting('blogger_hub_blog_nav_position',array(
        'default' => 'bottom',
        'sanitize_callback' => 'blogger_hub_sanitize_choices'
    ));
	$wp_customize->add_control('blogger_hub_blog_nav_position', array(
        'type' => 'select',
        'label' => __( 'Blog Post Navigation Position', 'blogger-hub' ),
        'section' => 'blogger_hub_theme_layout',
        'choices' => array(
            'top' => __('Top','blogger-hub'),
            'bottom' => __('Bottom','blogger-hub'),
            'both' => __('Both','blogger-hub')
        ),
    ));

	$wp_customize->add_section( 'blogger_hub_single_post_settings', array(
		'title' => __( 'Single Post Options', 'blogger-hub' ),
		'panel' => 'blogger_hub_panel_id',
	));

	$wp_customize->add_setting('blogger_hub_single_post_breadcrumb',array(
       'default' => 'true',
       'sanitize_callback' => 'blogger_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('blogger_hub_single_post_breadcrumb',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Breadcrumb','blogger-hub'),
       'section' => 'blogger_hub_single_post_settings'
    ));

	$wp_customize->add_setting('blogger_hub_single_post_date',array(
       'default' => 'true',
       'sanitize_callback'	=> 'blogger_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('blogger_hub_single_post_date',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Date','blogger-hub'),
       'section' => 'blogger_hub_single_post_settings'
    ));

    $wp_customize->add_setting('blogger_hub_single_post_author',array(
       'default' => 'true',
       'sanitize_callback'	=> 'blogger_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('blogger_hub_single_post_author',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Author','blogger-hub'),
       'section' => 'blogger_hub_single_post_settings'
    ));

    $wp_customize->add_setting('blogger_hub_single_post_comment_no',array(
       'default' => 'true',
       'sanitize_callback'	=> 'blogger_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('blogger_hub_single_post_comment_no',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Comment Number','blogger-hub'),
       'section' => 'blogger_hub_single_post_settings'
    ));

    $wp_customize->add_setting('blogger_hub_single_post_time',array(
       'default' => 'true',
       'sanitize_callback'	=> 'blogger_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('blogger_hub_single_post_time',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Time','blogger-hub'),
       'section' => 'blogger_hub_single_post_settings'
    ));

    $wp_customize->add_setting('blogger_hub_single_post_image',array(
       'default' => 'true',
       'sanitize_callback'	=> 'blogger_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('blogger_hub_single_post_image',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Featured Image','blogger-hub'),
       'section' => 'blogger_hub_single_post_settings'
    ));

    $wp_customize->add_setting('blogger_hub_single_post_category',array(
       'default' => 'true',
       'sanitize_callback'	=> 'blogger_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('blogger_hub_single_post_category',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Category','blogger-hub'),
       'section' => 'blogger_hub_single_post_settings'
    ));

    $wp_customize->add_setting('blogger_hub_metafields_tags',array(
       'default' => 'true',
       'sanitize_callback'	=> 'blogger_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('blogger_hub_metafields_tags',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Tags','blogger-hub'),
       'section' => 'blogger_hub_single_post_settings'
    ));

    $wp_customize->add_setting( 'blogger_hub_post_featured_image', array(
        'default' => 'in-content',
        'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control( 'blogger_hub_post_featured_image', array(
        'section' => 'blogger_hub_single_post_settings',
        'type' => 'radio',
        'label' => __( 'Featured Image Display Type', 'blogger-hub' ),
        'choices'		=> array(
            'banner'  => __('as Banner Image', 'blogger-hub'),
            'in-content' => __( 'as Featured Image', 'blogger-hub' ),
    )));

    $wp_customize->add_setting( 'blogger_hub_single_post_img_border_radius', array(
		'default'=> 0,
		'sanitize_callback'	=> 'blogger_hub_sanitize_float',
	) );
	$wp_customize->add_control( 'blogger_hub_single_post_img_border_radius', array(
		'label'       => esc_html__( 'Single Post Image Border Radius','blogger-hub' ),
		'section'     => 'blogger_hub_single_post_settings',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 100,
		),
	) );

	$wp_customize->add_setting( 'blogger_hub_single_post_img_box_shadow',array(
		'default' => 0,
		'sanitize_callback'    => 'blogger_hub_sanitize_float',
	));
	$wp_customize->add_control('blogger_hub_single_post_img_box_shadow',array(
		'label' => esc_html__( 'Single Post Image Shadow','blogger-hub' ),
		'section' => 'blogger_hub_single_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type' => 'number'
	));

    $wp_customize->add_setting('blogger_hub_single_post_nav',array(
       'default' => 'true',
       'sanitize_callback'	=> 'blogger_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('blogger_hub_single_post_nav',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Navigation','blogger-hub'),
       'section' => 'blogger_hub_single_post_settings'
    ));

    $wp_customize->add_setting( 'blogger_hub_single_post_prev_nav_text', array(
		'default' => __('Previous','blogger-hub' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'blogger_hub_single_post_prev_nav_text', array(
		'label' => esc_html__( 'Single Post Previous Nav text','blogger-hub' ),
		'section'     => 'blogger_hub_single_post_settings',
		'type'        => 'text',
		'settings'    => 'blogger_hub_single_post_prev_nav_text'
	) );

	$wp_customize->add_setting( 'blogger_hub_single_post_next_nav_text', array(
		'default' => __('Next','blogger-hub' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'blogger_hub_single_post_next_nav_text', array(
		'label' => esc_html__( 'Single Post Next Nav text','blogger-hub' ),
		'section'     => 'blogger_hub_single_post_settings',
		'type'        => 'text',
		'settings'    => 'blogger_hub_single_post_next_nav_text'
	) );

	$wp_customize->add_setting('blogger_hub_single_post_comment',array(
       'default' => 'true',
       'sanitize_callback'	=> 'blogger_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('blogger_hub_single_post_comment',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post comment','blogger-hub'),
       'section' => 'blogger_hub_single_post_settings'
    ));

	$wp_customize->add_setting( 'blogger_hub_comment_width', array(
		'default'=> '100',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Blogger_Hub_WP_Customize_Range_Control( $wp_customize, 'blogger_hub_comment_width', array(
        'label'  => __('Comment textarea width','blogger-hub'),
        'section'  => 'blogger_hub_single_post_settings',
        'description' => __('Measurement is in %.','blogger-hub'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 100,
        ),
    )));

    $wp_customize->add_setting('blogger_hub_comment_title',array(
       'default' => __('Leave a Reply','blogger-hub'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('blogger_hub_comment_title',array(
       'type' => 'text',
       'label' => __('Comment form Title','blogger-hub'),
       'section' => 'blogger_hub_single_post_settings'
    ));

    $wp_customize->add_setting('blogger_hub_comment_submit_text',array(
       'default' => __('Post Comment','blogger-hub'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('blogger_hub_comment_submit_text',array(
       'type' => 'text',
       'label' => __('Comment Submit Button Label','blogger-hub'),
       'section' => 'blogger_hub_single_post_settings'
    ));

	$wp_customize->add_setting('blogger_hub_related_posts',array(
       'default' => true,
       'sanitize_callback'	=> 'blogger_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('blogger_hub_related_posts',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Related Posts','blogger-hub'),
       'section' => 'blogger_hub_single_post_settings'
    ));

    $wp_customize->add_setting('blogger_hub_related_posts_title',array(
       'default' => __('You May Also Like','blogger-hub'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('blogger_hub_related_posts_title',array(
       'type' => 'text',
       'label' => __('Related Posts Title','blogger-hub'),
       'section' => 'blogger_hub_single_post_settings'
    ));

    $wp_customize->add_setting( 'blogger_hub_related_post_count', array(
		'default' => 3,
		'sanitize_callback'	=> 'blogger_hub_sanitize_float'
	) );
	$wp_customize->add_control( 'blogger_hub_related_post_count', array(
		'label' => esc_html__( 'Related Posts Count','blogger-hub' ),
		'section' => 'blogger_hub_single_post_settings',
		'type' => 'number',
		'settings' => 'blogger_hub_related_post_count',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 6,
		),
	) );

    $wp_customize->add_setting( 'blogger_hub_post_shown_by', array(
        'default' => 'categories',
        'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control( 'blogger_hub_post_shown_by', array(
        'section' => 'blogger_hub_single_post_settings',
        'type' => 'radio',
        'label' => __( 'Related Posts must be shown:', 'blogger-hub' ),
        'choices'		=> array(
            'categories'  => __('By Categories', 'blogger-hub'),
            'tags' => __( 'By Tags', 'blogger-hub' ),
    )));

    $wp_customize->add_setting( 'blogger_hub_related_post_excerpt_number',array(
		'default' => 20,
		'sanitize_callback' => 'blogger_hub_sanitize_float'
	));

	$wp_customize->add_control('blogger_hub_related_post_excerpt_number',	array(
		'label' => esc_html__( 'Related Posts Content Limit','blogger-hub' ),
		'section' => 'blogger_hub_single_post_settings',
		'type'    => 'number',
	 	'settings' => 'blogger_hub_related_post_excerpt_number',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	// Button option
	$wp_customize->add_section( 'blogger_hub_button_options', array(
		'title' =>  __( 'Button Options', 'blogger-hub' ),
		'panel' => 'blogger_hub_panel_id',
	));

    $wp_customize->add_setting( 'blogger_hub_blog_button_text', array(
		'default'   => __('READ MORE','blogger-hub'),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'blogger_hub_blog_button_text', array(
		'label'       => esc_html__( 'Blog Post Button Label','blogger-hub' ),
		'section'     => 'blogger_hub_button_options',
		'type'        => 'text',
		'settings'    => 'blogger_hub_blog_button_text'
	) );

	$wp_customize->add_setting('blogger_hub_button_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('blogger_hub_button_padding',array(
		'label'	=> esc_html__('Button Padding','blogger-hub'),
		'section'=> 'blogger_hub_button_options',
		'active_callback' => 'blogger_hub_button_enabled'
	));

	$wp_customize->add_setting('blogger_hub_top_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'blogger_hub_sanitize_float'
	));
	$wp_customize->add_control('blogger_hub_top_button_padding',array(
		'label'	=> __('Top','blogger-hub'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'blogger_hub_button_options',
		'type'=> 'number',
		'active_callback' => 'blogger_hub_button_enabled'
	));

	$wp_customize->add_setting('blogger_hub_bottom_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'blogger_hub_sanitize_float'
	));
	$wp_customize->add_control('blogger_hub_bottom_button_padding',array(
		'label'	=> __('Bottom','blogger-hub'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'blogger_hub_button_options',
		'type'=> 'number',
		'active_callback' => 'blogger_hub_button_enabled'
	));

	$wp_customize->add_setting('blogger_hub_left_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'blogger_hub_sanitize_float'
	));
	$wp_customize->add_control('blogger_hub_left_button_padding',array(
		'label'	=> __('Left','blogger-hub'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'blogger_hub_button_options',
		'type'=> 'number',
		'active_callback' => 'blogger_hub_button_enabled'
	));

	$wp_customize->add_setting('blogger_hub_right_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'blogger_hub_sanitize_float'
	));
	$wp_customize->add_control('blogger_hub_right_button_padding',array(
		'label'	=> __('Right','blogger-hub'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'blogger_hub_button_options',
		'type'=> 'number',
		'active_callback' => 'blogger_hub_button_enabled'
	));

	$wp_customize->add_setting( 'blogger_hub_button_border_radius', array(
		'default'=> 4,
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Blogger_Hub_WP_Customize_Range_Control( $wp_customize, 'blogger_hub_button_border_radius', array(
            'label'  => __('Border Radius','blogger-hub'),
            'section'  => 'blogger_hub_button_options',
            'description' => __('Measurement is in pixel.','blogger-hub'),
            'input_attrs' => array(
                'min' => 0,
                'max' => 50,
            ),
			'active_callback' => 'blogger_hub_button_enabled'
    )));

    //Sidebar setting
	$wp_customize->add_section( 'blogger_hub_sidebar_options', array(
    	'title'   => __( 'Sidebar options', 'blogger-hub' ),
		'priority'   => null,
		'panel' => 'blogger_hub_panel_id'
	) );

	$wp_customize->add_setting('blogger_hub_single_page_layout',array(
        'default' => 'One Column',
        'sanitize_callback' => 'blogger_hub_sanitize_choices'
    ));
	$wp_customize->add_control('blogger_hub_single_page_layout', array(
        'type' => 'select',
        'label' => __( 'Single Page Layout', 'blogger-hub' ),
        'section' => 'blogger_hub_sidebar_options',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','blogger-hub'),
            'Right Sidebar' => __('Right Sidebar','blogger-hub'),
            'One Column' => __('One Column','blogger-hub')
        ),
    ));

    $wp_customize->add_setting('blogger_hub_single_post_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'blogger_hub_sanitize_choices'
    ));
	$wp_customize->add_control('blogger_hub_single_post_layout', array(
        'type' => 'select',
        'label' => __( 'Single Post Layout', 'blogger-hub' ),
        'section' => 'blogger_hub_sidebar_options',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','blogger-hub'),
            'Right Sidebar' => __('Right Sidebar','blogger-hub'),
            'One Column' => __('One Column','blogger-hub')
        ),
    ));

    //Advance Options
	$wp_customize->add_section( 'blogger_hub_advance_options', array(
    	'title' => __( 'Advance Options', 'blogger-hub' ),
		'priority'   => null,
		'panel' => 'blogger_hub_panel_id'
	) );

	$wp_customize->add_setting('blogger_hub_preloader',array(
       'default' => 'true',
       'sanitize_callback'	=> 'blogger_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('blogger_hub_preloader',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Preloader','blogger-hub'),
       'section' => 'blogger_hub_advance_options'
    ));

    $wp_customize->add_setting( 'blogger_hub_preloader_color', array(
	    'default' => '#333333',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blogger_hub_preloader_color', array(
  		'label' => __('Preloader Color', 'blogger-hub'),
	    'section' => 'blogger_hub_advance_options',
	    'settings' => 'blogger_hub_preloader_color',
  	)));

  	$wp_customize->add_setting( 'blogger_hub_preloader_bg_color', array(
	    'default' => '#ffffff',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blogger_hub_preloader_bg_color', array(
  		'label' => __('Preloader Background Color', 'blogger-hub'),
	    'section' => 'blogger_hub_advance_options',
	    'settings' => 'blogger_hub_preloader_bg_color',
  	)));

  	$wp_customize->add_setting('blogger_hub_preloader_type',array(
        'default' => 'Square',
        'sanitize_callback' => 'blogger_hub_sanitize_choices'
	));
	$wp_customize->add_control('blogger_hub_preloader_type',array(
        'type' => 'radio',
        'label' => __('Preloader Type','blogger-hub'),
        'section' => 'blogger_hub_advance_options',
        'choices' => array(
            'Square' => __('Square','blogger-hub'),
            'Circle' => __('Circle','blogger-hub'),
        ),
	) );

	$wp_customize->add_setting('blogger_hub_theme_layout_options',array(
        'default' => 'Default Theme',
        'sanitize_callback' => 'blogger_hub_sanitize_choices'
	));
	$wp_customize->add_control('blogger_hub_theme_layout_options',array(
        'type' => 'radio',
        'label' => __('Theme Layout','blogger-hub'),
        'section' => 'blogger_hub_advance_options',
        'choices' => array(
            'Default Theme' => __('Default Theme','blogger-hub'),
            'Container Theme' => __('Container Theme','blogger-hub'),
            'Box Container Theme' => __('Box Container Theme','blogger-hub'),
        ),
	) );

	$wp_customize->add_setting( 'blogger_hub_single_page_breadcrumb',array(
		'default' => true,
      	'sanitize_callback'	=> 'blogger_hub_sanitize_checkbox'
    ) );
    $wp_customize->add_control('blogger_hub_single_page_breadcrumb',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Single Page Breadcrumb','blogger-hub' ),
        'section' => 'blogger_hub_advance_options'
    ));

	//404 Page Option
	$wp_customize->add_section('blogger_hub_404_settings',array(
		'title'	=> __('404 Page & Search Result Settings','blogger-hub'),
		'priority'	=> null,
		'panel' => 'blogger_hub_panel_id',
	));

	$wp_customize->add_setting('blogger_hub_404_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('blogger_hub_404_title',array(
		'label'	=> __('404 Title','blogger-hub'),
		'section'	=> 'blogger_hub_404_settings',
		'type'		=> 'text'
	));	

	$wp_customize->add_setting('blogger_hub_404_button_label',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('blogger_hub_404_button_label',array(
		'label'	=> __('404 button Label','blogger-hub'),
		'section'	=> 'blogger_hub_404_settings',
		'type'		=> 'text'
	));	

	$wp_customize->add_setting('blogger_hub_search_result_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('blogger_hub_search_result_title',array(
		'label'	=> __('No Search Result Title','blogger-hub'),
		'section'	=> 'blogger_hub_404_settings',
		'type'		=> 'text'
	));	

	$wp_customize->add_setting('blogger_hub_search_result_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('blogger_hub_search_result_text',array(
		'label'	=> __('No Search Result Text','blogger-hub'),
		'section'	=> 'blogger_hub_404_settings',
		'type'		=> 'text'
	));	

	//Responsive Settings
	$wp_customize->add_section('blogger_hub_responsive_options',array(
		'title'	=> __('Responsive Options','blogger-hub'),
		'panel' => 'blogger_hub_panel_id'
	));

	$wp_customize->add_setting('blogger_hub_menu_open_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Blogger_Hub_Icon_Selector(
        $wp_customize,'blogger_hub_menu_open_icon',array(
		'label'	=> __('Menu Open Icon','blogger-hub'),
		'section' => 'blogger_hub_responsive_options',
		'type'	  => 'icon',
	)));

	$wp_customize->add_setting('blogger_hub_mobile_menu_label',array(
       'default' => __('Menu','blogger-hub'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('blogger_hub_mobile_menu_label',array(
       'type' => 'text',
       'label' => __('Mobile Menu Label','blogger-hub'),
       'section' => 'blogger_hub_responsive_options'
    ));

	$wp_customize->add_setting('blogger_hub_menu_close_icon',array(
		'default'	=> 'fas fa-times-circle',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Blogger_Hub_Icon_Selector(
        $wp_customize,'blogger_hub_menu_close_icon',array(
		'label'	=> __('Menu Close Icon','blogger-hub'),
		'section' => 'blogger_hub_responsive_options',
		'type'	  => 'icon',
	)));

	$wp_customize->add_setting('blogger_hub_close_menu_label',array(
       'default' => __('Close Menu','blogger-hub'),
       'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('blogger_hub_close_menu_label',array(
       'type' => 'text',
       'label' => __('Close Menu Label','blogger-hub'),
       'section' => 'blogger_hub_responsive_options'
    ));

    //toggle button bg-color
	$wp_customize->add_setting( 'blogger_hub_toggle_button_bg_color_settings', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blogger_hub_toggle_button_bg_color_settings', array(
  		'label' => __('Toggle Button Bg Color', 'blogger-hub'),
	    'section' => 'blogger_hub_responsive_options',
	    'settings' => 'blogger_hub_toggle_button_bg_color_settings',
  	)));

    $wp_customize->add_setting('blogger_hub_sticky_header_responsive',array(
        'default' => false,
        'sanitize_callback'	=> 'blogger_hub_sanitize_checkbox'
	));
	$wp_customize->add_control('blogger_hub_sticky_header_responsive',array(
     	'type' => 'checkbox',
      	'label' => __('Enable Sticky Header','blogger-hub'),
      	'section' => 'blogger_hub_responsive_options',
	));

    $wp_customize->add_setting('blogger_hub_preloader_responsive',array(
        'default' => false,
        'sanitize_callback'	=> 'blogger_hub_sanitize_checkbox'
	));
	$wp_customize->add_control('blogger_hub_preloader_responsive',array(
     	'type' => 'checkbox',
      	'label' => __('Enable Preloader','blogger-hub'),
      	'section' => 'blogger_hub_responsive_options',
	));

	$wp_customize->add_setting('blogger_hub_backtotop_responsive',array(
        'default' => true,
        'sanitize_callback'	=> 'blogger_hub_sanitize_checkbox'
	));
	$wp_customize->add_control('blogger_hub_backtotop_responsive',array(
     	'type' => 'checkbox',
      	'label' => __('Enable Back to Top','blogger-hub'),
      	'section' => 'blogger_hub_responsive_options',
	));

	$wp_customize->add_setting( 'blogger_hub_sidebar_hide_show',array(
      'default' => true,
      'sanitize_callback'	=> 'blogger_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('blogger_hub_sidebar_hide_show',array(
      'type' => 'checkbox',
      'label' => esc_html__( 'Enable Sidebar','blogger-hub' ),
      'section' => 'blogger_hub_responsive_options'
    ));

	//Woocommerce Options
	$wp_customize->add_section('blogger_hub_woocommerce',array(
		'title'	=> __('WooCommerce Options','blogger-hub'),
		'panel' => 'blogger_hub_panel_id',
	));

	$wp_customize->add_setting('blogger_hub_shop_page_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'blogger_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('blogger_hub_shop_page_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Enable Shop Page Sidebar','blogger-hub'),
       'section' => 'blogger_hub_woocommerce'
    ));

    // shop page sidebar alignment
    $wp_customize->add_setting('blogger_hub_shop_page_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'blogger_hub_sanitize_choices',
	));
	$wp_customize->add_control('blogger_hub_shop_page_layout',array(
		'type'           => 'radio',
		'label'          => __('Shop Page Layout', 'blogger-hub'),
		'section'        => 'blogger_hub_woocommerce',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'blogger-hub'),
			'Right Sidebar' => __('Right Sidebar', 'blogger-hub'),
		),
	));

    $wp_customize->add_setting('blogger_hub_shop_page_navigation',array(
       'default' => true,
       'sanitize_callback' => 'blogger_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('blogger_hub_shop_page_navigation',array(
       'type' => 'checkbox',
       'label' => __('Enable Shop Page Pagination','blogger-hub'),
       'section' => 'blogger_hub_woocommerce'
    ));

    $wp_customize->add_setting('blogger_hub_single_product_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'blogger_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('blogger_hub_single_product_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Enable Single Product Page Sidebar','blogger-hub'),
       'section' => 'blogger_hub_woocommerce'
    ));

    // Single product Page sidebar alignment
    $wp_customize->add_setting('blogger_hub_single_product_page_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'blogger_hub_sanitize_choices',
	));
	$wp_customize->add_control('blogger_hub_single_product_page_layout',array(
		'type'           => 'radio',
		'label'          => __('Single Product Page Layout', 'blogger-hub'),
		'section'        => 'blogger_hub_woocommerce',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'blogger-hub'),
			'Right Sidebar' => __('Right Sidebar', 'blogger-hub'),
		),
	));

    $wp_customize->add_setting('blogger_hub_single_related_products',array(
       'default' => true,
       'sanitize_callback' => 'blogger_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('blogger_hub_single_related_products',array(
       'type' => 'checkbox',
       'label' => __('Enable related Products','blogger-hub'),
       'section' => 'blogger_hub_woocommerce'
    ));

    $wp_customize->add_setting('blogger_hub_products_per_page',array(
		'default'=> '9',
		'sanitize_callback'	=> 'blogger_hub_sanitize_float'
	));
	$wp_customize->add_control('blogger_hub_products_per_page',array(
		'label'	=> __('Products Per Page','blogger-hub'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'blogger_hub_woocommerce',
		'type'=> 'number',
	));

	$wp_customize->add_setting('blogger_hub_products_per_row',array(
		'default'=> '3',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('blogger_hub_products_per_row',array(
		'label'	=> __('Products Per Row','blogger-hub'),
		'choices' => array(
            '2' => '2',
			'3' => '3',
			'4' => '4',
        ),
		'section'=> 'blogger_hub_woocommerce',
		'type'=> 'select',
	));

	$wp_customize->add_setting('blogger_hub_product_border',array(
       'default' => true,
       'sanitize_callback'	=> 'blogger_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('blogger_hub_product_border',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide product border','blogger-hub'),
       'section' => 'blogger_hub_woocommerce',
    ));

    $wp_customize->add_setting('blogger_hub_product_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('blogger_hub_product_padding',array(
		'label'	=> esc_html__('Product Padding','blogger-hub'),
		'section'=> 'blogger_hub_woocommerce',
	));

	$wp_customize->add_setting( 'blogger_hub_product_top_padding',array(
		'default' => 10,
		'sanitize_callback' => 'blogger_hub_sanitize_float'
	));
	$wp_customize->add_control('blogger_hub_product_top_padding', array(
		'label' => esc_html__( 'Top','blogger-hub' ),
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type' => 'number',
		'section' => 'blogger_hub_woocommerce',
	));

	$wp_customize->add_setting('blogger_hub_product_bottom_padding',array(
		'default' => 10,
		'sanitize_callback' => 'blogger_hub_sanitize_float'
	));
	$wp_customize->add_control('blogger_hub_product_bottom_padding', array(
		'label' => esc_html__( 'Bottom','blogger-hub' ),
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type' => 'number',
		'section' => 'blogger_hub_woocommerce',
	));

	$wp_customize->add_setting('blogger_hub_product_left_padding',array(
		'default' => 10,
		'sanitize_callback' => 'blogger_hub_sanitize_float'
	));
	$wp_customize->add_control('blogger_hub_product_left_padding', array(
		'label' => esc_html__( 'Left','blogger-hub' ),
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type' => 'number',
		'section' => 'blogger_hub_woocommerce',
	));

	$wp_customize->add_setting( 'blogger_hub_product_right_padding',array(
		'default' => 10,
		'sanitize_callback' => 'blogger_hub_sanitize_float'
	));
	$wp_customize->add_control('blogger_hub_product_right_padding', array(
		'label' => esc_html__( 'Right','blogger-hub' ),
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type' => 'number',
		'section' => 'blogger_hub_woocommerce',
	));

	$wp_customize->add_setting( 'blogger_hub_product_border_radius',array(
		'default' => '0',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control( new Blogger_Hub_WP_Customize_Range_Control( $wp_customize, 'blogger_hub_product_border_radius', array(
        'label'  => __('Product Border Radius','blogger-hub'),
        'section'  => 'blogger_hub_woocommerce',
        'description' => __('Measurement is in pixel.','blogger-hub'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        )
    )));

	$wp_customize->add_setting('blogger_hub_product_button_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('blogger_hub_product_button_padding',array(
		'label'	=> esc_html__('Product Button Padding','blogger-hub'),
		'section'=> 'blogger_hub_woocommerce',
	));

	$wp_customize->add_setting( 'blogger_hub_product_button_top_padding',array(
		'default' => 10,
		'sanitize_callback' => 'blogger_hub_sanitize_float'
	));
	$wp_customize->add_control('blogger_hub_product_button_top_padding', array(
		'label' => esc_html__( 'Top','blogger-hub' ),
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type' => 'number',
		'section' => 'blogger_hub_woocommerce',
	));

	$wp_customize->add_setting('blogger_hub_product_button_bottom_padding',array(
		'default' => 10,
		'sanitize_callback' => 'blogger_hub_sanitize_float'
	));
	$wp_customize->add_control('blogger_hub_product_button_bottom_padding', array(
		'label' => esc_html__( 'Bottom','blogger-hub' ),
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type' => 'number',
		'section' => 'blogger_hub_woocommerce',
	));

	$wp_customize->add_setting('blogger_hub_product_button_left_padding',array(
		'default' => 15,
		'sanitize_callback' => 'blogger_hub_sanitize_float'
	));
	$wp_customize->add_control('blogger_hub_product_button_left_padding', array(
		'label' => esc_html__( 'Left','blogger-hub' ),
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type' => 'number',
		'section' => 'blogger_hub_woocommerce',
	));

	$wp_customize->add_setting( 'blogger_hub_product_button_right_padding',array(
		'default' => 15,
		'sanitize_callback' => 'blogger_hub_sanitize_float'
	));
	$wp_customize->add_control('blogger_hub_product_button_right_padding', array(
		'label' => esc_html__( 'Right','blogger-hub' ),
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type' => 'number',
		'section' => 'blogger_hub_woocommerce',
	));

	$wp_customize->add_setting( 'blogger_hub_product_button_border_radius',array(
		'default' => '0',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control( new Blogger_Hub_WP_Customize_Range_Control( $wp_customize, 'blogger_hub_product_button_border_radius', array(
        'label'  => __('Product Button Border Radius','blogger-hub'),
        'section'  => 'blogger_hub_woocommerce',
        'description' => __('Measurement is in pixel.','blogger-hub'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        )
    )));

    $wp_customize->add_setting('blogger_hub_product_sale_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'blogger_hub_sanitize_choices'
	));
	$wp_customize->add_control('blogger_hub_product_sale_position',array(
        'type' => 'radio',
        'label' => __('Product Sale Position','blogger-hub'),
        'section' => 'blogger_hub_woocommerce',
        'choices' => array(
            'Left' => __('Left','blogger-hub'),
            'Right' => __('Right','blogger-hub'),
        ),
	) );

	$wp_customize->add_setting( 'blogger_hub_product_sale_font_size',array(
		'default' => '13',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control( new Blogger_Hub_WP_Customize_Range_Control( $wp_customize, 'blogger_hub_product_sale_font_size', array(
        'label'  => __('Product Sale Font Size','blogger-hub'),
        'section'  => 'blogger_hub_woocommerce',
        'description' => __('Measurement is in pixel.','blogger-hub'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        )
    )));

    $wp_customize->add_setting('blogger_hub_product_sale_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('blogger_hub_product_sale_padding',array(
		'label'	=> esc_html__('Product Sale Padding','blogger-hub'),
		'section'=> 'blogger_hub_woocommerce',
	));

	$wp_customize->add_setting( 'blogger_hub_product_sale_top_padding',array(
		'default' => 0,
		'sanitize_callback' => 'blogger_hub_sanitize_float'
	));
	$wp_customize->add_control('blogger_hub_product_sale_top_padding', array(
		'label' => esc_html__( 'Top','blogger-hub' ),
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type' => 'number',
		'section' => 'blogger_hub_woocommerce',
	));

	$wp_customize->add_setting('blogger_hub_product_sale_bottom_padding',array(
		'default' => 0,
		'sanitize_callback' => 'blogger_hub_sanitize_float'
	));
	$wp_customize->add_control('blogger_hub_product_sale_bottom_padding', array(
		'label' => esc_html__( 'Bottom','blogger-hub' ),
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type' => 'number',
		'section' => 'blogger_hub_woocommerce',
	));

	$wp_customize->add_setting('blogger_hub_product_sale_left_padding',array(
		'default' => 0,
		'sanitize_callback' => 'blogger_hub_sanitize_float'
	));
	$wp_customize->add_control('blogger_hub_product_sale_left_padding', array(
		'label' => esc_html__( 'Left','blogger-hub' ),
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type' => 'number',
		'section' => 'blogger_hub_woocommerce',
	));

	$wp_customize->add_setting('blogger_hub_product_sale_right_padding',array(
		'default' => 0,
		'sanitize_callback' => 'blogger_hub_sanitize_float'
	));
	$wp_customize->add_control('blogger_hub_product_sale_right_padding', array(
		'label' => esc_html__( 'Right','blogger-hub' ),
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type' => 'number',
		'section' => 'blogger_hub_woocommerce',
	));

	$wp_customize->add_setting( 'blogger_hub_product_sale_border_radius',array(
		'default' => '50',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control( new Blogger_Hub_WP_Customize_Range_Control( $wp_customize, 'blogger_hub_product_sale_border_radius', array(
        'label'  => __('Product Sale Border Radius','blogger-hub'),
        'section'  => 'blogger_hub_woocommerce',
        'description' => __('Measurement is in pixel.','blogger-hub'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        ),
    )));
	
	//footer text
	$wp_customize->add_section('blogger_hub_footer_section',array(
		'title'	=> __('Footer Section','blogger-hub'),
		'panel' => 'blogger_hub_panel_id'
	));

	$wp_customize->add_setting('blogger_hub_hide_scroll',array(
        'default' => 'true',
        'sanitize_callback'	=> 'blogger_hub_sanitize_checkbox'
	));
	$wp_customize->add_control('blogger_hub_hide_scroll',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Back To Top','blogger-hub'),
      	'section' => 'blogger_hub_footer_section',
	));

	$wp_customize->add_setting('blogger_hub_back_to_top',array(
        'default' => 'Right',
        'sanitize_callback' => 'blogger_hub_sanitize_choices'
	));
	$wp_customize->add_control('blogger_hub_back_to_top',array(
        'type' => 'radio',
        'label' => __('Back to Top Alignment','blogger-hub'),
        'section' => 'blogger_hub_footer_section',
        'choices' => array(
            'Left' => __('Left','blogger-hub'),
            'Right' => __('Right','blogger-hub'),
            'Center' => __('Center','blogger-hub'),
        ),
	) );

	$wp_customize->add_setting('blogger_hub_footer_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blogger_hub_footer_bg_color', array(
		'label'    => __('Footer Background Color', 'blogger-hub'),
		'section'  => 'blogger_hub_footer_section',
	)));

	$wp_customize->add_setting('blogger_hub_footer_bg_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'blogger_hub_footer_bg_image',array(
        'label' => __('Footer Background Image','blogger-hub'),
        'section' => 'blogger_hub_footer_section'
	)));

	$wp_customize->add_setting('blogger_hub_footer_widget',array(
        'default'           => '4',
        'sanitize_callback' => 'blogger_hub_sanitize_choices',
    ));
    $wp_customize->add_control('blogger_hub_footer_widget',array(
        'type'        => 'radio',
        'label'       => __('No. of Footer columns', 'blogger-hub'),
        'section'     => 'blogger_hub_footer_section',
        'description' => __('Select the number of footer columns and add your widgets in the footer.', 'blogger-hub'),
        'choices' => array(
            '1'     => __('One column', 'blogger-hub'),
            '2'     => __('Two columns', 'blogger-hub'),
            '3'     => __('Three columns', 'blogger-hub'),
            '4'     => __('Four columns', 'blogger-hub')
        ),
    )); 

    $wp_customize->add_setting('blogger_hub_copyright_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blogger_hub_copyright_bg_color', array(
		'label'    => __('Copyright Background Color', 'blogger-hub'),
		'section'  => 'blogger_hub_footer_section',
	)));

    $wp_customize->add_setting('blogger_hub_copyright_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('blogger_hub_copyright_padding',array(
		'label'	=> esc_html__('Copyright Padding','blogger-hub'),
		'section'=> 'blogger_hub_footer_section',
	));

    $wp_customize->add_setting('blogger_hub_top_copyright_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'blogger_hub_sanitize_float'
	));
	$wp_customize->add_control('blogger_hub_top_copyright_padding',array(
		'description'	=> __('Top','blogger-hub'),
		'input_attrs' => array(
            'step' => 1,
			'min' => 0,
			'max' => 50,
        ),
		'section'=> 'blogger_hub_footer_section',
		'type'=> 'number'
	));

	$wp_customize->add_setting('blogger_hub_bottom_copyright_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'blogger_hub_sanitize_float'
	));
	$wp_customize->add_control('blogger_hub_bottom_copyright_padding',array(
		'description'	=> __('Bottom','blogger-hub'),
		'input_attrs' => array(
            'step' => 1,
			'min' => 0,
			'max' => 50,
        ),
		'section'=> 'blogger_hub_footer_section',
		'type'=> 'number'
	));

	$wp_customize->add_setting('blogger_hub_copyright_alignment',array(
        'default' => 'center',
        'sanitize_callback' => 'blogger_hub_sanitize_choices'
	));
	$wp_customize->add_control('blogger_hub_copyright_alignment',array(
        'type' => 'radio',
        'label' => __('Copyright Alignment','blogger-hub'),
        'section' => 'blogger_hub_footer_section',
        'choices' => array(
            'left' => __('Left','blogger-hub'),
            'right' => __('Right','blogger-hub'),
            'center' => __('Center','blogger-hub'),
        ),
	) );

	$wp_customize->add_setting( 'blogger_hub_copyright_font_size', array(
		'default'=> '15',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Blogger_Hub_WP_Customize_Range_Control( $wp_customize, 'blogger_hub_copyright_font_size', array(
        'label'  => __('Copyright Font Size','blogger-hub'),
        'section'  => 'blogger_hub_footer_section',
        'description' => __('Measurement is in pixel.','blogger-hub'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
    ))));
	
	$wp_customize->add_setting('blogger_hub_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('blogger_hub_text',array(
		'label'	=> __('Copyright Text','blogger-hub'),
		'description'	=> __('Add some text for footer like copyright etc.','blogger-hub'),
		'section'	=> 'blogger_hub_footer_section',
		'type'		=> 'text'
	));	
}
add_action( 'customize_register', 'blogger_hub_customize_register' );

// logo resize
load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Blogger_Hub_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Blogger_Hub_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Blogger_Hub_Customize_Section_Pro(
				$manager,
				'blogger_hub_pro_link',
				array(
					'priority'   => 9,
					'title'    => esc_html__( 'Blogger Hub Pro', 'blogger-hub' ),
					'pro_text' => esc_html__( 'Go Pro', 'blogger-hub' ),
					'pro_url'  => esc_url('https://www.themesglance.com/themes/premium-blog-wordpress-theme/'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'blogger-hub-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'blogger-hub-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Blogger_Hub_Customize::get_instance();