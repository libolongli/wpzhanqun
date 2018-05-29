<?php 
function newsgem_wpb_move_comment_field_to_bottom( $fields ) {
$comment_field = $fields['comment'];
unset( $fields['comment'] );
$fields['comment'] = $comment_field;
return $fields;
}
add_filter( 'comment_form_fields', 'newsgem_wpb_move_comment_field_to_bottom' );
if( ! function_exists( 'newsgem_slider_ticker_hook' ) ):
	function newsgem_slider_ticker_hook() {
		$newsgem_ticker_args = array(
									'post_type' => 'post',
									'posts_per_page' => 5,
									'ignore_sticky_posts' => 1
								);
			$newsgem_ticker_query = new WP_Query( $newsgem_ticker_args );
			if( $newsgem_ticker_query->have_posts() ) {?>
				  <div class="banner">
      <div class="top-posts">
        <div class="col">
          <div id="slider-home" class="owl-carousel owl-theme slider-home">
          <?php while( $newsgem_ticker_query->have_posts() ) {
					$newsgem_ticker_query->the_post();$categories = get_the_category();
					$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');?>
          <div class="top-post">
          <?php if(!empty($featured_img_url)){?>
           <a href="<?php the_permalink(); ?>"><div class="post-img" style="background:url(<?php echo esc_url($featured_img_url);?>);"></div></a>
           <?php }?>
            <div class="overlay-text">
            <?php 
			if ( ! empty( $categories ) ) {
          echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '" class="overlay-title">' . esc_html( $categories[0]->name ) . '</a>';
            }
			?>
             <p class="post-title <?php if(empty($featured_img_url)){echo esc_attr('post-title-empty','newsgem');}?>"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></p> </div>
          </div>
          <?php }?>
          </div>
        </div>
      </div><!--top-posts-->
  </div><!--banner-->
                <?php 
			}
	}
endif;
add_action( 'newsgem_slider_ticker', 'newsgem_slider_ticker_hook' );
if( ! function_exists( 'newsgem_featurenews_first_hook' ) ):
	function newsgem_featurenews_first_hook() {?>
    <?php $feature_new_cat_one = get_theme_mod( 'feature_new_cat_one');?>
    <?php if(isset($feature_new_cat_one)&&!empty($feature_new_cat_one)){?>
              <div class="col-md-6 col-sm-6 col-xs-12 technology wow fadeInUp">
              <?php if(!empty($feature_new_cat_one)){?>
                <h5 class="page-title"><?php echo esc_html(get_cat_name($feature_new_cat_one));?></h5>
                <?php }?>
                <?php 
				$onefeat=1;
				$highlighted_newst1 = new WP_Query( array(
				'post_type'         => 'post',
				'category__in'      => $feature_new_cat_one,
				'posts_per_page'    =>'4'
			) );
			 while ($highlighted_newst1->have_posts()) : $highlighted_newst1->the_post();
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
				?>
                <?php if($onefeat++==1){?>
                   <div class="entry-post">
                   <?php if(!empty($featured_img_url)){?>
                    <div class="entry-img"><a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($featured_img_url);?>" alt=""></a></div>
                    <?php }?>
                    <div class="entry-info"><a href="<?php the_permalink(); ?>"><h4 class="entry-title"><?php the_title();?></h4></a></div>
                  </div><!--entry post-->
                  <?php }else{?>
                  <div class="entry-post">
                    <div class="entry-info"><a href="<?php the_permalink(); ?>"><i class="fa fa-external-link-square" aria-hidden="true"></i><?php the_title();?></a></div>
                  </div><!--entry post-->
                  <?php }?>
                 <?php endwhile;?>
              </div>
              
	<?php }}
