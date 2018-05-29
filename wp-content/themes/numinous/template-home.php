<?php
/**
 * Template Name: Home Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Numinous
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
            /**
             * Home Page Contents
             * 
             * @hooked numinous_two_col_double_cat_content - 10
             * @hooked numinous_big_img_single_cat_content - 20
             * @hooked numinous_two_col_single_cat_content - 30
             * @hooked numinous_more_news_content          - 40 
            */
            do_action( 'numinous_home_page' );
            ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
