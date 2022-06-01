<?php
/**
 * Liber Theme Customizer.
 *
 * @package Liber
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function liber_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->remove_section('colors');
	
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'liber_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'liber_customize_partial_blogdescription',
	) );
	
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'liber_header_info', array(
			'selector'        => '.header-inner .site-info',
			'settings'        => 'liber_header_info',
			'render_callback' => 'liber_header_info_render_callback',
		) );
	}
	
	/**
	 * Render callback for liber_header_info
	 * @return mixed
	 */
	function liber_header_info_render_callback() {
		return wp_kses_post( get_theme_mod( 'liber_header_info' ) );
	}

	$wp_customize->add_panel( 'liber_panel', array(
		'priority'       => 130,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => esc_html__( 'Theme Options', 'liber' ),
		'description'    => esc_html__( 'Liber Theme Options', 'liber' ),
	) );

	$wp_customize->add_section( 'liber_header_settings', array(
		'title'	=> esc_html__( 'Header', 'liber' ),
		'panel'	=> 'liber_panel',
		'priority' => 1,
	) );
	
	/* Header Info */
	$wp_customize->add_setting( 'liber_header_info', array(
		'default'           => '',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( 'liber_header_info', array(
		'label'             => esc_html__( 'Header Text Info', 'liber' ),
		'description'       => esc_html__( 'Enter the text for the info', 'liber' ),
		'section'           => 'liber_header_settings',
		'priority'          => 1,
		'type'              => 'textarea',
	) );
	
	/* Header Layout */
	$wp_customize->add_setting( 'liber_header_layout', array(
		'default'           => 'main-header',
		'sanitize_callback' => 'liber_sanitize_choices',
	) );
	$wp_customize->add_control( 'liber_header_layout', array(
		'label'             => esc_html__( 'Header Options', 'liber' ),
		'section'           => 'liber_header_settings',
		'settings'          => 'liber_header_layout',
		'priority'          => 2,
		'type'              => 'radio',
		'choices'           => array(
			'main-header'   => esc_html__( 'Main Header', 'liber' ),
			'main-boxed'  => esc_html__( 'Main Boxed Header', 'liber' ),
			'two-row-header'  => esc_html__( 'Two Row Header', 'liber' ),
			'two-row-boxed-header'  => esc_html__( 'Two Row Boxed Header', 'liber' ),
			'fixed-header'   => esc_html__( 'Fixed Header', 'liber' ),
			'center-header'   => esc_html__( 'Center Header', 'liber' ),
		)
	) );
	
	/* Header Colors */
	$wp_customize->add_setting( 'liber_header_background_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'liber_header_background_color', array(
		'label'             => esc_html__( 'Background Color', 'liber' ),
		'section'           => 'liber_header_settings',
		'settings'          => 'liber_header_background_color',
		'priority'          => 3,
	) ) );
	
	$wp_customize->add_setting( 'liber_header_elements_text', array(
		'default'           => '#404040',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'liber_header_elements_text', array(
		'label'             => esc_html__( 'Text Color', 'liber' ),
		'section'           => 'liber_header_settings',
		'settings'          => 'liber_header_elements_text',
		'priority'          => 5,
	) ) );
	
	$wp_customize->add_setting( 'liber_header_elements_submenu_bg', array(
		'default'           => '#f6f8f4',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'liber_header_elements_submenu_bg', array(
		'label'             => esc_html__( 'Submenu Background, Mobile Social Background & Mobile Menu Background Color', 'liber' ),
		'section'           => 'liber_header_settings',
		'settings'          => 'liber_header_elements_submenu_bg',
		'priority'          => 6,
	) ) );
	
	$wp_customize->add_setting( 'liber_header_elements_submenu_border', array(
		'default'           => '#dce4d3',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'liber_header_elements_submenu_border', array(
		'label'             => esc_html__( 'Submenu Border Color', 'liber' ),
		'section'           => 'liber_header_settings',
		'settings'          => 'liber_header_elements_submenu_border',
		'priority'          => 7,
	) ) );
	
	$wp_customize->add_setting( 'liber_header_elements_borders', array(
		'default'           => '#e2e7dd',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'liber_header_elements_borders', array(
		'label'             => esc_html__( 'Mobile Submenu Border & Second Submenu Border Color', 'liber' ),
		'section'           => 'liber_header_settings',
		'settings'          => 'liber_header_elements_borders',
		'priority'          => 8,
	) ) );
	
	//Hero Options
	$wp_customize->add_section( 'liber_hero_options', array(
		'title'    => esc_html__( 'Hero Image', 'liber' ),
		'description'       => esc_html__( 'Hero image is featured image of the page you select to be your front page. Caption text is text added to the editor of that same page.', 'liber' ),
		'panel'	=> 'liber_panel',
		'priority' => 2,
	) );
	
	$wp_customize->add_setting( 'liber_hero_hide', array(
		'default'           => false,
		'sanitize_callback' => 'liber_sanitize_checkbox',
	) );
	$wp_customize->add_control('liber_hero_hide', array(
				'label'      => esc_html__( 'Hide Hero Image & Caption', 'liber' ),
				'settings'   => 'liber_hero_hide',
				'section'    => 'liber_hero_options',
				'type'		 => 'checkbox',
				'priority'	 => 1
	) );
	
	$wp_customize->add_setting( 'liber_overlay', array(
		'default'           => '0.0',
		'sanitize_callback' => 'liber_sanitize_overlay',
	) );

	$wp_customize->add_control( 'liber_overlay', array(
		'label'   => esc_html__( 'Hero Image Opacity', 'liber' ),
		'section' => 'liber_hero_options',
		'type'    => 'select',
		'priority'          => 2,
		'choices' => array(
						'0.0' => '0%',
						'0.1' => '10%',
						'0.2' => '20%',
						'0.3' => '30%',
						'0.4' => '40%',
						'0.5' => '50%',
						'0.6' => '60%',
						'0.7' => '70%',
						'0.8' => '80%',
						'0.9' => '90%',
						'1.0' => '100%',
					),
	) );
	
	/* Hero Colors */
	$wp_customize->add_setting( 'liber_overlay_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'liber_overlay_color', array(
		'label'             => esc_html__( 'Hero Overlay Color', 'liber' ),
		'section'           => 'liber_hero_options',
		'settings'          => 'liber_overlay_color',
		'priority'          => 3,
	) ) );
	
	$wp_customize->add_setting( 'liber_caption_bg', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'liber_caption_bg', array(
		'label'             => esc_html__( 'Hero Caption Background Color', 'liber' ),
		'section'           => 'liber_hero_options',
		'settings'          => 'liber_caption_bg',
		'priority'          => 4,
	) ) );
	
	$wp_customize->add_setting( 'liber_caption_text', array(
		'default'           => '#404040',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'liber_caption_text', array(
		'label'             => esc_html__( 'Hero Caption Text Color and Link Hover Border', 'liber' ),
		'section'           => 'liber_hero_options',
		'settings'          => 'liber_caption_text',
		'priority'          => 5,
	) ) );
	
	$wp_customize->add_setting( 'liber_caption_mobile_bg', array(
		'default'           => '#f9fcf3',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'liber_caption_mobile_bg', array(
		'label'             => esc_html__( 'Hero Caption Background Color on Mobile', 'liber' ),
		'section'           => 'liber_hero_options',
		'settings'          => 'liber_caption_mobile_bg',
		'priority'          => 6,
	) ) );
	
	
	/* Hero Caption Position */
	$wp_customize->add_setting( 'liber_caption_position', array(
		'default'           => 'left-position',
		'sanitize_callback' => 'liber_sanitize_choices',
	) );
	$wp_customize->add_control( 'liber_caption_position', array(
		'label'             => esc_html__( 'Caption Position', 'liber' ),
		'section'           => 'liber_hero_options',
		'settings'          => 'liber_caption_position',
		'priority'          => 7,
		'type'              => 'radio',
		'choices'           => array(
			'left-position'   => esc_html__( 'Left', 'liber' ),
			'center-position'  => esc_html__( 'Center', 'liber' ),
			'right-position'  => esc_html__( 'Right', 'liber' ),
		)
	) );
	
	$wp_customize->add_setting( 'liber_overlay_inner', array(
		'default'           => '0.7',
		'sanitize_callback' => 'liber_sanitize_overlay',
	) );

	$wp_customize->add_control( 'liber_overlay_inner', array(
		'label'   => esc_html__( 'Inner Pages Hero Image Opacity', 'liber' ),
		'section' => 'liber_hero_options',
		'type'    => 'select',
		'priority'          => 8,
		'choices' => array(
						'0.0' => '0%',
						'0.1' => '10%',
						'0.2' => '20%',
						'0.3' => '30%',
						'0.4' => '40%',
						'0.5' => '50%',
						'0.6' => '60%',
						'0.7' => '70%',
						'0.8' => '80%',
						'0.9' => '90%',
						'1.0' => '100%',
					),
	) );
	
	//Featured Slider
	$wp_customize->add_section( 'liber_featured_slider_options', array(
		'title'    => esc_html__( 'Featured Slider', 'liber' ),
		'panel'	=> 'liber_panel',
		'priority' => 3,
	) );
	
	$wp_customize->add_setting( 'liber_featured_slider', array(
		'default'           => false,
		'sanitize_callback' => 'liber_sanitize_checkbox',
	) );
	$wp_customize->add_control('liber_featured_slider', array(
				'label'      => esc_html__( 'Show featured slider on the front page', 'liber' ),
				'settings'   => 'liber_featured_slider',
				'section'    => 'liber_featured_slider_options',
				'type'		 => 'checkbox',
				'priority'	 => 1
	) );
	
	$wp_customize->add_setting( 'liber_featured-slider_post_number', array(
		'default'           => '3',
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( 'liber_featured-slider_post_number', array(
		'label'             => esc_html__( 'Number of posts', 'liber' ),
		'description'       => esc_html__( 'Enter number of posts to display in the slider.', 'liber' ),
		'settings'           => 'liber_featured-slider_post_number',
		'section'            => 'liber_featured_slider_options',
		'priority'          => 2,
		'type'              => 'text',
	) );

	$wp_customize->add_setting( 'liber_featured-slider_post_category', array(
		'default'           => '',
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( 'liber_featured-slider_post_category', array(
		'label'             => esc_html__( 'Post Category', 'liber' ),
		'description'       => esc_html__( 'Enter post category to display in slider.', 'liber' ),
		'settings'           => 'liber_featured-slider_post_category',
		'section'            => 'liber_featured_slider_options',
		'priority'          => 3,
		'type'              => 'text',
	) );
	
	$wp_customize->add_setting( 'liber_featured_slider_layout', array(
		'default'           => 'full-layout',
		'sanitize_callback' => 'liber_sanitize_choices',
	) );
	$wp_customize->add_control( 'liber_featured_slider_layout', array(
		'label'             => esc_html__( 'Featured Slider Layout', 'liber' ),
		'section'           => 'liber_featured_slider_options',
		'settings'          => 'liber_featured_slider_layout',
		'priority'          => 4,
		'type'              => 'radio',
		'choices'           => array(
			'full-layout'   => esc_html__( 'Full', 'liber' ),
			'boxed-layout'  => esc_html__( 'Boxed', 'liber' ),
		)
	) );
	
	$wp_customize->add_setting( 'liber_featured_slider_caption_opacity', array(
		'default'           => '0.0',
		'sanitize_callback' => 'liber_sanitize_overlay',
	) );

	$wp_customize->add_control( 'liber_featured_slider_caption_opacity', array(
		'label'             => esc_html__( 'Caption Background Opacity', 'liber' ),
		'section'           => 'liber_featured_slider_options',
		'settings'          => 'liber_featured_slider_caption_opacity',
		'type'              => 'select',
		'priority'          => 5,
		'choices' => array(
						'0.0' => '0%',
						'0.1' => '10%',
						'0.2' => '20%',
						'0.3' => '30%',
						'0.4' => '40%',
						'0.5' => '50%',
						'0.6' => '60%',
						'0.7' => '70%',
						'0.8' => '80%',
						'0.9' => '90%',
						'1.0' => '100%',
					),
	) );
	
	$wp_customize->add_setting( 'liber_featured_slider_caption_opacity_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'liber_featured_slider_caption_opacity_color', array(
		'label'             => esc_html__( 'Caption Background Color', 'liber' ),
		'section'           => 'liber_featured_slider_options',
		'settings'          => 'liber_featured_slider_caption_opacity_color',
		'priority'          => 6,
	) ) );
	
	$wp_customize->add_setting( 'liber_featured_slider_caption_text_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'liber_featured_slider_caption_text_color', array(
		'label'             => esc_html__( 'Caption Text Color', 'liber' ),
		'section'           => 'liber_featured_slider_options',
		'settings'          => 'liber_featured_slider_caption_text_color',
		'priority'          => 7,
	) ) );
	
	$wp_customize->add_setting( 'liber_featured_slider_caption_width', array(
		'default'           => '100',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'liber_featured_slider_caption_width', array(
		'label'             => esc_html__( 'Caption Width in Percentage', 'liber' ),
		'section'           => 'liber_featured_slider_options',
		'settings'          => 'liber_featured_slider_caption_width',
		'priority'          => 8,
		'type'              => 'text',
	) );
	
	$wp_customize->add_setting( 'liber_featured_slider_height', array(
		'default'           => 'height-default',
		'sanitize_callback' => 'liber_sanitize_choices',
	) );
	$wp_customize->add_control( 'liber_featured_slider_height', array(
		'label'      => esc_html__( 'Slider Height', 'liber' ),
		'description'       => esc_html__( 'You can have default height (700px) or auto height (addapting to the image height).', 'liber' ),
		'section'           => 'liber_featured_slider_options',
		'settings'          => 'liber_featured_slider_height',
		'priority'          => 9,
		'type'              => 'radio',
		'choices'           => array(
			'height-default'   => esc_html__( 'Default Height', 'liber' ),
			'height-auto'  => esc_html__( 'Auto Height', 'liber' ),
		)
	) );

	$wp_customize->add_panel( 'liber_panel_front', array(
		'priority'       => 131,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => esc_html__( 'Front Page Content/Settings', 'liber' ),
	) );
	
	// Panels
	for ( $p = 1; $p <= 5; $p ++ ) {

		$title = sprintf( esc_html__( 'Panel %d', 'liber' ), $p );
		$wp_customize->add_section( 'liber_panel' . $p, array(
			'title'           => $title,
			'active_callback' => 'is_front_page',
			'panel'           => 'liber_panel_front',
			'description'     => esc_html__( 'Select a page whose content should be displayed in this panel. If you don&rsquo;t select a page this panel will not be displayed.', 'liber' ),
		) );

		$wp_customize->add_setting( 'liber_panel' . $p, array(
			'default'           => false,
			'sanitize_callback' => 'liber_sanitize_numeric_value',
		) );

		$wp_customize->add_control( 'liber_panel' . $p, array(
			'label'   => esc_html__( 'Panel Content', 'liber' ),
			'description'       => esc_html__( 'Choose a page you want to show as a panel content.', 'liber' ),
			'section' => 'liber_panel' . $p,
			'priority'          => 1,
			'type'    => 'dropdown-pages',
		) );

		$wp_customize->selective_refresh->add_partial( 'liber_panel' . $p, array(
			'selector'            => '.liber-panel' . $p,
			'render_callback'     => 'liber_panel_front',
			'container_inclusive' => true,
		) );

		/* Page Title */
		$wp_customize->add_setting( 'liber_page_title' . $p, array(
			'default'           => false,
			'sanitize_callback' => 'liber_sanitize_checkbox',
		) );
		$wp_customize->add_control('liber_page_title' . $p, array(
					'label'      => esc_html__( 'Hide Page Title', 'liber' ),
					'settings'   => 'liber_page_title' . $p,
					'section'    => 'liber_panel' . $p,
					'type'		 => 'checkbox',
					'priority'	 => 2
		) );

		/* Title Tagline */
		$wp_customize->add_setting( 'liber_title_tagline' . $p, array(
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post',
		) );
		$wp_customize->add_control( 'liber_title_tagline' . $p, array(
			'label'             => esc_html__( 'Panel Tagline', 'liber' ),
			'description'       => esc_html__( 'Add a tagline text to your panel. If the title is enabled the tagline will be displayed above it.', 'liber' ),
			'section'           => 'liber_panel' . $p,
			'priority'          => 3,
			'type'              => 'textarea',
		) );

		/* Featured Image Layout */
		$wp_customize->add_setting( 'liber_featured_image' . $p, array(
			'default'           => 'full-image',
			'sanitize_callback' => 'liber_sanitize_choices',
		) );
		$wp_customize->add_control( 'liber_featured_image' . $p, array(
			'label'             => esc_html__( 'Featured Image Options', 'liber' ),
			'description'       => esc_html__( 'To use these options, featured image needs to be uploaded in the page editor of the page you selected in "Panel Content"', 'liber' ),
			'section'           => 'liber_panel' . $p,
			'settings'          => 'liber_featured_image' . $p,
			'priority'          => 4,
			'type'              => 'radio',
			'choices'           => array(
				'featured-image-background'   => esc_html__( 'Featured Image as Page Background', 'liber' ),
				'half-width-image'   => esc_html__( 'Half Width Featured Image Right', 'liber' ),
				'half-width-image-left'   => esc_html__( 'Half Width Featured Image Left', 'liber' ),
				'full-image'  => esc_html__( 'Full Width Featured Image', 'liber' ),
			)
		) );

		/* Page Content Style */
		$wp_customize->add_setting( 'liber_page_style' . $p, array(
			'default'           => 'default-style',
			'sanitize_callback' => 'liber_sanitize_choices',
		) );
		$wp_customize->add_control( 'liber_page_style' . $p, array(
			'label'             => esc_html__( 'Panel Content Style', 'liber' ),
			'description'       => esc_html__( 'Choose the layout of the main panel content.', 'liber' ),
			'section'           => 'liber_panel' . $p,
			'settings'          => 'liber_page_style' . $p,
			'priority'          => 5,
			'type'              => 'radio',
			'choices'           => array(
				'default-style'   => esc_html__( 'Default Style', 'liber' ),
				'box-style'  => esc_html__( 'Boxed Style', 'liber' ),
			)
		) );

		/* Child Pages Columns */
		$wp_customize->add_setting( 'liber_page_columns' . $p, array(
			'default'           => 'threecolumn',
			'sanitize_callback' => 'liber_sanitize_choices',
		) );
		$wp_customize->add_control( 'liber_page_columns' . $p, array(
			'label'      => esc_html__( 'Panel Child Page Columns', 'liber' ),
			'description'       => esc_html__( 'Choose the number of columns for displaying Child Pages. This feature can be used if the page you selected in "Panel Content" has child pages.', 'liber' ),
			'section'           => 'liber_panel' . $p,
			'settings'          => 'liber_page_columns' . $p,
			'priority'          => 6,
			'type'              => 'radio',
			'choices'           => array(
				'fourcolumn'   => esc_html__( 'Four Columns', 'liber' ),
				'threecolumn'  => esc_html__( 'Three Columns', 'liber' ),
				'twocolumn'  => esc_html__( 'Two Columns', 'liber' ),
				'onecolumn'  => esc_html__( 'One Column', 'liber' ),
			)
		) );
		
		/* Child Pages Image Link */
		$wp_customize->add_setting( 'liber_image_link' . $p, array(
			'default'           => false,
			'sanitize_callback' => 'liber_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'liber_image_link' . $p, array(
			'label'             => esc_html__( 'Disable Featured Image Link', 'liber' ),
			'section'           => 'liber_panel' . $p,
			'priority'          => 6,
			'type'              => 'checkbox',
		) );
		
		/* Child Pages Title Link */
		$wp_customize->add_setting( 'liber_child_title_link' . $p, array(
			'default'           => false,
			'sanitize_callback' => 'liber_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'liber_child_title_link' . $p, array(
			'label'             => esc_html__( 'Disable Title Link', 'liber' ),
			'section'           => 'liber_panel' . $p,
			'priority'          => 6,
			'type'              => 'checkbox',
		) );

		// Recent Posts checkbox
		$wp_customize->add_setting( 'liber_front_posts' . $p, array(
			'default'           => false,
			'sanitize_callback' => 'liber_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'liber_front_posts' . $p, array(
			'label'             => esc_html__( 'Enable Recent Posts', 'liber' ),
			'description'       => esc_html__( 'This will display your recent posts in this panel.', 'liber' ),
			'section'           => 'liber_panel' . $p,
			'priority'          => 7,
			'type'              => 'checkbox',
		) );

		/* Post Number */
		$wp_customize->add_setting( 'liber_post_number' . $p, array(
			'default'           => '9',
			'sanitize_callback' => 'wp_kses_post',
		) );
		$wp_customize->add_control( 'liber_post_number' . $p, array(
			'label'             => esc_html__( 'Number of posts', 'liber' ),
			'description'       => esc_html__( 'Enter number of recent posts you want to show in this panel.', 'liber' ),
			'section'           => 'liber_panel' . $p,
			'priority'          => 8,
			'type'              => 'text',
		) );

		/* Post Category */
		$wp_customize->add_setting( 'liber_post_category' . $p, array(
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post',
		) );
		$wp_customize->add_control( 'liber_post_category' . $p, array(
			'label'             => esc_html__( 'Post Category', 'liber' ),
			'description'       => esc_html__( 'Enter the name of the category you want to display.', 'liber' ),
			'section'           => 'liber_panel' . $p,
			'priority'          => 9,
			'type'              => 'text',
		) );

		/* Post Style */
		$wp_customize->add_setting( 'liber_post_style' . $p, array(
			'default'           => 'style-one',
			'sanitize_callback' => 'liber_sanitize_choices',
		) );
		$wp_customize->add_control( 'liber_post_style' . $p, array(
			'label'             => esc_html__( 'Post Style', 'liber' ),
			'section'           => 'liber_panel' . $p,
			'priority'          => 10,
			'type'              => 'radio',
			'choices'           => array(
				'style-one'   => esc_html__( 'Default Style', 'liber' ),
				'style-two'   => esc_html__( 'Elegant Style', 'liber' ),
			)
		) );

		/* Post Margin Top */
		$wp_customize->add_setting( 'liber_panel' . $p . '_post_margin_top', array(
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post'
		) );
		$wp_customize->add_control( 'liber_panel' . $p . '_post_margin_top', array(
			'label'             => esc_html__( 'Margin Top', 'liber' ),
			'description'       => esc_html__( 'Add Margin (example: 50)', 'liber' ),
			'section'           => 'liber_panel' . $p,
			'settings'          => 'liber_panel' . $p . '_post_margin_top',
			'priority'          => 10,
			'type'              => 'text',
		) );
		
		/* Post Margin Bottom */
		$wp_customize->add_setting( 'liber_panel' . $p . '_post_margin_bottom', array(
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post'
		) );
		$wp_customize->add_control( 'liber_panel' . $p . '_post_margin_bottom', array(
			'label'             => esc_html__( 'Margin Bottom', 'liber' ),
			'description'       => esc_html__( 'Add Margin (example: 50)', 'liber' ),
			'section'           => 'liber_panel' . $p,
			'settings'          => 'liber_panel' . $p . '_post_margin_bottom',
			'priority'          => 10,
			'type'              => 'text',
		) );

		// Menu checkbox
		$wp_customize->add_setting( 'liber_front_menu' . $p, array(
			'default'           => false,
			'sanitize_callback' => 'liber_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'liber_front_menu' . $p, array(
			'label'             => esc_html__( 'Enable Food Menu', 'liber' ),
			'description'       => esc_html__( 'This will display Food Menu custom posts in this panel.', 'liber' ),
			'section'           => 'liber_panel' . $p,
			'priority'          => 10,
			'type'              => 'checkbox',
		) );

		/* Menu Post Number */
		$wp_customize->add_setting( 'liber_menu_post_number' . $p, array(
			'default'           => '3',
			'sanitize_callback' => 'wp_kses_post',
		) );
		$wp_customize->add_control( 'liber_menu_post_number' . $p, array(
			'label'             => esc_html__( 'Number of food menu posts', 'liber' ),
			'description'       => esc_html__( 'Enter number of food menu posts you want to show in this panel.', 'liber' ),
			'section'           => 'liber_panel' . $p,
			'priority'          => 11,
			'type'              => 'text',
		) );

		/* Menu Post Category */
		$wp_customize->add_setting( 'liber_menu_post_category' . $p, array(
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post',
		) );
		$wp_customize->add_control( 'liber_menu_post_category' . $p, array(
			'label'             => esc_html__( 'Food Menu Category', 'liber' ),
			'description'       => esc_html__( 'Enter the name of the category you want to display.', 'liber' ),
			'section'           => 'liber_panel' . $p,
			'priority'          => 12,
			'type'              => 'text',
		) );

		/* Menu Margin Top */
		$wp_customize->add_setting( 'liber_panel' . $p . '_menu_margin_top', array(
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post'
		) );
		$wp_customize->add_control( 'liber_panel' . $p . '_menu_margin_top', array(
			'label'             => esc_html__( 'Margin Top', 'liber' ),
			'description'       => esc_html__( 'Add Margin (example: 50)', 'liber' ),
			'section'           => 'liber_panel' . $p,
			'settings'          => 'liber_panel' . $p . '_menu_margin_top',
			'priority'          => 12,
			'type'              => 'text',
		) );
		
		/* Menu Margin Bottom */
		$wp_customize->add_setting( 'liber_panel' . $p . '_menu_margin_bottom', array(
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post'
		) );
		$wp_customize->add_control( 'liber_panel' . $p . '_menu_margin_bottom', array(
			'label'             => esc_html__( 'Margin Bottom', 'liber' ),
			'description'       => esc_html__( 'Add Margin (example: 50)', 'liber' ),
			'section'           => 'liber_panel' . $p,
			'settings'          => 'liber_panel' . $p . '_menu_margin_bottom',
			'priority'          => 12,
			'type'              => 'text',
		) );
		
		/* Menu Title Link */
		$wp_customize->add_setting( 'liber_menu_title_link' . $p, array(
			'default'           => false,
			'sanitize_callback' => 'liber_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'liber_menu_title_link' . $p, array(
			'label'             => esc_html__( 'Enable Food Menu Title Link', 'liber' ),
			'section'           => 'liber_panel' . $p,
			'priority'          => 12,
			'type'              => 'checkbox',
		) );

		// Testimonials checkbox
		$wp_customize->add_setting( 'liber_front_testimonials' . $p, array(
			'default'           => false,
			'sanitize_callback' => 'liber_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'liber_front_testimonials' . $p, array(
			'label'             => esc_html__( 'Enable Testimonials', 'liber' ),
			'description'       => esc_html__( 'This will display Testimonials custom posts in this panel.', 'liber' ),
			'section'           => 'liber_panel' . $p,
			'priority'          => 13,
			'type'              => 'checkbox',
		) );

		/* Testimonials Number */
		$wp_customize->add_setting( 'liber_testimonials_post_number' . $p, array(
			'default'           => '3',
			'sanitize_callback' => 'wp_kses_post',
		) );
		$wp_customize->add_control( 'liber_testimonials_post_number' . $p, array(
			'label'             => esc_html__( 'Number of testimonials ', 'liber' ),
			'description'       => esc_html__( 'Enter number of testimonial posts you want to show in this panel.', 'liber' ),
			'section'           => 'liber_panel' . $p,
			'priority'          => 14,
			'type'              => 'text',
		) );

		/* Testimonials Margin Top */
		$wp_customize->add_setting( 'liber_panel' . $p . '_testimonials_margin_top', array(
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post'
		) );
		$wp_customize->add_control( 'liber_panel' . $p . '_testimonials_margin_top', array(
			'label'             => esc_html__( 'Margin Top', 'liber' ),
			'description'       => esc_html__( 'Add Margin (example: 50)', 'liber' ),
			'section'           => 'liber_panel' . $p,
			'settings'          => 'liber_panel' . $p . '_testimonials_margin_top',
			'priority'          => 14,
			'type'              => 'text',
		) );
		
		/* Testimonials Margin Bottom */
		$wp_customize->add_setting( 'liber_panel' . $p . '_testimonials_margin_bottom', array(
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post'
		) );
		$wp_customize->add_control( 'liber_panel' . $p . '_testimonials_margin_bottom', array(
			'label'             => esc_html__( 'Margin Bottom', 'liber' ),
			'description'       => esc_html__( 'Add Margin (example: 50)', 'liber' ),
			'section'           => 'liber_panel' . $p,
			'settings'          => 'liber_panel' . $p . '_testimonials_margin_bottom',
			'priority'          => 14,
			'type'              => 'text',
		) );

		/* Colors */
		$wp_customize->add_setting( 'liber_panel' . $p . '_background', array(
			'default'           => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'liber_panel' . $p . '_background', array(
			'label'             => esc_html__( 'Panel Content Background Color', 'liber' ),
			'section'           => 'liber_panel' . $p,
			'settings'          => 'liber_panel' . $p . '_background',
			'priority'          => 15,
		) ) );

		$wp_customize->add_setting( 'liber_panel' . $p . '_text_color', array(
			'default'           => '#404040',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'liber_panel' . $p . '_text_color', array(
			'label'             => esc_html__( 'Panel Text and Border Color', 'liber' ),
			'section'           => 'liber_panel' . $p,
			'settings'          => 'liber_panel' . $p . '_text_color',
			'priority'          => 16,
		) ) );

		$wp_customize->add_setting( 'liber_panel' . $p . '_elements_half', array(
			'default'           => '#ebefe3',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'liber_panel' . $p . '_elements_half', array(
			'label'             => esc_html__( 'Panel Half Width and Boxed Style Background Color', 'liber' ),
			'description'       => esc_html__( 'Available if "Half Width Featured Image" option is selected in "Featured Image Options" & "Boxed Style" option is selected in "Panel Content Style" for this panel.', 'liber' ),
			'section'           => 'liber_panel' . $p,
			'settings'          => 'liber_panel' . $p . '_elements_half',
			'priority'          => 18,
		) ) );

		$wp_customize->add_setting( 'liber_panel' . $p . '_elements_testimonials', array(
			'default'           => '#e2e7d9',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'liber_panel' . $p . '_elements_testimonials', array(
			'label'             => esc_html__( 'Panel Testimonials Border', 'liber' ),
			'description'       => esc_html__( 'Available if Testimonials are enabled for this panel.', 'liber' ),
			'section'           => 'liber_panel' . $p,
			'settings'          => 'liber_panel' . $p . '_elements_testimonials',
			'priority'          => 19,
		) ) );
	}

/**
* Adds the individual sections for footer
*/
	$wp_customize->add_section( 'liber_footer_settings', array(
		'title'	=> esc_html__( 'Footer', 'liber' ),
		'panel'	=> 'liber_panel',
		'priority' => 4,
	) );
		
	$wp_customize->add_setting('liber_footer_sidebar_bg', array(
		'transport'			=> 'refresh',
		'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,
		'liber_footer_sidebar_bg',
		array(
			'label'		=> esc_html__( 'Footer Widget Area Background Image', 'liber' ),
			'section'	=> 'liber_footer_settings',
			'priority'  => 2,
		)
	) );

	$wp_customize->add_setting( 'liber_footer_opacity', array(
		'default'           => '0.8',
		'sanitize_callback' => 'liber_sanitize_opacity',
		'transport'         => 'refresh',
	) );

	$wp_customize->add_control( 'liber_footer_opacity', array(
		'label'       => esc_html__( 'Footer Widget Area Background Opacity', 'liber' ),
		'section'     => 'liber_footer_settings',
		'type'        => 'select',
		'active_callback' => 'liber_footer_background',
		'description' => esc_html( 'Set the opacity of the footer widget area overlay.', 'liber' ),
		'priority'          => 3,
		'choices'     => array(
			'0.2' => esc_html__( '20%', 'liber' ),
			'0.3' => esc_html__( '30%', 'liber' ),
			'0.4' => esc_html__( '40%', 'liber' ),
			'0.5' => esc_html__( '50%', 'liber' ),
			'0.6' => esc_html__( '60%', 'liber' ),
			'0.7' => esc_html__( '70%', 'liber' ),
			'0.8' => esc_html__( '80%', 'liber' ),
			'0.9' => esc_html__( '90%', 'liber' ),
			'1'   => esc_html__( '100%', 'liber' ),
		),
	) );
		
	/* Colors */
	$wp_customize->add_setting( 'liber_footer_background', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'liber_footer_background', array(
		'label'             => esc_html__( 'Background Color', 'liber' ),
		'section'           => 'liber_footer_settings',
		'settings'          => 'liber_footer_background',
		'priority'          => 4,
	) ) );
	
	$wp_customize->add_setting( 'liber_footer_text_color', array(
		'default'           => '#404040',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'liber_footer_text_color', array(
		'label'             => esc_html__( 'Text Color', 'liber' ),
		'section'           => 'liber_footer_settings',
		'settings'          => 'liber_footer_text_color',
		'priority'          => 5,
	) ) );

	$wp_customize->add_setting( 'liber_footer_border_color', array(
		'default'           => '#e2e7d9',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'liber_footer_border_color', array(
		'label'             => esc_html__( 'Widget List Border Color', 'liber' ),
		'section'           => 'liber_footer_settings',
		'settings'          => 'liber_footer_border_color',
		'priority'          => 7,
	) ) );

	//Food Menu Options
	$wp_customize->add_section( 'liber_panel_food_menu' , array(
		'title'       => esc_html__( 'Food Menu Category Page Options', 'liber' ),
		'priority'    => 132,
	) );
	
	$wp_customize->add_setting( 'liber_food_menu_category', array(
		'default'           => false,
		'sanitize_callback' => 'liber_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'liber_food_menu_category', array(
		'label'             => esc_html__( 'Enable Menu Category Tag', 'liber' ),
		'settings'          => 'liber_food_menu_category',
		'section'           => 'liber_panel_food_menu',
		'priority'          => 1,
		'type'              => 'checkbox',
	) );
	
	$wp_customize->add_setting( 'liber_food_menu_category_layout', array(
		'default'           => 'default-layout',
		'sanitize_callback' => 'liber_sanitize_choices',
	) );
	$wp_customize->add_control( 'liber_food_menu_category_layout', array(
		'label'             => esc_html__( 'Menu Category Layout', 'liber' ),
		'section'           => 'liber_panel_food_menu',
		'settings'          => 'liber_food_menu_category_layout',
		'priority'          => 2,
		'type'              => 'radio',
		'choices'           => array(
			'default-layout'   => esc_html__( 'Default', 'liber' ),
			'list-layout'  => esc_html__( 'List', 'liber' ),
			'classic-layout'  => esc_html__( 'Classic', 'liber' ),
		)
	) );
	

	//Blog Options
	$wp_customize->add_panel( 'liber_panel_blog', array(
		'priority'       => 132,
		'theme_supports' => '',
		'title'          => esc_html__( 'Blog Options', 'liber' ),
	) );
	
	$wp_customize->add_section( 'liber_featured_slider_blog_options', array(
		'title'           => esc_html__( 'Blog Featured Slider', 'liber' ),
		'panel'           => 'liber_panel_blog',
	) );

	$wp_customize->add_setting( 'liber_featured_slider_blog', array(
		'default'           => false,
		'sanitize_callback' => 'liber_sanitize_checkbox',
	) );
	$wp_customize->add_control('liber_featured_slider_blog', array(
				'label'      => esc_html__( 'Show Post Slider', 'liber' ),
				'description'       => esc_html__( 'Enables post slider on the blog page.', 'liber' ),
				'settings'   => 'liber_featured_slider_blog',
				'section'    => 'liber_featured_slider_blog_options',
				'type'		 => 'checkbox',
				'priority'	 => 1
	) );
	
	$wp_customize->add_setting( 'liber_featured_slider_post_number_blog', array(
		'default'           => '3',
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( 'liber_featured_slider_post_number_blog', array(
		'label'             => esc_html__( 'Number of posts', 'liber' ),
		'description'       => esc_html__( 'Enter number of posts to display in the slider.', 'liber' ),
		'settings'           => 'liber_featured_slider_post_number_blog',
		'section'            => 'liber_featured_slider_blog_options',
		'priority'          => 2,
		'type'              => 'text',
	) );
	
	$wp_customize->add_setting( 'liber_featured_slider_post_category_blog', array(
		'default'           => '',
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( 'liber_featured_slider_post_category_blog', array(
		'label'             => esc_html__( 'Post Category', 'liber' ),
		'description'       => esc_html__( 'Enter post category to display in slider.', 'liber' ),
		'settings'           => 'liber_featured_slider_post_category_blog',
		'section'            => 'liber_featured_slider_blog_options',
		'priority'          => 3,
		'type'              => 'text',
	) );
	
	$wp_customize->add_setting( 'liber_featured_slider_layout_blog', array(
		'default'           => 'full-layout',
		'sanitize_callback' => 'liber_sanitize_choices',
	) );
	$wp_customize->add_control( 'liber_featured_slider_layout_blog', array(
		'label'             => esc_html__( 'Featured Slider Layout', 'liber' ),
		'section'           => 'liber_featured_slider_blog_options',
		'settings'          => 'liber_featured_slider_layout_blog',
		'priority'          => 4,
		'type'              => 'radio',
		'choices'           => array(
			'full-layout'   => esc_html__( 'Full', 'liber' ),
			'boxed-layout'  => esc_html__( 'Boxed', 'liber' ),
		)
	) );
	
	$wp_customize->add_setting( 'liber_featured_slider_caption_opacity_blog', array(
		'default'           => '0.0',
		'sanitize_callback' => 'liber_sanitize_overlay',
	) );

	$wp_customize->add_control( 'liber_featured_slider_caption_opacity_blog', array(
		'label'             => esc_html__( 'Caption Background Opacity', 'liber' ),
		'section'           => 'liber_featured_slider_blog_options',
		'settings'          => 'liber_featured_slider_caption_opacity_blog',
		'type'              => 'select',
		'priority'          => 5,
		'choices' => array(
						'0.0' => '0%',
						'0.1' => '10%',
						'0.2' => '20%',
						'0.3' => '30%',
						'0.4' => '40%',
						'0.5' => '50%',
						'0.6' => '60%',
						'0.7' => '70%',
						'0.8' => '80%',
						'0.9' => '90%',
						'1.0' => '100%',
					),
	) );
	
	$wp_customize->add_setting( 'liber_featured_slider_caption_opacity_color_blog', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'liber_featured_slider_caption_opacity_color_blog', array(
		'label'             => esc_html__( 'Caption Background Color', 'liber' ),
		'section'           => 'liber_featured_slider_blog_options',
		'settings'          => 'liber_featured_slider_caption_opacity_color_blog',
		'priority'          => 6,
	) ) );
	
	$wp_customize->add_setting( 'liber_featured_slider_caption_text_color_blog', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'liber_featured_slider_caption_text_color_blog', array(
		'label'             => esc_html__( 'Caption Text Color', 'liber' ),
		'section'           => 'liber_featured_slider_blog_options',
		'settings'          => 'liber_featured_slider_caption_text_color_blog',
		'priority'          => 7,
	) ) );
	
	$wp_customize->add_setting( 'liber_featured_slider_caption_width_blog', array(
		'default'           => '100',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'liber_featured_slider_caption_width_blog', array(
		'label'             => esc_html__( 'Caption Width in Percentage', 'liber' ),
		'section'           => 'liber_featured_slider_blog_options',
		'settings'          => 'liber_featured_slider_caption_width_blog',
		'priority'          => 8,
		'type'              => 'text',
	) );
	
	$wp_customize->add_section( 'liber_featured_image_options', array(
		'title'           => esc_html__( 'Blog Title Block', 'liber' ),
		'panel'           => 'liber_panel_blog',
	) );
	
	$wp_customize->add_setting( 'liber_blog_title', array(
		'default'           => false,
		'sanitize_callback' => 'liber_sanitize_checkbox',
	) );
	$wp_customize->add_control('liber_blog_title', array(
				'label'      => esc_html__( 'Show Title Block', 'liber' ),
				'settings'   => 'liber_blog_title',
				'section'    => 'liber_featured_image_options',
				'type'		 => 'checkbox',
				'priority'	 => 1
	) );
	
	$wp_customize->add_setting( 'liber_featured_image', array(
		'sanitize_callback' => 'esc_url_raw',
		'panel'           => 'liber_panel_blog',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,
		'liber_featured_image',
			array(
				'label'    		=> esc_html__( 'Title Block Background Image', 'liber' ),
				'description'   => esc_html__( 'Recommended image width is 2600px', 'liber' ),
				'settings' 		=> 'liber_featured_image',
				'section'  		=> 'liber_featured_image_options',
			)
	) );
	
	$wp_customize->add_section( 'liber_blog_layout_options', array(
		'title'           => esc_html__( 'Blog Layout & Options', 'liber' ),
		'panel'           => 'liber_panel_blog',
	) );
	/* Blog Layout Options */
	$wp_customize->add_setting( 'liber_blog_layout', array(
		'default'           => 'grid-one',
		'sanitize_callback' => 'liber_sanitize_choices',
	) );
	$wp_customize->add_control( 'liber_blog_layout', array(
		'label'      => esc_html__( 'Blog & Archive Layout', 'liber' ),
		'description'       => esc_html__( 'Choose the best blog layout for your site. Also applies to archive pages.', 'liber' ),
		'section'           => 'liber_blog_layout_options',
		'settings'          => 'liber_blog_layout',
		'priority'          => 6,
		'type'              => 'radio',
		'choices'           => array(
			'grid-one'   => esc_html__( 'Default Layout', 'liber' ),
			'grid-two'  => esc_html__( 'Grid Two', 'liber' ),
			'grid-three'  => esc_html__( 'Grid Three', 'liber' ),
		)
	) );
	$wp_customize->add_setting( 'liber_blog_sidebar_layout', array(
		'default'           => 'sidebar-right',
		'sanitize_callback' => 'liber_sanitize_choices',
	) );
	$wp_customize->add_control( 'liber_blog_sidebar_layout', array(
		'label'      => esc_html__( 'Sidebar Position', 'liber' ),
		'description'       => esc_html__( 'You can have no sidebar or change the position of the sidebar. Also applies to archive & single post pages.', 'liber' ),
		'section'           => 'liber_blog_layout_options',
		'settings'          => 'liber_blog_sidebar_layout',
		'priority'          => 6,
		'type'              => 'radio',
		'choices'           => array(
			'sidebar-right'   => esc_html__( 'Right Sidebar', 'liber' ),
			'sidebar-left'  => esc_html__( 'Left Sidebar', 'liber' ),
			'no-sidebar'  => esc_html__( 'No Sidebar', 'liber' ),
		)
	) );
	
	/* Post Settings */
	$wp_customize->add_setting( 'liber_entry_meta', array(
		'default'           => false,
		'sanitize_callback' => 'liber_sanitize_checkbox',
	) );
	$wp_customize->add_control('liber_entry_meta', array(
				'label'      => esc_html__( 'Hide Post Meta', 'liber' ),
				'section'    => 'liber_blog_layout_options',
				'settings'   => 'liber_entry_meta',
				'type'		 => 'checkbox',
				'priority'	 => 7
	) );
	
	/* Post Display */
	$wp_customize->add_setting( 'liber_post_type', array(
		'default'           => 'full-lenght',
		'sanitize_callback' => 'liber_sanitize_choices',
	) );
	$wp_customize->add_control( 'liber_post_type', array(
		'label'             => esc_html__( 'Post Display', 'liber' ),
		'section'           => 'liber_blog_layout_options',
		'settings'          => 'liber_post_type',
		'priority'          => 8,
		'type'              => 'radio',
		'choices'           => array(
			'full-lenght'   => esc_html__( 'Full Length', 'liber' ),
			'excerpt-lenght'  => esc_html__( 'Excerpt', 'liber' ),
		)
	) );
	
	/* Featured Image Display */
	$wp_customize->add_setting( 'liber_main_featured_image', array(
		'default'           => false,
		'sanitize_callback' => 'liber_sanitize_checkbox',
	) );
	$wp_customize->add_control('liber_main_featured_image', array(
				'label'      => esc_html__( 'Hide Featured Image', 'liber' ),
				'section'    => 'liber_blog_layout_options',
				'settings'   => 'liber_main_featured_image',
				'type'		 => 'checkbox',
				'priority'	 => 9
	) );
	
	$wp_customize->add_section( 'liber_single_post_options', array(
		'title'           => esc_html__( 'Single Post Options', 'liber' ),
		'panel'           => 'liber_panel_blog',
	) );
	/* Single Post Style */
	$wp_customize->add_setting( 'liber_single_post_layout', array(
		'default'           => 'style-one',
		'sanitize_callback' => 'liber_sanitize_choices',
	) );
	$wp_customize->add_control( 'liber_single_post_layout', array(
		'label'             => esc_html__( 'Post Style', 'liber' ),
		'section'           => 'liber_single_post_options',
		'settings'          => 'liber_single_post_layout',
		'priority'          => 2,
		'type'              => 'radio',
		'choices'           => array(
			'style-one'   => esc_html__( 'Default Style', 'liber' ),
			'style-two'   => esc_html__( 'Elegant Style', 'liber' ),
		)
	) );
	
	/* Post Settings */
	$wp_customize->add_setting( 'liber_posted_on', array(
		'default'           => false,
		'sanitize_callback' => 'liber_sanitize_checkbox',
	) );
	$wp_customize->add_control('liber_posted_on', array(
				'label'      => esc_html__( 'Hide Post Date', 'liber' ),
				'section'    => 'liber_single_post_options',
				'settings'   => 'liber_posted_on',
				'type'		 => 'checkbox',
				'priority'	 => 3
	) );
	
	$wp_customize->add_setting( 'liber_post_footer', array(
		'default'           => false,
		'sanitize_callback' => 'liber_sanitize_checkbox',
	) );
	$wp_customize->add_control('liber_post_footer', array(
				'label'      => esc_html__( 'Hide Post Footer', 'liber' ),
				'section'    => 'liber_single_post_options',
				'settings'   => 'liber_post_footer',
				'type'		 => 'checkbox',
				'priority'	 => 4
	) );
	
	$wp_customize->add_setting( 'liber_author_bio', array(
		'default'           => false,
		'sanitize_callback' => 'liber_sanitize_checkbox',
	) );
	$wp_customize->add_control('liber_author_bio', array(
				'label'      => esc_html__( 'Hide Author Bio', 'liber' ),
				'section'    => 'liber_single_post_options',
				'settings'   => 'liber_author_bio',
				'type'		 => 'checkbox',
				'priority'	 => 5
	) );

	$wp_customize->add_setting( 'liber_related_post', array(
		'default'           => false,
		'sanitize_callback' => 'liber_sanitize_checkbox',
	) );
	$wp_customize->add_control('liber_related_post', array(
				'label'      => esc_html__( 'Hide Related Posts', 'liber' ),
				'section'    => 'liber_single_post_options',
				'settings'   => 'liber_related_post',
				'type'		 => 'checkbox',
				'priority'	 => 6
	) );
	
	$wp_customize->add_setting( 'liber_quote_entry_header', array(
		'default'           => false,
		'sanitize_callback' => 'liber_sanitize_checkbox',
	) );
	$wp_customize->add_control('liber_quote_entry_header', array(
				'label'      => esc_html__( 'Show Post Title For The Post Format Quote', 'liber' ),
				'section'    => 'liber_blog_layout_options',
				'settings'   => 'liber_quote_entry_header',
				'type'		 => 'checkbox',
				'priority'	 => 7
	) );
	
	/* Featured Image Display */
	$wp_customize->add_setting( 'liber_single_featured_image', array(
		'default'           => false,
		'sanitize_callback' => 'liber_sanitize_checkbox',
	) );
	$wp_customize->add_control('liber_single_featured_image', array(
				'label'      => esc_html__( 'Hide Featured Image', 'liber' ),
				'section'    => 'liber_single_post_options',
				'settings'   => 'liber_single_featured_image',
				'type'		 => 'checkbox',
				'priority'	 => 7
	) );

/**
* Shop Sidebar
*/
	$wp_customize->add_section( 'liber_shop_section' , array(
		'title'       => esc_html__( 'WooCommerce Options', 'liber' ),
		'priority'    => 133,
		'active_callback' => 'liber_is_meta_active',
		'description' => esc_html__( 'Hide sidebar on main and single product page', 'liber' )
	) );
	$wp_customize->add_setting( 'liber_shop_sidebar', array(
		'default'           => false,
		'sanitize_callback' => 'liber_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'liber_shop_sidebar', array(
		'label'             => esc_html__( 'Check this box if you want to hide sidebar on the WooCommerce pages', 'liber' ),
		'section'           => 'liber_shop_section',
		'settings'          => 'liber_shop_sidebar',
		'type'		        => 'checkbox',
		'priority'          => 1,
	) );
	$wp_customize->add_setting( 'liber_shop_single_sidebar', array(
		'default'           => false,
		'sanitize_callback' => 'liber_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'liber_shop_single_sidebar', array(
		'label'             => esc_html__( 'Check this box if you want to hide sidebar on WooCommerce single product page', 'liber' ),
		'section'           => 'liber_shop_section',
		'settings'          => 'liber_shop_single_sidebar',
		'type'		        => 'checkbox',
		'priority'          => 2,
	) );
	
	
	$wp_customize->add_panel( 'liber_panel_colors', array(
		'priority'       => 134,
		'title'          => esc_html__( 'Color Settings', 'liber' ),
	) );
/**
* Color Settings
*/
	$wp_customize->add_section( 'liber_color_settings', array(
		'title'           => esc_html__( 'Global Accent Color', 'liber' ),
		'panel'           => 'liber_panel_colors',
		'description'     => esc_html__( 'Here you can change the main accent color for the whole site.', 'liber' ),
	) );

	/* Header Colors */
	$wp_customize->add_setting( 'liber_colors_accent', array(
		'default'           => '#3a8014',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'liber_colors_accent', array(
		'label'             => esc_html__( 'Accent Color', 'liber' ),
		'description'       => esc_html__( 'Change the main accent color', 'liber' ),
		'settings'          => 'liber_colors_accent',
		'section'           => 'liber_color_settings',
		'priority'          => 1,
	) ) );
	
	$wp_customize->add_section( 'liber_color_inner_settings', array(
		'title'           => esc_html__( 'Inner Pages Color Settings', 'liber' ),
		'panel'           => 'liber_panel_colors',
		'description'     => esc_html__( 'Here you can change color settings for inner pages. To change colors for the front page, go to "Front Page Content/Settings".', 'liber' ),
	) );
	
	/* Content Background Color */
	$wp_customize->add_setting( 'liber_content_bg_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'liber_content_bg_color', array(
		'label'             => esc_html__( 'Content Background Color', 'liber' ),
		'section'           => 'liber_color_inner_settings',
		'settings'          => 'liber_content_bg_color',
		'priority'          => 2,
	) ) );
	
	/* Page Title Text Color */
	$wp_customize->add_setting( 'liber_content_page_title_color', array(
		'default'           => '#404040',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'liber_content_page_title_color', array(
		'label'             => esc_html__( 'Page Title & Breadcrumb Text Color', 'liber' ),
		'section'           => 'liber_color_inner_settings',
		'settings'          => 'liber_content_page_title_color',
		'priority'          => 3,
	) ) );
	
	/* Page Title Text Color */
	$wp_customize->add_setting( 'liber_content_page_title_bg_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'liber_content_page_title_bg_color', array(
		'label'             => esc_html__( 'Page Title Background/Overlay & Breadcrumb Background Color', 'liber' ),
		'section'           => 'liber_color_inner_settings',
		'settings'          => 'liber_content_page_title_bg_color',
		'priority'          => 4,
	) ) );
	
	/* Text Color */
	$wp_customize->add_setting( 'liber_content_text_color', array(
		'default'           => '#404040',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'liber_content_text_color', array(
		'label'             => esc_html__( 'Content Text Color', 'liber' ),
		'section'           => 'liber_color_inner_settings',
		'settings'          => 'liber_content_text_color',
		'priority'          => 5,
	) ) );
	
	/* Black Borders */
	$wp_customize->add_setting( 'liber_content_black_border_color', array(
		'default'           => '#404040',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'liber_content_black_border_color', array(
		'label'             => esc_html__( 'Content Border Color', 'liber' ),
		'section'           => 'liber_color_inner_settings',
		'settings'          => 'liber_content_black_border_color',
		'priority'          => 6,
	) ) );
	
	/* White Background */
	$wp_customize->add_setting( 'liber_content_white_background_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'liber_content_white_background_color', array(
		'label'             => esc_html__( 'Background Elements 1', 'liber' ),
		'section'           => 'liber_color_inner_settings',
		'settings'          => 'liber_content_white_background_color',
		'priority'          => 7,
	) ) );
	
	/* Light Green Color */
	$wp_customize->add_setting( 'liber_content_light_green_color', array(
		'default'           => '#f9fcf3',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'liber_content_light_green_color', array(
		'label'             => esc_html__( 'Backgrounds Elements 2', 'liber' ),
		'section'           => 'liber_color_inner_settings',
		'settings'          => 'liber_content_light_green_color',
		'priority'          => 8,
	) ) );
	
	/* Green Border Color */
	$wp_customize->add_setting( 'liber_content_light_green_border_color', array(
		'default'           => '#ebefe3',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'liber_content_light_green_border_color', array(
		'label'             => esc_html__( 'Border Colors', 'liber' ),
		'section'           => 'liber_color_inner_settings',
		'settings'          => 'liber_content_light_green_border_color',
		'priority'          => 9,
	) ) );

