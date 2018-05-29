<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Numinous
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>
            <section class="health-section">
				<?php 
                    the_archive_title( '<h1 class="section-title">', '</h1>' );
                    the_archive_description( '<div class="taxonomy-description">', '</div>' );
                ?>
                <ul>
        			<?php
        			/* Start the Loop */
        			while ( have_posts() ) : the_post();
        
        				/*
        				 * Include the Post-Format-specific template for the content.
        				 * If you want to override this in a child theme, then include a file
        				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
        				 */
        				get_template_part( 'template-parts/content', 'archive' );
        
        			endwhile;
        
        			numinous_pagination(); //pagination
                    
                    ?>
                </ul>
                
            </section>
            <?php
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
