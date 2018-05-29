<?php
/**
 * SportsMag functions and definitions
 *
 * @package SportsMag
 */
/* ================================================================================================================================ */

/**
 * Enqueue Child theme custom script
 */
function sportsmag_styles_scripts() {
    $sportsmag_my_theme = wp_get_theme();
    $sportsmag_theme_version = $sportsmag_my_theme->get( 'Version' );
    wp_enqueue_style( 'sportsmag-parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'sportsmag-responsive', get_stylesheet_directory_uri() . '/css/responsive.css', esc_attr( $sportsmag_theme_version ) );
    wp_enqueue_script( 'sportsmag-custom-scripts', get_stylesheet_directory_uri() . '/js/custom-scripts.js', array('jquery'), esc_attr( $sportsmag_theme_version ) );
    $menu_sticky_option = of_get_option( 'menu_sticky', '1' );
    if( !empty( $menu_sticky_option ) && $menu_sticky_option == 1 ) {
        wp_enqueue_script( 'sportsmag-sticky-menu-setting', get_stylesheet_directory_uri(). '/js/sportsmag-sticky-setting.js', array( 'jquery-sticky' ), esc_attr($sportsmag_theme_version), true );
    }
}

add_action('wp_enqueue_scripts', 'sportsmag_styles_scripts');

function sportsmag_deque_script_settings() {
     wp_dequeue_script( 'accesspress-mag-sticky-menu-setting' );
}
add_action( 'wp_footer', 'sportsmag_deque_script_settings', 11 );
/* ================================================================================================================================ */

/**
 * Add some option in theme option
 */
function child_theme_options($options) {

    $options[] = array(
        'name' => __( 'Child Theme Settings', 'sportsmag' ),
        'type' => 'heading'
    );
    $options[] = array(
        'name' => __( 'Home Page Settings', 'sportsmag' ),
        'type' => 'groupstart',
        'id' => 'child_theme_home_settings'
    );
    $options[] = array(
        'name' => __( 'Latest Articles', 'sportsmag' ),
        'desc' => __( 'Show or hide latest ariticle section', 'sportsmag' ),
        'id' => 'popular_section_option',
        'on' => __( 'Show', 'sportsmag' ),
        'off' => __( 'Hide', 'sportsmag' ),
        'std' => '1',
        'type' => 'switch'
    );
    $options[] = array(
        'name' => __( 'Latest Articles Title', 'sportsmag' ),
        'desc' => __( 'Add block name as you like (example: Latest Articles)', 'sportsmag' ),
        'id' => 'popular_block_name',
        'type' => 'text',
        'std' => __( 'Latest Articles', 'sportsmag' ),
    );
    $options[] = array(
        'name' => __( 'Youtube Lists', 'sportsmag' ),
        'desc' => __( 'Show or hide youtube playlist section', 'sportsmag' ),
        'id' => 'youtube_section_option',
        'on' => __( 'Show', 'sportsmag' ),
        'off' => __( 'Hide', 'sportsmag' ),
        'std' => '1',
        'type' => 'switch'
    );
    $options[] = array(
        'name' => __( 'Youtube Lists Title', 'sportsmag' ),
        'desc' => __( 'Add your title for youtube list section', 'sportsmag' ),
        'id' => 'youtube_list_title',
        'type' => 'text',
        'std' => 'Youtube Videos',
    );
    $options[] = array(
        'name' => __( 'Youtube Video Ids', 'sportsmag' ),
        'desc' => __( "Add youtube id's separated by comma (ex: xrt27dZ7DOA, u8--jALkijM, HusniLw9i68):", 'sportsmag' ),
        'id' => 'youtube_list_ids',
        'type' => 'text',
        'std' => ' ',
    );
    $options[] = array(
        'type' => 'groupend'
    );
    return $options;
}

add_filter('of_options', 'child_theme_options');
/* ================================================================================================================================ */
/**
 * Disable header ad widget area
 */
add_action( 'widgets_init', 'disable_header_ad_widgets', 50 );

function disable_header_ad_widgets() {
        unregister_sidebar( 'accesspress-mag-header-ad' );
}
/* ================================================================================================================================ */
/**
 * Function to replace slider in SportsMag
 */
add_action( 'sportsmag_grid', 'sportsmag_grid_callback', 10 );
if ( !function_exists( 'sportsmag_grid_callback' ) ):
    function sportsmag_grid_callback() {
        $sportsmag_slider_posts_option = of_get_option( 'slider_post_option', ' ' );
        $sportsmag_slider_category = of_get_option( 'homepage_slider_category' );
        $sportsmag_grid_args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 5,
            'order' => 'DESC',
            'meta_query' => array(
                array(
                    'key' => '_thumbnail_id',
                    'compare' => '!=',
                    'value' => null
                )
            )
        );
        if ( ( $sportsmag_slider_posts_option == 'cat' ) && ( !empty( $sportsmag_slider_category ) ) ) {
            $sportsmag_grid_args['category_name'] = $sportsmag_slider_category;
        }
        $sportsmag_grid_query = new WP_Query( $sportsmag_grid_args );
        $sportsmag_grid_count = 0;
        if ( $sportsmag_grid_query->have_posts() ) {
            ?>
            <div class="sm-grid-wrapper clearfix">
                <?php
                while ( $sportsmag_grid_query->have_posts() ) {
                    $sportsmag_grid_count++;
                    $sportsmag_grid_query->the_post();
                    $sportsmag_post_id = get_the_ID();
                    $sportsmag_image_id = get_post_thumbnail_id();
                    $sportsmag_image_path = wp_get_attachment_image_src( $sportsmag_image_id, 'accesspress-mag-slider-big-thumb', true );
                    $sportsmag_image_path_small = wp_get_attachment_image_src( $sportsmag_image_id, 'accesspress-mag-singlepost-style1', true );
                    $sportsmag_image_alt = get_post_meta( $sportsmag_image_id, '_wp_attachment_image_alt', true );
                    $categories = get_the_category();
                    foreach ( $categories as $cat ) {
                        $sportsmag_cat_name = $cat->name;
                        $sportsmag_cat_id = $cat->term_id;
                        $sportsmag_cat_link = get_category_link( $sportsmag_cat_id );
                    }
                    if ( $sportsmag_grid_count == 1 ) {
                        ?>
                        <div class="grid-big-post">
                            <div class="grid-thumb">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <img src="<?php echo esc_url( $sportsmag_image_path[0] ); ?>" alt="<?php echo esc_attr( $sportsmag_image_alt ); ?>" title="<?php the_title(); ?>" />
                                </a>
                                <div class="bg-overlay-outer">
                                    <div class="bg-overlay-inner">
                                        <div class="grid-meta-container">
                                            <div class="meta-align">
                                                <div class="big-meta">
                                                    <a href="<?php echo esc_url( $sportsmag_cat_link ); ?>" class="post-category"><?php echo esc_attr( $sportsmag_cat_name ); ?></a>
                                                    <h3 class="entry-title grid-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                </div>
                                            </div><!-- .meta-align -->
                                            <div class="post-author-details clearfix">
                                                <span class="post-author"><?php the_author_posts_link(); ?></span>
                                                <span class="post-date"><time class="entry-date published updated" datetime="<?php echo esc_attr( get_the_date('c') ); ?>"><?php echo esc_html( get_the_date() ); ?></time></span>
                                                <?php do_action( 'accesspress_mag_post_meta' );?>
                                            </div><!-- .post-author-details -->
                                        </div><!-- .grid-meta-container -->
                                    </div><!-- .bg-overlay-inner -->
                                </div><!-- .bg-overlay-outer -->
                            </div><!-- .grid-thumb -->
                        </div><!-- .grid-big-post -->
                        <?php
                    } else {
                        if ( $sportsmag_grid_count == 2 ) {
                            echo '<div class="grid-posts-bunch"><div class="grid-posts-bunch-inner clearfix">';
                        }
                        ?>
                        <div class="grid-small-post grid-small-common">
                            <div class="grid-thumb">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <img src="<?php echo esc_url( $sportsmag_image_path_small[0] ); ?>" alt="<?php echo esc_attr( $sportsmag_image_alt ); ?>" title="<?php the_title(); ?>" />
                                </a>
                                <div class="bg-overlay-outer">
                                    <div class="bg-overlay-inner">
                                        <div class="grid-meta-container">
                                            <div class="meta-align">
                                                <div class="big-meta">
                                                    <a href="<?php echo esc_url( $sportsmag_cat_link ); ?>" class="post-category"><?php echo esc_attr( $sportsmag_cat_name ); ?></a>
                                                    <h3 class="entry-title grid-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                </div>
                                            </div><!-- .meta-align -->
                                        </div><!-- .grid-meta-container -->
                                    </div><!-- .bg-overlay-inner -->
                                </div><!-- .bg-overlay-outer -->
                            </div><!-- .grid-thumb -->
                        </div><!-- .grid-small-post -->
                        <?php
                        if ( $sportsmag_grid_count == 5 ) {
                            echo '</div></div>';
                        }
                    }
                }
                ?>
            </div><!-- .sm-grid-wrapper -->
            <?php
        }
    }
