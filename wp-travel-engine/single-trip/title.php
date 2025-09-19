<?php
/**
 * Single Trip header
 *
 * This template can be overridden by copying it to yourtheme/wp-travel-engine/single-trip/title.php.
 *
 * @package Wp_Travel_Engine
 * @subpackage Wp_Travel_Engine/includes/templates
 * @since @release-version //TODO: change after travel muni is live
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<header class="entry-header<?php echo ( 'days_and_nights' === $trip_duration_format && ! empty( $nights ) && 'hours' !== $duration_unit ) ? ' has-night' : ''; ?>">
</header>
<!-- ./entry-header -->
<?php
/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
