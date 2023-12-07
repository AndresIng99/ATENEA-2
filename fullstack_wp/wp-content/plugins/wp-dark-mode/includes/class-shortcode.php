<?php
/**
 * WP Dark Mode Shortcode to create WP Dark Mode Switcher
 *
 * @package WP Dark Mode
 * @since Unknown
 */

defined( 'ABSPATH' ) || exit();

/**
 * Check class is already exists
 *
 * @version 1.0.0
 */
if ( ! class_exists( 'WP_Dark_Mode_Shortcode' ) ) {
	/**
	 * Register WP dark Mode switcher shortcode.
	 *
	 * @version Unknown
	 */
	class WP_Dark_Mode_Shortcode {
		/**
		 * A reference to an instance of this class.
		 *
		 * @since  Unknown
		 * @var object
		 */
		private static $instance = null;

		/**
		 * Loads the instance of this class.
		 *
		 * @version 1.0.0
		 */
		public function __construct() {
			add_shortcode( 'wp_dark_mode', [ $this, 'render_dark_mode_btn' ] );
			add_shortcode( 'wp_dark_mode_switch', [ $this, 'render_dark_mode_btn' ] );
			add_shortcode( 'wp-dark-mode', [ $this, 'render_dark_mode_btn' ] );
			add_shortcode( 'wp-dark-mode-switch', [ $this, 'render_dark_mode_btn' ] );
		}

		/**
		 * Renders the WP Dark Mode Switcher.
		 *
		 * @param array $atts shortcode attributes.
		 *
		 * @return string $html button switch html.
		 * @version 1.0.0
		 */
		public function render_dark_mode_btn( $atts = [] ) {
			// Return if the dark mode is disabled.
			if ( ! wp_dark_mode_enabled() ) {
				return '';
			}

			$atts = shortcode_atts(
				[
					'floating' => 'no',
					'class'    => '',
					'style'    => 1,
				],
				// Allowing only these three attributes from user, which are checked and sanitized.
				[
					'floating' => isset( $atts['floating'] ) ? sanitize_text_field( wp_unslash( $atts['floating'] ) ) : 'no',
					'class'    => isset( $atts['class'] ) ? sanitize_text_field( wp_unslash( $atts['class'] ) ) : '',
					'style'    => isset( $atts['style'] ) ? sanitize_text_field( wp_unslash( $atts['style'] ) ) : 1,
				]
			);

			$is_floating = 'yes' === $atts['floating'];
			$style       = absint( $atts['style'] );
			$custom_icon = false;

			// Check if the custom switch icon is enabled.
			if ( $this->is_license_valid() ) {
				$custom_icon = 'on' === esc_attr( wp_dark_mode_get_settings( 'wp_dark_mode_switch', 'custom_switch_icon', 'off' ) );
			}

			// Check if the switch is floating.
			if ( $is_floating ) {

				if ( 'on' === esc_attr( wp_dark_mode_get_settings( 'wp_dark_mode_switch', 'enable_cta', 'off' ) ) ) {
					$atts['cta_text'] = esc_html( wp_dark_mode_get_settings( 'wp_dark_mode_switch', 'cta_text' ) );
				}

				// Get the switch position.
				$position = esc_attr( wp_dark_mode_get_settings( 'wp_dark_mode_switch', 'switcher_position', 'right_bottom' ) );
				if ( 'custom' === $position ) {
					$position = esc_attr( wp_dark_mode_get_settings( 'wp_dark_mode_switch', 'switch_side', 'right_bottom' ) );
				}

				$atts['position'] = $position;
			}

			ob_start();

			if ( $custom_icon ) {
				wp_dark_mode()->get_template( 'btn-custom', $atts );
			} else {

				// Reset the style if the license is not valid.
				if ( ! $this->is_license_valid() && $style > 3 ) {
					$style = 1;
				}
				$template = wp_sprintf( 'btn-%s.php', $style );

				if ( 14 === $style && ! $is_floating ) {
					wp_dark_mode()->get_template( 'btn-2', $atts );
				} elseif ( file_exists( WP_DARK_MODE_TEMPLATES . '/' . $template ) ) {
					wp_dark_mode()->get_template( wp_sprintf( 'btn-%s', $style ), $atts);
				} else {
					wp_dark_mode()->get_template( 'btn-1', $atts);
				}
			}

			$html = ob_get_clean();

			return wp_kses( $html, wpdm_extended_kses() );
		}

		/**
		 * Checks if the license is valid.
		 *
		 * @return mixed
		 * @version 1.0.0
		 */
		private function is_license_valid() {
			global $wp_dark_mode_license;

			if ( ! $wp_dark_mode_license ) {
				return false;
			}

			return $wp_dark_mode_license->is_valid();
		}

		/**
		 * Singleton instance WP_Dark_Mode_Shortcode class
		 *
		 * @return WP_Dark_Mode_Shortcode|null
		 * @version 1.0.0
		 */
		public static function instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}
	}

	/**
	 * Kick out the WP_Dark_Mode_Shortcode class.
	 */
	WP_Dark_Mode_Shortcode::instance();
}
