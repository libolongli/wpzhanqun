<?php
/**
 * Breadcrumb Options
 *
 * @package Numinous
 */
 
function numinous_customize_register_breadcrumb( $wp_customize ) {
    
    /** BreadCrumb Settings */
    $wp_customize->add_section(
        'numinous_breadcrumb_settings',
        array(
            'title' => __( 'Breadcrumb Settings', 'numinous' ),
            'priority' => 40,
            'capability' => 'edit_theme_options',
        )
    );
    
    /** Enable/Disable BreadCrumb */
    $wp_customize->add_setting(
        'numinous_ed_breadcrumb',
        array(
            'default' => '',
            'sanitize_callback' => 'numinous_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'numinous_ed_breadcrumb',
        array(
            'label' => __( 'Enable Breadcrumb', 'numinous' ),
            'section' => 'numinous_breadcrumb_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Show/Hide Current */
    $wp_customize->add_setting(
        'numinous_ed_current',
        array(
            'default' => '1',
            'sanitize_callback' => 'numinous_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'numinous_ed_current',
        array(
            'label' => __( 'Show current', 'numinous' ),
            'section' => 'numinous_breadcrumb_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Home Text */
    $wp_customize->add_setting(
        'numinous_breadcrumb_home_text',
        array(
            'default' => __( 'Home', 'numinous' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'numinous_breadcrumb_home_text',
        array(
            'label' => __( 'Breadcrumb Home Text', 'numinous' ),
            'section' => 'numinous_breadcrumb_settings',
            'type' => 'text',
        )
    );
    
    /** Breadcrumb Separator */
    $wp_customize->add_setting(
        'numinous_breadcrumb_separator',
        array(
            'default' => __( '>', 'numinous' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'numinous_breadcrumb_separator',
        array(
            'label' => __( 'Breadcrumb Separator', 'numinous' ),
            'section' => 'numinous_breadcrumb_settings',
            'type' => 'text',
        )
    );
    /** BreadCrumb Settings Ends */
    
 }
 add_action( 'customize_register', 'numinous_customize_register_breadcrumb' );