<?php
/**
 *
 * Adds custom Block Patterns to the post/page editor.
 *
 * see: https://developer.wordpress.org/block-editor/developers/block-api/block-patterns/
 *
 * @package Liber
 */


register_block_pattern_category(
	'liber-theme',
	array( 'label' => esc_html__( 'Liber', 'liber' ) )
);


register_block_pattern_category(
	'liber-theme-wc',
	array( 'label' => esc_html__( 'Liber - Products', 'liber' ) )
);

register_block_pattern(
	'liber/liber-hero',
	array(
		'title'			=> esc_html__( 'Hero Section', 'liber' ),
		'description'	=> esc_html_x( 'A pattern to quickly create the top hero section.', 'Block pattern description', 'liber' ),

		'content'		=> '<!-- wp:cover {"url":"' . esc_url( get_theme_file_uri( 'images/hero.jpg' ) ) . '","hasParallax":true,"dimRatio":0,"minHeight":700,"align":"full","className":"liber-hero"} -->
        <div class="wp-block-cover alignfull has-parallax liber-hero" style="background-image:url(' . esc_url( get_theme_file_uri( 'images/hero.jpg' ) ) . ');min-height:700px"><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"background":"#ffffff"}}} -->
        <div class="wp-block-group has-background" style="background-color:#ffffff"><div class="wp-block-group__inner-container"><!-- wp:heading {"level":2,"style":{"color":{"text":"#000000"},"typography":{"fontSize":"110px"}}} -->
        <h2 class="has-text-color" style="color:#000000;font-size:110px">LIBER.</h2>
        <!-- /wp:heading -->
        
        <!-- wp:paragraph {"textColor":"green","fontSize":"normal"} -->
        <p class="has-green-color has-text-color has-normal-font-size">' . esc_html_x( 'OPENING HOURS:', 'Theme starter content', 'liber' ) . ' <strong>' . esc_html_x( 'MO-SA', 'Theme starter content', 'liber' ) . '</strong> <strong>' . esc_html_x( '11:00-23:00', 'Theme starter content', 'liber' ) . '</strong></p>
        <!-- /wp:paragraph -->
        
        <!-- wp:paragraph {"style":{"color":{"text":"#000000"}}} -->
        <p class="has-text-color" style="color:#000000">' . esc_html_x( 'The Liber was founded at the beginning of 2014. It celebrates healthy, vegetarian &amp; delicious recipes created from natural ingredients. These tasty recipes can be enjoyed in our bar.', 'Theme starter content', 'liber' ) . '</p>
        <!-- /wp:paragraph -->
        
        <!-- wp:buttons -->
        <div class="wp-block-buttons"><!-- wp:button {"borderRadius":0,"backgroundColor":"green","className":"is-style-fill"} -->
        <div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-green-background-color has-background no-border-radius">' . esc_html_x( 'Make Reservation', 'Theme starter content', 'liber' ) . '</a></div>
        <!-- /wp:button --></div>
        <!-- /wp:buttons --></div></div>
        <!-- /wp:group --></div></div>
        <!-- /wp:cover -->',

		'viewportWidth'	=> 1400,
		'categories'	=> array( 'liber-theme' ),
	)
);

register_block_pattern(
	'liber/liber-text-image',
	array(
		'title'			=> esc_html__( '3 Columns - Image and Text', 'liber' ),
		'description'	=> esc_html_x( 'A pattern to quickly create 3 columns with text and image.', 'Block pattern description', 'liber' ),

		'content'		=> '<!-- wp:columns {"className":"liber-three-columns-image"} -->
        <div class="wp-block-columns liber-three-columns-image"><!-- wp:column -->
        <div class="wp-block-column"><!-- wp:image {"align":"center","width":135,"height":135,"sizeSlug":"large","linkDestination":"none","className":"is-style-rounded"} -->
        <div class="wp-block-image is-style-rounded"><figure class="aligncenter size-large is-resized"><img src="' . esc_url( get_theme_file_uri( 'images/image-1.jpg' ) ) . '" alt="image" width="135" height="135"/></figure></div>
        <!-- /wp:image -->
        
        <!-- wp:heading {"textAlign":"center","fontSize":"large"} -->
        <h2 class="has-text-align-center has-large-font-size">' . esc_html_x( 'Delicious', 'Theme starter content', 'liber' ) . '</h2>
        <!-- /wp:heading -->
        
        <!-- wp:paragraph {"align":"center"} -->
        <p class="has-text-align-center">' . esc_html_x( 'Cras sodales luctus arcu, ac placerat nunc sagittis a. In at turpis ac nibh luctus sagittis in ut est. Proin sed mi vitae velit convallis gravida imperdiet eu mauris.', 'Theme starter content', 'liber' ) . '</p>
        <!-- /wp:paragraph --></div>
        <!-- /wp:column -->
        
        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:image {"align":"center","width":135,"height":135,"sizeSlug":"large","linkDestination":"none","className":"is-style-rounded"} -->
        <div class="wp-block-image is-style-rounded"><figure class="aligncenter size-large is-resized"><img src="' . esc_url( get_theme_file_uri( 'images/image-2.jpg' ) ) . '" alt="image" width="135" height="135"/></figure></div>
        <!-- /wp:image -->
        
        <!-- wp:heading {"textAlign":"center","fontSize":"large"} -->
        <h2 class="has-text-align-center has-large-font-size">' . esc_html_x( 'Tasty', 'Theme starter content', 'liber' ) . '</h2>
        <!-- /wp:heading -->
        
        <!-- wp:paragraph {"align":"center"} -->
        <p class="has-text-align-center">' . esc_html_x( 'Cras sodales luctus arcu, ac placerat nunc sagittis a. In at turpis ac nibh luctus sagittis in ut est. Proin sed mi vitae velit convallis gravida imperdiet eu mauris.', 'Theme starter content', 'liber' ) . '</p>
        <!-- /wp:paragraph --></div>
        <!-- /wp:column -->
        
        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:image {"align":"center","width":135,"height":135,"sizeSlug":"large","linkDestination":"none","className":"is-style-rounded"} -->
        <div class="wp-block-image is-style-rounded"><figure class="aligncenter size-large is-resized"><img src="' . esc_url( get_theme_file_uri( 'images/image-3.jpg' ) ) . '" alt="image" width="135" height="135"/></figure></div>
        <!-- /wp:image -->
        
        <!-- wp:heading {"textAlign":"center","fontSize":"large"} -->
        <h2 class="has-text-align-center has-large-font-size">' . esc_html_x( 'Healthy', 'Theme starter content', 'liber' ) . '</h2>
        <!-- /wp:heading -->
        
        <!-- wp:paragraph {"align":"center"} -->
        <p class="has-text-align-center">' . esc_html_x( 'Cras sodales luctus arcu, ac placerat nunc sagittis a. In at turpis ac nibh luctus sagittis in ut est. Proin sed mi vitae velit convallis gravida imperdiet eu mauris.', 'Theme starter content', 'liber' ) . '</p>
        <!-- /wp:paragraph --></div>
        <!-- /wp:column --></div>
        <!-- /wp:columns -->',

		'viewportWidth'	=> 1400,
		'categories'	=> array( 'liber-theme' ),
	)
);

