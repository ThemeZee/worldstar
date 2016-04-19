<?php
/**
 * General Settings
 *
 * Register General section, settings and controls for Theme Customizer
 *
 * @package zeeDynamic
 */


/**
 * Adds all general settings to the Customizer
 *
 * @param object $wp_customize / Customizer Object
 */
function zeedynamic_customize_register_general_settings( $wp_customize ) {

	// Add Section for Theme Options
	$wp_customize->add_section( 'zeedynamic_section_general', array(
        'title'    => esc_html__( 'General Settings', 'zeedynamic' ),
        'priority' => 10,
		'panel' => 'zeedynamic_options_panel' 
		)
	);
	
	// Add Settings and Controls for Layout
	$wp_customize->add_setting( 'zeedynamic_theme_options[layout]', array(
        'default'           => 'right-sidebar',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'zeedynamic_sanitize_select'
		)
	);
    $wp_customize->add_control( 'zeedynamic_theme_options[layout]', array(
        'label'    => esc_html__( 'Theme Layout', 'zeedynamic' ),
        'section'  => 'zeedynamic_section_general',
        'settings' => 'zeedynamic_theme_options[layout]',
        'type'     => 'radio',
		'priority' => 1,
        'choices'  => array(
            'left-sidebar' => esc_html__( 'Left Sidebar', 'zeedynamic' ),
            'right-sidebar' => esc_html__( 'Right Sidebar', 'zeedynamic' )
			)
		)
	);
	
	// Add Title for latest posts setting
	$wp_customize->add_setting( 'zeedynamic_theme_options[blog_title]', array(
        'default'           => esc_html__( 'Latest Posts', 'zeedynamic' ),
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_html'
		)
	);
    $wp_customize->add_control( 'zeedynamic_theme_options[blog_title]', array(
        'label'    => esc_html__( 'Blog Title', 'zeedynamic' ),
        'section'  => 'zeedynamic_section_general',
        'settings' => 'zeedynamic_theme_options[blog_title]',
        'type'     => 'text',
		'priority' => 1
		)
	);

	
}
add_action( 'customize_register', 'zeedynamic_customize_register_general_settings' );