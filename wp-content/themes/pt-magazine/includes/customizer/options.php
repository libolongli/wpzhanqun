<?php
/**
 * Options.
 *
 * @package PT_Magazine
 */

$default = pt_magazine_get_default_theme_options();

// Setting site primary color.
$wp_customize->add_setting( 'theme_options[primary_color]',
	array(
		'default'           => $default['primary_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'theme_options[primary_color]',
		array(
			'label'       => esc_html__( 'Primary Color', 'pt-magazine' ),
			'description' => esc_html__( 'Applied to main color of site.', 'pt-magazine' ),
			'section'     => 'colors',	
		)
	)
);

//Logo Options Setting Starts
$wp_customize->add_setting('theme_options[site_identity]', array(
	'default' 			=> $default['site_identity'],
	'sanitize_callback' => 'pt_magazine_sanitize_select'
	));

$wp_customize->add_control('theme_options[site_identity]', array(
	'type' 		=> 'radio',
	'label' 	=> esc_html__('Logo Options', 'pt-magazine'),
	'section' 	=> 'title_tagline',
	'choices' 	=> array(
		'logo-only' 	=> esc_html__('Logo Only', 'pt-magazine'),
		'title-text' 	=> esc_html__('Title + Tagline', 'pt-magazine'),
		'logo-desc' 	=> esc_html__('Logo + Tagline', 'pt-magazine')
		)
));

// Add Theme Options Panel.
$wp_customize->add_panel( 'theme_option_panel',
	array(
		'title'      => esc_html__( 'Theme Options', 'pt-magazine' ),
		'priority'   => 100,
	)
);


// Layout Section.
$wp_customize->add_section( 'section_layout',
	array(
		'title'      => esc_html__( 'General Settings', 'pt-magazine' ),
		'priority'   => 100,
		'panel'      => 'theme_option_panel',
	)
);

// Setting global_layout.
$wp_customize->add_setting( 'theme_options[site_layout]',
	array(
		'default'           => $default['site_layout'],
		'sanitize_callback' => 'pt_magazine_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[site_layout]',
	array(
		'label'    => esc_html__( 'Site Layout', 'pt-magazine' ),
		'section'  => 'section_layout',
		'type'     => 'radio',
		'priority' => 100,
		'choices'  => array(
				'full-width'  => esc_html__( 'Full Width', 'pt-magazine' ),
				'boxed' => esc_html__( 'Boxed', 'pt-magazine' ),
			),
	)
);

// Setting enable_sticky_sidebar.
$wp_customize->add_setting( 'theme_options[enable_sticky_sidebar]',
	array(
		'default'           => $default['enable_sticky_sidebar'],
		'sanitize_callback' => 'pt_magazine_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable_sticky_sidebar]',
	array(
		'label'    			=> esc_html__( 'Enable Sticky Sidebar', 'pt-magazine' ),
		'section'  			=> 'section_layout',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Header Section.
$wp_customize->add_section( 'section_header',
	array(
		'title'      => esc_html__( 'Top Header Options', 'pt-magazine' ),
		'priority'   => 100,
		'panel'      => 'theme_option_panel',
	)
);

// Setting show_top_header.
$wp_customize->add_setting( 'theme_options[show_top_header]',
	array(
		'default'           => $default['show_top_header'],
		'sanitize_callback' => 'pt_magazine_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_top_header]',
	array(
		'label'    			=> esc_html__( 'Show Top Header', 'pt-magazine' ),
		'section'  			=> 'section_header',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting top_left_type
$wp_customize->add_setting( 'theme_options[top_left_type]',
	array(
		'default'           => $default['top_left_type'],
		'sanitize_callback' => 'pt_magazine_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[top_left_type]',
	array(
		'label'           => esc_html__( 'Top Header Left Section', 'pt-magazine' ),
		'section'         => 'section_header',
		'type'            => 'select',
		'priority'        => 100,
		'choices'         => array(
			'trending-news' => esc_html__( 'Trending News', 'pt-magazine' ),
			'current-date' 	=> esc_html__( 'Current Date', 'pt-magazine' ),
			'menu' 			=> esc_html__( 'Menu', 'pt-magazine' ),
			'social-icons'  => esc_html__( 'Social Icons', 'pt-magazine' ),
		),
		'active_callback' => 'pt_magazine_is_top_header_active',
	)
);

// Setting Top Title.
$wp_customize->add_setting( 'theme_options[trending_title]',
	array(
		'default'           => $default['trending_title'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[trending_title]',
	array(
		'label'    			=> esc_html__( 'Title', 'pt-magazine' ),
		'section'  			=> 'section_header',
		'type'     			=> 'text',
		'priority' 			=> 100,
		'active_callback' 	=> 'pt_magazine_is_top_header_trending_active',
	)
);

// Setting trending_category.
$wp_customize->add_setting( 'theme_options[trending_category]',
	array(
		'default'           => $default['trending_category'],
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new PT_Magazine_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[trending_category]',
		array(
			'label'           => esc_html__( 'Select Category', 'pt-magazine' ),
			'section'         => 'section_header',
			'settings'        => 'theme_options[trending_category]',
			'priority'        => 100,
			'active_callback' => 'pt_magazine_is_top_header_trending_active',
		)
	)
);

// Setting trending_post_number.
$wp_customize->add_setting( 'theme_options[trending_post_number]',
	array(
		'default'           => $default['trending_post_number'],
		'sanitize_callback' => 'pt_magazine_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'theme_options[trending_post_number]',
	array(
		'label'           => esc_html__( 'Number of Posts', 'pt-magazine' ),
		'section'         => 'section_header',
		'type'            => 'number',
		'priority'        => 100,
		'active_callback' => 'pt_magazine_is_top_header_trending_active',
		'input_attrs'     => array( 'min' => 1, 'max' => 10, 'style' => 'width: 55px;' ),
	)
);

// Setting top_right_type
$wp_customize->add_setting( 'theme_options[top_right_type]',
	array(
		'default'           => $default['top_right_type'],
		'sanitize_callback' => 'pt_magazine_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[top_right_type]',
	array(
		'label'           => esc_html__( 'Top Header Right Section', 'pt-magazine' ),
		'section'         => 'section_header',
		'type'            => 'select',
		'priority'        => 100,
		'choices'         => array(
			'current-date' 	=> esc_html__( 'Current Date', 'pt-magazine' ),
			'menu' 			=> esc_html__( 'Menu', 'pt-magazine' ),
			'social-icons'  => esc_html__( 'Social Icons', 'pt-magazine' ),
		),
		'active_callback' => 'pt_magazine_is_top_header_active',
	)
);

// Navigation Section.
$wp_customize->add_section( 'section_navigation',
	array(
		'title'      => esc_html__( 'Main Navigation Options', 'pt-magazine' ),
		'priority'   => 100,
		'panel'      => 'theme_option_panel',
	)
);

// Setting show home icon.
$wp_customize->add_setting( 'theme_options[show_home_icon]',
	array(
		'default'           => $default['show_home_icon'],
		'sanitize_callback' => 'pt_magazine_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_home_icon]',
	array(
		'label'    			=> esc_html__( 'Show Home Icon', 'pt-magazine' ),
		'section'  			=> 'section_navigation',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting show search.
$wp_customize->add_setting( 'theme_options[show_search]',
	array(
		'default'           => $default['show_search'],
		'sanitize_callback' => 'pt_magazine_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_search]',
	array(
		'label'    			=> esc_html__( 'Show Search Form', 'pt-magazine' ),
		'section'  			=> 'section_navigation',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting search_style.
$wp_customize->add_setting( 'theme_options[search_style]',
	array(
		'default'           => $default['search_style'],
		'sanitize_callback' => 'pt_magazine_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[search_style]',
	array(
		'label'    => esc_html__( 'Search Form Style', 'pt-magazine' ),
		'section'  => 'section_navigation',
		'type'     => 'radio',
		'priority' => 100,
		'choices'  => array(
				'style-one'  => esc_html__( 'Style One (Always Visible)', 'pt-magazine' ),
				'style-two'  => esc_html__( 'Style Two (Visible on Click)', 'pt-magazine' ),
			),
		'active_callback' => 'pt_magazine_is_top_search_active',
	)
);

// Main Slider Section.
$wp_customize->add_section( 'section_main_slider',
	array(
		'title'      => esc_html__( 'Main Slider', 'pt-magazine' ),
		'priority'   => 100,
		'panel'      => 'theme_option_panel',
	)
);

// Setting show_main_slider.
$wp_customize->add_setting( 'theme_options[show_main_slider]',
	array(
		'default'           => $default['show_main_slider'],
		'sanitize_callback' => 'pt_magazine_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_main_slider]',
	array(
		'label'    			=> esc_html__( 'Show Slider', 'pt-magazine' ),
		'section'  			=> 'section_main_slider',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting main_slider_category.
$wp_customize->add_setting( 'theme_options[main_slider_category]',
	array(
		'default'           => $default['main_slider_category'],
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new PT_Magazine_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[main_slider_category]',
		array(
			'label'           => esc_html__( 'Select Category', 'pt-magazine' ),
			'section'         => 'section_main_slider',
			'priority'        => 100,
			'active_callback' => 'pt_magazine_is_main_slider_active',
		)
	)
);

// Setting slider_transition_effect.
$wp_customize->add_setting( 'theme_options[slider_transition_effect]',
	array(
		'default'           => $default['slider_transition_effect'],
		'sanitize_callback' => 'pt_magazine_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[slider_transition_effect]',
	array(
		'label'           => __( 'Transition Effect', 'pt-magazine' ),
		'section'         => 'section_main_slider',
		'type'            => 'select',
		'priority'        => 100,
		'choices'         => array(
			'fade'       => esc_html__( 'Fade', 'pt-magazine' ),
			'scrollHorz' => esc_html__( 'Scroll Horizontal', 'pt-magazine' ),
			'scrollVertz' => esc_html__( 'Scroll Vertical', 'pt-magazine' ),
		),
		'active_callback' => 'pt_magazine_is_main_slider_active',
	)
);

// Setting slider_transition_delay.
$wp_customize->add_setting( 'theme_options[slider_transition_delay]',
	array(
		'default'           => $default['slider_transition_delay'],
		'sanitize_callback' => 'pt_magazine_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'theme_options[slider_transition_delay]',
	array(
		'label'           => esc_html__( 'Transition Delay', 'pt-magazine' ),
		'description'     => esc_html__( 'in seconds', 'pt-magazine' ),
		'section'         => 'section_main_slider',
		'type'            => 'number',
		'priority'        => 100,
		'input_attrs'     => array( 'min' => 2, 'max' => 10, 'step' => 1, 'style' => 'width: 100px;' ),
		'active_callback' => 'pt_magazine_is_main_slider_active',
	)
);

// Setting main_slider_autoplay.
$wp_customize->add_setting( 'theme_options[main_slider_autoplay]',
	array(
		'default'           => $default['main_slider_autoplay'],
		'sanitize_callback' => 'pt_magazine_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[main_slider_autoplay]',
	array(
		'label'    			=> esc_html__( 'Enable Autoplay', 'pt-magazine' ),
		'section'  			=> 'section_main_slider',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
		'active_callback'   => 'pt_magazine_is_main_slider_active',
	)
);

// Setting main_slider_arrows.
$wp_customize->add_setting( 'theme_options[main_slider_arrows]',
	array(
		'default'           => $default['main_slider_arrows'],
		'sanitize_callback' => 'pt_magazine_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[main_slider_arrows]',
	array(
		'label'    			=> esc_html__( 'Show Arrows', 'pt-magazine' ),
		'section'  			=> 'section_main_slider',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
		'active_callback'   => 'pt_magazine_is_main_slider_active',
	)
);

// Setting main_slider_overlay.
$wp_customize->add_setting( 'theme_options[main_slider_overlay]',
	array(
		'default'           => $default['main_slider_overlay'],
		'sanitize_callback' => 'pt_magazine_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[main_slider_overlay]',
	array(
		'label'    			=> esc_html__( 'Enable Overlay', 'pt-magazine' ),
		'section'  			=> 'section_main_slider',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
		'active_callback'   => 'pt_magazine_is_main_slider_active',
	)
);

// Featured News Section.
$wp_customize->add_section( 'section_featured_news',
	array(
		'title'      => esc_html__( 'Featured News(Right of Slider)', 'pt-magazine' ),
		'priority'   => 100,
		'panel'      => 'theme_option_panel',
	)
);

// Setting show_featured_news.
$wp_customize->add_setting( 'theme_options[show_featured_news]',
	array(
		'default'           => $default['show_featured_news'],
		'sanitize_callback' => 'pt_magazine_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_featured_news]',
	array(
		'label'    			=> esc_html__( 'Show Featured News', 'pt-magazine' ),
		'section'  			=> 'section_featured_news',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting featured_news_category.
$wp_customize->add_setting( 'theme_options[featured_news_category]',
	array(
		'default'           => $default['featured_news_category'],
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new PT_Magazine_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[featured_news_category]',
		array(
			'label'           => esc_html__( 'Select Category', 'pt-magazine' ),
			'section'         => 'section_featured_news',
			'settings'        => 'theme_options[featured_news_category]',
			'priority'        => 100,
			'active_callback' => 'pt_magazine_is_featured_news_active',
		)
	)
);

// Highlighted News Section.
$wp_customize->add_section( 'section_highlighted_news',
	array(
		'title'      => esc_html__( 'Highlighted News(Below Slider)', 'pt-magazine' ),
		'priority'   => 100,
		'panel'      => 'theme_option_panel',
	)
);

// Setting show_highlighted_news.
$wp_customize->add_setting( 'theme_options[show_highlighted_news]',
	array(
		'default'           => $default['show_highlighted_news'],
		'sanitize_callback' => 'pt_magazine_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_highlighted_news]',
	array(
		'label'    			=> esc_html__( 'Show Highlighted News', 'pt-magazine' ),
		'section'  			=> 'section_highlighted_news',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting highlighted_news_category.
$wp_customize->add_setting( 'theme_options[highlighted_news_category]',
	array(
		'default'           => $default['highlighted_news_category'],
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new PT_Magazine_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[highlighted_news_category]',
		array(
			'label'           => esc_html__( 'Select Category', 'pt-magazine' ),
			'section'         => 'section_highlighted_news',
			'settings'        => 'theme_options[highlighted_news_category]',
			'priority'        => 100,
			'active_callback' => 'pt_magazine_is_highlighted_news_active',
		)
	)
);

// Breadcrumb Section.
$wp_customize->add_section( 'section_breadcrumb',
	array(
		'title'      => esc_html__( 'Breadcrumb Options', 'pt-magazine' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);

// Setting breadcrumb_type.
$wp_customize->add_setting( 'theme_options[breadcrumb_type]',
	array(
		'default'           => $default['breadcrumb_type'],
		'sanitize_callback' => 'pt_magazine_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[breadcrumb_type]',
	array(
		'label'       => esc_html__( 'Breadcrumb Type', 'pt-magazine' ),
		'section'     => 'section_breadcrumb',
		'type'        => 'radio',
		'priority'    => 100,
		'choices'     => array(
			'disable' => esc_html__( 'Disable', 'pt-magazine' ),
			'simple'  => esc_html__( 'Simple', 'pt-magazine' ),
		),
	)
);

// Blog Section.
$wp_customize->add_section( 'section_blog',
	array(
		'title'      => esc_html__( 'Blog Options', 'pt-magazine' ),
		'priority'   => 100,
		'panel'      => 'theme_option_panel',
	)
);

// Setting sidebar_position.
$wp_customize->add_setting( 'theme_options[sidebar_position]',
	array(
		'default'           => $default['sidebar_position'],
		'sanitize_callback' => 'pt_magazine_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[sidebar_position]',
	array(
		'label'    => esc_html__( 'Sidebar Position', 'pt-magazine' ),
		'section'  => 'section_blog',
		'type'     => 'radio',
		'priority' => 100,
		'choices'  => array(
				'left-sidebar'  => esc_html__( 'Left Sidebar', 'pt-magazine' ),
				'right-sidebar' => esc_html__( 'Right Sidebar', 'pt-magazine' ),
			),
	)
);

// Setting post_list_type.
$wp_customize->add_setting( 'theme_options[post_list_type]',
	array(
		'default'           => $default['post_list_type'],
		'sanitize_callback' => 'pt_magazine_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[post_list_type]',
	array(
		'label'    => esc_html__( 'Post Listing Type', 'pt-magazine' ),
		'section'  => 'section_blog',
		'type'     => 'radio',
		'priority' => 100,
		'choices'  => array(
				'grid'  => esc_html__( 'Grid', 'pt-magazine' ),
				'list'  => esc_html__( 'List', 'pt-magazine' ),
			),
	)
);

// Setting excerpt_length.
$wp_customize->add_setting( 'theme_options[blog_excerpt_length]',
	array(
		'default'           => $default['blog_excerpt_length'],
		'sanitize_callback' => 'pt_magazine_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'theme_options[blog_excerpt_length]',
	array(
		'label'       => esc_html__( 'Excerpt Length', 'pt-magazine' ),
		'description' => esc_html__( 'in words', 'pt-magazine' ),
		'section'     => 'section_blog',
		'type'        => 'number',
		'priority'    => 100,
		'input_attrs' => array( 'min' => 1, 'max' => 200, 'style' => 'width: 55px;' ),
	)
);

// Setting blog_show_date.
$wp_customize->add_setting( 'theme_options[blog_show_date]',
	array(
		'default'           => $default['blog_show_date'],
		'sanitize_callback' => 'pt_magazine_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[blog_show_date]',
	array(
		'label'    			=> esc_html__( 'Show Posted Date', 'pt-magazine' ),
		'section'  			=> 'section_blog',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting blog_show_author.
$wp_customize->add_setting( 'theme_options[blog_show_author]',
	array(
		'default'           => $default['blog_show_author'],
		'sanitize_callback' => 'pt_magazine_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[blog_show_author]',
	array(
		'label'    			=> esc_html__( 'Show Post Author', 'pt-magazine' ),
		'section'  			=> 'section_blog',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting blog_show_category.
$wp_customize->add_setting( 'theme_options[blog_show_category]',
	array(
		'default'           => $default['blog_show_category'],
		'sanitize_callback' => 'pt_magazine_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[blog_show_category]',
	array(
		'label'    			=> esc_html__( 'Show Post Categories', 'pt-magazine' ),
		'section'  			=> 'section_blog',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting blog_show_comments.
$wp_customize->add_setting( 'theme_options[blog_show_comments]',
	array(
		'default'           => $default['blog_show_comments'],
		'sanitize_callback' => 'pt_magazine_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[blog_show_comments]',
	array(
		'label'    			=> esc_html__( 'Show Comment Count', 'pt-magazine' ),
		'section'  			=> 'section_blog',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting blog_read_more.
$wp_customize->add_setting( 'theme_options[blog_read_more]',
	array(
		'default'           => $default['blog_read_more'],
		'sanitize_callback' => 'pt_magazine_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[blog_read_more]',
	array(
		'label'    			=> esc_html__( 'Show Read More Button', 'pt-magazine' ),
		'section'  			=> 'section_blog',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting blog_read_more_text.
$wp_customize->add_setting( 'theme_options[blog_read_more_text]',
	array(
		'default'           => $default['blog_read_more_text'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[blog_read_more_text]',
	array(
		'label'    => esc_html__( 'Read More Button Text', 'pt-magazine' ),
		'section'  => 'section_blog',
		'type'     => 'text',
		'priority' => 100,
		'active_callback' 	=> 'pt_magazine_is_read_more_active',
	)
);


// Single Post Section.
$wp_customize->add_section( 'section_single_post',
	array(
		'title'      => esc_html__( 'Single Post Options', 'pt-magazine' ),
		'priority'   => 100,
		'panel'      => 'theme_option_panel',
	)
);

// Setting show_featured_img.
$wp_customize->add_setting( 'theme_options[show_featured_img]',
	array(
		'default'           => $default['show_featured_img'],
		'sanitize_callback' => 'pt_magazine_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_featured_img]',
	array(
		'label'    			=> esc_html__( 'Show Featured Image', 'pt-magazine' ),
		'section'  			=> 'section_single_post',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting single_show_date.
$wp_customize->add_setting( 'theme_options[single_show_date]',
	array(
		'default'           => $default['single_show_date'],
		'sanitize_callback' => 'pt_magazine_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[single_show_date]',
	array(
		'label'    			=> esc_html__( 'Show Posted Date', 'pt-magazine' ),
		'section'  			=> 'section_single_post',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting single_show_author.
$wp_customize->add_setting( 'theme_options[single_show_author]',
	array(
		'default'           => $default['single_show_author'],
		'sanitize_callback' => 'pt_magazine_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[single_show_author]',
	array(
		'label'    			=> esc_html__( 'Show Post Author', 'pt-magazine' ),
		'section'  			=> 'section_single_post',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting single_show_category.
$wp_customize->add_setting( 'theme_options[single_show_category]',
	array(
		'default'           => $default['single_show_category'],
		'sanitize_callback' => 'pt_magazine_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[single_show_category]',
	array(
		'label'    			=> esc_html__( 'Show Post Categories', 'pt-magazine' ),
		'section'  			=> 'section_single_post',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting single_show_comments.
$wp_customize->add_setting( 'theme_options[single_show_comments]',
	array(
		'default'           => $default['single_show_comments'],
		'sanitize_callback' => 'pt_magazine_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[single_show_comments]',
	array(
		'label'    			=> esc_html__( 'Show Comment Count', 'pt-magazine' ),
		'section'  			=> 'section_single_post',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting single_show_tags.
$wp_customize->add_setting( 'theme_options[single_show_tags]',
	array(
		'default'           => $default['single_show_tags'],
		'sanitize_callback' => 'pt_magazine_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[single_show_tags]',
	array(
		'label'    			=> esc_html__( 'Show Post Tags', 'pt-magazine' ),
		'section'  			=> 'section_single_post',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting single_show_nav.
$wp_customize->add_setting( 'theme_options[single_show_nav]',
	array(
		'default'           => $default['single_show_nav'],
		'sanitize_callback' => 'pt_magazine_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[single_show_nav]',
	array(
		'label'    			=> esc_html__( 'Show Posts Navigation', 'pt-magazine' ),
		'section'  			=> 'section_single_post',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting single_show_author.
$wp_customize->add_setting( 'theme_options[single_show_author]',
	array(
		'default'           => $default['single_show_author'],
		'sanitize_callback' => 'pt_magazine_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[single_show_author]',
	array(
		'label'    			=> esc_html__( 'Show Author Information', 'pt-magazine' ),
		'section'  			=> 'section_single_post',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting single_show_related.
$wp_customize->add_setting( 'theme_options[single_show_related]',
	array(
		'default'           => $default['single_show_related'],
		'sanitize_callback' => 'pt_magazine_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[single_show_related]',
	array(
		'label'    			=> esc_html__( 'Show Related Posts', 'pt-magazine' ),
		'section'  			=> 'section_single_post',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting related_post_title.
$wp_customize->add_setting( 'theme_options[related_post_title]',
	array(
		'default'           => $default['related_post_title'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[related_post_title]',
	array(
		'label'    => esc_html__( 'Related Posts Title', 'pt-magazine' ),
		'section'  => 'section_single_post',
		'type'     => 'text',
		'priority' => 100,
		'active_callback' 	=> 'pt_magazine_is_relative_posts_active',
	)
);

// Footer Section.
$wp_customize->add_section( 'section_footer',
	array(
		'title'      => esc_html__( 'Footer Options', 'pt-magazine' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);

// Setting copyright_text.
$wp_customize->add_setting( 'theme_options[copyright_text]',
	array(
		'default'           => $default['copyright_text'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[copyright_text]',
	array(
		'label'    => esc_html__( 'Copyright Text', 'pt-magazine' ),
		'section'  => 'section_footer',
		'type'     => 'text',
		'priority' => 100,
	)
);