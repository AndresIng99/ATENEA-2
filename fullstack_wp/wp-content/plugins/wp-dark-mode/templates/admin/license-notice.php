<?php
/**
 * WP Dark Mode - License Notice
 *
 * @package WP_DARK_MODE
 * @since 2.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit();
?>
<div class="license-activation-notice">
	<div class="wp-dark-mode-notice-icon">
		<img src="<?php echo esc_attr( WP_DARK_MODE_ASSETS ) . '/images/wp-dark-mode-icon.png'; ?>" alt="<?php esc_html_e( 'WP Dark Mode Icon', 'wp-dark-mode' ); ?>">
	</div>

	<div class="wp-dark-mode-notice-text">
		<p><strong><?php esc_html_e( 'Activate License', 'wp-dark-mode' ); ?> - <?php echo esc_html( $args['plugin_name'] ); ?> - <?php esc_html_e( 'Version', 'wp-dark-mode' ); ?> <?php echo esc_html( $args['version'] ); ?></strong></p>
		<p><?php esc_html_e( 'Activate the license for ', 'wp-dark-mode' ); ?><?php echo esc_html( $args['plugin_name'] ); ?><?php esc_html_e( ' to function properly.', 'wp-dark-mode' ); ?></p>
	</div>

	<div class="wp-dark-mode-notice-actions">
		<a href="<?php echo esc_url( admin_url( 'admin.php?page=wp-dark-mode-license' ) ); ?>" class="button button-primary activate-license"><?php esc_html_e( 'Activate License', 'wp-dark-mode' ); ?></a>
		<button type="button" class="notice-dismiss"><span class="screen-reader-text"><?php esc_html_e( 'Dismiss this notice.', 'wp-dark-mode' ); ?></span></button>
	</div>
</div>