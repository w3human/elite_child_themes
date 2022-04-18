<?php

function theme_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style', get_stylesheet_uri(), array( 'parent-style' ) );

	wp_enqueue_script( 'book-now-js', 'https://verandah.eliteislandvacations.com/box.aspx' );

	wp_enqueue_script( 'themetheme', get_stylesheet_directory_uri().'/themetheme.js' );

	wp_localize_script('themetheme', '_is_euro', (elite_is_euro())?'1':'0');

}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function theme_child_after_setup() {

	register_nav_menus( array(
		'menu-2' => esc_html__( 'Footer Menu', 'getwid-base' ),
	) );

	add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => esc_html__( 'Orange', 'liber' ),
			'slug'  => 'orange',
			'color' => '#F8970C',
		),
		array(
			'name'  => esc_html__( 'Darker Blue', 'liber' ),
			'slug'  => 'darker-blue',
			'color' => '#024985',
		),
		array(
			'name'  => esc_html__( 'Darker Blue 2', 'liber' ),
			'slug'  => 'darker-blue-two',
			'color' => '#184f75',
		),
		array(
			'name'  => esc_html__( 'Light Blue', 'liber' ),
			'slug'  => 'light-blue',
			'color' => '#099cc8',
		),
		array(
			'name'  => esc_html__( 'Dark Pink', 'liber' ),
			'slug'  => 'dark-pink',
			'color' => '#c43a68',
		),
	) );

}

add_action( 'after_setup_theme', 'theme_child_after_setup', 20 );

function elite_is_euro() {
	$euro_list = ['AD', 'AL', 'AT', 'AX', 'BA', 'BE', 'BG', 'BY', 'CH', 'CZ', 'DE', 'DK', 'EE', 'ES', 'FI', 'FO', 'FR', 'GB', 'GG', 'GI', 'GR', 'HR', 'HU', 'IE', 'IM', 'IS', 'IT', 'JE', 'LI', 'LT', 'LU', 'LV', 'MC', 'MD', 'ME', 'MK', 'MT', 'NL', 'NO', 'PL', 'PT', 'RO', 'RS', 'RU', 'SE', 'SI', 'SJ', 'SK', 'SM', 'UA', 'VA'];

	$geo = new CF_Geoplugin();
    
    $geo_result = $geo->get();

    return in_array($geo_result->country_code, $euro_list);

}

add_shortcode('MarketingCloudSignUp', function($atts, $content) {

	ob_start();
	?>

	<form action="https://cl.s12.exct.net/DEManager.aspx" name="subscribeForm" method="post" class="MarketingCloudSignUp">
	    <input type="hidden" name="_clientID" value="534001845">
	    <input type="hidden" name="_deExternalKey" value="C4FCA4BF-41E4-488F-BDE8-16B9745D938A">
	   	<input type="hidden" name="_action" value="add">
	    <input type="hidden" name="_returnXML" value="0">

	    <input type="hidden" name="_successURL" value="https://www.theverandahantigua.com/thank-you-for-subscribing/">
	    <input type="hidden" name="_errorURL" value="https://example.com/Failed">

	    <label>First Name:</label>
	    <input type="text" name="First Name" required="">
	    
	    <label>Last Name:</label>
	    <input type="text" name="Last Name" required="">
	    
	    <label>Email:</label>
	    <input type="text" name="Email Address" required="">
	    
	    <button type="submit">Sign Up</button>
	</form>

	<style type="text/css">
		.MarketingCloudSignUp label{display: block;}
		.MarketingCloudSignUp input{width: 100%;}
		.MarketingCloudSignUp button{background: #F8970C; border: 0; color: #fff; margin-top: 10px; padding: calc(0.667em + 2px) calc(1.333em + 2px);}
	</style>
	<?php

	return ob_get_clean();
});