register_block_pattern(
	'liber/liber-media',
	array(
		'title'			=> esc_html__( 'Media and Text - Image and Text', 'liber' ),
		'description'	=> esc_html_x( 'A pattern to quickly create 2 columns with media and text.', 'Block pattern description', 'liber' ),

		'content'		=> '<!-- wp:media-text {"align":"full","mediaPosition":"right","mediaId":1922,"mediaLink":"' . esc_url( get_template_directory_uri() ) . '/images/hero-2.jpg","mediaType":"image","verticalAlignment":"center","imageFill":true,"focalPoint":{"x":"0.47","y":"0.89"},"style":{"color":{"background":"#ebefe3"}}} -->
        <div class="wp-block-media-text alignfull has-media-on-the-right is-stacked-on-mobile is-vertically-aligned-center is-image-fill has-background" style="background-color:#ebefe3"><figure class="wp-block-media-text__media" style="background-image:url(' . esc_url( get_theme_file_uri( 'images/hero-2.jpg' ) ) . ');background-position:47% 89%"><img src="' . esc_url( get_template_directory_uri() ) . '/images/hero-2.jpg" alt="image" class="wp-image-1922 size-full"/></figure><div class="wp-block-media-text__content"><!-- wp:spacer -->
        <div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
        <!-- /wp:spacer -->      
        
        <!-- wp:heading {"textAlign":"left"} -->
        <h2 class="has-text-align-left">' . esc_html_x( 'Special Offer', 'Theme starter content', 'liber' ) . '</h2>
        <!-- /wp:heading -->
        
        <!-- wp:group {"className":"special-offer","style":{"color":{"background":"#ffffff"}}} -->
        <div class="wp-block-group special-offer has-background" style="background-color:#ffffff"><div class="wp-block-group__inner-container"><!-- wp:paragraph -->
        <p></p>
        <!-- /wp:paragraph -->
        
        <!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"24px"}}} -->
        <h3 style="font-size:24px"><strong>' . esc_html_x( 'Raw Salad', 'Theme starter content', 'liber' ) . '</strong></h3>
        <!-- /wp:heading -->
        
        <!-- wp:paragraph -->
        <p>' . esc_html_x( 'Cras sodales luctus arcu, ac placerat nunc sagittis a. In at turpis ac nibh luctus sagittis in ut est', 'Theme starter content', 'liber' ) . '</p>
        <!-- /wp:paragraph -->
        
        <!-- wp:paragraph {"textColor":"green"} -->
        <p class="has-green-color has-text-color"><strong>' . esc_html_x( '7,00€', 'Theme starter content', 'liber' ) . '</strong></p>
        <!-- /wp:paragraph -->
        
        <!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"24px"}}} -->
        <h3 style="font-size:24px"><strong>' . esc_html_x( 'Pumpkin Cake', 'Theme starter content', 'liber' ) . '</strong></h3>
        <!-- /wp:heading --> 
        
        <!-- wp:paragraph -->
        <p>' . esc_html_x( 'Cras sodales luctus arcu, ac placerat nunc sagittis a. In at turpis ac nibh luctus sagittis in ut est', 'Theme starter content', 'liber' ) . '</p>
        <!-- /wp:paragraph -->
        
        <!-- wp:paragraph {"textColor":"green"} -->
        <p class="has-green-color has-text-color"><strong>' . esc_html_x( '5,00€', 'Theme starter content', 'liber' ) . '</strong></p>
        <!-- /wp:paragraph -->
        
        <!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"24px"}}} -->
        <h3 style="font-size:24px"><strong>' . esc_html_x( 'Vegan Falafel', 'Theme starter content', 'liber' ) . '</strong></h3>
        <!-- /wp:heading -->
        
        <!-- wp:paragraph -->
        <p>' . esc_html_x( 'Cras sodales luctus arcu, ac placerat nunc sagittis a. In at turpis ac nibh luctus sagittis in ut est', 'Theme starter content', 'liber' ) . '</p>
        <!-- /wp:paragraph -->
        
        <!-- wp:paragraph {"textColor":"green"} -->
        <p class="has-green-color has-text-color"><strong>' . esc_html_x( '9,00€', 'Theme starter content', 'liber' ) . '</strong></p>
        <!-- /wp:paragraph --></div></div>
        <!-- /wp:group -->
        
        <!-- wp:spacer -->
        <div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
        <!-- /wp:spacer --></div></div>
        <!-- /wp:media-text -->',

		'viewportWidth'	=> 1400,
		'categories'	=> array( 'liber-theme' ),
	)
);

