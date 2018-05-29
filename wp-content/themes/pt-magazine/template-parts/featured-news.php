<?php
/**
 * Helper functions.
 *
 * @package PT_Magazine
 */

// Featured category.

$show_featured_news = pt_magazine_get_option( 'show_featured_news' );

if ( true !== $show_featured_news ) {
	return;
}

$featured_cat = pt_magazine_get_option( 'featured_news_category' );

if ( ! ( is_front_page()) && ! is_page_template( 'templates/home.php' ) ) {
    return;
} ?>

<div class="main-news-right">

	<?php 

	$featured_args = array(
		                'posts_per_page'     	=> 2,
		                'no_found_rows' 		=> true,
		                'post__not_in'          => get_option( 'sticky_posts' ),
		                'ignore_sticky_posts'   => true,
				        'meta_query'  	        => array(
									            	array( 'key' => '_thumbnail_id' ),
									            ),
	            	);

	if ( absint( $featured_cat ) > 0 ) {

	    $featured_args['cat'] = absint( $featured_cat );
	    
	} 

	$featured_posts = new WP_Query( $featured_args );

	if ( $featured_posts->have_posts() ) :

			$feat_count = 1; 

	        while ( $featured_posts->have_posts() ) :
	            
	            $featured_posts->the_post(); ?>

				<article class="smaller-post full-width-post">

					<div class="article-content-wrap">

						<figure class="post-image overlay">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('pt-magazine-featured-full'); ?></a>
						</figure><!-- .post-image -->

						<div class="post-content">
							<span class="posted-date"><?php echo esc_html( get_the_date() ); ?></span>
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						</div><!-- .post-content -->

					</div>

				</article>

	            <?php

	        endwhile; 

	        wp_reset_postdata(); 

	endif; ?>

</div><!-- .main-news-right -->