<?php
/**
 * WP Dark Mode - Button 16
 *
 * @package WP_DARK_MODE
 */

defined( 'ABSPATH' ) || exit();
?>
<div class="style-16 <?php echo ! empty( $args['position'] ) ? esc_attr( $args['position'] ) : ''; ?> <?php echo esc_attr( apply_filters( 'wp_dark_mode_switch_label_class', 'wp-dark-mode-side-toggle-wrap wp-dark-mode-ignore' ) ); ?>">
	<div class="wp-dark-mode-side-toggle wp-dark-mode-toggle wp-dark-mode-switcher wp-dark-mode-ignore">
		<svg class="wp-dark-mode-ignore mode-light width-16px height-16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16.5 16.5"><path  class="wp-dark-mode-ignore" id="Path_19" data-name="Path 19" d="M22.25,26A2.25,2.25,0,1,1,20,28.25,2.257,2.257,0,0,1,22.25,26Zm0-1.5A3.75,3.75,0,1,0,26,28.25,3.751,3.751,0,0,0,22.25,24.5ZM14.75,29h1.5a.75.75,0,0,0,0-1.5h-1.5a.75.75,0,0,0,0,1.5Zm13.5,0h1.5a.75.75,0,0,0,0-1.5h-1.5a.75.75,0,0,0,0,1.5ZM21.5,20.75v1.5a.75.75,0,0,0,1.5,0v-1.5a.75.75,0,0,0-1.5,0Zm0,13.5v1.5a.75.75,0,0,0,1.5,0v-1.5a.75.75,0,0,0-1.5,0ZM17.743,22.685a.748.748,0,1,0-1.058,1.058l.8.8a.748.748,0,0,0,1.058-1.058Zm9.278,9.278a.748.748,0,1,0-1.058,1.058l.8.795a.748.748,0,1,0,1.058-1.057Zm.8-8.22a.748.748,0,1,0-1.058-1.058l-.8.8a.748.748,0,0,0,1.058,1.058ZM18.538,33.02a.748.748,0,1,0-1.058-1.058l-.8.8a.748.748,0,1,0,1.058,1.057l.8-.795Z" transform="translate(-14 -20)" fill="#fff"/>
		</svg>

		<svg class="wp-dark-mode-ignore mode-dark width-18px height-16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.861 17.292">
			<path class="wp-dark-mode-ignore" id="Path_24" data-name="Path 24" d="M27.221,32.016a7.741,7.741,0,0,1-1.37.12,7.375,7.375,0,0,1-7.37-7.37,7.289,7.289,0,0,1,.53-2.694,7.059,7.059,0,1,0,8.21,9.943Zm.56-1a.43.43,0,0,1,.56.521,7.9,7.9,0,1,1-8.66-10.474.421.421,0,0,1,.4.651,6.546,6.546,0,0,0,5.77,9.593A6.479,6.479,0,0,0,27.781,31.015Z" transform="translate(-12.746 -19.75)" fill-rule="evenodd"/>
			<path class="wp-dark-mode-ignore" id="Path_29" data-name="Path 29" d="M27.221,32.016a7.741,7.741,0,0,1-1.37.12,7.375,7.375,0,0,1-7.37-7.37,7.289,7.289,0,0,1,.53-2.694,7.059,7.059,0,1,0,8.21,9.943Zm.56-1a.43.43,0,0,1,.56.521,7.9,7.9,0,1,1-8.66-10.474.421.421,0,0,1,.4.651,6.546,6.546,0,0,0,5.77,9.593A6.479,6.479,0,0,0,27.781,31.015Z" transform="translate(-12.746 -19.75)" fill="none" stroke="#000" stroke-width="0.5" fill-rule="evenodd"/>
			<path class="wp-dark-mode-ignore" id="Path_32" data-name="Path 32" d="M24.63,21.2a.17.17,0,0,1,.17.17.16.16,0,0,1-.106.151.158.158,0,0,1-.064.009h-.62a.21.21,0,0,0-.21.21v.621a.18.18,0,0,1-.17.17.17.17,0,0,1-.16-.17v-.621a.22.22,0,0,0-.21-.21h-.61a.17.17,0,0,1-.17-.16.18.18,0,0,1,.17-.17h.62a.21.21,0,0,0,.21-.2v-.621a.16.16,0,0,1,.1-.157.16.16,0,0,1,.064-.013.17.17,0,0,1,.17.17V21a.21.21,0,0,0,.2.2Z" transform="translate(-12.746 -19.75)" fill="none" stroke="#000" stroke-width="0.5"/>
			<path class="wp-dark-mode-ignore" id="Path_33" data-name="Path 33" d="M23.641,21.182a.411.411,0,0,1-.18.19.391.391,0,0,1,.18.18.409.409,0,0,1,.19-.18A.441.441,0,0,1,23.641,21.182Zm-.37-.8a.37.37,0,0,1,.37-.381.38.38,0,0,1,.37.381V21h.61a.38.38,0,0,1,.38.381.37.37,0,0,1-.38.37h-.61v.621a.38.38,0,0,1-.38.381.37.37,0,0,1-.37-.381v-.631h-.61a.37.37,0,0,1-.38-.37.38.38,0,0,1,.38-.371h.62Z" transform="translate(-12.746 -19.75)" fill="none" stroke="#000" stroke-width="0.5" fill-rule="evenodd"/>
		</svg>
		<span class="wp-dark-mode-ignore"><?php esc_html_e( 'Toggle Dark Mode', 'wp-dark-mode' ); ?></span>
	</div>

	<div class="wp-dark-mode-side-toggle wp-dark-mode-font-size-toggle wp-dark-mode-ignore">
		<svg class="wp-dark-mode-ignore text-small" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" viewBox="0 0 24 24">
			<defs class="wp-dark-mode-ignore">
				<clipPath class="wp-dark-mode-ignore" id="clip-path">
					<rect class="wp-dark-mode-ignore" id="Rectangle_1" data-name="Rectangle 1" width="24" height="24" transform="translate(10 70)" fill="#fff"/>
				</clipPath>
			</defs>
			<g class="wp-dark-mode-ignore" id="Group_1" data-name="Group 1" transform="translate(-10 -70)" clip-path="url(#clip-path)">
				<path class="wp-dark-mode-ignore" id="Path_17" data-name="Path 17" d="M17.32,77.566H13V76H23.422v1.566H19.1V88.6H17.32Z" fill="#fff"/>
				<path class="wp-dark-mode-ignore" id="Path_18" data-name="Path 18" d="M31.267,88.042a2.685,2.685,0,0,1-.936.5,4.111,4.111,0,0,1-1.152.162,3.06,3.06,0,0,1-2.232-.774,2.956,2.956,0,0,1-.792-2.214V80.482h-1.62V79.06h1.62V76.972h1.728V79.06h2.736v1.422H27.883v5.166a1.7,1.7,0,0,0,.378,1.188,1.471,1.471,0,0,0,1.116.414,2.082,2.082,0,0,0,1.35-.45Z" fill="#fff"/>
			</g>
		</svg>

		<svg class="wp-dark-mode-ignore text-large" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" viewBox="0 0 24 24">
			<defs class="wp-dark-mode-ignore">
				<clipPath class="wp-dark-mode-ignore" id="clip-path">
					<rect class="wp-dark-mode-ignore" id="Rectangle_2" data-name="Rectangle 2" width="24" height="24" transform="translate(10 70)" fill="#fff"/>
				</clipPath>
			</defs>
			<g class="wp-dark-mode-ignore" id="Group_2" data-name="Group 2" transform="translate(-10 -70)" clip-path="url(#clip-path)">
				<path class="wp-dark-mode-ignore" id="Path_34" data-name="Path 34" d="M14.73,77.454H10V74H23.794v3.454H19.086V89.4H14.73Z"/>
				<path class="wp-dark-mode-ignore" id="Path_35" data-name="Path 35" d="M34.415,88.828a3.668,3.668,0,0,1-1.254.572,6.52,6.52,0,0,1-1.54.176A4.649,4.649,0,0,1,28.343,88.5,4.148,4.148,0,0,1,27.2,85.33V80.468H25.373v-2.64H27.2V74.946h3.432v2.882h2.948v2.64H30.631v4.818A1.688,1.688,0,0,0,31,86.452a1.487,1.487,0,0,0,1.1.4,2.206,2.206,0,0,0,1.386-.44Z"/>
			</g>
		</svg>

		<span class="wp-dark-mode-ignore"><?php esc_html_e( 'Toggle Font Size', 'wp-dark-mode' ); ?></span>
	</div>
</div>