register_block_pattern(
	'liber/liber-team',
	array(
		'title'			=> esc_html__( 'Team', 'liber' ),
		'description'	=> esc_html_x( 'A pattern to quickly create team block.', 'Block pattern description', 'liber' ),

		'content'		=> '<!-- wp:columns {"className":"has-3-columns"} -->
        <div class="wp-block-columns has-3-columns"><!-- wp:column -->
        <div class="wp-block-column"><!-- wp:image -->
        <figure class="wp-block-image"><img src="' . esc_url( get_theme_file_uri( 'images/team-1.jpg' ) ) . '" alt="image" class=""/></figure>
        <!-- /wp:image -->
        
        <!-- wp:heading {"align":"left","level":3,"fontSize":"large"} -->
        <h3 class="has-text-align-left has-large-font-size">' . esc_html_x( 'Angela Ema', 'Theme starter content', 'liber' ) . '</h3>
        <!-- /wp:heading -->
        
        <!-- wp:paragraph -->
        <p>' . esc_html_x( 'Malesuada nibh montes fusce cum eleifend fringilla commodo mattis tempor platea montes. Malesuada nibh montes fusce cum eleifend. Malesuada nibh montes fusce cum eleifend fringilla commodo mattis tempor platea montes.', 'Theme starter content', 'liber' ) . '</p>
        <!-- /wp:paragraph --></div>
        <!-- /wp:column -->
        
        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:image -->
        <figure class="wp-block-image"><img src="' . esc_url( get_theme_file_uri( 'images/team-2.jpg' ) ) . '" alt="image" class=""/></figure>
        <!-- /wp:image -->
        
        <!-- wp:heading {"align":"left","level":3,"fontSize":"large"} -->
        <h3 class="has-text-align-left has-large-font-size">' . esc_html_x( 'Alex Zela', 'Theme starter content', 'liber' ) . '</h3>
        <!-- /wp:heading -->
        
        <!-- wp:paragraph -->
        <p>' . esc_html_x( 'Malesuada nibh montes fusce cum eleifend fringilla commodo mattis tempor platea montes. Malesuada nibh montes fusce cum eleifend. Malesuada nibh montes fusce cum eleifend fringilla commodo mattis tempor platea montes.', 'Theme starter content', 'liber' ) . '</p>
        <!-- /wp:paragraph --></div>
        <!-- /wp:column -->
        
        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:image -->
        <figure class="wp-block-image"><img src="' . esc_url( get_theme_file_uri( 'images/team-3.jpg' ) ) . '" alt="image" class=""/></figure>
        <!-- /wp:image -->
        
        <!-- wp:heading {"align":"left","level":3,"fontSize":"large"} -->
        <h3 class="has-text-align-left has-large-font-size">' . esc_html_x( 'Talinka Bubi', 'Theme starter content', 'liber' ) . '</h3>
        <!-- /wp:heading -->
        
        <!-- wp:paragraph -->
        <p>' . esc_html_x( 'Malesuada nibh montes fusce cum eleifend fringilla commodo mattis tempor platea montes. Malesuada nibh montes fusce cum eleifend. Malesuada nibh montes fusce cum eleifend fringilla commodo mattis tempor platea montes.', 'Theme starter content', 'liber' ) . '</p>
        <!-- /wp:paragraph --></div>
        <!-- /wp:column --></div>
        <!-- /wp:columns -->',

		'viewportWidth'	=> 1400,
		'categories'	=> array( 'liber-theme' ),
	)
);

