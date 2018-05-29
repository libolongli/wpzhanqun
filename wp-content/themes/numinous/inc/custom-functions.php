<?php
/**
 * Numinous Custom Functions
 *
 * @package Numinous
 */

if ( ! function_exists( 'numinous_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function numinous_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Numinous, use a find and replace
	 * to change 'numinous' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'numinous', get_template_directory() . '/languages' );

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
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'numinous' ),
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
    
    /*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'link',
        'image',
		'quote',
        'video'
	) );
    
	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'numinous_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
    
    /** Custom Image Sizes */
    add_image_size( 'numinous-recent-post', 81, 76, true);
    add_image_size( 'numinous-slider', 480, 363, true);
    add_image_size( 'numinous-without-sidebar', 1170, 410, true);
    add_image_size( 'numinous-with-sidebar', 750, 410, true);
    add_image_size( 'numinous-featured-big', 960, 539, true);
    add_image_size( 'numinous-featured-img', 480, 270,true);
    add_image_size( 'numinous-top-news', 555, 494,true);
    add_image_size( 'numinous-more-news', 265, 186,true);
    add_image_size( 'numinous-single-col', 360, 197,true);
    add_image_size( 'numinous-most-viewed', 292, 160,true);
    add_image_size( 'numinous-related-post', 235, 129,true);
    
    /** Custom Logo */
    add_theme_support( 'custom-logo', array(    	
    	'header-text' => array( 'site-title', 'site-description' ),
    ) );
    
}
endif;

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function numinous_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'numinous_content_width', 750 );
}

/**
* Adjust content_width value according to template.
*
* @return void
*/
function numinous_template_redirect_content_width() {

	// Full Width in the absence of sidebar.
	if( is_page() ){
	   $sidebar_layout = numinous_sidebar_layout();
       if( ( $sidebar_layout == 'no-sidebar' ) || ! ( is_active_sidebar( 'right-sidebar' ) ) ) $GLOBALS['content_width'] = 1170;
        
	}elseif ( ! ( is_active_sidebar( 'right-sidebar' ) ) ) {
		$GLOBALS['content_width'] = 1170;
	}

}

/**
 * Enqueue scripts and styles.
 */
