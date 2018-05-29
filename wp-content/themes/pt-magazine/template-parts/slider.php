<?php
/**
 * Helper functions.
 *
 * @package PT_Magazine
 */

// Slider category.
$show_main_slider = pt_magazine_get_option( 'show_main_slider' );

if ( 0 === absint( $show_main_slider ) ) {
	return;
}



if ( ! ( is_front_page()) && ! is_page_template( 'templates/home.php' ) ) {
    return;
} 

// Slider settings.
$slider_cat 		= pt_magazine_get_option( 'main_slider_category' );
$slider_autoplay 	= pt_magazine_get_option( 'main_slider_autoplay' );
$slider_arrows 		= pt_magazine_get_option( 'main_slider_arrows' );
$slider_overlay    	= pt_magazine_get_option( 'main_slider_overlay' );

$slider_effect      = pt_magazine_get_option( 'slider_transition_effect' );
$slider_delay       = pt_magazine_get_option( 'slider_transition_delay' );

$slick_args = array(
    'dots'              => false,
    'slidesToShow'      => 1,
    'slidesToScroll'    => 1,
);

if ( 1 === absint( $slider_autoplay ) ) {
    $slick_args['autoplay']      = true;
    $slick_args['autoplaySpeed'] = 1000 * absint( $slider_delay );
}

if ( 1 === absint($slider_arrows) ) {
    $slick_args['arrows'] = true;
    
}else{
    $slick_args['arrows'] = false;
}

if ( 'fade' === $slider_effect ) {
    $slick_args['fade']      = true;
    
}else{
    $slick_args['fade']      = false;
}

if ( 'scrollVertz' === $slider_effect ) {
    $slick_args['vertical']      = true;
    
}else{
    $slick_args['vertical']      = false;
}

$slick_args_encoded = wp_json_encode( $slick_args );

//For full width slider if featured section is disabled
$show_featured_news = pt_magazine_get_option( 'show_featured_news' );

if ( true !== $show_featured_news ) {

	$full_slider_class  = 'full-width-slider';
	$slider_thumb 		= 'pt-magazine-full-slider';

}else{

	$full_slider_class 	= '';
	$slider_thumb 		= 'pt-magazine-slider';

}

?>

<div class="main-news-left <?php echo $full_slider_class; ?>">

	<?php 

	$slider_args = array(
		                'posts_per_page' 		=> 5,
		                'no_found_rows' 		=> true,
		                'post__not_in'          => get_option( 'sticky_posts' ),
		                'ignore_sticky_posts'   => true,
				        'meta_query'  			=> array(
										            array( 'key' => '_thumbnail_id' ),
										        ),
	            	);

	if ( absint( $slider_cat ) > 0 ) {

	    $slider_args['cat'] = absint( $slider_cat );
	    
	} 

	$slider_posts = new WP_Query( $slider_args );

	if ( $slider_posts->have_posts() ) : ?>

		<div class="main-slider" data-slick='<?php echo $slick_args_encoded; ?>'>

			<?php
	        
	        while ( $slider_posts->have_posts() ) :
	            
	            $slider_posts->the_post(); ?>

	            <div class="item">
	            
		            <article class="bigger-post">

		            	<?php 

		            	if ( true === $slider_overlay ) {

		            	    $overlay_class = 'post-image overlay';
		            	    
		            	}else{

		            	    $overlay_class = 'post-image';

		            	} ?>

		            	<div class="article-content-wrap">

							<figure class="<?php echo $overlay_class; ?>">
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( $slider_thumb ); ?></a>
							</figure><!-- .post-image -->

							<div class="post-content">							 
							 <span class="posted-date"><?php echo esc_html( get_the_date() ); ?></span>
							 <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							</div><!-- .post-content -->

		                </div>

		            </article> 

		        </div>

	            <?php

	        endwhile; 

	        wp_reset_postdata(); ?>

	    </div>

	    <?php

	endif; ?>
   
</div><!-- .main-news-left -->   