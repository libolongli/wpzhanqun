<?php
/**
 * Helper functions.
 *
 * @package PT_Magazine
 */

// Highlighted category.

$show_highlighted_news = pt_magazine_get_option( 'show_highlighted_news' );

if ( true !== $show_highlighted_news ) {
	return;
}

if ( ! ( is_front_page()) && ! is_page_template( 'templates/home.php' ) ) {
    return;
} 

$highlighted_cat = pt_magazine_get_option( 'highlighted_news_category' ); ?>

<div class="main-news-full-row main-news-col-3">

	<?php 

	$highlighted_args = array(
			                'posts_per_page'		=> 3,
			                'no_found_rows' 		=> true,
			                'post__not_in'          => get_option( 'sticky_posts' ),
			                'ignore_sticky_posts'   => true,
			                'meta_query'  			=> array(
											            array( 'key' => '_thumbnail_id' ),
											        ),
	            		);

	if ( absint( $highlighted_cat ) > 0 ) {

	    $highlighted_args['cat'] = absint( $highlighted_cat );
	    
	} 

	$highlighted_posts = new WP_Query( $highlighted_args );

	if ( $highlighted_posts->have_posts() ) : ?>

		<div class="news-row-wrapper">

			<?php

	        while ( $highlighted_posts->have_posts() ) :
	            
	            $highlighted_posts->the_post(); ?>

            	<article class="news-post">
            		<div class="article-content-wrap">
	            		<figure class="post-image overlay">
	                    	<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('pt-magazine-tall'); ?></a>
	                    </figure><!-- .post-image -->

	                    <div class="post-content">
							<span class="posted-date"><?php echo esc_html( get_the_date() ); ?></span>
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	                    </div><!-- .post-content -->
	                </div>
            	</article><!-- .news-post -->

	            <?php

	        endwhile; 

	        wp_reset_postdata(); ?>

	    </div>

	    <?php

	endif; ?>

</div><!-- .main-news-right -->