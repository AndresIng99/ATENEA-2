<?php
/**
 * This file represents plugin elementor widget.
 *
 * @since 3.0.6
 * @package WP_DARK_MODE
 */

use Elementor\Controls_Manager; // phpcs:ignore

// if direct access than exit the file.
defined( 'ABSPATH' ) || exit();

/**
 * This file represents plugin elementor widget.
 *
 * @since 3.0.6
 * @package WP_DARK_MODE
 */
if ( ! class_exists( 'WP_Dark_Mode_Elementor_Widget' ) ) {
	/**
	 * WP_Dark_Mode_Elementor_Widget class extends \Elementor\Widget_Base
	 * Register WP Dark Mode elementor switcher widget class.
	 *
	 * @version 1.0.0
	 */
	class WP_Dark_Mode_Elementor_Widget extends \Elementor\Widget_Base {

		/**
		 * Get dark mode switch name
		 *
		 * @return string
		 * @version 1.0.0
		 */
		public function get_name() {
			return 'wp_dark_mode_switch';
		}

		/**
		 * Get switch title
		 *
		 * @return string
		 * @version 1.0.0
		 */
		public function get_title() {
			return __( 'Dark Mode Switch', 'wp-dark-mode' );
		}

		/**
		 * Get widgets icon
		 *
		 * @return string
		 * @version 1.0.0
		 */
		public function get_icon() {
			return 'eicon-adjust';
		}

		/**
		 * Gets categories type
		 *
		 * @return array
		 * @version 1.0.0
		 */
		public function get_categories() {
			return [ 'basic' ];
		}

		/**
		 * Get dark mode switcher keywords
		 *
		 * @return array
		 * @version 1.0.0
		 */
		public function get_keywords() {
			return [
				'wp dark mode',
				'switch',
				'night mode',
			];
		}

		/**
		 * Register wp dark mode widgets switcher controls
		 *
		 * @return void
		 * @version 1.0.0
		 */
		public function register_controls() { // phpcs:ignore
			$this->start_controls_section(
				'_section_alignment',
				[
					'label' => __( 'Alignment', 'wp-dark-mode' ),
					'tab'   => Controls_Manager::TAB_CONTENT,
				]
			);

			// Switch style.
			$this->add_control(
				'_switch_style_heading',
				[
					'label' => __( 'Layout', 'wp-dark-mode' ),
					'type'  => Controls_Manager::HEADING,
				]
			);

			$this->add_control(
				'switch_style', [
					'label'       => __( 'Switch Style', 'wp-dark-mode' ),
					'type'        => WP_Dark_Mode_Controls_Manager::IMAGE_CHOOSE,
					'description' => 'Select the switch button style',
					'separator'   => 'after',
					'options'     => [
						'1'  => [
							'title'       => 'Style 1',
							'image_small' => WP_DARK_MODE_ASSETS . '/images/button-presets/1.svg',
							'image_large' => '',
						],
						'2'  => [
							'title'       => 'Style 2',
							'image_small' => WP_DARK_MODE_ASSETS . '/images/button-presets/2.svg',
							'image_large' => '',
						],
						'3'  => [
							'title'       => 'Style 3',
							'image_small' => WP_DARK_MODE_ASSETS . '/images/button-presets/3.png',
							'image_large' => '',
						],
						'4'  => [
							'title'       => 'Style 4',
							'image_small' => WP_DARK_MODE_ASSETS . '/images/button-presets/4.svg',
							'image_large' => '',
						],
						'5'  => [
							'title'       => 'Style 5',
							'image_small' => WP_DARK_MODE_ASSETS . '/images/button-presets/5.svg',
							'image_large' => '',
						],
						'6'  => [
							'title'       => 'Style 6',
							'image_small' => WP_DARK_MODE_ASSETS . '/images/button-presets/6.svg',
							'image_large' => '',
						],
						'7'  => [
							'title'       => 'Style 7',
							'image_small' => WP_DARK_MODE_ASSETS . '/images/button-presets/7.svg',
							'image_large' => '',
						],
						'8'  => [
							'title'       => 'Style 8',
							'image_small' => WP_DARK_MODE_ASSETS . '/images/button-presets/8.svg',
							'image_large' => '',
						],
						'9'  => [
							'title'       => 'Style 9',
							'image_small' => WP_DARK_MODE_ASSETS . '/images/button-presets/9.png',
							'image_large' => '',
						],
						'10' => [
							'title'       => 'Style 10',
							'image_small' => WP_DARK_MODE_ASSETS . '/images/button-presets/10.png',
							'image_large' => '',
						],
						'11' => [
							'title'       => 'Style 11',
							'image_small' => WP_DARK_MODE_ASSETS . '/images/button-presets/11.png',
							'image_large' => '',
						],
						'12' => [
							'title'       => 'Style 12',
							'image_small' => WP_DARK_MODE_ASSETS . '/images/button-presets/12.png',
							'image_large' => '',
						],
						'13' => [
							'title'       => 'Style 13',
							'image_small' => WP_DARK_MODE_ASSETS . '/images/button-presets/13.png',
							'image_large' => '',
						],
					],
					'default'     => '1',
				]
			);

			$this->add_responsive_control(
				'align',
				[
					'label'     => __( 'Alignment', 'wp-dark-mode' ),
					'type'      => Controls_Manager::CHOOSE,
					'options'   => [
						'left'   => [
							'title' => __( 'Left', 'wp-dark-mode' ),
							'icon'  => 'dashicons dashicons-editor-alignleft',
						],
						'center' => [
							'title' => __( 'Center', 'wp-dark-mode' ),
							'icon'  => 'dashicons dashicons-editor-aligncenter',
						],
						'right'  => [
							'title' => __( 'Right', 'wp-dark-mode' ),
							'icon'  => 'dashicons dashicons-editor-alignright',
						],
					],
					'toggle'    => true,
					'default'   => 'left',
					'selectors' => [
						'{{WRAPPER}}' => 'text-align: {{VALUE}};',
					],
				]
			);

			$this->end_controls_section();
		}

		/**
		 * Render the wp dark mode switcher output using by shortcode
		 *
		 * @return mixed
		 * @version 1.0.0
		 */
		public function render() {
			if ( ! wp_dark_mode_enabled() ) {
				return;
			}

			$settings = $this->get_settings_for_display();

			echo do_shortcode( '[wp_dark_mode style=' . esc_attr( $settings['switch_style'] ) . ']' );
		}
	}
}