endif;
/* ================================================================================================================================ */
/**
 * Youtube list
 */
add_action( 'sportsmag_youtube_list', 'sportsmag_youtube_list_callback', 10 );

if ( !function_exists( 'sportsmag_youtube_list_callback') ):
    function sportsmag_youtube_list_callback() {
        $sportsmag_list_option = of_get_option( 'youtube_section_option', 1 );
        if ( $sportsmag_list_option == 1 ) {
            $list_title = of_get_option( 'youtube_list_title', __( 'Youtube Videos', 'sportsmag' ) );
            $video_ids = of_get_option( 'youtube_list_ids' );
            echo '<h3 class="block-title"> <span> ' . esc_attr( $list_title ) . '</span></h3> <div class="youtube_wrapper clearfix"><div class="single-thumb-wrapper-inner clearfix">';
            ?>

            <?php
                if ( !empty( $video_ids ) ) {
                    $f_count = 0;
                    $t_count = 0;
                    $http = ( !empty( $_SERVER['HTTPS'] ) ) ? "https" : "http";
                    $seperate_id = explode( ', ', $video_ids );
                    echo '<div class="single-frame-wrapper">';
                    foreach ( $seperate_id as $key => $value ) {
                        $f_count++;
                        $video_url = $http . '://www.youtube.com/watch?v=' . $value;
            ?>
                        <div class="video-frame" id="ytvideo-<?php echo esc_attr( $f_count ); ?>" style="display: <?php if ( $f_count == 1 ) { echo 'block'; } else { echo 'none'; } ?>;">
                             <?php echo wp_oembed_get( $video_url, array( 'width' => 550 ) ); ?>
                        </div><!-- .video-frame -->
            <?php
                    }
                    echo '</div>';
                    echo '<div class="single-thumb-wrapper">';
                    foreach ( $seperate_id as $key => $value ) {
                        $t_count++;
                        $response = wp_remote_get( 'https://www.googleapis.com/youtube/v3/videos?id='. $value .'&part=id,contentDetails,snippet&key=AIzaSyB-_5C58WnIYkBU0VSA1gWbOfPDpISMaOo', array(
        							'sslverify' => false
        						) );
                        if ( is_wp_error( $response ) ) {
                            break;
                        }
            
            			$data = wp_remote_retrieve_body($response);
            
                        if ( is_wp_error( $data ) ) {
                            break;
                        }
            
            			$obj = json_decode($data, true);
                        $video_thumb = $obj['items'][0]['snippet']['thumbnails']['default']['url'];
                        $video_title = $obj['items'][0]['snippet']['title'];
                        $video_duration = sportsmag_covtime( $obj['items'][0]['contentDetails']['duration'] );
                        
            ?>
                        <div class="list-thumb clearfix <?php if ($t_count == 1) { echo 'active'; } ?>" id="thumb-<?php echo esc_attr( $t_count ); ?>">
                            <figure class="list-thumb-figure">
                                <img src="<?php echo esc_url( $video_thumb ); ?>" alt="" title="<?php echo esc_attr( $video_title );?>" />
                            </figure>
                            <div class="list-thumb-details">
                                <span class="thumb-title"><?php echo esc_attr( $video_title ); ?></span>
                                <span class="thumb-time"><?php echo $video_duration ; ?></span>
                            </div>
                        </div>
            <?php
                    }
                echo '</div></div></div>';
            }
        }//endif $sportsmag_list_option
    }