endif;
add_action( 'newsgem_feature_news_first', 'newsgem_featurenews_first_hook' );	
//second
if( ! function_exists( 'newsgem_featurenews_second_hook' ) ):
	function newsgem_featurenews_second_hook() {?>
    <?php $feature_new_cat_two = get_theme_mod( 'feature_new_cat_two');?>
    <?php if(isset($feature_new_cat_two)&&!empty($feature_new_cat_two)){?>
              <div class="col-md-6 col-sm-6 col-xs-12 technology wow fadeInUp">
              <?php if(!empty($feature_new_cat_two)){?>
                <h5 class="page-title"><?php echo esc_html(get_cat_name($feature_new_cat_two));?></h5>
                <?php }?>
                <?php 
				$onefeattwo=1;
				$highlighted_newst2 = new WP_Query( array(
				'post_type'         => 'post',
				'category__in'      => $feature_new_cat_two,
				'posts_per_page'    =>'4'
			) );
			 while ($highlighted_newst2->have_posts()) : $highlighted_newst2->the_post();
				$featured_img_urltwo = get_the_post_thumbnail_url(get_the_ID(),'full');
				?>
                <?php if($onefeattwo++==1){?>
                   <div class="entry-post">
                   <?php if(!empty($featured_img_urltwo)){?>
                    <div class="entry-img"><a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($featured_img_urltwo);?>" alt=""></a></div>
                    <?php }?>
                    <div class="entry-info"><a href="<?php the_permalink(); ?>"><h4 class="entry-title"><?php the_title();?></h4></a></div>
                  </div><!--entry post-->
                  <?php }else{?>
                  <div class="entry-post">
                    <div class="entry-info"><a href="<?php the_permalink(); ?>"><i class="fa fa-external-link-square" aria-hidden="true"></i><?php the_title();?></a></div>
                  </div><!--entry post-->
                 <?php }?>
                 <?php endwhile;?>
              </div>
              
	<?php }}
endif;
add_action( 'newsgem_feature_news_second', 'newsgem_featurenews_second_hook' );	
//second secion news
if( ! function_exists( 'newsgem_featurenews_secondsecion_hook' ) ):
	function newsgem_featurenews_secondsecion_hook() {?>
    <?php $feature_new_second_cat_one = get_theme_mod( 'feature_new_second_cat_one');?>
    <?php if(isset($feature_new_second_cat_one)&&!empty($feature_new_second_cat_one)){?>
               <div class="col-md-6 col-sm-6 col-xs-12 technology wow fadeInUp">
               <?php if(!empty($feature_new_second_cat_one)){?>
                <h5 class="page-title"><?php echo esc_html(get_cat_name($feature_new_second_cat_one));?></h5>
                <?php }?>
                <?php 
				$onefeattwo=1;
				$highlighted_newst3 = new WP_Query( array(
				'post_type'         => 'post',
				'category__in'      => $feature_new_second_cat_one,
				'posts_per_page'    =>'4'
			) );
			 while ($highlighted_newst3->have_posts()) : $highlighted_newst3->the_post();
				$featured_img_urltwo3 = get_the_post_thumbnail_url(get_the_ID(),'full');
				?>
                <?php if($onefeattwo++==1){?>
                   <div class="entry-post">
                   <?php if(!empty($featured_img_urltwo3)){?>
                    <div class="entry-img"><a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($featured_img_urltwo3);?>" alt=""></a></div>
                    <?php }?>
                    <div class="entry-info"><a href="<?php the_permalink(); ?>"><h4 class="entry-title"><?php the_title();?></h4></a></div>
                  </div><!--entry post-->
                  <?php }else{?>
                  <div class="entry-post">
                    <div class="entry-info"><a href="<?php the_permalink(); ?>"><i class="fa fa-external-link-square" aria-hidden="true"></i><?php the_title();?></a></div>
                  </div><!--entry post-->
                 <?php }?>
                 <?php endwhile;?>
              </div>
              <?php }?>
              <?php  $feature_new_second_cat_two = get_theme_mod( 'feature_new_second_cat_two');?>
              <?php if(isset($feature_new_second_cat_two)&&!empty($feature_new_second_cat_two)){?>
              <?php 
			  $onefeattwo=1;
				$highlighted_newst4 = new WP_Query( array(
				'post_type'         => 'post',
				'category__in'      => $feature_new_second_cat_two,
				'posts_per_page'    =>'4'
			) );
			if($highlighted_newst4->have_posts()){
			  ?>
               <div class="col-md-6 col-sm-6 col-xs-12 technology wow fadeInUp">
              <?php if(!empty($feature_new_second_cat_two)){?>
                <h5 class="page-title"><?php echo esc_html(get_cat_name($feature_new_second_cat_two));?></h5>
                <?php }?>
                <?php 
			   while ($highlighted_newst4->have_posts()) : $highlighted_newst4->the_post();
				$featured_img_urltwo4 = get_the_post_thumbnail_url(get_the_ID(),'full');
				?>
                <?php if($onefeattwo++==1){?>
                   <div class="entry-post">
                    <?php if(!empty($featured_img_urltwo4)){?>
                    <div class="entry-img"><a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($featured_img_urltwo4);?>" alt=""></a></div>
                    <?php }?>
                    <div class="entry-info"><a href="<?php the_permalink(); ?>"><h4 class="entry-title"><?php the_title();?></h4></a></div>
                  </div><!--entry post-->
                  <?php }else{?>
                  <div class="entry-post">
                    <div class="entry-info"><a href="<?php the_permalink(); ?>"><i class="fa fa-external-link-square" aria-hidden="true"></i><?php the_title();?></a></div>
                  </div><!--entry post-->
                 <?php }?>
                 <?php endwhile;?>
              </div>
              <?php }}?>
	<?php }
