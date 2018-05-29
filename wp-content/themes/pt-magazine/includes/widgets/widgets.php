<?php
/**
 * Custom widgets.
 *
 * @package PT_Magazine
 */

if ( ! function_exists( 'pt_magazine_load_widgets' ) ) :

	/**
	 * Load widgets.
	 *
	 * @since 1.0.0
	 */
	function pt_magazine_load_widgets() {

		// Social.
		register_widget( 'PT_Magazine_Social_Widget' );

		// Two Column news.
		register_widget( 'PT_Magazine_Two_Column_News' );

		// Mix Column news.
		register_widget( 'PT_Magazine_Mix_Column_News' );

		// Three Column news.
		register_widget( 'PT_Magazine_Three_Column_News' );

		// Featured Column news.
		register_widget( 'PT_Magazine_Featured_Column_News' );

		// Tabbed content.
		register_widget( 'PT_Magazine_Tabbed_Content' );

		// Extended Recent Post.
		register_widget( 'PT_Magazine_Extended_Recent_Posts' );

		// Popular Post.
		register_widget( 'PT_Magazine_Popular_Posts' );

	}

endif;

add_action( 'widgets_init', 'pt_magazine_load_widgets' );

/**
 * Social Widget
 */
require get_template_directory() . '/includes/widgets/social.php';


/**
 * Two Column News Widget
 */
require get_template_directory() . '/includes/widgets/two-column-news.php';

/**
 * Mix Column News Widget
 */
require get_template_directory() . '/includes/widgets/mix-column-news.php';

/**
 * Three Column News Widget
 */
require get_template_directory() . '/includes/widgets/three-column-news.php';

/**
 * Featured Column News Widget
 */
require get_template_directory() . '/includes/widgets/featured-column-news.php';

/**
 * Tabbed Content Widget
 */
require get_template_directory() . '/includes/widgets/tabbed-content.php';

/**
 * Extended Recent Posts Widget
 */
require get_template_directory() . '/includes/widgets/extended-recent-posts.php';

/**
 * Popular Posts Widget
 */
require get_template_directory() . '/includes/widgets/popular-posts.php';