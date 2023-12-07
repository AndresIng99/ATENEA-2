<?php
/**
 * WP Dark Mode - Button 9
 *
 * @package WP_DARK_MODE
 */

defined( 'ABSPATH' ) || exit();
?>

<div class="wp-dark-mode-switcher wp-dark-mode-ignore  style-9 <?php echo ! empty( $args['class'] ) ? esc_attr( $args['class'] ) : ''; ?> <?php echo 'yes' === $args['floating'] ? 'floating ' . esc_attr( $args['position'] ) : ''; ?>">

	<?php
	if ( ! empty( $args['cta_text'] ) ) {
		echo wp_kses_post( wp_sprintf( '<span class="wp-dark-mode-switcher-cta wp-dark-mode-ignore">%s <span class="wp-dark-mode-ignore"></span></span>', esc_html( $args['cta_text'] ) ) );
	}
	?>

	<label for="wp-dark-mode-switch" class="<?php echo esc_url( apply_filters( 'wp_dark_mode_switch_label_class', 'wp-dark-mode-ignore' ) ); ?>">
		<div class="modes wp-dark-mode-ignore">
			<img class="light" src="<?php echo esc_url( WP_DARK_MODE_ASSETS . '/images/btn-9/light.svg' ); ?>" alt="<?php esc_html_e( 'Light', 'wp-dark-mode' ); ?>">
			<img class="dark" src="<?php echo esc_url( WP_DARK_MODE_ASSETS . '/images/btn-9/dark.svg' ); ?>" alt="<?php esc_html_e( 'Dark', 'wp-dark-mode' ); ?>">
		</div>
	</label>
</div>