<?php
/**
 * Template Name: Home
 *
 * This is the most main template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package PT_Magazine
 */
// Bail if not home page.
if ( ! is_page_template( 'templates/home.php' )  ) {
	return;
}

get_header(); ?>

	<div id="primary" class="content-area">

		<main id="main" class="site-main" role="main">

			<?php 

			if ( is_active_sidebar( 'home-page-widget-area' ) ) :
				
				dynamic_sidebar( 'home-page-widget-area' ); 

			else:

	            if ( current_user_can( 'edit_theme_options' ) ) : ?>

	                <p>
	                    <?php echo esc_html__( 'Widgets of Home Page Widget Area will be displayed here. Go to Appearance->Widgets in admin panel to add widgets. All these widgets will be replaced when you start adding widgets.', 'pt-magazine' ); ?>
	                </p>
			    	
			    	<?php 

			   	endif;
				
			endif; ?>

		</main><!-- #main -->

	</div><!-- #primary -->

<?php

do_action( 'pt_magazine_action_sidebar' );

get_footer();