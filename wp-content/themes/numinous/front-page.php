<?php
/**
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Numinous
 */

$first_cat  = get_theme_mod( 'numinous_category_one' ); //from customizer
$second_cat = get_theme_mod( 'numinous_category_two' ); //from customizer
$third_cat  = get_theme_mod( 'numinous_category_three' ); //from customizer
$fourth_cat = get_theme_mod( 'numinous_category_four' ); //from customizer
$fifth_cat  = get_theme_mod( 'numinous_category_five' ); //from customizer

get_header(); 
            
    if ( 'posts' == get_option( 'show_on_front' ) ) {
        include( get_home_template() );
    }elseif( $first_cat || $second_cat || $third_cat || $fourth_cat || $fifth_cat ){ ?>
        
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
    }else {
        include( get_page_template() );
    }
            
get_sidebar();
get_footer();