<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package PT_Magazine
 */

if ( ! function_exists( 'pt_magazine_entry_header' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function pt_magazine_entry_header() {

	$meta = array();

	if ( is_single() ) {

		$single_show_date       = pt_magazine_get_option( 'single_show_date' );
		$single_show_author     = pt_magazine_get_option( 'single_show_author' );
		$single_show_category   = pt_magazine_get_option( 'single_show_category' );
		$single_show_tags       = pt_magazine_get_option( 'single_show_tags' );
		$single_show_comments 	= pt_magazine_get_option( 'single_show_comments' );

		if( 1 == $single_show_date ){

			$meta[] = 'date';

		}

		if( 1 == $single_show_author ){

			$meta[] = 'author';

		}

		if( 1 == $single_show_category ){

			$meta[] = 'category';

		}

		if( 1 == $single_show_tags ){

			$meta[] = 'tags';

		}

		if( 1 == $single_show_comments ){

			$meta[] = 'comments';

		}
		
	} else {

		$blog_show_date         = pt_magazine_get_option( 'blog_show_date' );
		$blog_show_author       = pt_magazine_get_option( 'blog_show_author' );
		$blog_show_category     = pt_magazine_get_option( 'blog_show_category' );
		$blog_show_comments     = pt_magazine_get_option( 'blog_show_comments' );

		if( 1 == $blog_show_date ){

			$meta[] = 'date';

		}

		if( 1 == $blog_show_author ){

			$meta[] = 'author';

		}

		if( 1 == $blog_show_category ){

			$meta[] = 'category';

		}

		if( 1 == $blog_show_comments ){

			$meta[] = 'comments';

		}
	}

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

	$posted_on = sprintf(
		'%s',
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		'%s',
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	if ( in_array( 'date', $meta ) ) {

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}

	if ( in_array( 'author', $meta ) ) {

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}

	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() && in_array( 'category', $meta ) ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( ' / ');
		if ( $categories_list && pt_magazine_categorized_blog() ) {
			printf( '<span class="cat-links">%s</span>', $categories_list ); // WPCS: XSS OK.
		}
	}

	if ( ! post_password_required() && ( comments_open() || get_comments_number() ) && in_array( 'comments', $meta ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'No Comment<span class="screen-reader-text"> on %s</span>', 'pt-magazine' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}
	
}
endif;

if ( ! function_exists( 'pt_magazine_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function pt_magazine_entry_footer() {

	$single_show_tags  = pt_magazine_get_option( 'single_show_tags' );

	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() && ( 1 == $single_show_tags ) ) {
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'pt-magazine' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">%s</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'pt-magazine' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);

}

endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function pt_magazine_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'pt_magazine_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'pt_magazine_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so pt_magazine_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so pt_magazine_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in pt_magazine_categorized_blog.
 */
function pt_magazine_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Like, beat it. Dig?
	delete_transient( 'pt_magazine_categories' );
}
add_action( 'edit_category', 'pt_magazine_category_transient_flusher' );
add_action( 'save_post',     'pt_magazine_category_transient_flusher' );

if ( ! function_exists( 'pt_magazine_the_custom_logo' ) ) :

	/**
	 * Displays custom logo.
	 *
	 * @since 1.0.0
	 */
	function pt_magazine_the_custom_logo() {
		if ( function_exists( 'the_custom_logo' ) ) {
			the_custom_logo();
		}
	}
endif;

if ( ! function_exists( 'pt_magazine_primary_navigation_fallback' ) ) :

	/**
	 * Fallback for primary navigation.
	 *
	 * @since 1.0.0
	 */
	function pt_magazine_primary_navigation_fallback() {
		echo '<ul>';
		echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'pt-magazine' ) . '</a></li>';
		$args = array(
			'number'       => 4,
			'hierarchical' => false,
			);
		$pages = get_pages( $args );
		if ( is_array( $pages ) && ! empty( $pages ) ) {
			foreach ( $pages as $page ) {
				echo '<li><a href="' . esc_url( get_permalink( $page->ID ) ) . '">' . esc_html( get_the_title( $page->ID ) ) . '</a></li>';
			}
		}
		echo '</ul>';

	}

endif;
