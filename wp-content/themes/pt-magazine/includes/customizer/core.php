<?php
/**
 * Core functions.
 *
 * @package PT_Magazine
 */

if ( ! function_exists( 'pt_magazine_get_option' ) ) :

	/**
	 * Get theme option.
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function pt_magazine_get_option( $key ) {

		if ( empty( $key ) ) {

			return;

		}

		$pt_magazine_default = pt_magazine_get_default_theme_options();

		$default = ( isset( $pt_magazine_default[ $key ] ) ) ? $pt_magazine_default[ $key ] : '';
		$theme_options = get_theme_mod( 'theme_options', $pt_magazine_default );
		$theme_options = array_merge( $pt_magazine_default, $theme_options );
		$value = '';

		if ( isset( $theme_options[ $key ] ) ) {
			$value = $theme_options[ $key ];
		}

		return $value;

	}

endif;

if ( ! function_exists( 'pt_magazine_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function pt_magazine_get_default_theme_options() {

		$defaults = array();

		//primary color
		$defaults['primary_color'] 				= '#ff5a5f';

		//site identity
		$defaults['site_identity'] 				= 'title-text';

		// general settings.
		$defaults['site_layout']  				= 'full-width';
		$defaults['enable_sticky_sidebar']      = false;

		// Header.
		$defaults['show_top_header'] 			= true;
		$defaults['top_left_type'] 			    = 'trending-news';
		$defaults['top_right_type'] 			= 'social-icons';
		$defaults['trending_title'] 			= esc_html__( 'Trending :', 'pt-magazine' );
		$defaults['trending_category'] 			= '';
		$defaults['trending_post_number'] 		= 5;

		// Main Navigation.
		$defaults['show_home_icon'] 			= false;
		$defaults['show_search'] 				= false;
		$defaults['search_style'] 				= 'style-one';

		// Breadcrumb.
		$defaults['breadcrumb_type'] 			= 'simple';

		// Main Slider
		$defaults['show_main_slider'] 		    = false;
		$defaults['main_slider_category'] 		= '';
		$defaults['main_slider_autoplay'] 		= true;
		$defaults['main_slider_arrows'] 		= true;
		$defaults['main_slider_overlay'] 		= true;
		$defaults['slider_transition_effect'] 	= 'scrollHorz';
		$defaults['slider_transition_delay']    = 3;
		
		// Featured and Highlighted sections
		$defaults['show_featured_news'] 		= false;
		$defaults['featured_news_category'] 	= '';
		$defaults['show_highlighted_news'] 		= false;
		$defaults['highlighted_news_category'] 	= '';
		
		// Blog
		$defaults['sidebar_position']  			= 'right-sidebar';
		$defaults['post_list_type']	        	= 'grid';
		$defaults['blog_excerpt_length']		= 20;
		$defaults['blog_show_date']	    		= true;
		$defaults['blog_show_author'] 			= true;
		$defaults['blog_show_category']			= true;
		$defaults['blog_show_comments']			= true;
		$defaults['blog_read_more'] 		    = true;
		$defaults['blog_read_more_text'] 		= esc_html__( 'Read More', 'pt-magazine' );

		// Single 
		$defaults['show_featured_img'] 			= true;
		$defaults['single_show_date'] 			= true;
		$defaults['single_show_author'] 		= true;
		$defaults['single_show_category'] 		= true;
		$defaults['single_show_tags'] 			= true;
		$defaults['single_show_comments'] 		= true;
		$defaults['single_show_related'] 		= true;
		$defaults['related_post_title'] 		= esc_html__( 'Related Posts', 'pt-magazine' );
		$defaults['single_show_nav'] 		    = true;
		$defaults['single_show_author'] 		= true;

		// Footer.
		$defaults['copyright_text'] 			= esc_html__( 'Copyright &copy; All rights reserved.', 'pt-magazine' );

		return $defaults;
	}

endif;