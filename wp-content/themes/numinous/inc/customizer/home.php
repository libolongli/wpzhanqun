<?php
/**
 * Home Options
 *
 * @package Numinous
 */
 
function numinous_customize_register_home( $wp_customize ) {
    
    /* Option list of all post */	
    $options_posts = array();
    $options_posts_obj = get_posts( 'posts_per_page=-1' );
    $options_posts[''] = __( 'Choose Post', 'numinous' );
    foreach ( $options_posts_obj as $posts ) {
    	$options_posts[$posts->ID] = $posts->post_title;
    }
    
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
    
    /** Home Page Settings */
    $wp_customize->add_panel( 
        'numinous_home_page_settings',
         array(
            'priority' => 30,
            'capability' => 'edit_theme_options',
            'title' => __( 'Home Page Settings', 'numinous' ),
            'description' => __( 'Customize Home Page Settings', 'numinous' ),
            'active_callback' => 'numinous_pro_is_home_template',
        ) 
    ); 
    
    /** Featured Post Section */
    $wp_customize->add_section(
        'numinous_featured_post_settings',
        array(
            'title' => __( 'Featured Post Section', 'numinous' ),
            'priority' => 10,
            'panel' => 'numinous_home_page_settings',
        )
    );   
    
    /** Enable/Disable Featured Post Section in Home Page */
    $wp_customize->add_setting(
        'numinous_ed_featured_post_section_home',
        array(
            'default' => '',
            'sanitize_callback' => 'numinous_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'numinous_ed_featured_post_section_home',
        array(
            'label' => __( 'Enable Featured Post Section in Home Page', 'numinous' ),
            'section' => 'numinous_featured_post_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Enable/Disable Featured Post Section in Archive Page */
    $wp_customize->add_setting(
        'numinous_ed_featured_post_section_archive',
        array(
            'default' => '',
            'sanitize_callback' => 'numinous_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'numinous_ed_featured_post_section_archive',
        array(
            'label' => __( 'Enable Featured Post Section in Archive Page', 'numinous' ),
            'section' => 'numinous_featured_post_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Featured Post One */
    $wp_customize->add_setting(
        'numinous_featured_post_one',
        array(
            'default' => '',
            'sanitize_callback' => 'numinous_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'numinous_featured_post_one',
        array(
            'label' => __( 'Select Post One', 'numinous' ),
            'section' => 'numinous_featured_post_settings',
            'type' => 'select',
            'choices' => $options_posts,
        )
    );
    
    /** Featured Post Two */
    $wp_customize->add_setting(
        'numinous_featured_post_two',
        array(
            'default' => '',
            'sanitize_callback' => 'numinous_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'numinous_featured_post_two',
        array(
            'label' => __( 'Select Post Two', 'numinous' ),
            'section' => 'numinous_featured_post_settings',
            'type' => 'select',
            'choices' => $options_posts,
        )
    );
    
    /** Featured Post Three */
    $wp_customize->add_setting(
        'numinous_featured_post_three',
        array(
            'default' => '',
            'sanitize_callback' => 'numinous_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'numinous_featured_post_three',
        array(
            'label' => __( 'Select Post Three', 'numinous' ),
            'section' => 'numinous_featured_post_settings',
            'type' => 'select',
            'choices' => $options_posts,
        )
    );
    
    /** Featured Post Four */
    $wp_customize->add_setting(
        'numinous_featured_post_four',
        array(
            'default' => '',
            'sanitize_callback' => 'numinous_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'numinous_featured_post_four',
        array(
            'label' => __( 'Select Post Four', 'numinous' ),
            'section' => 'numinous_featured_post_settings',
            'type' => 'select',
            'choices' => $options_posts,
        )
    );
    
    /** Featured Post Five */
    $wp_customize->add_setting(
        'numinous_featured_post_five',
        array(
            'default' => '',
            'sanitize_callback' => 'numinous_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'numinous_featured_post_five',
        array(
            'label' => __( 'Select Post Five', 'numinous' ),
            'section' => 'numinous_featured_post_settings',
            'type' => 'select',
            'choices' => $options_posts,
        )
    );
    
    /** Top News Section */
    $wp_customize->add_section(
        'numinous_top_news_settings',
        array(
            'title' => __( 'Top News Section', 'numinous' ),
            'priority' => 20,
            'panel' => 'numinous_home_page_settings',
        )
    ); 
    
    /** Enable/Disable Top News Section */
    $wp_customize->add_setting(
        'numinous_ed_top_news_section',
        array(
            'default' => '',
            'sanitize_callback' => 'numinous_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'numinous_ed_top_news_section',
        array(
            'label' => __( 'Enable Top News Section', 'numinous' ),
            'section' => 'numinous_top_news_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Top News Label */
    $wp_customize->add_setting(
        'numinous_top_news_label',
        array(
            'default' => __( 'Top News', 'numinous' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'numinous_top_news_label',
        array(
            'label' => __( 'Top News Label', 'numinous' ),
            'section' => 'numinous_top_news_settings',
            'type' => 'text',
        )
    );
    
    /** Top News One */
    $wp_customize->add_setting(
        'numinous_top_news_one',
        array(
            'default' => '',
            'sanitize_callback' => 'numinous_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'numinous_top_news_one',
        array(
            'label' => __( 'Select Post One', 'numinous' ),
            'section' => 'numinous_top_news_settings',
            'type' => 'select',
            'choices' => $options_posts,
        )
    );
    
    /** Top News Two */
    $wp_customize->add_setting(
        'numinous_top_news_two',
        array(
            'default' => '',
            'sanitize_callback' => 'numinous_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'numinous_top_news_two',
        array(
            'label' => __( 'Select Post Two', 'numinous' ),
            'section' => 'numinous_top_news_settings',
            'type' => 'select',
            'choices' => $options_posts,
        )
    );
    
    /** Top News Three */
    $wp_customize->add_setting(
        'numinous_top_news_three',
        array(
            'default' => '',
            'sanitize_callback' => 'numinous_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'numinous_top_news_three',
        array(
            'label' => __( 'Select Post Three', 'numinous' ),
            'section' => 'numinous_top_news_settings',
            'type' => 'select',
            'choices' => $options_posts,
        )
    );
    
    /** Top News Four */
    $wp_customize->add_setting(
        'numinous_top_news_four',
        array(
            'default' => '',
            'sanitize_callback' => 'numinous_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'numinous_top_news_four',
        array(
            'label' => __( 'Select Post Four', 'numinous' ),
            'section' => 'numinous_top_news_settings',
            'type' => 'select',
            'choices' => $options_posts,
        )
    );
        
    /** Category Section */
    $wp_customize->add_section(
        'numinous_category_settings',
        array(
            'title' => __( 'Category Section', 'numinous' ),
            'priority' => 30,
            'panel' => 'numinous_home_page_settings',
        )
    );
    
    /** Select Category One */
    $wp_customize->add_setting(
        'numinous_category_one',
        array(
            'default'           => '',
            'sanitize_callback' => 'numinous_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'numinous_category_one',
        array(
            'label'   => __( 'Select Category One', 'numinous' ),
            'section' => 'numinous_category_settings',
            'type'    => 'select',
            'choices' => $option_categories,
        )
    );
    
    /** Select Category Two */
    $wp_customize->add_setting(
        'numinous_category_two',
        array(
            'default'           => '',
            'sanitize_callback' => 'numinous_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'numinous_category_two',
        array(
            'label'   => __( 'Select Category Two', 'numinous' ),
            'section' => 'numinous_category_settings',
            'type'    => 'select',
            'choices' => $option_categories,
        )
    );
    
    /** Select Category Three */
    $wp_customize->add_setting(
        'numinous_category_three',
        array(
            'default'           => '',
            'sanitize_callback' => 'numinous_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'numinous_category_three',
        array(
            'label'   => __( 'Select Category Three', 'numinous' ),
            'section' => 'numinous_category_settings',
            'type'    => 'select',
            'choices' => $option_categories,
        )
    );
    
    /** Select Category Four */
    $wp_customize->add_setting(
        'numinous_category_four',
        array(
            'default'           => '',
            'sanitize_callback' => 'numinous_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'numinous_category_four',
        array(
            'label'   => __( 'Select Category Four', 'numinous' ),
            'section' => 'numinous_category_settings',
            'type'    => 'select',
            'choices' => $option_categories,
        )
    );
    
    /** Select Category Five */
    $wp_customize->add_setting(
        'numinous_category_five',
        array(
            'default'           => '',
            'sanitize_callback' => 'numinous_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'numinous_category_five',
        array(
            'label'   => __( 'Select Category Five', 'numinous' ),
            'section' => 'numinous_category_settings',
            'type'    => 'select',
            'choices' => $option_categories,
        )
    );
    
}
add_action( 'customize_register', 'numinous_customize_register_home' );