/**
* Adds the individual sections for copyright
*/
	$wp_customize->add_section( 'liber_copyright_section' , array(
		'title'    => esc_html__( 'Copyright Settings', 'liber' ),
		'panel'	=> 'liber_panel',
		'priority'   => 135,
	) );
	
	// Scroll to top icon
	$wp_customize->add_setting( 'scrolltotop', array(
		'default'	=> true,
		'sanitize_callback' => 'liber_sanitize_checkbox'
	) );
	
	$wp_customize->add_control( 'scrolltotop', array(
		'label'			=> esc_html__('Enable "scroll to top" button ', 'liber'),
		'section'		=> 'liber_copyright_section',
		'type'			=> 'checkbox',
		'priority'          => 1,
	) );

	$wp_customize->add_setting( 'liber_copyright', array(
		'default'           => esc_html__( 'Proudly powered by WordPress. Liber Theme by Anariel Design. All rights reserved', 'liber' ),
		'sanitize_callback' => 'liber_sanitize_text',
	) );
	$wp_customize->add_control( 'liber_copyright', array(
		'label'             => esc_html__( 'Copyright text', 'liber' ),
		'section'           => 'liber_copyright_section',
		'settings'          => 'liber_copyright',
		'type'		        => 'text',
		'priority'          => 2,
	) );

	$wp_customize->add_setting( 'hide_copyright', array(
		'sanitize_callback' => 'liber_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'hide_copyright', array(
		'label'             => esc_html__( 'Hide copyright text', 'liber' ),
		'section'           => 'liber_copyright_section',
		'settings'          => 'hide_copyright',
		'type'		        => 'checkbox',
		'priority'          => 3,
	) );
	
	/* Colors */
	$wp_customize->add_setting( 'liber_copyright_background', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'liber_copyright_background', array(
		'label'             => esc_html__( 'Background Color', 'liber' ),
		'section'           => 'liber_copyright_section',
		'settings'          => 'liber_copyright_background',
		'priority'          => 4,
	) ) );
	
	$wp_customize->add_setting( 'liber_copyright_border', array(
		'default'           => '#e2e7d9',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'liber_copyright_border', array(
		'label'             => esc_html__( 'Border Color', 'liber' ),
		'section'           => 'liber_copyright_section',
		'settings'          => 'liber_copyright_border',
		'priority'          => 5,
	) ) );
	

	/***** Register Custom Controls *****/

	class Liber_Upgrade extends WP_Customize_Control {
		public function render_content() {  ?>
			<p class="liber-upgrade-thumb">
				<img src="<?php echo get_template_directory_uri(); ?>/screenshot.png" />
			</p>
			<p class="textfield liber-upgrade-text">
				<a href="<?php echo esc_url('http://www.anarieldesign.com/documentation/liber/'); ?>" target="_blank" class="button button-secondary">
					<?php esc_html_e('Visit Documentation', 'liber'); ?>
				</a>
			</p>
			<p class="textfield liber-upgrade-title">
				<a href="<?php echo esc_url('http://www.anarieldesign.com/support/'); ?>" class="button button-secondary" target="_blank">
					<?php esc_html_e('Support Page', 'liber'); ?>
				</a>
			</p>
			<p class="liber-upgrade-button">
				<a href="http://www.anarieldesign.com/themes/" target="_blank" class="button button-secondary">
					<?php esc_html_e('More Themes by Anariel Design', 'liber'); ?>
				</a>
			</p><?php
		}
	}

	/***** Add Sections *****/

	$wp_customize->add_section('liber_upgrade', array(
		'title' => esc_html__('Theme Info', 'liber'),
		'priority' => 600
	) );

	/***** Add Settings *****/

	$wp_customize->add_setting('liber_options[premium_version_upgrade]', array(
		'default' => '',
		'type' => 'option',
		'sanitize_callback' => 'esc_attr'
	) );

	/***** Add Controls *****/

	$wp_customize->add_control(new Liber_Upgrade($wp_customize, 'premium_version_upgrade', array(
		'section' => 'liber_upgrade',
		'settings' => 'liber_options[premium_version_upgrade]',
		'priority' => 1
	) ) );
	

