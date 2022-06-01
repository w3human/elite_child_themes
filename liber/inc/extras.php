<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Liber
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function liber_body_classes( $classes ) {

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	if ( is_page() && !is_page_template( 'page-templates/menu-page.php' ) && !comments_open() && '0' == get_comments_number() ) {
		$classes[] = 'comments-closed';
	}
	
	if ( has_post_thumbnail() ) {
		$classes[] = 'has-header-image';
	}
	
	// Adds a class if we're in the Customizer
	if ( is_customize_preview() ) :
		$classes[] = 'liber-customizer';
	endif;

	// Add class for the header layouts.
	if ( 'main-boxed' === get_theme_mod( 'liber_header_layout' ) ) {
		$classes[] = 'main-boxed';
	}
	if ( 'two-row-boxed-header' === get_theme_mod( 'liber_header_layout' ) ) {
		$classes[] = 'two-row-boxed-header';
	}
	if ( 'fixed-header' === get_theme_mod( 'liber_header_layout' ) ) {
		$classes[] = 'fixed-header';
	}
	
	if ( 'center-header' === get_theme_mod( 'liber_header_layout' ) ) {
		$classes[] = 'center-header';
	}
	
	// Add class for the hero caption position.
	if ( 'left-position' === get_theme_mod( 'liber_caption_position' ) ) {
		$classes[] = 'caption-left';
	}
	
	if ( 'center-position' === get_theme_mod( 'liber_caption_position' ) ) {
		$classes[] = 'caption-center';
	}
	
	if ( 'right-position' === get_theme_mod( 'liber_caption_position' ) ) {
		$classes[] = 'caption-right';
	}
	
	// Add class for the featured slider layout.
	if ( 'boxed-layout' === get_theme_mod( 'liber_featured_slider_layout' ) ) {
		$classes[] = 'boxed-slider';
	}
	
	// Add class for the featured slider layout.
	if ( 'boxed-layout' === get_theme_mod( 'liber_featured_slider_layout_blog' ) ) {
		$classes[] = 'boxed-slider';
	}
	
	// Add class for the blog layout
	if ( 'grid-one' === get_theme_mod( 'liber_blog_layout' ) ) {
		$classes[] = 'default-blog-layout';
	}
	
	if ( 'grid-two' === get_theme_mod( 'liber_blog_layout' ) ) {
		$classes[] = 'grid-two-blog-layout';
	}
	
	if ( 'grid-three' === get_theme_mod( 'liber_blog_layout' ) ) {
		$classes[] = 'grid-three-blog-layout';
	}
	
	// Add class for the sidebar position
	if ( 'sidebar-right' === get_theme_mod( 'liber_blog_sidebar_layout' ) ) {
		$classes[] = 'right-sidebar-layout';
	}
	
	if ( 'sidebar-left' === get_theme_mod( 'liber_blog_sidebar_layout' ) ) {
		$classes[] = 'left-sidebar-layout';
	}
	
	if ( 'no-sidebar' === get_theme_mod( 'liber_blog_sidebar_layout' ) ) {
		$classes[] = 'no-sidebar-layout';
	}
	
	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}
	
	// Add class for the featured slider layout.
	if ( 'list-layout' === get_theme_mod( 'liber_food_menu_category_layout' ) ) {
		$classes[] = 'list-category-layout';
	}

	return $classes;
}
add_filter( 'body_class', 'liber_body_classes' );

/**
 * Change the class of the hero area depending on featured image.
 */
function liber_additional_class() {
	
	if ( !has_header_image() ) {
		$additional_class = 'has-header-image';
	} else {
		$additional_class = '';
	}
	return esc_attr( $additional_class );
}

/**
 * Change the class of the featured image panel one
 */
function liber_additional_class_front( $liber_panel ) {
	
	if ( 'half-width-image' === get_theme_mod( 'liber_featured_image' . $liber_panel ) ) {
		$additional_class_one = 'half-width-image';
	} else if ( 'half-width-image-left' === get_theme_mod( 'liber_featured_image' . $liber_panel ) ) {
		$additional_class_one = 'half-width-image-left';
	}
	else if ( 'featured-image-background' === get_theme_mod( 'liber_featured_image' . $liber_panel ) ) {
		$additional_class_one = 'featured-image-background';
	} else {
		$additional_class_one = 'full-image';
	}

	return esc_attr( $additional_class_one );
}

/**
 * Change the class of the page layout panel one.
 */
function liber_additional_class_page_style( $liber_panel ) {
	
	if ( 'box-style' === get_theme_mod( 'liber_page_style' . $liber_panel ) ) {
		$additional_class_page_style_one = 'box-style';
	} else {
		$additional_class_page_style_one = 'default-style';
	}

	return esc_attr( $additional_class_page_style_one );
}

/**
 * Change the class of the child page columns panel one.
 */
function liber_additional_class_page_columns( $liber_panel ) {
	
	if ( 'twocolumn' === get_theme_mod( 'liber_page_columns' . $liber_panel ) ) {
		$additional_class_page_columns_one = 'twocolumn';
	} else if ( 'fourcolumn' === get_theme_mod( 'liber_page_columns' . $liber_panel ) ) {
		$additional_class_page_columns_one = 'fourcolumn';
	} else if ( 'onecolumn' === get_theme_mod( 'liber_page_columns' . $liber_panel ) ) {
		$additional_class_page_columns_one = 'onecolumn';
	} else {
		$additional_class_page_columns_one = 'threecolumn';
	}
	return esc_attr( $additional_class_page_columns_one );
}

/**
 * Change the class of the page content padding when testimonials are true.
 */
function liber_additional_class_testimonials( $liber_panel ) {
	
	if ( get_theme_mod( 'liber_front_testimonials' . $liber_panel )) {
		$additional_class_testimonials_one = 'testimonial';
	}else {
		$additional_class_testimonials_one = 'main';
	}
	return esc_attr( $additional_class_testimonials_one );
}

/*
 * Count our number of active panels
 * Primarily used to see if we have any panels active
 */
function liber_panel_count() {
	$panels = array( '1', '2', '3', '4', '5');
	$panel_count = 0;
	foreach ( $panels as $panel ) :
		if ( get_theme_mod( 'liber_panel' . $panel ) ) :
			$panel_count++;
		endif;
	endforeach;
	return $panel_count;
}
/**
 * Checks to see if we're on the homepage or not.
 */
function liber_is_frontpage() {
	return ( is_front_page() && ! is_home() );
}
