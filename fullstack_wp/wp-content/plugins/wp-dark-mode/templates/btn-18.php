<?php
/**
 * WP Dark Mode - Button 18
 *
 * @package WP_DARK_MODE
 */

defined( 'ABSPATH' ) || exit();
?>
<div class="style-18 <?php echo 'yes' === $args['floating'] ? 'floating' : ''; ?> <?php echo ! empty( $args['position'] ) ? esc_attr( $args['position'] ) : ''; ?> <?php echo esc_attr( apply_filters( 'wp_dark_mode_switch_label_class', 'wp-dark-mode-side-toggle-wrap wp-dark-mode-ignore' ) ); ?>">

	<?php
	if ( ! empty( $args['cta_text'] ) ) {
		echo wp_kses_post( wp_sprintf( '<span class="wp-dark-mode-switcher-cta wp-dark-mode-ignore">%s <span class="wp-dark-mode-ignore"></span></span>', esc_html( $args['cta_text'] ) ) );
	}
	?>


	<div class="wp-dark-mode-side-toggle wp-dark-mode-toggle wp-dark-mode-switcher wp-dark-mode-ignore">

		<svg class="wp-dark-mode-ignore mode-light  width-20px height-16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 18.215">
			<g class="wp-dark-mode-ignore" id="Group_1" data-name="Group 1" transform="translate(-68 -14)">
				<rect class="wp-dark-mode-ignore" id="Rectangle_4" data-name="Rectangle 4" width="32" height="18.215" rx="9.108" transform="translate(68 14)"/>
				<circle class="wp-dark-mode-ignore" id="Ellipse_4" data-name="Ellipse 4" cx="7.631" cy="7.631" r="7.631" transform="translate(83.262 15.355)" fill="#fff"/>
				<path class="wp-dark-mode-ignore" id="Path_15" data-name="Path 15" d="M90.892,29.384a6.432,6.432,0,0,0,4.526-1.857,6.3,6.3,0,0,0,0-8.964,6.432,6.432,0,0,0-4.526-1.856V29.384Z"/>
				<path class="wp-dark-mode-ignore" id="Path_16" data-name="Path 16" d="M90.891,27.908a4.976,4.976,0,0,0,1.884-.37,4.926,4.926,0,0,0,1.6-1.054,4.824,4.824,0,0,0,0-6.877,4.954,4.954,0,0,0-3.481-1.424v9.726Z" fill="#fff"/>
				<path class="wp-dark-mode-ignore" id="Path_17" data-name="Path 17" d="M90.892,27.909a4.954,4.954,0,0,1-3.481-1.424,4.824,4.824,0,0,1,0-6.877,4.954,4.954,0,0,1,3.481-1.424v9.726Z"/>
			</g>
		</svg>

		<svg class="wp-dark-mode-ignore mode-dark  width-20px height-16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 18.215">
			<g class="wp-dark-mode-ignore" id="Group_2" data-name="Group 2" transform="translate(-68 -14)">
				<rect class="wp-dark-mode-ignore" id="Rectangle_2" data-name="Rectangle 2" width="32" height="18.215" rx="9.108" transform="translate(68 14)" fill="#fff"/>
				<circle class="wp-dark-mode-ignore" id="Ellipse_2" data-name="Ellipse 2" cx="7.631" cy="7.631" r="7.631" transform="translate(83.262 15.355)"/>
				<path class="wp-dark-mode-ignore" id="Path_6" data-name="Path 6" d="M90.892,29.384a6.432,6.432,0,0,0,4.526-1.857,6.3,6.3,0,0,0,0-8.964,6.432,6.432,0,0,0-4.526-1.856V29.384Z" fill="#fff"/>
				<path class="wp-dark-mode-ignore" id="Path_7" data-name="Path 7" d="M90.891,27.908a4.976,4.976,0,0,0,1.884-.37,4.926,4.926,0,0,0,1.6-1.054,4.824,4.824,0,0,0,0-6.877,4.954,4.954,0,0,0-3.481-1.424v9.726Z"/>
				<path class="wp-dark-mode-ignore" id="Path_8" data-name="Path 8" d="M90.892,27.909a4.954,4.954,0,0,1-3.481-1.424,4.824,4.824,0,0,1,0-6.877,4.954,4.954,0,0,1,3.481-1.424v9.726Z" fill="#fff"/>
			</g>
		</svg>
	</div>

	<div class="wp-dark-mode-side-toggle wp-dark-mode-font-size-toggle wp-dark-mode-ignore">
		<svg class="wp-dark-mode-ignore text-small width-20px height-16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19 14">
			<path class="wp-dark-mode-ignore" id="Path_5" data-name="Path 5" d="M16.161,87.26h7.658L25.468,91H27L20.717,77H19.283L13,91h1.512Zm3.829-8.72,3.3,7.52h-6.6Z" transform="translate(-13 -77)" fill="#fff" fill-rule="evenodd"/>
			<path class="wp-dark-mode-ignore" id="Path_6" data-name="Path 6" d="M32,85l-2-3-2,3h1.333v3H28l2,3,2-3H30.667V85Z" transform="translate(-13 -77)" fill="#fff"/>
		</svg>

		<svg class="wp-dark-mode-ignore text-large width-20px height-18px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21.415 19.333">
			<path class="wp-dark-mode-ignore" id="Path_17" data-name="Path 17" d="M31.693,77.25h.5l-.3-.4-3-4-.2-.267-.2.267-3,4-.3.4h2.25v3.5h-2.25l.3.4,3,4,.2.267.2-.267,3-4,.3-.4h-2.25v-3.5ZM18,74.75h-.173l-.061.162-6,16-.127.338H14.31l.061-.162,1.814-4.838H22.2l1.814,4.838.061.162h2.671l-.127-.338-6-16-.061-.162H18Zm3.264,9H17.122l2.071-5.523Z" transform="translate(-11.278 -72.167)" stroke="#000" stroke-width="0.5"/>
		</svg>
	</div>

</div>