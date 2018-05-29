<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package PT_Magazine
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'single' );

			do_action( 'pt_magazine_related_post' );

			// If author details is enabled, load up the author template.
			$show_author = pt_magazine_get_option( 'single_show_author' );
			
			if ( 1 == $show_author ) :
				get_template_part( 'template-parts/content', 'author-details' );
			endif;

			// If show navigation is enabled, load up the navigation function.
			$show_nav = pt_magazine_get_option( 'single_show_nav' );

			if ( 1 == $show_nav ) :
				the_post_navigation();
			endif;


			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
do_action( 'pt_magazine_action_sidebar' );
get_footer();
