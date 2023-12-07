<?php
/**
 * WP Dark Mode - Button 2
 *
 * @package WP_DARK_MODE
 */

defined( 'ABSPATH' ) || exit();


$args['light_text']  = wp_dark_mode_get_settings( 'wp_dark_mode_switch', 'switch_text_light', __( 'Light', 'wp-dark-mode' ) );
$args['dark_text']   = wp_dark_mode_get_settings( 'wp_dark_mode_switch', 'switch_text_dark', __( 'Dark', 'wp-dark-mode' ) );

if ( 'on' !== wp_dark_mode_get_settings( 'wp_dark_mode_switch', 'custom_switch_text', 'off' ) ) {
	$args['light_text'] = esc_html__( 'Light', 'wp-dark-mode' );
	$args['dark_text']  = esc_html__( 'Dark', 'wp-dark-mode' );
}
?>
<div class="wp-dark-mode-switcher wp-dark-mode-ignore style-2  <?php echo ! empty( $args['class'] ) ? esc_attr( $args['class'] ) : ''; ?> <?php echo 'yes' === $args['floating'] ? 'floating ' . esc_attr( $args['position'] ) : ''; ?>">

	<?php
	if ( ! empty( $args['cta_text'] ) ) {
		echo wp_kses_post( wp_sprintf( '<span class="wp-dark-mode-switcher-cta wp-dark-mode-ignore">%s <span class="wp-dark-mode-ignore"></span></span>', esc_html( $args['cta_text'] ) ) );
	}
	?>

	<label for="wp-dark-mode-switch" class="<?php echo esc_attr( apply_filters( 'wp_dark_mode_switch_label_class', 'wp-dark-mode-ignore' ) ); ?>">
		<div class="toggle wp-dark-mode-ignore"></div>
		<div class="modes wp-dark-mode-ignore">
			<p class="light wp-dark-mode-ignore switch-light-text"><?php echo esc_html( $args['light_text'] ); ?></p>
			<p class="dark wp-dark-mode-ignore switch-dark-text"><?php echo esc_html( $args['dark_text'] ); ?></p>
		</div>
	</label>
</div>