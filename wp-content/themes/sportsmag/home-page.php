<?php
/**
 * Template Name: Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package SportsMag
 */
get_header();
?>

<section class="slider-wrapper">
    <div class="apmag-container"> 
        <?php 
            $sportsmag_grid_sec_option = of_get_option( 'slider_option', '1' );
            if( $sportsmag_grid_sec_option == 1 ) {
                do_action( 'sportsmag_grid' );    
            }
        ?>
    </div>                  
</section><!-- .slider-wrapper -->
<div class="apmag-container">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <section class="popular-news wow fadeInUp clearfix" data-wow-delay="0.5s">
                <?php
                    $sportsmag_popular_block_show_option = of_get_option( 'popular_section_option', '1' );
                    if ( $sportsmag_popular_block_show_option == '1' ) {
                        $sportsmag_popular_block_name = of_get_option( 'popular_block_name', __( 'Popular text', 'sportsmag' ) );
                ?>                
                    <div class="popular-block-wrapper">
                        <h3 class="block-title"><span><?php echo esc_attr( $sportsmag_popular_block_name ); ?></span></h3>
                        <div class="block-post-wrapper clearfix">
                        <?php
                            $sportsmag_popular_args = array(
                                'post_type' => 'post',
                                'post_status' => 'publish',
                                'posts_per_page' => 6,
                                'order' => 'DESC'
                            );
                            $sportsmag_popular_query = new WP_Query($sportsmag_popular_args);
                            $sportsmag_total_posts_block1 = $sportsmag_popular_query->post_count;
                            $sportsmag_pop_count = 0;
                            if ( $sportsmag_popular_query->have_posts() ) {
                                while ( $sportsmag_popular_query->have_posts() ) {
                                    $sportsmag_popular_query->the_post();
                                    $sportsmag_pop_count++;
                                    $sportsmag_pop_image_id = get_post_thumbnail_id();
                                    $sportsmag_pop_image_alt = get_post_meta( $sportsmag_pop_image_id, '_wp_attachment_image_alt', true );
                                    if ( $sportsmag_pop_count == 1 ) {
                                        echo '<div class="toppost-wrapper">';
                                    } if ( $sportsmag_pop_count > 2 && $sportsmag_pop_count == 3 ) {
                                        echo '<div class="bottompost-wrapper">';
                                    }
                                    if( $sportsmag_pop_count <= 2 ) {
                                        $single_post_class = 'top-post non-zoomin';
                                        $sportsmag_image_size = wp_get_attachment_image_src( $sportsmag_pop_image_id, 'accesspress-mag-block-big-thumb', true );
                                    } else {
                                        $single_post_class = '';
                                        $sportsmag_image_size = wp_get_attachment_image_src( $sportsmag_pop_image_id, 'accesspress-mag-block-small-thumb', true );
                                    }
                        ?>
                                <div class="single_post clearfix <?php echo $single_post_class; ?>">                                        
                                    <div class="post-image">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php if( has_post_thumbnail() ) { ?>
                                                <img src="<?php echo esc_url( $sportsmag_image_size[0] );?>" alt="<?php echo esc_attr( $sportsmag_pop_image_alt ); ?>" />
                                            <?php } else { ?>
                                                <img src="<?php echo esc_url( get_template_directory_uri(). '/images/no-image-small.jpg' ); ?>" alt="<?php _e( 'No image', 'sportsmag' ); ?>" />
                                            <?php } ?>
                                        </a>
                                        <?php if ( $sportsmag_pop_count <= 2 ) { ?> <a class="big-image-overlay" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><i class="fa fa-external-link"></i></a><?php } ?>
                                    </div><!-- .post-image -->
                                    
                                    <div class="post-desc-wrapper">
                                        <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>                                    
                                        <div class="block-poston"><?php if( $sportsmag_pop_count <=2 ){ ?> <span class="post-author"><?php the_author_posts_link(); ?></span> <?php } ?><?php do_action( 'accesspress_mag_home_posted_on' ); ?></div>
                                    </div><!-- .post-desc-wrapper -->
                                    <?php if ( $sportsmag_pop_count <= 2 ) { ?><div class="post-content"><?php echo '<p>' . accesspress_mag_word_count( get_the_content(), 25 ) . '</p>'; ?></div><?php } ?>
                                </div><!-- .single_post -->
                                <?php
                                if ( $sportsmag_pop_count % 2 == 0 ) {
                                    echo '<div class="clearfix"></div>';
                                }
                                if ( $sportsmag_pop_count > 2 && $sportsmag_pop_count == $sportsmag_total_posts_block1 ) {
                                    echo '</div>';
                                }
                                if ( $sportsmag_pop_count == 2 ) {
                                    echo '</div>';
                                }
                            }//endwhile
                        }//endif
                    ?>
                        </div><!-- .block-post-wrapper -->
                    </div><!-- .popular-block-wrapper -->
                
                <?php
                    }
                    wp_reset_query();
                ?>
            </section><!-- .popular-news -->

            <section class="first-block wow fadeInUp clearfix" data-wow-delay="0.5s">
                <?php
                    $sportsmag_block1_cat = of_get_option( 'featured_block_1' );
                    if ( !empty( $sportsmag_block1_cat ) ) {
                        $sportsmag_posts_for_block1 = of_get_option( 'posts_for_block1' );
                        $sportsmag_category_info = get_category_by_slug( $sportsmag_block1_cat );
                ?>
                    <div class="first-block-wrapper">
                        <h3 class="block-title"><span><?php echo esc_attr( $sportsmag_category_info->name ); ?></span></h3>
                        <div class="block-post-wrapper block-Carousel clearfix">
                        <?php
                            $sportsmag_block1_args = array(
                                'category_name' => $sportsmag_block1_cat,
                                'post_status' => 'publish',
                                'posts_per_page' => $sportsmag_posts_for_block1,
                                'order' => 'DESC'
                            );
                            $sportsmag_block1_query = new WP_Query( $sportsmag_block1_args );
                            $total_posts_block1 = $sportsmag_block1_query->found_posts;
                            if ( $sportsmag_block1_query->have_posts() ) {
                                while ( $sportsmag_block1_query->have_posts() ) {
                                    $sportsmag_block1_query->the_post();
                                    $sportsmag_b1_image_id = get_post_thumbnail_id();
                                    $sportsmag_b1_image_path = wp_get_attachment_image_src( $sportsmag_b1_image_id, 'accesspress-mag-singlepost-style1', true );
                                    $sportsmag_b1_image_alt = get_post_meta( $sportsmag_b1_image_id, '_wp_attachment_image_alt', true );
                                    ?>
                            <div class="single_post clearfix top-post non-zoomin">
                                <?php if ( has_post_thumbnail() ) { ?>   
                                    <div class="post-image toggle-section-image"><a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url( $sportsmag_b1_image_path[0] ); ?>" alt="<?php echo esc_attr( $sportsmag_b1_image_alt ); ?>" title="<?php the_title(); ?>" /></a>
                                        <a class="big-image-overlay" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><i class="fa fa-external-link"></i></a>
                                    </div>                                
                                <?php } else { ?>
                                    <div class="post-image toggle-section-image"><a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url( get_template_directory_uri(). '/images/no-image-medium.jpg' );?>" alt="<?php _e( 'No image', 'sportsmag' );?>" /></a>
                                        <a class="big-image-overlay" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><i class="fa fa-external-link"></i></a>
                                    </div>
                                <?php } ?>
                                <div class="post-desc-wrapper">
                                    <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <div class="block-poston">
                                        <span class="post-author"><?php the_author_posts_link(); ?></span>
                                        <?php do_action( 'accesspress_mag_home_posted_on' ); ?>
                                    </div>
                                    <div class="post-content"><?php echo '<p>' . accesspress_mag_word_count( get_the_content(), 25 ) . '</p>'; ?></div>
                                </div><!-- .post-desc-wrapper -->
                            </div><!-- .single_post -->
                            <?php
                        }
                    }
                ?>
                        </div><!-- .block-post-wrapper -->
                    </div><!-- .first-block-wrapper -->
                <?php
                    }
                    wp_reset_query();
                ?>
            </section><!-- .first-block -->
            

            <?php if ( is_active_sidebar( 'accesspress-mag-homepage-inline-ad' ) ) : ?>
                <div class="homepage-middle-ad wow flipInX" data-wow-delay="1s">
                    <?php dynamic_sidebar( 'accesspress-mag-homepage-inline-ad' ); ?> 
                </div><!-- .homepage-middle-ad -->
            <?php endif; ?>

            <section class="second-block clearfix wow fadeInLeft" data-wow-delay="0.5s">
                <?php
                    $sportsmag_block2_cat = of_get_option( 'featured_block_2' );
                    if ( !empty( $sportsmag_block2_cat ) ) {
                        $sportsmag_posts_for_block2 = of_get_option( 'posts_for_block2' );
                        $sportsmag_category_info_2 = get_category_by_slug( $sportsmag_block2_cat );
                ?>
                    <div class="second-block-wrapper">
                        <h3 class="block-title"><span><?php echo esc_attr( $sportsmag_category_info_2->name ) ;?></span></h3>
                        <div class="block-post-wrapper clearfix">
                        <?php 
                            $sportsmag_block2_args = array(
                                'category_name' => $sportsmag_block2_cat,
                                'post_status' => 'publish',
                                'posts_per_page' => $sportsmag_posts_for_block2,
                                'order' => 'DESC'
                            );
                            $sportsmag_block2_query = new WP_Query( $sportsmag_block2_args );
                            $sportsmag_b_counter = 0;
                            $sportsmag_total_posts_block2 = $sportsmag_block2_query->found_posts;
                            if ( $sportsmag_block2_query->have_posts() ) {
                                while ( $sportsmag_block2_query->have_posts() ) {
                                    $sportsmag_b_counter++;
                                    $sportsmag_block2_query->the_post();
                                    $sportsmag_b2_image_id = get_post_thumbnail_id();
                                    $sportsmag_b2_image_alt = get_post_meta( $sportsmag_b2_image_id, '_wp_attachment_image_alt', true );
                                    if ( $sportsmag_b_counter == 1 ) {
                                        echo '<div class="leftposts-wrapper">';
                                    } if ( $sportsmag_b_counter > 1 && $sportsmag_b_counter == 2 ) {
                                        echo '<div class="rightposts-wrapper">';
                                    }
                                    if( $sportsmag_b_counter == 1 ) {
                                        $sportsmag_b2_image_size = wp_get_attachment_image_src( $sportsmag_b2_image_id, 'accesspress-mag-block-big-thumb', true );
                                    } else {
                                        $sportsmag_b2_image_size = wp_get_attachment_image_src( $sportsmag_b2_image_id, 'accesspress-mag-block-small-thumb', true );
                                    }
                        ?>
                                    <div class="single_post clearfix <?php if ( $sportsmag_b_counter == 1 ) { echo 'first-post non-zoomin'; } ?>">                                    
                                        <div class="post-image">
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                <?php if( has_post_thumbnail() ) { ?>
                                                    <img src="<?php echo esc_url( $sportsmag_b2_image_size[0] ); ?>" alt="<?php echo esc_attr( $sportsmag_b2_image_alt ); ?>" />
                                                <?php } else { ?>
                                                    <img src="<?php echo esc_url( get_template_directory_uri(). '/images/no-image-small.jpg' ); ?>" alt="<?php  _e( 'No image', 'sportsmag' ); ?>" />
                                                <?php } ?>
                                            </a>
                                            <?php if ( $sportsmag_b_counter == 1 ): ?> <a class="big-image-overlay" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><i class="fa fa-external-link"></i></a><?php endif; ?>
                                        </div><!-- .post-image -->
                                        <div class="post-desc-wrapper">
                                            <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                            <div class="block-poston">
                                                <?php if( $sportsmag_b_counter == 1 ) { ?><span class="post-author"><?php the_author_posts_link(); ?></span><?php } ?>
                                                <?php do_action( 'accesspress_mag_home_posted_on' ); ?>
                                            </div>
                                        </div><!-- .post-desc-wrapper -->
                                        <?php if ( $sportsmag_b_counter == 1 ) { ?><div class="post-content"><?php echo '<p>' . accesspress_mag_word_count( get_the_content(), 25 ) . '</p>'; ?></div><?php } ?>
                                    </div><!-- .single_post -->
                            <?php
                                if ( $sportsmag_b_counter == 1 ) {
                                    echo '</div>';
                                } if ( $sportsmag_b_counter > 1 && $sportsmag_b_counter == $sportsmag_total_posts_block2 ) {
                                    echo '</div>';
                                }
                            ?>                    
                        <?php
                                }
                            }
                        ?>
                        </div><!-- .block-post-wrapper -->
                    </div><!-- .second-block-wrapper -->
                <?php
                    }
                    wp_reset_query();
                ?>
            </section><!-- .second-block -->

            <section class="third-block clearfix wow fadeInUp" data-wow-delay="0.5s">
                <?php
                    $sportsmag_block3_cat = of_get_option( 'featured_block_3' );
                    if ( !empty( $sportsmag_block3_cat ) ) {
                        $sportsmag_posts_for_block3 = of_get_option( 'posts_for_block3' );
                        $sportsmag_category_info_3 = get_category_by_slug( $sportsmag_block3_cat );
                ?>
                    <div class="first-block-wrapper">
                        <h3 class="block-title"><span><?php echo esc_attr( $sportsmag_category_info_3->name ) ;?></span></h3>
                        <div class="blockSlider">
                        <?php
                            $sportsmag_block3_args = array(
                                'category_name' => $sportsmag_block3_cat,
                                'post_status' => 'publish',
                                'posts_per_page' => $sportsmag_posts_for_block3,
                                'order' => 'DESC'
                            );
                            $sportsmag_block3_query = new WP_Query( $sportsmag_block3_args );
                            $sportsmag_b_counter = 0;
                            $sportsmag_total_posts_block3 = $sportsmag_block3_query->found_posts;
                            if ( $sportsmag_block3_query->have_posts() ) {
                                while ( $sportsmag_block3_query->have_posts() ) {
                                    $sportsmag_b_counter++;
                                    $sportsmag_block3_query->the_post();
                                    $sportsmag_b3_image_id = get_post_thumbnail_id();
                                    $sportsmag_b3_image_path = wp_get_attachment_image_src( $sportsmag_b3_image_id, 'accesspress-mag-block-big-thumb', true );
                                    $sportsmag_b3_image_alt = get_post_meta( $sportsmag_b3_image_id, '_wp_attachment_image_alt', true );
                        ?>
                                <div class="single_post clearfix">                                
                                    <div class="post-image">
                                        <a href="<?php the_permalink(); ?>"  title="<?php the_title(); ?>">
                                            <?php if( has_post_thumbnail() ) { ?>
                                                <img src="<?php echo esc_url( $sportsmag_b3_image_path[0] ); ?>" alt="<?php echo esc_attr( $sportsmag_b3_image_alt ); ?>"/>
                                            <?php } else { ?>
                                                <img src="<?php echo esc_url( get_template_directory_uri(). '/images/no-image-medium.jpg' );?>" alt="<?php _e( 'No image', 'sportsmag' );?>" />
                                            <?php } ?>
                                        </a>
                                    </div><!-- .post-image -->                                    
                                    <div class="post-desc-wrapper">
                                        <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    </div>
                                </div><!-- .single_post -->
                        <?php
                                }
                            }
                        ?>
                        </div><!-- .blockSlider -->
                    </div><!-- .first-block-wrapper" -->
                <?php
                    }
                    wp_reset_query();
                ?>
            </section><!-- .third-block -->

            <section class="youtube-lists-wrapper clearfix">
                <?php do_action( 'sportsmag_youtube_list' ); ?>
            </section>

            <section class="forth-block clearfix wow fadeInRight" data-wow-delay="0.5s">
                <?php
                    $sportsmag_block4_cat = of_get_option( 'featured_block_4' );
                    if ( !empty( $sportsmag_block4_cat ) ) {
                        $sportsmag_posts_for_block4 = of_get_option( 'posts_for_block4' );
                        $sportsmag_category_info_4 = get_category_by_slug( $sportsmag_block4_cat );
                ?>
                        <div class="second-block-wrapper">
                            <h3 class="block-title"><span><?php echo esc_attr( $sportsmag_category_info_4->name ) ;?></span></h3>
                            <div class="block-post-wrapper clearfix">
                            <?php
                                $sportsmag_block4_args = array(
                                    'category_name' => $sportsmag_block4_cat,
                                    'post_status' => 'publish',
                                    'posts_per_page' => $sportsmag_posts_for_block4,
                                    'order' => 'DESC'
                                );
                                $sportsmag_block4_query = new WP_Query( $sportsmag_block4_args );
                                $sportsmag_b4_counter = 0;
                                $sportsmag_total_posts_block4 = $sportsmag_block4_query->found_posts;
                                if ( $sportsmag_block4_query->have_posts() ) {
                                    while ( $sportsmag_block4_query->have_posts() ) {
                                        $sportsmag_b4_counter++;
                                        $sportsmag_block4_query->the_post();
                                        $sportsmag_b4_image_id = get_post_thumbnail_id();
                                        $sportsmag_b4_image_alt = get_post_meta( $sportsmag_b4_image_id, '_wp_attachment_image_alt', true );
                                        $sportsmag_categories = get_the_category();
                                        if ( $sportsmag_b4_counter == 2 ) { echo '<div class="single-block-wrapper clearfix">'; }
                                        if( $sportsmag_b4_counter == 1 ) {
                                            $sportsmag_b4_image_size = wp_get_attachment_image_src( $sportsmag_b4_image_id, 'accesspress-mag-slider-big-thumb', true );
                                        } else {
                                            $sportsmag_b4_image_size = wp_get_attachment_image_src( $sportsmag_b4_image_id, 'accesspress-mag-singlepost-style1', true );
                                        }
                            ?>
                                <div class="single_post clearfix <?php if ( $sportsmag_b4_counter == 1 ) { echo 'top-post non-zoomin'; } ?>"> 
                                    <div class="post-image">
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                        <?php if( has_post_thumbnail() ) { ?>
                                            <img src="<?php echo esc_url( $sportsmag_b4_image_size[0] ); ?>" alt="<?php echo esc_attr( $sportsmag_b4_image_alt ); ?>" />
                                        <?php } else { ?>
                                            <img src="<?php echo esc_url( get_template_directory_uri(). '/images/no-image-medium.jpg' ); ?>" alt="<?php _e( 'No image', 'sportsmag' );?>" />
                                        <?php } ?>
                                        </a>
                                        <?php if ( $sportsmag_b4_counter == 1 ) { ?> <a class="big-image-overlay" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><i class="fa fa-external-link"></i></a><?php } ?>
                                    </div><!-- .post-image -->
                                    <div class="post-content-wrapper">
                                        <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>                                    
                                        <div class="post-author-details">
                                            <div class="block-poston">
                                                <span class="post-author"><?php the_author_posts_link(); ?></span>
                                                <?php do_action( 'accesspress_mag_home_posted_on' ); ?>
                                            </div>
                                            <?php if ( $sportsmag_b4_counter >= 2 ) { ?> 
                                                <div class="post-content"><?php echo '<p>' . accesspress_mag_word_count( get_the_content(), 30 ) . '</p>'; ?></div>
                                            <?php } ?>
                                        </div><!-- .post-author-details -->
                                    </div><!-- .post-content-wrapper -->   
                                </div><!-- .single_post -->
                            <?php 
                                if ( $sportsmag_b4_counter == $sportsmag_posts_for_block4 ) { echo '</div>'; } 
                                    }
                                }
                            ?>
                            </div><!-- .block-post-wrapper -->
                        </div><!-- .second-block-wrapper -->
                <?php 
                    }
                    wp_reset_query();
                ?>
            </section><!-- .forth-block -->
        </main><!-- #main -->
    </div><!-- #primary -->
    <?php
        wp_reset_query();
        $sportsmag_page_sidebar = get_post_meta( $post->ID, 'accesspress_mag_page_sidebar_layout', true );
        if ( $sportsmag_page_sidebar != 'no-sidebar' ) { get_sidebar( 'home' ); }
    ?>
</div><!-- .apmag-container -->
<?php get_footer(); ?>