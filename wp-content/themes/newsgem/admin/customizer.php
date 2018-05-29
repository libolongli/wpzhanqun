<?php
function newsgem_themes_customizer($wp_customize) {	
$wp_customize->add_setting( 'header_taglinecolor', array(
		'default' => '#666666',
		'type' => 'option',
		'sanitize_callback' => 'newsgem_sanitize_text'
	) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_tagline_color', array(
			'label' => __( 'Header Tagline Color', 'newsgem' ),
			'section' => 'colors',
			'settings' => 'header_taglinecolor'
		) ) );
$newsgem_categories = get_categories(array('hide_empty' => 0));
	foreach ($newsgem_categories as $newsgem_category) {
		$newsgem_cat[$newsgem_category->term_id] = $newsgem_category->cat_name;
	}
	/*------------------------------------------------------------------------*/
    /*  Site Options
    /*------------------------------------------------------------------------*/
		$wp_customize->add_panel( 'newsgem_options',
			array(
				'priority'       => 10,
			    'capability'     => 'edit_theme_options',
			    'theme_supports' => '',
			    'title'          => esc_html__( 'Theme settings', 'newsgem' ),
			    'description'    => '',
			)
		);
				/* Global Settings
		----------------------------------------------------------------------*/
		$wp_customize->add_section( 'newsgem_social_settings' ,
			array(
				'priority'    => 4,
				'title'       => esc_html__( 'Social Icons', 'newsgem' ),
				'description' => '',
				'panel'       => 'newsgem_options',
			)
		);
$wp_customize->add_setting(
'fb_link',
array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'fb_link',
array(
   'label' => esc_html__('Facebook url', 'newsgem'),
   'section' => 'newsgem_social_settings',
   'type' => 'text',
)
);
$wp_customize->add_setting(
'tw_link',
array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'tw_link',
array(
   'label' => esc_html__('Twitter url', 'newsgem'),
   'section' => 'newsgem_social_settings',
   'type' => 'text',
)
);
$wp_customize->add_setting(
'gp_link',
array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'gp_link',
array(
   'label' => esc_html__('Google plus url', 'newsgem'),
   'section' => 'newsgem_social_settings',
   'type' => 'text',
)
);
$wp_customize->add_setting(
'insta_link',
array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'insta_link',
array(
   'label' => esc_html__('Instagram url', 'newsgem'),
   'section' => 'newsgem_social_settings',
   'type' => 'text',
)
);
$wp_customize->add_setting(
'skype_link',
array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'skype_link',
array(
   'label' => esc_html__('Skype url', 'newsgem'),
   'section' => 'newsgem_social_settings',
   'type' => 'text',
)
);
$wp_customize->add_setting(
'pin_link',
array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'pin_link',
array(
   'label' => esc_html__('Pinterest url', 'newsgem'),
   'section' => 'newsgem_social_settings',
   'type' => 'text',
)
);
$wp_customize->add_setting(
'flickr_link',
array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'flickr_link',
array(
   'label' => esc_html__('Flickr url', 'newsgem'),
   'section' => 'newsgem_social_settings',
   'type' => 'text',
)
);
$wp_customize->add_setting(
'vimeo_link',
array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'vimeo_link',
array(
   'label' => esc_html__('Vimeo url', 'newsgem'),
   'section' => 'newsgem_social_settings',
   'type' => 'text',
)
);
$wp_customize->add_setting(
'youtube_link',
array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'youtube_link',
array(
   'label' => esc_html__('Youtube url', 'newsgem'),
   'section' => 'newsgem_social_settings',
   'type' => 'text',
)
);
$wp_customize->add_setting(
'dribbble_link',
array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'dribbble_link',
array(
   'label' => esc_html__('Dribbble url', 'newsgem'),
   'section' => 'newsgem_social_settings',
   'type' => 'text',
)
);
$wp_customize->add_setting(
'linkedin_link',
array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'linkedin_link',
array(
   'label' => esc_html__('Linkedin url', 'newsgem'),
   'section' => 'newsgem_social_settings',
   'type' => 'text',
)
);
$wp_customize->add_setting(
'tumblr_link',
array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'tumblr_link',
array(
   'label' => esc_html__('Tumblr url', 'newsgem'),
   'section' => 'newsgem_social_settings',
   'type' => 'text',
)
);

$wp_customize->add_setting(
'rss_link',
array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'rss_link',
array(
   'label' => esc_html__('Rss url', 'newsgem'),
   'section' => 'newsgem_social_settings',
   'type' => 'text',
)
);
//footer copyright
$wp_customize->add_section( 'newsgem_footer_settings' ,
			array(
				'priority'    => 5,
				'title'       => esc_html__( 'Copyright', 'newsgem' ),
				'description' => '',
				'panel'       => 'newsgem_options',
			)
		);