register_block_pattern(
	'liber/liber-cover',
	array(
		'title'			=> esc_html__( 'Cover Section', 'liber' ),
		'description'	=> esc_html_x( 'A pattern to quickly create the cover section.', 'Block pattern description', 'liber' ),

		'content'		=> '<!-- wp:cover {"url":"' . esc_url( get_theme_file_uri( 'images/hero-2.jpg' ) ) . '","id":1922,"hasParallax":true,"minHeight":700,"align":"full"} -->
        <div class="wp-block-cover alignfull has-background-dim has-parallax" style="background-image:url(' . esc_url( get_theme_file_uri( 'images/hero-2.jpg' ) ) . ');min-height:700px"><div class="wp-block-cover__inner-container"><!-- wp:group {"className":"liber-gift-card","style":{"color":{"background":"#ebefe3"}}} -->
        <div class="wp-block-group liber-gift-card has-background" style="background-color:#ebefe3"><div class="wp-block-group__inner-container"><!-- wp:heading {"style":{"color":{"text":"#000000"}}} -->
        <h2 class="has-text-color" style="color:#000000">LIBER. GIFT CARDS</h2>
        <!-- /wp:heading -->
        
        <!-- wp:paragraph {"style":{"color":{"text":"#000000"}}} -->
        <p class="has-text-color" style="color:#000000">' . esc_html_x( 'Cras sodales luctus arcu, ac placerat nunc sagittis a. In at turpis ac nibh luctus sagittis in ut est. Proin sed mi vitae velit convallis gravida imperdiet eu mauris. Cras sodales luctus arcu, ac placerat nunc sagittis a. In at turpis ac nibh luctus sagittis in ut est.', 'Theme starter content', 'liber' ) . '</p>
        <!-- /wp:paragraph -->
        
        <!-- wp:buttons -->
        <div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"green"} -->
        <div class="wp-block-button"><a class="wp-block-button__link has-green-background-color has-background">' . esc_html_x( 'Tell me more', 'Theme starter content', 'liber' ) . '</a></div>
        <!-- /wp:button --></div>
        <!-- /wp:buttons --></div></div>
        <!-- /wp:group --></div></div>
        <!-- /wp:cover -->',

		'viewportWidth'	=> 1400,
		'categories'	=> array( 'liber-theme' ),
	)
);

register_block_pattern(
	'liber/liber-recent-post',
	array(
		'title'			=> esc_html__( 'Recent Post Grid', 'liber' ),
		'description'	=> esc_html_x( 'A pattern to quickly create 3 column recent post.', 'Block pattern description', 'liber' ),

		'content'		=> '<!-- wp:heading {"fontSize":"large"} -->
        <h2 class="has-large-font-size">' . esc_html_x( 'Latest Posts', 'Theme starter content', 'liber' ) . '</h3>
        <!-- /wp:heading -->
        
        <!-- wp:spacer {"height":10} -->
        <div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>
        <!-- /wp:spacer -->
        
        <!-- wp:columns {"className":"liber-post has-3-columns recent-post-standard"} -->
        <div class="wp-block-columns liber-post has-3-columns recent-post-standard"><!-- wp:column -->
        <div class="wp-block-column"><!-- wp:image {"linkDestination":"custom","className":"ticss-5a1ad9a0"} -->
        <figure class="wp-block-image ticss-5a1ad9a0"><a href="#"><img src="' . esc_url( get_theme_file_uri( 'images/post-1.jpg' ) ) . '" alt="image" class=""/></a></figure>
        <!-- /wp:image -->
        
        <!-- wp:latest-posts {"postsToShow":1,"displayPostContent":true,"displayPostDate":true} /--></div>
        <!-- /wp:column -->
        
        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:image {"linkDestination":"custom","className":"ticss-5a1ad9a0"} -->
        <figure class="wp-block-image ticss-5a1ad9a0"><a href="#"><img src="' . esc_url( get_theme_file_uri( 'images/post-2.jpg' ) ) . '" alt="image" class=""/></a></figure>
        <!-- /wp:image -->
        
        <!-- wp:latest-posts {"postsToShow":1,"displayPostContent":true,"displayPostDate":true} /--></div>
        <!-- /wp:column -->
        
        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:image {"linkDestination":"custom","className":"ticss-5a1ad9a0"} -->
        <figure class="wp-block-image ticss-5a1ad9a0"><a href="#"><img src="' . esc_url( get_theme_file_uri( 'images/post-3.jpg' ) ) . '" alt="image" class=""/></a></figure>
        <!-- /wp:image -->
        
        <!-- wp:latest-posts {"postsToShow":1,"displayPostContent":true,"displayPostDate":true} /--></div>
        <!-- /wp:column --></div>
        <!-- /wp:columns -->',

		'viewportWidth'	=> 1400,
		'categories'	=> array( 'liber-theme' ),
	)
);

