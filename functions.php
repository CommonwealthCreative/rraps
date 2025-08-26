<?php
/**
 * RRAPS functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package RRAPS
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function rraps_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on RRAPS, use a find and replace
		* to change 'rraps' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'rraps', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'rraps' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'rraps_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'rraps_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rraps_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'rraps_content_width', 640 );
}
add_action( 'after_setup_theme', 'rraps_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rraps_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'rraps' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'rraps' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'rraps_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function rraps_scripts() {
	 // Enqueue Normalize first (base styles)
    wp_enqueue_style('normalize-styles', get_template_directory_uri() . '/css/normalize.css', array(), '1.0.0', 'all');

    // Enqueue Webflow styles next
    wp_enqueue_style('webflow-styles', get_template_directory_uri() . '/css/webflow.css', array('normalize-styles'), '1.0.0', 'all');

    // Enqueue theme's primary stylesheet last (if needed)
    wp_enqueue_style( 'the-commonwealth-theme-mmxxv-style', get_stylesheet_uri(), array(), _S_VERSION );
    wp_style_add_data( 'the-commonwealth-theme-mmxxv-style', 'rtl', 'replace' );

    // Enqueue Common MMXXV LAST to override Webflow styles
    wp_enqueue_style('mmxxv-styles', get_template_directory_uri() . '/css/myrappahannockriver-com.webflow.css', array('webflow-styles'), '1.0.0', 'all');

    // Enqueue scripts
    wp_enqueue_script('webflow-js', get_template_directory_uri() . '/js/webflow.js', array('jquery'), '1.0.0', true);

	wp_enqueue_style( 'rraps-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'rraps-style', 'rtl', 'replace' );

	wp_enqueue_script( 'rraps-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rraps_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Primary menu helpers: add classes and render with logo.
 */

/* Add class to <a> tags */
function rraps_nav_link_atts( $atts, $item, $args, $depth ) {
	if ( isset( $args->theme_location ) && $args->theme_location === 'menu-1' ) {
		$atts['class'] = isset( $atts['class'] ) ? trim( $atts['class'] . ' m-nav-link' ) : 'm-nav-link';
	}
	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'rraps_nav_link_atts', 10, 4 );

/* Add class to <li> items */
function rraps_nav_li_classes( $classes, $item, $args, $depth ) {
	if ( isset( $args->theme_location ) && $args->theme_location === 'menu-1' ) {
		$classes[] = 'm-nav-link-item';
	}
	return $classes;
}
add_filter( 'nav_menu_css_class', 'rraps_nav_li_classes', 10, 4 );

/* Mark the LAST top‑level item only */
function rraps_mark_last_top_level( $items, $args ) {
	if ( ! isset( $args->theme_location ) || $args->theme_location !== 'menu-1' ) {
		return $items;
	}
	$top_keys = array_keys( array_filter( $items, function ( $it ) {
		return (int) $it->menu_item_parent === 0;
	} ) );
	if ( ! empty( $top_keys ) ) {
		$last_key = end( $top_keys );
		if ( isset( $items[ $last_key ] ) ) {
			$items[ $last_key ]->classes[] = 'last-item';
		}
	}
	return $items;
}
add_filter( 'wp_nav_menu_objects', 'rraps_mark_last_top_level', 10, 2 );

/* Mark the LAST top-level item in Primary menu */
if (!function_exists('rraps_mark_last_top_level')) {
	function rraps_mark_last_top_level( $items, $args ) {
		if ( ! isset( $args->theme_location ) || $args->theme_location !== 'menu-1' ) {
			return $items;
		}
		$top_keys = array_keys( array_filter( $items, function ( $it ) {
			return (int) $it->menu_item_parent === 0;
		} ) );
		if ( ! empty( $top_keys ) ) {
			$last_key = end( $top_keys );
			if ( isset( $items[ $last_key ] ) ) {
				$items[ $last_key ]->classes[] = 'last-item';
			}
		}
		return $items;
	}
	add_filter( 'wp_nav_menu_objects', 'rraps_mark_last_top_level', 10, 2 );
}

/* Helper to render Primary menu with logo always shown */
if (!function_exists('rraps_render_primary_menu')) {
	function rraps_render_primary_menu() {
		$logo_li = '<li class="m-nav-link-item first-item' . ( has_nav_menu( 'menu-1' ) ? '' : ' last-item' ) . '">'
		         . '<img src="' . esc_url( get_template_directory_uri() ) . '/images/rraps-wordmark-white.svg"'
		         . ' loading="lazy" alt="" class="footerlogo"></li>';

		if ( has_nav_menu( 'menu-1' ) ) {
			// Logo + dynamic items with correct classes; no fallback list.
			return wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'container'      => false,
				'echo'           => false,
				'fallback_cb'    => '__return_empty_string',
				'items_wrap'     => '<ul role="list" class="m-nav-list w-list-unstyled">'
				                  . $logo_li
				                  . '%3$s'
				                  . '</ul>',
			) );
		}

		// No menu assigned: only the logo (also marked last-item).
		return '<ul role="list" class="m-nav-list w-list-unstyled">' . $logo_li . '</ul>';
	}
}

function rraps_menu_title_span( $title, $item, $args, $depth ) {
    // Only target the Tubing menu item (ID 44 in your code)
    if ( $item->ID == 44 ) {
        $title = str_replace(
            '(Summer 2026)',
            '<span class="yellow">(Summer 2026)</span>',
            $title
        );
    }
    return $title;
}
add_filter( 'nav_menu_item_title', 'rraps_menu_title_span', 10, 4 );


