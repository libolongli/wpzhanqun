<?php
/**
 * About configuration
 *
 * @package PT_Magazine
 */

$config = array(
	'menu_name' => esc_html__( 'About PT Magazine', 'pt-magazine' ),
	'page_name' => esc_html__( 'About PT Magazine', 'pt-magazine' ),

	/* translators: theme version */
	'welcome_title' => sprintf( esc_html__( 'Welcome to %s - ', 'pt-magazine' ), 'PT Magazine' ),

	/* translators: 1: theme name */
	'welcome_content' => sprintf( esc_html__( 'We hope this page will help you to setup %1$s with few clicks. We believe you will find it easy to use and perfect for your website development.', 'pt-magazine' ), 'PT Magazine' ),

	// Quick links.
	'quick_links' => array(
		'theme_url' => array(
			'text' => esc_html__( 'Theme Details','pt-magazine' ),
			'url'  => 'https://promenadethemes.com/downloads/pt-magazine/',
			),
		'demo_url' => array(
			'text' => esc_html__( 'View Demo','pt-magazine' ),
			'url'  => 'https://promenadethemes.com/demo/pt-magazine/',
			),
		'documentation_url' => array(
			'text'   => esc_html__( 'View Documentation','pt-magazine' ),
			'url'    => 'https://promenadethemes.com/documentation/pt-magazine/',
			'button' => 'primary',
			),
		'rate_url' => array(
			'text' => esc_html__( 'Rate This Theme','pt-magazine' ),
			'url'  => 'https://wordpress.org/support/theme/pt-magazine/reviews/',
			),
		),

	// Tabs.
	'tabs' => array(
		'getting_started'     => esc_html__( 'Getting Started', 'pt-magazine' ),
		'recommended_actions' => esc_html__( 'Recommended Actions', 'pt-magazine' ),
		'support'             => esc_html__( 'Support', 'pt-magazine' ),
		'upgrade_to_pro'      => esc_html__( 'Upgrade to Pro', 'pt-magazine' ),
		'free_pro'            => esc_html__( 'FREE VS. PRO', 'pt-magazine' ),
	),

	// Getting started.
	'getting_started' => array(
		array(
			'title'               => esc_html__( 'Theme Documentation', 'pt-magazine' ),
			'text'                => esc_html__( 'Find step by step instructions with video documentation to setup theme easily.', 'pt-magazine' ),
			'button_label'        => esc_html__( 'View documentation', 'pt-magazine' ),
			'button_link'         => 'https://promenadethemes.com/documentation/pt-magazine/',
			'is_button'           => false,
			'recommended_actions' => false,
			'is_new_tab'          => true,
		),
		array(
			'title'               => esc_html__( 'Recommended Actions', 'pt-magazine' ),
			'text'                => esc_html__( 'We recommend few steps to take so that you can get complete site like shown in demo.', 'pt-magazine' ),
			'button_label'        => esc_html__( 'Check recommended actions', 'pt-magazine' ),
			'button_link'         => esc_url( admin_url( 'themes.php?page=pt-magazine-about&tab=recommended_actions' ) ),
			'is_button'           => false,
			'recommended_actions' => false,
			'is_new_tab'          => false,
		),
		array(
			'title'               => esc_html__( 'Customize Everything', 'pt-magazine' ),
			'text'                => esc_html__( 'Start customizing every aspect of the website with customizer.', 'pt-magazine' ),
			'button_label'        => esc_html__( 'Go to Customizer', 'pt-magazine' ),
			'button_link'         => esc_url( wp_customize_url() ),
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => false,
		),

		array(
			'title'        		  	=> esc_html__( 'Youtube Video Tutorials', 'pt-magazine' ),
			'text'         			=> esc_html__( 'Please check our youtube channel for video instructions of PT Magazine setup and customization.', 'pt-magazine' ),
			'button_label' 			=> esc_html__( 'Video Tutorials', 'pt-magazine' ),
			'button_link'  			=> 'https://www.youtube.com/watch?v=y3hQmkMHbvA&list=PL-Ic437QwxQ8pBxfHsldZMQiHLvoEYmSS',
			'is_button'    			=> false,
			'recommended_actions' 	=> false,
			'is_new_tab'   			=> true,
		),
	),

	// Recommended actions.
	'recommended_actions' => array(
		'content' => array(
			
			'front-page' => array(
				'title'       => esc_html__( 'Setting Static Front Page','pt-magazine' ),
				'description' => esc_html__( 'Create a new page to display on front page ( Ex: Home ) and assign "Home" template. Then select A static page to display news widgets on it.', 'pt-magazine' ),
				'id'          => 'front-page',
				'check'       => ( 'page' === get_option( 'show_on_front' ) ) ? true : false,
				'help'        => '<a href="' . esc_url( wp_customize_url() ) . '?autofocus[section]=static_front_page" class="button button-secondary">' . esc_html__( 'Static Front Page', 'pt-magazine' ) . '</a>',
			),
		),
	),

	// Support.
	'support_content' => array(
		'first' => array(
			'title'        => esc_html__( 'Contact Support', 'pt-magazine' ),
			'icon'         => 'dashicons dashicons-sos',
			'text'         => esc_html__( 'If you have any problem, feel free to create ticket on our dedicated Support forum.', 'pt-magazine' ),
			'button_label' => esc_html__( 'Contact Support', 'pt-magazine' ),
			'button_link'  => esc_url( 'https://promenadethemes.com/support/item/pt-magazine/' ),
			'is_button'    => true,
			'is_new_tab'   => true,
		),
		'second' => array(
			'title'        => esc_html__( 'Theme Documentation', 'pt-magazine' ),
			'icon'         => 'dashicons dashicons-book-alt',
			'text'         => esc_html__( 'Kindly check our theme documentation for detailed information and video instructions.', 'pt-magazine' ),
			'button_label' => esc_html__( 'View Documentation', 'pt-magazine' ),
			'button_link'  => 'https://promenadethemes.com/documentation/pt-magazine/',
			'is_button'    => false,
			'is_new_tab'   => true,
		),
		'third' => array(
			'title'        => esc_html__( 'Pro Version', 'pt-magazine' ),
			'icon'         => 'dashicons dashicons-products',
			'icon'         => 'dashicons dashicons-star-filled',
			'text'         => esc_html__( 'Upgrade to pro version for additional features and options.', 'pt-magazine' ),
			'button_label' => esc_html__( 'View Pro Version', 'pt-magazine' ),
			'button_link'  => 'https://promenadethemes.com/downloads/pt-magazine-plus/',
			'is_button'    => true,
			'is_new_tab'   => true,
		),
		'fourth' => array(
			'title'        => esc_html__( 'Youtube Video Tutorials', 'pt-magazine' ),
			'icon'         => 'dashicons dashicons-video-alt3',
			'text'         => esc_html__( 'Please check our youtube channel for video instructions of PT Magazine setup and customization.', 'pt-magazine' ),
			'button_label' => esc_html__( 'Video Tutorials', 'pt-magazine' ),
			'button_link'  => 'https://www.youtube.com/watch?v=y3hQmkMHbvA&list=PL-Ic437QwxQ8pBxfHsldZMQiHLvoEYmSS',
			'is_button'    => false,
			'is_new_tab'   => true,
		),
		'fifth' => array(
			'title'        => esc_html__( 'Customization Request', 'pt-magazine' ),
			'icon'         => 'dashicons dashicons-admin-tools',
			'text'         => esc_html__( 'We have dedicated team members for theme customization. Feel free to contact us any time if you need any customization service.', 'pt-magazine' ),
			'button_label' => esc_html__( 'Customization Request', 'pt-magazine' ),
			'button_link'  => 'https://promenadethemes.com/contact-us/',
			'is_button'    => false,
			'is_new_tab'   => true,
		),
		'sixth' => array(
			'title'        => esc_html__( 'Child Theme', 'pt-magazine' ),
			'icon'         => 'dashicons dashicons-admin-customizer',
			'text'         => esc_html__( 'If you want to customize theme file, you should use child theme rather than modifying theme file itself.', 'pt-magazine' ),
			'button_label' => esc_html__( 'About child theme', 'pt-magazine' ),
			'button_link'  => 'https://developer.wordpress.org/themes/advanced-topics/child-themes/',
			'is_button'    => false,
			'is_new_tab'   => true,
		),
	),

	// Upgrade.
	'upgrade_to_pro' 	=> array(
		'description'   => esc_html__( 'Upgrade to pro version for more exciting features and additional theme options.', 'pt-magazine' ),
		'button_label' 	=> esc_html__( 'Upgrade to Pro', 'pt-magazine' ),
		'button_link'  	=> 'https://promenadethemes.com/downloads/pt-magazine-plus/',
		'is_new_tab'   	=> true,
	),

    // Free vs pro array.
    'free_pro' => array(
	    array(
		    'title'		=> esc_html__( 'Custom Widgets', 'pt-magazine' ),
		    'desc' 		=> esc_html__( 'Widgets added by theme to enhance features', 'pt-magazine' ),
		    'free' 		=> esc_html__('8','pt-magazine'),
		    'pro'  		=> esc_html__('10','pt-magazine'),
	    ),
	    
	    array(
		    'title'     => esc_html__( 'Google Fonts', 'pt-magazine' ),
		    'desc' 		=> esc_html__( 'Google fonts options for changing the overall site fonts', 'pt-magazine' ),
		    'free'  	=> 'no',
		    'pro'   	=> esc_html__('100+','pt-magazine'),
	    ),
	    array(
		    'title'     => esc_html__( 'Color Options', 'pt-magazine' ),
		    'desc'      => esc_html__( 'Options to change primary color of the site', 'pt-magazine' ),
		    'free'      => esc_html__('yes','pt-magazine'),
		    'pro'       => esc_html__('yes','pt-magazine'),
	    ),
        array(
    	    'title'     => esc_html__( 'Advanced Color Options', 'pt-magazine' ),
    	    'desc'      => esc_html__( 'Color options for changing sections, elements and overall site colors', 'pt-magazine' ),
    	    'free'      => esc_html__('no','pt-magazine'),
    	    'pro'       => esc_html__('yes','pt-magazine'),
        ),
	    array(
		    'title'     => esc_html__( 'Sticky Navigation', 'pt-magazine' ),
		    'desc'      => esc_html__( 'Option to make main navigation stick to viewport on scroll', 'pt-magazine' ),
		    'free'      => esc_html__('no','pt-magazine'),
		    'pro'       => esc_html__('yes','pt-magazine'),
	    ),
        array(
    	    'title'     => esc_html__( 'News Carousel', 'pt-magazine' ),
    	    'desc'      => esc_html__( 'Widget to display news in carousel mode', 'pt-magazine' ),
    	    'free'      => esc_html__('no','pt-magazine'),
    	    'pro'       => esc_html__('yes','pt-magazine'),
        ),
        array(
    	    'title'     => esc_html__( 'Alternate News', 'pt-magazine' ),
    	    'desc'      => esc_html__( 'Widget to display news in alternate style (Image and content in left-right and vice-versa)', 'pt-magazine' ),
    	    'free'      => esc_html__('no','pt-magazine'),
    	    'pro'       => esc_html__('yes','pt-magazine'),
        ),
        array(
    	    'title'     => esc_html__( 'Copyright Editor', 'pt-magazine' ),
    	    'desc'      => esc_html__( 'Option to change Copyright information in footer', 'pt-magazine' ),
    	    'free'      => esc_html__('Basic','pt-magazine'),
    	    'pro'       => esc_html__('Advanced','pt-magazine'),
        ),
        array(
    	    'title'     => esc_html__( 'Hide Footer Credit', 'pt-magazine' ),
    	    'desc'      => esc_html__( 'Option to enable/disable Powerby(Designer) credit in footer', 'pt-magazine' ),
    	    'free'      => esc_html__('no','pt-magazine'),
    	    'pro'       => esc_html__('yes','pt-magazine'),
        ),
        array(
    	    'title'     => esc_html__( 'Override Footer Credit', 'pt-magazine' ),
    	    'desc'      => esc_html__( 'Option to Override existing Powerby credit of footer', 'pt-magazine' ),
    	    'free'      => esc_html__('no','pt-magazine'),
    	    'pro'       => esc_html__('yes','pt-magazine'),
        ),
	    array(
		    'title'     => esc_html__( 'SEO', 'pt-magazine' ),
		    'desc' 		=> esc_html__( 'Developed with high skilled SEO tools.', 'pt-magazine' ),
		    'free'  	=> 'yes',
		    'pro'   	=> 'yes',
	    ),
	    array(
		    'title'     => esc_html__( 'Support Forum', 'pt-magazine' ),
		    'desc'      => esc_html__( 'Highly experienced and dedicated support team for your help plus online chat.', 'pt-magazine' ),
		    'free'      => esc_html__('yes', 'pt-magazine'),
		    'pro'       => esc_html__('High Priority', 'pt-magazine'),
	    )

    ),

);

PT_Magazine_About::init( apply_filters( 'pt_magazine_about_filter', $config ) );
