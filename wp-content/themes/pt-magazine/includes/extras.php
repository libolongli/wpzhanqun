<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package PT_Magazine
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function pt_magazine_body_classes( $classes ) {

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Add class for global layout.
	$global_layout = pt_magazine_get_option( 'sidebar_position' );
	$global_layout = apply_filters( 'pt_magazine_filter_theme_global_layout', $global_layout );
	$classes[] = 'global-layout-' . esc_attr( $global_layout );

	// Add class for boxed layout.
	$post_list_type = pt_magazine_get_option( 'post_list_type' );

	if( 'grid' == $post_list_type ){

		$classes[] = 'blog-layout-grid';

	}else{

		$classes[] = 'blog-layout-list';

	}

	// Add class for boxed layout.
	$site_layout = pt_magazine_get_option( 'site_layout' );

	if( 'boxed' == $site_layout ){

		$classes[] = 'site-layout-boxed';

	}

	// Add class for sticky sidebar.
	$sticky_sidebar = pt_magazine_get_option( 'enable_sticky_sidebar' );

	if( 1 == $sticky_sidebar ){

		$classes[] = 'global-sticky-sidebar';

	}
	
	return $classes;
}
add_filter( 'body_class', 'pt_magazine_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function pt_magazine_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', bloginfo( 'pingback_url' ), '">';
	}
}
add_action( 'wp_head', 'pt_magazine_pingback_header' );

if ( ! function_exists( 'pt_magazine_footer_goto_top' ) ) :

	/**
	 * Add Go to top.
	 *
	 * @since 1.0.0
	 */
	function pt_magazine_footer_goto_top() {
		echo '<a href="#page" class="scrollup" id="btn-scrollup"><i class="fa fa-angle-up"></i></a>';
	}
endif;
add_action( 'wp_footer', 'pt_magazine_footer_goto_top' );

if ( ! function_exists( 'pt_magazine_implement_excerpt_length' ) ) :

	/**
	 * Implement excerpt length.
	 *
	 * @since 1.0.0
	 *
	 * @param int $length The number of words.
	 * @return int Excerpt length.
	 */
	function pt_magazine_implement_excerpt_length( $length ) {

		$excerpt_length = pt_magazine_get_option( 'blog_excerpt_length' );
		
		if ( absint( $excerpt_length ) > 0 ) {

			$length = absint( $excerpt_length );

		}

		return $length;

	}
endif;

if ( ! function_exists( 'pt_magazine_implement_read_more' ) ) :

	/**
	 * Implement read more in excerpt.
	 *
	 * @since 1.0.0
	 *
	 * @param string $more The string shown within the more link.
	 * @return string The excerpt.
	 */
	function pt_magazine_implement_read_more( $more ) {

		$output = $more;

		$read_more 			= pt_magazine_get_option( 'blog_read_more' );

		$read_more_text 	= pt_magazine_get_option( 'blog_read_more_text' );

		if ( ! empty( $read_more_text ) ) {

			if( 1 !== absint( $read_more ) ){

				$output = '&hellip;';

			}else{

				$output = '&hellip;<p><a href="' . esc_url( get_permalink() ) . '" class="read-more button">' . esc_html( $read_more_text ) . '</a></p>';

			}

		}

		return $output;

	}
endif;

if ( ! function_exists( 'pt_magazine_hook_read_more_filters' ) ) :

	/**
	 * Hook read more and excerpt length filters.
	 *
	 * @since 1.0.0
	 */
	function pt_magazine_hook_read_more_filters() {
		if ( is_home() || is_category() || is_tag() || is_author() || is_date() || is_search() ) {

			add_filter( 'excerpt_length', 'pt_magazine_implement_excerpt_length', 999 );
			add_filter( 'excerpt_more', 'pt_magazine_implement_read_more' );

		}
	}
endif;
add_action( 'wp', 'pt_magazine_hook_read_more_filters' );

if ( ! function_exists( 'pt_magazine_add_sidebar' ) ) :

	/**
	 * Add sidebar.
	 *
	 * @since 1.0.0
	 */
	function pt_magazine_add_sidebar() {

		$global_layout = pt_magazine_get_option( 'global_layout' );
		$global_layout = apply_filters( 'pt_magazine_filter_theme_global_layout', $global_layout );

		// Include sidebar.
		if ( 'no-sidebar' !== $global_layout ) {
			get_sidebar();
		}

	}
endif;
add_action( 'pt_magazine_action_sidebar', 'pt_magazine_add_sidebar' );