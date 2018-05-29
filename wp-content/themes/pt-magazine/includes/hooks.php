<?php
/**
 * Load hooks.
 *
 * @package PT_Magazine
 */

//=============================================================
// Doctype hook of the theme
//=============================================================
if ( ! function_exists( 'pt_magazine_doctype_action' ) ) :
    /**
     * Doctype declaration of the theme.
     *
     * @since 1.0.0
     */
    function pt_magazine_doctype_action() {
    ?><!DOCTYPE html> <html <?php language_attributes(); ?>><?php
    }
endif;

add_action( 'pt_magazine_doctype', 'pt_magazine_doctype_action', 10 );

//=============================================================
// Head hook of the theme
//=============================================================
if ( ! function_exists( 'pt_magazine_head_action' ) ) :
    /**
     * Header hook of the theme.
     *
     * @since 1.0.0
     */
    function pt_magazine_head_action() {
    ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php
    }
endif;

add_action( 'pt_magazine_head', 'pt_magazine_head_action', 10 );

//=============================================================
// Top header hook of the theme
//=============================================================
if ( ! function_exists( 'pt_magazine_top_header_action' ) ) :
    /**
     * Header Start.
     *
     * @since 1.0.0
     */
    function pt_magazine_top_header_action() {

        // Top header status.
        $header_status = pt_magazine_get_option( 'show_top_header' );
        if ( 1 != $header_status ) {
            return;
        }

        // Top Items
        $top_left_type          = pt_magazine_get_option( 'top_left_type' );
        $top_right_type         = pt_magazine_get_option( 'top_right_type' );
        ?>
        <div class="top-header">
            <div class="container">
                <div class="top-header-content">
                    
                    <div class="top-info-left left">

                        <?php 
                        if( 'current-date' === $top_left_type ) {
                            
                            do_action( 'pt_magazine_top_header_current_date' );

                        }elseif( 'menu' === $top_left_type ) {
                            
                            do_action( 'pt_magazine_top_header_menu' );

                        }elseif( 'social-icons' === $top_left_type ){ ?>

                            <div class="social-widgets">

                                <?php the_widget( 'PT_Magazine_Social_Widget' ); ?>
                                
                            </div><!-- .social-widgets -->

                            <?php

                        }else{

                            do_action( 'pt_magazine_top_header_trending_news' );

                        } ?>

                    </div>

                    <div class="top-info-right right">

                        <?php 
                        if( 'current-date' === $top_right_type ) {
                            
                            do_action( 'pt_magazine_top_header_current_date' );

                        }elseif( 'menu' === $top_right_type ) {
                            
                            do_action( 'pt_magazine_top_header_menu' );

                        }else{ ?>

                            <div class="social-widgets">

                                <?php the_widget( 'PT_Magazine_Social_Widget' ); ?>
                                
                            </div><!-- .social-widgets -->

                            <?php

                        } ?>

                    </div>

                </div><!-- .top-header-content -->   
            </div>
        </div><!-- .top-header -->
        <?php
    }
endif;

add_action( 'pt_magazine_top_header', 'pt_magazine_top_header_action' );

//=============================================================
// Trending news hook of the theme
//=============================================================
if ( ! function_exists( 'pt_magazine_top_header_trending_news_action' ) ) :
    /**
     * Trending News Start.
     *
     * @since 1.0.0
     */
    function pt_magazine_top_header_trending_news_action() { ?>

        <div class="recent-stories-holder">
            <?php 

            $trending_title         = pt_magazine_get_option( 'trending_title' );
            $trending_category      = pt_magazine_get_option( 'trending_category' );
            $trending_post_number   = pt_magazine_get_option( 'trending_post_number' );

            if( !empty( $trending_title ) ){ ?>

                <span><?php echo esc_html( $trending_title ); ?></span>
                
                <?php

            } 

            $query_args = array(
                            'posts_per_page'        => absint( $trending_post_number ),
                            'no_found_rows'         => true,
                            'post__not_in'          => get_option( 'sticky_posts' ),
                            'ignore_sticky_posts'   => true,
                        );

            if ( absint( $trending_category ) > 0 ) {

                $query_args['cat'] = absint( $trending_category );
                
            } 

            $all_posts = new WP_Query( $query_args );

            if ( $all_posts->have_posts() ) : ?>
                  
                <ul id="recent-news">
                    <?php
                    while ( $all_posts->have_posts() ) :
                        
                        $all_posts->the_post(); ?>
                        
                        <li>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </li>

                        <?php

                    endwhile; 

                    wp_reset_postdata(); ?>
                      
                </ul>
                <?php 
            endif; ?>
          </div>
        <?php
    }
