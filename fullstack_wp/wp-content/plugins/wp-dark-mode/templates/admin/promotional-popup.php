<?php
/**
 * Promotional Popup (Legacy)
 * Shows when the user is NOT using the ultimate version of WP Dark Mode.
 *
 * @package WP Dark Mode
 * @since 1.0
 */
defined( 'ABSPATH' ) || exit;


$campaign_starts = '2023-11-16 00:00:01';
$campaign_ends   = '2023-11-27 23:59:59';
$campaign_discount = 50;
$campaign_title = __( 'Black Friday Deal, You Can\'t Turn Down!', 'wp-dark-mode' );

$is_campaign = strtotime( $campaign_starts ) < time() && time() < strtotime( $campaign_ends );

// Count down time.
$countdown_timer = get_transient( 'wp_dark_mode_promo_countdown_timer' );
if ( empty( $countdown_timer ) || $countdown_timer < time() ) {
	$countdown_timer = strtotime( '+ 14 hours' );
	set_transient( 'wp_dark_mode_promo_countdown_timer', $countdown_timer, 14 * HOUR_IN_SECONDS );
}

// Change timer.
$countdown_timer = $is_campaign ? strtotime( $campaign_ends ) : $countdown_timer;

// Formatted data.
$data = [
	'counter_time' => $countdown_timer,
	'discount'     => $is_campaign ? $campaign_discount : 35,
];

$countdown_time = [
	'year'   => gmdate( 'Y', $countdown_timer ),
	'month'  => gmdate( 'm', $countdown_timer ),
	'day'    => gmdate( 'd', $countdown_timer ),
	'hour'   => gmdate( 'H', $countdown_timer ),
	'minute' => gmdate( 'i', $countdown_timer ),
];

$is_pro = wp_dark_mode()->is_pro_active();
$modal_title = $is_pro ? __( 'Unlock the PRO features', 'wp-dark-mode' ) : __( 'Unlock all the features', 'wp-dark-mode' );

$modal_title = $is_campaign ? $campaign_title : $modal_title;

?>

<div class="wp-dark-mode-promo hidden <?php echo ! empty( $class ) ? esc_attr( $class ) : ''; ?>">
	<div class="wp-dark-mode-promo-inner">

		<span class="close-promo">&times;</span>

		<img src="<?php echo esc_url( WP_DARK_MODE_ASSETS ) . '/images/gift-box.svg'; ?>" class="promo-img">

		<?php

		if ( ! empty( $modal_title ) ) {
			printf( '<h3 class="promo-title">%s</h3>', esc_html( $modal_title ) );
		}

		printf( '<div class="discount"> <span class="discount-special">SPECIAL</span> <span class="discount-text">%s%s OFF</span></div>', esc_html( $data['discount'] ), '%' );
		?>

		<div class="wp-dark-mode-timer">
			<div class="days">
				<span>00</span>
				<span><?php esc_html_e( 'DAYS', 'wp-dark-mode' ); ?></span>
			</div>
			<div class="hours">
				<span>00</span>
				<span><?php esc_html_e( 'HOURS', 'wp-dark-mode' ); ?></span>
			</div>
			<div class="minutes">
				<span>00</span>
				<span><?php esc_html_e( 'MINUTES', 'wp-dark-mode' ); ?></span>
			</div>
			<div class="seconds">
				<span>00</span>
				<span><?php esc_html_e( 'SECONDS', 'wp-dark-mode' ); ?></span>
			</div>
		</div>

		<a href="https://go.wppool.dev/LaSV" target="_blank"><?php echo wp_sprintf( 'Claim %s%s Discount', esc_html( $data['discount'] ), '%' ); ?></a>
	</div>

	<style>
		.wp-dark-mode-promo {
			opacity: .95;
		}
		.wp-dark-mode-timer {
			text-align: center;
			padding: 0 0 10px;
		}

		.wp-dark-mode-timer > div {
			display: inline-block;
			margin: 0 14px;

			width: 47px;
			background: url(<?php echo esc_url( WP_DARK_MODE_ASSETS ) . '/images/timer.svg'; ?>) no-repeat 0 0;
			background-size: contain;
			line-height: 40px;
		}

		.wp-dark-mode-timer > div > span:first-child {
			font-size: 28px;
			color: #fff;
			height: 47px;
			margin: 0 0 2px;
			display: flex;
			align-items: center;
			justify-content: center;
		}

		.wp-dark-mode-timer > div > span:last-child {
			font-family: Arial, serif;
			font-size: 12px;
			text-transform: uppercase;
			color: #fff;
		}

		.wp-dark-mode-promo-inner .discount {
			position: relative;
			margin: 45px 0 15px;
		}
	</style>


	<script>
		(function ($) {
			$(document).ready(function () {

				// Show promo popup
				window.showDarkModePromo = () => {
					$('.wp-dark-mode-promo').removeClass('hidden');

					$('html, body').animate({
						scrollTop: $('.wp-dark-mode-promo').offset().top
					}, 'slow');
				}

				// Hide promo popup
				window.hideDarkModePromo = () => {
					$('.wp-dark-mode-promo').addClass('hidden');
				}

				//show popup
				$(document).on('click', '.wp-dark-mode-settings-page .disabled', function (e) {
					e.preventDefault();
					e.stopPropagation();
					window.showDarkModePromo();
				});

				//close promo
				$(document).on('click', '.close-promo', function () {
					window.hideDarkModePromo();
				});

				//close promo
				$(document).on('click', '.wp-dark-mode-promo', function (e) {

					if (e.target !== this) {
						return;
					}

					window.hideDarkModePromo();
				});

				<?php if ( ! empty( $countdown_time ) ) { ?>

				const letCountDownStart = () => {
					const countDownDate = new Date('<?php echo esc_html( $countdown_time['year'] ); ?>-<?php echo esc_html( $countdown_time['month'] ); ?>-<?php echo esc_html( $countdown_time['day'] ); ?> <?php echo esc_html( $countdown_time['hour'] ); ?>:<?php echo esc_html( $countdown_time['minute'] ); ?>:00').getTime();
					
					const x = setInterval(function () {
						const now = new Date().getTime();
						const distance = countDownDate - now;

						const days = Math.floor(distance / (1000 * 60 * 60 * 24));
						const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
						const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
						const seconds = Math.floor((distance % (1000 * 60)) / 1000);

						$('.wp-dark-mode-timer .days span:first-child').text(days);
						$('.wp-dark-mode-timer .hours span:first-child').text(hours);
						$('.wp-dark-mode-timer .minutes span:first-child').text(minutes);
						$('.wp-dark-mode-timer .seconds span:first-child').text(seconds);

						if (distance < 0) {
							clearInterval(x);
							$('.wp-dark-mode-timer').html('<span class="expired">EXPIRED</span>');
						}
					}, 1000);

				}

				letCountDownStart();
				<?php } ?>

			})
		})(jQuery);
	</script>

</div>