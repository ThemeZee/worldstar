<?php
/**
 * Pro Version Upgrade Section
 *
 * Registers Upgrade Section for the Pro Version of the theme
 *
 * @package zeeDynamic
 */


/**
 * Adds pro version description and CTA button
 *
 * @param object $wp_customize / Customizer Object
 */
function zeedynamic_customize_register_upgrade_settings( $wp_customize ) {

	// Add Upgrade / More Features Section
	$wp_customize->add_section( 'zeedynamic_section_upgrade', array(
        'title'    => esc_html__( 'More Features', 'zeedynamic' ),
        'priority' => 70,
		'panel' => 'zeedynamic_options_panel' 
		)
	);
	
	// Add custom Upgrade Content control
	$wp_customize->add_setting( 'zeedynamic_theme_options[upgrade]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control( new zeeDynamic_Customize_Upgrade_Control(
        $wp_customize, 'zeedynamic_theme_options[upgrade]', array(
            'section' => 'zeedynamic_section_upgrade',
            'settings' => 'zeedynamic_theme_options[upgrade]',
            'priority' => 1
            )
        )
    );

}
add_action( 'customize_register', 'zeedynamic_customize_register_upgrade_settings' );