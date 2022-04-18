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


	/* 
		COLORS

		BG BLUE - #004987

		TEXT BLUE - #004987

		TEXT LINK ACTIVE LIGHT BLUE - #4389c5
		TEXT LINK Hover LIGHT BLUE - #06b1e2

		TEXT WHITE- #fff

		BTN YELLOW BG - #ffd100

	*/

	add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => esc_html__( 'Green', 'liber' ),
			'slug'  => 'color-green',
			'color' => '#155741',
		),
		array(
			'name'  => esc_html__( 'Tan', 'liber' ),
			'slug'  => 'color-tan',
			'color' => '#efeedd',
		),
		array(
			'name'  => esc_html__( 'White', 'liber' ),
			'slug'  => 'color-white',
			'color' => '#ffffff',
		),
		array(
			'name'  => esc_html__( 'Gray', 'liber' ),
			'slug'  => 'color-gray',
			'color' => '#3f454f',
		)
	) );

}

add_action( 'after_setup_theme', 'theme_child_after_setup', 20 );

function elite_is_euro() {
	$euro_list = ['AD', 'AL', 'AT', 'AX', 'BA', 'BE', 'BG', 'BY', 'CH', 'CZ', 'DE', 'DK', 'EE', 'ES', 'FI', 'FO', 'FR', 'GB', 'GG', 'GI', 'GR', 'HR', 'HU', 'IE', 'IM', 'IS', 'IT', 'JE', 'LI', 'LT', 'LU', 'LV', 'MC', 'MD', 'ME', 'MK', 'MT', 'NL', 'NO', 'PL', 'PT', 'RO', 'RS', 'RU', 'SE', 'SI', 'SJ', 'SK', 'SM', 'UA', 'VA'];

	$geo = new CF_Geoplugin();
    
    $geo_result = $geo->get();

    return in_array($geo_result->country_code, $euro_list);

}

function shortcode_geoip($atts = [], $content = '') {

	// normalize attribute keys, lowercase
    $atts = array_change_key_case((array)$atts, CASE_LOWER);
 
    // override default attributes with user attributes
    $attributes = shortcode_atts([
        // 'template_style' => $this->opt_shortcode_styling
        'for' =>  'us',
    ], $atts);	

    if ($attributes['for'] == 'europe') {

    	if (elite_is_euro()) {

    		return $content;

    	}

    }
    elseif ($attributes['for'] == 'us') {

    	if (! elite_is_euro()) {

    		return $content;

    	}

    }	

    return '';
}

add_shortcode('geoip', 'shortcode_geoip');


add_shortcode('MarketingCloudSignUp', function($atts, $content) {

	ob_start();
	?>

	<div>
	    <form action="https://cl.s12.exct.net/DEManager.aspx" name="subscribeForm" method="post" class="MarketingCloudSignUp">
	        <input type="hidden" name="_clientID" value="534001845" />
	        <input type="hidden" name="_deExternalKey" value="AD994D56-B927-4D1F-8C8A-10A0BF9DC41D" />

	        <input type="hidden" name="_action" value="add" />
	        <input type="hidden" name="_returnXML" value="0" />
	        
	        <input type="hidden" name="_successURL" value="https://www.losestablospanama.com/thank-you-for-subscribing/" />

	        <input type="hidden" name="_errorURL" value="httpss://example.com/Failed" />

	        <!-- <input type="hidden" name="Source" value="httpss://eliteislandresorts.com" /> -->
	        
	        <label>First Name:</label> 
	        <input type="text" name="first_name" required=""><br />
	        
	        <labeL>Last Name:</label>
	        <input type="text" name="last_name" required=""><br />

	        <label>Email:</label> 
	        <input type="text" name="email_address" required=""><br />

	        <button type="submit">Sign Up</button>
	    </form>
	</div>

	<style type="text/css">
	.MarketingCloudSignUp label{display: block;}
	.MarketingCloudSignUp input{width: 100%; max-width: 350px; border: 2px solid #000; padding: 2px;}
	.MarketingCloudSignUp button{background: #eee; color: #333; border: 1px solid #ddd; margin-top: 10px !important; padding: 10px 15px !important;}
	</style>
	<?php

	return ob_get_clean();
});