register_block_pattern(
	'liber/liber-about-us',
	array(
		'title'			=> esc_html__( 'About Us Section', 'liber' ),
		'description'	=> esc_html_x( 'A pattern to quickly create 3 column about us.', 'Block pattern description', 'liber' ),

		'content'		=> '<!-- wp:columns {"className":"liber-about"} -->
        <div class="wp-block-columns liber-about"><!-- wp:column -->
        <div class="wp-block-column"><!-- wp:heading {"level":3} -->
        <h3>' . esc_html_x( 'Liber Bar', 'Theme starter content', 'liber' ) . '</h3>
        <!-- /wp:heading -->
        
        <!-- wp:paragraph -->
        <p><strong><em>' . esc_html_x( 'Cras sodales luctus arcu, ac placerat nunc sagittis a. In at turpis ac nibh luctus sagittis in ut est.', 'Theme starter content', 'liber' ) . '</em></strong></p>
        <!-- /wp:paragraph -->
        
        <!-- wp:paragraph -->
        <p>' . esc_html_x( 'Cras sodales luctus arcu, ac placerat nunc sagittis a. In at turpis ac nibh luctus sagittis in ut est. Proin sed mi vitae velit convallis gravida imperdiet eu mauris. Maecenas vehicula quam vel urna pulvinar, quis faucibus quam pellentesque. Sed vitae pellentesque velit. Etiam nec ornare tortor.', 'Theme starter content', 'liber' ) . '</p>
        <!-- /wp:paragraph -->
        
        <!-- wp:buttons -->
        <div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"green"} -->
        <div class="wp-block-button"><a class="wp-block-button__link has-green-background-color has-background">' . esc_html_x( 'Get to know us', 'Theme starter content', 'liber' ) . '</a></div>
        <!-- /wp:button --></div>
        <!-- /wp:buttons --></div>
        <!-- /wp:column -->
        
        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:image {"id":2002,"sizeSlug":"large","linkDestination":"none"} -->
        <figure class="wp-block-image size-large"><img src="' . esc_url( get_theme_file_uri( 'images/chef.jpg' ) ) . '" alt="img" class="wp-image-2002"/></figure>
        <!-- /wp:image -->
        
        <!-- wp:image {"align":"center","id":557,"sizeSlug":"large","linkDestination":"none"} -->
        <div class="wp-block-image"><figure class="aligncenter size-large"><img src="' . esc_url( get_theme_file_uri( 'images/signature.jpg' ) ) . '" alt="img" class="wp-image-557"/></figure></div>
        <!-- /wp:image --></div>
        <!-- /wp:column -->
        
        <!-- wp:column {"className":"liber-column"} -->
        <div class="wp-block-column liber-column"><!-- wp:image {"id":674,"sizeSlug":"large","linkDestination":"none"} -->
        <figure class="wp-block-image size-large"><img src="' . esc_url( get_theme_file_uri( 'images/hours.jpg' ) ) . '" alt="img" class="wp-image-674"/></figure>
        <!-- /wp:image -->
        
        <!-- wp:table {"backgroundColor":"subtle-pale-green","className":"is-style-regular"} -->
        <figure class="wp-block-table is-style-regular"><table class="has-subtle-pale-green-background-color has-background"><thead><tr><th class="has-text-align-left" data-align="left">' . esc_html_x( 'Week', 'Theme starter content', 'liber' ) . '</th><th class="has-text-align-right" data-align="right">' . esc_html_x( 'Hours', 'Theme starter content', 'liber' ) . '</th></tr></thead><tbody><tr><td class="has-text-align-left" data-align="left">' . esc_html_x( 'Mon-Thu', 'Theme starter content', 'liber' ) . '</td><td class="has-text-align-right" data-align="right"><strong>' . esc_html_x( '11:00-23:00', 'Theme starter content', 'liber' ) . '</strong></td></tr><tr><td class="has-text-align-left" data-align="left">' . esc_html_x( 'Fri-Sun', 'Theme starter content', 'liber' ) . '</td><td class="has-text-align-right" data-align="right"><strong>' . esc_html_x( '11:00-23:00', 'Theme starter content', 'liber' ) . '</strong></td></tr><tr><td class="has-text-align-left" data-align="left">' . esc_html_x( 'Wendsday', 'Theme starter content', 'liber' ) . '</td><td class="has-text-align-right" data-align="right"><strong>' . esc_html_x( 'Closed', 'Theme starter content', 'liber' ) . '</strong></td></tr></tbody></table></figure>
        <!-- /wp:table --></div>
        <!-- /wp:column --></div>
        <!-- /wp:columns -->',

		'viewportWidth'	=> 1400,
		'categories'	=> array( 'liber-theme' ),
	)
);

