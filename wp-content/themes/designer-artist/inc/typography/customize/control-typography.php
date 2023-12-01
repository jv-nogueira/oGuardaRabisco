<?php
/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */

class Designer_Artist_Control_Typography extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'designer-artist-typography';

	/**
	 * Array 
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $l10n = array();

	/**
	 * Set up our control.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @param  string  $id
	 * @param  array   $args
	 * @return void
	 */
	public function __construct( $manager, $id, $args = array() ) {

		// Let the parent class do its thing.
		parent::__construct( $manager, $id, $args );

		// Make sure we have labels.
		$this->l10n = wp_parse_args(
			$this->l10n,
			array(
				'color'       => esc_html__( 'Font Color', 'designer-artist' ),
				'family'      => esc_html__( 'Font Family', 'designer-artist' ),
				'size'        => esc_html__( 'Font Size',   'designer-artist' ),
				'weight'      => esc_html__( 'Font Weight', 'designer-artist' ),
				'style'       => esc_html__( 'Font Style',  'designer-artist' ),
				'line_height' => esc_html__( 'Line Height', 'designer-artist' ),
				'letter_spacing' => esc_html__( 'Letter Spacing', 'designer-artist' ),
			)
		);
	}

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'designer-artist-ctypo-customize-controls' );
		wp_enqueue_style(  'designer-artist-ctypo-customize-controls' );
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		// Loop through each of the settings and set up the data for it.
		foreach ( $this->settings as $setting_key => $setting_id ) {

			$this->json[ $setting_key ] = array(
				'link'  => $this->get_link( $setting_key ),
				'value' => $this->value( $setting_key ),
				'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : ''
			);

			if ( 'family' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_families();

			elseif ( 'weight' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_weight_choices();

			elseif ( 'style' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_style_choices();
		}
	}

	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function content_template() { ?>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<ul>

		<# if ( data.family && data.family.choices ) { #>

			<li class="typography-font-family">

				<# if ( data.family.label ) { #>
					<span class="customize-control-title">{{ data.family.label }}</span>
				<# } #>

				<select {{{ data.family.link }}}>

					<# _.each( data.family.choices, function( label, choice ) { #>
						<option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.weight && data.weight.choices ) { #>

			<li class="typography-font-weight">

				<# if ( data.weight.label ) { #>
					<span class="customize-control-title">{{ data.weight.label }}</span>
				<# } #>

				<select {{{ data.weight.link }}}>

					<# _.each( data.weight.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.weight.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.style && data.style.choices ) { #>

			<li class="typography-font-style">

				<# if ( data.style.label ) { #>
					<span class="customize-control-title">{{ data.style.label }}</span>
				<# } #>

				<select {{{ data.style.link }}}>

					<# _.each( data.style.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.style.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.size ) { #>

			<li class="typography-font-size">

				<# if ( data.size.label ) { #>
					<span class="customize-control-title">{{ data.size.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.size.link }}} value="{{ data.size.value }}" />

			</li>
		<# } #>

		<# if ( data.line_height ) { #>

			<li class="typography-line-height">

				<# if ( data.line_height.label ) { #>
					<span class="customize-control-title">{{ data.line_height.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.line_height.link }}} value="{{ data.line_height.value }}" />

			</li>
		<# } #>

		<# if ( data.letter_spacing ) { #>

			<li class="typography-letter-spacing">

				<# if ( data.letter_spacing.label ) { #>
					<span class="customize-control-title">{{ data.letter_spacing.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.letter_spacing.link }}} value="{{ data.letter_spacing.value }}" />

			</li>
		<# } #>

		</ul>
	<?php }

	/**
	 * Returns the available fonts.  Fonts should have available weights, styles, and subsets.
	 *
	 * @todo Integrate with Google fonts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_fonts() { return array(); }

	/**
	 * Returns the available font families.
	 *
	 * @todo Pull families from `get_fonts()`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	function get_font_families() {

		return array(
			'' => __( 'No Fonts', 'designer-artist' ),
        'Abril Fatface' => __( 'Abril Fatface', 'designer-artist' ),
        'Acme' => __( 'Acme', 'designer-artist' ),
        'Anton' => __( 'Anton', 'designer-artist' ),
        'Architects Daughter' => __( 'Architects Daughter', 'designer-artist' ),
        'Arimo' => __( 'Arimo', 'designer-artist' ),
        'Arsenal' => __( 'Arsenal', 'designer-artist' ),
        'Arvo' => __( 'Arvo', 'designer-artist' ),
        'Alegreya' => __( 'Alegreya', 'designer-artist' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'designer-artist' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'designer-artist' ),
        'Bangers' => __( 'Bangers', 'designer-artist' ),
        'Boogaloo' => __( 'Boogaloo', 'designer-artist' ),
        'Bad Script' => __( 'Bad Script', 'designer-artist' ),
        'Bitter' => __( 'Bitter', 'designer-artist' ),
        'Bree Serif' => __( 'Bree Serif', 'designer-artist' ),
        'BenchNine' => __( 'BenchNine', 'designer-artist' ),
        'Cabin' => __( 'Cabin', 'designer-artist' ),
        'Cardo' => __( 'Cardo', 'designer-artist' ),
        'Courgette' => __( 'Courgette', 'designer-artist' ),
        'Cherry Swash' => __( 'Cherry Swash', 'designer-artist' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'designer-artist' ),
        'Crimson Text' => __( 'Crimson Text', 'designer-artist' ),
        'Cuprum' => __( 'Cuprum', 'designer-artist' ),
        'Cookie' => __( 'Cookie', 'designer-artist' ),
        'Chewy' => __( 'Chewy', 'designer-artist' ),
        'Days One' => __( 'Days One', 'designer-artist' ),
        'Dosis' => __( 'Dosis', 'designer-artist' ),
        'Droid Sans' => __( 'Droid Sans', 'designer-artist' ),
        'Economica' => __( 'Economica', 'designer-artist' ),
        'Fredoka One' => __( 'Fredoka One', 'designer-artist' ),
        'Fjalla One' => __( 'Fjalla One', 'designer-artist' ),
        'Francois One' => __( 'Francois One', 'designer-artist' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'designer-artist' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'designer-artist' ),
        'Great Vibes' => __( 'Great Vibes', 'designer-artist' ),
        'Handlee' => __( 'Handlee', 'designer-artist' ),
        'Hammersmith One' => __( 'Hammersmith One', 'designer-artist' ),
        'Inconsolata' => __( 'Inconsolata', 'designer-artist' ),
        'Indie Flower' => __( 'Indie Flower', 'designer-artist' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'designer-artist' ),
        'Julius Sans One' => __( 'Julius Sans One', 'designer-artist' ),
        'Josefin Slab' => __( 'Josefin Slab', 'designer-artist' ),
        'Josefin Sans' => __( 'Josefin Sans', 'designer-artist' ),
        'Kanit' => __( 'Kanit', 'designer-artist' ),
        'Lobster' => __( 'Lobster', 'designer-artist' ),
        'Lato' => __( 'Lato', 'designer-artist' ),
        'Lora' => __( 'Lora', 'designer-artist' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'designer-artist' ),
        'Lobster Two' => __( 'Lobster Two', 'designer-artist' ),
        'Merriweather' => __( 'Merriweather', 'designer-artist' ),
        'Monda' => __( 'Monda', 'designer-artist' ),
        'Montserrat' => __( 'Montserrat', 'designer-artist' ),
        'Muli' => __( 'Muli', 'designer-artist' ),
        'Marck Script' => __( 'Marck Script', 'designer-artist' ),
        'Noto Serif' => __( 'Noto Serif', 'designer-artist' ),
        'Open Sans' => __( 'Open Sans', 'designer-artist' ),
        'Overpass' => __( 'Overpass', 'designer-artist' ),
        'Overpass Mono' => __( 'Overpass Mono', 'designer-artist' ),
        'Oxygen' => __( 'Oxygen', 'designer-artist' ),
        'Orbitron' => __( 'Orbitron', 'designer-artist' ),
        'Patua One' => __( 'Patua One', 'designer-artist' ),
        'Pacifico' => __( 'Pacifico', 'designer-artist' ),
        'Padauk' => __( 'Padauk', 'designer-artist' ),
        'Playball' => __( 'Playball', 'designer-artist' ),
        'Playfair Display' => __( 'Playfair Display', 'designer-artist' ),
        'PT Sans' => __( 'PT Sans', 'designer-artist' ),
        'Philosopher' => __( 'Philosopher', 'designer-artist' ),
        'Permanent Marker' => __( 'Permanent Marker', 'designer-artist' ),
        'Poiret One' => __( 'Poiret One', 'designer-artist' ),
        'Quicksand' => __( 'Quicksand', 'designer-artist' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'designer-artist' ),
        'Raleway' => __( 'Raleway', 'designer-artist' ),
        'Rubik' => __( 'Rubik', 'designer-artist' ),
        'Rokkitt' => __( 'Rokkitt', 'designer-artist' ),
        'Russo One' => __( 'Russo One', 'designer-artist' ),
        'Righteous' => __( 'Righteous', 'designer-artist' ),
        'Slabo' => __( 'Slabo', 'designer-artist' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'designer-artist' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'designer-artist'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'designer-artist' ),
        'Sacramento' => __( 'Sacramento', 'designer-artist' ),
        'Shrikhand' => __( 'Shrikhand', 'designer-artist' ),
        'Tangerine' => __( 'Tangerine', 'designer-artist' ),
        'Ubuntu' => __( 'Ubuntu', 'designer-artist' ),
        'VT323' => __( 'VT323', 'designer-artist' ),
        'Varela Round' => __( 'Varela Round', 'designer-artist' ),
        'Vampiro One' => __( 'Vampiro One', 'designer-artist' ),
        'Vollkorn' => __( 'Vollkorn', 'designer-artist' ),
        'Volkhov' => __( 'Volkhov', 'designer-artist' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'designer-artist' )
		);
	}

	/**
	 * Returns the available font weights.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_weight_choices() {

		return array(
			'' => esc_html__( 'No Fonts weight', 'designer-artist' ),
			'100' => esc_html__( 'Thin',       'designer-artist' ),
			'300' => esc_html__( 'Light',      'designer-artist' ),
			'400' => esc_html__( 'Normal',     'designer-artist' ),
			'500' => esc_html__( 'Medium',     'designer-artist' ),
			'700' => esc_html__( 'Bold',       'designer-artist' ),
			'900' => esc_html__( 'Ultra Bold', 'designer-artist' ),
		);
	}

	/**
	 * Returns the available font styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_style_choices() {

		return array(
			'' => esc_html__( 'No Fonts Style', 'designer-artist' ),
			'normal'  => esc_html__( 'Normal', 'designer-artist' ),
			'italic'  => esc_html__( 'Italic', 'designer-artist' ),
			'oblique' => esc_html__( 'Oblique', 'designer-artist' )
		);
	}
}