return $wp_customize;
}
add_action( 'customize_register', 'liber_customize_register' );

if ( ! function_exists( 'liber_sanitize_terms' ) ) :
/**
 * Sanitize a value from a list of allowed values.
 *
 * @since 1.0.0.
 *
 * @param  mixed    $value      The value to sanitize.
 * @return mixed                The sanitized value.
 */
function liber_sanitize_terms( $value ) {

	$choices = liber_get_terms();
	$valid	 = array_keys( $choices );

	if ( ! in_array( $value, $valid ) ) {
		$value = 'none';
	}

	return $value;
}
endif;

if ( ! function_exists( 'liber_sanitize_checkbox' ) ) :
/**
 * Sanitize the checkbox.
 *
 * @param  mixed 	$input.
 * @return boolean	(true|false).
 */
function liber_sanitize_checkbox( $input ) {
	if ( 1 == $input ) {
		return true;
	} else {
		return false;
	}
}
endif;

if ( ! function_exists( 'liber_sanitize_opacity' ) ) :
/**
 * Sanitize the checkbox.
 *
 * @param  boolean	$input.
 * @return boolean	(true|false).
 */
function liber_sanitize_opacity( $input ) {
	$choices = array( 0.2, 0.3, 0.4, 0.5, 0.6, 0.7, 0.8, 0.9, 1 );

	if ( ! in_array( $input, $choices ) ) {
		$input = 0.8;
	}

	return $input;
}
endif;

