<?php
/**
 * Custom Options
 *
 * @package Numinous
 */
 
function numinous_customize_register_catcolor( $wp_customize ) {
    
    /** Category Color Settings */
    $wp_customize->add_section(
        'numinous_cat_color_settings',
        array(
            'title'       => __( 'Category Color Settings', 'numinous' ),
            'description' => __( 'Choose color for specific category.', 'numinous' ),
            'priority'    => 70,
            'capability'  => 'edit_theme_options',
        )
    );
    
    $args = array(
	   'type'                     => 'post',
	   'orderby'                  => 'name',
	   'hide_empty'               => 0,
	   'taxonomy'                 => 'category'
    ); 
    
    $category_lists = get_categories( $args );
    
    foreach( $category_lists as $category ){
        
        $wp_customize->add_setting( 'numinous_category_color_' . $category->term_id, 
            array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_hex_color'
            )
        );

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'numinous_category_color_' . $category->term_id, 
            array(
                'label'    => sprintf( '%s', $category->name ),
                'section'  => 'numinous_cat_color_settings',
                'settings' => 'numinous_category_color_' . $category->term_id,
            )
        ));
    }
    
}
add_action( 'customize_register', 'numinous_customize_register_catcolor' );