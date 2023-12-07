<?php
/**
 * Get Started Shortcodes.
 * Loads shortcode tab content for the getting started page
 *
 * @package WP_DARK_MODE
 * @since 2.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit();
?>

<h3 class="tab-content-title">
	<?php esc_html_e( 'Shortcodes', 'wp-dark-mode' ); ?>
</h3>

<hr>
<br>

<div class="wp-dark-mode-shortcode-doc">
	<p>
		<b>✅</b>
		<b>
			<code>[wp_dark_mode]</code>
		</b> - 
		<?php
		echo wp_kses_post( '[wp_dark_mode] - Using the [wp_dark_mode] shortcode, you can add a dark mode switch button to any page on your website. The shortcode supports an optional <code>style</code> attribute for different switch styles.', 'wp-dark-mode' );
		?>
	</p>

	<p>
		<b>
			<?php esc_html_e( 'Examples:', 'wp-dark-mode' ); ?>
		</b>
	</p>

	<p style="margin: 10px 0 0 40px"> → <code>[wp_dark_mode]</code> - <?php esc_html_e( 'Display the default dark mode switch.', 'wp-dark-mode' ); ?></p>
	<p style="margin: 10px 0 0 40px"> →
		<code>[wp_dark_mode style="3"]</code> - <?php esc_html_e( 'Display the specific switch style from available switches. Some switch styles may not be available depending on your current plan (FREE, PRO, ULTIMATE).', 'wp-dark-mode' ); ?>
	</p>
</div>
<a href="https://wppool.dev/docs/" class="doc_button button-primary" target="_blank"><?php esc_html_e( 'Explore More', 'wp-dark-mode' ); ?></a>