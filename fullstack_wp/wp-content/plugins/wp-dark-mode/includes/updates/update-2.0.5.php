<?php
/**
 * If the customer use the 2.0.5 version call this class
 * update some Necessary option setting value for compatible this version
 *
 * @version 1.0.0
 * @package WP_DARK_MODE
 */

// if direct access than exit the file.
defined( 'ABSPATH' ) || exit();

/**
 * If the customer use the 2.0.5 version call this class
 * update some Necessary option setting value for compatible this version
 *
 * @version 1.0.0
 */
class WP_Dark_Mode_Update_2_0_5 {

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
	}

	/**
	 * Update switch settings option value
	 *
	 * @return void
	 * @version 1.0.0
	 */
	private function update_switch_settings() {
		$switch_settings = (array) get_option( 'wp_dark_mode_switch' );

		if ( 13 === $switch_settings['switch_style'] ) {
			$switch_settings['switch_style'] = 3;
		} elseif ( $switch_settings['switch_style'] > 2 ) {
			$switch_settings['switch_style'] += 1;
		}

		update_option( 'wp_dark_mode_switch', $switch_settings );
	}

	/**
	 * Singleton instance WP_Dark_Mode_Update_2_0_0 class
	 *
	 * @return WP_Dark_Mode_Update_2_0_5|null
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
WP_Dark_Mode_Update_2_0_5::instance();
