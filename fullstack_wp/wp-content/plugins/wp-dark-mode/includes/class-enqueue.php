<?php
/**
 * Enqueues all admin or frontend scripts.
 *
 * @package WP Dark Mode
 */

defined( 'ABSPATH' ) || exit();
/**
 * Check class is already exists
 *
 * @version 1.0.0
 */
if ( ! class_exists( 'WP_Dark_Mode_Enqueue' ) ) {
	/**
	 * Enqueue all admin or frontend scripts
	 *
	 * @version 1.0.0
	 */
	class WP_Dark_Mode_Enqueue {
		/**
		 * Instance of WP_Dark_Mode_Enqueue
		 *
		 * @var null
		 */
		private static $instance = null;
		/**
		 * WP_Dark_Mode_Enqueue constructor.
		 *
		 * @version 1.0.0
		 */
		public function __construct() {
			add_action( 'wp_enqueue_scripts', [ $this, 'frontend_scripts' ], 0 );
			add_action( 'wp_enqueue_scripts', [ $this, 'frontend_support_scripts' ], 0 );
			add_action( 'admin_enqueue_scripts', [ $this, 'admin_scripts' ], 10 );
		}
		/**
		 * Check license is valid by license title and general Way
		 *
		 * @return mixed
		 * @version 1.0.0
		 */
		public function palettes_allow() {
			global $wp_dark_mode_license;

			if ( ! $wp_dark_mode_license ) {
				return false;
			}

			$is_ultimate_plan = $wp_dark_mode_license->is_valid_by( 'title', 'WP Dark Mode Ultimate Lifetime' )
			|| $wp_dark_mode_license->is_valid_by( 'title', 'WP Dark Mode Ultimate Yearly' )
			|| $wp_dark_mode_license->is_valid_by( 'title', 'Lifetime Ultimate 1 Site' )
			|| $wp_dark_mode_license->is_valid_by( 'title', 'Lifetime Ultimate 50 Sites' )
			|| $wp_dark_mode_license->is_valid_by( 'title', 'Ultimate Yearly - 1Site' );

			return $wp_dark_mode_license->is_valid() && $is_ultimate_plan;
		}

		/**
		 * Load user site all scripts
		 *
		 * @return mixed
		 * @version 1.0.0
		 */
		public function frontend_scripts() {

			if ( ! wp_dark_mode_enabled() ) {
				return false;
			}

			// Main CSS.
			wp_enqueue_style( 'wp-dark-mode-frontend', WP_DARK_MODE_ASSETS . '/css/frontend.min.css', [], WP_DARK_MODE_VERSION );

			if ( ! wp_dark_mode_is_custom_color() ) {
				$performance_mode = apply_filters( 'wp_dark_mode_performance_mode', false );

				$post_fix = $performance_mode ? '-defer' : '';

				wp_enqueue_script( "wp-dark-mode-js{$post_fix}", WP_DARK_MODE_ASSETS . '/js/dark-mode.min.js', [], WP_DARK_MODE_VERSION, $performance_mode );
			}

			// Main JS.
			wp_enqueue_script( 'wp-dark-mode-frontend', WP_DARK_MODE_ASSETS . '/js/frontend.min.js', [], WP_DARK_MODE_VERSION, false );
			wp_localize_script( 'wp-dark-mode-frontend', 'wpDarkMode', wp_dark_mode_localize_array() );

			/*---- Custom CSS ----*/
			ob_start();
			$font_size_toggle = 'on' === wp_dark_mode_get_settings( 'wp_dark_mode_accessibility', 'font_size_toggle', 'off' );

			// Font-size css.
			if ( $font_size_toggle ) {
				$font_size = wp_dark_mode_get_settings( 'wp_dark_mode_accessibility', 'font_size', 150 );

				if ( 'custom' === $font_size ) {
					$font_size = wp_dark_mode_get_settings( 'wp_dark_mode_accessibility', 'custom_font_size', 150 );
				}

				echo 'body{--wp-dark-mode-zoom: ' . esc_attr( $font_size ) . '%;}';

			}

			// Animation css.
			$toggle_animation = 'on' === wp_dark_mode_get_settings( 'wp_dark_mode_animation', 'toggle_animation', 'off' );

			if ( $toggle_animation ) {
				$animation = wp_dark_mode_get_settings( 'wp_dark_mode_animation', 'animation', 'fade-in-out' );
				if ( 'fade' === $animation ) {
					echo '.wp-dark-mode-active  body { animation: wp-dark-mode-fadein 2.5s;} .wp-dark-mode-inactive body {animation: wp-dark-mode-inactive-fadein 2.5s;}';
				} elseif ( 'slide-left' === $animation ) {
					echo '.wp-dark-mode-active  body { animation: wp-dark-mode-slide-left 1s;} .wp-dark-mode-inactive body {animation: wp-dark-mode-slide-right 1s;}';
				} elseif ( 'slide-up' === $animation ) {
					echo '.wp-dark-mode-active  body { animation: wp-dark-mode-slide-top 1s;} .wp-dark-mode-inactive body {animation: wp-dark-mode-slide-bottom 1s;}';
				} elseif ( 'slide-right' === $animation ) {
					echo '.wp-dark-mode-active  body { animation: wp-dark-mode-slide-right 1s;} .wp-dark-mode-inactive body {animation: wp-dark-mode-slide-left 1s;}';
				} elseif ( 'slide-down' === $animation ) {
					echo '.wp-dark-mode-active  body { animation: wp-dark-mode-slide-bottom 1s;} .wp-dark-mode-inactive body {animation: wp-dark-mode-slide-top 1s;}';
				} elseif ( 'pulse' === $animation ) {
					echo '.wp-dark-mode-active  body { animation: active-pulse 1s;} .wp-dark-mode-inactive body {animation: inactive-pulse 1s;}';
				} elseif ( 'flip' === $animation ) {
					echo '.wp-dark-mode-active  body { animation: active-flip 1s;} .wp-dark-mode-inactive body {animation: inactive-flip 1s;}';
				} elseif ( 'roll' === $animation ) {
					echo '.wp-dark-mode-active  body { animation: active-roll 1s;} .wp-dark-mode-inactive body {animation: inactive-roll 1s;}';
				}
			}

			// Img css.
			$low_brightness = 'on' === wp_dark_mode_get_settings( 'wp_dark_mode_image_settings', 'low_brightness', 'off' );
			$grayscale      = 'on' === wp_dark_mode_get_settings( 'wp_dark_mode_image_settings', 'grayscale', 'off' );

			if ( $low_brightness && $grayscale ) {
				echo 'html.wp-dark-mode-active img{filter: brightness(80%) grayscale(80%) !important;}';
			} elseif ( $low_brightness ) {
				echo 'html.wp-dark-mode-active img{filter: brightness(80%) !important;}';
			} elseif ( $grayscale ) {
				echo 'html.wp-dark-mode-active img{filter: grayscale(80%) !important;}';
			}

			// Switch Scale.
			echo 'body{--wp-dark-mode-scale: ' . esc_html( wp_dark_mode_get_settings( 'wp_dark_mode_switch', 'switcher_scale', 100 ) / 100 ) . ';}';

			$custom_css = ob_get_clean();

			wp_add_inline_style( 'wp-dark-mode-frontend', esc_attr( $custom_css ) );

			// RTL support.
			wp_style_add_data( 'wp-dark-mode-frontend', 'rtl', 'replace' );
		}

		/**
		 * Check license is valid
		 *
		 * @return mixed
		 * @version 1.0.0
		 */
		private static function wp_dark_mode_common_mode() {
			global $wp_dark_mode_license;

			if ( ! $wp_dark_mode_license ) {
				return false;
			}

			return $wp_dark_mode_license->is_valid();
		}

		/**
		 * Load admin site all scripts
		 *
		 * @param string $hook current admin page.
		 *
		 * @return void
		 * @version 1.0.0
		 */
		public function admin_scripts( $hook ) {
			wp_enqueue_style( 'wp-dark-mode-admin', WP_DARK_MODE_ASSETS . '/css/admin.min.css', [], WP_DARK_MODE_VERSION );

			if ( 'index.php' === $hook ) {
				wp_enqueue_script( 'wp-dark-mode-chart', WP_DARK_MODE_ASSETS . '/vendor/chart.bundle.min.js', [], WP_DARK_MODE_VERSION, true );
			}

			if ( 'toplevel_page_wp-dark-mode-settings' === $hook ) {
				wp_enqueue_script( 'select2', WP_DARK_MODE_ASSETS . '/vendor/select2.min.js', [ 'jquery' ], WP_DARK_MODE_VERSION, true );

				wp_enqueue_script( 'select2', 'https://cdn.headwayapp.co/widget.js', [ 'jquery' ], WP_DARK_MODE_VERSION, true );

				wp_enqueue_script( 'wp-dark-mode-twentytwenty', WP_DARK_MODE_ASSETS . '/vendor/jquery.twentytwenty.min.js', [ 'jquery' ], WP_DARK_MODE_VERSION, true );

				wp_enqueue_script( 'wp-dark-mode-move', WP_DARK_MODE_ASSETS . '/vendor/jquery.event.move.min.js', [ 'jquery' ], WP_DARK_MODE_VERSION, true );

				$cm_settings               = [];
				$cm_settings['codeEditor'] = wp_enqueue_code_editor( [ 'type' => 'text/css' ] );

				wp_enqueue_script( 'wp-theme-plugin-editor' );
				wp_enqueue_style( 'wp-codemirror' );
			}

			wp_enqueue_script( 'wp-dark-mode-sizzle', WP_DARK_MODE_ASSETS . '/vendor/sizzle.min.js', [], WP_DARK_MODE_VERSION, true );

			wp_enqueue_script( 'wp-dark-mode-core', WP_DARK_MODE_ASSETS . '/js/dark-mode.min.js', [ 'jquery' ], WP_DARK_MODE_VERSION, true );

			wp_enqueue_script( 'wp-dark-mode-admin', WP_DARK_MODE_ASSETS . '/js/admin.min.js', [ 'jquery' ], WP_DARK_MODE_VERSION, true );

			wp_localize_script(
				'wp-dark-mode-admin', 'wpDarkMode',
				[
					'pluginUrl'           => WP_DARK_MODE_URL,
					'ajaxurl'             => admin_url( 'admin-ajax.php' ),
					'version'             => WP_DARK_MODE_VERSION,
					'nonce'               => wp_create_nonce( 'wp_dark_mode_admin_nonce' ),
					'config'              => [
						'brightness' => wp_dark_mode_get_settings( 'wp_dark_mode_color', 'brightness', 100 ),
						'contrast'   => wp_dark_mode_get_settings( 'wp_dark_mode_color', 'contrast', 90 ),
						'sepia'      => wp_dark_mode_get_settings( 'wp_dark_mode_color', 'sepia', 10 ),
					],
					'nav_switches'        => (array) get_option( 'wp_dark_mode_nav_switches' ),
					'colors'              => wp_dark_mode_color_presets(),
					'includes'            => '',
					'excludes'            => '',
					'common_mode'         => self::wp_dark_mode_common_mode(),
					'is_pro_active'       => wp_dark_mode()->is_pro_active(),
					'is_ultimate_active'  => wp_dark_mode()->is_ultimate_active(),
					'cm_settings'         => ! empty( $cm_settings ) ? $cm_settings : '',
					'palettes_allow'      => $this->palettes_allow(),
					'is_settings_page'    => 'toplevel_page_wp-dark-mode-settings' === $hook,
					'enable_backend'      => 'on' === wp_dark_mode_get_settings( 'wp_dark_mode_general', 'enable_backend', 'off' ),
					'enable_os_mode'      => 'on' === wp_dark_mode_get_settings( 'wp_dark_mode_general', 'enable_os_mode', 'on' ),
					'enable_block_editor' => 'on' === wp_dark_mode_get_settings( 'wp_dark_mode_general', 'enable_block_editor', 'on' ),
					'is_block_editor'     => wp_dark_mode_is_gutenberg_page(),
					'pro_version'         => defined( 'WP_DARK_MODE_PRO_VERSION' ) ? WP_DARK_MODE_PRO_VERSION : 0,
					'js_ul'               => self::is_license_valid(),
				]
			);

			// RTL support.
			wp_style_add_data( 'wp-dark-mode-admin', 'rtl', 'replace' );

			// Custom CSS.
			ob_start();

			try {
				echo 'body{--wp-dark-mode-scale: ' . esc_html( wp_dark_mode_get_settings( 'wp_dark_mode_switch', 'switcher_scale', 100 ) ) / 100 . ';}';
			} catch ( \Exception $e ) {
				echo '';
			}

			echo '.mt-4{margin-top: 2rem !important;}';

			$custom_css = ob_get_clean();

			wp_add_inline_style( 'wp-dark-mode-admin', $custom_css );
		}

		/**
		 * Checks if the license is valid and is Ultimate plan.
		 *
		 * @return mixed
		 * @since 1.0.0
		 */
		private static function is_license_valid() {
			global $wp_dark_mode_license;

			if ( ! $wp_dark_mode_license ) {
				return false;
			}

			$is_ultimate_plan = $wp_dark_mode_license->is_valid_by( 'title', 'WP Dark Mode Ultimate Lifetime' )
							|| $wp_dark_mode_license->is_valid_by( 'title', 'WP Dark Mode Ultimate Yearly' )
							|| $wp_dark_mode_license->is_valid_by( 'title', 'Lifetime Ultimate 1 Site' )
							|| $wp_dark_mode_license->is_valid_by( 'title', 'Lifetime Ultimate 50 Sites' )
							|| $wp_dark_mode_license->is_valid_by( 'title', 'Ultimate Yearly - 1Site' );

			return $wp_dark_mode_license->is_valid() && $is_ultimate_plan;
		}

		/**
		 * Singleton instance WP_Dark_Mode_Enqueue class
		 *
		 * @return WP_Dark_Mode_Enqueue|null
		 * @version 1.0.0
		 */
		public static function instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Frontend support scripts
		 */
		public function frontend_support_scripts() {

			global $wp_dark_mode_license;

			if ( ! $wp_dark_mode_license ) {
				return false;
			}

			// Check Divi theme.
			global $shortname;

			if ( 'divi' === $shortname ) {
				// Divi theme support.
				wp_enqueue_script( 'divi-custom-script2', WP_DARK_MODE_ASSETS . '/support/Divi/custom.min.js', [ 'jquery' ], WP_DARK_MODE_VERSION, true );
			}
		}
	}

	// Initialize the class instance only once.
	WP_Dark_Mode_Enqueue::instance();
}
