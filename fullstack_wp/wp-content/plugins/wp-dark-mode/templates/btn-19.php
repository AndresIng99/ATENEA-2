<?php
/**
 * WP Dark Mode - Button 19
 *
 * @package WP_DARK_MODE
 */

defined( 'ABSPATH' ) || exit();
?>
<div class="style-19 <?php echo 'yes' === $args['floating'] ? 'floating' : ''; ?> <?php echo ! empty( $args['position'] ) ? esc_attr( $args['position'] ) : ''; ?> <?php echo esc_attr( apply_filters( 'wp_dark_mode_switch_label_class', 'wp-dark-mode-side-toggle-wrap wp-dark-mode-ignore' ) ); ?>">

	<?php
	if ( ! empty( $args['cta_text'] ) ) {
		echo wp_kses_post( wp_sprintf( '<span class="wp-dark-mode-switcher-cta wp-dark-mode-ignore">%s <span class="wp-dark-mode-ignore"></span></span>', esc_html( $args['cta_text'] ) ) );
	}
	?>

	<div class="wp-dark-mode-side-toggle wp-dark-mode-toggle wp-dark-mode-switcher wp-dark-mode-ignore">
		<svg class="wp-dark-mode-ignore mode-light width-18px height-18px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 18 18">
			<image class="wp-dark-mode-ignore " id="Asset_1_4" data-name="Asset 1 4" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAASCAYAAABWzo5XAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAADfSURBVHgBnVMBEYMwDPzjJgAJSGAOOgeTECfgYLMwBUiohElgDoaDrtmFIxegpfxdICSfv4Q2QB4+2jtHuiCPF06ACrj3VCJEcyrWijiJP8MJl/bEmNCIeSEH8UexOe+QAZO+SiSoXC+5BgcwGhEurFX+KR0m0RqRXuLsd+LXIt7aYr4jJD6ZTqCEApbOBlPjq/iYUA496mS+/7CjdaqjXvFGbIxm4ZH+2Z0IZdFg+/hZ7IGd46/Mt5P3NdpHxQcs49wMdwXCekUclhWxceYm9+0oCIUgnCjaAl/Y7Er8ACPIR1AUgL21AAAAAElFTkSuQmCC"/>
		</svg>

		<svg class="wp-dark-mode-ignore mode-dark  width-18px height-18px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 18 18">
			<image class="wp-dark-mode-ignore " id="Group_3653" data-name="Group 3653" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAASCAYAAABWzo5XAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAC+SURBVHgBrZQNDcMgEIUvzYQgAQk42CTgZHOEBCQsU8CmYBLe7jKa0EI5mvYlLy3w+Cjlh0gRAM9+aLkL6brSHvGolu125J302WpACctwmdqt7NTKVrD8NOyIWlJnymzvkwWSsK00wzTQE7qiBrEY1+JHT1xxZ4dctjQumwcPbD/x+4eOyyxKR6ZWCe1lXyuRJvyX/9uBSJvRIK6ApQYkQtuQaB8RqfPZrpctQecc2k4H2SdBy43cRy/2Wwv9AFaOvQjwqUB+AAAAAElFTkSuQmCC"/>
		</svg>
	</div>

	<div class="wp-dark-mode-side-toggle wp-dark-mode-font-size-toggle wp-dark-mode-ignore">
		<svg class="wp-dark-mode-ignore text-small width-18px height-16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19 14">
			<path class="wp-dark-mode-ignore" id="Path_5" data-name="Path 5" d="M16.161,87.26h7.658L25.468,91H27L20.717,77H19.283L13,91h1.512Zm3.829-8.72,3.3,7.52h-6.6Z" transform="translate(-13 -77)" fill="#fff" fill-rule="evenodd"/>
			<path class="wp-dark-mode-ignore" id="Path_6" data-name="Path 6" d="M32,85l-2-3-2,3h1.333v3H28l2,3,2-3H30.667V85Z" transform="translate(-13 -77)" fill="#fff"/>
		</svg>

		<svg class="wp-dark-mode-ignore text-large  width-20px height-18px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21.415 19.333">
			<path class="wp-dark-mode-ignore" id="Path_17" data-name="Path 17" d="M31.693,77.25h.5l-.3-.4-3-4-.2-.267-.2.267-3,4-.3.4h2.25v3.5h-2.25l.3.4,3,4,.2.267.2-.267,3-4,.3-.4h-2.25v-3.5ZM18,74.75h-.173l-.061.162-6,16-.127.338H14.31l.061-.162,1.814-4.838H22.2l1.814,4.838.061.162h2.671l-.127-.338-6-16-.061-.162H18Zm3.264,9H17.122l2.071-5.523Z" transform="translate(-11.278 -72.167)" stroke="#000" stroke-width="0.5"/>
		</svg>
	</div>
</div>