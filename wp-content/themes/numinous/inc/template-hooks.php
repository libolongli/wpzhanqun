<?php
/**
 * Template hooks for this theme.
 *
 * @package Numinous
 */
 
/**
 * Doctype
 * 
 * @see numinous_doctype_cb
*/
add_action( 'numinous_doctype', 'numinous_doctype_cb' );

/**
 * Before wp_head
 * 
 * @see numinous_head
*/
add_action( 'numinous_before_wp_head', 'numinous_head' );

/**
 * Before Header
 * 
 * @see numinous_page_start - 20
 * @see numinous_top_header - 30
*/
add_action( 'numinous_before_header', 'numinous_page_start', 20 );
add_action( 'numinous_before_header', 'numinous_top_header', 30 );

/**
 * Top Header
 * 
 * @see numinous_breaking_news - 20
 * @see numinous_social_icon   - 30 
*/
add_action( 'numinous_top_header', 'numinous_breaking_news', 20  );
add_action( 'numinous_top_header', 'numinous_social_icon', 30  );

/**
 * Numinous Header
 * 
 * @see numinous_header_start  - 20
 * @see numinous_header_top    - 30
 * @see numinous_header_bottom - 40
 * @see numinous_header_end    - 100 
*/
add_action( 'numinous_header', 'numinous_header_start', 20 );
add_action( 'numinous_header', 'numinous_header_top', 30 );
add_action( 'numinous_header', 'numinous_header_bottom', 40 );
add_action( 'numinous_header', 'numinous_header_end', 100 );

/**
 * After Header
 * 
 * @see numinous_featured_section - 20
 * @see numinous_top_news_section - 30 
*/
add_action( 'numinous_after_header', 'numinous_featured_section', 20 );
add_action( 'numinous_after_header', 'numinous_top_news_section', 30 );

/**
 * Before Content
 * 
 * @see numinous_page_header - 20
*/
add_action( 'numinous_before_content', 'numinous_page_header', 20 );

/**
 * BreadCrumb
 * 
 * @see numinous_breadcrumb 
*/
add_action( 'numinous_breadcrumb', 'numinous_breadcrumb' );

/**
 * Numinous Content
 * 
 * @see numinous_content_start
*/
add_action( 'numinous_content', 'numinous_content_start' );

/**
 * Before Page entry content
 * 
 * @see numinous_page_content_image
*/
add_action( 'numinous_before_page_entry_content', 'numinous_page_content_image' );

/**
 * Before Post entry content
 * 
 * @see numinous_post_content_image - 10
 * @see numinous_post_entry_header  - 20
*/
add_action( 'numinous_before_post_entry_content', 'numinous_post_content_image', 10 );
add_action( 'numinous_before_post_entry_content', 'numinous_post_entry_header', 20 );

/**
 * Before Search entry summary
 * 
 * @see numinous_post_content_image - 10
 * @see numinous_post_entry_header  - 20
*/
add_action( 'numinous_before_search_entry_summary', 'numinous_post_content_image', 10 );
add_action( 'numinous_before_search_entry_summary', 'numinous_post_entry_header', 20 );

/**
 * Before Archive entry content
 * 
 * @see numinous_post_content_image - 10
 * @see numinous_post_entry_header  - 20
*/
add_action( 'numinous_before_archive_entry_content', 'numinous_post_content_image', 10 );
add_action( 'numinous_before_archive_entry_content', 'numinous_post_entry_header', 20 );

/**
 * After post content
 * 
 * @see numinous_post_author  - 10
 * @see numinous_related_post - 20
*/
add_action( 'numinous_after_post_content', 'numinous_post_author', 10 );
add_action( 'numinous_after_post_content', 'numinous_related_post', 20 );

/**
 * Before search content
 * 
 * @see numinous_get_search_section
*/
add_action( 'numinous_before_search_content', 'numinous_get_search_section' );

/**
 * Numinous Comment
 * 
 * @see numinous_get_comment_section 
*/
add_action( 'numinous_comment', 'numinous_get_comment_section' );

/**
 * After Content
 * 
 * @see numinous_content_end - 20
*/
add_action( 'numinous_after_content', 'numinous_content_end', 20 );

/**
 * Home Page Content
 * 
 * @see numinous_two_col_double_cat_content - 10
 * @see numinous_big_img_single_cat_content - 20
 * @see numinous_two_col_single_cat_content - 30
 * @see numinous_more_news_content          - 40  
*/
add_action( 'numinous_home_page', 'numinous_two_col_double_cat_content', 10 );
add_action( 'numinous_home_page', 'numinous_big_img_single_cat_content', 20 );
add_action( 'numinous_home_page', 'numinous_two_col_single_cat_content', 30 );
add_action( 'numinous_home_page', 'numinous_more_news_content', 40 );

/**
 * Before Footer
 * @see numinous_bottom_ad - 10
 * @see numinous_slider    - 20
*/
add_action( 'numinous_before_footer', 'numinous_bottom_ad', 10 );
add_action( 'numinous_before_footer', 'numinous_slider', 20 );

/**
 * Numinous Footer
 * 
 * @see numinous_footer_start  - 20
 * @see numinous_footer_top    - 30
 * @see numinous_footer_bottom - 40
 * @see numinous_footer_end    - 50
*/
add_action( 'numinous_footer', 'numinous_footer_start', 20 );
add_action( 'numinous_footer', 'numinous_footer_top', 30 );
add_action( 'numinous_footer', 'numinous_footer_bottom', 40 );
add_action( 'numinous_footer', 'numinous_footer_end', 50 );

/**
 * After Footer
 * 
 * @see numinous_page_end - 20
*/
add_action( 'numinous_after_footer', 'numinous_page_end', 20 );