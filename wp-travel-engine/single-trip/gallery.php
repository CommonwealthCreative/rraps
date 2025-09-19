<?php
/**
 * Trip gallery template (theme override).
 * Copy to: yourtheme/wp-travel-engine/single-trip/gallery.php
 */

if ( ! defined( 'ABSPATH' ) ) exit;
global $post;

/** Settings / layout gate */
$wptravelengine_settings = get_option( 'wp_travel_engine_settings', array() );
$banner_layout           = $wptravelengine_settings['trip_banner_layout'] ?? 'banner-default';
$related_query           = isset( $related_query ) ? $related_query : false;

if ( ! ( 'banner-default' === $banner_layout || 'banner-layout-6' === $banner_layout || $related_query ) ) {
	do_action( 'wptravelengine_trip_dynamic_banner', $post->ID );
	return;
}

echo '<div class="wpte-gallery-wrapper__multi-banners">';

/** Render the plugin's main gallery to a buffer so we can inject overlay */
ob_start();
wptravelengine_get_template( 'single-trip/main-gallery.php' );
$gallery_html = ob_get_clean();

/**
 * Ensure the FIRST .wpte-gallery-wrapper has position:relative
 * (works even if there are additional classes/attributes).
 */
$gallery_html = preg_replace_callback(
	'/(<div[^>]*class=["\'][^"\']*\bwpte-gallery-wrapper\b[^"\']*["\'][^>]*>)/i',
	function( $m ) {
		$tag = $m[1];
		if ( stripos( $tag, 'style=' ) !== false ) {
			$tag = preg_replace( '/style=(["\'])(.*?)\1/i', 'style="$2;position:relative"', $tag );
		} else {
			$tag = str_replace( '>', ' style="position:relative">', $tag );
		}
		return $tag;
	},
	$gallery_html,
	1
);

/** ---------- Build overlay entirely in PHP, reusing plugin title.php ---------- */
$overlay = '';
if ( is_singular( 'trip' ) ) {
	$title = get_the_title();

	// 1) Capture the plugin's header (single-trip/title.php) so we get EXACT duration markup & hooks.
	ob_start();
	wptravelengine_get_template( 'single-trip/title.php' );
	$plugin_header_html = ob_get_clean();

	// 2) Extract one or more duration blocks exactly as rendered by the plugin:
	//    <span class="wte-title-duration"> ... </span>
	$durations_html = '';
	if ( is_string( $plugin_header_html ) ) {
		if ( preg_match_all( '/<span[^>]*class=["\'][^"\']*\bwte-title-duration\b[^"\']*["\'][^>]*>.*?<\/span>/is', $plugin_header_html, $matches ) ) {
			$durations_html = implode( '', $matches[0] );
		}
	}

	// 3) Fallback if extraction failed: try to compute from common meta keys.
	if ( $durations_html === '' ) {
		$settings = get_post_meta( $post->ID, 'wp_travel_engine_setting', true );
		$dur_raw  = '';
		$unit_raw = '';
		if ( is_array( $settings ) ) {
			if ( isset( $settings['trip_duration'] ) )      $dur_raw  = $settings['trip_duration'];
			if ( isset( $settings['trip_duration_unit'] ) ) $unit_raw = $settings['trip_duration_unit'];
		}
		if ( $dur_raw === '' )  $dur_raw  = get_post_meta( $post->ID, 'wte_trip_duration', true );
		if ( $unit_raw === '' ) $unit_raw = get_post_meta( $post->ID, 'wte_trip_duration_unit', true );
		if ( $dur_raw === '' )  $dur_raw  = get_post_meta( $post->ID, '_wptravelengine_trip_duration', true );
		if ( $unit_raw === '' ) $unit_raw = get_post_meta( $post->ID, '_wptravelengine_trip_duration_unit', true );

		$dur  = is_numeric( $dur_raw ) ? (int) $dur_raw : 0;
		$unit = strtolower( trim( (string) $unit_raw ) );
		if ( ! in_array( $unit, array( 'hour','hours','day','days' ), true ) ) $unit = 'hours';
		$label = ( $unit === 'day' || ( $unit === 'days' && $dur === 1 ) )
			? 'Day'
			: ( $unit === 'days' ? 'Days' : ( $dur === 1 ? 'Hour' : 'Hours' ) );

		if ( $dur > 0 ) {
			$durations_html =
				'<span class="wte-title-duration">' .
					'<span class="duration">' . esc_html( number_format_i18n( $dur ) ) . '</span>' .
					'<span class="days">' . esc_html( $label ) . '</span>' .
				'</span>';
		}
	}

	// 4) Trip content (prefer .trip-post-content from content; otherwise excerpt).
	$rendered           = apply_filters( 'the_content', get_post_field( 'post_content', $post->ID ) );
	$trip_content_html  = '';
	if ( is_string( $rendered ) && preg_match( '/<div[^>]*class=["\'][^"\']*trip-post-content[^"\']*["\'][^>]*>(.*?)<\/div>/is', $rendered, $m ) ) {
		$trip_content_html = '<div class="trip-post-content">' . $m[1] . '</div>';
	} else {
		$excerpt = get_the_excerpt( $post );
		if ( $excerpt ) {
			$trip_content_html = '<div class="trip-post-content"><p>' . esc_html( $excerpt ) . '</p></div>';
		}
	}

	// 5) Final overlay block (duration(s) before big H1).
	$overlay  = '<div data-w-id="c1020234-c7cf-39ab-ce37-e6942fd98ae4" style="opacity:1;" class="overlaytext">';
	$overlay .=     $durations_html;                                   // ← EXACT markup from plugin header
	$overlay .=     '<h1 class="big">' . esc_html( $title ) . '</h1>';
	$overlay .=     wp_kses_post( $trip_content_html );
	$overlay .= '</div>';
}

