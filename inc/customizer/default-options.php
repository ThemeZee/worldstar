<?php
/**
 * Returns theme options
 *
 * Uses sane defaults in case the user has not configured any theme options yet.
 *
 * @package Worldstar
 */


/**
 * Get saved user settings from database or theme defaults
 *
 * @return array
 */
function worldstar_theme_options() {
    
	// Merge Theme Options Array from Database with Default Options Array
	$theme_options = wp_parse_args( 
		
		// Get saved theme options from WP database
		get_option( 'worldstar_theme_options', array() ), 
		
		// Merge with Default Options if setting was not saved yet
		worldstar_default_options() 
		
	);

	// Return theme options
	return $theme_options;
	
}


/**
 * Returns the default settings of the theme
 *
 * @return array
 */
function worldstar_default_options() {

	$default_options = array(
		'site_title'						=> true,
		'custom_header_link'				=> '',
		'custom_header_hide'				=> false,
		'layout' 							=> 'right-sidebar',
		'blog_title'						=> esc_html__( 'Latest Posts', 'worldstar' ),
		'post_layout'						=> 'two-columns',
		'post_content' 						=> 'excerpt',
		'excerpt_length' 					=> 20,
		'meta_date'							=> true,
		'meta_author'						=> true,
		'meta_comments'						=> true,
		'meta_category'						=> true,
		'post_image'						=> true,
		'meta_tags'							=> true,
		'post_navigation'					=> true,
		'slider_magazine' 					=> false,
		'slider_blog' 						=> false,
		'slider_category' 					=> 0,
		'slider_limit' 						=> 8,
		'slider_animation' 					=> 'slide',
		'slider_speed' 						=> 7000,
	);
	
	return $default_options;
}