<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package SportsMag
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'sportsmag_before' ); ?>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'sportsmag' ); ?></a>
    <?php 
        $sportsmag_logo = get_theme_mod( 'header_image' );
        $sportsmag_logo_alt = of_get_option( 'logo_alt' );
        $sportsmag_logo_title = of_get_option( 'logo_title' );
        $sportsmag_ticker_option = of_get_option( 'news_ticker_option', '1' );
        $sportsmag_random_icon = of_get_option( 'random_icon_option', '1' );
    ?>  
	
    <header id="masthead" class="site-header" role="banner">    
    
        <?php
            $sportsmag_date_option = of_get_option( 'header_current_date_option', '' );
            /**
             * Top menu section
             * 
             */ 
            if( has_nav_menu( 'top_menu' ) || has_nav_menu( 'top_menu_right' ) || $sportsmag_date_option != '1' ){
                $top_menu_class = 'has_menu'; 
            } else {
                $top_menu_class = 'no_menu';
            }
        ?>
        <div class="top-menu-wrapper <?php echo esc_attr( $top_menu_class ); ?> clearfix">
            <div class="apmag-container">   
            <?php 
                if( empty( $sportsmag_date_option ) && $sportsmag_date_option != '1' ) {
            ?>
            <div class="current-date"><?php echo date_i18n( 'l, F j, Y' ); ?></div>
            <?php } ?>
            <?php if ( has_nav_menu( 'top_menu' ) ) { ?>   
                <nav id="top-navigation" class="top-main-navigation" role="navigation">
                            <button class="menu-toggle hide" aria-controls="menu" aria-expanded="false"><?php _e( 'Top Menu', 'sportsmag' ); ?></button>
                            <?php wp_nav_menu( array( 'theme_location' => 'top_menu', 'container_class' => 'top_menu_left' ) ); ?>
                </nav><!-- #site-navigation -->
            <?php } ?>
            <?php if ( has_nav_menu( 'top_menu_right' ) ) { ?>        
                <nav id="top-right-navigation" class="top-right-main-navigation" role="navigation">
                            <button class="menu-toggle hide" aria-controls="menu" aria-expanded="false"><?php _e( 'Top Menu Right', 'sportsmag' ); ?></button>
                            <?php wp_nav_menu( array( 'theme_location' => 'top_menu_right', 'container_class' => 'top_menu_right' ) ); ?>
                </nav><!-- #site-navigation -->
            <?php } ?>
            </div>
        </div><!-- .top-menu-wrapper -->
            
        <div class="logo-ad-wrapper clearfix" id="sportsmag-menu-wrap">
            <div class="apmag-container">
                    <div class="apmag-inner-container clearfix">
                		<div class="site-branding clearfix">
                            <div class="sitelogo-wrap">
                                <?php if( $sportsmag_logo != 'remove-header' ) { ?>
                                    <a itemprop="url" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $sportsmag_logo ) ;?>" alt="<?php echo esc_attr( $sportsmag_logo_alt ); ?>" title="<?php echo esc_attr( $sportsmag_logo_title ); ?>" /></a>
                                <?php } ?>
                                <meta itemprop="name" content="<?php bloginfo( 'name' )?>" />
                            </div>
                            <?php if( $sportsmag_logo == 'remove-header' ) { ?>
                                <div class="sitetext-wrap">  
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                    <h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
                                    <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                                    </a>
                                </div>
                            <?php } ?>
                        </div><!-- .site-branding -->
                        <nav id="site-navigation" class="main-navigation" role="navigation">
                                <div class="nav-wrapper">
                                    <div class="nav-toggle hide">
                                        <span> </span>
                                        <span> </span>
                                        <span> </span>
                                    </div>
                                    <?php 
                                        if( has_nav_menu( 'primary' ) ){
                                            wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'menu' ) );    
                                        } else {
                                            wp_page_menu();
                                        }
                                    ?>
                                </div>
                                <div class="header-icon-wrapper">
                                    <?php 
                                        get_search_form(); 
                                        if ( $sportsmag_random_icon == 1 ) { 
                                            accesspress_mag_random_post(); 
                                        }
                                    ?>
                                </div>
                        </nav><!-- #site-navigation -->
                    </div><!--apmag-inner-container -->        
            </div><!-- .apmag-container -->
        </div><!-- .logo-ad-wrapper -->                
                
        <?php /* if ( is_active_sidebar( 'accesspress-mag-header-ad' ) ) : ?>
            <div class="header-ad">
                <?php dynamic_sidebar( 'accesspress-mag-header-ad' ); ?> 
            </div><!--header ad-->
        <?php endif; */ ?>
        <?php 
            /**
             * News Ticker section 
             */
             if( $sportsmag_ticker_option == '1' ){
                accesspress_mag_ticker();
             }
        ?>
	</header><!-- #masthead -->
    <?php do_action( 'sportsmag_after_header' ); ?>
	<?php do_action( 'sportsmag_before_main' ); ?>
	<div id="content" class="site-content">