/** Inject overlay just after the opening .wpte-gallery-wrapper */
if ( $overlay && is_string( $gallery_html ) ) {
	$gallery_html = preg_replace(
		'/(<div[^>]*class=["\'][^"\']*\bwpte-gallery-wrapper\b[^"\']*["\'][^>]*>)/i',
		'$1' . $overlay,
		$gallery_html,
		1
	);
}

echo $gallery_html;
?>
<script>
(function () {
  function onReady(fn){
    if (document.readyState !== 'loading') fn();
    else document.addEventListener('DOMContentLoaded', fn, { once: true });
  }

  onReady(function () {
    var navToggle    = document.querySelector('.m-nav-toggle');
    var navToggleBg  = document.querySelector('.m-nav-toggle-bg');
    var footer       = document.querySelector('.site-footer');
    if (!navToggle || !navToggleBg || !footer) return;

    var prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var DUR = prefersReduced ? 0 : 700;

    function applyHidden() {
      [navToggle, navToggleBg].forEach(function(el){
        el.style.setProperty('opacity', '0', 'important');
        el.style.setProperty('transform', 'translate3d(0, 16px, 0)', 'important');
        el.style.pointerEvents = 'none';
        el.setAttribute('aria-hidden','true');
      });
    }

    function applyVisible() {
      [navToggle, navToggleBg].forEach(function(el){
        el.style.setProperty('opacity', '1', 'important');
        el.style.setProperty('transform', 'translate3d(0, 0, 0)', 'important');
        el.style.pointerEvents = 'auto';
        el.removeAttribute('aria-hidden');
      });
    }

    function inView(el){
      var r = el.getBoundingClientRect();
      var vh = window.innerHeight || document.documentElement.clientHeight;
      var vw = window.innerWidth  || document.documentElement.clientWidth;
      return r.bottom >= 0 && r.right >= 0 && r.top <= vh && r.left <= vw;
    }

    function update(){
      if (window.innerWidth >= 1025) {
        inView(footer) ? applyVisible() : applyHidden();
      } else {
        applyHidden();
      }
    }

    [navToggle, navToggleBg].forEach(function(el){
      el.style.setProperty('will-change', 'opacity, transform', 'important');
      el.style.setProperty('transition', 'opacity ' + DUR + 'ms ease, transform ' + DUR + 'ms ease', 'important');
    });
    applyHidden();

    if ('IntersectionObserver' in window) {
      var io = new IntersectionObserver(function (entries) {
        if (window.innerWidth < 1025) { applyHidden(); return; }
        var e = entries[0];
        if (!e) return;
        e.isIntersecting ? applyVisible() : applyHidden();
      }, { root: null, threshold: 0 });
      io.observe(footer);
    }

    ['scroll','resize','orientationchange'].forEach(function(ev){
      window.addEventListener(ev, update, { passive: true });
    });

    requestAnimationFrame(update);
    setTimeout(update, 300);
  });
})();
</script>
<?php
echo '</div>';
