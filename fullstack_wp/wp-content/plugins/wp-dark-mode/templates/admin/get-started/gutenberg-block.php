<?php
/**
 * WP Dark Mode Get Started - Gutenberg Block
 * Renders the Gutenberg Block tab content
 *
 * @package WP_DARK_MODE
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit();
?>

<h3 class="tab-content-title"><?php esc_html_e( 'Gutenberg Block', 'wp-dark-mode' ); ?></h3>

<div class="wp-dark-mode-gutenberg-doc">
	<h3><?php esc_html_e( 'How to display Dark Mode Switch Button using Gutenberg block', 'wp-dark-mode' ); ?></h3>

	<hr>
	<br>

	<?php echo do_shortcode( '[video width="640" src="https://www.youtube.com/watch?v=TPKa-Xg9w5c"]' ); ?>

	<ul class="doc-section">
		<li>
			<h3>
				<i class="dashicons dashicons-saved"></i><?php esc_html_e( 'While you are on the post/page edit screen click on gutenberg plus icon to add a new gutenberg block', 'wp-dark-mode' ); ?>
			</h3>
			<img src="<?php echo esc_url( WP_DARK_MODE_ASSETS ) . '/images/gutenberg/step-1.png'; ?>" alt="<?php esc_html_e( 'step-1', 'wp-dark-mode' ); ?>">
		</li>

		<li>
			<h3><i class="dashicons dashicons-saved"></i> <?php esc_html_e( 'Add "Dark Mode Switch" from "Text" category', 'wp-dark-mode' ); ?></h3>
			<img src="<?php echo esc_url( WP_DARK_MODE_ASSETS ) . '/images/gutenberg/step-2.png'; ?>" alt="<?php esc_html_e( 'step-2', 'wp-dark-mode' ); ?>">
		</li>

		<li>
			<h3><i class="dashicons dashicons-saved"></i> <?php esc_html_e( 'Choose button style from block settings and you are done', 'wp-dark-mode' ); ?></h3>
			<img src="<?php echo esc_url( WP_DARK_MODE_ASSETS ) . '/images/gutenberg/step-3.png'; ?>" alt="<?php esc_html_e( 'step-2', 'wp-dark-mode' ); ?>">
		</li>
	</ul>

	<a href="https://wppool.dev/docs/" class="doc_button button-primary" target="_blank"><?php esc_html_e( 'Explore More', 'wp-dark-mode' ); ?></a>

</div>