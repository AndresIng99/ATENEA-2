<?php
/**
 * WP_Dark_Mode_Control_Image_Choose extends \Elementor\Base_Data_Control
 *
 * @version 1.0.0
 * @package WP_DARK_MODE
 */

// if direct access than exit the file.
defined( 'ABSPATH' ) || exit();

/**
 * WP_Dark_Mode_Control_Image_Choose extends \Elementor\Base_Data_Control
 *
 * @version 1.0.0
 */
class WP_Dark_Mode_Control_Image_Choose extends \Elementor\Base_Data_Control {

	/**
	 * Get choose control type.
	 *
	 * Retrieve the control type, in this case `choose`.
	 *
	 * @return string Control type.
	 * @since  1.0.0
	 * @access public
	 */
	public function get_type() {
		return 'image_choose';
	}

	/**
	 * Enqueue control scripts and styles.
	 *
	 * @since  1.0.0
	 * @access public
	 */
	public function enqueue() {
		wp_register_style(
			'wp-dark-mode-css-image-choose-control',
			WP_DARK_MODE_URL . 'includes/elementor/modules/controls/assets/css/image-choose.css',
			[],
			'1.0.0'
		);

		wp_enqueue_style( 'wp-dark-mode-css-image-choose-control' );
		wp_enqueue_style( 'wp-dark-mode-admin', WP_DARK_MODE_ASSETS . '/css/admin.css', [], WP_DARK_MODE_VERSION );
		wp_enqueue_script( 'jquery.syotimer', WP_DARK_MODE_ASSETS . '/vendor/jquery.syotimer.min.js', [ 'jquery' ], '2.1.2', true );

		wp_register_script(
			'wp-dark-mode-js-image-choose-control',
			WP_DARK_MODE_URL . 'includes/elementor/modules/controls/assets/js/image-choose.js',
			[ 'jquery' ],
			WP_DARK_MODE_VERSION,
			true
		);

		wp_enqueue_script( 'wp-dark-mode-js-image-choose-control' );
	}

	/**
	 * Render choose control output in the editor.
	 *
	 * Used to generate the control HTML in the editor using Underscore JS
	 * template. The variables for the class are available using `data` JS
	 * object.
	 *
	 * @return mixed
	 * @since  1.0.0
	 * @access public
	 */
	public function content_template() {
		$control_uid = $this->get_control_uid( '{{value}}' );

		$enabled = true;
		if ( $control_uid > 3 ) {
			$enabled = false;
		}
		?>
		<div class="elementor-control-field">
			<label class="elementor-control-title">{{{ data.label }}}</label>
			<div class="elementor-control-input-wrapper">
				<div class="elementor-image-choices">
					<# _.each( data.options, function( options, value ) { #>
						<div class="image-choose-label-block {{value <= 3 || <?php echo wp_dark_mode()->is_pro_active() || wp_dark_mode()->is_ultimate_active() ? 1 : 0; ?> ? '' : 'disabled' }}">
							<input id="<?php echo esc_attr( $control_uid ); ?>" type="radio" name="elementor-choose-{{ data.name }}-{{ data._cid }}" value="{{ value }}">
							<label class="elementor-image-choices-label" for="<?php echo esc_attr( $control_uid ); ?>" title="{{ options.title }}">
								<img class="image_small" src="{{ options.image_small }}" alt="{{ options.title }}" />
								<span class="elementor-screen-only">{{{ options.title }}}</span>
							</label>
						</div>
						<# } ); #>
				</div>
			</div>
		</div>

		<# if ( data.description ) { #>
			<div class="elementor-control-field-description">{{{ data.description }}}</div>
			<# } #>
		<?php
	}

	/**
	 * Get choose control default settings.
	 *
	 * Retrieve the default settings of the choose control. Used to return the
	 * default settings while initializing the choose control.
	 *
	 * @return array Control default settings.
	 * @since  1.0.0
	 * @access protected
	 */
	protected function get_default_settings() {
		return [
			'label_block' => true,
			'options'     => [],
		];
	}
}