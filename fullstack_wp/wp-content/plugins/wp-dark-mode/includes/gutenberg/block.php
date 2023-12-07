<?php
/**
 * Gutenberg module of wp-dark-mode
 *
 * @file
 * @package wp-dark-mode
 */

defined( 'ABSPATH' ) || exit;

// Exit if function already exists.
if ( ! function_exists( 'wp_dark_mode_register_block' ) ) {

	/**
	 * Register all the block assets so that they can be enqueued through the block editor
	 * in the corresponding context
	 */
	add_action( 'init', 'wp_dark_mode_register_block' );

	/**
	 * Register wp-dark-mode switch block
	 *
	 * @return mixed
	 * @version 1.0.0
	 */
	function wp_dark_mode_register_block() {

		// If block editor is not active, bail.
		if ( ! function_exists( 'register_block_type' ) ) {
			return;
		}

		// Register the block editor scripts.
		global $pagenow;

		$deps = [ 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor', 'react', 'wp-dark-mode-admin' ];

		wp_register_script(
			'wp-dark-mode-editor-script',
			WP_DARK_MODE_URL . '/includes/gutenberg/block/main.js',
			$deps,
			time(),
			true
		);

		// Register the block editor styles.
		wp_register_style(
			'wp-dark-mode-editor-style',
			WP_DARK_MODE_URL . '/includes/gutenberg/block/editor.css',
			[ 'wp-dark-mode-frontend-styles' ],
			time()
		);

		// Register the front-end styles.
		wp_register_style(
			'wp-dark-mode-frontend-styles',
			WP_DARK_MODE_ASSETS . '/css/frontend.min.css',
			[ 'wp-dark-mode-admin' ],
			time()
		);

		register_block_type(
			'wp-dark-mode/switcher',
			[
				'editor_script' => 'wp-dark-mode-editor-script',
				'editor_style'  => 'wp-dark-mode-editor-style',
			]
		);

		if ( function_exists( 'wp_set_script_translations' ) ) {
			/**
			 * Adds internalization support
			 */
			wp_set_script_translations( 'wp-dark-mode-editor-script', 'wp-dark-mode-pro' );
		}
	}
}