endif;

add_action( 'pt_magazine_top_header_trending_news', 'pt_magazine_top_header_trending_news_action' );

//=============================================================
// Top header menu hook of the theme
//=============================================================
if ( ! function_exists( 'pt_magazine_top_header_menu_action' ) ) :
    /**
     * Top Header Menu Start.
     *
     * @since 1.0.0
     */
    function pt_magazine_top_header_menu_action() { ?>

        <div class="top-menu-holder">
            <?php
            wp_nav_menu(
                array(
                'theme_location' => 'top-header',
                'menu_id'        => 'top-menu',
                'depth'          => 1,                                   
                )
            ); ?>
        </div>
        <?php
    }
endif;

add_action( 'pt_magazine_top_header_menu', 'pt_magazine_top_header_menu_action' );

//=============================================================
// Top header current date hook of the theme
//=============================================================
if ( ! function_exists( 'pt_magazine_top_header_current_date_action' ) ) :
    /**
     * Top Header Current Date Start.
     *
     * @since 1.0.0
     */
    function pt_magazine_top_header_current_date_action() { ?>

        <div class="top-date-holder"><?php echo date( get_option( 'date_format' ) ); ?></div>
        
        <?php
    }
endif;

add_action( 'pt_magazine_top_header_current_date', 'pt_magazine_top_header_current_date_action' );

//=============================================================
// Before header hook of the theme
//=============================================================
if ( ! function_exists( 'pt_magazine_before_header_action' ) ) :
    /**
     * Header Start.
     *
     * @since 1.0.0
     */
    function pt_magazine_before_header_action() {

        ?><header id="masthead" class="site-header" role="banner"><?php

        /**
         * Hook - pt_magazine_top_header.
         *
         * @hooked pt_magazine_top_header_action - 10
         */
        do_action( 'pt_magazine_top_header' );
    }
endif;

add_action( 'pt_magazine_before_header', 'pt_magazine_before_header_action' );

