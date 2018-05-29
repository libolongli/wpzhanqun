<?php
/**
 * Social Options
 *
 * @package Numinous
 */
 
 function numinous_customize_register_social( $wp_customize ) {
    
    /** Social Settings */
    $wp_customize->add_section(
        'numinous_social_settings',
        array(
            'title' => __( 'Social Settings', 'numinous' ),
            'description' => __( 'Leave blank if you do not want to show the social link.', 'numinous' ),
            'priority' => 60,
            'capability' => 'edit_theme_options',
        )
    );
    
    /** Enable/Disable Social in Header */
    $wp_customize->add_setting(
        'numinous_ed_social',
        array(
            'default' => '',
            'sanitize_callback' => 'numinous_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'numinous_ed_social',
        array(
            'label' => __( 'Enable Social Links in Header', 'numinous' ),
            'section' => 'numinous_social_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Facebook */
    $wp_customize->add_setting(
        'numinous_facebook',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'numinous_facebook',
        array(
            'label' => __( 'Facebook', 'numinous' ),
            'section' => 'numinous_social_settings',
            'type' => 'text',
        )
    );
    
    
    /** Twitter */
    $wp_customize->add_setting(
        'numinous_twitter',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'numinous_twitter',
        array(
            'label' => __( 'Twitter', 'numinous' ),
            'section' => 'numinous_social_settings',
            'type' => 'text',
        )
    );
    
    /** Pinterest */
    $wp_customize->add_setting(
        'numinous_pinterest',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'numinous_pinterest',
        array(
            'label' => __( 'Pinterest', 'numinous' ),
            'section' => 'numinous_social_settings',
            'type' => 'text',
        )
    );
    
    /** LinkedIn */
    $wp_customize->add_setting(
        'numinous_linkedin',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'numinous_linkedin',
        array(
            'label' => __( 'LinkedIn', 'numinous' ),
            'section' => 'numinous_social_settings',
            'type' => 'text',
        )
    );
    
    /** Gooble Plus */
    $wp_customize->add_setting(
        'numinous_gplus',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'numinous_gplus',
        array(
            'label' => __( 'Google Plus', 'numinous' ),
            'section' => 'numinous_social_settings',
            'type' => 'text',
        )
    );
    
    /** Instagram */
    $wp_customize->add_setting(
        'numinous_instagram',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'numinous_instagram',
        array(
            'label' => __( 'Instagram', 'numinous' ),
            'section' => 'numinous_social_settings',
            'type' => 'text',
        )
    );
    
    /** YouTube */
    $wp_customize->add_setting(
        'numinous_youtube',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'numinous_youtube',
        array(
            'label' => __( 'YouTube', 'numinous' ),
            'section' => 'numinous_social_settings',
            'type' => 'text',
        )
    );
    
    /** OK */
    $wp_customize->add_setting(
        'numinous_odnoklassniki',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'numinous_odnoklassniki',
        array(
            'label' => __( 'OK', 'numinous' ),
            'section' => 'numinous_social_settings',
            'type' => 'text',
        )
    );
    
    /** VK */
    $wp_customize->add_setting(
        'numinous_vk',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'numinous_vk',
        array(
            'label' => __( 'VK', 'numinous' ),
            'section' => 'numinous_social_settings',
            'type' => 'text',
        )
    );
    
    /** Xing */
    $wp_customize->add_setting(
        'numinous_xing',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'numinous_xing',
        array(
            'label' => __( 'Xing', 'numinous' ),
            'section' => 'numinous_social_settings',
            'type' => 'text',
        )
    );
    /** Social Settings Ends */
    
 }
 add_action( 'customize_register', 'numinous_customize_register_social' );