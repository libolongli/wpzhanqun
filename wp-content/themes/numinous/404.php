<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Numinous
 */

get_header(); ?>

    <span><?php esc_html_e( '404!', 'numinous' ); ?></span>
	
    <h1><?php esc_html_e( 'The requested page cannot be found', 'numinous' ); ?></h1>
	
    <p><?php esc_html_e( 'We\'re really sorry! Something went wrong trying to display the page, Please try one of these instead', 'numinous' ); ?></p>
	
    <?php get_search_form(); ?>
	
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="homepage"><?php esc_html_e( 'Back to homepage', 'numinous' ); ?></a>
    
<?php
get_footer();
