<?php
/**
 * Custom widgets.
 *
 * @package PT_Magazine
 */

if ( ! class_exists( 'PT_Magazine_Tabbed_Content' ) ) :

	/**
	 * Tabbed content widget class.
	 *
	 * @since 1.0.0
	 */
	class PT_Magazine_Tabbed_Content extends WP_Widget {

	    function __construct() {
	    	$opts = array(
				'classname'   => 'tabbed-widget widget_popular_stories',
				'description' => esc_html__( 'Widget to display popular news, recent posts and comments in tab.', 'pt-magazine' ),
    		);

			parent::__construct( 'pt-magazine-tabbed-content', esc_html__( 'PT: Tabbed Content', 'pt-magazine' ), $opts );
	    }


	    function widget( $args, $instance ) {

            $popular_number     = ! empty( $instance['popular_number'] ) ? $instance['popular_number'] : 5;
            $recent_number      = ! empty( $instance['recent_number'] ) ? $instance['recent_number'] : 5;
            $commented_number   = ! empty( $instance['commented_number'] ) ? $instance['commented_number'] : 5;

	        echo $args['before_widget']; ?>

	        <div class="tab-news-holder">
                  <ul class="tabbed-news-side">
                     <li class="active">
                         <a href="#popular-news" title="<?php esc_html_e( 'Popular', 'pt-magazine' ); ?>"><i class="fa fa-thumbs-o-up"></i></a>
                     </li>

                     <li>
                         <a href="#recent-news" title="<?php esc_html_e( 'Recent', 'pt-magazine' ); ?>"><i class="fa fa-clock-o"></i></a>
                     </li>

                      <li>
                         <a href="#commented-news" title="<?php esc_html_e( 'Comments', 'pt-magazine' ); ?>"><i class="fa fa-comments-o"></i></a>
                     </li>

                     
                 </ul>
             </div>

             <div class="content-tab-side">

                 <div id="popular-news" class="pane-tab-side active">

                    <?php

                    $popular_args = array(
                                        'posts_per_page'        => absint( $popular_number ),
                                        'no_found_rows'         => true,
                                        'post__not_in'          => get_option( 'sticky_posts' ),
                                        'ignore_sticky_posts'   => true,
                                        'post_status'           => 'publish', 
                                        'orderby'               => 'comment_count', 
                                        'order'                 => 'desc',
                                    );

                    $popular_posts = new WP_Query( $popular_args );

                    if ( $popular_posts->have_posts() ) :


                        while ( $popular_posts->have_posts() ) :

                            $popular_posts->the_post(); ?>

                            <div class="news-item layout-two">
                                <div class="news-thumb">
                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('pt-magazine-thumbnail'); ?></a>   
                                </div><!-- .news-thumb --> 

                               <div class="news-text-wrap">
                                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                     <span class="posted-date"><?php echo esc_html( get_the_date() ); ?></span>
                               </div><!-- .news-text-wrap -->
                            </div><!-- .news-item -->

                            <?php

                        endwhile; 

                        wp_reset_postdata(); ?>

                    <?php endif; ?>

                 </div>

                 <div id="recent-news" class="pane-tab-side">

                    <?php

                    $recent_args = array(
                                        'posts_per_page'        => absint( $recent_number ),
                                        'no_found_rows'         => true,
                                        'post__not_in'          => get_option( 'sticky_posts' ),
                                        'ignore_sticky_posts'   => true,
                                        'post_status'           => 'publish', 
                                    );

                    $recent_posts = new WP_Query( $recent_args );

                    if ( $recent_posts->have_posts() ) :


                        while ( $recent_posts->have_posts() ) :

                            $recent_posts->the_post(); ?>

                            <div class="news-item layout-two">
                                <div class="news-thumb">
                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('pt-magazine-thumbnail'); ?></a>   
                                </div><!-- .news-thumb --> 

                               <div class="news-text-wrap">
                                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                     <span class="posted-date"><?php echo esc_html( get_the_date() ); ?></span>
                               </div><!-- .news-text-wrap -->
                            </div><!-- .news-item -->

                            <?php

                        endwhile; 

                        wp_reset_postdata(); ?>

                    <?php endif; ?>

                  </div>

                 <div id="commented-news" class="pane-tab-side">

                    <?php

                    $avatar_size    = 105;
                    $comment_args   = array(
                                        'number'       => absint( $commented_number ),
                                    );

                    $comments_query = new WP_Comment_Query;
                    
                    $comments = $comments_query->query( $comment_args );

                    if ( $comments ) :

                        foreach ( $comments as $comment ) { ?>

                            <div class="news-item layout-two">
                                <div class="news-thumb">
                                    <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><?php echo get_avatar( $comment->comment_author_email, $avatar_size ); ?></a>   
                                </div><!-- .news-thumb --> 

                               <div class="news-text-wrap">
                                    <h2>
                                        <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><span class="commented-post"><?php echo esc_html( get_the_title($comment->comment_post_ID) ); ?></span></a>
                                    </h2> 

                                    <span class="comment-author"><?php esc_html_e( 'By', 'pt-magazine' ); ?> <?php echo esc_html( get_comment_author( $comment->comment_ID ) ); ?></span>

                                    <?php 
                                    $date_format    = get_option( 'date_format' );

                                    $comment_date   = get_comment_date( $date_format, $comment->comment_ID ); ?>
                                    
                                    <span class="posted-date"><?php echo esc_html( $comment_date ); ?></span>                                 
                               </div><!-- .news-text-wrap -->
                            </div><!-- .news-item -->

                            <?php

                        }

                    endif; ?>

                 </div>
             </div>

	        

	        <?php
	        echo $args['after_widget'];

	    }

	    function update( $new_instance, $old_instance ) {
	        $instance = $old_instance;
            $instance['popular_number']    = absint( $new_instance['popular_number'] );
            $instance['recent_number']     = absint( $new_instance['recent_number'] );
            $instance['commented_number']  = absint( $new_instance['commented_number'] );

	        return $instance;
	    }

	    function form( $instance ) {

	        $instance = wp_parse_args( (array) $instance, array(
                'popular_number'    => 5,
                'recent_number'     => 5,
                'commented_number'  => 5,
	        ) );
	        ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_name('popular_number') ); ?>">
                    <?php esc_html_e('Popular Post Number:', 'pt-magazine'); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('popular_number') ); ?>" name="<?php echo esc_attr( $this->get_field_name('popular_number') ); ?>" type="number" value="<?php echo absint( $instance['popular_number'] ); ?>" />
            </p>
	       
            <p>
               <label for="<?php echo esc_attr( $this->get_field_name('recent_number') ); ?>">
                   <?php esc_html_e('Recent Post Number:', 'pt-magazine'); ?>
               </label>
               <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('recent_number') ); ?>" name="<?php echo esc_attr( $this->get_field_name('recent_number') ); ?>" type="number" value="<?php echo absint( $instance['recent_number'] ); ?>" />
            </p>

            <p>
               <label for="<?php echo esc_attr( $this->get_field_name('commented_number') ); ?>">
                   <?php esc_html_e('Commented Post Number:', 'pt-magazine'); ?>
               </label>
               <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('commented_number') ); ?>" name="<?php echo esc_attr( $this->get_field_name('commented_number') ); ?>" type="number" value="<?php echo absint( $instance['commented_number'] ); ?>" />
            </p>
           
	        <?php
	    }

	}

endif;