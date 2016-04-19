<?php
/**
 * Post Slider Setup
 *
 * Enqueues scripts and styles for the slideshow
 * Sets slideshow excerpt length and slider animation parameter
 * 
 * The template for displaying the slideshow can be found under /template-parts/post-slider.php
 *
 * @package Worldstar
 */

 
/**
 * Enqueue slider scripts and styles.
 */
function worldstar_slider_scripts() {
	
	// Get Theme Options from Database
	$theme_options = worldstar_theme_options();
	
	// Register and Enqueue FlexSlider JS and CSS if necessary
	if ( true == $theme_options['slider_blog'] or true == $theme_options['slider_magazine'] or is_page_template('template-slider.php') ) :

		// FlexSlider CSS
		wp_enqueue_style( 'worldstar-flexslider', get_template_directory_uri() . '/css/flexslider.css' );

		// FlexSlider JS
		wp_enqueue_script( 'worldstar-flexslider', get_template_directory_uri() .'/js/jquery.flexslider-min.js', array('jquery'), '2.6.0' );

		// Register and enqueue slider.js
		wp_enqueue_script( 'worldstar-post-slider', get_template_directory_uri() .'/js/slider.js', array('worldstar-flexslider') );

	endif;
	
} // worldstar_slider_scripts
add_action( 'wp_enqueue_scripts', 'worldstar_slider_scripts' );


/**
 * Function to change excerpt length for post slider
 *
 * @param int $length Length of excerpt in number of words
 * @return int
 */
function worldstar_slider_excerpt_length($length) {
    return 25;
}


/**
 * Sets slider animation effect
 *
 * Passes parameters from theme options to the javascript files (js/slider.js)
 */
function worldstar_slider_options() { 
	
	// Get Theme Options from Database
	$theme_options = worldstar_theme_options();
	
	// Set Parameters array
	$params = array();
	
	// Define Slider Animation
	$params['animation'] = $theme_options['slider_animation'];
	
	// Define Slider Speed
	$params['speed'] = $theme_options['slider_speed'];
	
	// Passing Parameters to Javascript
	wp_localize_script( 'worldstar-post-slider', 'worldstar_slider_params', $params );
	
} // worldstar_slider_options
add_action( 'wp_enqueue_scripts', 'worldstar_slider_options' );