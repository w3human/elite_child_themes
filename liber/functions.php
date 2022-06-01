<?php
/**
 * Liber functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package Liber
 */

if ( ! function_exists( 'liber_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function liber_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Liber, use a find and replace
	 * to change 'liber' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'liber', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// Hero Image on the front page & single page template
	add_image_size( 'liber-hero-thumbnail', 2600, 919, true );
	add_image_size( 'liber-hero-small-thumbnail', 752, 9999 );
	
	// Slider on the front page template
	add_image_size( 'liber-slider-thumbnail', 2600, 700, true );

	// Menu thumbnail
	add_image_size( 'liber-menu-thumbnail', 90, 90, true );
	
	// Menu Widget thumbnail
	add_image_size( 'liber-menu-widget-thumbnail', 50, 50, true );
	
	// Menu Classic thumbnail
	add_image_size( 'liber-menu-classic-thumbnail', 685, 685, true );
	
	// Front Page Latest Post thumbnail
	add_image_size( 'liber-recent-post-image', 373, 9999 );
	
	// Front Page Latest Post list thumbnail
	add_image_size( 'liber-recent-post-list-image', 605, 9999 );
	
	/* Add support for editor styles */
	add_editor_style( array( 'editor-style.css', liber_fonts_url() ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary'	=> esc_html__( 'Primary Menu', 'liber' ),
		'secondary'	=> esc_html__( 'Secondary Menu', 'liber' ),
		'social'	=> esc_html__( 'Social Menu', 'liber' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'quote',
		'link',
	) );
	
		/*
	 * Enable support for custom logo.
	 *
	 *  @since Liber 1.0
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 9999,
		'width'       => 9999,
		'flex-height' => true,
	) );
	
	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
	
	// Adding support for core block visual styles.
	add_theme_support( 'wp-block-styles' );
	
	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );
		
	// Add support for custom color scheme.
	add_theme_support( 'editor-color-palette', array(
			array(
				'name'  => esc_html__( 'Orange', 'liber' ),
				'slug'  => 'orange',
				'color' => '#cc4300',
			),
			array(
				'name'  => esc_html__( 'Green', 'liber' ),
				'slug'  => 'green',
				'color' => '#3a8014',
			),
			array(
				'name'  => esc_html__( 'Light Orange', 'liber' ),
				'slug'  => 'light-orange',
				'color' => '#e8730d',
			),
			array(
				'name'  => esc_html__( 'Dark Pink', 'liber' ),
				'slug'  => 'dark-pink',
				'color' => '#c43a68',
			),
		) );
}
endif; // liber_setup
add_action( 'after_setup_theme', 'liber_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function liber_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'liber_content_width', 1180 );

	//Adjust content_width value for page and attachement templates.
	if ( is_page_template( 'page-templates/sidebar-page.php' )
	|| is_attachment() ) {
		$GLOBALS['content_width'] = 765;
	}
}
add_action( 'after_setup_theme', 'liber_content_width', 0 );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Liber 1.0
 */
function liber_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'liber_javascript_detection', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function liber_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Main Sidebar', 'liber' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'liber' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'First Footer Widget Area', 'liber' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here to appear in your first footer area.', 'liber' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Second Footer Widget Area', 'liber' ),
		'id'            => 'sidebar-3',
		'description'   => esc_html__( 'Add widgets here to appear in your second footer area.', 'liber' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Third Footer Widget Area', 'liber' ),
		'id'            => 'sidebar-4',
		'description'   => esc_html__( 'Add widgets here to appear in your third footer area.', 'liber' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Top Widget Area', 'liber' ),
		'id'            => 'sidebar-8',
		'description'   => esc_html__( 'Add widgets here to appear at the top blog area.', 'liber' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'First Page Widget Area', 'liber' ),
		'id'            => 'sidebar-5',
		'description'   => esc_html__( 'Add widgets here to appear in first page area.', 'liber' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Second Page Widget Area', 'liber' ),
		'id'            => 'sidebar-6',
		'description'   => esc_html__( 'Add widgets here to appear in your second page area.', 'liber' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Instagram Widget Area', 'liber' ),
		'id'            => 'sidebar-7',
		'description'   => esc_html__( 'Add widgets here to appear in your instagram area.', 'liber' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Front Page Slider', 'liber' ),
		'id'            => 'sidebar-9',
		'description'   => esc_html__( 'Add slider widget here to appear in your front page top area.', 'liber' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'liber_widgets_init' );

/**
 * Returns the Google font stylesheet URL, if available.
 */
function liber_fonts_url() {
	$fonts_url = '';

	/* translators: If there are characters in your language that are not supported
	 * by Open Sans, translate this to 'off'. Do not translate into your own language.
	 */
	$open_sans = esc_html_x( 'on', 'Open Sans font: on or off', 'liber' );

	/* translators: If there are characters in your language that are not supported
	 * by Teko, translate this to 'off'. Do not translate into your own language.
	 */
	$teko  = esc_html_x( 'on', 'Teko font: on or off',  'liber' );
	
		/* translators: If there are characters in your language that are not supported
	 * by Source Sans Pro, translate this to 'off'. Do not translate into your own language.
	 */
	$source_sans_pro  = esc_html_x( 'on', 'Source Sans Pro font: on or off',  'liber' );

	if ( 'off' !== $open_sans || 'off' !== $teko || 'off' !== $source_sans_pro ) {
		$font_families = array();
		if ( 'off' !== $open_sans ) {
			$font_families[] = 'Open Sans:400,400italic,700,700italic';
		}
		if ( 'off' !== $teko ) {
			$font_families[] = 'Teko:300,400,500,600,700';
		}
		if ( 'off' !== $source_sans_pro ) {
			$font_families[] = 'Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i';
		}
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, "https://fonts.googleapis.com/css" );
	}

	return $fonts_url;
}

/*
 * Query whether WooCommerce is activated.
 */
function liber_is_woocommerce_activated() {
	if ( class_exists( 'woocommerce' ) ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Enqueue scripts and styles.
 */
function liber_scripts() {

	// Add custom fonts.
	wp_enqueue_style( 'liber-fonts', liber_fonts_url(), array(), null );

	// Add Genericons font.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '1.0' );

	wp_enqueue_style( 'liber-style', get_stylesheet_uri() );
	
	// Add Slick Slider
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css', array(), '1.0' );
	
	if ( liber_is_woocommerce_activated() ) {
	wp_enqueue_style( 'liber-woocommerce', get_template_directory_uri() . '/assets/css/woocommerce.css', array(), '1.0' );
	}
	
	// only loaded on front page
	if ( is_front_page() ) {
		wp_enqueue_script( 'scrollTo', get_template_directory_uri() . '/js/jquery.scrollTo.js', array( 'jquery' ), '20151030', true );
		wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/js/jquery.waypoints.js', array( 'jquery' ), '20150813', true );
		wp_enqueue_script( 'liber-front-page', get_template_directory_uri() . '/js/front-page.js', array( 'scrollTo', 'waypoints' ), '20151030', true );
		wp_enqueue_script( 'liber-grid', get_template_directory_uri() . '/js/grid.js', array( 'jquery', 'masonry' ), '', true );
		wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.min.js', array( 'jquery' ), '1.6.0', true );
		wp_enqueue_script( 'liber-featured-slider', get_template_directory_uri() . '/js/featured-slider.js', array( 'jquery' ), '1.0', true );
	}
	
	// only loaded on blog page
	if ( is_home() ) {
		wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.min.js', array( 'jquery' ), '1.6.0', true );
		wp_enqueue_script( 'liber-featured-slider', get_template_directory_uri() . '/js/featured-slider.js', array( 'jquery' ), '1.0', true );
	}

	wp_enqueue_script( 'liber-script', get_template_directory_uri() . '/js/liber.js', array( 'jquery' ), '20150825', true );

	wp_enqueue_script( 'liber-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'liber-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'liber_scripts' );

/**
 * Enqueue theme styles within Gutenberg.
 */
function liber_gutenberg_styles() {

	// Load the theme styles within Gutenberg.
	wp_enqueue_style( 'liber-gutenberg', get_theme_file_uri( '/editor.css' ), false, '1.1.2', 'all' );

	// Add custom fonts to Gutenberg.
	wp_enqueue_style( 'liber-fonts', liber_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'liber_gutenberg_styles' );

/**
 * Enqueue the stylesheet.
 */
function liber_enqueue_customizer_stylesheet() {
	
	wp_enqueue_style( 'liber-customizer-css', get_template_directory_uri() . '/admin/customizer.css', array(), '1.0' );

}
add_action( 'customize_controls_print_styles', 'liber_enqueue_customizer_stylesheet' );

if (!function_exists('liber_admin_scripts')) {
	function liber_admin_scripts($hook) {
		if ('appearance_page_blog' === $hook) {
			wp_enqueue_style('liber-admin', get_template_directory_uri() . '/admin/admin.css');
		}
	}
}
add_action('admin_enqueue_scripts', 'liber_admin_scripts');

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function liber_custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'liber_custom_excerpt_length', 999 );

if (is_admin()) {
	require get_template_directory() . '/admin/admin.php';
}

/**
 * Remove More Jump Link.
 *
 * @since Liber 1.2.3
 */
function remove_more_jump_link($link) {
	$offset = strpos($link, '#more-');
	if ($offset) {
		$end = strpos($link, '"',$offset);
	}
	if ($end) {
		$link = substr_replace($link, '', $offset, $end-$offset);
	}
	return $link;
}
add_filter('the_content_more_link', 'remove_more_jump_link');

/**
 * Add HTML to category description
 */
remove_filter('pre_term_description', 'wp_filter_kses');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Theme Custom Widgets.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/liber_style.php';

/**
 * Use front-page.php when 'Front page displays' is set to a static page.
 * Will use custom page templates if set.
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults
 * to index.php), else $template.
 */
function liber_front_page_template( $template ) {
	
	// Get the template for the page if it were displayed normally.
	$page_template = get_page_template();

	// Check the template name. If it's not a default page tmeplate file, ie
	// it's a custom page template, then use the custom template instead.
	if ( ! in_array( basename( $page_template ), array( 'single.php', 'singular.php', 'page.php' ), true ) ) {
		$template = $page_template;
	}

	// If is a blog post listing then use the default index template.
	if ( is_home() ) {
		return '';
	}

	// Use the page template that has been selected.
	return $template;

}
add_filter( 'frontpage_template',  'liber_front_page_template' );
/**
 * WooCommerce
 *
 * Unhook sidebar
 */
add_theme_support( 'woocommerce' );
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );
/**
  * WooCommerce: change products per page
  * @return int
  */
function liber_loop_shop_per_page() {
	return -1; //return any number, -1 === show all
};
add_filter('loop_shop_per_page', 'liber_loop_shop_per_page', 40, 0);

/**
 * WooCommerce Category Page Featured Image
 *
 * @since Liber 1.0
 */
function liber_woocommerce_category_image() {
	if ( is_product_category() ){
		global $wp_query;
		$cat = $wp_query->get_queried_object();
		$thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
		$image = wp_get_attachment_url( $thumbnail_id );
		if ( $image ) {
			echo '<img src="' . $image . '" alt="" />';
		}
	}
}

/**
 * Block patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	require get_template_directory() . '/functions/block-patterns.php';
}

/**
 * TGM Plugin Activation
 */
require get_template_directory() . '/assets/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'liber_require_plugins' );

function liber_require_plugins() {

	$plugins = array(
		// Custom Post Type Plugin
		array(
			'name'         => esc_html__( 'Liber Custom Post Type', 'liber' ), // The plugin name.
			'slug'         => 'liber-custom-post-type', // The plugin slug (typically the folder name).
			'source'       => esc_url('https://github.com/anarieldesign/liber-custom-post-type/archive/master.zip' ), // The plugin source.
			'required'     => true, // If false, the plugin is only 'recommended' instead of required.
			'external_url' => esc_url('https://github.com/anarieldesign/liber-custom-post-type/' ), // If set, overrides default API URL and points to an external URL.
		),

		// Google Fonts Plugin
		array(
			'name'         => esc_html__( 'Google Fonts Plugin', 'liber' ), // The plugin name.
			'slug'         => 'anariel-design-google-fonts', // The plugin slug (typically the folder name).
			'source'       => esc_url('https://github.com/anarieldesign/anariel-design-google-fonts/archive/master.zip' ), // The plugin source.
			'required'     => false, // If false, the plugin is only 'recommended' instead of required.
			'external_url' => esc_url( 'https://github.com/anarieldesign/anariel-design-google-fonts/' ), // If set, overrides default API URL and points to an external URL.
		),
		
		// One Click Demo Import
		array(
			'name'      => esc_html__( 'One Click Demo Import', 'liber' ),
			'slug'      => 'one-click-demo-import',
			'required'  => false,
		),
		// Instagram Widget.
		array(
			'name'      => esc_html__( 'Instagram Widget by WPZOOM', 'liber' ),
			'slug'      => 'instagram-widget-by-wpzoom',
			'required'  => false,
		),
		// Widget Visibility
		array(
			'name'      => esc_html__( 'Widget Visibility Without Jetpack', 'liber' ),
			'slug'      => 'widget-visibility-without-jetpack',
			'required'  => false,
		),
		// Woocommerce
		array(
			'name'      => esc_html__( 'Woocommerce', 'liber' ),
			'slug'      => 'woocommerce',
			'required'  => false,
		),
		// WP Google Maps
		array(
			'name'      => esc_html__( 'WP Google Maps', 'liber' ),
			'slug'      => 'wp-google-maps',
			'required'  => false,
		),
		// Restaurant Reservations
		array(
			'name'      => esc_html__( 'Restaurant Reservations', 'liber' ),
			'slug'      => 'restaurant-reservations',
			'required'  => false,
		),
		// Print recipes
		array(
			'name'      => esc_html__( 'Print O Matic', 'liber' ),
			'slug'      => 'print-o-matic',
			'required'  => false,
		),
		// MailChimp
		array(
			'name'      => esc_html__( 'MailChimp for WordPress', 'liber' ),
			'slug'      => 'mailchimp-for-wp',
			'required'  => false,
		),
		// Envira Gallery
		array(
			'name'      => esc_html__( 'Envira Gallery Lite', 'liber' ),
			'slug'      => 'envira-gallery-lite',
			'required'  => false,
		),
		// Contact Form 7
		array(
			'name'      => esc_html__( 'Contact Form 7', 'liber' ),
			'slug'      => 'contact-form-7',
			'required'  => false,
		),
		// Breadcrumb
		array(
			'name'      => esc_html__( 'Breadcrumb NavXT', 'liber' ),
			'slug'      => 'breadcrumb-navxt',
			'required'  => false,
		),
		// Elementor
		array(
			'name'      => esc_html__( 'Elementor', 'liber' ),
			'slug'      => 'elementor',
			'required'  => false,
		),

);
		$config = array(
		'id'           => 'liber',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
		);
	tgmpa( $plugins, $config );
}

/**
 * One Click Demo Import
 */
function liber_ocdi_import_files() {
	return array(
		array(
			'import_file_name'           => esc_html__( 'Demo Import 1', 'liber' ),
			'categories'                 => array (esc_html__( 'Classic', 'liber' )),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/liber-classic-demo-content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/liber-classic-widgets.json',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/liber-classic-customizer.dat',
			'import_preview_image_url'   => esc_url( 'https://www.anarieldesign.com/themedemos/liber/wp-content/uploads/2020/12/classic.jpg' ),
			'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the socials separatly', 'liber' ),
		),
		array(
			'import_file_name'           => esc_html__( 'Demo Import 2', 'liber' ),
			'categories'                 => array (esc_html__( 'Healthy', 'liber' )),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/liber-demo-content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/liber-widgets.json',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/liber-customizer.dat',
			'import_preview_image_url'   => esc_url( 'http://www.anarieldesign.com/themedemos/liber/wp-content/uploads/2017/02/screenshot.png' ),
			'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the socials separatly', 'liber' ),
		),
		array(
			'import_file_name'           => esc_html__( 'Demo Import 3', 'liber' ),
			'categories'                 => array(esc_html__( 'Beer', 'liber' )),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/liber-beer-demo-content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/liber-beer-widgets.json',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/liber-beer-customizer.dat',
			'import_preview_image_url'   => esc_url( 'https://www.anarieldesign.com/themedemos/liber/wp-content/uploads/2020/12/beer.jpg' ),
			'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the socials and second menu separately.', 'liber' ),
		),
		array(
			'import_file_name'           => esc_html__( 'Demo Import 4', 'liber' ),
			'categories'                 => array(esc_html__( 'Wine', 'liber' )),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/liber-wine-demo-content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/liber-wine-widgets.json',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/liber-wine-customizer.dat',
			'import_preview_image_url'   => esc_url( 'https://www.anarieldesign.com/themedemos/liber/wp-content/uploads/2020/12/wine.jpg' ),
			'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the socials and second menu separately.', 'liber' ),
		),
	);
}
add_filter( 'pt-ocdi/import_files', 'liber_ocdi_import_files' );
function liber_ocdi_after_import_setup() {
	// Assign menus to their locations.
	$main_menu = get_term_by( 'name', 'Primary Menu', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
		'primary' => $main_menu->term_id,
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title (esc_html__( 'Liber.', 'liber' ));
	$blog_page_id  = get_page_by_title (esc_html__( 'Latest News', 'liber' ));

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'liber_ocdi_after_import_setup' );
function liber_ocdi_plugin_intro_notice ( $default_text ) {
	return wp_kses_post( str_replace ( 'Before you begin, make sure all the required plugins are activated.', esc_html__( 'Before you begin, make sure all the required & recommended plugins are activated.', 'liber'), $default_text ) );
}
add_filter( 'pt-ocdi/plugin_intro_text', 'liber_ocdi_plugin_intro_notice' );