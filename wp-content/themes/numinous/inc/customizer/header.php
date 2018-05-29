<?php
/**
 * Header Options
 *
 * @package Numinous
 */
 
function numinous_customize_register_header( $wp_customize ) {
    
    /* Option list of all categories */
    $args = array(
	   'type'                     => 'post',
	   'orderby'                  => 'name',
	   'order'                    => 'ASC',
	   'hide_empty'               => 1,
	   'hierarchical'             => 1,
	   'taxonomy'                 => 'category'
    ); 
    $option_categories = array();
    $category_lists = get_categories( $args );
    $option_categories[''] = __( 'Choose Category', 'numinous' );
    foreach( $category_lists as $category ){
        $option_categories[$category->term_id] = $category->name;
    }
    
    /** Header Settings */
    $wp_customize->add_section(
        'numinous_header_settings',
        array(
            'title'      => __( 'Header Settings', 'numinous' ),
            'priority'   => 20,
            'capability' => 'edit_theme_options',
        )
    );
    
    /** Enable/Disable Search form */
    $wp_customize->add_setting(
        'numinous_ed_search_form',
        array(
            'default'           => '1',
            'sanitize_callback' => 'numinous_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'numinous_ed_search_form',
        array(
            'label'       => __( 'Enable Search Form', 'numinous' ),
            'description' => __( 'Check to enable search from in header.', 'numinous' ),
            'section'     => 'numinous_header_settings',
            'type'        => 'checkbox',
        )
    );
    
    /** Breaking News Label */
    $wp_customize->add_setting(
        'numinous_breaking_news_label',
        array(
            'default'           => __( 'Breaking News', 'numinous' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'numinous_breaking_news_label',
        array(
            'label'       => __( 'Breaking News Label', 'numinous' ),
            'description' => __( 'Leave blank to display Breaking News Category Name', 'numinous' ),
            'section'     => 'numinous_header_settings',
            'type'        => 'text',
        )
    );
    
    /** Select Category */
    $wp_customize->add_setting(
        'numinous_breaking_news_cat',
        array(
            'default'           => '',
            'sanitize_callback' => 'numinous_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'numinous_breaking_news_cat',
        array(
            'label'   => __( 'Breaking News Category', 'numinous' ),
            'section' => 'numinous_header_settings',
            'type'    => 'select',
            'choices' => $option_categories,
        )
    );
 }
 add_action( 'customize_register', 'numinous_customize_register_header' );