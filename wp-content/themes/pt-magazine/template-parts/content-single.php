<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package PT_Magazine
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="article-wrap-inner">

		<?php 

		$show_featured_img = pt_magazine_get_option( 'show_featured_img' );

		if ( has_post_thumbnail() && ( 1 == $show_featured_img ) ) : ?>
			<div class="featured-thumb">
				<?php the_post_thumbnail(); ?>
			</div>
		<?php endif; ?>

		<div class="content-wrap">
			<div class="content-wrap-inner">
				<header class="entry-header">
					<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
					<div class="entry-meta">
						<?php pt_magazine_entry_header(); ?>
					</div><!-- .entry-meta -->

				</header><!-- .entry-header -->
				
				<div class="entry-content">
					<?php
						the_content( sprintf(
							/* translators: %s: Name of current post. */
							wp_kses( esc_html__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'pt-magazine' ), array( 'span' => array( 'class' => array() ) ) ),
							the_title( '<span class="screen-reader-text">"', '"</span>', false )
						) );

						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pt-magazine' ),
							'after'  => '</div>',
						) );

						pt_magazine_entry_footer();

					?>
				</div><!-- .entry-content -->

			</div>
		</div>
	</div>

</article><!-- #post-## -->
