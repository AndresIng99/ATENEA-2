<?php
/**
 * If the customer use the 2.0.0 version call this class
 * update some Necessary option setting value for compatible this version
 *
 * @version 1.0.0
 * @package WP_DARK_MODE
 */

// if direct access than exit the file.
defined( 'ABSPATH' ) || exit();

/**
 * If the customer use the 2.0.0 version call this class
 * update some Necessary option setting value for compatible this version
 *
 * @version 1.0.0
 */
class WP_Dark_Mode_Update_2_0_0 {

	/**
	 * Contains class instance.
	 *
	 * @var null
	 */
	private static $instance = null;

	/**
	 * Class constructor.
	 *
	 * @return void
	 * @version 1.0.0
	 */
	public function __construct() {
		$this->update_switch_settings();
		$this->update_includes_excludes();
		$this->update_advanced_settings();
		$this->update_color_settings();

		set_transient( 'wp_dark_mode_review_notice_interval', 'off', 7 * DAY_IN_SECONDS );
	}

	/**
	 * Update switch settings option value
	 *
	 * @return void
	 * @version 1.0.0
	 */
	private function update_switch_settings() {
		$general_settings = (array) get_option( 'wp_dark_mode_general', [] );
		$display_settings = (array) get_option( 'wp_dark_mode_display', [] );

		$new_settings = array_merge( $general_settings, $display_settings );

		update_option( 'wp_dark_mode_switch', $new_settings );
	}

	/**
	 * Update includes excludes setting value
	 * under the includes/excludes sider bar nav
	 *
	 * @return void
	 * @version 1.0.0
	 */
	private function update_includes_excludes() {
		$advanced_settings = (array) get_option( 'wp_dark_mode_advanced', [] );
		$display_settings  = (array) get_option( 'wp_dark_mode_display', [] );

		$new_settings = array_merge( $advanced_settings, $display_settings );

		update_option( 'wp_dark_mode_includes_excludes', $new_settings );
	}

	/**
	 * Update advanced settings option value
	 *
	 * Under the advanced settings sider bar nav
	 *
	 * @version 1.0.0
	 * @return void
	 */
	private function update_advanced_settings() {
		$general_settings  = (array) get_option( 'wp_dark_mode_general' );
		$advanced_settings = (array) get_option( 'wp_dark_mode_advanced' );

		$new_settings = array_merge( $general_settings, $advanced_settings );

		update_option( 'wp_dark_mode_advanced', $new_settings );
	}

	/**
	 * Update color settings option value
	 *
	 * @return void
	 * @version 1.0.0
	 */
	private function update_color_settings() {
		$color_settings                  = (array) get_option( 'wp_dark_mode_style' );
		$color_settings['enable_preset'] = 'on';

		update_option( 'wp_dark_mode_color', $color_settings );
	}

	/**
	 * Singleton instance WP_Dark_Mode_Update_2_0_0 class
	 *
	 * @return WP_Dark_Mode_Update_2_0_0|null
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
 * Kick out the class
 */
WP_Dark_Mode_Update_2_0_0::instance();
