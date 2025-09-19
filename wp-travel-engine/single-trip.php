<?php
	/**
	 * The template for displaying all single trips
	 *
	 * This template can be overridden by copying it to yourtheme/wp-travel-engine/single-trip.php.
	 *
	 * @package Wp_Travel_Engine
	 * @subpackage Wp_Travel_Engine/includes/templates
	 * @since @release-version //TODO: change after travel muni is live
	 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

	get_header(); ?>

	<?php
		/**
		 * wp_travel_engine_before_trip_content hook.
		 *
		 * @hooked trip_content_wrapper_start - 5 (outputs opening divs for the trip content)
		 */
		do_action( 'wp_travel_engine_before_trip_content' );
	?>

		<?php
		while ( have_posts() ) {
			the_post();
			wte_get_template( 'content-single-trip.php' );
		}
		?>

   <?php
		/**
		 * wp_travel_engine_after_trip_content hook.
		 *
		 * @hooked trip_content_wrapper_end - 5 (outputs closing divs for the trip content)
		 */
		do_action( 'wp_travel_engine_after_trip_content' );
	?>

   <?php
		/**
		 * wp_travel_engine_trip_sidebar hook.
		 *
		 * @hooked trip_content_sidebar - 5 (shows trip sidebar)
		 */
		do_action( 'wp_travel_engine_trip_sidebar' );
	?>

   <?php
		/**
		 * wp_travel_engine_primary_wrap_close hook.
		 *
		 * @hooked trip_wrapper_end - 5 (outputs final closing divs and left for customization)
		 */
		do_action( 'wp_travel_engine_primary_wrap_close' );
	?>

		<?php
		$settings = get_option( 'wp_travel_engine_settings', array() );

		// Only render enquiry form if not disabled in settings.
		if ( empty( $settings['enquiry'] ) ) {

			$custom_enquiry = ! empty( $settings['custom_enquiry'] );
			$shortcode_raw  = isset( $settings['enquiry_shortcode'] ) ? (string) $settings['enquiry_shortcode'] : '';

			echo '<section class="inquiry-form"><div class="trip-content-area"><div class="break"></div><div id="wte_enquiry_form_scroll_wrapper" class="wte_enquiry_contact_form-wrap">';

			if ( $custom_enquiry && $shortcode_raw ) {
				// Use the FIRST shortcode only (in case multiple are saved).
				if ( preg_match( '/\[([^\]]+)\]/', $shortcode_raw, $m ) && ! empty( $m[1] ) ) {
					echo do_shortcode( '[' . $m[1] . ']' );
				}
			} else {
				// Default WP Travel Engine enquiry form
				do_action( 'wp_travel_engine_enquiry_form' );
			}

			echo '</div></div></section>';
		}
		?>

<?php
get_footer();

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
