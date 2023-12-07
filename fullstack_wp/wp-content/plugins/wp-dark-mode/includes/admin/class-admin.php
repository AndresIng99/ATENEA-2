<?php
/**
 * The class creates sub-menus in Dark mode
 * such as Get start, get pro, Tools, suggested plugins and also manages review notifications,
 * import settings, export settings, reset settings, setup dashboard widgets.
 *
 * @version 1.0.0
 * @package WP_DARK_MODE
 */

// If direct access than exit the file.
defined( 'ABSPATH' ) || exit();

/**
 * Checks class is already exists
 *
 * @version 1.0.0
 */
if ( ! class_exists( 'WP_Dark_Mode_Admin' ) ) {

	/**
	 * The class creates sub-menus in Dark mode
	 * such as Get start, get pro, Tools, suggested plugins and also manages review notifications,
	 * import settings, export settings, reset settings, setup dashboard widgets.
	 *
	 * @version 1.0.0
	 */
	class WP_Dark_Mode_Admin {
		/**
		 * Contains class instance.
		 *
		 * @var null
		 */
		private static $instance = null;

		/**
		 * Loads admin-side action and filter hooks
		 *
		 * @return void
		 * @version 1.0.0
		 * @since 1.0.0
		 */
		public function __construct() {
			add_action( 'admin_head', [ $this, 'header_scripts' ], 10 );

			add_action( 'admin_footer', [ $this, 'footer_scripts' ], 10 );
			add_action( 'admin_menu', [ $this, 'admin_menu' ] );
			add_action( 'admin_bar_menu', [ $this, 'render_admin_switcher_menu' ], 100 );
			add_action( 'admin_init', [ $this, 'display_notices' ] );

			// Handles ajax request for review notice.
			add_action( 'wp_ajax_wp_dark_mode_review_notice', [ $this, 'handle_review_notice' ] );
			add_action( 'wp_ajax_wp_dark_mode_affiliate_notice', [ $this, 'handle_affiliate_notice' ] );

			add_action( 'admin_init', [ $this, 'init_update' ] );

			add_action( 'admin_init', [ $this, 'save_settings' ] );

			// dashboard widget.
			add_action( 'wp_dashboard_setup', [ $this, 'dashboard_widgets' ] );

			// Handles ajax request for switch preview.
			add_action( 'wp_ajax_get_switch_preview', [ $this, 'get_switch_preview' ] );

			// Handles ajax request for import/export/reset settings.
			add_action( 'wp_ajax_wpdarkmode_export', [ $this, 'export_settings' ] );
			add_action( 'wp_ajax_wpdarkmode_import', [ $this, 'import_settings' ] );
			add_action( 'wp_ajax_wpdarkmode_reset', [ $this, 'reset_settings' ] );
			add_action( 'wppool_after_settings', [ $this, 'after_settings' ] );
			add_action( 'wpdarkmode_social_share_footer', [ $this, 'after_settings' ] );

			add_action( 'init', function () {
				register_nav_menus([
					'header' => 'Header Menu',
				]);
			} );
		}

		/**
		 * Setup dashboard widgets for dark mode.
		 * Showing a list of how many users are using Dark mode in the day
		 *
		 * @return void
		 * @version 1.0.0
		 */
		public function dashboard_widgets() {
			$analytics        = 'on' === wp_dark_mode_get_settings( 'wp_dark_mode_analytics_reporting', 'enable_analytics', 'on' );
			$dashboard_widget = 'on' === wp_dark_mode_get_settings( 'wp_dark_mode_analytics_reporting', 'dashboard_widget', 'on' );

			if ( ! $analytics || ! $dashboard_widget ) {
				return;
			}

			wp_add_dashboard_widget(
				'wp_dark_mode',
				esc_html__( 'WP Dark Mode Usage', 'wp-dark-mode' ),
				[ $this, 'dashboard_widget_cb' ]
			);

			// Globalize the meta boxes array, this holds all the widgets for wp-admin.
			global $wp_meta_boxes;

			// Get the regular dashboard widgets array
			// (which already has our new widget but appended at the end).
			$default_dashboard = $wp_meta_boxes['dashboard']['normal']['core'];

			// Backup and delete our new dashboard widget from the end of the array.
			$wp_dark_mode_widget_backup = [ 'wp_dark_mode' => $default_dashboard['wp_dark_mode'] ];
			unset( $default_dashboard['wp_dark_mode'] );

			// Merge the two arrays together so our widget is at the beginning.
			$sorted_dashboard = array_merge( $wp_dark_mode_widget_backup, $default_dashboard );

			// Save the sorted array back into the original meta boxes.
			$wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard; //phpcs:ignore
		}

		/**
		 * Show wp dark mode analytics report chart in dashboard page
		 *
		 * @return void
		 * @version 1.0.0
		 */
		public function dashboard_widget_cb() {
			$length = 7;

			$visits = (array) get_option( 'wp_dark_mode_visits' );
			$usages = (array) get_option( 'wp_dark_mode_usage' );

			$visits = array_slice( $visits, -$length, $length, true );

			$values = [];
			$labels = [];

			if ( ! empty( $visits ) ) {
				foreach ( $visits as $date => $visit ) {
					$usage = ! empty( $usages[ $date ] ) ? $usages[ $date ] : 0;

					if ( $visit < 0 ) {
						$visit = 0;
					}

					if ( $usage < 0 ) {
						$usage = 0;
					}

					$labels[] = $date;

					if ( ! is_numeric( $visit ) || ! is_numeric( $usage ) || 0 === $visit || 0 === $usage ) {
						$values[] = 0;
					} else {
						$values[] = ceil( ( intval( $usage ) / intval( $visit ) ) * 100 );
					}
				}
			}

			// Check license active or not.
			if ( ! wp_dark_mode_is_hello_elementora() ) {
				$labels = [
					'20-05-2021',
					'21-05-2021',
					'22-05-2021',
					'24-05-2021',
					'25-05-2021',
					'27-05-2021',
					'29-05-2021',
				];

				$values = [ '57', '56', '60', '59', '57', '60', '58' ];
			}

			?>
			<div class="wp-dark-mode-chart">
				<div class="chart-header">
					<span><?php esc_html_e( 'How much percentage of users use dark mode each day.', 'wp-dark-mode' ); ?></span>

					<select name="chart_period" id="chart_period">
						<option value="7"><?php esc_html_e( 'Last 7 Days', 'wp-dark-mode' ); ?></option>
						<option value="30"><?php esc_html_e( 'Last 30 Days', 'wp-dark-mode' ); ?></option>
					</select>
				</div>

				<div class="chart-container">
					<canvas id="wp_dark_mode_chart" height="300" data-labels='<?php echo wp_json_encode( $labels ); ?>' data-values='<?php echo wp_json_encode( $values ); ?>'></canvas>
				</div>
				<?php // Check license is active or not. ?>
				<?php if ( ! wp_dark_mode_is_hello_elementora() ) { ?>
					<div class="wp-dark-mode-chart-modal-wrapper">
						<div class="wp-dark-mode-chart-modal">
							<h2><?php esc_html_e( 'View Dark Mode usages inside WordPress Dashboard', 'wp-dark-mode' ); ?></h2>
							<p><?php esc_html_e( 'Upgrade to Pro and get access to the reports.', 'wp-dark-mode' ); ?></p>
							<p>
								<a href="https://go.wppool.dev/pdOs" class="button-primary button-hero" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Upgrade to Pro', 'wp-dark-mode' ); ?></a>
							</p>
						</div>
					</div>
				<?php } ?>

			</div>
			<?php
		}

		/**
		 * Update the switch settings and font-size toggle relationship
		 *
		 * @return void
		 * @version 1.0.0
		 */
		public function save_settings() {
			// Checks WordPress Nonce.
			if ( ! isset( $_POST['wp_dark_mode_admin_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['wp_dark_mode_admin_nonce'] ) ), 'wp_dark_mode_admin_nonce' ) ) {
				return;
			}

			// If wp_dark_mode_switch is not set, return.
			if ( isset( $_POST['wp_dark_mode_switch'] ) && isset( $_POST['wp_dark_mode_switch']['switch_style'] ) ) {

				// Checks if the user has permission to do this action.
				if ( ! current_user_can( 'manage_options' ) ) {
					wp_send_json_error( __( 'You do not have permission to do this action', 'wp-dark-mode' ) );
				}

				$switch_style = ( ! empty( $_POST['wp_dark_mode_switch']['switch_style'] ) ) ? intval( $_POST['wp_dark_mode_switch']['switch_style'] ) : 1;

				if ( $switch_style >= 14 || $switch_style <= 19 ) {
					$accessibility_options = (array) get_option( 'wp_dark_mode_accessibility' );

					$accessibility_options['font_size_toggle'] = 'on';

					update_option( 'wp_dark_mode_accessibility', $accessibility_options );
				}

				if ( ! empty( $_POST['wp_dark_mode_accessibility']['font_size_toggle'] ) ) {

					if ( 'on' === $_POST['wp_dark_mode_accessibility']['font_size_toggle'] ) {
						$switch_options = (array) get_option( 'wp_dark_mode_switch' );

						$switch_options['switch_style'] = 14;
					} else {
						$switch_options['switch_style'] = 1;
					}

					update_option( 'wp_dark_mode_switch', $switch_options );
				}
			}
		}

		/**
		 * Get switch preview
		 *
		 * @return void
		 * @version 1.0.0
		 */
		public function get_switch_preview() {
			// Checks WordPress Nonce.
			if ( ! isset( $_REQUEST['nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_REQUEST['nonce'] ) ), 'wp_dark_mode_admin_nonce' ) ) {
				wp_send_json_error( __( 'Invalid request', 'wp-dark-mode' ) );
				wp_die();
			}

			$style = ! empty( $_REQUEST['style'] ) ? absint( $_REQUEST['style'] ) : 1;

			wp_send_json_success([
				'html' => do_shortcode( '[wp_dark_mode floating="yes" style="' . $style . '"]' ),
			]);
		}

		/**
		 * Call WP_Dark_Mode_Update class.
		 * Check if the plugin needs an update
		 *
		 * @return void
		 * @version 1.0.0
		 */
		public function init_update() {
			if ( ! class_exists( 'WP_Dark_Mode_Update' ) ) {
				require_once WP_DARK_MODE_INCLUDES . '/admin/class-update.php';
			}

			$updater = new WP_Dark_Mode_Update();

			if ( $updater->needs_update() ) {
				$updater->perform_updates();
			}
		}

		/**
		 * Register recommended plugins menu
		 *
		 * @return void
		 * @version 1.0.0
		 */
		public function recommended_plugins_menu() {
			if ( isset( $_GET['hide_wp_dark_mode_recommended_plugin'] ) && isset( $_GET['nonce'] ) ) {
				if ( current_user_can( 'manage_options' ) ) {
					if ( wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET['nonce'] ) ), 'wp_dark_mode_recommended_plugin' ) ) {
						update_option( 'hide_wp_dark_mode_recommended_plugin', true );
					}
				}
			}

			if ( ! get_option( 'hide_wp_dark_mode_recommended_plugin' ) ) {
				add_submenu_page(
					'wp-dark-mode-settings',
					__( 'Recommended Plugins', 'wp-dark-mode' ),
					__( 'Recommended Plugins', 'wp-dark-mode' ),
					'manage_options',
					'wp-dark-mode-recommended-plugins',
					[ $this, 'recommended_plugins_page' ],
					50
				);
			}
		}

		/**
		 * Load recommended plugins page template
		 *
		 * @return void
		 * @version 1.0.0
		 */
		public static function recommended_plugins_page() {
			wp_dark_mode()->get_template( 'admin/recommended-plugins' );
		}

		/**
		 * Handle review notice
		 *
		 * @return void
		 * @version 1.0.0
		 */
		public function handle_review_notice() {

			// Checks WordPress Nonce.
			if ( ! isset( $_REQUEST['nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_REQUEST['nonce'] ) ), 'wp_dark_mode_admin_nonce' ) ) {
				wp_send_json_error( __( 'Invalid request', 'wp-dark-mode' ) );
				wp_die();
			}

			// Checks if the user has permission to do this action.
			if ( ! current_user_can( 'manage_options' ) ) {
				wp_send_json_error( __( 'You do not have permission to do this action', 'wp-dark-mode' ) );
			}

			// Sets the value to 7 days if the value is empty.
			$value = ! empty( $_REQUEST['value'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['value'] ) ) : 7;

			// If the value is hide_notice, then set the interval to off.
			if ( 'hide_notice' === $value ) {
				update_option( 'wp_dark_mode_review_notice_interval', 'off' );
			} elseif ( is_numeric( $value ) ) {
				$days = $value * DAY_IN_SECONDS;
				set_transient( 'wp_dark_mode_review_notice_interval', 'off', $days );
			}

			update_option( sanitize_key( 'wp_dark_mode_notices' ), [] );
		}

		/**
		 * Handle affiliate notice
		 *
		 * @return void
		 * @version 1.0.0
		 */
		public function handle_affiliate_notice() {
			// Checks WordPress Nonce.
			if ( ! isset( $_REQUEST['nonce'] ) || ! wp_verify_nonce(  sanitize_text_field( wp_unslash( $_REQUEST['nonce'] ) ), 'wp_dark_mode_admin_nonce' ) ) {
				wp_send_json_error( __( 'Invalid request', 'wp-dark-mode' ) );
				wp_die();
			}

			// Checks if the user has permission to do this action.
			if ( ! current_user_can( 'manage_options' ) ) {
				wp_send_json_error( __( 'You do not have permission to do this action', 'wp-dark-mode' ) );
			}

			$value = ! empty( $_REQUEST['value'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['value'] ) ) : 7;

			if ( 'hide_notice' === $value ) {
				update_option( 'wp_dark_mode_affiliate_notice_interval', 'off' );
			} elseif ( is_numeric( $value ) ) {
				$days = $value * DAY_IN_SECONDS;
				set_transient( 'wp_dark_mode_affiliate_notice_interval', 'off', $days );
			}

			update_option( sanitize_key( 'wp_dark_mode_notices' ), [] );
		}

		/**
		 * Show all notices
		 * such as ultimate version is lower than 2.0, pro version is lower than 2.0.
		 */
		public function display_notices() {

			// Show notice if ultimate version is lower than 2.0.
			if ( defined( 'WP_DARK_MODE_ULTIMATE_VERSION' ) && WP_DARK_MODE_ULTIMATE_VERSION < '2.0.0' ) {

				$notice_html = sprintf(
					'<b>WP Dark Mode Ultimate - v%s</b> is not compatible with <b>WP Dark Mode - v2.0</b>. Please, Update the <b>WP Dark Mode Ultimate</b> to <b>v2.0</b> to function properly.', WP_DARK_MODE_ULTIMATE_VERSION
				);

				wp_dark_mode()->add_notice( 'info', $notice_html );

				// Show notice if pro version is lower than 2.0.
			} elseif ( defined( 'WP_DARK_MODE_PRO_VERSION' ) && WP_DARK_MODE_PRO_VERSION < '2.0.0' ) {

				$notice_html = sprintf( '<b>WP Dark Mode PRO - v%s</b> is not compatible with <b>WP Dark Mode - v2.0</b>. Please, Update the <b>WP Dark Mode PRO</b> to <b>v2.0</b> to function properly.', WP_DARK_MODE_PRO_VERSION );

				wp_dark_mode()->add_notice( 'info', $notice_html );
			}

			// Return if allow tracking is not interacted yet.
			if ( ! get_option( 'wp-dark-mode_allow_tracking' ) ) {
				return;
			}

			// Review notice.
			if ( 'off' !== get_option( 'wp_dark_mode_review_notice_interval', 'on' ) && 'off' !== get_transient( 'wp_dark_mode_review_notice_interval' )
			) {
				ob_start();
				wp_dark_mode()->get_template( 'admin/review-notice' );
				$notice_html = ob_get_clean();
				wp_dark_mode()->add_notice( 'info wp-dark-mode-review-notice', $notice_html );
			} else {
				// Affiliate notice.
				if ( 'off' !== get_option( 'wp_dark_mode_affiliate_notice_interval', 'on' )
				&& 'off' !== get_transient( 'wp_dark_mode_affiliate_notice_interval' )
				) {

					ob_start();
					wp_dark_mode()->get_template( 'admin/affiliate-notice' );
					$notice_html = ob_get_clean();

					wp_dark_mode()->add_notice( 'info wp-dark-mode-affiliate-notice', $notice_html );
				}
			}
		}

		/**
		 * Load inline js in admin site header.
		 *
		 * @return void
		 * @version 1.0.0
		 */
		public function header_scripts() {
			if ( ! wp_dark_mode_is_gutenberg_page() ) {

				wp_enqueue_script( 'wp-dark-mode-admin', WP_DARK_MODE_ASSETS . '/js/dark-mode.min.js', [], WP_DARK_MODE_VERSION, true );

				?>
				<script>
					window.wpDarkMode = <?php echo wp_json_encode( wp_dark_mode_localize_array() ); ?>;
				</script> 

				<script>
					(function() {
						const is_saved = localStorage.getItem('wp_dark_mode_admin_active');

						if (wpDarkMode.enable_backend && is_saved != 0) {
							document.querySelector('html').classList.add('wp-dark-mode-active');

							// Preload CSS.
							var css = `body, div, section, header, article, main, aside{background-color: #2B2D2D !important;}`,
								head = document.head || document.getElementsByTagName('head')[0],
								style = document.createElement('style');

							style.setAttribute('id', 'pre_css');

							head.appendChild(style);

							style.type = 'text/css';
							if (style.styleSheet) {
								// This is required for IE8 and below.
								style.styleSheet.cssText = css;
							} else {
								style.appendChild(document.createTextNode(css));
							}

						}
					})();
				</script>

				<style>
					.toplevel_page_wp-dark-mode-settings .wp-menu-image.dashicons-before {
						display: flex !important;
						align-items: center !important;
						justify-content: center !important;
						width: 20px;
						height: 20px;
					}

					.toplevel_page_wp-dark-mode-settings .wp-menu-image.dashicons-before img {
						padding: 0 !important;
						margin: 0 !important;
						width: 19px;
					}

					#get-wp-dark-mode-pro-menu {
						display: flex;
						align-items: center;
						gap: 6px;
						text-transform: uppercase;
						font-weight: 700;
						background: linear-gradient(180deg, #22E765 0%, #33E4BA 100%);
						-webkit-background-clip: text;
						-webkit-text-fill-color: transparent;
						background-clip: text;
						text-fill-color: transparent;
						transition: .3s ease-in-out;
						font-family: 'Segoe UI';
						font-style: normal;    
					}

					#get-wp-dark-mode-pro-menu:hover {
						color: #29be7c;
					}

					#get-wp-dark-mode-pro-menu svg {
						margin-top: 2px;
						width: 13px;
						height: 13px;
					}
				</style>
				<?php
			}
		}

		/**
		 * Load inline js in admin site footer.
		 *
		 * @return void
		 * @version 1.0.0
		 */
		public function footer_scripts() {
			?>
			<script>
				;
				(function() {
					const is_saved = localStorage.getItem('wp_dark_mode_admin_active');

					if (typeof wpDarkMode !== 'undefined' && wpDarkMode.enable_backend && is_saved != '0' && !wpDarkMode.is_block_editor) {

						if (document.getElementById('pre_css')) {
							document.getElementById('pre_css').remove();
						}

						document.querySelector('html').classList.add('wp-dark-mode-active');
						document.querySelector('.wp-dark-mode-switcher').classList.add('active');

						DarkMode.enable({
							brightness: 100,
							contrast: 90,
							sepia: 10
						});

					}

				})();
			</script>
			<?php
		}

		/**
		 * Display dark mode switcher button on the admin bar menu
		 *
		 * @return void
		 * @version 1.0.0
		 */
		public function render_admin_switcher_menu() {
			if ( ! is_admin() || 'on' !== wp_dark_mode_get_settings( 'wp_dark_mode_general', 'enable_backend', 'off' ) ) {
				return;
			}

			$light_text = wp_dark_mode_get_settings( 'wp_dark_mode_switch', 'switch_text_light', 'Light' );
			$dark_text  = wp_dark_mode_get_settings( 'wp_dark_mode_switch', 'switch_text_dark', 'Dark' );

			global $wp_admin_bar;
			$wp_admin_bar->add_menu(
				[
					'id'    => 'wp-dark-mode',
					'title' => sprintf(
						'<input type="checkbox" id="wp-dark-mode-switch" class="wp-dark-mode-switch">
							<div class="wp-dark-mode-switcher wp-dark-mode-ignore">
							
								<label for="wp-dark-mode-switch" class="wp-dark-mode-ignore">
									<div class="toggle wp-dark-mode-ignore"></div>
									<div class="modes wp-dark-mode-ignore">
										<p class="light wp-dark-mode-ignore">%s</p>
										<p class="dark wp-dark-mode-ignore">%s</p>
									</div>
								</label>
							
							</div>',
						$light_text,
						$dark_text
					),
					'href'  => '#',
				]
			);
		}

		/**
		 * Register dark mode Get Started, Get PRO, WP Dark Mode Tools sub menu.
		 *
		 * @return void
		 * @version 1.0.0
		 */
		public function admin_menu() {

			add_submenu_page(
				'wp-dark-mode-settings',
				__( 'Get Started - WP Dark Mode', 'wp-dark-mode' ),
				__( 'Get Started', 'wp-dark-mode' ),
				'manage_options',
				'wp-dark-mode-get-started',
				[ $this, 'getting_started' ],
				30
			);
			// Register tools submenu page.
			add_submenu_page(
				'wp-dark-mode-settings',
				__( 'WP Dark Mode Tools - WP Dark Mode', 'wp-dark-mode' ),
				__( 'Tools', 'wp-dark-mode' ),
				'manage_options',
				'wp-dark-mode-tools',
				[ $this, 'admin_tools' ], 40
			);

			$this->recommended_plugins_menu();

			if ( ! wp_dark_mode()->is_ultimate_active() ) {
				add_submenu_page(
					'wp-dark-mode-settings',
					__( 'Get PRO - WP Dark Mode', 'wp-dark-mode' ),
					'<div id="get-wp-dark-mode-pro-menu">Upgrade Now 
				<svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M5.2 0H2.8L0 3.6H4L5.2 0Z" fill="#7CFFCA"/>
				<path d="M14.4 3.6L11.6 0H9.19995L10.4 3.6H14.4Z" fill="#219D6B"/>
				<path d="M10.4 3.6H14.4L7.20001 12L10.4 3.6Z" fill="#24A973"/>
				<path d="M4 3.6H0L7.2 12L4 3.6ZM5.2 0L4 3.6H10.4L9.2 0H5.2Z" fill="#3BF5A9"/>
				<path d="M7.2 12L4 3.6H10.4L7.2 12Z" fill="#2BD08D"/>
				</svg> </div>', 'manage_options', '#', '', 9999);
			}
		}

		/**
		 * Load Get Start sub menu page template
		 *
		 * @return void
		 * @version 1.0.0
		 */
		public static function getting_started() {
			wp_dark_mode()->get_template( 'admin/get-started/index' );
		}

		/**
		 * Admin tools, template for reset - import and export settings
		 *
		 * @return void
		 * @version 1.0.0
		 */
		public static function admin_tools() {
			wp_dark_mode()->get_template( 'admin/tools' );
		}

		/**
		 * Singleton instance WP_Dark_Mode_Admin class
		 *
		 * @return WP_Dark_Mode_Admin|null
		 * @version 1.0.0
		 */
		public static function instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Utility Tools methods
		 * Use for import,export and rest setting
		 *
		 * @return array
		 * @version 1.0.0
		 */
		public function settings_option_names() {
			$option_names = [
				'wp_dark_mode_general',
				'wp_dark_mode_advanced',
				'wp_dark_mode_color',
				'wp_dark_mode_switch',
				'wp_dark_mode_includes_excludes',
				'wp_dark_mode_triggers',
				'wp_dark_mode_performance',
				'wp_dark_mode_accessibility',
				'wp_dark_mode_wc',
				'wp_dark_mode_image_settings',
				'wp_dark_mode_video_settings',
				'wp_dark_mode_custom_css',
				'wp_dark_mode_animation',
				'wp_dark_mode_analytics_reporting',
			];

			return apply_filters( 'wpdarkmode_settings_option_names', $option_names );
		}

		/**
		 * Returns WP Dark Mode settings from database.
		 *
		 * @return void|array
		 * @version 1.0.0
		 */
		public function export_settings() {
			// Checks WordPress Nonce.
			check_ajax_referer( 'wp_dark_mode_admin_nonce', 'nonce');

			// Checks if the user has permission to do this action.
			if ( ! current_user_can( 'manage_options' ) ) {
				wp_send_json_error( __( 'You do not have permission to do this action', 'wp-dark-mode' ) );
			}

			$option_names = $this->settings_option_names();

			$values = [];
			foreach ( $option_names as $option_name ) {
				$option_value = get_option( $option_name );

				if ( is_array( $option_value  ) || is_object( $option_value ) ) {
					$values[ $option_name ] = wp_slash( wp_json_encode( $option_value ) );
				} else {
					$values[ $option_name ] = $option_value;
				}
			}

			if ( $values ) {
				// Adding validation parameter.
				$values['configuration'] = 'WPDarkMode';
				$values['version']       = WP_DARK_MODE_VERSION;
				wp_send_json_success( $values );
			} else {
				wp_send_json_error();
			}
		}

		/**
		 * Updates WP Dark Mode Settings from Form Request
		 *
		 * @return array|void
		 * @version 1.0.0
		 */
		public function import_settings() {
			// Checks WordPress Nonce.
			check_ajax_referer( 'wp_dark_mode_admin_nonce', 'nonce');

			// Checks if the user has permission to do this action.
			if ( ! current_user_can( 'manage_options' ) ) {
				wp_send_json_error( __( 'You do not have permission to do this action', 'wp-dark-mode' ) );
			}

			$option_names = $this->settings_option_names();
			$log          = [];

			foreach ( $option_names as $option_name ) {
				if ( isset( $_REQUEST[ $option_name ] ) ) {

					$option_name  = sanitize_key( $option_name );
					$option_value = sanitize_text_field( wp_unslash( $_REQUEST[ $option_name ] ) );
					$option_value = wp_unslash( $option_value );
					$option_value = json_decode( $option_value, true );
					update_option( $option_name, $option_value );

					$log[] = [ $option_name, $option_value ];
				}
			}

			wp_send_json_success( $log );
		}

		/**
		 * Resets WP Dark Mode Settings to Default.
		 *
		 * @return  void|array
		 */
		public function reset_settings() {
			// Checks WordPress Nonce.
			check_ajax_referer( 'wp_dark_mode_admin_nonce', 'nonce');

			// Checks if the user has permission to do this action.
			if ( ! current_user_can( 'manage_options' ) ) {
				wp_send_json_error( __( 'You do not have permission to do this action', 'wp-dark-mode' ) );
			}

			$option_names = $this->settings_option_names();
			foreach ( $option_names as $option_name ) {
				delete_option( $option_name );
			}

			wp_send_json_success( __( 'Settings reset to default', 'wp-dark-mode' ) );
			wp_die();
		}

		/**
		 * After settings
		 *
		 * @return void
		 */
		public function after_settings() {
			// Promotional popup.
			include_once WP_DARK_MODE_TEMPLATES . '/admin/promotional-popup.php';
		}
	}

	// Instantiate the class.
	new WP_Dark_Mode_Admin();
}

