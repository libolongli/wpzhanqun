<?php
/**
 * Numinous functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Numinous
 */

//define theme version
if ( !defined( 'NUMINOUS_THEME_VERSION' ) ) {
	$theme_data = wp_get_theme();
	
	define ( 'NUMINOUS_THEME_VERSION', $theme_data->get( 'Version' ) );
}

/**
 * Implement the Custom functions.
 */
require get_template_directory() . '/inc/custom-functions.php';

/**
 * Implement the WP hooks.
 */
require get_template_directory() . '/inc/wp-hooks.php';

/**
 * Custom template functions for this theme.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Implement the template hooks.
 */
require get_template_directory() . '/inc/template-hooks.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/widgets/widgets.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Metabox for Sidebar Layoute
*/
require get_template_directory() . '/inc/metabox.php';

/**
 * Woocommerce Functions
*/
if( numinous_is_woocommerce_activated() ) 
require get_template_directory() . '/inc/woocommerce-functions.php';
/**
* Recommended Plugins
*/
require_once get_template_directory() . '/inc/tgmpa/recommended-plugins.php';