endif;
add_action( 'newsgem_feature_news_secondsecion', 'newsgem_featurenews_secondsecion_hook' );	
if( ! function_exists( 'newsgem_featurenews_fullnews_hook' ) ):
	function newsgem_featurenews_fullnews_hook(){?>
    <?php $feature_new_third_cat_one = get_theme_mod( 'feature_new_third_cat_one');?>
    <?php if(isset($feature_new_third_cat_one)&&!empty($feature_new_third_cat_one)){?>
    <?php 
	$highlighted_newst5 = new WP_Query( array(
				'post_type'         => 'post',
				'category__in'      => $feature_new_third_cat_one,
				'posts_per_page'    =>'-1'
			) );
			if($highlighted_newst5->have_posts()){
	?>
     <div class="top-Stories wow fadeInUp">
     <?php if(!empty($feature_new_third_cat_one)){?>
              <h5 class="page-title"><span><?php echo esc_html(get_cat_name($feature_new_third_cat_one));?></span></h5>
              <?php }?>
              <div class="top-Stories-slider owl-carousel owl-theme">
                <?php 
			 while ($highlighted_newst5->have_posts()) : $highlighted_newst5->the_post();
				$featured_img_urltwo5 = get_the_post_thumbnail_url(get_the_ID(),'full');
				?>
                 <div class="item">
                  <div class="entry-post">
                  <?php if(!empty($featured_img_urltwo5)){?>
                    <div class="entry-img"><a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($featured_img_urltwo5);?>" alt=""></a></div>
                    <?php }?>
                    <div class="top-Stories-text"><div class="entry-info"><a href="<?php the_permalink(); ?>"><h4 class="entry-title"><?php the_title();?></h4></a>
                   <?php the_author_posts_link() ?> <span class="post-date"><?php echo get_the_date(); ?></span></div>
                    <p><?php the_excerpt();?></p>
                     </div><!--top-stories-text-->
                  </div>
                </div><!--item-->
                <?php endwhile;?>
              </div>
            </div><!--top-stories-->
            <?php }}?>
	<?php }
