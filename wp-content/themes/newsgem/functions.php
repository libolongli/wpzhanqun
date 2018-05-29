<?php
function newsgem_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'newsgem_content_width', 1170 );
}
add_action( 'after_setup_theme', 'newsgem_content_width', 0 );
if ( ! function_exists( 'newsgem_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function newsgem_setup() {
		add_theme_support( 'automatic-feed-links' );
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
     	add_theme_support( 'post-thumbnails' );
		register_nav_menus( array(
			'primary'      => esc_html__( 'Primary Menu', 'newsgem' ),
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
		 * WooCommerce support.
		 */
		add_editor_style( array( 'css/editor-style.css', newsgem_fonts_url() ) );
		add_theme_support( 'woocommerce' );
		add_theme_support('newsgem-scripts',array('comment-reply' ));

        /**
         * Add theme Support custom logo
         * @since WP 4.5
         * @sin 1.2.1
         */
        add_theme_support( 'custom-logo', array(
            'height'      => 200,
            'width'       => 500,
            'flex-height' => true,
            'flex-width'  => true,
            //'header-text' => array( 'site-title',  'site-description' ), //
        ) );
		// Set up the WordPress core custom background feature.
	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'newsgem_custom_background_args', array(
		'default-color' => '',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'newsgem_setup' );
function newsgem_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'newsgem_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => 'c50404',
		'height' => 250,
	    'width' => 1060,
		'flex-height'            => true,
		'wp-head-callback'       => 'newsgem_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'newsgem_custom_header_setup' );
function newsgem_header_style() {?>
<?php 
$background_color = get_background_color();?>
<style type="text/css">
<?php if ($background_color=='') : ?>
body{background-color:#fff;}
<?php else : ?>
body{background-color:#<?php echo esc_html($background_color); ?>;}
<?php endif; ?>
</style>
<?php $get_header_image=get_header_image();?>
<?php if(!empty($get_header_image)){?>
<style type="text/css">
.main-bar{ background:url(<?php echo esc_url($get_header_image);?>);background-repeat: no-repeat !important;background-size: cover !important;}
</style>
<?php }else{?>
<style type="text/css">
.header{ background:#fff;}
</style>
<?php }?>
<?php $get_header_textcolor=get_header_textcolor();
if(isset($get_header_textcolor)&&$get_header_textcolor!==''){?>
<style type="text/css">
.logo-title{color:#<?php echo esc_html($get_header_textcolor); ?>}
</style>
<?php }?>
<?php $header_taglinecolor=get_option('header_taglinecolor');?>
<?php if(isset($header_taglinecolor)&&$header_taglinecolor!==''){?>
<style type="text/css">
.img-logo p{color:<?php echo esc_html($header_taglinecolor); ?>}
</style>
<?php }} 

/**
* Enqueue scripts and styles.  
*/
/*
Add google fonts
*/

if ( ! function_exists( 'newsgem_fonts_url' ) ) :
	/**
	 * Register default Google fonts
	 */
	function newsgem_fonts_url() {
	    $fonts_url = '';

	 	/* Translators: If there are characters in your language that are not
	    * supported by Open Sans, translate this to 'off'. Do not translate
	    * into your own language.
	    */
	    $open_sans = _x( 'on', 'Open Sans font: on or off', 'newsgem' );

	    /* Translators: If there are characters in your language that are not
	    * supported by Raleway, translate this to 'off'. Do not translate
	    * into your own language.
	    */
	         $raleway = _x( 'on', 'Raleway font: on or off', 'newsgem' );
		 $loto = _x( 'on', 'Lato font: on or off', 'newsgem' );
		 $Oswald= _x( 'on', 'Oswald font: on or off', 'newsgem' );

	    if ( 'off' !== $raleway || 'off' !== $open_sans || 'off' !== $loto || 'off' !== $Oswald) {
	        $font_families = array();

	        if ( 'off' !== $raleway ) {
	            $font_families[] = 'Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
	        }

	        if ( 'off' !== $open_sans ) {
	            $font_families[] = 'Open Sans:400,300,300italic,400italic,600,600italic,700,700italic';
	        }
			 if ( 'off' !== $loto ) {
	            $font_families[] = 'Loto:400,300,300italic,400italic,900,900italic,700,700italic';
	        }
	        if ( 'off' !== $Oswald) {
	            $font_families[] = 'Oswald:200,200i,300,300i,400,400i,500.500i,700,700i';
	        }

	        $query_args = array(
	            'family' => urlencode( implode( '|', $font_families ) ),
	            'subset' => urlencode( 'latin,latin-ext' ),
	        );

	        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	    }

	    return esc_url_raw( $fonts_url );
	}
endif;
function newsgem_scripts() {
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'),'',true); 	
	wp_enqueue_script('jquery_wow', get_template_directory_uri() . '/js/wow.js', array('jquery'),'',true);
	wp_enqueue_script('vTicker_js', get_template_directory_uri() . '/js/vTicker.js', array('jquery'),'',true);
	wp_enqueue_script('owl_carousel', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'),'',true);
	wp_enqueue_script('jquery_custom', get_template_directory_uri() . '/js/custom.js', array('jquery'),'',true);
	wp_enqueue_script('comment-reply');
	wp_enqueue_style( 'newsgem-fonts', newsgem_fonts_url());
	wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/bootstrap.css');
	wp_enqueue_style('newsgem-style', get_stylesheet_uri());
	wp_enqueue_style('newsgem-responsive', get_template_directory_uri().'/css/responsive.css');
	wp_enqueue_style('owl_carousel', get_template_directory_uri().'/css/owl.carousel.css');
	wp_enqueue_style('animate', get_template_directory_uri().'/css/animate.css');
	wp_enqueue_style('font-awesome', get_template_directory_uri().'/css/font-awesome.css', array(), '', 'all' );	
}
add_action('wp_enqueue_scripts', 'newsgem_scripts');
require get_template_directory() . '/admin/newsgem-comments.php';
require get_template_directory() . '/admin/newsgempro/class-customize.php';
require get_template_directory() . '/admin/template-tags.php';
require get_template_directory() . '/admin/customizer.php';
/*************************************/
/*   REGISTR SIDBARS [WIDGET AREA]   */
/*************************************/

function newsgem_widgets_init()
{

  // Area 1, located at the top of the sidebar.

  register_sidebar(array(
      'name' => __('Sidebar Widget Area', "newsgem"),
      'id' => 'sidebar-1',
      'description' => esc_html__('The sidebar widget area', "newsgem"),
      'before_widget' => '<div class="widget wow fadeInUp">',
      'after_widget' => '</div> ',
      'before_title' => '<h6 class="widget-title">',
      'after_title' => '</h6>',
    )
  );

  // Area 2, located below the Primary Widget Area in the sidebar. Empty by default.

  register_sidebar(array(
      'name' => __('Footer Widget Area', "newsgem"),
      'id' => 'footer-widgets',
      'description' => esc_html__('The footer widget area', "newsgem"),
      'before_widget' => '<div class="col-md-3 col-sm-4 col-xs-12 widget_container"><div class="footer-widget"><div class="widget_text">',
      'after_widget' => '</div></div></div>',
      'before_title' => '<h6 class="footer-widget-title">',
      'after_title' => '</h6>',
    )
  );
  //header ads
   register_sidebar(array(
      'name' => __('Header Ads Widget Area', "newsgem"),
      'id' => 'sidebar-3',
      'description' => esc_html__('The header ads widget area', "newsgem"),
      'before_widget' => '<div class="col-md-8 col-sm-7 col-xs-12"><div class="add">',
      'after_widget' => '</div></div>',
      'before_title' => '',
      'after_title' => '',
    )
  );
   //header ads
   register_sidebar(array(
      'name' => __('Home Page ads widget', "newsgem"),
      'id' => 'sidebar-4',
      'description' => esc_html__('Home Page ads widget area', "newsgem"),
      'before_widget' => '<div class="center-add add wow fadeInUp">',
      'after_widget' => '</div>',
      'before_title' => '',
      'after_title' => '',
    )
  );
}
add_action( 'widgets_init', 'newsgem_widgets_init' );
/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function newsgem_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'newsgem_pingback_header' );
?>