register_block_pattern(
	'liber/liber-list-menu',
	array(
		'title'			=> esc_html__( 'List Menu Section', 'liber' ),
		'description'	=> esc_html_x( 'A pattern to quickly create list menu section.', 'Block pattern description', 'liber' ),

		'content'		=> '<!-- wp:group -->
        <div class="wp-block-group"><div class="wp-block-group__inner-container"><!-- wp:columns {"className":"liber-list-menu","style":{"color":{"background":"#ebefe3"}}} -->
        <div class="wp-block-columns liber-list-menu has-background" style="background-color:#ebefe3"><!-- wp:column {"className":"liber-menu-white"} -->
        <div class="wp-block-column liber-menu-white"><!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"34px"}}} -->
        <h3 style="font-size:34px">' . esc_html_x( 'Fitness Smoothie', 'Theme starter content', 'liber' ) . '</h3>
        <!-- /wp:heading -->
        
        <!-- wp:paragraph {"style":{"color":{"text":"#707070"}}} -->
        <p class="has-text-color" style="color:#707070"><em>' . esc_html_x( 'Cras sodales luctus arcu, ac placerat nunc sagittis a. In at turpis ac nibh luctus sagittis in ut est, sodales luctus arcu, ac placerat nunc', 'Theme starter content', 'liber' ) . '</em></p>
        <!-- /wp:paragraph -->
        
        <!-- wp:heading {"level":4,"className":"liber-price","backgroundColor":"green","fontSize":"medium","style":{"color":{"text":"#ffffff"}}} -->
        <h4 class="liber-price has-green-background-color has-text-color has-background has-medium-font-size" style="color:#ffffff">' . esc_html_x( '7,00€', 'Theme starter content', 'liber' ) . '</h4>
        <!-- /wp:heading -->
        
        <!-- wp:spacer {"height":60} -->
        <div style="height:60px" aria-hidden="true" class="wp-block-spacer"></div>
        <!-- /wp:spacer -->
        
        <!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"34px"}}} -->
        <h3 style="font-size:34px">' . esc_html_x( 'Pinky Smoothie', 'Theme starter content', 'liber' ) . '</h3>
        <!-- /wp:heading -->
        
        <!-- wp:paragraph {"style":{"color":{"text":"#707070"}}} -->
        <p class="has-text-color" style="color:#707070"><em>' . esc_html_x( 'Cras sodales luctus arcu, ac placerat nunc sagittis a. In at turpis ac nibh luctus sagittis in ut est, sodales luctus arcu, ac placerat nunc', 'Theme starter content', 'liber' ) . '</em></p>
        <!-- /wp:paragraph -->
        
        <!-- wp:heading {"level":4,"className":"liber-price","backgroundColor":"green","fontSize":"medium","style":{"color":{"text":"#ffffff"}}} -->
        <h4 class="liber-price has-green-background-color has-text-color has-background has-medium-font-size" style="color:#ffffff">' . esc_html_x( '9,00€', 'Theme starter content', 'liber' ) . '</h4>
        <!-- /wp:heading -->
        
        <!-- wp:spacer {"height":60} -->
        <div style="height:60px" aria-hidden="true" class="wp-block-spacer"></div>
        <!-- /wp:spacer -->
        
        <!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"34px"}}} -->
        <h3 style="font-size:34px">' . esc_html_x( 'Power Smoothie', 'Theme starter content', 'liber' ) . '</h3>
        <!-- /wp:heading -->
        
        <!-- wp:paragraph {"style":{"color":{"text":"#707070"}}} -->
        <p class="has-text-color" style="color:#707070"><em>' . esc_html_x( 'Cras sodales luctus arcu, ac placerat nunc sagittis a. In at turpis ac nibh luctus sagittis in ut est, sodales luctus arcu, ac placerat nunc', 'Theme starter content', 'liber' ) . '</em></p>
        <!-- /wp:paragraph -->
        
        <!-- wp:heading {"level":4,"className":"liber-price","backgroundColor":"green","fontSize":"medium","style":{"color":{"text":"#ffffff"}}} -->
        <h4 class="liber-price has-green-background-color has-text-color has-background has-medium-font-size" style="color:#ffffff">' . esc_html_x( '6,50€', 'Theme starter content', 'liber' ) . '</h4>
        <!-- /wp:heading --></div>
        <!-- /wp:column -->
        
        <!-- wp:column {"className":"liber-menu-white"} -->
        <div class="wp-block-column liber-menu-white"><!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"34px"}}} -->
        <h3 style="font-size:34px">' . esc_html_x( 'Fresh Smoothie', 'Theme starter content', 'liber' ) . '</h3>
        <!-- /wp:heading -->
        
        <!-- wp:paragraph {"style":{"color":{"text":"#707070"}}} -->
        <p class="has-text-color" style="color:#707070"><em>' . esc_html_x( 'Cras sodales luctus arcu, ac placerat nunc sagittis a. In at turpis ac nibh luctus sagittis in ut est, sodales luctus arcu, ac placerat nunc', 'Theme starter content', 'liber' ) . '</em></p>
        <!-- /wp:paragraph -->
        
        <!-- wp:heading {"level":4,"className":"liber-price","backgroundColor":"green","fontSize":"medium","style":{"color":{"text":"#ffffff"}}} -->
        <h4 class="liber-price has-green-background-color has-text-color has-background has-medium-font-size" style="color:#ffffff">' . esc_html_x( '5,50€', 'Theme starter content', 'liber' ) . '</h4>
        <!-- /wp:heading -->
        
        <!-- wp:spacer {"height":60} -->
        <div style="height:60px" aria-hidden="true" class="wp-block-spacer"></div>
        <!-- /wp:spacer -->
        
        <!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"34px"}}} -->
        <h3 style="font-size:34px">' . esc_html_x( 'Strawberries Smoothie', 'Theme starter content', 'liber' ) . '</h3>
        <!-- /wp:heading -->
        
        <!-- wp:paragraph {"style":{"color":{"text":"#707070"}}} -->
        <p class="has-text-color" style="color:#707070"><em>' . esc_html_x( 'Cras sodales luctus arcu, ac placerat nunc sagittis a. In at turpis ac nibh luctus sagittis in ut est, sodales luctus arcu, ac placerat nunc', 'Theme starter content', 'liber' ) . '</em></p>
        <!-- /wp:paragraph -->
        
        <!-- wp:heading {"level":4,"className":"liber-price","backgroundColor":"green","fontSize":"medium","style":{"color":{"text":"#ffffff"}}} -->
        <h4 class="liber-price has-green-background-color has-text-color has-background has-medium-font-size" style="color:#ffffff">' . esc_html_x( '7,00€', 'Theme starter content', 'liber' ) . '</h4>
        <!-- /wp:heading -->
        
        <!-- wp:spacer {"height":60} -->
        <div style="height:60px" aria-hidden="true" class="wp-block-spacer"></div>
        <!-- /wp:spacer -->
        
        <!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"34px"}}} -->
        <h3 style="font-size:34px">' . esc_html_x( 'Energy Smoothie', 'Theme starter content', 'liber' ) . '</h3>
        <!-- /wp:heading -->
        
        <!-- wp:paragraph {"style":{"color":{"text":"#707070"}}} -->
        <p class="has-text-color" style="color:#707070"><em>' . esc_html_x( 'Cras sodales luctus arcu, ac placerat nunc sagittis a. In at turpis ac nibh luctus sagittis in ut est, sodales luctus arcu, ac placerat nunc', 'Theme starter content', 'liber' ) . '</em></p>
        <!-- /wp:paragraph -->
        
        <!-- wp:heading {"level":4,"className":"liber-price","backgroundColor":"green","fontSize":"medium","style":{"color":{"text":"#ffffff"}}} -->
        <h4 class="liber-price has-green-background-color has-text-color has-background has-medium-font-size" style="color:#ffffff">' . esc_html_x( '8,00€', 'Theme starter content', 'liber' ) . '</h4>
        <!-- /wp:heading --></div>
        <!-- /wp:column --></div>
        <!-- /wp:columns --></div></div>
        <!-- /wp:group -->',

		'viewportWidth'	=> 1400,
		'categories'	=> array( 'liber-theme' ),
	)
);

