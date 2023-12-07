<?php
/**
 * Contains the helper functions.
 *
 * @since 2.3.4
 * @package WP_DARK_MODE
 */

/** Prevent direct access */
defined( 'ABSPATH' ) || exit();

if ( ! function_exists( 'wp_dark_mode_get_settings' ) ) {

	/**
	 * Get setting database option
	 *
	 * @param string $section The section name.
	 * @param string $key     Option key name.
	 * @param mixed  $default Default value to return.
	 *
	 * @return mixed
	 */
	function wp_dark_mode_get_settings( $section = 'wp_dark_mode_general', $key = '', $default = '' ) {
		$settings = get_option( $section );
		return isset( $settings[ $key ] ) ? $settings[ $key ] : $default;
	}
}

if ( ! function_exists( 'wp_dark_mode_color_presets' ) ) {
	/**
	 * Get wp dark mode color setting option data
	 *
	 * @return string
	 * @version 1.0.0
	 */
	function wp_dark_mode_color_presets() {
		$preset = wp_dark_mode_get_settings( 'wp_dark_mode_color', 'color_preset', 0 );

		$presets = apply_filters(
			'wp_dark_mode_color_presets',
			array(
				array(
					'bg'   => '#000',
					'text' => '#dfdedb',
					'link' => '#e58c17',
				),
				array(
					'bg'   => '#1B2836',
					'text' => '#fff',
					'link' => '#459BE6',
				),
				array(
					'bg'   => '#1E0024',
					'text' => '#fff',
					'link' => '#E251FF',
				),
			)
		);

		return ! empty( $presets[ $preset ] ) ? $presets[ $preset ] : $presets['0'];
	}
}

if ( ! function_exists( 'wp_dark_mode_exclude_pages' ) ) {
	/**
	 * Get exclude pages setting option data
	 *
	 * @return string|array
	 * @version 1.0.0
	 */
	function wp_dark_mode_exclude_pages() {
		return wp_dark_mode_get_settings( 'wp_dark_mode_triggers', 'exclude_pages', array() );
	}
}

/**
 * Get exclude pages except setting option data
 *
 * @return string|array
 * @version 1.0.0
 */
function wp_dark_mode_exclude_pages_except() {
	return wp_dark_mode_get_settings( 'wp_dark_mode_triggers', 'exclude_pages_except', array() );
}

if ( ! function_exists( 'wp_dark_mode_enabled' ) ) {
	/**
	 * Get Enable/disable dark mode in frontend setting options data
	 *
	 * @return mixed
	 * @version 1.0.0
	 */
	function wp_dark_mode_enabled() {

		global $pagenow;

		if ( ! empty( $pagenow ) && 'widgets.php' === $pagenow ) {
			return false;
		}

		$frontend_enable = 'on' === wp_dark_mode_get_settings( 'wp_dark_mode_general', 'enable_frontend', 'on' );

		if ( ! $frontend_enable ) {
			return false;
		}

		return apply_filters( 'wp_dark_mode_is_enabled', true );
	}
}

/**
 * Check wp dark mode license is valid or not
 *
 * @return mixed
 * @version 1.0.0
 */
function wp_dark_mode_is_hello_elementora() {
	global $wp_dark_mode_license;

	if ( ! $wp_dark_mode_license ) {
		return false;
	}

	return $wp_dark_mode_license->is_valid();
}

/**
 * Check current page is gutenberg page or block editor
 * if current page is gutenberg page or block editor return true else false
 *
 * @return mixed
 * @version 1.0.0
 */
function wp_dark_mode_is_gutenberg_page() {
	$current_screen = get_current_screen();

	return method_exists( $current_screen, 'is_block_editor' ) && $current_screen->is_block_editor();
}

/**
 * Check wp dark mode ultimate license is valid or not
 *
 * @return mixed
 * @version 1.0.0
 */
