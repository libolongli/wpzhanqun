<?php 
/**
 * Footer Option.
 *
 * @package Numinous
 */
 
function numinous_customize_footer_settings( $wp_customize ) {

 /** Footer Section */
    $wp_customize->add_section(
        'numinous_footer_section',
        array(
            'title' => __( 'Footer Settings', 'numinous' ),
            'priority' => 90,
        )
    );
    
    /** Copyright Text */
    $wp_customize->add_setting(
        'numinous_footer_copyright_text',
        array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
        )
    );
    
    $wp_customize->add_control(
        'numinous_footer_copyright_text',
        array(
            'label' => __( 'Copyright Info', 'numinous' ),
            'section' => 'numinous_footer_section',
            'type' => 'textarea',
        )
    );

}

add_action( 'customize_register', 'numinous_customize_footer_settings' );
 