<?php
/**
 * Worldstar functions and definitions
 *
 * @package Worldstar
 */

/**
 * Worldstar only works in WordPress 4.2 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.2', '<' ) ) :
	require get_template_directory() . '/inc/back-compat.php';
endif;


if ( ! function_exists( 'worldstar_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function worldstar_setup() {

	// Make theme available for translation. Translations can be filed in the /languages/ directory.
	load_theme_textdomain( 'worldstar', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );
	
	// Set detfault Post Thumbnail size
	set_post_thumbnail_size( 820, 360, true );

	// Register Navigation Menu
	register_nav_menu( 'primary', esc_html__( 'Main Navigation', 'worldstar' ) );

	// Switch default core markup for search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'worldstar_custom_background_args', array( 'default-color' => 'e5e5e5' ) ) );
	
	// Set up the WordPress core custom logo feature
	add_theme_support( 'custom-logo', apply_filters( 'worldstar_custom_logo_args', array(
		'height' => 40,
		'width' => 250,
		'flex-height' => true,
		'flex-width' => true,
	) ) );
	
	// Set up the WordPress core custom header feature.
	add_theme_support('custom-header', apply_filters( 'worldstar_custom_header_args', array(
		'header-text' => false,
		'width'	=> 1230,
		'height' => 410,
		'flex-height' => true
	) ) );
	
	// Add Theme Support for wooCommerce
	add_theme_support( 'woocommerce' );
	
}
endif; // worldstar_setup
add_action( 'after_setup_theme', 'worldstar_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function worldstar_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'worldstar_content_width', 810 );
}
add_action( 'after_setup_theme', 'worldstar_content_width', 0 );


/**
 * Register widget areas and custom widgets.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function worldstar_widgets_init() {
	
	register_sidebar( array(
		'name' => esc_html__( 'Sidebar', 'worldstar' ),
		'id' => 'sidebar',
		'description' => esc_html__( 'Appears on posts and pages except the full width template.', 'worldstar' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="widget-header"><h3 class="widget-title">',
		'after_title' => '</h3></div>',
	));
	
	register_sidebar( array(
		'name' => esc_html__( 'Header', 'worldstar' ),
		'id' => 'header',
		'description' => esc_html__( 'Appears on header area. You can use a search or ad widget here.', 'worldstar' ),
		'before_widget' => '<aside id="%1$s" class="header-widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="header-widget-title">',
		'after_title' => '</h4>',
	));
	
	register_sidebar( array(
		'name' => esc_html__( 'Magazine Homepage', 'worldstar' ),
		'id' => 'magazine-homepage',
		'description' => esc_html__( 'Appears on Magazine Homepage template only. You can use the Magazine Posts widgets here.', 'worldstar' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-header"><h3 class="widget-title">',
		'after_title' => '</h3></div>',
	));
	
} // worldstar_widgets_init
add_action( 'widgets_init', 'worldstar_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function worldstar_scripts() {
	global $wp_scripts;
	
	// Register and Enqueue Stylesheet
	wp_enqueue_style( 'worldstar-stylesheet', get_stylesheet_uri() );
	
	// Register Genericons
	wp_enqueue_style( 'worldstar-genericons', get_template_directory_uri() . '/css/genericons/genericons.css' );
	
	// Register and Enqueue HTML5shiv to support HTML5 elements in older IE versions
	wp_enqueue_script( 'worldstar-html5shiv', get_template_directory_uri() . '/js/html5shiv.min.js', array(), '3.7.2', false );
	$wp_scripts->add_data( 'worldstar-html5shiv', 'conditional', 'lt IE 9' );

	// Register and enqueue navigation.js
	wp_enqueue_script( 'worldstar-jquery-navigation', get_template_directory_uri() .'/js/navigation.js', array('jquery') );
	
	// Passing Parameters to Navigation.js Javascript
	wp_localize_script( 'worldstar-jquery-navigation', 'worldstar_menu_title', esc_html__( 'Menu', 'worldstar' ) );
	
	// Register and Enqueue Google Fonts
	wp_enqueue_style( 'worldstar-default-fonts', worldstar_google_fonts_url(), array(), null );

	// Register Comment Reply Script for Threaded Comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
} // worldstar_scripts
add_action( 'wp_enqueue_scripts', 'worldstar_scripts' );


/**
 * Retrieve Font URL to register default Google Fonts
 */
function worldstar_google_fonts_url() {
    
	// Set default Fonts
	$font_families = array( 'Droid Sans:400,400italic,700,700italic', 'Francois One:400,400italic,700,700italic' );

	// Build Fonts URL
	$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
		'subset' => urlencode( 'latin,latin-ext' ),
	);
	$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

    return apply_filters( 'worldstar_google_fonts_url', $fonts_url );
}


/**
 * Add custom sizes for featured images
 */
function worldstar_add_image_sizes() {
	
	// Add Custom Header Image Size
	add_image_size( 'worldstar-header-image', 1230, 410, true );
	
	// Add Image Size for Archives
	add_image_size( 'worldstar-thumbnail-archive', 350, 280, true );
	
	// Add different thumbnail sizes for widgets and post layouts
	add_image_size( 'worldstar-thumbnail-small', 100, 80, true );
	add_image_size( 'worldstar-thumbnail-medium', 350, 230, true );
	add_image_size( 'worldstar-thumbnail-large', 420, 280, true );
	
}
add_action( 'after_setup_theme', 'worldstar_add_image_sizes' );


/**
 * Include Files
 */
 
// include Theme Info page
require get_template_directory() . '/inc/theme-info.php';

// include Theme Customizer Options
require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/inc/customizer/default-options.php';

// Include Extra Functions
require get_template_directory() . '/inc/extras.php';

// include Template Functions
require get_template_directory() . '/inc/template-tags.php';

// Include support functions for Theme Addons
require get_template_directory() . '/inc/addons.php';

// Include Post Slider Setup
require get_template_directory() . '/inc/slider.php';

// include Widget Files
require get_template_directory() . '/inc/widgets/widget-magazine-posts-columns.php';
require get_template_directory() . '/inc/widgets/widget-magazine-posts-grid.php';