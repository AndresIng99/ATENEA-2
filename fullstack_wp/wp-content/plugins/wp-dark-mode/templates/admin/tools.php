<?php
/**
 * WP Dark Mode Utility Tools
 * Renders utility tools template on admin dashboard
 * It contains reset, export and import settings feature
 *
 * @package WP Dark Mode
 * @since 2.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit();
?>
<div class="wrap">
	<div class="wpdarkmode-tools">
		<!-- utility ?Exporttitle  -->
		<div class="section-title">
			<span class="dashicons dashicons-admin-tools"> </span>
			<h3><?php esc_html_e( 'WP Dark Mode Tools', 'wp-dark-mode' ); ?></h3>
		</div>

		<!-- utility tool  -->
		<div class="section-body">

			<!-- Export settings  -->
			<div class="__form-group">
				<label for="" class="__form-label"><?php esc_html_e( 'Export Settings', 'wp-dark-mode' ); ?></label>
				<div class="__form-content">
					<button class="button button-primary button-large" id="wpDarkMode_export">
						<span class="dashicons dashicons-download"></span> 
						<span><?php esc_html_e( 'Export', 'wp-dark-mode' ); ?></span>
					</button>
					<div class="__form-text"><?php esc_html_e( 'Export current settings as JSON file.', 'wp-dark-mode' ); ?></div>
				</div>
			</div>

			<!-- Import settings  -->
			<div class="__form-group">
				<label for="" class="__form-label"><?php esc_html_e( 'Import Settings', 'wp-dark-mode' ); ?></label>
				<div class="__form-content">
					<input type="file" id="wpDarkMode_importer" style="display:none" accept="application/JSON">
					<label for='wpDarkMode_importer' class="button button-primary button-large">
						<span class="dashicons dashicons-upload"></span> 
						<span><?php esc_html_e( 'Import', 'wp-dark-mode' ); ?></span>
					</label>
					<div class="__form-text"><?php esc_html_e( 'Import settings from JSON file which is exported through WP Dark Mode.', 'wp-dark-mode' ); ?></div>
				</div>
			</div>

			<!-- Reset settings  -->
			<div class="__form-group">
				<label for="" class="__form-label"><?php esc_html_e( 'Reset Settings', 'wp-dark-mode' ); ?></label>
				<div class="__form-content">
					<button class="button button-danger button-large" id="wpDarkMode_reset">
						<span class="dashicons dashicons-image-rotate"></span> 
						<span><?php esc_html_e( 'Reset Settings', 'wp-dark-mode' ); ?></span>
					</button>
					<div class="__form-text"><?php esc_html_e( 'Reset all settings to default. We recommend to export current settings before you reset the settings.', 'wp-dark-mode' ); ?></div>
				</div>
			</div>

		</div>
	</div>
</div>