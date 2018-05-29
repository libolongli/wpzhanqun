<?php
/**
 * Template part for displaying author information.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package PT_Magazine
 */

?>
<div class="author-info-wrap">

	<div class="author-thumb">
		<?php echo get_avatar( get_the_author_meta( 'ID' ), '100' ); ?>
	</div>

	<div class="author-content-wrap">
		<header class="entry-header">
			 <h3 class="author-name"><?php printf( esc_attr__( 'About %s', 'pt-magazine' ), get_the_author() );?></h3>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<div class="author-desc"><?php the_author_meta( 'description' ); ?></div>
			<a class="authors-more-posts" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php printf( esc_html__( 'View all posts by %s &rarr;', 'pt-magazine' ), esc_attr( get_the_author() ) ); ?></a>
		</div><!-- .entry-content -->
	</div>
	
</div>