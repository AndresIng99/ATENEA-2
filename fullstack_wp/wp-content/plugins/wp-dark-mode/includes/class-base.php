<?php
/**
 * Base class
 *
 * @package WP_DARK_MODE
 */


// Exit if accessed directly.
defined( 'ABSPATH' ) || exit();

/**
 * Check class is already exists
 *
 * @version 1.0.0
 */
if ( ! class_exists( 'WP_Dark_Mode' ) ) {

	/**
	 * Sets up and initializes the plugin.
	 * Main initiation class
	 *
	 * @since 1.0.0
	 */
	class WP_Dark_Mode {

		/**
		 * A reference to an instance of this class.
		 *
		 * @since  1.0.0
		 * @access private
		 * @var    object
		 */
		private static $instance = null;

		/**
		 * Minimum PHP version required
		 *
		 * @var string
		 */
		private static $min_php = '5.6.0';

		/**
		 * Sets up needed actions/filters for the plugin to initialize.
		 *
		 * @return void
		 * @since  1.0.0
		 * @access public
		 */
		public function __construct() {
			if ( $this->check_environment() ) {
				$this->load_files();

				if ( is_admin() ) {

					$this->init_appsero();

					if ( function_exists( 'wppool_plugin_init' ) ) {
						wppool_plugin_init( 'wp_dark_mode', plugin_dir_url( WP_DARK_MODE_FILE ) . '/includes/wppool/background-image.png' );
					}
				}

				add_filter( 'plugin_action_links_' . plugin_basename( WP_DARK_MODE_FILE ), [ $this, 'plugin_action_links' ] );
				add_action( 'admin_notices', [ $this, 'print_notices' ], 15 );
				add_action( 'init', [ $this, 'lang' ] );
				add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widget' ] );

				if ( did_action( 'elementor/loaded' ) ) {
					include_once WP_DARK_MODE_INCLUDES . '/elementor/modules/controls/class-init.php';
				}

				do_action( 'wp_dark_mode_loaded' );

				/** Do the activation stuff. */
				register_activation_hook(
					WP_DARK_MODE_FILE,
					[ $this, 'activation' ]
				);

				// Chart widget.
				register_deactivation_hook( WP_DARK_MODE_FILE, [ $this, 'deactivation' ] );

				add_action( 'admin_init', [ $this, 'activation_redirect' ] );
			}
		}

		/**
		 * Ensure theme and server variable compatibility
		 *
		 * @return mixed
		 * @since  1.0.0
		 * @access private
		 */
		private function check_environment() {
			$return = true;

			/** Check the PHP version compatibility */
			if ( version_compare( PHP_VERSION, self::$min_php, '<=' ) ) {
				$return = false;

				$notice = sprintf(
					/* translators: %s: Plugin version. */
					esc_html__(
						'Unsupported PHP version Min required PHP Version: "%s"',
						'wp-dark-mode'
					),
					self::$min_php
				);
			}

			/** Add notice and deactivate the plugin if the environment is not compatible */
			if ( ! $return ) {
				add_action(
					'admin_notices',
					function () use ( $notice ) {
						?>
						<div class="notice is-dismissible notice-error">
							<p>
								<?php echo wp_kses_post( $notice ); ?>
							</p>
						</div>
						<?php
					}
				);

				return $return;
			}

			return $return;
		}

		/**
		 * Do the activation stuffs
		 *
		 * @since 2.3.5
		 */
		public function activation() {
			require_once WP_DARK_MODE_INCLUDES . '/admin/class-install.php';

			add_option( 'wp_dark_mode_do_activation_redirect', true );
		}

		/**
		 * Do the deactivation stuffs
		 */
		public function deactivation() {
			wp_clear_scheduled_hook( 'wp_dark_mode_send_email_reporting' );
		}

		/**
		 * Redirect to settings page after activation the plugin
		 *
		 * @return void
		 */
		public function activation_redirect() {
			if ( get_option( 'wp_dark_mode_do_activation_redirect', false ) ) {
				delete_option( 'wp_dark_mode_do_activation_redirect' );

				wp_safe_redirect( admin_url( 'admin.php?page=wp-dark-mode-settings' ) );
			}
		}

		/**
		 * Check if the pro plugin is active or not
		 *
		 * @return bool
		 */
		public function is_pro_active() {
			return apply_filters( 'wp_dark_mode_pro_active', false );
		}

		/**
		 * Check if the pro plugin is active or not
		 *
		 * @return bool
		 */
		public function is_ultimate_active() {
			return apply_filters( 'wp_dark_mode_ultimate_active', false );
		}


		/**
		 * Is license active
		 *
		 * @return bool
		 */
		public function is_license_active() {
			return $this->is_ultimate_active() || $this->is_pro_active();
		}
		/**
		 * Include required core files used in admin and on the frontend.
		 *
		 * @return void
		 * @since 1.0.0
		 */
		public function load_files() {
			// Core includes.
			require_once WP_DARK_MODE_INCLUDES . '/functions.php';
			require_once WP_DARK_MODE_INCLUDES . '/class-enqueue.php';

			// Admin includes.
			if ( is_admin() ) {
				require_once WP_DARK_MODE_INCLUDES . '/wppool/class-plugin.php';
				require_once WP_DARK_MODE_INCLUDES . '/admin/class-admin.php';
				require_once WP_DARK_MODE_INCLUDES . '/admin/class-settings-api.php';
				require_once WP_DARK_MODE_INCLUDES . '/admin/class-settings.php';
				require_once WP_DARK_MODE_INCLUDES . '/class-nav-menu.php';
			}

			require_once WP_DARK_MODE_INCLUDES . '/class-shortcode.php';
			require_once WP_DARK_MODE_INCLUDES . '/class-hooks.php';
			require_once WP_DARK_MODE_INCLUDES . '/class-theme-supports.php';

			/** Load gutenberg block */
			require_once WP_DARK_MODE_INCLUDES . '/gutenberg/block.php';

			/**
			 * Load modules
			 */
			require_once WP_DARK_MODE_INCLUDES . '/modules/social-share.php';
		}

		/**
		 * Initialize plugin for localization
		 *
		 * @return void
		 * @since 1.0.0
		 */
		public function lang() {
			load_plugin_textdomain(
				'wp-dark-mode',
				false,
				dirname( plugin_basename( WP_DARK_MODE_FILE ) ) . '/languages/'
			);
		}

		/**
		 * Plugin action links
		 *
		 * Plugin_action_links method use for show  WP Dark Mode GET PRO button and Setting in plugin.php
		 *
		 * @param array $links The plugin links.
		 * @return array
		 */
		public function plugin_action_links( $links ) {
			$links[] = sprintf(
				'<a href="%1$s">%2$s</a>',
				admin_url( 'admin.php?page=wp-dark-mode-settings' ),
				__( 'Settings', 'wp-dark-mode' )
			);

			if ( ! $this->is_ultimate_active() ) {
				$links[] = sprintf(
					'<a href="%1$s" target="_blank" style="color: orangered;font-weight: bold;">%2$s</a>',
					'https://go.wppool.dev/EeQ',
					__( 'GET PRO', 'wp-dark-mode' )
				);
			}

			return $links;
		}

		/**
		 * Returns path to template file.
		 *
		 * @param string        $name The template name.
		 * @param mixed $args Usable arguments inside the template.
		 *
		 * @return bool|string|void
		 * @since 1.0.0
		 */
		// phpcs:ignore
		public function get_template( $name = '', $args = [] ) {

			$template = locate_template( 'wp-dark-mode/' . $name . '.php' );

			if ( ! $template ) {
				$template = WP_DARK_MODE_TEMPLATES . "/$name.php";
			}

			if ( file_exists( $template ) ) {
				include $template;
			} else {
				return false;
			}
		}

		/**
		 * Register darkmode switch elementor widget
		 *
		 * @since 2.3.5
		 */
		public function register_widget() {
			require_once WP_DARK_MODE_INCLUDES . '/elementor/class-elementor-widget.php';

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type(
				new WP_Dark_Mode_Elementor_Widget()
			);
		}

		/**
		 * Add admin notices
		 *
		 * @param mixed  $class      The class.
		 * @param string $message    The message.
		 *
		 * @return void
		 */
		public function add_notice( $class, $message ) {
			$notices = get_option( sanitize_key( 'wp_dark_mode_notices' ), [] );
			if (
				is_string( $message ) &&
				is_string( $class ) &&
				! wp_list_filter( $notices, [ 'message' => $message ] )
			) {
				$notices[] = [
					'message' => $message,
					'class'   => $class,
				];

				update_option( sanitize_key( 'wp_dark_mode_notices' ), $notices );
			}
		}

		/**
		 * Print the admin notices
		 *
		 * @return void
		 * @since 1.0.0
		 */
		public function print_notices() {
			$notices = get_option( sanitize_key( 'wp_dark_mode_notices' ), [] );
			foreach ( $notices as $notice ) {
				?>
				<div class="notice notice-large is-dismissible notice-<?php echo esc_attr( $notice['class'] ); ?>">
					<?php echo wp_kses_post( $notice['message'] ); ?>
				</div>
				<?php
				update_option( sanitize_key( 'wp_dark_mode_notices' ), [] );
			}
		}

		/**
		 * Main WP_Dark_Mode Instance.
		 *
		 * Ensures only one instance of WP_Dark_Mode is loaded or can be loaded.
		 *
		 * @return WP_Dark_Mode - Main instance.
		 * @since 1.0.0
		 * @static
		 */
		public static function instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Init Appsero
		 */
		public function init_appsero() {
			if ( ! class_exists( 'Appsero\Client' ) ) {
				require_once __DIR__ . '/appsero/src/Client.php';
			}

			$client = new Appsero\Client(
				'10d1a5ba-96f5-48e1-bc0e-38d39b9a2f85',
				'WP Dark Mode',
				WP_DARK_MODE_FILE
			);

			// Active insights.
			$client->insights()->init();
		}
	}


	/** If function `wp_dark_mode` doesn't exists yet. */
	if ( ! function_exists( 'wp_dark_mode' ) ) {
		/**
		 * Runs plugin base class.
		 *
		 * @since 1.0.0
		 */
		function wp_dark_mode() {
			return WP_Dark_Mode::instance();
		}
	}

	// Instantiate the plugin.
	wp_dark_mode();
}