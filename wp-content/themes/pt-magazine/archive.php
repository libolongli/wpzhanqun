<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package PT_Magazine
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php

			// Add class for grid layout.
			$post_list_type = pt_magazine_get_option( 'post_list_type' );

			if( 'grid' == $post_list_type ){ ?>

				<div class="inner-wrapper">

				<?php
				
			}

			if ( have_posts() ) : ?>

				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content' );

				endwhile;

				the_posts_pagination();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; 

			if( 'grid' == $post_list_type ){ ?>

				</div>

				<?php
				
			} ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
do_action( 'pt_magazine_action_sidebar' );
get_footer();