endif;
add_action( 'newsgem_feature_fullnews', 'newsgem_featurenews_fullnews_hook' );	
if( ! function_exists( 'newsgem_author_social_hook' ) ):
	function newsgem_author_social_hook(){?>
           <div class="social">
             <ul>
             <?php 
			 $fb_link=get_theme_mod( 'fb_link');
			 $tw_link=get_theme_mod( 'tw_link');
			 $gp_link=get_theme_mod( 'gp_link');
			 $insta_link=get_theme_mod( 'insta_link');
			 $skype_link=get_theme_mod( 'skype_link');
			 $pin_link=get_theme_mod( 'pin_link');
			 $flickr_link=get_theme_mod( 'flickr_link');
			 $vimeo_link=get_theme_mod( 'vimeo_link');
			 $youtube_link=get_theme_mod( 'youtube_link');
			 $dribbble_link=get_theme_mod( 'dribbble_link');
			 $linkedin_link=get_theme_mod( 'linkedin_link');
			 $tumblr_link=get_theme_mod( 'tumblr_link');
			 $rss_link=get_theme_mod( 'rss_link');
			 ?>
             <?php if(isset($fb_link)&&!empty($fb_link)){?>
               <li><a href="<?php echo esc_url($fb_link);?>" class="facebook"><i class="fa fa-facebook"></i></a></li>
               <?php }?>
               <?php if(isset($tw_link)&&!empty($tw_link)){?>
               <li><a href="<?php echo esc_url($tw_link);?>" class="twitter"><i class="fa fa-twitter"></i></a></li>  
                <?php }?>
                <?php if(isset($gp_link)&&!empty($gp_link)){?>
               <li><a href="<?php echo esc_url($gp_link);?>" class="google"><i class="fa fa-google-plus"></i></a></li> 
               <?php }?>
               <?php if(isset($linkedin_link)&&!empty($linkedin_link)){?>    
               <li><a href="<?php echo esc_url($linkedin_link);?>" class="linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
               <?php }?>
               <?php if(isset($pin_link)&&!empty($pin_link)){?> 
               <li><a href="<?php echo esc_url($pin_link);?>" class="pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
               <?php }?>
               <?php if(isset($youtube_link)&&!empty($youtube_link)){?>
               <li><a href="<?php echo esc_url($youtube_link);?>" class="youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li> 
               <?php }?>
               <?php if(isset($rss_link)&&!empty($rss_link)){?>
               <li><a href="<?php echo esc_url($rss_link);?>" class="rss"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
               <?php }?>
               <?php if(isset($insta_link)&&!empty($insta_link)){?>
               <li><a href="<?php echo esc_url($insta_link);?>" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li> 
               <?php }?>
               <?php if(isset($vimeo_link)&&!empty($vimeo_link)){?>
               <li><a href="<?php echo esc_url($vimeo_link);?>" class="vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
               <?php }?>
               <?php if(isset($skype_link)&&!empty($skype_link)){?>
               <li><a href="<?php echo esc_url($skype_link);?>" class="skype"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
               <?php }?>
               <?php if(isset($flickr_link)&&!empty($flickr_link)){?>
               <li><a href="<?php echo esc_url($flickr_link);?>" class="flickr"><i class="fa fa-flickr" aria-hidden="true"></i></a></li>
               <?php }?>
               <?php if(isset($dribbble_link)&&!empty($dribbble_link)){?>
               <li><a href="<?php echo esc_url($dribbble_link);?>" class="dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
               <?php }?>
               <?php if(isset($tumblr_link)&&!empty($tumblr_link)){?>
               <li><a href="<?php echo esc_url($tumblr_link);?>" class="tumblr"><i class="fa fa-tumblr" aria-hidden="true"></i></a></li>
               <?php }?>
               </ul>
            </div><!--close-social-->
<?php }endif;
add_action( 'newsgem_author_social', 'newsgem_author_social_hook' );
/**
 * Related posts
 */
