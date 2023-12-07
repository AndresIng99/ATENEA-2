<?php
/**
 * Elementor Controls Inits for WP Dark Mode
 * Loads all the required files for Elementor Controls
 *
 * @version 1.0.0
 * @package WP Dark Mode
 */

defined( 'ABSPATH' ) || exit();

// Check class is already exists.
if ( ! class_exists( 'WP_Dark_Mode_Controls_Init' ) ) {
	/**
	 * Loads Elementor Controls Inits for WP Dark Mode
	 *
	 * @version 1.0.0
	 * @package WP Dark Mode
	 */
	class WP_Dark_Mode_Controls_Init {
		/**
		 * A reference to an instance of this class.
		 *
		 * @since 1.0.0
		 * @var object
		 */
		private static $instance = null;

		/**
		 * Singleton instance WP_Dark_Mode_Controls_Init class
		 *
		 * @return WP_Dark_Mode_Controls_Init|null
		 * @version 1.0.0
		 */
		public static function instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * WP_Dark_Mode_Controls_Init constructor.
		 *
		 * Calling method
		 *
		 * @return void
		 * @version 1.0.0
		 */
		public function __construct() {

			$this->include_files();

			add_action( 'elementor/controls/controls_registered', [ $this, 'image_choose' ], 11 );
		}
		/**
		 * Includes necessary files
		 *
		 * @return void
		 * @version 1.0.0
		 */
		private function include_files() {
			// Include control manager.
			include WP_DARK_MODE_INCLUDES . '/elementor/modules/controls/class-control-manager.php';
			// Include image choose control.
			include WP_DARK_MODE_INCLUDES . '/elementor/modules/controls/class-image-choose.php';
		}

		/**
		 * Register image choose control
		 *
		 * @param \Elementor\Controls_Manager $controls_manager Elementor controls manager.
		 *
		 * @return void
		 * @version 1.0.0
		 */
		public function image_choose( $controls_manager ) {
			$controls_manager->register_control( 'image_choose', new WP_Dark_Mode_Control_Image_Choose() );
		}
	}

	// Instantiate the class.
	WP_Dark_Mode_Controls_Init::instance();
}