$wp_customize->add_setting(
'copyright',
array(
'default' => '',
'sanitize_callback' => 'newsgem_allowhtml_string',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'copyright',
array(
   'label' => esc_html__('Copyright text', 'newsgem'),
   'section' => 'newsgem_footer_settings',
   'type' => 'textarea',
)
);
global $wpdb;
	$blocks = $wpdb->get_results("SELECT ID, post_title FROM $wpdb->posts WHERE post_type = 'wpcf7_contact_form'");
	$blocks_array = array('');
	if ($blocks) {
		foreach ( $blocks as $block ) {
$blocks_array[$block->ID] = $block->post_title;
		}
	} else {
		$blocks_array["No content blocks found"] = 0;
	}
///Contact form
$wp_customize->add_section( 'newsgem_contact_form' ,
			array(
				'priority'    => 6,
				'title'       => esc_html__( 'Contact form 7', 'newsgem' ),
				'description' => '',
				'panel'       => 'newsgem_options',
			)
		);
$wp_customize->add_setting(
'contact_form',
array(
'default' => '',
'sanitize_callback' => 'newsgem_sanitize_text',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'contact_form',
array(
   'label' => esc_html__('Select contact form ', 'newsgem'),
   'section' => 'newsgem_contact_form',
   'type'  =>'select',
   'choices' => $blocks_array,
  'description'	=>__('If display contact form 7 please install <a target="_blank" href="https://wordpress.org/plugins/contact-form-7/">Contact Form 7</a> plugin', 'newsgem' )	
  
)
);
//home page feature news
$wp_customize->add_panel( 'newsgem_home_news_options',
			array(
				'priority'       => 11,
			    'capability'     => 'edit_theme_options',
			    'theme_supports' => '',
			    'title'          => esc_html__( 'Home Featured News', 'newsgem' ),
			    'description'    => '',
			)
		);
				/* Global Settings
		----------------------------------------------------------------------*/
		$wp_customize->add_section( 'feature_news_settings' ,
			array(
				'priority'    => 4,
				'title'       => esc_html__( 'First section', 'newsgem' ),
				'description' => '',
				'panel'       => 'newsgem_home_news_options',
			)
		);
		//first category
		$wp_customize->add_setting(
'feature_new_cat_one',
array(
'sanitize_callback' => 'newsgem_sanitize_text'
)
);
$wp_customize->add_control(
'feature_new_cat_one',
array(
   'label' => esc_html__('First section', 'newsgem'),
   'section' => 'feature_news_settings',
   'type'  =>'select',
   'choices' => $newsgem_cat,
   'description' => esc_html__( 'Select category if you want display feature news','newsgem' ),
  
)
);
//second category
$wp_customize->add_setting(
'feature_new_cat_two',
array(
'sanitize_callback' => 'newsgem_sanitize_text'
)
);
$wp_customize->add_control(
'feature_new_cat_two',
array(
   'label' => esc_html__('Second section', 'newsgem'),
   'section' => 'feature_news_settings',
   'type'  =>'select',
   'choices' => $newsgem_cat,
   'description' => esc_html__( 'Select category if you want display feature news','newsgem' ),
  
)
);
//second section
/* Global Settings
		----------------------------------------------------------------------*/
		$wp_customize->add_section( 'feature_second_news_settings' ,
			array(
				'priority'    => 5,
				'title'       => esc_html__( 'Second section', 'newsgem' ),
				'description' => '',
				'panel'       => 'newsgem_home_news_options',
			)
		);
		//first category
		$wp_customize->add_setting(
'feature_new_second_cat_one',
array(
'sanitize_callback' => 'newsgem_sanitize_text'
)
);
$wp_customize->add_control(
'feature_new_second_cat_one',
array(
   'label' => esc_html__('First section', 'newsgem'),
   'section' => 'feature_second_news_settings',
   'type'  =>'select',
   'choices' => $newsgem_cat,
   'description' => esc_html__( 'Select category if you want display feature news','newsgem' ),
  
)
);
//second category
		$wp_customize->add_setting(
'feature_new_second_cat_two',
array(
'sanitize_callback' => 'newsgem_sanitize_text'
)
);
$wp_customize->add_control(
'feature_new_second_cat_two',
array(
   'label' => esc_html__('Second section', 'newsgem'),
   'section' => 'feature_second_news_settings',
   'type'  =>'select',
   'choices' => $newsgem_cat,
   'description' => esc_html__( 'Select category if you want display feature news','newsgem' ),
  
)
);
//third section
/* Global Settings
		----------------------------------------------------------------------*/
		$wp_customize->add_section( 'feature_third_news_settings' ,
			array(
				'priority'    => 5,
				'title'       => esc_html__( 'Third section', 'newsgem' ),
				'description' => '',
				'panel'       => 'newsgem_home_news_options',
			)
		);
		//first category
		$wp_customize->add_setting(
'feature_new_third_cat_one',
array(
'sanitize_callback' => 'newsgem_sanitize_text'
)
);
$wp_customize->add_control(
'feature_new_third_cat_one',
array(
   'label' => esc_html__('Section news', 'newsgem'),
   'section' => 'feature_third_news_settings',
   'type'  =>'select',
   'choices' => $newsgem_cat,
   'description' => esc_html__( 'Select category if you want display feature news','newsgem' ),
  
)
);
}
/* add settings to create various social media text areas. */
function newsgem_customizer_script() {
	wp_enqueue_style( 'newsgem-customizer-style', get_template_directory_uri() .'/admin/customizer-style.css');	
}
add_action( 'customize_controls_enqueue_scripts', 'newsgem_customizer_script' );
add_action('customize_register', 'newsgem_themes_customizer');
function newsgem_sanitize_text($input) {
   return wp_kses_post($input);
}
function newsgem_sanitize_checkbox( $checked ) {
  if ( $checked == 1 ) {
        return 1;
    } else {
        return '';
    }
}
if (!function_exists('newsgem_allowhtml_string')) {
    function newsgem_allowhtml_string($string) {
        $allowed_tags = array(    
        'a' => array(
        'href' => array(),
        'title' => array()),
        'img' => array(
        'src' => array(),  
        'alt' => array(),),
        'iframe' => array(
        'src' => array(),  
        'frameborder' => array(),
        'allowfullscreen' => array(),
         ),
        'p' => array(),
        'br' => array(),
        'em' => array(),
        'strong' => array(),);
        return wp_kses($string,$allowed_tags);

    }
}
?>