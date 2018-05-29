<?php
/**
 * Numinous Widgets
 *
 * @package Numinous
 */
 

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function numinous_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'numinous' ),
		'id'            => 'right-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'numinous' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Footer One', 'numinous' ),
		'id'            => 'footer-one',
		'description'   => esc_html__( 'Add footer one widget here.', 'numinous' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Footer Two', 'numinous' ),
		'id'            => 'footer-two',
		'description'   => esc_html__( 'Add footer two widget here.', 'numinous' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Footer Three', 'numinous' ),
		'id'            => 'footer-three',
		'description'   => esc_html__( 'Add footer three widget here.', 'numinous' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'numinous_widgets_init' );

/**
 * Recent Post Widget
*/
require get_template_directory() . '/inc/widgets/widget-recent-post.php';

/**
 * Popular Post Widget
*/
require get_template_directory() . '/inc/widgets/widget-popular-post.php';

/**
 * Social Link Widget
*/
require get_template_directory() . '/inc/widgets/widget-social-links.php';