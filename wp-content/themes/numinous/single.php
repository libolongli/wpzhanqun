<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Numinous
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'single' );
            
            /**
             * After post content
             * 
             * @hooked numinous_post_author  - 10
             * @hooked numinous_related_post - 20 
            */
            do_action( 'numinous_after_post_content' );
            
            
    		numinous_pagination(); //pagination
    
    		/**
             * Numinous Comment
             * 
             * @hooked numinous_get_comment_section 
            */
            do_action( 'numinous_comment' );

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
