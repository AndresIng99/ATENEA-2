<?php
/**
 * Get Started - Switch Widget
 *
 * @package WP_DARK_MODE
 * @since 2.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit();
?>
<h3 class="tab-content-title">
	<?php esc_html_e( 'Switch Widget', 'wp-dark-mode' ); ?>
</h3>

<hr>
<br>

<div class="wp-dark-mode-switch-widget-doc">
	<h2><?php esc_html_e( 'Display Switch Button Using The WP Dark Mode widget.', 'wp-dark-mode' ); ?></h2>
	<p>
		<?php
		echo wp_kses_post(
			'You can display the switch button by using the (WP Dark Mode ) WordPress widget, for your users to switch between the dark and normal mode.
		<br>
		<br>
		Dark Mode Switch Widget is available in the PRO version.
		<br>
		<br> For displaying the Darkmode Switch button using the WP Dark Mode widget follow the below steps:',
			'wp-dark-mode'
		);
		?>
		</p>
	<p>
		<br>
		➡️ <?php esc_html_e( 'Add the WP Dark Mode Widget to a sidebar where you want to display the switch button. ', 'wp-dark-mode' ); ?><br>
		➡️ <?php esc_html_e( 'Enter the widget title, if you want to display the widget title ', 'wp-dark-mode' ); ?><br>
		➡️ <?php esc_html_e( 'Select The Switch Style ', 'wp-dark-mode' ); ?><br>
		➡️ <?php esc_html_e( 'Select the position alignment ', 'wp-dark-mode' ); ?><br>
		➡️ <?php esc_html_e( 'Save & you are done. ', 'wp-dark-mode' ); ?><br>
		<br>
	</p>

	<p><img src="<?php echo esc_url( WP_DARK_MODE_ASSETS ) . '/images/switch-widget.png'; ?>" alt=""></p>

</div>

<a href="https://wppool.dev/docs/" class="doc_button button-primary" target="_blank"><?php esc_html_e( 'Explore More', 'wp-dark-mode' ); ?></a>