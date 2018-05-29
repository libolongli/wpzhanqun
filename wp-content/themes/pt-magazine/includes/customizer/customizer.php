<?php
/**
 * PT Magazine Theme Customizer.
 *
 * @package PT_Magazine
 */

/**
 * Add Customizer options.
 *
 * @since 1.0.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function pt_magazine_customize_register( $wp_customize ) {

	// Load custom controls.
	require_once trailingslashit( get_template_directory() ) . 'includes/customizer/control.php';

	// Sanitization.
	require_once trailingslashit( get_template_directory() ) . 'includes/customizer/sanitize.php';

	// Active callback.
	require_once trailingslashit( get_template_directory() ) . 'includes/customizer/active.php';

	// Load options
	require_once trailingslashit( get_template_directory() ) . 'includes/customizer/options.php';

	// Load Upgrade to Pro control.
	require_once trailingslashit( get_template_directory() ) . '/includes/upgrade-to-pro/control.php';

	// Register custom section types.
	$wp_customize->register_section_type( 'PT_Magazine_Customize_Section_Upsell' );

	// Register sections.
	$wp_customize->add_section(
		new PT_Magazine_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'PT Magazine Plus', 'pt-magazine' ),
				'pro_text' => esc_html__( 'Upgrade to PRO', 'pt-magazine' ),
				'pro_url'  => 'https://promenadethemes.com/downloads/pt-magazine-plus',
				'priority' => 1,
			)
		)
	);

}

add_action( 'customize_register', 'pt_magazine_customize_register' );

/**
 * Register Customizer partials.
 *
 * @since 1.0.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function pt_magazine_customizer_partials( WP_Customize_Manager $wp_customize ) {

	// Bail if selective refresh is not available.
	if ( ! isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->get_setting( 'blogname' )->transport        = 'refresh';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'refresh';
		return;
	}

	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	// Register partial for blogname.
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector'            => '.site-title a',
		'container_inclusive' => false,
		'render_callback'     => 'pt_magazine_customize_partial_blogname',
	) );

	// Register partial for blogdescription.
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector'            => '.site-description',
		'container_inclusive' => false,
		'render_callback'     => 'pt_magazine_customize_partial_blogdescription',
	) );

}

add_action( 'customize_register', 'pt_magazine_customizer_partials', 99 );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since 1.0.0
 *
 * @return void
 */
function pt_magazine_customize_partial_blogname() {

	bloginfo( 'name' );

}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since 1.0.0
 *
 * @return void
 */
function pt_magazine_customize_partial_blogdescription() {

	bloginfo( 'description' );

}

/**
 * Enqueue style for custom customize control.
 */
function pt_magazine_custom_customize_enqueue() {

	wp_enqueue_style( 'pt-magazine-customize', get_template_directory_uri() . '/includes/css/customize-controls.css' );

	wp_enqueue_script( 'pt-magazine-customize-controls', get_template_directory_uri() . '/includes/upgrade-to-pro/customize-controls.js', array( 'customize-controls' ) );

	wp_enqueue_style( 'pt-magazine-customize-controls', get_template_directory_uri() . '/includes/upgrade-to-pro/customize-controls.css' );

}
add_action( 'customize_controls_enqueue_scripts', 'pt_magazine_custom_customize_enqueue' );