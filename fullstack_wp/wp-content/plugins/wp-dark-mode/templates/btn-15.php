<?php
/**
 * WP Dark Mode - Button 15
 *
 * @package WP_DARK_MODE
 */

defined( 'ABSPATH' ) || exit();
?>
<div class="style-15 <?php echo ! empty( $args['position'] ) ? esc_attr( $args['position'] ) : ''; ?> <?php echo esc_attr( apply_filters( 'wp_dark_mode_switch_label_class', 'wp-dark-mode-side-toggle-wrap wp-dark-mode-ignore' ) ); ?>">
	<div class="wp-dark-mode-side-toggle wp-dark-mode-toggle wp-dark-mode-switcher wp-dark-mode-ignore">
		<?php //phpcs:ignore ?>
		<svg class="wp-dark-mode-ignore mode-light width-20px height-20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path class="wp-dark-mode-ignore" id="Path_6" data-name="Path 6" d="M22,23.455A4.546,4.546,0,1,0,26.545,28,4.547,4.547,0,0,0,22,23.455Zm-9.091,5.455h1.818a.909.909,0,1,0,0-1.818H12.909a.909.909,0,0,0,0,1.818Zm16.364,0h1.818a.909.909,0,0,0,0-1.818H29.273a.909.909,0,1,0,0,1.818Zm-8.182-10v1.818a.909.909,0,1,0,1.818,0V18.909a.909.909,0,0,0-1.818,0Zm0,16.364v1.818a.909.909,0,1,0,1.818,0V35.273a.909.909,0,1,0-1.818,0ZM16.536,21.254a.906.906,0,1,0-1.282,1.282l.964.964A.906.906,0,0,0,17.5,22.218ZM27.782,32.5A.906.906,0,1,0,26.5,33.782l.964.964a.906.906,0,1,0,1.282-1.282Zm.964-9.964a.906.906,0,1,0-1.282-1.282l-.964.964A.906.906,0,0,0,27.782,23.5ZM17.5,33.782A.906.906,0,1,0,16.218,32.5l-.964.964a.906.906,0,0,0,1.282,1.282l.964-.964Z" transform="translate(-12 -18)" fill="#fff"/></svg>

		<svg class="wp-dark-mode-ignore mode-dark" xmlns="http://www.w3.org/2000/svg" width="17.956" height="17.954" viewBox="0 0 17.956 17.954">
			<path class="wp-dark-mode-ignore"  id="Path_11" data-name="Path 11" d="M21.01,19.049A9,9,0,1,0,30.95,29a1,1,0,0,0-1.54-.95,5.4,5.4,0,0,1-7.47-7.44,1,1,0,0,0-.93-1.56Z" transform="translate(-13 -19.046)"/>
		</svg>
		<span class="wp-dark-mode-ignore"><?php esc_html_e( 'Toggle Dark Mode', 'wp-dark-mode' ); ?></span>
	</div>

	<div class="wp-dark-mode-side-toggle wp-dark-mode-font-size-toggle wp-dark-mode-ignore">

		<svg class="wp-dark-mode-ignore text-small" xmlns="http://www.w3.org/2000/svg" width="11.334" height="14.684" viewBox="0 0 11.334 14.684">
			<?php //phpcs:ignore ?>
			<path class="wp-dark-mode-ignore" id="Path_5" data-name="Path 5" d="M20.717,89.684a5.3,5.3,0,0,0,4.853-2.939h.041v2.707h1.723V79.717c0-2.9-2.037-4.717-5.277-4.717s-5.332,1.8-5.537,4.348h1.75c.314-1.723,1.654-2.748,3.746-2.748,2.215,0,3.514,1.23,3.514,3.281v1.23l-4.43.274c-3.281.219-5.1,1.7-5.1,4.129C16,88,17.914,89.684,20.717,89.684Zm.369-1.559c-1.928,0-3.254-1.066-3.254-2.611,0-1.572,1.244-2.543,3.486-2.693l4.211-.287v1.572A4.2,4.2,0,0,1,21.086,88.125Z" transform="translate(-16 -75)" fill="#fff" />
		</svg>

		<svg class="wp-dark-mode-ignore text-large" xmlns="http://www.w3.org/2000/svg" width="18" height="17.436" viewBox="0 0 18 17.436">
			<path class="wp-dark-mode-ignore" id="Path_12" data-name="Path 12" d="M19.882,73,13,90.436h3.577l1.484-3.758H25.94l1.484,3.758H31L24.118,73Zm-.509,10.351L22,76.7l2.626,6.654Z" transform="translate(-13 -73)"/>
		</svg>

		<span class="wp-dark-mode-ignore"><?php esc_html_e( 'Toggle Font Size', 'wp-dark-mode' ); ?></span>
	</div>
</div>