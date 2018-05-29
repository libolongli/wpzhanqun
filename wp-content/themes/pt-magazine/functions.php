<?php
/**
 * PT Magazine functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package PT_Magazine
 */

if ( ! function_exists( 'pt_magazine_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function pt_magazine_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on PT Magazine, use a find and replace
	 * to change 'pt-magazine' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'pt-magazine' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for custom logo.
	 */
	add_theme_support( 'custom-logo' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size('pt-magazine-slider', 687, 455, true);
	add_image_size('pt-magazine-full-slider', 1170, 600, true);
	add_image_size('pt-magazine-featured-full', 453, 213, true);
	add_image_size('pt-magazine-tall', 400, 245, true);
	add_image_size('pt-magazine-thumbnail', 105, 80, true);

	// Register navigation menu locations.
	register_nav_menus( array(
		'top-header'=> esc_html__( 'Top Header', 'pt-magazine' ),
		'primary' 	=> esc_html__( 'Primary Header', 'pt-magazine' ),
		'social'  	=> esc_html__( 'Social Links', 'pt-magazine' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'pt_magazine_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'pt_magazine_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pt_magazine_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'pt_magazine_content_width', 810 );
}
add_action( 'after_setup_theme', 'pt_magazine_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pt_magazine_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'pt-magazine' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to appear in Sidebar.', 'pt-magazine' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="section-title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Home Page Widget Area', 'pt-magazine' ),
		'id'            => 'home-page-widget-area',
		'description'   => esc_html__( 'Add widgets here to appear in Home Page Widget Area.', 'pt-magazine' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => sprintf( esc_html__( 'Footer %d', 'pt-magazine' ), 1 ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => sprintf( esc_html__( 'Footer %d', 'pt-magazine' ), 2 ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => sprintf( esc_html__( 'Footer %d', 'pt-magazine' ), 3 ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => sprintf( esc_html__( 'Footer %d', 'pt-magazine' ), 4 ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Header Advertisement', 'pt-magazine' ),
		'id'            => 'advertisement-1',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2 class="advertisement-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'pt_magazine_widgets_init' );

/**
* Enqueue scripts and styles.
*/
function pt_magazine_scripts() {

	wp_enqueue_style( 'pt-magazine-fonts', pt_magazine_fonts_url(), array(), null );

	wp_enqueue_style( 'jquery-meanmenu', get_template_directory_uri() . '/assets/third-party/meanmenu/meanmenu.css' );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/third-party/font-awesome/css/font-awesome.min.css', '', '4.7.0' );

	wp_enqueue_style( 'jquery-slick', get_template_directory_uri() . '/assets/third-party/slick/slick.css', '', '1.6.0' );

	wp_enqueue_style( 'pt-magazine-style', get_stylesheet_uri() );

	wp_enqueue_script( 'pt-magazine-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'pt-magazine-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'jquery-slick', get_template_directory_uri() . '/assets/third-party/slick/slick.js', array( 'jquery' ), '1.6.0', true );

	wp_enqueue_script( 'jquery-meanmenu', get_template_directory_uri() . '/assets/third-party/meanmenu/jquery.meanmenu.js', array('jquery'), '2.0.2', true );

	// Add script for sticky sidebar.
	$sticky_sidebar = pt_magazine_get_option( 'enable_sticky_sidebar' );

	if( 1 == $sticky_sidebar ){

		wp_enqueue_script( 'jquery-theia-sticky-sidebar', get_template_directory_uri() . '/assets/third-party/theia-sticky-sidebar/theia-sticky-sidebar.min.js', array('jquery'), '1.0.7', true );

	}

	wp_enqueue_script( 'pt-magazine-custom', get_template_directory_uri() . '/assets/js/custom.js', array( 'jquery' ), '1.0.5', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'pt_magazine_scripts' );

/**
* Enqueue scripts and styles for admin >> widget page only.
*/
function pt_magazine_admin_scripts( $hook ) {

	if( 'widgets.php' === $hook ){

		wp_enqueue_style( 'pt-magazine-admin', get_template_directory_uri() . '/includes/widgets/css/admin.css', array(), '1.0.5' );

		wp_enqueue_media();

		wp_enqueue_script( 'pt-magazine-admin', get_template_directory_uri() . '/includes/widgets/js/admin.js', array( 'jquery' ), '1.0.5' );

	}

}

add_action( 'admin_enqueue_scripts', 'pt_magazine_admin_scripts' );

// Load main file.
require_once trailingslashit( get_template_directory() ) . '/includes/main.php';