add_action( 'newsgem_related_posts', 'newsgem_related_posts' );
if( !function_exists( 'newsgem_related_posts' ) ):
    function newsgem_related_posts() {
?>
        <?php
                wp_reset_postdata();
                global $post;
                if( empty( $post ) ) {
                    $post_id = '';
                } else {
                    $post_id = $post->ID;
                }
                // Define related post arguments
                $related_args = array(
                    'no_found_rows'            => true,
                    'update_post_meta_cache'   => false,
                    'update_post_term_cache'   => false,
                    'ignore_sticky_posts'      => 1,
                    'orderby'                  => 'rand',
                    'post__not_in'             => array( $post_id ),
                    'posts_per_page'           => 3
                );


                    $categories = get_the_category( $post_id );
                    if ( $categories ) {
                        $category_ids = array();
                        foreach( $categories as $individual_category ) {
                            $category_ids[] = $individual_category->term_id;
                        }
                        $related_args['category__in'] = $category_ids;
                    }

                $related_query = new WP_Query( $related_args );
                if( $related_query->have_posts() ) {?>
                <div class="news-pictures releted-post left-bar-news-pictures wow fadeInUp">
               <h5 class="page-title"><?php esc_html_e('RELATED ARTICLES','newsgem');?></h5>
               <div class="news-pictures-slider2">
                    <?php echo '<div class="related-posts-wrapper clearfix">';
                    while( $related_query->have_posts() ) {
                        $related_query->the_post();
                         $featured_img_urlrel = get_the_post_thumbnail_url(get_the_ID(),'full');
                ?>
                        <div class="entry-post">
                        <?php if(!empty($featured_img_urlrel)){?>
             <div class="entry-img"><a href="<?php the_permalink();?>"><img src="<?php echo esc_url($featured_img_urlrel);?>" alt=""></a></div>
             <?php }?>
             <div class="entry-info"><a href="<?php the_permalink();?>"><h4 class="news-title"><?php the_title(); ?></h4></a></div>
           </div>
                <?php
                    }
                    echo '</div>';?>
					</div>
            </div><!-- .vmag-related-wrapper -->
                <?php }
                wp_reset_query();
        ?>
        
<?php
    }
endif;

if( ! function_exists( 'newsgem_author_info_hook' ) ):
function newsgem_author_info_hook(){?>
<?php 
 global $post;
        $author_id = $post->post_author;
        $author_avatar = get_avatar( $author_id, '132' );
        $author_nickname = get_the_author_meta( 'display_name' );
?>
<div class="entry_admin wow fadeInUp">
                    <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );?>"><?php echo $author_avatar; ?><span class="admin-name"><?php echo esc_html( $author_nickname ); ?></span></a>
                     <?php do_action( 'newsgem_author_social' ); ?>
                <p><?php echo get_the_author_meta('description');?></p>
               </div><!--entry_admin-->	
