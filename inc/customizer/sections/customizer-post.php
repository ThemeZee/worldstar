<?php
/**
 * Post Settings
 *
 * Register Post Settings section, settings and controls for Theme Customizer
 *
 * @package Worldstar
 */


/**
 * Adds post settings in the Customizer
 *
 * @param object $wp_customize / Customizer Object
 */
function worldstar_customize_register_post_settings( $wp_customize ) {

	// Add Sections for Post Settings
	$wp_customize->add_section( 'worldstar_section_post', array(
        'title'    => esc_html__( 'Post Settings', 'worldstar' ),
        'priority' => 30,
		'panel' => 'worldstar_options_panel' 
		)
	);
	
	// Add Post Layout Settings for archive posts
	$wp_customize->add_setting( 'worldstar_theme_options[post_layout]', array(
        'default'           => 'index',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'worldstar_sanitize_select'
		)
	);
    $wp_customize->add_control( 'worldstar_theme_options[post_layout]', array(
        'label'    => esc_html__( 'Post Layout (archive pages)', 'worldstar' ),
        'section'  => 'worldstar_section_post',
        'settings' => 'worldstar_theme_options[post_layout]',
        'type'     => 'select',
		'priority' => 1,
        'choices'  => array(
            'small-image' => esc_html__( 'Show featured image beside content', 'worldstar' ),
            'index' => esc_html__( 'Show featured image below title', 'worldstar' )
			)
		)
	);
	
	// Add Settings and Controls for post content
	$wp_customize->add_setting( 'worldstar_theme_options[post_content]', array(
        'default'           => 'excerpt',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'worldstar_sanitize_select'
		)
	);
    $wp_customize->add_control( 'worldstar_theme_options[post_content]', array(
        'label'    => esc_html__( 'Post Length (archive pages)', 'worldstar' ),
        'section'  => 'worldstar_section_post',
        'settings' => 'worldstar_theme_options[post_content]',
        'type'     => 'radio',
		'priority' => 2,
        'choices'  => array(
            'full' => esc_html__( 'Show full posts', 'worldstar' ),
            'excerpt' => esc_html__( 'Show post excerpts', 'worldstar' )
			)
		)
	);
	
	// Add Setting and Control for Excerpt Length
	$wp_customize->add_setting( 'worldstar_theme_options[excerpt_length]', array(
        'default'           => 35,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'absint'
		)
	);
    $wp_customize->add_control( 'worldstar_theme_options[excerpt_length]', array(
        'label'    => esc_html__( 'Excerpt Length', 'worldstar' ),
        'section'  => 'worldstar_section_post',
        'settings' => 'worldstar_theme_options[excerpt_length]',
        'type'     => 'text',
		'active_callback' => 'worldstar_control_post_content_callback',
		'priority' => 3
		)
	);

}
add_action( 'customize_register', 'worldstar_customize_register_post_settings' );