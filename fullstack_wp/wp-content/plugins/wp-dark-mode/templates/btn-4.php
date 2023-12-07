<?php
/**
 * WP Dark Mode - Button 4
 *
 * @package WP_DARK_MODE
 */

defined( 'ABSPATH' ) || exit();
?>
<div class="wp-dark-mode-switcher wp-dark-mode-ignore style-4 <?php echo ! empty( $args['class'] ) ? esc_attr( $args['class'] ) : ''; ?> <?php echo 'yes' === $args['floating'] ? 'floating ' . esc_attr( $args['position'] ) : ''; ?>">

	<?php
	if ( ! empty( $args['cta_text'] ) ) {
		echo wp_kses_post( wp_sprintf( '<span class="wp-dark-mode-switcher-cta wp-dark-mode-ignore">%s <span class="wp-dark-mode-ignore"></span></span>', esc_html( $args['cta_text'] ) ) );
	}
	?>

	<div class="<?php echo esc_attr( apply_filters( 'wp_dark_mode_switch_label_class', 'wp-dark-mode-ignore switch-wrap' ) ); ?>">
	<img class="sun-light" src="<?php echo esc_url( WP_DARK_MODE_ASSETS . '/images/btn-4/sun-light.png' ); ?>" alt="<?php esc_html_e( 'Light', 'wp-dark-mode' ); ?>">
	<img class="sun-dark" src="<?php echo esc_url( WP_DARK_MODE_ASSETS . '/images/btn-4/sun-dark.png' ); ?>" alt="<?php esc_html_e( 'Dark', 'wp-dark-mode' ); ?>">

	<label for="wp-dark-mode-switch" class="wp-dark-mode-ignore">
		<div class="toggle wp-dark-mode-ignore"></div>
	</label>

	<img class="moon-dark" src="<?php echo esc_url( WP_DARK_MODE_ASSETS . '/images/btn-4/moon-dark.png' ); ?>" alt="<?php esc_html_e( 'Dark', 'wp-dark-mode' ); ?>">
	<img class="moon-light" src="<?php echo esc_url( WP_DARK_MODE_ASSETS . '/images/btn-4/moon-light.png' ); ?>" alt="<?php esc_html_e( 'Light', 'wp-dark-mode' ); ?>">
	</div>
</div>