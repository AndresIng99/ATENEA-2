<?php
/**
 * WP Dark Mode - Button 17
 *
 * @package WP_DARK_MODE
 */

defined( 'ABSPATH' ) || exit();
?>
<div class="style-17 <?php echo ! empty( $args['position'] ) ? esc_attr( $args['position'] ) : ''; ?> <?php echo esc_attr( apply_filters( 'wp_dark_mode_switch_label_class', 'wp-dark-mode-side-toggle-wrap wp-dark-mode-ignore' ) ); ?>">

	<div class="wp-dark-mode-side-toggle wp-dark-mode-toggle wp-dark-mode-switcher wp-dark-mode-ignore">
		<svg  class="wp-dark-mode-ignore mode-light not-fill width-20px height-20px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"viewBox="0 0 24 24">
			<defs class="wp-dark-mode-ignore">
				<clipPath class="wp-dark-mode-ignore" id="clip-path">
					<rect class="wp-dark-mode-ignore" id="Rectangle_1" data-name="Rectangle 1" width="24" height="24" transform="translate(10 16)" fill="#fff"/>
				</clipPath>
			</defs>
			<g class="wp-dark-mode-ignore" id="Group_1" data-name="Group 1" transform="translate(-10 -16)" clip-path="url(#clip-path)">
				<path class="wp-dark-mode-ignore" id="Path_7" data-name="Path 7" d="M25.565,20.581a1.187,1.187,0,0,1-.839-.348l-1.886-1.886a1.187,1.187,0,0,0-1.679,0l-1.886,1.886a1.187,1.187,0,0,1-.839.348H15.768a1.187,1.187,0,0,0-1.187,1.187v2.667a1.187,1.187,0,0,1-.348.839l-1.886,1.886a1.187,1.187,0,0,0,0,1.679l1.886,1.886a1.187,1.187,0,0,1,.348.839v2.667a1.187,1.187,0,0,0,1.187,1.187h2.667a1.187,1.187,0,0,1,.839.348l1.886,1.886a1.187,1.187,0,0,0,1.679,0l1.886-1.886a1.187,1.187,0,0,1,.839-.348h2.667a1.187,1.187,0,0,0,1.187-1.187V31.565a1.187,1.187,0,0,1,.348-.839l1.886-1.886a1.187,1.187,0,0,0,0-1.679l-1.886-1.886a1.187,1.187,0,0,1-.348-.839V21.768a1.187,1.187,0,0,0-1.187-1.187Z" fill="#fff" fill-rule="evenodd"/>
				<path class="wp-dark-mode-ignore" id="Path_8" data-name="Path 8" d="M24.852,22.065a.949.949,0,0,1-.671-.278l-1.509-1.509a.95.95,0,0,0-1.343,0L19.82,21.787a.949.949,0,0,1-.671.278H17.015a.95.95,0,0,0-.95.95v2.134a.95.95,0,0,1-.278.671l-1.509,1.509a.95.95,0,0,0,0,1.343l1.509,1.509a.95.95,0,0,1,.278.671v2.134a.95.95,0,0,0,.95.95h2.134a.95.95,0,0,1,.671.278l1.509,1.509a.95.95,0,0,0,1.343,0l1.509-1.509a.95.95,0,0,1,.671-.278h2.134a.95.95,0,0,0,.95-.95V30.852a.95.95,0,0,1,.278-.671l1.509-1.509a.95.95,0,0,0,0-1.343L28.213,25.82a.95.95,0,0,1-.278-.671V23.015a.95.95,0,0,0-.95-.95Z" fill-rule="evenodd"/>
				<path class="wp-dark-mode-ignore" id="Path_9" data-name="Path 9" d="M22,25.273A2.727,2.727,0,1,0,24.727,28,2.728,2.728,0,0,0,22,25.273Zm-5.455,3.273h1.091a.545.545,0,0,0,0-1.091H16.545a.545.545,0,0,0,0,1.091Zm9.818,0h1.091a.545.545,0,0,0,0-1.091H26.364a.545.545,0,0,0,0,1.091Zm-4.909-6v1.091a.545.545,0,0,0,1.091,0V22.545a.545.545,0,0,0-1.091,0Zm0,9.818v1.091a.545.545,0,1,0,1.091,0V32.364a.545.545,0,0,0-1.091,0Zm-2.733-8.411a.544.544,0,1,0-.769.769l.578.578a.544.544,0,0,0,.769-.769ZM25.469,30.7a.544.544,0,1,0-.769.769l.578.578a.544.544,0,1,0,.769-.769Zm.578-5.978a.544.544,0,1,0-.769-.769l-.578.578a.544.544,0,0,0,.769.769ZM19.3,31.469a.544.544,0,1,0-.769-.769l-.578.578a.544.544,0,0,0,.769.769l.578-.578Z" fill="#fff"/>
			</g>
		</svg>

		<svg class="wp-dark-mode-ignore mode-dark not-fill  width-20px height-20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
			<path class="wp-dark-mode-ignore" id="Path_15" data-name="Path 15" d="M20.691,18.542a1.852,1.852,0,0,1,2.619,0l1.744,1.744a.343.343,0,0,0,.243.1h2.466a1.852,1.852,0,0,1,1.852,1.852V24.7a.343.343,0,0,0,.1.243l1.744,1.744a1.852,1.852,0,0,1,0,2.619l-1.744,1.744a.343.343,0,0,0-.1.243v2.466a1.852,1.852,0,0,1-1.852,1.852H25.3a.343.343,0,0,0-.243.1l-1.744,1.744a1.852,1.852,0,0,1-2.619,0l-1.744-1.744a.343.343,0,0,0-.243-.1H16.238a1.852,1.852,0,0,1-1.852-1.852V31.3a.343.343,0,0,0-.1-.243l-1.744-1.744a1.852,1.852,0,0,1,0-2.619l1.744-1.744a.343.343,0,0,0,.1-.243V22.239a1.852,1.852,0,0,1,1.852-1.852H18.7a.343.343,0,0,0,.243-.1Zm1.552,1.067a.343.343,0,0,0-.485,0l-1.744,1.744A1.852,1.852,0,0,1,18.7,21.9H16.238a.343.343,0,0,0-.343.343V24.7a1.852,1.852,0,0,1-.542,1.309l-1.744,1.744a.343.343,0,0,0,0,.485l1.744,1.744A1.852,1.852,0,0,1,15.9,31.3v2.466a.343.343,0,0,0,.343.343H18.7a1.852,1.852,0,0,1,1.31.542l1.744,1.744a.343.343,0,0,0,.485,0l1.744-1.744A1.852,1.852,0,0,1,25.3,34.1h2.466a.343.343,0,0,0,.343-.343V31.3a1.852,1.852,0,0,1,.542-1.309l1.744-1.744a.343.343,0,0,0,0-.485l-1.744-1.744A1.852,1.852,0,0,1,28.1,24.7V22.239a.343.343,0,0,0-.343-.343H25.3a1.852,1.852,0,0,1-1.309-.542Z" transform="translate(-12 -18)" fill-rule="evenodd"/>
			<path class="wp-dark-mode-ignore" id="Path_16" data-name="Path 16" d="M21.727,23.442a4.456,4.456,0,1,0,4.92,4.926.5.5,0,0,0-.762-.47,2.673,2.673,0,0,1-3.7-3.683.5.5,0,0,0-.46-.772Z" transform="translate(-12 -18)"/>
		</svg>

		<span class="wp-dark-mode-ignore"><?php esc_html_e( 'Toggle Dark Mode', 'wp-dark-mode' ); ?></span>
	</div>

	<div class="wp-dark-mode-side-toggle wp-dark-mode-font-size-toggle wp-dark-mode-ignore">
		<svg class="wp-dark-mode-ignore text-small width-20px height-16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19 14">
			<path class="wp-dark-mode-ignore" id="Path_5" data-name="Path 5" d="M16.161,87.26h7.658L25.468,91H27L20.717,77H19.283L13,91h1.512Zm3.829-8.72,3.3,7.52h-6.6Z" transform="translate(-13 -77)" fill="#fff" fill-rule="evenodd"/>
			<path class="wp-dark-mode-ignore" id="Path_6" data-name="Path 6" d="M32,85l-2-3-2,3h1.333v3H28l2,3,2-3H30.667V85Z" transform="translate(-13 -77)" fill="#fff"/>
		</svg>

		<svg class="wp-dark-mode-ignore text-large  width-20px height-18px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21.415 19.333">
			<path
				class="wp-dark-mode-ignore"
				id="Path_17"
				data-name="Path 17"
				d="M31.693,77.25h.5l-.3-.4-3-4-.2-.267-.2.267-3,4-.3.4h2.25v3.5h-2.25l.3.4,3,4,.2.267.2-.267,3-4,.3-.4h-2.25v-3.5ZM18,74.75h-.173l-.061.162-6,16-.127.338H14.31l.061-.162,1.814-4.838H22.2l1.814,4.838.061.162h2.671l-.127-.338-6-16-.061-.162H18Zm3.264,9H17.122l2.071-5.523Z"
				transform="translate(-11.278 -72.167)"
				stroke="#000" stroke-width="0.5"
			/>
		</svg>

		<span class="wp-dark-mode-ignore"><?php esc_html_e( 'Toggle Font Size', 'wp-dark-mode' ); ?></span>
	</div>
</div>