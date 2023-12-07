<?php
/**
 * WP Dark Mode - Filter Preview
 * Shows as a dummy preview sub-screen inside the Filter Settings screen in the admin area.
 *
 * @package WP_DARK_MODE
 * @since Unknown
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit();

$font_size = wp_dark_mode_get_settings( 'wp_dark_mode_accessibility', 'font_size', 100 );

if ( 'custom' === $font_size ) {
	$font_size = wp_dark_mode_get_settings( 'wp_dark_mode_accessibility', 'custom_font_size', 100 );
}

echo '<style>.font_size_preview #hero{zoom: ' . esc_attr( $font_size ) . '%}</style>';
?>

<h2><?php echo esc_html__( 'Filter Settings Demo Preview:', 'wp-dark-mode' ); ?></h2>

<section  id="hero" class="hero-banner filter-preview wp-dark-mode-include">
	<ul class="navbar_nav wp-dark-mode-include">
		<li><a href="#!" class="wp-dark-mode-include"><?php echo esc_html__( 'Home', 'wp-dark-mode' ); ?></a></li>
		<li><a href="#!" class="wp-dark-mode-include"><?php echo esc_html__( 'Features', 'wp-dark-mode' ); ?></a></li>
		<li><a href="#!" class="wp-dark-mode-include"><?php echo esc_html__( 'Pricing', 'wp-dark-mode' ); ?></a></li>
		<li><a href="#!" class="wp-dark-mode-include"><?php echo esc_html__( 'Contact', 'wp-dark-mode' ); ?></a></li>
	</ul>

	<div class="small-element wp-dark-mode-include"></div>
	<div class="container wp-dark-mode-include">
		<div class="row wp-dark-mode-include">
			<div class="col-xl-12 wp-dark-mode-include">
				<div class="hero-content wp-dark-mode-include">
					<h1 class="text-white wp-dark-mode-include">
						<?php echo wp_sprintf( '%s,<span>%s</span>', esc_html__( 'Doing it all', 'wp-dark-mode' ), esc_html__( 'In all new ways.', 'wp-dark-mode' ) ); ?>
					</h1>
					<p class="wp-dark-mode-include">
						<?php echo esc_html__( 'Experience remarkable WordPress products with a new level of power, beauty, and human-centered designs. Think you know WordPress products? Think Deeper!', 'wp-dark-mode' ); ?>
					</p>
					<a class="hero-btn  wp-dark-mode-include" href="https://wppool.dev/" target="_blank"><?php echo esc_html__( 'Our Products', 'wp-dark-mode' ); ?></a>
				</div>
			</div>
		</div>
	</div>
</section>