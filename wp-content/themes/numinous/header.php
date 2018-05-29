<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Numinous
 */

    /**
     * Doctype Hook
     * 
     * @hooked numinous_doctype_cb
    */
    do_action( 'numinous_doctype' );
?>

<head>

<?php 
    /**
     * Before wp_head
     * 
     * @hooked numinous_head
    */
    do_action( 'numinous_before_wp_head' );

    wp_head(); 
?>
</head>

<body <?php body_class(); ?>>

<?php
    /**
     * Before Header
     * 
     * @hooked numinous_page_start - 20
     * @hooked numinous_top_header - 30 
    */
    do_action( 'numinous_before_header' );
    
    /**
     * Numinous Header
     * 
     * @hooked numinous_header_start  - 20
     * @hooked numinous_header_top    - 30
     * @hooked numinous_header_bottom - 40
     * @hooked numinous_header_end    - 100    
    */
    do_action( 'numinous_header' );
    
    /**
     * After Header
     * 
     * @hooked numinous_featured_section - 20
     * @hooked numinous_top_news_section - 30 
    */
    do_action( 'numinous_after_header' );
    
    /**
     * Before Content
     * 
     * @hooked numinous_page_header - 20
    */
    do_action( 'numinous_before_content' );
    
    /**
     * Numinous Content
     * 
     * @hooked numinous_content_start
    */
    do_action( 'numinous_content' );