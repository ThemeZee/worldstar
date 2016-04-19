<?php
/**
 * Post Settings
 *
 * Register Post Settings section, settings and controls for Theme Customizer
 *
 * @package zeeDynamic
 */


/**
 * Adds post settings in the Customizer
 *
 * @param object $wp_customize / Customizer Object
 */
function zeedynamic_customize_register_post_settings( $wp_customize ) {

	// Add Sections for Post Settings
	$wp_customize->add_section( 'zeedynamic_section_post', array(
        'title'    => esc_html__( 'Post Settings', 'zeedynamic' ),
        'priority' => 30,
		'panel' => 'zeedynamic_options_panel' 
		)
	);
	
	// Add Post Layout Settings for archive posts
	$wp_customize->add_setting( 'zeedynamic_theme_options[post_layout]', array(
        'default'           => 'index',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'zeedynamic_sanitize_select'
		)
	);
    $wp_customize->add_control( 'zeedynamic_theme_options[post_layout]', array(
        'label'    => esc_html__( 'Post Layout (archive pages)', 'zeedynamic' ),
        'section'  => 'zeedynamic_section_post',
        'settings' => 'zeedynamic_theme_options[post_layout]',
        'type'     => 'select',
		'priority' => 1,
        'choices'  => array(
            'small-image' => esc_html__( 'Show featured image beside content', 'zeedynamic' ),
            'index' => esc_html__( 'Show featured image below title', 'zeedynamic' )
			)
		)
	);
	
	// Add Settings and Controls for post content
	$wp_customize->add_setting( 'zeedynamic_theme_options[post_content]', array(
        'default'           => 'excerpt',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'zeedynamic_sanitize_select'
		)
	);
    $wp_customize->add_control( 'zeedynamic_theme_options[post_content]', array(
        'label'    => esc_html__( 'Post Length (archive pages)', 'zeedynamic' ),
        'section'  => 'zeedynamic_section_post',
        'settings' => 'zeedynamic_theme_options[post_content]',
        'type'     => 'radio',
		'priority' => 2,
        'choices'  => array(
            'full' => esc_html__( 'Show full posts', 'zeedynamic' ),
            'excerpt' => esc_html__( 'Show post excerpts', 'zeedynamic' )
			)
		)
	);
	
	// Add Setting and Control for Excerpt Length
	$wp_customize->add_setting( 'zeedynamic_theme_options[excerpt_length]', array(
        'default'           => 35,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'absint'
		)
	);
    $wp_customize->add_control( 'zeedynamic_theme_options[excerpt_length]', array(
        'label'    => esc_html__( 'Excerpt Length', 'zeedynamic' ),
        'section'  => 'zeedynamic_section_post',
        'settings' => 'zeedynamic_theme_options[excerpt_length]',
        'type'     => 'text',
		'active_callback' => 'zeedynamic_control_post_content_callback',
		'priority' => 3
		)
	);

}
add_action( 'customize_register', 'zeedynamic_customize_register_post_settings' );