if ( ! function_exists( 'liber_footer_background' ) ) :
/**
 * Active callback for liber_footer_opacity control.
 *
 * @param  object	$control.
 * @return boolean	(true|false).
 */
function liber_footer_background( $control ) {
	if ( '' == $control->manager->get_setting( 'liber_footer_sidebar_bg' )->value() ) {
		return false;
	} else {
		return true;
	}
}
endif;

/*
 * Output our custom CSS to change background colour/opacity of panels.
 * Note: not very pretty, but it works.
 */
function liber_customizer_css( $control ) {
	// Adjust the opacity of featured image if set
	if ( get_theme_mod( 'liber_footer_sidebar_bg' ) ) :
		if ( get_theme_mod( 'liber_footer_opacity' ) ) :
		?>
			<style type="text/css">
			.pre-footer:after {
				opacity:  <?php echo esc_attr( get_theme_mod( 'liber_footer_opacity' ) ); ?>;
			}
			</style>
		<?php
		endif;
	endif;
}
add_action( 'wp_head', 'liber_customizer_css' );

//Radio Buttons and Select Lists
function liber_sanitize_choices( $input, $setting ) {
	global $wp_customize;

	$control = $wp_customize->get_control( $setting->id );

	if ( array_key_exists( $input, $control->choices ) ) {
		return $input;
	} else {
		return $setting->default;
	}
}

