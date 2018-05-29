<?php
/**
 * Slider Options
 *
 * @package Numinous
 */
 
 function numinous_customize_register_slider( $wp_customize ) {
    
    /* Option list of all post */	
    $options_posts = array();
    $options_posts_obj = get_posts( 'posts_per_page=-1' );
    $options_posts[''] = __( 'Choose Post', 'numinous' );
    foreach ( $options_posts_obj as $posts ) {
    	$options_posts[$posts->ID] = $posts->post_title;
    }
    
    /** Slider Settings */
    $wp_customize->add_section(
        'numinous_slider_settings',
        array(
            'title'       => __( 'Slider Settings', 'numinous' ),
            'priority'    => 80,
            'capability'  => 'edit_theme_options',
        )
    );
    
    /** Enable/Disable Slider */
    $wp_customize->add_setting(
        'numinous_ed_slider',
        array(
            'default' => '',
            'sanitize_callback' => 'numinous_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'numinous_ed_slider',
        array(
            'label' => __( 'Enable Footer Slider', 'numinous' ),
            'section' => 'numinous_slider_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Enable/Disable Slider Auto Transition */
    $wp_customize->add_setting(
        'numinous_slider_auto',
        array(
            'default' => '',
            'sanitize_callback' => 'numinous_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'numinous_slider_auto',
        array(
            'label' => __( 'Enable Slider Auto Transition', 'numinous' ),
            'section' => 'numinous_slider_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Enable/Disable Slider Loop */
    $wp_customize->add_setting(
        'numinous_slider_loop',
        array(
            'default' => '',
            'sanitize_callback' => 'numinous_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'numinous_slider_loop',
        array(
            'label' => __( 'Enable Slider Loop', 'numinous' ),
            'section' => 'numinous_slider_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Enable/Disable Slider Control */
    $wp_customize->add_setting(
        'numinous_slider_control',
        array(
            'default' => '1',
            'sanitize_callback' => 'numinous_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'numinous_slider_control',
        array(
            'label' => __( 'Enable Slider Control', 'numinous' ),
            'section' => 'numinous_slider_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Enable/Disable Slider Caption */
    $wp_customize->add_setting(
        'numinous_slider_caption',
        array(
            'default' => '1',
            'sanitize_callback' => 'numinous_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'numinous_slider_caption',
        array(
            'label' => __( 'Enable Slider Caption', 'numinous' ),
            'section' => 'numinous_slider_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Slider Post One */
    $wp_customize->add_setting(
        'numinous_slider_post_one',
        array(
            'default' => '',
            'sanitize_callback' => 'numinous_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'numinous_slider_post_one',
        array(
            'label' => __( 'Select Post One', 'numinous' ),
            'section' => 'numinous_slider_settings',
            'type' => 'select',
            'choices' => $options_posts,
        )
    );
    
    /** Slider Post Two */
    $wp_customize->add_setting(
        'numinous_slider_post_two',
        array(
            'default' => '',
            'sanitize_callback' => 'numinous_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'numinous_slider_post_two',
        array(
            'label' => __( 'Select Post Two', 'numinous' ),
            'section' => 'numinous_slider_settings',
            'type' => 'select',
            'choices' => $options_posts,
        )
    );
    
    /** Slider Post Three */
    $wp_customize->add_setting(
        'numinous_slider_post_three',
        array(
            'default' => '',
            'sanitize_callback' => 'numinous_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'numinous_slider_post_three',
        array(
            'label' => __( 'Select Post Three', 'numinous' ),
            'section' => 'numinous_slider_settings',
            'type' => 'select',
            'choices' => $options_posts,
        )
    );
    
    /** Slider Post Four */
    $wp_customize->add_setting(
        'numinous_slider_post_four',
        array(
            'default' => '',
            'sanitize_callback' => 'numinous_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'numinous_slider_post_four',
        array(
            'label' => __( 'Select Post Four', 'numinous' ),
            'section' => 'numinous_slider_settings',
            'type' => 'select',
            'choices' => $options_posts,
        )
    );
    
    /** Slider Post Five */
    $wp_customize->add_setting(
        'numinous_slider_post_five',
        array(
            'default' => '',
            'sanitize_callback' => 'numinous_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'numinous_slider_post_five',
        array(
            'label' => __( 'Select Post Five', 'numinous' ),
            'section' => 'numinous_slider_settings',
            'type' => 'select',
            'choices' => $options_posts,
        )
    );
    
    /** Slider Post Six */
    $wp_customize->add_setting(
        'numinous_slider_post_six',
        array(
            'default' => '',
            'sanitize_callback' => 'numinous_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'numinous_slider_post_six',
        array(
            'label' => __( 'Select Post Six', 'numinous' ),
            'section' => 'numinous_slider_settings',
            'type' => 'select',
            'choices' => $options_posts,
        )
    );
    
    /** Slider Post Seven */
    $wp_customize->add_setting(
        'numinous_slider_post_seven',
        array(
            'default' => '',
            'sanitize_callback' => 'numinous_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'numinous_slider_post_seven',
        array(
            'label' => __( 'Select Post Seven', 'numinous' ),
            'section' => 'numinous_slider_settings',
            'type' => 'select',
            'choices' => $options_posts,
        )
    );
    /** Slider Settings Ends */
    
 }
 add_action( 'customize_register', 'numinous_customize_register_slider' );