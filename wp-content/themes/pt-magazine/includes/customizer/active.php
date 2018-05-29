<?php
/**
 * Functions for active_callback.
 *
 * @package PT_Magazine
 */

if ( ! function_exists( 'pt_magazine_is_top_search_active' ) ) :

	/**
	 * Check if show search in top header is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function pt_magazine_is_top_search_active( $control ) {

		if ( true == $control->manager->get_setting( 'theme_options[show_search]' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;

if ( ! function_exists( 'pt_magazine_is_top_header_active' ) ) :

	/**
	 * Check if featured slider is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function pt_magazine_is_top_header_active( $control ) {

		if ( true == $control->manager->get_setting( 'theme_options[show_top_header]' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;

if ( ! function_exists( 'pt_magazine_is_top_header_trending_active' ) ) :

	/**
	 * Check if featured slider is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function pt_magazine_is_top_header_trending_active( $control ) {

		if ( true == $control->manager->get_setting( 'theme_options[show_top_header]' )->value() && ( 'trending-news' == $control->manager->get_setting( 'theme_options[top_left_type]' )->value() ) ) {
			return true;
		} else {
			return false;
		}

	}

endif;

if ( ! function_exists( 'pt_magazine_is_main_slider_active' ) ) :

	/**
	 * Check if show search in top header is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function pt_magazine_is_main_slider_active( $control ) {

		if ( true == $control->manager->get_setting( 'theme_options[show_main_slider]' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;

if ( ! function_exists( 'pt_magazine_is_featured_news_active' ) ) :

	/**
	 * Check if featured news is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function pt_magazine_is_featured_news_active( $control ) {

		if ( true == $control->manager->get_setting( 'theme_options[show_featured_news]' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;

if ( ! function_exists( 'pt_magazine_is_highlighted_news_active' ) ) :

	/**
	 * Check if highlighted news is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function pt_magazine_is_highlighted_news_active( $control ) {

		if ( true == $control->manager->get_setting( 'theme_options[show_highlighted_news]' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;

if ( ! function_exists( 'pt_magazine_is_read_more_active' ) ) :

	/**
	 * Check if show read more button is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function pt_magazine_is_read_more_active( $control ) {

		if ( true == $control->manager->get_setting( 'theme_options[blog_read_more]' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;

if ( ! function_exists( 'pt_magazine_is_relative_posts_active' ) ) :

	/**
	 * Check if show related posts is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function pt_magazine_is_relative_posts_active( $control ) {

		if ( true == $control->manager->get_setting( 'theme_options[single_show_related]' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;