//=============================================================
// Header main hook of the theme
//=============================================================
if ( ! function_exists( 'pt_magazine_header_action' ) ) :

    /**
     * Site Header.
     *
     * @since 1.0.0
     */
    function pt_magazine_header_action() { ?>
        <div class="bottom-header">
            <div class="container">
                <div class="site-branding">
                    <?php 

                    $site_identity = pt_magazine_get_option( 'site_identity' ); 

                    if( 'logo-only' == $site_identity ){  

                        pt_magazine_the_custom_logo(); 

                    }elseif( 'logo-desc' == $site_identity ){

                        pt_magazine_the_custom_logo(); 

                        $description = get_bloginfo( 'description', 'display' );

                        if ( $description || is_customize_preview() ) : ?>

                            <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>

                            <?php
                        endif; 

                    }else{ ?>

                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

                        <?php
                        $description = get_bloginfo( 'description', 'display' );

                        if ( $description || is_customize_preview() ) : ?>

                            <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>

                            <?php
                        endif; 
                    } ?>
                </div>
                <?php 
                if ( is_active_sidebar( 'advertisement-1' ) ) { ?>

                    <div class="header-advertisement">

                        <?php dynamic_sidebar( 'advertisement-1' ); ?>

                    </div><!-- .header-advertisement -->

                    <?php 
                } ?>
                
            </div>
        </div>

        <?php 
        $home_icon    = pt_magazine_get_option( 'show_home_icon' ); 
        $show_search  = pt_magazine_get_option( 'show_search' );
        $search_style = pt_magazine_get_option( 'search_style' );

        if ( 1 === absint( $home_icon ) ) {

            $nav_holder_class = 'home-icon-enabled';

        }else{

            $nav_holder_class = 'home-icon-disabled';

        } ?>

        <div class="main-navigation-holder <?php echo $nav_holder_class; ?>">
            <div class="container">
                <?php 
                if ( 1 === absint( $show_search ) ) {

                    $main_nav_class = 'semi-width-nav';

                }else{

                    $main_nav_class = 'full-width-nav';
                    
                } ?>
                <div id="main-nav" class="<?php echo $main_nav_class; ?> clear-fix">
                    <nav id="site-navigation" class="main-navigation" role="navigation">
                        <?php

                        if ( 1 == absint( $home_icon ) ) {

                            if ( is_front_page() ) {

                                $home_icon = 'home-icon active-true';

                            } else {

                                $home_icon = 'home-icon';

                            } ?>

                            <div class="<?php echo $home_icon; ?>">

                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fa fa-home"></i></a>
                                
                            </div>

                            <?php

                        } ?>
                        <div class="wrap-menu-content">
                            <?php
                            wp_nav_menu(
                                array(
                                'theme_location' => 'primary',
                                'menu_id'        => 'primary-menu',
                                'fallback_cb'    => 'pt_magazine_primary_navigation_fallback',
                                )
                            );
                            ?>
                        </div><!-- .menu-content -->
                    </nav><!-- #site-navigation -->
                </div> <!-- #main-nav -->

                <?php
                
                if ( 1 == absint( $show_search ) ) { ?>
                    <div class="search-holder">

                        <?php

                        if( 'style-two' == $search_style ){ ?>
                            
                            <a href="#" class="search-btn"><i class="fa fa-search"></i></a>
                           
                            <?php 

                        } 

                        if( 'style-two' == $search_style ){ ?>
                            
                            <div class="search-box search-style-two" style="display: none;">
                            <?php 

                        } else{ ?>

                        <div class="search-box"><?php } ?>

                            <?php get_search_form(); ?>

                        </div>
                    </div><!-- .search-holder -->
                    <?php
                } ?>

            </div><!-- .container -->
        </div>
        <?php
    }

endif;

add_action( 'pt_magazine_header', 'pt_magazine_header_action' );

//=============================================================
// After header hook of the theme
//=============================================================
if ( ! function_exists( 'pt_magazine_after_header_action' ) ) :
    /**
     * Header End.
     *
     * @since 1.0.0
     */
    function pt_magazine_after_header_action() {
       
    ?></header><!-- #masthead --><?php
    }
endif;
add_action( 'pt_magazine_after_header', 'pt_magazine_after_header_action' );

//=============================================================
// Slider hook of the theme
//=============================================================
if ( ! function_exists( 'pt_magazine_main_content_for_slider_part' ) ) :

    /**
     * Add slider.
     *
     * @since 1.0.0
     */
    function pt_magazine_main_content_for_slider_part() { 

        if ( ! ( is_front_page()) && ! is_page_template( 'templates/home.php' ) ) {
            return;
        } 

        $show_main_slider       = pt_magazine_get_option( 'show_main_slider' );
        $show_featured_news     = pt_magazine_get_option( 'show_featured_news' );
        $show_highlighted_news  = pt_magazine_get_option( 'show_highlighted_news' );

        if ( ( 1 !== absint( $show_main_slider ) ) && ( 1 !== absint( $show_featured_news ) ) && ( 1 !== absint( $show_highlighted_news ) ) ) {
            return;
        } ?>

        <section class="main-news-section">

            <div class="container">

                <?php get_template_part( 'template-parts/slider' ); ?>
                <?php get_template_part( 'template-parts/featured-news' ); ?>
                <?php get_template_part( 'template-parts/highlighted-news' ); ?>

            </div>

        </section>

        <?php

    }

endif;

add_action( 'pt_magazine_slider_part', 'pt_magazine_main_content_for_slider_part' , 5 );

