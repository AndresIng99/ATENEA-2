<?php
/**
 * WP Dark Mode - Custom button.
 *
 * @package WP_DARK_MODE
 * @since 2.0
 */

defined( 'ABSPATH' ) || exit();

$args['is_floating'] = isset( $args['floating'] ) && 'yes' === $args['floating'];
$args['position']    = wp_dark_mode_get_settings( 'wp_dark_mode_switch', 'switcher_position', 'right_bottom' );

$args['light_img'] = wp_dark_mode_get_settings( 'wp_dark_mode_switch', 'switch_icon_light', WP_DARK_MODE_ASSETS . '/images/btn-7/moon.png' );
$args['dark_img']  = wp_dark_mode_get_settings( 'wp_dark_mode_switch', 'switch_icon_dark', WP_DARK_MODE_ASSETS . '/images/btn-7/sun.png' );
?>
<div class="custom-switch wp-dark-mode-switcher wp-dark-mode-ignore <?php echo esc_attr( $args['class'] ); ?> <?php echo $args['is_floating'] ? 'floating ' . esc_attr( $args['position'] ) : ''; ?>">
	<label for="wp-dark-mode-switch" class="wp-dark-mode-ignore">
		<div class="modes">
			<img src="<?php echo esc_url( $args['light_img'] ); ?>" class="light wp-dark-mode-switch-icon wp-dark-mode-switch-icon__light" alt="<?php esc_html_e( 'Light', 'wp-dark-mode' ); ?>">
			<img src="<?php echo esc_url( $args['dark_img'] ); ?>" class="dark wp-dark-mode-switch-icon wp-dark-mode-switch-icon__dark" alt="<?php esc_html_e( 'Dark', 'wp-dark-mode' ); ?>">
		</div>
	</label>
</div>