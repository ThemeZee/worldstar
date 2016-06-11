<?php
/**
 * Implement theme options in the Customizer
 *
 * @package WorldStar
 */

 
// Load Customizer Helper Functions
require( get_template_directory() . '/inc/customizer/functions/custom-controls.php' );
require( get_template_directory() . '/inc/customizer/functions/sanitize-functions.php' );
require( get_template_directory() . '/inc/customizer/functions/callback-functions.php' );

// Load Customizer Section Files
require( get_template_directory() . '/inc/customizer/sections/customizer-general.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-post.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-featured.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-upgrade.php' );


/**
 * Registers Theme Options panel and sets up some WordPress core settings
 *
 */
function worldstar_customize_register_options( $wp_customize ) {

	// Add Theme Options Panel
	$wp_customize->add_panel( 'worldstar_options_panel', array(
		'priority'       => 180,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => esc_html__( 'Theme Options', 'worldstar' ),
		'description'    => '',
	) );
	
	// Add postMessage support for site title and description.
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	// Change default background section
	$wp_customize->get_control( 'background_color'  )->section   = 'background_image';
	$wp_customize->get_section( 'background_image'  )->title     = esc_html__( 'Background', 'worldstar' );
	
	// Add Display Site Title Setting
	$wp_customize->add_setting( 'worldstar_theme_options[site_title]', array(
        'default'           => true,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'worldstar_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'worldstar_theme_options[site_title]', array(
        'label'    => esc_html__( 'Display Site Title', 'worldstar' ),
        'section'  => 'title_tagline',
        'settings' => 'worldstar_theme_options[site_title]',
        'type'     => 'checkbox',
		'priority' => 10
		)
	);
	
} // worldstar_customize_register_options()
add_action( 'customize_register', 'worldstar_customize_register_options' );


/**
 * Embed JS file to make Theme Customizer preview reload changes asynchronously.
 *
 */
function worldstar_customize_preview_js() {
	wp_enqueue_script( 'worldstar-customizer-preview', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151202', true );
}
add_action( 'customize_preview_init', 'worldstar_customize_preview_js' );


/**
 * Embed JS file for Customizer Controls
 *
 */
function worldstar_customize_controls_js() {
	
	wp_enqueue_script( 'worldstar-customizer-controls', get_template_directory_uri() . '/js/customizer-controls.js', array(), '20151202', true );
	
	// Localize the script
	wp_localize_script( 'worldstar-customizer-controls', 'worldstar_theme_links', array(
		'title'	=> esc_html__( 'Theme Links', 'worldstar' ),
		'themeURL'	=> esc_url( __( 'https://themezee.com/themes/worldstar/', 'worldstar' ) . '?utm_source=customizer&utm_medium=textlink&utm_campaign=worldstar&utm_content=theme-page' ),
		'themeLabel'	=> esc_html__( 'Theme Page', 'worldstar' ),
		'docuURL'	=> esc_url( __( 'https://themezee.com/docs/worldstar-documentation/', 'worldstar' ) . '?utm_source=customizer&utm_medium=textlink&utm_campaign=worldstar&utm_content=documentation' ),
		'docuLabel'	=>  esc_html__( 'Theme Documentation', 'worldstar' ),
		'rateURL'	=> esc_url( 'http://wordpress.org/support/view/theme-reviews/worldstar?filter=5' ),
		'rateLabel'	=> esc_html__( 'Rate this theme', 'worldstar' ),
		)
	);

}
add_action( 'customize_controls_enqueue_scripts', 'worldstar_customize_controls_js' );


/**
 * Embed CSS styles for the theme options in the Customizer
 *
 */
function worldstar_customize_preview_css() {
	wp_enqueue_style( 'worldstar-customizer-css', get_template_directory_uri() . '/css/customizer.css', array(), '20151202' );
}
add_action( 'customize_controls_print_styles', 'worldstar_customize_preview_css' );