endif;

function sportsmag_covtime( $duration ) {
    preg_match_all( '/(\d+)/', $duration ,$parts );

     //Put in zeros if we have less than 3 numbers.
    if ( count( $parts[0] ) == 1 ) {
        array_unshift( $parts[0], "0", "0" );
    } elseif ( count( $parts[0] ) == 2 ) {
        array_unshift( $parts[0], "0" );
    }

    $sec_init = $parts[0][2];
    $seconds = $sec_init%60;
    $seconds = str_pad( $seconds, 2, "0", STR_PAD_LEFT );
    $seconds_overflow = floor( $sec_init/60 );

    $min_init = $parts[0][1] + $seconds_overflow;
    $minutes = ( $min_init )%60;
    $minutes = str_pad( $minutes, 2, "0", STR_PAD_LEFT );
    $minutes_overflow = floor( ( $min_init )/60 );

    $hours = $parts[0][0] + $minutes_overflow;    

    if($hours != 0)
    {
        return $hours.':'.$minutes.':'.$seconds;
    } else {
        return $minutes.':'.$seconds;
    }        
}

/* ================================================================================================================================ */
/*Modified posted on function for child theme*/
function accesspress_mag_posted_on() {
    $sportsmag_show_post_date = of_get_option( 'post_show_date' );
    $sportsmag_show_author = of_get_option( 'show_author_name' );

    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);
    
    if( $sportsmag_show_post_date == 1 ){
	  $posted_on = sprintf(
    		_x( '- %s', 'post date', 'sportsmag' ),$time_string
    		
            //'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
    	);	   
	} else {
        $posted_on = '';
    }    
    
    if( $sportsmag_show_author == 1 ){
        $byline = sprintf(
    		_x( '%s', 'post author', 'sportsmag' ),
    		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
    	);
    } else {
        $byline='';
    }	

	echo '<span class="byline"> ' . $byline . ' </span><span class="posted-on">' . $posted_on . '</span>';
}

