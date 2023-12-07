<?php
/**
 * WP Dark Mode - Affiliate Notice
 *
 * @package WP_DARK_MODE
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit();
?>
<p>
	<?php esc_html_e( 'Hi there, you have been using WP Dark Mode for while now. Do you know that WP Dark Mode has an affiliate program? join now get 25% commission from each sale.', 'wp-dark-mode' ); ?>
</p>

<div class="notice-actions">
	<a class="hide_notice button button-primary" data-value="hide_notice" href="https://wppool.dev/affiliates/" target="_blank">
		<?php esc_html_e( 'Tell me more', 'wp-dark-mode' ); ?> <i class="dashicons dashicons-arrow-right-alt"></i>
	</a>

	<span class="dashicons dashicons-dismiss"></span>
</div>