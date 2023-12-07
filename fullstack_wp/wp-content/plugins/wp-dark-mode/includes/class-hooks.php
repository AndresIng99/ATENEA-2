<?php
/**
 * Load admin site and user site important hook.
 *
 * @version 1.0.0
 * @package WP_DARK_MODE
 */

defined( 'ABSPATH' ) || exit();

/** Check if class `WP_Dark_Mode_Hooks` not exists yet */
if ( ! class_exists( 'WP_Dark_Mode_Hooks' ) ) {
	/**
	 * Load admin site and user site important hook.
	 *
	 * @version 1.0.0
	 */
	class WP_Dark_Mode_Hooks {

		/**
		 * Class instance.
		 *
		 * @var null
		 */
		private static $instance = null;

		/**
		 * Class constructor.
		 * Load admin site and user site action and filter hook
		 *
		 * @return void
		 * @version 1.0.0
		 */
		public function __construct() {
			add_filter( 'wp_dark_mode_excludes', [ $this, 'excludes' ] );

			// Display the dark mode switcher if the dark mode enabled on frontend.
			add_action( 'wp_footer', [ $this, 'display_widget' ] );

			// Declare custom color css variables.
			add_action( 'wp_head', [ $this, 'header_scripts' ] );
			add_action( 'elementor/after_enqueue_scripts', [ $this, 'after_elementor_scripts' ] );
			add_action( 'wp_footer', [ $this, 'footer_scripts' ], -99 );

			// WPtouch plugin compatibility.
			add_action( 'wptouch_switch_bottom', [ $this, 'footer_scripts' ] );
			add_filter( 'wp_dark_mode_switch_label_class', [ $this, 'switch_label_class' ] );
		}


		/**
		 * Handle exclude screen
		 *
		 * @param mixed $is_excluded is excluded.
		 * @return mixed
		 */
		public function is_current_page_excluded( $is_excluded = false ) {
			global $pagenow;

			return true;
		}

		/**
		 * Append :not selector scss
		 *
		 * @return string
		 * @version 1.0.0
		 */
		public function not_selectors() {
			$selectors = '';
			$excludes  = wp_dark_mode_get_settings( 'wp_dark_mode_display', 'excludes', '' );

			$excludes = trim( $excludes, ',' );
			$excludes = explode( ',', $excludes );

			if ( ! empty( $excludes ) ) {
				foreach ( $excludes as $exclude ) {
					$exclude = trim( $exclude );
					if ( ! empty( $exclude ) ) {
						$selectors .= ":not($exclude)";
					}
				}
			}

			// Elementor.
			if ( defined( 'ELEMENTOR_VERSION' ) ) {
				$selectors .= ':not(.elementor-element-overlay):not(.elementor-background-overlay)';
			}

			// BuddyPress.
			if ( class_exists( 'BuddyPress' ) ) {
				$selectors .= ':not(#item-header-cover-image):not(#item-header-avatar):not(.activity-content):not(.activity-header)';
			}

			return $selectors;
		}

		/**
		 * Set animation effect class depend on effect setting option data
		 *
		 * @param mixed $class The class name.
		 *
		 * @return string
		 * @version  1.0.0
		 */
		public function switch_label_class( $class ) {
			$animation = wp_dark_mode_get_settings( 'wp_dark_mode_switch', 'attention_effect', 'none' );

			if ( ! empty( $animation ) ) {
				$class .= ' wp-dark-mode-' . $animation;
			}

			return $class;
		}

		/**
		 * Declare custom color css variables
		 *
		 * @return void
		 * @version 1.0.0
		 */
		public function header_scripts() {
			$performance_mode = apply_filters( 'wp_dark_mode_performance_mode', false );

			// Hide gutenberg block if darkmode is disabled.
			if ( is_page() || is_single() ) {
				if ( ! wp_dark_mode_enabled() ) {
					printf( '<style>.wp-block-wp-dark-mode-block-dark-mode-switch{display: none;}</style>' );
				}
			}

			// Do not anything is dark mode is not enabled.
			if ( ! wp_dark_mode_enabled() ) {
				return;
			}

			$colors = wp_dark_mode_color_presets();

			$colors = [
				'bg'     => apply_filters( 'wp_dark_mode_bg_color', $colors['bg'] ),
				'text'   => apply_filters( 'wp_dark_mode_text_color', $colors['text'] ),
				'link'   => apply_filters( 'wp_dark_mode_link_color', $colors['link'] ),
				'border' => apply_filters( 'wp_dark_mode_border_color', wp_dark_mode_lighten( $colors['bg'], 30 ) ),
				'btn'    => apply_filters( 'wp_dark_mode_btn_color', wp_dark_mode_lighten( $colors['bg'], 20 ) ),
			];

			// Check if is custom color.
			$is_custom_color = wp_dark_mode_is_custom_color();

			// Add custom color init CSS.
			if ( $is_custom_color ) { ?>
				<style>
					html.wp-dark-mode-active {
						--wp-dark-mode-bg: <?php echo esc_attr( $colors['bg'] ); ?>;
						--wp-dark-mode-text: <?php echo esc_attr( $colors['text'] ); ?>;
						--wp-dark-mode-link: <?php echo esc_attr( $colors['link'] ); ?>;
						--wp-dark-mode-border: <?php echo esc_attr( $colors['border'] ); ?>;
						--wp-dark-mode-btn: <?php echo esc_attr( $colors['btn'] ); ?>;
					}
				</style>
				<?php
			}

			// Custom color css.
			if ( $is_custom_color ) {

				$scss = '               
                html.wp-dark-mode-active :not(.wp-dark-mode-ignore):not(img):not(a)' . $this->not_selectors() . ' {
					color: var(--wp-dark-mode-text) !important;
					border-color: var(--wp-dark-mode-border) !important;
					background-color: var(--wp-dark-mode-bg) !important; 
				}

				html.wp-dark-mode-active a:not(.wp-dark-mode-ignore), html.wp-dark-mode-active a *:not(.wp-dark-mode-ignore), html.wp-dark-mode-active a:active:not(.wp-dark-mode-ignore), html.wp-dark-mode-active a:active *:not(.wp-dark-mode-ignore), html.wp-dark-mode-active a:visited:not(.wp-dark-mode-ignore), html.wp-dark-mode-active a:visited *:not(.wp-dark-mode-ignore) {
					color: var(--wp-dark-mode-link) !important; 
				}
				html.wp-dark-mode-active iframe:not(.wp-dark-mode-ignore), html.wp-dark-mode-active iframe *:not(.wp-dark-mode-ignore), html.wp-dark-mode-active input:not(.wp-dark-mode-ignore), html.wp-dark-mode-active select:not(.wp-dark-mode-ignore), html.wp-dark-mode-active textarea:not(.wp-dark-mode-ignore), html.wp-dark-mode-active button:not(.wp-dark-mode-ignore) {
					background: var(--wp-dark-mode-btn) !important; 
				}
';
				printf( '<style>%s</style>', esc_attr( $scss ) );
			}
		}

		/**
		 * Load wp dark mode admin footer scripts for elementor
		 *
		 * @return void
		 * @version 1.0.0
		 */
		public function after_elementor_scripts() {
			// Check if is custom color.
			$is_custom_color = wp_dark_mode_is_custom_color();

			// Check if performance mode is enabled.
			$performance_mode = apply_filters( 'wp_dark_mode_performance_mode', false );
			?>
<script>
	(function() { window.wpDarkMode = <?php echo wp_json_encode( wp_dark_mode_localize_array() ); ?> ; 
		window.checkOsDarkMode = () => { if (!window.wpDarkMode.enable_os_mode || localStorage.getItem('wp_dark_mode_active')) return false; 
			const darkMediaQuery = window.matchMedia('(prefers-color-scheme: dark)'); 
			if (darkMediaQuery.matches) return true; try { darkMediaQuery.addEventListener('change', function(e) { return e.matches == true; }); } catch (e1) { 
				try { darkMediaQuery.addListener(function(e) { return e.matches == true; }); } catch (e2) { console.error(e2); return false; } } return false; }; 
				const is_saved = localStorage.getItem('wp_dark_mode_active'); 
				const isCustomColor = parseInt("<?php echo esc_html( wp_validate_boolean( $is_custom_color ) ); ?>"); 
				const shouldDarkMode = is_saved == '1' || (!is_saved && window.checkOsDarkMode()); 
				if (!shouldDarkMode) return; document.querySelector('html').classList.add('wp-dark-mode-active'); 
				const isPerformanceMode = Boolean( <?php echo esc_html( $performance_mode ); ?> ); 
				if (!isCustomColor && !isPerformanceMode) { var css = `body, div, section, header, article, main, aside{background-color: #2B2D2D !important;}`; 
				var head = document.head || document.getElementsByTagName('head')[0], 
				style = document.createElement('style'); 
				style.setAttribute('id', 'pre_css'); 
				head.appendChild(style); style.type = 'text/css'; if (style.styleSheet) { style.styleSheet.cssText = css; } else { style.appendChild(document.createTextNode(css)); } } })();
</script>
			<?php
		}

		/**
		 * Load wp dark mode footer scripts
		 *
		 * @return mixed
		 * @version 1.0.0
		 */
		public function footer_scripts() {
			if ( ! wp_dark_mode_enabled() ) {
				return;
			}

			$is_custom_color  = wp_validate_boolean( wp_dark_mode_is_custom_color() );
			$includes         = esc_html( wp_dark_mode_get_includes() );
			$performance_mode = wp_validate_boolean( apply_filters( 'wp_dark_mode_performance_mode', false ) );
			?>
			<script>
				;(function () { window.wpDarkMode = <?php echo wp_json_encode( wp_dark_mode_localize_array() ); ?>; 
					window.checkOsDarkMode = () => { if (!window.wpDarkMode.enable_os_mode || localStorage.getItem('wp_dark_mode_active')) return false; 
						const darkMediaQuery = window.matchMedia('(prefers-color-scheme: dark)'); 
						if (darkMediaQuery.matches) return true; 
						try { darkMediaQuery.addEventListener('change', function(e) { return e.matches == true; }); } catch (e1) { 
							try { darkMediaQuery.addListener(function(e) { return e.matches == true; }); } catch (e2) { console.error(e2); return false; } } return false; }; 
						const is_saved = localStorage.getItem('wp_dark_mode_active'); const shouldDarkMode = is_saved == '1' || (!is_saved && window.checkOsDarkMode()); 
						if (shouldDarkMode) { const isCustomColor = parseInt("<?php echo esc_html( $is_custom_color ); ?>");
							const isPerformanceMode = Boolean(<?php echo esc_html( $performance_mode ); ?>); if (!isCustomColor && !isPerformanceMode) { if (document.getElementById('pre_css')) { document.getElementById('pre_css').remove(); } 
							if ('' === `<?php echo esc_html( $includes ); ?>`) { if ( typeof DarkMode === 'object') DarkMode.enable(); } } } })(); 
			</script>
			<?php
		}

		/**
		 * Append Exclude elements class
		 *
		 * @param string $excludes excludes elements class.
		 *
		 * @return string
		 * @version 1.0.0
		 */
		public function excludes( $excludes ) {
			$excludes .= ',rs-fullwidth-wrap, .mejs-container, ._channels-container';

			if ( $this->is_license_valid() ) {
				$selectors = wp_dark_mode_get_settings( 'wp_dark_mode_includes_excludes', 'excludes' );

				if ( ! empty( $selectors ) ) {
					$excludes .= ", $selectors";
				}
			}

			return $excludes;
		}

		/**
		 * Checks if the license is valid
		 *
		 * @return mixed
		 * @version 1.0.0
		 */
		public function is_license_valid() {
			global $wp_dark_mode_license;

			if ( ! $wp_dark_mode_license ) {
				return false;
			}

			return $wp_dark_mode_license->is_valid();
		}

		/**
		 * Display the footer widget
		 *
		 * @return mixed
		 * @version 1.0.0
		 */
		public function display_widget() {

			if ( ! wp_dark_mode_enabled() || 'on' !== wp_dark_mode_get_settings( 'wp_dark_mode_switch', 'show_switcher', 'on' ) ) {
				return;
			}

			$style = wp_dark_mode_get_settings( 'wp_dark_mode_switch', 'switch_style', 1 );

			if ( ! $this->is_license_valid() ) {
				$style = $style > 3 ? 1 : $style;
			}

			if ( ! wp_dark_mode()->is_ultimate_active() ) {
				$style = $style > 8 ? 1 : $style;
			}

			echo do_shortcode( '[wp_dark_mode floating="yes" style="' . $style . '"]' );
		}

		/**
		 * Singleton instance WP_Dark_Mode_Hooks class
		 *
		 * @return WP_Dark_Mode_Hooks|null
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
 * Kick out the class
 */
WP_Dark_Mode_Hooks::instance();