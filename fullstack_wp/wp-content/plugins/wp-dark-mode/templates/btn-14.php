<?php
/**
 * WP Dark Mode - Button 14
 *
 * @package WP_DARK_MODE
 */

defined( 'ABSPATH' ) || exit();
?>
<div class="style-14 <?php echo ! empty( $args['position'] ) ? esc_attr( $args['position'] ) : ''; ?> <?php echo esc_attr( apply_filters( 'wp_dark_mode_switch_label_class', 'wp-dark-mode-side-toggle-wrap wp-dark-mode-ignore' ) ); ?>">

	<div class="wp-dark-mode-side-toggle wp-dark-mode-toggle wp-dark-mode-switcher wp-dark-mode-ignore">

		<svg width="30" class="wp-dark-mode-ignore" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.7 28.7" role="img" aria-labelledby="high-contrast-svg-title">
			<title id="high-contrast-svg-title"><?php esc_html_e( 'Toggle Dark Mode', 'wp-dark-mode' ); ?></title>
			<path class="wp-dark-mode-ignore" d="M14.3 0C6.5 0 0 6.5 0 14.3c0 7.9 6.5 14.3 14.3 14.3 7.9 0 14.3-6.5 14.3-14.3C28.7 6.5 22.2 0 14.3 0zm0 3.6c6 0 10.8 4.8 10.8 10.8 0 6-4.8 10.8-10.8 10.8V3.6z"></path>
		</svg>

		<span class="wp-dark-mode-ignore"><?php esc_html_e( 'Toggle Dark Mode', 'wp-dark-mode' ); ?></span>
	</div>

	<div class="wp-dark-mode-side-toggle wp-dark-mode-font-size-toggle wp-dark-mode-ignore">

		<svg width="30" class="wp-dark-mode-ignore" viewBox="0 0 24 19" fill="none" xmlns="http://www.w3.org/2000/svg" role="img" aria-labelledby="large-font-svg-title">
			<title id="large-font-svg-title"><?php esc_html_e( 'Toggle Large Font Size', 'wp-dark-mode' ); ?></title>
			<path class="wp-dark-mode-ignore" d="M10.667 2.637v15.825H8V2.637H0V0h18.667v2.637h-8zM24 9.231h-9.333v2.637H18v6.594h2.667v-6.594H24V9.231z" fill="currentColor"></path>
		</svg>

		<span class="wp-dark-mode-ignore"><?php esc_html_e( 'Toggle Font Size', 'wp-dark-mode' ); ?></span>
	</div>

</div>