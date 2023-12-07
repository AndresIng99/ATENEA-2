<?php
/**
 * We are provide support different type of free and premium extra theme.
 * This class is being used to be compatible with a variety of extra themes.
 *
 * @version 1.0.0
 * @package WP_DARK_MODE
 */

// If direct access than exit the file.
defined( 'ABSPATH' ) || exit();

/**
 * Check class is already exists
 *
 * @version 1.0.0
 */
if ( ! class_exists( 'WP_Dark_Mode_Theme_Supports' ) ) {
	/**
	 * We are provide support different type of free and premium extra theme.
	 * This class is being used to be compatible with a variety of extra themes.
	 *
	 * @version 1.0.0
	 */
	class WP_Dark_Mode_Theme_Supports {

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
			add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
			add_filter( 'wp_dark_mode_excludes', [ $this, 'excludes' ], 99 );
		}

		/**
		 * Push extra class & id depend on theme
		 * Such as theme name Jannah->add class .post-thumb-overlay-wrap, .post-thumb-overlay
		 *
		 * @param string $excludes default class and id.
		 *
		 * @return string
		 * @version 1.0.0
		 */
		public function excludes( $excludes ) {
			if ( $this->is_theme( 'Jannah' ) ) {
				$excludes .= ', .post-thumb-overlay-wrap, .post-thumb-overlay';
			}

			if ( $this->is_theme( 'OceanWP' ) ) {
				$excludes .= ', .wcmenucart-details';
			}

			if ( $this->is_theme( 'Salient' ) ) {
				$excludes .= ', .slide_out_area_close';
			}

			if ( $this->is_theme( 'Twenty Twenty' ) ) {
				$excludes .= ', .search-toggle, .woocommerce-product-gallery__trigger .emoji';
			}

			if ( $this->is_theme( 'Flatsome' ) ) {
				$excludes .= ', .section-title b, .box, .is-divider, .blog-share, .slider-wrapper';
			}

			if ( $this->is_theme( 'Avada' ) ) {
				$excludes .= ', .fusion-column-inner-bg-wrapper, .fusion-progressbar, .fusion-sliding-bar-wrapper, .fusion-button';
			}

			if ( $this->is_theme( 'The7' ) ) {
				$excludes .= ', .dt-btn, .soc-ico, .author-avatar, .post-thumbnail, .icon-inner';
			}

			if ( $this->is_theme( 'Betheme' ) ) {
				$excludes .= ', .mfn-rev-slider, .image_frame';
			}

			if ( $this->is_theme( 'Newspaper' ) ) {
				$excludes .= ', .td-module-meta-info';
			}

			return $excludes;
		}

		/**
		 * Check which theme is exits
		 *
		 * @param string $check_theme theme name.
		 *
		 * @return string
		 * @version 1.0.0
		 */
		public function is_theme( $check_theme ) {
			$theme = wp_get_theme();

			$theme_name        = $theme->name;
			$theme_parent_name = ! empty( $theme->parent()->name ) ? $theme->parent()->name : '';

			return in_array( $check_theme, [ $theme_name, $theme_parent_name ], false );
		}

		/**
		 * Not selectors.
		 *
		 * @param string $selectors The selectors.
		 * @return string
		 */
		public function not_selectors( $selectors ) {
			if ( $this->is_theme( 'Jannah' ) ) {
				$selectors = ':not(.breaking-title-text):not(.shopping-cart-icon):not(.menu-counter-bubble-outer):not(.menu-counter-bubble)';
			}

			return $selectors;
		}

		/**
		 * Conditionally load css scripts depend on theme
		 *
		 * @return void
		 * @version 1.0.0
		 */
		public function enqueue_scripts() {
			if ( $this->is_theme( 'Astra' ) ) {
				wp_enqueue_style( 'wp-dark-mode-astra', WP_DARK_MODE_ASSETS . '/css/themes/astra.css', [], time() );
			} elseif ( $this->is_theme( 'Jannah' ) ) {
				wp_enqueue_style( 'wp-dark-mode-jannah', WP_DARK_MODE_ASSETS . '/css/themes/jannah.css', [], time() );
			} elseif ( $this->is_theme( 'OceanWP' ) ) {
				wp_enqueue_style( 'wp-dark-mode-salient', WP_DARK_MODE_ASSETS . '/css/themes/oceanwp.css', [], time() );
			} elseif ( $this->is_theme( 'Salient' ) ) {
				wp_enqueue_style( 'wp-dark-mode-salient', WP_DARK_MODE_ASSETS . '/css/themes/salient.css', [], time() );
			} elseif ( $this->is_theme( 'Twenty Twenty' ) ) {
				wp_enqueue_style( 'wp-dark-mode-twentytwenty', WP_DARK_MODE_ASSETS . '/css/themes/twentytwenty.css', [], time() );
			} elseif ( $this->is_theme( 'Salient' ) ) {
				wp_enqueue_style( 'wp-dark-mode-salient', WP_DARK_MODE_ASSETS . '/css/themes/salient.css', [], time() );
			} elseif ( $this->is_theme( 'Flatsome' ) ) {
				wp_enqueue_style( 'wp-dark-mode-flatsome', WP_DARK_MODE_ASSETS . '/css/themes/flatsome.css', [], time() );
			} elseif ( $this->is_theme( 'Avada' ) ) {
				wp_enqueue_style( 'wp-dark-mode-avada', WP_DARK_MODE_ASSETS . '/css/themes/avada.css', [], time() );
			} elseif ( $this->is_theme( 'The7' ) ) {
				wp_enqueue_style( 'wp-dark-mode-the7', WP_DARK_MODE_ASSETS . '/css/themes/the7.css', [], time() );
			} elseif ( $this->is_theme( 'Betheme' ) ) {
				wp_enqueue_style( 'wp-dark-mode-betheme', WP_DARK_MODE_ASSETS . '/css/themes/betheme.css', [], time() );
			} elseif ( $this->is_theme( 'Newspaper' ) ) {
				wp_enqueue_style( 'wp-dark-mode-newspaper', WP_DARK_MODE_ASSETS . '/css/themes/newspaper.css', [], time() );
			} elseif ( $this->is_theme( 'GeneratePress' ) ) {
				wp_enqueue_style( 'wp-dark-mode-generatepress', WP_DARK_MODE_ASSETS . '/css/themes/generatepress.css', [], time() );
			}
		}

		/**
		 * Singleton instance WP_Dark_Mode_Theme_Supports class
		 *
		 * @return WP_Dark_Mode_Theme_Supports|null
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
	 * Kick out the WP_Dark_Mode_Theme_Supports class
	 *
	 * @version 1.0.0
	 */
	WP_Dark_Mode_Theme_Supports::instance();
}
