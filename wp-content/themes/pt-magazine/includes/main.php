<?php
/**
 * Load files.
 *
 * @package PT_Magazine
 */

// Load helper functions.
require_once trailingslashit( get_template_directory() ) . '/includes/helpers.php';

// Custom template tags for this theme.
require_once trailingslashit( get_template_directory() ) . '/includes/template-tags.php';

// Custom functions that act independently of the theme templates.
require_once trailingslashit( get_template_directory() ) . '/includes/extras.php';

// Load core functions.
require_once trailingslashit( get_template_directory() ) . '/includes/customizer/core.php';

// Customizer additions.
require_once trailingslashit( get_template_directory() ) . '/includes/customizer/customizer.php';

// Load widgets.
require_once trailingslashit( get_template_directory() ) . '/includes/widgets/widgets.php';

// Load hooks.
require_once trailingslashit( get_template_directory() ) . '/includes/hooks.php';

// Load dynamic css.
require_once trailingslashit( get_template_directory() ) . '/includes/dynamic.php';

if ( is_admin() ) {
	// Load about.
	require_once trailingslashit( get_template_directory() ) . 'includes/theme-info/class-about.php';
	require_once trailingslashit( get_template_directory() ) . 'includes/theme-info/about.php';
}