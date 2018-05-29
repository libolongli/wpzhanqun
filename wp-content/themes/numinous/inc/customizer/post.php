<?php
/**
 * Post Options
 *
 * @package Numinous
 */
 
function numinous_customize_register_post( $wp_customize ) {
    
    /** Post Settings */
    $wp_customize->add_section(
        'numinous_post_settings',
        array(
            'title' => __( 'Post Settings', 'numinous' ),
            'priority' => 41,
            'capability' => 'edit_theme_options',
        )
    );
    
    /** Related Post Taxonomy */    
    $wp_customize->add_setting(
        'numinous_related_taxonomy',
        array(
            'default' => 'cat',
            'sanitize_callback' => 'numinous_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'numinous_related_taxonomy',
        array(
            'label' => __( 'Related Post Taxonomy', 'numinous' ),
            'section' => 'numinous_post_settings',
            'type' => 'select',
            'choices' => array(
                'cat' => __( 'Category', 'numinous' ),
                'tag' => __( 'Tag', 'numinous' ),
            )
        )
    );
    
    /** Read More Text */
    $wp_customize->add_setting(
        'numinous_readmore_text',
        array(
            'default' => __( 'Read More', 'numinous' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'numinous_readmore_text',
        array(
            'label' => __( 'Read More Text', 'numinous' ),
            'section' => 'numinous_post_settings',
            'type' => 'text',
        )
    );
    
    /** Post Excerpt Character */
    $wp_customize->add_setting(
        'numinous_excerpt_char',
        array(
            'default' => 20,
            'sanitize_callback' => 'numinous_sanitize_number_absint',
        )
    );
    
    $wp_customize->add_control(
        'numinous_excerpt_char',
        array(
            'label' => __( 'Post Excerpt Character', 'numinous' ),
            'section' => 'numinous_post_settings',
            'type' => 'number',
        )
    );
    /** Post Settings Ends */
    
 }
 add_action( 'customize_register', 'numinous_customize_register_post' );