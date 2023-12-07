<?php
/**
 * Elementor controls manager.
 *
 * Elementor controls manager handler class is responsible for registering and
 * initializing all the supported controls, both regular controls and the group
 * controls.
 *
 * @since 1.0.0
 * @package WP_DARK_MODE
 */

// If direct access than exit the file.
defined( 'ABSPATH' ) || exit();

/**
 * Elementor controls manager.
 *
 * Elementor controls manager handler class is responsible for registering and
 * initializing all the supported controls, both regular controls and the group
 * controls.
 *
 * @since 1.0.0
 */
abstract class WP_Dark_Mode_Controls_Manager extends \Elementor\Controls_Manager {
	const IMAGE_CHOOSE = 'image_choose';
}