add_action( 'admin_enqueue_scripts', 'sportsmag_admin_enqueue_scripts' );

function sportsmag_admin_enqueue_scripts() {
    wp_enqueue_style( 'sportsmag-admin-styles', get_stylesheet_directory_uri(). '/css/admin.css' );
}

function sportsmag_pro_promo_banner() {
    ?>
    <div class="spmag-promo-banner clearfix">
        <div class="banner-image">
            <img src="<?php echo get_stylesheet_directory_uri().'/images/upgradeb.jpg' ?>" />
        </div> 
        <div class="button-link">
            <?php
                $pro_demo_link = 'http://demo.accesspressthemes.com/sportsmag-pro';
                $pro_upgrade_link = 'http://accesspressthemes.com/wordpress-themes/sportsmag-pro';
            ?>
            <a href="<?php echo esc_url( $pro_demo_link ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri().'/inc/option-framework/images/demo-btn.png'?>"/></a>
            <a href="<?php echo esc_url( $pro_upgrade_link ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri().'/inc/option-framework/images/upgrade-btn.png' ?>"/></a>
        </div>
        <div class="any-question">
            <?php echo sprintf( __('Any question!! Click <a href="%s" target="_blank"> here!! </a> for live chat', 'sportsmag'), esc_url('https://accesspressthemes.com/contact/')); ?>
        </div>

        <div class="view-features">
        <h3><?php _e('View Features','sportsmag'); ?> <span>+<span></h3>
        
        <div style="display:none" class="view-features-img">
        <img src="<?php echo get_stylesheet_directory_uri().'/images/supgrade-mag-pro-features.jpg'?>" />
        </div>
        </div>
    </div>
    <?php
}

add_action( 'optionsframework_after', 'sportsmag_pro_promo_banner' );