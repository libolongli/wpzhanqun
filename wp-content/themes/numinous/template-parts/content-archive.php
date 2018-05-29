<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Numinous
 */

?>

<li>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
        <?php 
        /**
         * Before archive entry content
         * 
         * @hooked numinous_post_content_image - 10
         * @hooked numinous_post_entry_header  - 20 
        */
        do_action( 'numinous_before_archive_entry_content' );    
        ?>
        
    	<div class="entry-content">
    		<?php
    			the_excerpt();
    
    			wp_link_pages( array(
    				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'numinous' ),
    				'after'  => '</div>',
    			) );
    		?>
    	</div><!-- .entry-content -->
    
    	<footer class="entry-footer">
    		<?php numinous_entry_footer(); ?>
    	</footer><!-- .entry-footer -->
    </article><!-- #post-## -->
</li>