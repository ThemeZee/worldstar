<?php
/**
 * Add Support for Theme Addons
 *
 * @package WorldStar
 */


// Register support for ThemeZee Addons
add_action( 'after_setup_theme', 'worldstar_theme_addons_setup' );

function worldstar_theme_addons_setup() {

	// Add Theme Support for WorldStar Pro Plugin
	add_theme_support( 'worldstar-pro' );
	
	// Add Theme Support for ThemeZee Plugins
	add_theme_support( 'themezee-widget-bundle' );
	add_theme_support( 'themezee-breadcrumbs' );
	add_theme_support( 'themezee-related-posts' );
	
	// Add Support for Infinite Scroll
	add_theme_support( 'infinite-scroll', array(
		'type' 		=> 'click',
		'container' => 'main',
		'render'    => 'worldstar_infinite_scroll_render',
	) );
	
}


// Load addon stylesheets and scripts
add_action( 'wp_enqueue_scripts', 'worldstar_theme_addons_scripts' );

function worldstar_theme_addons_scripts() {

	// Load widget bundle styles if widgets are active
	if ( is_active_widget('TZWB_Facebook_Likebox_Widget', false, 'tzwb-facebook-likebox')
		or is_active_widget('TZWB_Recent_Comments_Widget', false, 'tzwb-recent-comments')
		or is_active_widget('TZWB_Recent_Posts_Widget', false, 'tzwb-recent-posts')
		or is_active_widget('TZWB_Social_Icons_Widget', false, 'tzwb-social-icons')
		or is_active_widget('TZWB_Tabbed_Content_Widget', false, 'tzwb-tabbed-content')
	) {
	
		// Enqueue Widget Bundle Stylesheet
		wp_enqueue_style( 'themezee-widget-bundle', get_template_directory_uri() . '/css/themezee-widget-bundle.css', array(), '20160421' );

	}
	
	// Load Related Posts stylesheet only on single posts
	if( is_singular( 'post' ) ) {
	
		// Enqueue Related Post Stylesheet
		wp_enqueue_style( 'themezee-related-posts', get_template_directory_uri() . '/css/themezee-related-posts.css', array(), '20160421' );

	}
	
}


// Add custom Image Sizes for addons
add_action( 'after_setup_theme', 'worldstar_theme_addons_image_sizes' );

function worldstar_theme_addons_image_sizes() {

	// Add Widget Bundle Thumbnail
	add_image_size( 'tzwb-thumbnail', 90, 60, true );
	
	// Add Related Posts Thumbnail
	add_image_size( 'themezee-related-posts', 420, 240, true );

}


/**
 * Custom render function for Infinite Scroll.
 */
function worldstar_infinite_scroll_render() {

	// Get Theme Options from Database
	$theme_options = worldstar_theme_options();
	
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', $theme_options['post_layout'] );
	}
	
} // worldstar_infinite_scroll_render()