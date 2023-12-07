<?php
/**
 * WP Dark Mode - Button 5
 *
 * @package WP_DARK_MODE
 */

defined( 'ABSPATH' ) || exit();

$args['light_text']  = wp_dark_mode_get_settings( 'wp_dark_mode_switch', 'switch_text_light', esc_html__( 'Light', 'wp-dark-mode' ) );
$args['dark_text']   = wp_dark_mode_get_settings( 'wp_dark_mode_switch', 'switch_text_dark', esc_html__( 'Dark', 'wp-dark-mode' ) );

if ( 'on' !== wp_dark_mode_get_settings( 'wp_dark_mode_switch', 'custom_switch_text', 'off' ) ) {
	$args['light_text'] = __( 'Light', 'wp-dark-mode' );
	$args['dark_text']  = __( 'Dark', 'wp-dark-mode' );
}
?>

<div class="wp-dark-mode-switcher wp-dark-mode-ignore  style-5  <?php echo ! empty( $args['class'] ) ? esc_attr( $args['class'] ) : ''; ?> <?php echo 'yes' === $args['floating'] ? 'floating ' . esc_attr( $args['position'] ) : ''; ?>">

	<?php
	if ( ! empty( $args['cta_text'] ) ) {
		echo wp_kses_post( wp_sprintf( '<span class="wp-dark-mode-switcher-cta wp-dark-mode-ignore">%s <span class="wp-dark-mode-ignore"></span></span>', esc_html( $args['cta_text'] ) ) );
	}
	?>

	<div class="<?php echo esc_attr( apply_filters( 'wp_dark_mode_switch_label_class', 'wp-dark-mode-ignore switch-wrap' ) ); ?>">
		<p class="wp-dark-mode-ignore switch-light-text"><?php echo esc_html( $args['light_text'] ); ?></p>

		<label for="wp-dark-mode-switch" class="wp-dark-mode-ignore">
			<div class="modes wp-dark-mode-ignore">
				<img class="light" src="<?php echo esc_url( WP_DARK_MODE_ASSETS . '/images/btn-5/sun.png' ); ?>" alt="<?php esc_html_e( 'Light', 'wp-dark-mode' ); ?>">
				<img class="dark" src="<?php echo esc_url( WP_DARK_MODE_ASSETS . '/images/btn-5/moon.png' ); ?>" alt="<?php esc_html_e( 'Dark', 'wp-dark-mode' ); ?>">
			</div>
		</label>

		<p class="wp-dark-mode-ignore switch-dark-text"><?php echo esc_html( $args['dark_text'] ); ?></p>
	</div>
</div>