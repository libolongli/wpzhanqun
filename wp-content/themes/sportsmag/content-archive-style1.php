<?php
/**
 * @package SportsMag
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
        <div class="post_image_col clearfix">
	        <?php 
	            if( has_post_thumbnail() ){
	            $sportsmag_image_id = get_post_thumbnail_id();
	            $sportsmag_image_path = wp_get_attachment_image_src( $sportsmag_image_id, 'accesspress-mag-singlepost-style1' ,true );
	            $sportsmag_image_alt = get_post_meta( $sportsmag_image_id, '_wp_attachment_image_alt', true );
	         ?>
	         
	            <div class="post-image non-zoomin">
	                <a href="<?php the_permalink();?>"><img src="<?php echo esc_url( $sportsmag_image_path[0] );?>" alt="<?php echo esc_attr( $sportsmag_image_alt );?>" /></a>
	                <a class="big-image-overlay" href="<?php the_permalink();?>"><i class="fa fa-external-link"></i></a>
	            </div><!-- .post-image -->
	         
	        <?php } ?>
	        <?php if ( 'post' == get_post_type() ) { ?>
	        <div class="entry-meta <?php if( !has_post_thumbnail() ) { echo 'no-thumb'; }?> clearfix">
	            <div class="post-cat-list"> <?php if( is_author() || is_tag() || is_archive() ){ echo get_the_category_list(); }  ?> </div>
	            <div class="post-extra-wrapper clearfix">
	                <span class="single-post-on"><?php accesspress_mag_posted_on(); ?></span>
				    <span class="single-post-view"><?php do_action( 'accesspress_mag_post_meta' );?></span>
	            </div>
			</div><!-- .entry-meta -->
	        <?php } ?>
        </div><!-- .post_image_col -->
		<?php
			/* translators: %s: Name of current post */
			/*the_content( sprintf(
				__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'sportsmag' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
            */
            accesspress_mag_excerpt();
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'sportsmag' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php accesspress_mag_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->