function wp_dark_mode_frontend_mode() {
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
 * WP dark mode localize array
 * Send dark mode setting data in js file
 *
 * @return array
 * @version 1.0.0
 */
function wp_dark_mode_localize_array() {
	global $current_screen;

	$pro_version = 0;

	if ( defined( 'WP_DARK_MODE_ULTIMATE_VERSION' ) ) {
		$pro_version = WP_DARK_MODE_ULTIMATE_VERSION;
	} elseif ( defined( 'WP_DARK_MODE_PRO_VERSION' ) ) {
		$pro_version = WP_DARK_MODE_PRO_VERSION;
	}

	$colors = wp_dark_mode_color_presets();
	$colors = array(
		'bg'   => apply_filters( 'wp_dark_mode_bg_color', $colors['bg'] ),
		'text' => apply_filters( 'wp_dark_mode_text_color', $colors['text'] ),
		'link' => apply_filters( 'wp_dark_mode_link_color', $colors['link'] ),
	);

	return array(
		'config'              => array(
			'brightness' => intval( wp_dark_mode_get_settings( 'wp_dark_mode_color', 'brightness', 100 ) ),
			'contrast'   => intval( wp_dark_mode_get_settings( 'wp_dark_mode_color', 'contrast', 90 ) ),
			'sepia'      => intval( wp_dark_mode_get_settings( 'wp_dark_mode_color', 'sepia', 10 ) ),
		),

		'enable_preset'       => 'on' === wp_dark_mode_get_settings( 'wp_dark_mode_color', 'enable_preset', 'off' ),
		'customize_colors'    => 'on' === wp_dark_mode_get_settings( 'wp_dark_mode_color', 'customize_colors', 'off' ),
		'colors'              => $colors,
		'enable_frontend'     => wp_dark_mode_enabled(),
		'enable_backend'      => 'on' === wp_dark_mode_get_settings( 'wp_dark_mode_general', 'enable_backend', 'off' ),
		'enable_os_mode'      => 'on' === wp_dark_mode_get_settings( 'wp_dark_mode_general', 'enable_os_mode', 'on' ),
		'excludes'            => wp_dark_mode_get_excludes(),
		'includes'            => wp_dark_mode_get_includes(),
		'is_excluded'         => false,
		'remember_darkmode'   => 'on' === wp_dark_mode_get_settings( 'wp_dark_mode_advanced', 'remember_darkmode', 'off' ),
		'default_mode'        => 'on' === wp_dark_mode_get_settings( 'wp_dark_mode_advanced', 'default_mode', 'off' ),
		'keyboard_shortcut'   => 'on' === wp_dark_mode_get_settings( 'wp_dark_mode_accessibility', 'keyboard_shortcut', 'on' ),
		'url_parameter'       => 'on' === wp_dark_mode_get_settings( 'wp_dark_mode_accessibility', 'url_parameter', 'off' ),
		'images'              => get_option( 'wp_dark_mode_image_settings' ),
		'videos'              => get_option( 'wp_dark_mode_video_settings' ),
		'is_pro_active'       => wp_dark_mode()->is_pro_active(),
		'is_ultimate_active'  => wp_dark_mode()->is_ultimate_active(),
		'pro_version'         => $pro_version,
		'is_elementor_editor' => class_exists( '\Elementor\Plugin' ) && Elementor\Plugin::$instance->editor->is_edit_mode(),
		'is_block_editor'     => is_object( $current_screen ) && method_exists( $current_screen, 'is_block_editor' ) && $current_screen->is_block_editor(),
		'frontend_mode'       => wp_dark_mode_frontend_mode(),
		'pluginUrl'           => WP_DARK_MODE_URL,
	);
}

/**
 * Check custom color/preset color ON or not.
 * if custom color/preset color on return true
 *
 * @return mixed
 * @version 1.0.0
 */
function wp_dark_mode_is_custom_color() {
	return 'on' === wp_dark_mode_get_settings( 'wp_dark_mode_color', 'enable_preset', 'off' )
	|| 'on' === wp_dark_mode_get_settings( 'wp_dark_mode_color', 'customize_colors', 'off' );
}

if ( ! function_exists( 'wp_dark_mode_lighten' ) ) {

	/**
	 * WP dark mode lighten
	 *
	 * @param string $hex   The hex color code.
	 * @param string $steps Steps to have in colors.
	 * @return string
	 * @version 1.0.0
	 */
	function wp_dark_mode_lighten( $hex, $steps ) {
		// Steps should be between -255 and 255. Negative = darker, positive = lighter.
		$steps = max( - 255, min( 255, $steps ) );

		// Normalize into a six character long hex string.
		$hex = str_replace( '#', '', $hex );
		if ( strlen( $hex ) === 3 ) {
			$hex = str_repeat( substr( $hex, 0, 1 ), 2 ) . str_repeat( substr( $hex, 1, 1 ), 2 ) . str_repeat( substr( $hex, 2, 1 ), 2 );
		}

		// Split into three parts: R, G and B.
		$color_parts = str_split( $hex, 2 );
		$return      = '#';

		foreach ( $color_parts as $color ) {
			$color   = hexdec( $color );                                   // Convert to decimal.
			$color   = max( 0, min( 255, $color + $steps ) );              // Adjust color.
			$return .= str_pad( dechex( $color ), 2, '0', STR_PAD_LEFT ); // Make two char hex code.
		}

		return $return;
	}
}

/**
 * Get excludes setting option data in includes/excludes page
 *
 * @return string
 * @version 1.0.0
 */
function wp_dark_mode_get_excludes() {
	$excludes = wp_dark_mode_get_settings( 'wp_dark_mode_includes_excludes', 'excludes' );

	return trim( apply_filters( 'wp_dark_mode_excludes', $excludes ), ',' );
}

/**
 * Get includes setting option data in includes/excludes page
 *
 * @return string
 * @version 1.0.0
 */
function wp_dark_mode_get_includes() {
	$includes = wp_dark_mode_get_settings( 'wp_dark_mode_includes_excludes', 'includes' );

	return trim( apply_filters( 'wp_dark_mode_includes', $includes ), ',' );
}

/**
 * Extended KSES Rules
 */
if ( ! function_exists( 'wpdm_extended_kses' ) ) {
	/**
	 * Returns extended set of allowed HTML for WP Dark Mode Switches
	 *
	 * @return array
	 */
	function wpdm_extended_kses() {
		return array_merge(
			wp_kses_allowed_html( 'post' ),
			[
				'svg'      => array(
					'xmlns'       => true,
					'width'       => true,
					'height'      => true,
					'viewbox'     => true,
					'fill'        => true,
					'xmlns:xlink' => true,
					'class'       => true,
					'data-name'   => true,
					'id'          => true,
					'viewBox'     => true,
				),
				'path'     => array(
					'd'            => true,
					'data-name'    => true,
					'id'           => true,
					'xlink:href'   => true,
					'viewBox'      => true,
					'transform'    => true,
					'fill'         => true,
					'fill-rule'    => true,
					'stroke'       => true,
					'stroke-width' => true,
					'clip-path'    => true,
					'class'        => true,
				),
				'image'    => array(
					'xlink:href' => true,
					'width'      => true,
					'height'     => true,
					'data-name'  => true,
					'id'         => true,
					'viewBox'    => true,
					'class'      => true,
				),
				'rect'     => array(
					'width'     => true,
					'height'    => true,
					'data-name' => true,
					'id'        => true,
					'viewBox'   => true,
					'fill'      => true,
					'fill-rule' => true,
					'x'         => true,
					'y'         => true,
					'rx'        => true,
					'class'     => true,
					'transform' => true,
				),
				'circle'   => array(
					'cx'        => true,
					'cy'        => true,
					'r'         => true,
					'data-name' => true,
					'id'        => true,
					'viewBox'   => true,
					'fill'      => true,
					'fill-rule' => true,
					'class'     => true,
				),
				'clippath' => array(
					'id'            => true,
					'clipPathUnits' => true,
					'class'         => true,
				),
				'defs'     => array(
					'class' => true,
				),
				'g'        => [
					'id'        => true,
					'class'     => true,
					'data-name' => true,
					'transform' => true,
					'clip-path' => true,
				],
				'span'     => [
					'class' => true,
				],
			]
		);
	}
}
