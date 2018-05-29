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

		<?php if ( has_post_thumbnail() ) : ?>

			<div class="featured-thumb">

				<?php 

				// Add class for grid layout.
				$post_list_type = pt_magazine_get_option( 'post_list_type' );

				if( 'grid' == $post_list_type ){ 

					$thumb_size = 'pt-magazine-tall';
					
				}else{

					$thumb_size = 'full';

				} ?>

				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( $thumb_size ); ?></a>

			</div>

		<?php endif; ?>

		<?php $contet_class =  ( has_post_thumbnail() ) ? 'content-with-image' : 'content-no-image'; ?>

		<div class="content-wrap <?php echo $contet_class; ?>">
			<div class="content-wrap-inner">
				<header class="entry-header">
					<?php

					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

					if ( 'post' === get_post_type() ) : ?>
						<div class="entry-meta">
							<?php pt_magazine_entry_header(); ?>
						</div><!-- .entry-meta -->
						<?php
					endif;
					?>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php the_excerpt(); ?>
				</div><!-- .entry-content -->
			</div>
		</div>

	</div>

</article><!-- #post-## -->
