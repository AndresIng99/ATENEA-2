<?php
/**
 * WP Dark Mode - Social Share Base
 * Load all social share templates
 *
 * @package WP_DARK_MODE
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit();
?>

<div class="wrap wpdarkmode-section wpdarkmode-social-share" id="wp-dark-mode-social-share" x-data="SocialShare" tabindex="0">

	<!-- header  -->
	<h3 class="text-xl font-medium mb-4"><?php esc_html_e( 'Social Share (Inline Button)', 'wp-dark-mode' ); ?></h3>

	<!-- body  -->
	<div class="flex flex-col gap-2 border border-gray-300 bg-white relative">

		<?php
		// Get social share loader.
		wp_dark_mode()->get_template( 'admin/social-share/loader' );

		// Get social share sidebar.
		wp_dark_mode()->get_template( 'admin/social-share/sidebar' );
		?>


		<!-- content  -->
		<section class="w-full flex flex-col md:flex-row">

			<div class="_content-section">

				<?php
				// Get social share channels.
				wp_dark_mode()->get_template( 'admin/social-share/channels' );

				// Get social share customization.
				wp_dark_mode()->get_template( 'admin/social-share/customization' );
				?>

			</div>

			<?php
			// Get social share preview.
			wp_dark_mode()->get_template( 'admin/social-share/preview' );
			?>

		</section>

		<!-- content end  -->
	</div>

	<!-- footer  -->

	<?php do_action( 'wpdarkmode_social_share_footer' ); ?>

</div>