//=============================================================
// Breadcrumb hook of the theme
//=============================================================
if ( ! function_exists( 'pt_magazine_main_content_for_breadcrumb' ) ) :

    /**
     * Add breadcrumb.
     *
     * @since 1.0.0
     */
    function pt_magazine_main_content_for_breadcrumb() {

        get_template_part( 'template-parts/breadcrumbs' );

    }

endif;

add_action( 'pt_magazine_main_content', 'pt_magazine_main_content_for_breadcrumb' , 7 );

//=============================================================
// Before content hook of the theme
//=============================================================
if ( ! function_exists( 'pt_magazine_before_content_action' ) ) :
    /**
     * Content Start.
     *
     * @since 1.0.0
     */
    function pt_magazine_before_content_action() { ?>

        <div id="content" class="site-content">

            <?php do_action( 'pt_magazine_slider_part' ); ?>

            <div class="container"><div class="inner-wrapper"><?php
    }
endif;
add_action( 'pt_magazine_before_content', 'pt_magazine_before_content_action' );

//=============================================================
// After content hook of the theme
//=============================================================
if ( ! function_exists( 'pt_magazine_after_content_action' ) ) :
    /**
     * Content End.
     *
     * @since 1.0.0
     */
    function pt_magazine_after_content_action() {
    ?></div><!-- .inner-wrapper --></div><!-- .container --></div><!-- #content --><?php    
    }
endif;
add_action( 'pt_magazine_after_content', 'pt_magazine_after_content_action' );

//=============================================================
// Credit info hook of the theme
//=============================================================
if ( ! function_exists( 'pt_magazine_credit_info' ) ) :

    function pt_magazine_credit_info(){ ?> 

        <div class="site-info">
            <?php printf( esc_html__( '%1$s by %2$s', 'pt-magazine' ), 'PT Magazine', '<a href="https://promenadethemes.com" rel="designer">Promenade Themes</a>' ); ?>
        </div><!-- .site-info -->
        
        <?php
    }

endif;

add_action( 'pt_magazine_credit', 'pt_magazine_credit_info', 10 );

//=============================================================
// Related post hook of the theme
//=============================================================

if ( ! function_exists( 'pt_magazine_related_post_action' ) ) :

    function pt_magazine_related_post_action(){ 

        $show_related_posts = pt_magazine_get_option( 'single_show_related' );

        if( 1 == $show_related_posts ){
        
            $post_id = get_the_ID();

            $categories = get_the_category( $post_id );  

            if( $categories ) {

                $category_ids = array();

                foreach( $categories as $category ) {

                    $category_ids[] = $category->term_id;

                }

                $args = array(
                            'category__in'   => $category_ids,
                            'post__not_in'   => array( $post_id ),
                            'posts_per_page' => 3,                                
                        );

                $related_query = new WP_Query( $args );

                if( $related_query->have_posts() ) { ?>

                    <div class="news-col-3 related-posts">

                        <?php

                        $related_post_title = pt_magazine_get_option( 'related_post_title' ); 

                        if( !empty( $related_post_title ) ){  ?>

                            <h3 class="related-posts-title"><?php echo esc_html( $related_post_title ); ?></h3>

                            <?php

                        } ?>
                        
                        <div class="inner-wrapper">
                            <?php 
                            while( $related_query->have_posts()){
                                
                                $related_query->the_post(); ?>  

                                <div class="news-item three-column-item">
                                    <div class="news-thumb">
                                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('pt-magazine-tall'); ?></a>   
                                    </div><!-- .news-thumb --> 

                                   <div class="news-text-wrap">
                                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                         <span class="posted-date"><?php echo esc_html( get_the_date() ); ?></span>
                                   </div><!-- .news-text-wrap -->
                                </div><!-- .news-item -->

                                <?php                
                            } 

                            wp_reset_postdata(); ?>
                        </div>

                    </div>
                     
                    <?php           
                }
            }
        }
    }

endif;

add_action( 'pt_magazine_related_post', 'pt_magazine_related_post_action', 10 );

