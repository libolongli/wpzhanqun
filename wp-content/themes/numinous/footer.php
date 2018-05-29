<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Numinous
 */


    /**
     * After Content
     * 
     * @hooked numinous_content_end - 20
    */
    do_action( 'numinous_after_content' );
    
    /**
     * Before Footer
     * 
     * @hooked numinous_bottom_ad - 10
     * @hooked numinous_slider    - 20
    */
    do_action( 'numinous_before_footer' );
    
    /**
     * Numinous Footer
     * 
     * @hooked numinous_footer_start  - 20
     * @hooked numinous_footer_top    - 30
     * @hooked numinous_footer_bottom - 40
     * @hooked numinous_footer_end    - 50
    */
    do_action( 'numinous_footer' );
    
    /**
     * After Footer
     * 
     * @hooked numinous_page_end - 20
    */
    do_action( 'numinous_after_footer' );
   
    wp_footer(); ?>

</body>
</html>
