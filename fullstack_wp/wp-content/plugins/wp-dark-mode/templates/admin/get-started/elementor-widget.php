<?php
/**
 * WP Dark Mode Get Started - Elementor Widget
 * Renders Elementor Widget tab content
 *
 * @package WP_DARK_MODE
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit();

?>

<h3 class="tab-content-title">
	<?php esc_html_e( 'Elementor Widget', 'wp-dark-mode' ); ?>
</h3>

<div class="wp-dark-mode-elementor-doc">
	<h3>
		<?php esc_html_e( 'How to display Dark Mode Switch Button using Elementor Widget', 'wp-dark-mode' ); ?>
	</h3>

	<hr>
	<br>

	<?php echo do_shortcode( '[video src="https://www.youtube.com/watch?v=5Y8XawJg4pw"]' ); ?>

	<ul class="doc-section">

		<li>
			<h3> <i class="dashicons dashicons-saved"></i>
				<?php esc_html_e( 'Add "Dark Mode Switch" widget from "Basic" category', 'wp-dark-mode' ); ?>
			</h3>
			<img src="<?php echo esc_url( WP_DARK_MODE_ASSETS ) . '/images/elementor/step-1.png'; ?>" alt="step-2">
		</li>

		<li>
			<h3> <i class="dashicons dashicons-saved"></i>
				<?php esc_html_e( 'Choose button style from widget settings and you are done', 'wp-dark-mode' ); ?>
			</h3>
			<img src="<?php echo esc_url( WP_DARK_MODE_ASSETS ) . '/images/elementor/step-2.png'; ?>" alt="step-2">
		</li>
	</ul>

	<a href="https://wppool.dev/docs/" class="doc_button button-primary" target="_blank">
		<?php esc_html_e( 'Explore More', 'wp-dark-mode' ); ?>
	</a>


</div>