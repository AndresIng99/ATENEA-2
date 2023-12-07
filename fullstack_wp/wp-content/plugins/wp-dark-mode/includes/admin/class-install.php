<?php
/**
 * Class is loaded when the plugin is activated.
 * The class basically inserts the default data of the plugin.
 *
 * @version 1.0.0
 * @package WP_DARK_MODE
 */

// if direct access than exit the file.
defined( 'ABSPATH' ) || exit();

/**
 * Check class is already exists
 *
 * @version 1.0.0
 */
if ( ! class_exists( 'WP_Dark_Mode_Install' ) ) {
	/**
	 * Class is loaded when the plugin is activated.
	 * The class basically inserts the default data of the plugin.
	 *
	 * @version 1.0.0
	 */
	class WP_Dark_Mode_Install {

		/**
		 * Contains class instance.
		 *
		 * @var null
		 */
		private static $instance = null;

		/**
		 * WP_Dark_Mode_Install constructor.
		 * require once class-update.php and set some default data when plugin active
		 *
		 * @return void
		 * @since 1.0.0
		 */
		public function __construct() {
			if ( ! class_exists( 'WP_Dark_Mode_Update' ) ) {
				require_once WP_DARK_MODE_INCLUDES . '/admin/class-update.php';
			}

			$updater = new WP_Dark_Mode_Update();

			if ( ! $updater->needs_update() ) {
				self::create_default_data();
			}
		}

		/**
		 * Update default data.
		 *
		 * @since 2.0.8
		 */
		private static function create_default_data() {
			update_option( 'wp_dark_mode_version', WP_DARK_MODE_VERSION );

			$install_date = get_option( 'wp_dark_mode_install_time' );

			if ( empty( $install_date ) ) {
				update_option( 'wp_dark_mode_install_time', time() );
			}

			set_transient( 'wp_dark_mode_review_notice_interval', 'off', 7 * DAY_IN_SECONDS );
			set_transient( 'wp_dark_mode_affiliate_notice_interval', 'off', 10 * DAY_IN_SECONDS );
		}

		/**
		 * Singleton instance WP_Dark_Mode_Install class
		 *
		 * @return WP_Dark_Mode_Install|null
		 * @version 1.0.0
		 */
		public static function instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}
	}
}

/**
 * Kick out the class.
 */
WP_Dark_Mode_Install::instance();
