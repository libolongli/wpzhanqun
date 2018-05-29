<?php
/**
 * Numinous Theme Customizer.
 *
 * @package Numinous
 */
function numinous_modify_sections( $wp_customize ){
	if ( version_compare( get_bloginfo('version'),'4.9', '>=') ) {
        $wp_customize->get_section( 'static_front_page' )->title = __( 'Static Front Page', 'numinous' );
    }
}
add_action( 'customize_register', 'numinous_modify_sections' );


$numinous_settings = array( 'default', 'header', 'home', 'breadcrumb', 'slider', 'ads', 'social', 'catcolor', 'post', 'info', 'footer' );

foreach( $numinous_settings as $s ){
    require get_template_directory() . '/inc/customizer/' . $s . '.php';
}

function numinous_pro_is_home_template(){
    return ( is_page_template( 'template-home.php' ) || ( is_front_page() && ! is_home() ) ) ? true : false;
}

/**
 * Sanitization Functions
*/
require get_template_directory() . '/inc/customizer/sanitization-functions.php';

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function numinous_customize_preview_js() {
	wp_enqueue_script( 'numinous_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'numinous_customize_preview_js' );

/**
 * Enqueue Scripts for customize controls
*/
function numinous_customizer_scripts() {
	wp_enqueue_style( 'numinous-admin-style',get_template_directory_uri().'/inc/css/admin.css', '1.0', 'screen' );    
    wp_enqueue_script( 'numinous-admin-js', get_template_directory_uri().'/inc/js/admin.js', array( 'jquery' ), '', true );
}
add_action( 'customize_controls_enqueue_scripts', 'numinous_customizer_scripts' );