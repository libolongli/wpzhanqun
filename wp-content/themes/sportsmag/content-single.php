<?php
/**
 * The template for displaying all single posts which have default layout.
 *
 * @package SportsMag
 */
global $post;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <div class="entry-content-collection">
            <div class="post_image_col clearfix">
                <div class="post_image">
                    <?php
                        $sportsmag_show_featured_image = of_get_option( 'featured_image', '1' );
                        $sportsmag_image_id = get_post_thumbnail_id();
                        $sportsmag_image_path = wp_get_attachment_image_src( $sportsmag_image_id, 'accesspress-mag-singlepost-default', true );
                        $sportsmag_image_alt = get_post_meta( $sportsmag_image_id, '_wp_attachment_image_alt', true );
                        if ( has_post_thumbnail() && $sportsmag_show_featured_image == 1 ) {                        
                    ?>
                            <img src="<?php echo esc_url( $sportsmag_image_path[0] ); ?>" alt="<?php echo esc_attr( $sportsmag_image_alt ); ?>" />
                    <?php
                        }
                    ?>
                </div><!-- .post_image -->
                <div class="entry-meta <?php if( !has_post_thumbnail() ) { echo 'no-thumb'; }?> clearfix">
                    <div class="post-cat-list"> <?php echo get_the_category_list(); ?> </div>
                    <div class="post-extra-wrapper">
                        <div class="single-post-on"><?php accesspress_mag_posted_on(); ?></div>
                        <div class="single-post-view"><?php do_action( 'accesspress_mag_post_meta' ); ?></div>
                    </div>
                </div><!-- .entry-meta -->
            </div><!-- .post_image_col -->
        </div><!-- .entry-content-collection -->
        <div class="post_content"><?php the_content(); ?></div>
        <?php if ( is_active_sidebar( 'accesspress-mag-article-ad' ) ) : ?>
            <div class="article-ad-section">
                <?php dynamic_sidebar( 'accesspress-mag-article-ad' ); ?> 
            </div> 
        <?php endif; ?>
        <?php
        wp_link_pages( array(
            'before' => '<div class="page-links">' . __('Pages:', 'sportsmag'),
            'after' => '</div>',
        ));
        ?>        
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php accesspress_mag_entry_footer(); ?>        
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->
