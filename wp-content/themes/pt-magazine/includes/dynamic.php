<?php
/**
 * Dynamic Options hook.
 *
 * This file contains option values from customizer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package PT_Magazine
 */

if ( ! function_exists( 'pt_magazine_dynamic_options' ) ) :

    function pt_magazine_dynamic_options(){

        $primary_color   =  pt_magazine_get_option( 'primary_color' ); ?>               
            
        <style type="text/css">

            .comment-navigation .nav-previous,
            .posts-navigation .nav-previous,
            .comment-navigation .nav-next,
            .posts-navigation .nav-next,
            #infinite-handle span,
            .comment-navigation .nav-previous:hover,
            .posts-navigation .nav-previous:hover,
            .comment-navigation .nav-next:hover,
             #infinite-handle span:hover,
             #home-page-widget-area .widget-title span::before,
             #home-page-widget-area .widget-title span::after,
             .home-icon.active-true a,
             .home-icon a:hover,
             .slick-prev,
             .slick-next,
             .slick-prev:hover,
             .slick-next:hover,
             .section-title-center h2:before,
             .sidebar .widget_search button,
             .search-no-results .no-results.not-found form.search-form input[type="submit"],
             .search-no-results .no-results.not-found form.search-form button[type="submit"],
             .search-no-results .no-results.not-found  form.search-form input[type="submit"]:hover,
             .search-no-results .no-results.not-found form.search-form button[type="submit"]:hover,
             .error-404.not-found  form.search-form input[type="submit"],
             .error-404.not-found  form.search-form button[type="submit"],
             .error-404.not-found  form.search-form input[type="submit"]:hover,
             .error-404.not-found  form.search-form button[type="submit"]:hover,
             #footer-widgets .widget_search button,
             .scrollup,
             .mean-container .mean-nav ul li a,
             .mean-container .mean-nav ul li a:hover{
                background: <?php echo esc_attr( $primary_color ); ?>;
            }

            a,
            a:visited,
            a.button:visited:hover,
            a:hover,
            a:focus,
            a:active,
            .home.page .header-collapse ul li a:hover,
            .post-navigation .nav-links .nav-previous:hover a,
            .post-navigation .nav-links .nav-next:hover a,
            .post-navigation .nav-links .nav-previous:hover:before,
            .post-navigation .nav-links .nav-next:hover:after,
            .entry-meta > span::before,
            .entry-footer > span::before,
            .entry-content > span::before,
            .single-post-meta > span::before,
            .main-navigation li.current-menu-item a,
            .main-navigation ul li a:hover,
            .search-box form button[type="submit"] i,
            .main-news-section article .post-content h2:hover,
            .main-news-section article .post-content h2 a:hover,
            .news-text-wrap h2:hover,
            .news-text-wrap h2 a:hover,
            .video-item .video-content h2,
            .breadcrumbs ul li:last-child span,
            .news-item .news-text-wrap .byline:before,
            #primary .page .entry-title a:hover,
            #primary .post .entry-title a:hover,
            .author-info-wrap .author-content-wrap a.authors-more-posts,
            .tab-news-holder .tabbed-news-side li.active a,
            .sidebar ul li:before,
            .sidebar .widget_categories ul li a:hover, 
            .sidebar .widget_meta ul li a:hover, 
            .sidebar ul li a:hover,
            .sidebar a:hover,
            .sidebar .widget_archive li:hover,
            .sidebar .widget_categories li:hover,
            .sidebar .widget_archive li a:hover,
            .sidebar .widget_categories li a:hover,
            .sidebar .widget_archive li:hover a,
            .sidebar .widget_categories li:hover a,
            #footer-widgets .widget_popular_posts .news-item .news-text-wrap h2:hover,
            #footer-widgets .widget_popular_posts .news-item .news-text-wrap h2 a:hover,
            #footer-widgets .widget_extended_recent_posts .news-item .news-text-wrap h2 a:hover,
            #footer-widgets a:hover,
            #footer-widgets ul li a:hover,
            #footer-widgets ul li:hover a,
            #footer-widgets .widget_categories li:hover,
            #footer-widgets .widget_archive li:hover,
            #footer-widgets .widget_archive li a:hover,
            #footer-widgets .widget_categories li a:hover,
            #footer-widgets .widget_archive li:hover a,
            #footer-widgets .widget_categories li:hover a,
            #footer-widgets ul li:hover:before,
            .tagcloud a:hover,
            #sidebar-primary .tagcloud a:hover {
                color: <?php echo esc_attr( $primary_color ); ?>;
            }

            button:hover,
            a.button:hover,
            input[type="button"]:hover,
            input[type="reset"]:hover,
            input[type="submit"]:hover,
            a.comment-reply-link:hover,
            .pagination .nav-links .page-numbers.current,
            .pagination .nav-links .page-numbers:hover {
                border-color: <?php echo esc_attr( $primary_color ); ?>;
                color: <?php echo esc_attr( $primary_color ); ?>;
            }

            .nav-links .page-numbers.current,
            .nav-links a.page-numbers:hover{
                background: <?php echo esc_attr( $primary_color ); ?>;
                border-color: <?php echo esc_attr( $primary_color ); ?>;
            }

            button,
            .comment-reply-link,
             a.button, input[type="button"],
             input[type="reset"],
             input[type="submit"],
             .comment-reply-link,
             .pagination .nav-links .page-numbers {
                background: <?php echo esc_attr( $primary_color ); ?>;
                border: 1px solid <?php echo esc_attr( $primary_color ); ?>;
            }

            .section-title,
            .tab-news-holder{
                border-left:3px solid <?php echo esc_attr( $primary_color ); ?>;
            }

        </style>

        <?php
    }

endif;

$primary_color = pt_magazine_get_option( 'primary_color' );

if( '#ff5a5f' != $primary_color ){
    add_action( 'wp_head', 'pt_magazine_dynamic_options' );
}
