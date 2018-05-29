<?php
/**
 * WP hooks for this theme.
 *
 * @package Numinous
 */

/**
 * @see numinous_setup
*/
add_action( 'after_setup_theme', 'numinous_setup' );

/**
 * @see numinous_content_width
*/
add_action( 'after_setup_theme', 'numinous_content_width', 0 );

/**
 * @see numinous_template_redirect_content_width
*/
add_action( 'template_redirect', 'numinous_template_redirect_content_width' );

/**
 * @see numinous_scripts 
*/
add_action( 'wp_enqueue_scripts', 'numinous_scripts' );

/**
 * @see numinous_category_transient_flusher
*/
add_action( 'edit_category', 'numinous_category_transient_flusher' );
add_action( 'save_post',     'numinous_category_transient_flusher' );

/**
 * 
 * @see numinous_body_classes
*/
add_filter( 'body_class', 'numinous_body_classes' );

/**
 * @see numinous_excerpt_more
 * @see numinous_excerpt_length
*/
add_filter( 'excerpt_more', 'numinous_excerpt_more' );
add_filter( 'excerpt_length', 'numinous_excerpt_length', 999 );

/**
 * @see numinous_change_comment_form_default_fields
 * @see numinous_change_comment_form_defaults
*/
add_filter( 'comment_form_default_fields', 'numinous_change_comment_form_default_fields' );
add_filter( 'comment_form_defaults', 'numinous_change_comment_form_defaults' );

/**
 * @see numinous_exclude_posts
*/
add_filter( 'pre_get_posts', 'numinous_exclude_posts' );