<?php }endif;
add_action( 'newsgem_author_info', 'newsgem_author_info_hook' );
//search
if( ! function_exists( 'newsgem_searchform_hook' ) ):
function newsgem_searchform_hook(){?>
<div class="search">
         <form method="get" id="advanced-searchform" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
         <input type="text" name="s" id="s" class="search-input" placeholder="<?php echo esc_attr__('search','newsgem');?>">
         <span class="search-btn"> <i class="fa fa-search" aria-hidden="true"></i></span>
         </form>
       </div>
<?php }endif;
add_action( 'newsgem_searchform', 'newsgem_searchform_hook' );
//bracking post
if( ! function_exists( 'newsgem_bracking_hook' ) ):
function newsgem_bracking_hook(){?>
<div class="col-md-8 col-sm-12 col-xs-12">
            <div class="current-news">
               <span><?php echo esc_html(date_i18n(get_option('date_format')));?></span>
               <div id="blinking" class="bracking-news">
                 <ul>
                   <?php
                 $today = getdate();
$args=array('post_type' => 'post','order'=>'DESC','post_status' => 'publish','posts_per_page' => 5);
$custom_query = new WP_Query( $args );
				 ?>
                 <?php  while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
                   <li><?php the_time() ?> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <?php the_title();?></li>
                   <?php endwhile;?>
                </ul>
              </div><!--example-->
            </div>
          </div>
<?php }endif;
add_action( 'newsgem_bracking', 'newsgem_bracking_hook' );
//logo
if( ! function_exists( 'newsgem_logo_hook' ) ):
function newsgem_logo_hook(){?>
<div class="col-md-4 col-sm-5 col-xs-12">
            <div class="logo">
              <div class="img-logo"> <?php if(function_exists( 'the_custom_logo')){if(has_custom_logo()){?>
            <?php the_custom_logo();?>
           <?php }else{?>
          <?php $header_textcolor=get_theme_mod('header_textcolor');if($header_textcolor!=='blank'){?>
            <a href="<?php echo esc_url(home_url()); ?>"><h2 class="logo-title"><?php echo bloginfo('name');?></h2></a>
            <?php }?>
            <?php $header_textcolor=get_theme_mod('header_textcolor');if($header_textcolor!=='blank'){?>
           <p><?php bloginfo('description'); ?></p>
           <?php }}}?></div>
            </div><!--close-logo-->
          </div>
<?php }endif;
add_action( 'newsgem_logo', 'newsgem_logo_hook' );
//copyright
if( ! function_exists( 'newsgem_copyright_hook' ) ):
function newsgem_copyright_hook(){?>
<?php
         $copyright=get_theme_mod('copyright' );
		  if(isset($copyright) && $copyright!='')
		  {?>
<div class="copyright text-center">
      <div class="container">
      <?php  echo esc_html($copyright) ;?>
		  </div>
    </div>
  <?php }?>  
<?php }endif;
add_action( 'newsgem_copyright', 'newsgem_copyright_hook' );
//contact form
if( ! function_exists( 'newsgem_contactform_hook' ) ):
function newsgem_contactform_hook(){?>
<div class="col-md-8 col-sm-8 col-xs-12">
         <div class="left-bar">
          <div class="contact_section">
               <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="contact_form wow fadeInUp animated">
                <?php $contact=get_theme_mod('contact_form');?>
                <?php $contacttitle=get_the_title($contact); ?>
                 <h5 class="page-title"><?php esc_html_e( 'SEND US A MESSAGE', 'newsgem' ); ?></h5>
                 <?php echo do_shortcode('[contact-form-7 id="'.$contact.'" title="'.$contacttitle.'"]');?>
                  </div><!--contact_form-->
                 </div><!--col-->
               </div><!--row-->
            </div><!--single_post-->
          </div><!--left-bar-->
        </div><!--col-->
<?php }endif;
add_action( 'newsgem_contactform', 'newsgem_contactform_hook' );
//404 page
if( ! function_exists( 'newsgem_404_hook' ) ):
function newsgem_404_hook(){?>
<div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="left-bar">
            <div class="error-page wow fadeInUp animated">
            <h1 class="number"><?php esc_html_e( '404', 'newsgem' ); ?></h1>
            <h2 class="text"><?php esc_html_e( 'OOPS, SORRY ', 'newsgem' ); ?><span><?php esc_html_e( 'PAGE NOT FOUND', 'newsgem' ); ?></span></h2>
            <p><?php  esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'newsgem' ); ?><p>
            <a href="<?php echo esc_url(home_url('/'));?>" class="btn"><?php esc_html_e( 'Home Page', 'newsgem' ); ?></a>
            </div><!--typography-->
          </div><!--left-bar-->
        </div><!--col-->
       </div><!--row-->
   </div><!--content-->
   </div><!--col-->
<?php }endif;
add_action( 'newsgem_404', 'newsgem_404_hook' );
//Header ads
if( ! function_exists( 'newsgem_headerads_hook' ) ):
function newsgem_headerads_hook(){?>
<?php  if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
		   <?php dynamic_sidebar( 'sidebar-3' ); ?>
          <?php endif; ?>
<?php }endif;
add_action( 'newsgem_headerads', 'newsgem_headerads_hook' );
function newsgem_body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}
	return $classes;
}
add_filter( 'body_class', 'newsgem_body_classes' );
?>