/* Sanitize overlay setting */
function liber_sanitize_overlay( $input ) {

	$choices = array(
					'0.0',
					'0.1',
					'0.2',
					'0.3',
					'0.4',
					'0.5',
					'0.6',
					'0.7',
					'0.8',
					'0.9',
					'1.0',
				);

	if ( ! in_array( $input, $choices ) ) {
		$input = '0.0';
	}

	return $input;
}

//Text
function liber_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

/**
 * Sanitize a numeric value
 */
function liber_sanitize_numeric_value( $input ) {
	if ( is_numeric( $input ) ) {
		return intval( $input );
	} else {
		return 0;
	}
}

/**
 * Return whether we're previewing the front page and it's a static page.
 */
function liber_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}
/**
 * Render the site title for the selective refresh partial.
 *
 * @since Liber 1.0
 * @see liber_customize_register()
 *
 * @return void
 */
function liber_customize_partial_blogname() {
	bloginfo( 'name' );
}

//Shop section
function liber_is_meta_active(){
	if( !class_exists( 'WooCommerce' ) ){
		// If it doesn't exist it won't show the section/panel/control
	return false;
	} else {
		return true;
	}
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function liber_customize_preview_js() {
	wp_enqueue_script( 'liber_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151117', true );
}
add_action( 'customize_preview_init', 'liber_customize_preview_js' );

function liber_panels_js() {
	wp_enqueue_script( 'liber_extra_js', get_template_directory_uri() . '/js/panel-customizer.js', array(), '20151116', true );
}
add_action( 'customize_controls_enqueue_scripts', 'liber_panels_js' );

/***** Enqueue Customizer JS *****/
function liber_customizer_js() {
	wp_localize_script('liber-customizer', 'liber_links', array(
		'title'	=> esc_html__('Theme Related Links:', 'liber'),
		'themeURL' => esc_url('http://www.anarieldesign.com/themes/restaurant-bar-wordpress-theme/'),
		'themeLabel' => esc_html__('Theme Info Page', 'liber'),
		'docsURL' => esc_url('http://www.anarieldesign.com/documentation/liber/'),
		'docsLabel'	=> esc_html__('Theme Documentation', 'liber'),
	));
}
add_action('customize_controls_enqueue_scripts', 'liber_customizer_js');
