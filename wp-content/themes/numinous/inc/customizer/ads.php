<?php
/**
 * Ad Options
 *
 * @package Numinous
 */
 
 function numinous_customize_register_ad( $wp_customize ) {
    
    /** AD Settings */
    $wp_customize->add_section(
        'numinous_ad_settings',
        array(
            'title'       => __( 'AD Settings', 'numinous' ),
            'description' => __( 'Header & Footer AD Settings', 'numinous' ),
            'priority'    => 50,
            'capability'  => 'edit_theme_options',
        )
    );
    
    /** Enable/Disable Header AD */
    $wp_customize->add_setting(
        'numinous_ed_header_ad',
        array(
            'default'           => '',
            'sanitize_callback' => 'numinous_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'numinous_ed_header_ad',
        array(
            'label'   => __( 'Enable Header AD', 'numinous' ),
            'section' => 'numinous_ad_settings',
            'type'    => 'checkbox',
        )
    );
    
    /** Enable/Disable Footer AD */
    $wp_customize->add_setting(
        'numinous_ed_footer_ad',
        array(
            'default'           => '',
            'sanitize_callback' => 'numinous_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'numinous_ed_footer_ad',
        array(
            'label'   => __( 'Enable Footer AD', 'numinous' ),
            'section' => 'numinous_ad_settings',
            'type'    => 'checkbox',
        )
    );
    
    /** Open Link in Different Tab */
    $wp_customize->add_setting(
        'numinous_open_link_diff_tab',
        array(
            'default'           => '1',
            'sanitize_callback' => 'numinous_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'numinous_open_link_diff_tab',
        array(
            'label'   => __( 'Open Link in Different Tab', 'numinous' ),
            'section' => 'numinous_ad_settings',
            'type'    => 'checkbox',
        )
    );
    
    /** Header AD */
    $wp_customize->add_setting(
        'numinous_header_ad',
        array(
            'default'           => '',
            'sanitize_callback' => 'numinous_sanitize_number_absint',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Cropped_Image_Control(
           $wp_customize,
           'numinous_header_ad',
           array(
               'label'   => __( 'Upload Header AD', 'numinous' ),
               'section' => 'numinous_ad_settings',
               'width'   => 728,
               'height'  => 90,
           )
       )
    );
    
    /** Header AD Link */
    $wp_customize->add_setting(
        'numinous_header_ad_link',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'numinous_header_ad_link',
        array(
            'label' => __( 'Header AD Link', 'numinous' ),
            'section' => 'numinous_ad_settings',
            'type' => 'text',
        )
    );
    
    /** Footer AD */
    $wp_customize->add_setting(
        'numinous_footer_ad',
        array(
            'default'           => '',
            'sanitize_callback' => 'numinous_sanitize_number_absint',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Cropped_Image_Control(
           $wp_customize,
           'numinous_footer_ad',
           array(
               'label'   => __( 'Upload Footer AD', 'numinous' ),
               'section' => 'numinous_ad_settings',
               'width'   => 728,
               'height'  => 90,
           )
       )
    );
    
    /** Footer AD Link */
    $wp_customize->add_setting(
        'numinous_footer_ad_link',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'numinous_footer_ad_link',
        array(
            'label' => __( 'Footer AD Link', 'numinous' ),
            'section' => 'numinous_ad_settings',
            'type' => 'text',
        )
    );
    
 }
 add_action( 'customize_register', 'numinous_customize_register_ad' );