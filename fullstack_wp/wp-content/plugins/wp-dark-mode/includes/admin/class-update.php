<?php
/**
 * Compare the version and check if the plugin needs an update for compatible version
 * update some necessary optional fields value depend on version
 *
 * @version 1.0.0
 * @package WP_DARK_MODE
 */

// if direct access than exit the file.
defined( 'ABSPATH' ) || exit();

// Check if class exists.
if ( ! class_exists( 'WP_Dark_Mode_Update' ) ) {

	/**
	 * Compare the version and check if the plugin needs an update for compatible version
	 * update some necessary optional fields value depend on version
	 *
	 * @version 1.0.0
	 */
	class WP_Dark_Mode_Update {

		/**
		 * The upgrades
		 * Store version
		 *
		 * @var array
		 */
		private static $upgrades = [ '2.0.0', '2.0.5' ];

		/**
		 * Get current version
		 *
		 * @return string
		 * @version 1.0.0
		 */
		public function installed_version() {
			return esc_attr( get_option( 'wp_dark_mode_version' ) );
		}

		/**
		 * Check if the plugin needs any update
		 *
		 * @return mixed
		 */
		public function needs_update() {
			// Maybe it's the first install.
			if ( ! $this->installed_version() ) {
				return false;
			}

			// If previous version is lower.
			if ( version_compare( $this->installed_version(), WP_DARK_MODE_VERSION, '<' ) ) {
				return true;
			}

			return false;
		}

		/**
		 * Perform all the necessary upgrade routines
		 *
		 * @return void
		 */
		public function perform_updates() {
			foreach ( self::$upgrades as $version ) {
				if ( version_compare( $this->installed_version(), $version, '<' ) ) {
					include WP_DARK_MODE_INCLUDES . '/updates/update-' . $version . '.php';

					update_option( 'wp_dark_mode_version', $version );
				}
			}

			delete_option( 'wp_dark_mode_version' );
			update_option( 'wp_dark_mode_version', WP_DARK_MODE_VERSION );
		}
	}

}