function numinous_scripts() {
    
    $query_args = array(
		'family' => 'Roboto:400,700',
		);
    wp_enqueue_style( 'numinous-google-fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ) );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri(). '/css/font-awesome.css' );
    wp_enqueue_style( 'lightslider', get_template_directory_uri(). '/css/lightslider.css'  );
    wp_enqueue_style( 'jquery-sidr-light', get_template_directory_uri(). '/css/jquery.sidr.light.css' );
    wp_enqueue_style( 'ticker-style', get_template_directory_uri(). '/css/ticker-style.css' );    
	wp_enqueue_style( 'numinous-style', get_stylesheet_uri(), array(), NUMINOUS_THEME_VERSION );
    
    if( numinous_is_woocommerce_activated() ) 
    wp_enqueue_style( 'numinous-woocommerce-style', get_template_directory_uri(). '/css/woocommerce.css', array(), NUMINOUS_THEME_VERSION );
    
    wp_enqueue_script( 'lightslider', get_template_directory_uri() . '/js/lightslider.js', array('jquery'), NUMINOUS_THEME_VERSION, true );
    wp_enqueue_script( 'jquery-sidr', get_template_directory_uri() . '/js/jquery.sidr.js', array('jquery'), NUMINOUS_THEME_VERSION, true );
    wp_enqueue_script( 'jquery-ticker', get_template_directory_uri() . '/js/jquery.ticker.js', array('jquery'), NUMINOUS_THEME_VERSION, true );
    wp_enqueue_script( 'numinous-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), NUMINOUS_THEME_VERSION, true );
    
	$slider_auto    = get_theme_mod( 'numinous_slider_auto' );
    $slider_loop    = get_theme_mod( 'numinous_slider_loop' );
    $slider_control = get_theme_mod( 'numinous_slider_control', '1' );
    
    $array = array(
		'auto'    => esc_attr( $slider_auto ),
		'loop'    => esc_attr( $slider_loop ),
        'control' => esc_attr( $slider_control ),
        'rtl'     => is_rtl(),     
		);
    wp_localize_script( 'numinous-custom', 'numinous_data', $array );
    
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

/**
 * Flush out the transients used in numinous_categorized_blog.
 */
function numinous_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'numinous_categories' );
}

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function numinous_body_classes( $classes ) {
	
    global $post;
    
    // Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
    
    // Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}
    
    // Adds a class of custom-background-color to sites with a custom background color.
    if ( get_background_color() != 'ffffff' ) {
		$classes[] = 'custom-background-color';
	}
    
    if( !( is_active_sidebar( 'right-sidebar' ) ) ) {
        $classes[] = 'full-width'; 
    }
    
    if( is_page() ){
        $sidebar_layout = numinous_sidebar_layout();
        if( $sidebar_layout == 'no-sidebar' )
        $classes[] = 'full-width';
    }
    
    if( numinous_is_woocommerce_activated() && ( is_shop() || is_product_category() || is_product_tag() || 'product' === get_post_type() ) && ! is_active_sidebar( 'shop-sidebar' ) ){
        $classes[] = 'full-width';
    }
    
	return $classes;
}

if ( ! function_exists( 'numinous_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... * 
 */
function numinous_excerpt_more() {
	return ' &hellip; ';
}
endif;

if ( ! function_exists( 'numinous_excerpt_length' ) ) :
/**
 * Changes the default 55 character in excerpt 
*/
function numinous_excerpt_length( $length ) {
	return get_theme_mod( 'numinous_excerpt_char', 20 );
}
endif;

if( ! function_exists( 'numinous_change_comment_form_default_fields' ) ) :
/**
 * Change Comment form default fields i.e. author, email & url.
 * https://blog.josemcastaneda.com/2016/08/08/copy-paste-hurting-theme/
*/
function numinous_change_comment_form_default_fields( $fields ){
    
    // get the current commenter if available
    $commenter = wp_get_current_commenter();
 
    // core functionality
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );    
 
    // Change just the author field
    $fields['author'] = '<p class="comment-form-author"><input id="author" name="author" placeholder="' . esc_attr__( 'Name*', 'numinous' ) . '" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>';
    
    $fields['email'] = '<p class="comment-form-email"><input id="email" name="email" placeholder="' . esc_attr__( 'Email*', 'numinous' ) . '" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>';
    
    $fields['url'] = '<p class="comment-form-url"><input id="url" name="url" placeholder="' . esc_attr__( 'Website', 'numinous' ) . '" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>'; 
    
    return $fields;
    
}
endif;

if( ! function_exists( 'numinous_change_comment_form_defaults' ) ) :
/**
 * Change Comment Form defaults
 * https://blog.josemcastaneda.com/2016/08/08/copy-paste-hurting-theme/
*/
function numinous_change_comment_form_defaults( $defaults ){
    
    // Change the "cancel" to "I would rather not comment" and use a span instead
    $defaults['comment_field'] = '<p class="comment-form-comment"><label for="comment"></label><textarea id="comment" name="comment" placeholder="' . esc_attr__( 'Comment', 'numinous' ) . '" cols="45" rows="8" aria-required="true"></textarea></p>';
    
    $defaults['label_submit'] = esc_attr__( 'Submit', 'numinous' );
    
    return $defaults;
    
}
endif;

if( ! function_exists( 'numinous_exclude_posts' ) ) :
/**
 * Function to exclude sticky post from main query
*/
function numinous_exclude_posts( $query ){
    
    $cat = get_theme_mod( 'numinous_breaking_news_cat' );
    
    if ( ! is_admin() && $query->is_home() && $query->is_main_query() && $cat ) {
        $query->set( 'category__not_in', $cat );
    }    
}
endif;