<?php
//////////////////////////////////////////////////////////////////
// Customizer - Add CSS
//////////////////////////////////////////////////////////////////
function liber_customizer_custom_css() {
	?>
	<style type="text/css">
			#page-hero:before { opacity: <?php echo get_theme_mod( 'liber_overlay_inner' ); ?>;}
			@media screen and (min-width: 768px) {
				.overlay-bg { opacity: <?php echo get_theme_mod( 'liber_overlay' ); ?>;}
				body .liber-panel1 .panels .recent-post { margin-bottom: <?php echo get_theme_mod( 'liber_panel1_post_margin_bottom' ); ?>px;}
				body .liber-panel1 .panels .recent-post { margin-top: <?php echo get_theme_mod( 'liber_panel1_post_margin_top' ); ?>px;}
				body .liber-panel2 .panels .recent-post { margin-bottom: <?php echo get_theme_mod( 'liber_panel2_post_margin_bottom' ); ?>px;}
				body .liber-panel2 .panels .recent-post { margin-top: <?php echo get_theme_mod( 'liber_panel2_post_margin_top' ); ?>px;}
				body .liber-panel3 .panels .recent-post { margin-bottom: <?php echo get_theme_mod( 'liber_panel3_post_margin_bottom' ); ?>px;}
				body .liber-panel3 .panels .recent-post { margin-top: <?php echo get_theme_mod( 'liber_panel3_post_margin_top' ); ?>px;}
				body .liber-panel4 .panels .recent-post { margin-bottom: <?php echo get_theme_mod( 'liber_panel4_post_margin_bottom' ); ?>px;}
				body .liber-panel4 .panels .recent-post { margin-top: <?php echo get_theme_mod( 'liber_panel4_post_margin_top' ); ?>px;}
				body .liber-panel5 .panels .recent-post { margin-bottom: <?php echo get_theme_mod( 'liber_panel5_post_margin_bottom' ); ?>px;}
				body .liber-panel5 .panels .recent-post { margin-top: <?php echo get_theme_mod( 'liber_panel5_post_margin_top' ); ?>px;}
				
				body .liber-panel1 .panels .special-offer { margin-bottom: <?php echo get_theme_mod( 'liber_panel1_menu_margin_bottom' ); ?>px;}
				body .liber-panel1 .panels .special-offer { margin-top: <?php echo get_theme_mod( 'liber_panel1_menu_margin_top' ); ?>px;}
				body .liber-panel2 .panels .special-offer { margin-bottom: <?php echo get_theme_mod( 'liber_panel2_menu_margin_bottom' ); ?>px;}
				body .liber-panel2 .panels .special-offer { margin-top: <?php echo get_theme_mod( 'liber_panel2_menu_margin_top' ); ?>px;}
				body .liber-panel3 .panels .special-offer { margin-bottom: <?php echo get_theme_mod( 'liber_panel3_menu_margin_bottom' ); ?>px;}
				body .liber-panel3 .panels .special-offer { margin-top: <?php echo get_theme_mod( 'liber_panel3_menu_margin_top' ); ?>px;}
				body .liber-panel4 .panels .special-offer { margin-bottom: <?php echo get_theme_mod( 'liber_panel4_menu_margin_bottom' ); ?>px;}
				body .liber-panel4 .panels .special-offer { margin-top: <?php echo get_theme_mod( 'liber_panel4_menu_margin_top' ); ?>px;}
				body .liber-panel5 .panels .special-offer { margin-bottom: <?php echo get_theme_mod( 'liber_panel5_menu_margin_bottom' ); ?>px;}
				body .liber-panel5 .panels .special-offer { margin-top: <?php echo get_theme_mod( 'liber_panel5_menu_margin_top' ); ?>px;}

				body .liber-panel1 .panels .testimonials { margin-bottom: <?php echo get_theme_mod( 'liber_panel1_testimonials_margin_bottom' ); ?>px;}
				body .liber-panel1 .panels .testimonials { margin-top: <?php echo get_theme_mod( 'liber_panel1_testimonials_margin_top' ); ?>px;}
				body .liber-panel2 .panels .testimonials { margin-bottom: <?php echo get_theme_mod( 'liber_panel2_testimonials_margin_bottom' ); ?>px;}
				body .liber-panel2 .panels .testimonials { margin-top: <?php echo get_theme_mod( 'liber_panel2_testimonials_margin_top' ); ?>px;}
				body .liber-panel3 .panels .testimonials { margin-bottom: <?php echo get_theme_mod( 'liber_panel3_testimonials_margin_bottom' ); ?>px;}
				body .liber-panel3 .panels .testimonials { margin-top: <?php echo get_theme_mod( 'liber_panel3_testimonials_margin_top' ); ?>px;}
				body .liber-panel4 .panels .testimonials { margin-bottom: <?php echo get_theme_mod( 'liber_panel4_testimonials_margin_bottom' ); ?>px;}
				body .liber-panel4 .panels .testimonials { margin-top: <?php echo get_theme_mod( 'liber_panel4_testimonials_margin_top' ); ?>px;}
				body .liber-panel5 .panels .testimonials { margin-bottom: <?php echo get_theme_mod( 'liber_panel5_testimonials_margin_bottom' ); ?>px;}
				body .liber-panel5 .panels .testimonials { margin-top: <?php echo get_theme_mod( 'liber_panel5_testimonials_margin_top' ); ?>px;}
			}
			.overlay-bg { background:<?php echo get_theme_mod( 'liber_overlay_color' ); ?>; }
			.hero-container-outer { background:<?php echo get_theme_mod( 'liber_caption_bg' ); ?>; }
			.front-page-content-area .entry-title, .hero-container-inner .entry-content, .hero-container-inner .entry-content a.button, .hero-container-inner .entry-content h2 { color:<?php echo get_theme_mod( 'liber_caption_text' ); ?>; }
			.featured-slider .caption-innen:after { background:<?php echo get_theme_mod( 'liber_featured_slider_caption_opacity_color' ); ?>; }
			.featured-slider .caption-innen:after { opacity: <?php echo get_theme_mod( 'liber_featured_slider_caption_opacity' ); ?>;}
			.featured-slider .entry-title a, .featured-slider .caption-innen, .featured-slider .caption .category a { color:<?php echo get_theme_mod( 'liber_featured_slider_caption_text_color' ); ?>; }
			.featured-slider .entry-title a:hover { border-color:<?php echo get_theme_mod( 'liber_featured_slider_caption_text_color' ); ?>; }
			.featured-slider .caption-innen { max-width:<?php echo get_theme_mod( 'liber_featured_slider_caption_width' ); ?>%; }

			.featured-slider .caption-innen:after { background:<?php echo get_theme_mod( 'liber_featured_slider_caption_opacity_color_blog' ); ?>; }
			.featured-slider .caption-innen:after { opacity: <?php echo get_theme_mod( 'liber_featured_slider_caption_opacity_blog' ); ?>;}
			.featured-slider .entry-title a, .featured-slider .caption-innen, .featured-slider .caption .category a { color:<?php echo get_theme_mod( 'liber_featured_slider_caption_text_color_blog' ); ?>; }
			.featured-slider .entry-title a:hover { border-color:<?php echo get_theme_mod( 'liber_featured_slider_caption_text_color_blog' ); ?>; }
			.featured-slider .caption-innen { max-width:<?php echo get_theme_mod( 'liber_featured_slider_caption_width_blog' ); ?>%; }
			.site-header { background-color:<?php echo get_theme_mod( 'liber_header_background_color' ); ?>; }

			.site-title a, .site-description, .main-navigation a, .site-header p.site-info, .main-navigation li.color a, .social-links ul a:hover:before, .secondary-navigation .main-navigation a,
			.main-navigation ul ul a, .menu-toggle { color:<?php echo get_theme_mod( 'liber_header_elements_text' ); ?>; }
			.main-navigation li.color a:hover { border-color:<?php echo get_theme_mod( 'liber_header_elements_text' ); ?>; }
			.secondary-menu, .main-navigation.toggled .sub-menu li  a { border-color:<?php echo get_theme_mod( 'liber_header_elements_borders' ); ?>; }
			body .liber-panel1, .liber-panel1 .testimonials .post-thumbnail img, .liber-panel1 .overlay-bg, .liber-panel1 .special-offer { background:<?php echo get_theme_mod( 'liber_panel1_background' ); ?>; }
			body .liber-panel1, body .liber-panel1 .entry-title a, body .liber-panel1 blockquote, body .liber-panel1 .entry-title, .liber-panel1 .panels .title-tagline, 
			body .liber-panel1 .recent-post .posted-on .date, .liber-panel1 a:hover, body .liber-panel1 .child-pages .button, body .liber-panel1 .button, body .liber-panel1 .recent-post.list .entry-meta,
			body .liber-panel1 .recent-post.list .more-link { color:<?php echo get_theme_mod( 'liber_panel1_text_color' ); ?>; }
			.liber-panel1 .special-offer, .liber-panel1 .recent-post .entry-header, .liber-panel1 .recent-post .posted-on, .liber-panel1 a:hover, body .liber-panel1 .recent-post.list .more-link:hover { border-color:<?php echo get_theme_mod( 'liber_panel1_text_color' ); ?>; }
			body .half-width-image .liber-panel1, body .box-style .liber-panel1 .page-wrap, body .half-width-image-left .liber-panel1 { background:<?php echo get_theme_mod( 'liber_panel1_elements_half' ); ?>; }
			body .liber-panel1 .testimonials .entry-content { border-color:<?php echo get_theme_mod( 'liber_panel1_elements_testimonials' ); ?>; }

			body .liber-panel2, .liber-panel2 .testimonials .post-thumbnail img, .liber-panel2 .overlay-bg, .liber-panel2 .special-offer { background:<?php echo get_theme_mod( 'liber_panel2_background' ); ?>; }
			body .liber-panel2, body .liber-panel2 .entry-title a, body .liber-panel2 blockquote, body .liber-panel2 .entry-title, .liber-panel2 .panels .title-tagline, 
			body .liber-panel2 .recent-post .posted-on .date, .liber-panel2 a:hover, body .liber-panel2 .child-pages .button, body .liber-panel2 .button, body .liber-panel2 .recent-post.list .entry-meta,
			body .liber-panel2 .recent-post.list .more-link { color:<?php echo get_theme_mod( 'liber_panel2_text_color' ); ?>; }
			.liber-panel2 .special-offer, .liber-panel2 .recent-post .entry-header, .liber-panel2 .recent-post .posted-on, .liber-panel2 a:hover, body .liber-panel2 .recent-post.list .more-link:hover { border-color:<?php echo get_theme_mod( 'liber_panel2_text_color' ); ?>; }
			body .half-width-image .liber-panel2, body .box-style .liber-panel2 .page-wrap, body .half-width-image-left .liber-panel2 { background:<?php echo get_theme_mod( 'liber_panel2_elements_half' ); ?>; }
			body .liber-panel2 .testimonials .entry-content { border-color:<?php echo get_theme_mod( 'liber_panel2_elements_testimonials' ); ?>; }

			body .liber-panel3, .liber-panel3 .testimonials .post-thumbnail img, .liber-panel3 .overlay-bg, .liber-panel3 .special-offer { background:<?php echo get_theme_mod( 'liber_panel3_background' ); ?>; }
			body .liber-panel3, body .liber-panel3 .entry-title a, body .liber-panel3 blockquote, body .liber-panel3 .entry-title, .liber-panel3 .panels .title-tagline, 
			body .liber-panel3 .recent-post .posted-on .date, .liber-panel3 a:hover, body .liber-panel3 .child-pages .button, body .liber-panel3 .button, body .liber-panel3 .recent-post.list .entry-meta,
			body .liber-panel3 .recent-post.list .more-link { color:<?php echo get_theme_mod( 'liber_panel3_text_color' ); ?>; }
			.liber-panel3 .special-offer, .liber-panel3 .recent-post .entry-header, .liber-panel3 .recent-post .posted-on, .liber-panel3 a:hover, body .liber-panel3 .recent-post.list .more-link:hover { border-color:<?php echo get_theme_mod( 'liber_panel3_text_color' ); ?>; }
			body .half-width-image .liber-panel3, body .box-style .liber-panel3 .page-wrap, body .half-width-image-left .liber-panel3 { background:<?php echo get_theme_mod( 'liber_panel3_elements_half' ); ?>; }
			body .liber-panel3 .testimonials .entry-content { border-color:<?php echo get_theme_mod( 'liber_panel3_elements_testimonials' ); ?>; }

			body .liber-panel4, .liber-panel4 .testimonials .post-thumbnail img, .liber-panel4 .overlay-bg, .liber-panel4 .special-offer { background:<?php echo get_theme_mod( 'liber_panel4_background' ); ?>; }
			body .liber-panel4, body .liber-panel4 .entry-title a, body .liber-panel4 blockquote, body .liber-panel4 .entry-title, .liber-panel4 .panels .title-tagline, 
			body .liber-panel4 .recent-post .posted-on .date, .liber-panel4 a:hover, body .liber-panel4 .child-pages .button, body .liber-panel4 .button, body .liber-panel4 .recent-post.list .entry-meta,
			body .liber-panel4 .recent-post.list .more-link { color:<?php echo get_theme_mod( 'liber_panel4_text_color' ); ?>; }
			.liber-panel4 .special-offer, .liber-panel4 .recent-post .entry-header, .liber-panel4 .recent-post .posted-on, .liber-panel4 a:hover, body .liber-panel4 .recent-post.list .more-link:hover { border-color:<?php echo get_theme_mod( 'liber_panel4_text_color' ); ?>; }
			body .half-width-image .liber-panel4, body .box-style .liber-panel4 .page-wrap, body .half-width-image-left .liber-panel4 { background:<?php echo get_theme_mod( 'liber_panel4_elements_half' ); ?>; }
			body .liber-panel4 .testimonials .entry-content { border-color:<?php echo get_theme_mod( 'liber_panel4_elements_testimonials' ); ?>; }

			body .liber-panel5, .liber-panel5 .testimonials .post-thumbnail img, .liber-panel5 .overlay-bg, .liber-panel5 .special-offer { background:<?php echo get_theme_mod( 'liber_panel5_background' ); ?>; }
			body .liber-panel5, body .liber-panel5 .entry-title a, body .liber-panel5 blockquote, body .liber-panel5 .entry-title, .liber-panel5 .panels .title-tagline, 
			body .liber-panel5 .recent-post .posted-on .date, .liber-panel5 a:hover, body .liber-panel5 .child-pages .button, body .liber-panel5 .button, body .liber-panel5 .recent-post.list .entry-meta,
			body .liber-panel5 .recent-post.list .more-link { color:<?php echo get_theme_mod( 'liber_panel5_text_color' ); ?>; }
			.liber-panel5 .special-offer, .liber-panel5 .recent-post .entry-header, .liber-panel5 .recent-post .posted-on, .liber-panel5 a:hover, body .liber-panel5 .recent-post.list .more-link:hover { border-color:<?php echo get_theme_mod( 'liber_panel5_text_color' ); ?>; }
			body .half-width-image .liber-panel5, body .box-style .liber-panel5 .page-wrap, body .half-width-image-left .liber-panel5 { background:<?php echo get_theme_mod( 'liber_panel5_elements_half' ); ?>; }
			body .liber-panel5 .testimonials .entry-content { border-color:<?php echo get_theme_mod( 'liber_panel5_elements_testimonials' ); ?>; }

			.pre-footer:after, .pre-footer .liber-panel .special-offer { background:<?php echo get_theme_mod( 'liber_footer_background' ); ?>; }
			.pre-footer, .footer-widget-area .widget-title { color:<?php echo get_theme_mod( 'liber_footer_text_color' ); ?>; }
			.pre-footer a:hover { border-color:<?php echo get_theme_mod( 'liber_footer_text_color' ); ?>; }
			.footer-widget-area .widget ul > li, .footer-widget-area .widget ol > li, .pre-footer .widget.widget_liber_opening_hours ul > li, .pre-footer .widget.widget_liber_opening_hours ol > li { border-color:<?php echo get_theme_mod( 'liber_footer_border_color' ); ?>; }

			.site-footer { background:<?php echo get_theme_mod( 'liber_copyright_background' ); ?>; }
			.site-footer .site-info { border-color:<?php echo get_theme_mod( 'liber_copyright_border' ); ?>; }

			.pre-footer .image-banner .button, .featured-slider .caption .category a, .category-block h2:after,
			.grid-item-menu span.menu-price, .page-template-menu-one-page h2:after, .page-template-menu-page h2:after, .page-template-menu-two-page h2:after, .page-template-menu-one-page .grid-item-menu span.menu-price, .featured-post, time.entry-date.published, .image-banner .button,
			.woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce span.onsale, body a.ig-b-v-24:hover { background:<?php echo get_theme_mod( 'liber_colors_accent' ); ?>; }
 
			.liber-panel .child-pages .entry-content:after, .liber-panel .entry-title a:hover, .pre-footer .opening-hours, a.scroll-to-top, .main-navigation li.color a, .hero-container-inner .entry-content a.button,
			.rtb-booking-form button, input[type='button'], input[type='reset'], input[type='submit'], .page-template-menu-one-page .button, .page-template-menu-page .button, .button, .opening-hours,
			.page-template-grid-page #primary .opening-hours ul li, .page-template-sidebar-page #primary .opening-hours ul li, .page-template-menu-two-page .grid-item-menu span.menu-price, .tax-menu_category .grid-item-menu.two span.menu-price, .tax-menu_category span.page-numbers.current, 
			.tax-menu_category .page-numbers, .blog .more-link, .single .more-link, .archive .more-link, .recent-post.list .more-link, .entry-title a:hover, body a.ig-b-v-24, .woocommerce #respond input#submit, .woocommerce a.button, 
			.woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,
			.woocommerce .woocommerce-message, .woocommerce .woocommerce-info, .home.page .edit-link a, .page .edit-link a, body a.ig-b-v-24, body a.ig-b-v-24:hover:hover, blockquote, body .type-menu .more-link { border-color:<?php echo get_theme_mod( 'liber_colors_accent' ); ?>; }

			a, .blog .more-link:hover, .single .more-link:hover, .archive .more-link:hover, .recent-post.list .more-link:hover, .rtb-booking-form button:hover, input[type='button']:hover, input[type='reset']:hover, input[type='submit']:hover,
			.page-template-menu-one-page .button:hover, .page-template-menu-page .button:hover, .main-navigation li.color a, .main-navigation li.color a:hover, .main-navigation a:hover, .main-navigation ul >:hover > a, .main-navigation ul > .focus > a,
			.main-navigation li.current_page_item > a, .main-navigation li.current-menu-item > a, .main-navigation li.current_page_ancestor > a, .main-navigation li.current-menu-ancestor > a, .menu-toggle:hover, .menu-toggle:focus, .social-links ul a:before,
			.post-navigation, .paging-navigation, [class*='navigation'] .nav-previous:before, [class*='navigation'] .nav-next:after, .secondary-menu p.site-info:before, .color, .scroll-to-top:before, .entry-title a:hover, .blog .entry-meta a:before,
			.single .entry-meta a:before, .archive .entry-meta a:before, .search .entry-meta a:before, .post-template-recipe-page .cat-links:before, ul.slick-dots .slick-active button, .front-page-content-area h4, .liber-panel .special-offer .menu-price,
			.liber-panel .testimonials h3.entry-title, .page-template-grid-page ul li.twitter:before, .page-template-grid-page ul li.facebook:before, .page-template-grid-page ul li.mail:before, .page-template-grid-page ul li.tel:before,
			.page-template-sidebar-page ul li.twitter:before, .page-template-sidebar-page ul li.facebook:before, .page-template-sidebar-page ul li.mail:before, .page-template-sidebar-page ul li.tel:before, .grid-item-menu .more-link,
			.page-template-menu-two-page .grid-item-menu span.menu-price, .tax-menu_category .grid-item-menu.two span.menu-price, blockquote cite, .comment-metadata a, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,
			.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce .woocommerce-message:before, .woocommerce .woocommerce-info:before,
			.woocommerce .star-rating span:before, .woocommerce .star-rating:before, .hero-container-inner .entry-content a.button:hover, .button:hover, body .type-menu .more-link:hover { color:<?php echo get_theme_mod( 'liber_colors_accent' ); ?>; }
			
			body a.ig-b-v-24 { color:<?php echo get_theme_mod( 'liber_colors_accent' ); ?>!important; }
			
			#content, .content-wrapper, .blog .site, .archive .site, .search .site, .single-post .site, .single-product .site { background:<?php echo get_theme_mod( 'liber_content_bg_color' ); ?>; }
			
			mark, body, button, input, select, textarea, .rtb-booking-form button, input[type='button'], input[type='reset'], input[type='submit'], .page-template-menu-one-page .button, .page-template-menu-page .button, .button, .blog .more-link,
			.single .more-link, .archive .more-link, .recent-post.list .more-link, .front-widget-area .widget-title, .sidebar-widget-area .widget-title, .site-title a, .site-footer .site-info, .archive .page-title, .search .page-title,
			.page-title, .entry-title, .entry-title a, .featured-slider button.slick-prev:after, .featured-slider button.slick-next:after, .featured-slider button.slick-prev:after, .featured-slider button.slick-next:after,
			ul.slick-dots button, .grid-item-menu .more-link:hover, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, 
			.woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce-checkout #payment div.payment_box, .woocommerce .woocommerce-breadcrumb a, .woocommerce .woocommerce-breadcrumb,
			.woocommerce ul.products li.product h3, button, input, select, textarea, .post-navigation a:hover, .paging-navigation a:hover, .comment-navigation a:hover, .image-banner .title-tagline, .recent-post.list .entry-meta, .page .edit-link a,
			.flexcontainer .grid-item h4, .page-template-sidebar-page #primary .box h4, .page-template-grid-page #primary .box h4, .page-template-grid-page .special-offer, .page-template-sidebar-page .special-offer, .grid-item-menu .menu-content, .comment-meta a:hover,
			.comment-metadata a:hover, a:hover, a:focus, a:active, .woocommerce div.product .woocommerce-tabs ul.tabs li a, .rtb-booking-form legend, .woocommerce-error, .woocommerce-info, .woocommerce-message, body .type-menu .more-link { color:<?php echo get_theme_mod( 'liber_content_text_color' ); ?>; }
			
			.image-banner .button:hover { background:<?php echo get_theme_mod( 'liber_content_text_color' ); ?>; }
			
			.blog .more-link:hover, .single .more-link:hover, .archive .more-link:hover, .recent-post.list .more-link:hover, .rtb-booking-form button:hover, input[type='button']:hover, input[type='reset']:hover, input[type='submit']:hover, 
			.button:hover, .page-template-menu-one-page .button:hover, .page-template-menu-page .button:hover, .hero-container-inner .entry-content a.button:hover, a:hover, a:focus, a:active, a.scroll-to-top:hover, .special-offer,
			.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, 
			.woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .front-widgets .textwidget h4, body .type-menu .more-link:hover { border-color:<?php echo get_theme_mod( 'liber_content_black_border_color' ); ?>; }
			
			#instagram, .front-widget-area .rtb-booking-form select, .sidebar-widget-area .widget_rtb_booking_form_widget select, .author-info .avatar, .author-description, .blog .post.format-quote.hentry, .archive .post.format-quote.hentry,
			.featured-slider .slider-navigation, .comment-list, .comment-list .children, .comment-respond, .page .edit-link a, .special-offer, .page-template-menu-one-page .box, .page-template-menu-page .box,
			.page-template-menu-two-page .box, .rtb-booking-form fieldset, .woocommerce .woocommerce-ordering select, .woocommerce #reviews #comments ol.commentlist li .comment-text, .page-template-menu-one-page .grid-item-menu,
			.woocommerce div.product .woocommerce-tabs ul.tabs li.active, .front-widgets .widget_mc4wp_form_widget input[type="email"], .front-widgets .mc4wp-form-fields input[type="email"], .woocommerce .quantity .qty { background:<?php echo get_theme_mod( 'liber_content_white_background_color' ); ?>; }
			
			.featured-slider:after { border-color:<?php echo get_theme_mod( 'liber_content_white_background_color' ); ?>; }
			
			.image-banner .button:hover { color:<?php echo get_theme_mod( 'liber_content_white_background_color' ); ?>; }
			
			.widget_liber_food_menu_post .special-offer, .sidebar-widget-area .widget_mc4wp_form_widget, .top .widget_mc4wp_form_widget, .sidebar-widget-area .widget_rtb_booking_form_widget fieldset, .site-content .sticky,
			.author-info, .titlecomment, .post-template-recipe-page article ol, .post-related, body .wpcf7, .rtb-booking-form, .comments-area, .comment-meta .fn, .woocommerce div.product .woocommerce-tabs .panel, form.checkout.woocommerce-checkout,
			.woocommerce-error, .woocommerce-info, .woocommerce-message, .page-template-grid-page #primary .box, .page-template-sidebar-page #primary .box, th, .fixed-header .site-header.fixed .toggled #primary-menu { background:<?php echo get_theme_mod( 'liber_content_light_green_color' ); ?>; }
			
			.comment article { border-color:<?php echo get_theme_mod( 'liber_content_light_green_color' ); ?>; }
			
			input[type='text'], input[type='email'], input[type='password'], input[type='search'], input[type='url'], input[type='tel'], textarea, .post-navigation, .posts-navigation, .paging-navigation, .comment-navigation,
			.post-navigation .nav-next, .widget, .sidebar-widget-area .widget-title, .widget_search input[type=search], .front-widgets .widget_rtb_booking_form_widget, .front-widgets .rtb-booking-form fieldset,
			.front-widget-area .rtb-booking-form select, .widget.widget_liber_opening_hours ul > li, .widget.widget_liber_opening_hours ol > li, .widget_liber_food_menu_post .special-offer article, .top .widget_mc4wp_form_widget .widget-title,
			.sidebar-widget-area .widget_rtb_booking_form_widget fieldset, .sidebar-widget-area .widget_rtb_booking_form_widget select, .blog .site-header, .single-post .site-header, .archive .site-header, .search .site-header,
			.single-product .site-header, .blog.two-row-boxed-header #content, .single-post.two-row-boxed-header #content, .archive.two-row-boxed-header #content, .search.two-row-boxed-header #content, .blog.center-header #content,
			.single-post.center-header #content, .archive.center-header #content, .search.center-header #content, .archive .page-header, .search .page-header, .entry-meta, .recent-post.list .entry-meta .date, .author-info, .author-info .avatar,
			.titlecomment, #page-hero.hero.quote .entry-meta, .post-template-recipe-page article .entry-body, .post-template-recipe-page article ol, .post-related, .page-template-grid-page ul.team, .page-template-sidebar-page ul.team,
			.page-template-grid-page ul.team li, .page-template-sidebar-page ul.team li, .page-template-menu-one-page .grid-item-menu, .rtb-booking-form fieldset, .comments-area, p.logged-in-as, .woocommerce div.product .woocommerce-tabs ul.tabs li,
			.woocommerce .content div.product .woocommerce-tabs ul.tabs li, .woocommerce div.product .woocommerce-tabs .panel, .woocommerce-checkout #payment, .woocommerce-checkout #payment ul.payment_methods, .woocommerce .quantity .qty,
			.woocommerce .woocommerce-ordering select, .woocommerce-cart table.cart td.actions .coupon .input-text, nav.woocommerce-breadcrumb a, .woocommerce .widget_shopping_cart .total, .woocommerce.widget_shopping_cart .total,
			.woocommerce .shop_table td, .woocommerce .shop_table th, .woocommerce ul.products li.product, .woocommerce-page ul.products li.product, .woocommerce #reviews #comments ol.commentlist li img.avatar, .woocommerce #reviews #comments ol.commentlist li .comment-text,
			.featured-slider .slick-dots li, .featured-slider button.slick-prev, input[type='text']:focus, input[type='email']:focus, input[type='password']:focus, input[type='search']:focus, input[type='url']:focus, input[type='tel']:focus, textarea:focus,
			.single.woocommerce.center-header #content, .woocommerce.center-header .content-wrapper, .error404 .content-wrapper, .liber-panel .testimonials .entry-content { border-color:<?php echo get_theme_mod( 'liber_content_light_green_border_color' ); ?>; }
			
			.woocommerce div.product .woocommerce-tabs ul.tabs li.active:before, .woocommerce div.product .woocommerce-tabs ul.tabs li:before, .woocommerce div.product .woocommerce-tabs ul.tabs li:after, .woocommerce div.product .woocommerce-tabs ul.tabs li.active:after { box-shadow: 0 0 0 <?php echo get_theme_mod( 'liber_content_light_green_border_color' ); ?>; }
			
			.woocommerce-cart table.cart td.actions .coupon .input-text { box-shadow: <?php echo get_theme_mod( 'liber_content_light_green_border_color' ); ?> 0 0 0; }
			.woocommerce-cart table.cart td.actions .coupon .input-text { -webkit-box-shadow: <?php echo get_theme_mod( 'liber_content_light_green_border_color' ); ?> 0 0 0; }
			.woocommerce-cart table.cart td.actions .coupon .input-text { -moz-box-shadow: <?php echo get_theme_mod( 'liber_content_light_green_border_color' ); ?> 0 0 0; }
			
			.front-widgets .rtb-booking-form fieldset, .front-widgets, .page-template-menu-one-page .flexcontainer, .woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content, .woocommerce #reviews #comments ol.commentlist li img.avatar, pre, ins { background:<?php echo get_theme_mod( 'liber_content_light_green_border_color' ); ?>; }
			
			#page-hero.hero { background-color:<?php echo get_theme_mod( 'liber_content_light_green_border_color' ); ?>; }
			
			#page-hero .entry-title, .blog #page-hero h1, .breadcrumbs, .category-top .category-title { color:<?php echo get_theme_mod( 'liber_content_page_title_color' ); ?>; }
			#page-hero:before, .breadcrumbs, body .category-top { background:<?php echo get_theme_mod( 'liber_content_page_title_bg_color' ); ?>; }
			
			@media screen and (min-width:768px) {
				.main-navigation ul ul { background:<?php echo get_theme_mod( 'liber_header_elements_submenu_bg' ); ?>; }
				.main-navigation ul ul { border-color:<?php echo get_theme_mod( 'liber_header_elements_submenu_border' ); ?>; }
				.liber-panel .child-pages .entry-content:after { border-color:<?php echo get_theme_mod( 'liber_colors_accent' ); ?>; }
				
				.archive.tax-menu_category .breadcrumbs { color:<?php echo get_theme_mod( 'liber_content_page_title_color' ); ?>; }
				
				#primary-menu > li:before, .main-navigation ul ul a:hover, .main-navigation ul ul > li.focus > a { color:<?php echo get_theme_mod( 'liber_colors_accent' ); ?>; }
				
				.blog.grid-three-blog-layout .grid-item article, .search.grid-three-blog-layout .grid-item article, .archive.grid-three-blog-layout .grid-item article, .blog.grid-two-blog-layout .grid-item article,
				.search.grid-two-blog-layout .grid-item article, .archive.grid-two-blog-layout .grid-item article, 	.archive .breadcrumbs, .search .breadcrumbs, .grid-item-menu .entry-content { border-color:<?php echo get_theme_mod( 'liber_content_light_green_border_color' ); ?>; }
			}
			
			@media screen and (max-width:767px) {
				.socials, .main-navigation.toggled, .center-header .menu-toggle { background:<?php echo get_theme_mod( 'liber_header_elements_submenu_bg' ); ?>; }

				p.site-info { background:<?php echo get_theme_mod( 'liber_content_light_green_color' ); ?>; }
				
				.hero-container-inner { background:<?php echo get_theme_mod( 'liber_caption_mobile_bg' ); ?>; }
				
				.liber-panel .child-pages .entry-content { border-color:<?php echo get_theme_mod( 'liber_content_light_green_border_color' ); ?>; }
			}
			
			
		<?php if(get_theme_mod( 'liber_shop_sidebar' )) : ?>
		.archive.woocommerce #secondary {
			display: none;
		}
		.archive.woocommerce .content-wrapper:not(.full-width) .content-area,
		.single-product.woocommerce-page.singular .content-wrapper:not(.full-width) .content-area {
			width: 100%;
		}
		<?php endif; ?>
		
		<?php if(get_theme_mod( 'liber_shop_single_sidebar' )) : ?>
		.single.woocommerce #secondary {
			display: none;
		}
		.single.woocommerce .content-wrapper:not(.full-width) .content-area {
			width: 100%;
		}
		.single.woocommerce .content-area {
			max-width: 100%;
		}
		<?php endif; ?>
		
		<?php if(get_theme_mod('liber_featured_slider_height') == 'height-auto' ) : ?>
		.home .featured-slider .post-thumbnail {
			max-height: inherit;
		}
		<?php else: ?>
		.home .featured-slider .post-thumbnail {
			max-height: 700px;
		}
		<?php endif; ?>


	</style>
	<?php
}
add_action( 'wp_head', 'liber_customizer_custom_css' );
?>