register_block_pattern(
	'liber/liber-classic-menu',
	array(
		'title'			=> esc_html__( 'Classic Menu Section', 'liber' ),
		'description'	=> esc_html_x( 'A pattern to quickly create classic menu section.', 'Block pattern description', 'liber' ),

		'content'		=> '<!-- wp:group -->
        <div class="wp-block-group"><div class="wp-block-group__inner-container"><!-- wp:columns -->
        <div class="wp-block-columns"><!-- wp:column -->
        <div class="wp-block-column"><!-- wp:image {"id":903,"sizeSlug":"large","linkDestination":"none"} -->
        <figure class="wp-block-image size-large"><img src="' . esc_url( get_theme_file_uri( 'images/menu-1.jpg' ) ) . '" alt="img" class="wp-image-903"/></figure>
        <!-- /wp:image -->
        
        <!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"34px"}}} -->
        <h3 style="font-size:34px">' . esc_html_x( 'Fitness Smoothie', 'Theme starter content', 'liber' ) . '</h3>
        <!-- /wp:heading -->
        
        <!-- wp:paragraph {"style":{"color":{"text":"#707070"}}} -->
        <p class="has-text-color" style="color:#707070"><em>' . esc_html_x( 'Cras sodales luctus arcu, ac placerat nunc sagittis a. In at turpis ac nibh luctus sagittis in ut est, sodales luctus arcu, ac placerat nunc', 'Theme starter content', 'liber' ) . '</em></p>
         <!-- /wp:paragraph -->
        
        <!-- wp:heading {"level":4,"className":"liber-price","backgroundColor":"green","fontSize":"medium","style":{"color":{"text":"#ffffff"}}} -->
        <h4 class="liber-price has-green-background-color has-text-color has-background has-medium-font-size" style="color:#ffffff">7,00€</h4>
        <!-- /wp:heading -->
        
        <!-- wp:spacer {"height":60} -->
        <div style="height:60px" aria-hidden="true" class="wp-block-spacer"></div>
        <!-- /wp:spacer -->
        
        <!-- wp:image {"id":905,"sizeSlug":"large","linkDestination":"none"} -->
        <figure class="wp-block-image size-large"><img src="' . esc_url( get_theme_file_uri( 'images/menu-2.jpg' ) ) . '" alt="img" class="wp-image-905"/></figure>
        <!-- /wp:image -->
        
        <!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"34px"}}} -->
        <h3 style="font-size:34px">' . esc_html_x( 'Pinky Smoothie', 'Theme starter content', 'liber' ) . '</h3>
        <!-- /wp:heading -->
        
        <!-- wp:paragraph {"style":{"color":{"text":"#707070"}}} -->
        <p class="has-text-color" style="color:#707070"><em>' . esc_html_x( 'Cras sodales luctus arcu, ac placerat nunc sagittis a. In at turpis ac nibh luctus sagittis in ut est, sodales luctus arcu, ac placerat nunc', 'Theme starter content', 'liber' ) . '</em></p>
         <!-- /wp:paragraph -->
        
        <!-- wp:heading {"level":4,"className":"liber-price","backgroundColor":"green","fontSize":"medium","style":{"color":{"text":"#ffffff"}}} -->
        <h4 class="liber-price has-green-background-color has-text-color has-background has-medium-font-size" style="color:#ffffff">7,00€</h4>
        <!-- /wp:heading --></div>
        <!-- /wp:column -->
        
        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:image {"id":902,"sizeSlug":"large","linkDestination":"none"} -->
        <figure class="wp-block-image size-large"><img src="' . esc_url( get_theme_file_uri( 'images/menu-3.jpg' ) ) . '" alt="img" class="wp-image-902"/></figure>
        <!-- /wp:image -->
        
        <!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"34px"}}} -->
        <h3 style="font-size:34px">' . esc_html_x( 'Fresh Smoothie', 'Theme starter content', 'liber' ) . '</h3>
        <!-- /wp:heading -->
        
        <!-- wp:paragraph {"style":{"color":{"text":"#707070"}}} -->
        <p class="has-text-color" style="color:#707070"><em>' . esc_html_x( 'Cras sodales luctus arcu, ac placerat nunc sagittis a. In at turpis ac nibh luctus sagittis in ut est, sodales luctus arcu, ac placerat nunc', 'Theme starter content', 'liber' ) . '</em></p>
         <!-- /wp:paragraph -->
        
        <!-- wp:heading {"level":4,"className":"liber-price","backgroundColor":"green","fontSize":"medium","style":{"color":{"text":"#ffffff"}}} -->
        <h4 class="liber-price has-green-background-color has-text-color has-background has-medium-font-size" style="color:#ffffff">7,00€</h4>
        <!-- /wp:heading -->
        
        <!-- wp:spacer {"height":60} -->
        <div style="height:60px" aria-hidden="true" class="wp-block-spacer"></div>
        <!-- /wp:spacer -->
        
        <!-- wp:image {"id":906,"sizeSlug":"large","linkDestination":"none"} -->
        <figure class="wp-block-image size-large"><img src="' . esc_url( get_theme_file_uri( 'images/menu-4.jpg' ) ) . '" alt="img" class="wp-image-906"/></figure>
        <!-- /wp:image -->
        
        <!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"34px"}}} -->
        <h3 style="font-size:34px">' . esc_html_x( 'Strawberries Smoothie', 'Theme starter content', 'liber' ) . '</h3>
        <!-- /wp:heading -->
        
        <!-- wp:paragraph {"style":{"color":{"text":"#707070"}}} -->
        <p class="has-text-color" style="color:#707070"><em>' . esc_html_x( 'Cras sodales luctus arcu, ac placerat nunc sagittis a. In at turpis ac nibh luctus sagittis in ut est, sodales luctus arcu, ac placerat nunc', 'Theme starter content', 'liber' ) . '</em></p>
         <!-- /wp:paragraph -->
        
        <!-- wp:heading {"level":4,"className":"liber-price","backgroundColor":"green","fontSize":"medium","style":{"color":{"text":"#ffffff"}}} -->
        <h4 class="liber-price has-green-background-color has-text-color has-background has-medium-font-size" style="color:#ffffff">7,00€</h4>
        <!-- /wp:heading --></div>
        <!-- /wp:column -->
        
        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:image {"id":904,"sizeSlug":"large","linkDestination":"none"} -->
        <figure class="wp-block-image size-large"><img src="' . esc_url( get_theme_file_uri( 'images/menu-5.jpg' ) ) . '" alt="img" class="wp-image-904"/></figure>
        <!-- /wp:image -->
        
        <!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"34px"}}} -->
        <h3 style="font-size:34px">' . esc_html_x( 'Power Smoothie', 'Theme starter content', 'liber' ) . '</h3>
        <!-- /wp:heading -->
        
        <!-- wp:paragraph {"style":{"color":{"text":"#707070"}}} -->
        <p class="has-text-color" style="color:#707070"><em>Cras sodales luctus arcu, ac placerat nunc sagittis a. In at turpis ac nibh luctus sagittis in ut est, sodales luctus arcu, ac placerat nunc</em></p>
        <!-- /wp:paragraph -->
        
        <!-- wp:heading {"level":4,"className":"liber-price","backgroundColor":"green","fontSize":"medium","style":{"color":{"text":"#ffffff"}}} -->
        <h4 class="liber-price has-green-background-color has-text-color has-background has-medium-font-size" style="color:#ffffff">7,00€</h4>
        <!-- /wp:heading -->
        
        <!-- wp:spacer {"height":60} -->
        <div style="height:60px" aria-hidden="true" class="wp-block-spacer"></div>
        <!-- /wp:spacer -->
        
        <!-- wp:image {"id":907,"sizeSlug":"large","linkDestination":"none"} -->
        <figure class="wp-block-image size-large"><img src="' . esc_url( get_theme_file_uri( 'images/menu-6.jpg' ) ) . '" alt="img" class="wp-image-907"/></figure>
        <!-- /wp:image -->
        
        <!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"34px"}}} -->
        <h3 style="font-size:34px">' . esc_html_x( 'Energy Smoothie', 'Theme starter content', 'liber' ) . '</h3>
        <!-- /wp:heading -->
        
        <!-- wp:paragraph {"style":{"color":{"text":"#707070"}}} -->
        <p class="has-text-color" style="color:#707070"><em>Cras sodales luctus arcu, ac placerat nunc sagittis a. In at turpis ac nibh luctus sagittis in ut est, sodales luctus arcu, ac placerat nunc</em></p>
        <!-- /wp:paragraph -->
        
        <!-- wp:heading {"level":4,"className":"liber-price","backgroundColor":"green","fontSize":"medium","style":{"color":{"text":"#ffffff"}}} -->
        <h4 class="liber-price has-green-background-color has-text-color has-background has-medium-font-size" style="color:#ffffff">7,00€</h4>
        <!-- /wp:heading --></div>
        <!-- /wp:column --></div>
        <!-- /wp:columns --></div></div>
        <!-- /wp:group -->',

		'viewportWidth'	=> 1400,
		'categories'	=> array( 'liber-theme' ),
	)
);