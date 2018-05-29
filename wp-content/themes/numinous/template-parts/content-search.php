<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Numinous
 */

$readmore = get_theme_mod( 'numinous_readmore_text', __( 'Read More', 'numinous' ) ); // from customizer
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 
    /**
     * Before search entry summary
     * 
     * @hooked numinous_post_content_image - 10
     * @hooked numinous_post_entry_header  - 20 
    */
    do_action( 'numinous_before_search_entry_summary' );    
    ?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<a href="<?php the_permalink(); ?>" class="read-more"><?php echo esc_html( $readmore ); ?></a>
        <?php numinous_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
