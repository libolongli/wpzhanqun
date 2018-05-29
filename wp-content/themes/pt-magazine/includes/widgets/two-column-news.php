<?php
/**
 * Custom widgets.
 *
 * @package PT_Magazine
 */

if ( ! class_exists( 'PT_Magazine_Two_Column_News' ) ) :

	/**
	 * Two Column News widget class.
	 *
	 * @since 1.0.0
	 */
	class PT_Magazine_Two_Column_News extends WP_Widget {

	    function __construct() {
	    	$opts = array(
				'classname'   => 'two-col-section news-col-2',
				'description' => esc_html__( 'Widget to display news in two columns.', 'pt-magazine' ),
    		);

			parent::__construct( 'pt-magazine-two-column-news', esc_html__( 'PT: Two Column News', 'pt-magazine' ), $opts );
	    }


	    function widget( $args, $instance ) {

			$first_title 	    = !empty( $instance['first_title'] ) ? $instance['first_title'] : '';

			$first_category     = ! empty( $instance['first_category'] ) ? $instance['first_category'] : 0;

			$second_title 	    = !empty( $instance['second_title'] ) ? $instance['second_title'] : '';

			$second_category    = ! empty( $instance['second_category'] ) ? $instance['second_category'] : 0;

            $view_all_text      = !empty( $instance['view_all_text'] ) ? $instance['view_all_text'] : '';

            $excerpt_length     = !empty( $instance['excerpt_length'] ) ? $instance['excerpt_length'] : 12;

            $post_number        = ! empty( $instance['post_number'] ) ? $instance['post_number'] : 3;


	        echo $args['before_widget']; ?>

	        <div class="two-column-news two-column-news-left">

        		<div class="section-title">

			        <?php 

			        if ( $first_title ) {
			        	echo $args['before_title'] . esc_html( $first_title ) . $args['after_title'];
			        } 

                    if( ! empty( $view_all_text ) ){

                        if( absint( $first_category ) > 0 ){

                            $cat_link = get_category_link( $first_category );

                        }else{

                            $cat_link = '';

                        } ?>

                        <a href="<?php echo esc_url( $cat_link ); ?>"><?php echo esc_html( $view_all_text ); ?></a>

                        <?php

                    } ?>

		        </div>

                <div class="inner-wrapper">
        	        <?php

        	        $first_col_args = array(
	        				        	'posts_per_page' 		=> absint( $post_number ),
	        				        	'no_found_rows'  		=> true,
	        				        	'post__not_in'          => get_option( 'sticky_posts' ),
	        				        	'ignore_sticky_posts'   => true,
	        			        	);

        	        if ( absint( $first_category ) > 0 ) {

        	        	$first_col_args['cat'] = absint( $first_category );
        	        	
        	        }


        	        $first_col_posts = new WP_Query( $first_col_args );

        	        if ( $first_col_posts->have_posts() ) :

        	        	$first_col_count = 1;

						while ( $first_col_posts->have_posts() ) :

                            $first_col_posts->the_post(); 

                            if( 1 === $first_col_count ){ ?>

        	                    <div class="news-item">
        							<div class="news-thumb">
        								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('pt-magazine-tall'); ?></a>  
        							</div><!-- .news-thumb --> 

        	                       <div class="news-text-wrap">
        	                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        	                            
        	                            <span class="posted-date"><?php echo esc_html( get_the_date() ); ?></span>
                                        <?php 

                                        $first_content = pt_magazine_get_the_excerpt( absint( $excerpt_length ) );
                                        
                                        echo wp_kses_post($first_content) ? wpautop( wp_kses_post($first_content) ) : '';

                                        ?>

        	                       </div><!-- .news-text-wrap -->
        	                    </div><!-- .news-item -->

                            	<?php

                            }else{ ?>

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

                            } 

	                        $first_col_count++;

						endwhile; 

                        wp_reset_postdata(); ?>

                    <?php endif; ?>
                </div><!-- .inner-wrapper -->

	        </div><!-- .two-column-news-left -->

	        <div class="two-column-news two-column-news-right">

        		<div class="section-title">

			        <?php 

			        if ( $second_title ) {
			        	echo $args['before_title'] . esc_html( $second_title ) . $args['after_title'];
			        }

                    if( ! empty( $view_all_text ) ){

                        if( absint( $second_category ) > 0 ){

                            $cat_link_second = get_category_link( $second_category );

                        }else{

                            $cat_link_second = '';

                        } ?>

                        <a href="<?php echo esc_url( $cat_link_second ); ?>"><?php echo esc_html( $view_all_text ); ?></a>

                        <?php

                    } ?>

		        </div>

                <div class="inner-wrapper">
        	        <?php

        	        $second_col_args = array(
	        				        	'posts_per_page' 		=> absint( $post_number ),
	        				        	'no_found_rows'  		=> true,
	        				        	'post__not_in'          => get_option( 'sticky_posts' ),
	        				        	'ignore_sticky_posts'   => true,
	        			        	);

        	        if ( absint( $second_category ) > 0 ) {

        	        	$second_col_args['cat'] = absint( $second_category );
        	        	
        	        }


        	        $second_col_posts = new WP_Query( $second_col_args );

        	        if ( $second_col_posts->have_posts() ) :

        	        	$second_col_count = 1;

						while ( $second_col_posts->have_posts() ) :

                            $second_col_posts->the_post(); 

                            if( 1 === $second_col_count ){ ?>

        	                    <div class="news-item">
        							<div class="news-thumb">
        								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('pt-magazine-tall'); ?></a>  
        							</div><!-- .news-thumb --> 

                                    <div class="news-text-wrap">
                                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                        
                                        <span class="posted-date"><?php echo esc_html( get_the_date() ); ?></span>
                                        <?php 

                                        $second_content = pt_magazine_get_the_excerpt( absint( $excerpt_length ) );
                                        
                                        echo wp_kses_post($second_content) ? wpautop( wp_kses_post($second_content) ) : '';

                                        ?>

                                    </div><!-- .news-text-wrap -->

        	                    </div><!-- .news-item -->

                            	<?php

                            }else{ ?>

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

                            } 

	                        $second_col_count++;

						endwhile; 

                        wp_reset_postdata(); ?>

                    <?php endif; ?>
                </div><!-- .inner-wrapper -->

	        </div><!-- .two-column-news-right -->

	        <?php
	        echo $args['after_widget'];

	    }

	    function update( $new_instance, $old_instance ) {
	        $instance = $old_instance;
			$instance['first_title'] 	= sanitize_text_field( $new_instance['first_title'] );
			$instance['first_category'] = absint( $new_instance['first_category'] );
			$instance['second_title'] 	= sanitize_text_field( $new_instance['second_title'] );
			$instance['second_category']= absint( $new_instance['second_category'] );
            $instance['view_all_text']  = sanitize_text_field( $new_instance['view_all_text'] );
            $instance['excerpt_length'] = absint( $new_instance['excerpt_length'] );
            $instance['post_number']    = absint( $new_instance['post_number'] );

	        return $instance;
	    }

	    function form( $instance ) {

	        $instance = wp_parse_args( (array) $instance, array(
				'first_title' 			=> '',
				'first_category'  		=> '',
				'second_title' 			=> '',
				'second_category'  		=> '',
                'view_all_text'         => esc_html__( 'View All', 'pt-magazine' ),
                'excerpt_length'        => 12,
                'post_number'           => 3,

	        ) );
	        ?>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Layout', 'pt-magazine' ); ?></label>
                <img src="<?php echo get_template_directory_uri(); ?>/includes/widgets/images/two-column.jpg" class="layout-img">
            </p>
	        
	        <p>
	        	<label for="<?php echo esc_attr( $this->get_field_id( 'first_title' ) ); ?>"><strong><?php esc_html_e( 'First Column Title:', 'pt-magazine' ); ?></strong></label>
	        	<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'first_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'first_title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['first_title'] ); ?>" />
	        </p>
	        <p>
	          <label for="<?php echo  esc_attr( $this->get_field_id( 'first_category' ) ); ?>"><strong><?php esc_html_e( 'First Column Category:', 'pt-magazine' ); ?></strong></label>
				<?php
	            $cat_args = array(
	                'orderby'         => 'name',
	                'hide_empty'      => 0,
	                'class' 		  => 'widefat',
	                'taxonomy'        => 'category',
	                'name'            => $this->get_field_name( 'first_category' ),
	                'id'              => $this->get_field_id( 'first_category' ),
	                'selected'        => absint( $instance['first_category'] ),
	                'show_option_all' => esc_html__( 'All Categories','pt-magazine' ),
	              );
	            wp_dropdown_categories( $cat_args );
				?>
	        </p>

            <p>
            	<label for="<?php echo esc_attr( $this->get_field_id( 'second_title' ) ); ?>"><strong><?php esc_html_e( 'Second Column Title:', 'pt-magazine' ); ?></strong></label>
            	<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'second_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'second_title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['second_title'] ); ?>" />
            </p>
            <p>
              <label for="<?php echo  esc_attr( $this->get_field_id( 'second_category' ) ); ?>"><strong><?php esc_html_e( 'Second Column Category:', 'pt-magazine' ); ?></strong></label>
    			<?php
                $cat_args = array(
                    'orderby'         => 'name',
                    'hide_empty'      => 0,
                    'class' 		  => 'widefat',
                    'taxonomy'        => 'category',
                    'name'            => $this->get_field_name( 'second_category' ),
                    'id'              => $this->get_field_id( 'second_category' ),
                    'selected'        => absint( $instance['second_category'] ),
                    'show_option_all' => esc_html__( 'All Categories','pt-magazine' ),
                  );
                wp_dropdown_categories( $cat_args );
    			?>
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'view_all_text' ) ); ?>"><strong><?php esc_html_e( 'View All Text:', 'pt-magazine' ); ?></strong></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'view_all_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'view_all_text' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['view_all_text'] ); ?>" />
                <small>
                    <?php esc_html_e('Leave this field empty if you want to hide it.', 'pt-magazine'); ?>   
                </small>
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_name('excerpt_length') ); ?>">
                    <?php esc_html_e('Excerpt Length:', 'pt-magazine'); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('excerpt_length') ); ?>" name="<?php echo esc_attr( $this->get_field_name('excerpt_length') ); ?>" type="number" value="<?php echo absint( $instance['excerpt_length'] ); ?>" />
            </p>

            <p>
              <label for="<?php echo esc_attr( $this->get_field_id( 'post_number' ) ); ?>"><strong><?php esc_html_e( 'Number of Posts:', 'pt-magazine' ); ?></strong></label>
                <?php
                $this->dropdown_post_number( array(
                    'id'       => $this->get_field_id( 'post_number' ),
                    'name'     => $this->get_field_name( 'post_number' ),
                    'selected' => absint( $instance['post_number'] ),
                    )
                );
                ?>
            </p>
	       
	        <?php
	    }

        function dropdown_post_number( $args ) {
            $defaults = array(
                'id'       => '',
                'name'     => '',
                'selected' => 0,
            );

            $r = wp_parse_args( $args, $defaults );
            $output = '';

            $choices = array(
                '3' => 3,
                '5' => 5,
                '7' => 7,
            );

            if ( ! empty( $choices ) ) {

                $output = "<select name='" . esc_attr( $r['name'] ) . "' id='" . esc_attr( $r['id'] ) . "'>\n";
                foreach ( $choices as $key => $choice ) {
                    $output .= '<option value="' . esc_attr( $key ) . '" ';
                    $output .= selected( $r['selected'], $key, false );
                    $output .= '>' . esc_html( $choice ) . '</option>\n';
                }
                $output .= "</select>\n";
            }

            echo $output;
        }

	}

endif;