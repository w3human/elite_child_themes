<?php

/***** Theme Info Page *****/

if (!function_exists('liber_theme_info_page')) {
	function liber_theme_info_page() {
		add_theme_page(esc_html__('Welcome to Liber', 'liber'), esc_html__('Theme Info', 'liber'), 'edit_theme_options', 'blog', 'liber_display_theme_page');
	}
}
add_action('admin_menu', 'liber_theme_info_page');

if (!function_exists('liber_display_theme_page')) {
	function liber_display_theme_page() {
		$theme_data = wp_get_theme(); ?>
		<div class="theme-info-wrap">
			<h1>
				<?php printf(esc_html__('Welcome to %1s %2s', 'liber'), $theme_data->Name, $theme_data->Version); ?>
			</h1>

			<p>
				<a href="<?php echo esc_url('http://www.anarieldesign.com/themes/restaurant-bar-wordpress-theme/'); ?>" target="_blank" class="button button-primary">
					<?php esc_html_e('Find more about Liber', 'liber'); ?>
				</a>
			</p>
		<div class="ad-row clearfix">
			<div class="ad-col-1-2">
				<div class="section">
					<div class="theme-description">
						<?php echo esc_html($theme_data['Description']); ?>
					</div>
				</div>
			</div>
			<div class="ad-col-1-2">
				<img src="<?php echo get_template_directory_uri(); ?>/screenshot.png" alt="<?php esc_html_e('Theme Screenshot', 'liber'); ?>" />
			</div></div>
			<hr>
			<div id="getting-started" class="bg">
				<h3>
					<?php printf(esc_html__('Getting Started with %s', 'liber'), $theme_data->Name); ?>
				</h3>
				<div class="ad-row clearfix">
						<div class="section documentation">
							<h4>
								<?php esc_html_e('Theme Documentation', 'liber'); ?>
							</h4>
							<p class="about">
								<?php printf(esc_html__('Please check the documentation to get better overview of how the theme is structured.', 'liber'), $theme_data->Name); ?>
							</p>
							<p>
								<a href="<?php echo esc_url('http://www.anarieldesign.com/documentation/liber/'); ?>" target="_blank" class="button button-primary">
									<?php esc_html_e('Visit Documentation', 'liber'); ?>
								</a>
							</p>
						</div>
						<div class="section options">
							<h4>
								<?php esc_html_e('Theme Options', 'liber'); ?>
							</h4>
							<p class="about">
								<?php printf(esc_html__('Click "Customize" to open the Customizer. Liber has implemented Customizer and added some useful options to help you style color elements, upload image logo, to choose different blog layouts and a lot more.', 'liber'), $theme_data->Name); ?>
							</p>
							<p>
								<a href="<?php echo admin_url('customize.php'); ?>" class="button button-secondary">
									<?php esc_html_e('Customize', 'liber'); ?>
								</a>
							</p>
						</div>
						<div class="section video">
							<h4>
								<?php esc_html_e('Support Page', 'liber'); ?>
							</h4>
							<p class="about">
								<?php printf(esc_html__('There is a solution to every problem!', 'liber'), $theme_data->Name); ?>
							</p>
							<p>
								<a href="<?php echo esc_url('http://www.anarieldesign.com/support/'); ?>" class="button button-primary" target="_blank">
									<?php esc_html_e('Support Page', 'liber'); ?>
								</a>
							</p>
						</div>
						<div class="section options">
							<h4>
								<?php esc_html_e('Theme Update Logs', 'liber'); ?>
							</h4>
							<p class="about">
								<?php printf(esc_html__('View the full change log for our themes.', 'liber'), $theme_data->Name); ?>
							</p>
							<p>
								<a href="<?php echo esc_url('https://www.anarieldesign.com/theme-update-logs/'); ?>" class="button button-secondary" target="_blank">
									<?php esc_html_e('Theme Update Logs', 'liber'); ?>
								</a>

							</p>
						</div>
						<div class="section recommend clear">
							<h4>
								<?php esc_html_e('Recommended Plugins', 'liber'); ?>
							</h4>
							<p class="center"><?php esc_html_e('Plugins listed are not mandatory for theme to work! Install only the ones you need for your website!', 'liber'); ?></p>
							<!-- Instagram Widget by WPZOOM -->
							<div class="liber-tab-pane-half liber-tab-pane-first-half">
							<p><strong><?php esc_html_e( 'Instagram Widget by WPZOOM', 'liber' ); ?></strong></p>
							<p><?php esc_html_e( 'Fully customisable and responsive Instagram timeline widget for WordPress', 'liber' ); ?></p>

							<?php if ( is_plugin_active( 'instagram-widget-by-wpzoom/instagram-widget-by-wpzoom.php' ) ) { ?>

							<p><span class="liber-w-activated button"><?php esc_html_e( 'Already activated', 'liber' ); ?></span></p>

							<?php
							}
							else { ?>

							<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=instagram-widget-by-wpzoom' ), 'install-plugin_instagram-widget-by-wpzoom' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install Instagram Widget by WPZOOM', 'liber' ); ?></a></p>

							<?php
							}

							?>
							<!-- WooCommerce -->
							<p><strong><?php esc_html_e( 'WooCommerce', 'liber' ); ?></strong></p>
							<p><?php esc_html_e( 'An e-commerce toolkit that helps you sell anything. Beautifully.', 'liber' ); ?></p>

							<?php if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) { ?>

							<p><span class="liber-w-activated button"><?php esc_html_e( 'Already activated', 'liber' ); ?></span></p>

							<?php
							}
							else { ?>

							<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=woocommerce' ), 'install-plugin_woocommerce' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install WooCommerce', 'liber' ); ?></a></p>

							<?php
							}

							?>
							<!-- Widget Visibility -->
							<p><strong><?php esc_html_e( 'Widget Visibility', 'liber' ); ?></strong></p>
							<p><?php esc_html_e( 'Control what pages your widgets appear on.', 'liber' ); ?></p>

							<?php if ( is_plugin_active( 'widget-visibility-without-jetpack/widget-visibility-without-jetpack.php' ) ) { ?>

							<p><span class="liber-activated button"><?php esc_html_e( 'Already activated', 'liber' ); ?></span></p>

							<?php
							}
							else { ?>

							<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=widget-visibility-without-jetpack' ), 'install-plugin_widget-visibility-without-jetpack' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install Widget Visibility', 'liber' ); ?></a></p>

							<?php
							}

							?>
							<!-- Restaurant Reservations -->
							<p><strong><?php esc_html_e( 'Restaurant Reservations', 'liber' ); ?></strong></p>
							<p><?php esc_html_e( 'Accept restaurant reservations and bookings online.', 'liber' ); ?></p>

							<?php if ( is_plugin_active( 'restaurant-reservations/restaurant-reservations.php' ) ) { ?>

							<p><span class="liber-activated button"><?php esc_html_e( 'Already activated', 'liber' ); ?></span></p>

							<?php
							}
							else { ?>

							<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=restaurant-reservations' ), 'install-plugin_restaurant-reservations' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install Restaurant Reservations', 'liber' ); ?></a></p>

							<?php
							}

							?>
							<!-- Contact Form 7 -->
							<p><strong><?php esc_html_e( 'Contact Form 7', 'liber' ); ?></strong></p>
							<p><?php esc_html_e( 'Just another contact form plugin. Simple but flexible.', 'liber' ); ?></p>

							<?php if ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) { ?>

							<p><span class="liber-activated button"><?php esc_html_e( 'Already activated', 'liber' ); ?></span></p>

							<?php
							}
							else { ?>

							<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=contact-form-7' ), 'install-plugin_contact-form-7' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install Contact Form 7', 'liber' ); ?></a></p>

							<?php
							}

							?>

							<!-- Breadcrumb NavXT -->
							<p><strong><?php esc_html_e( 'Breadcrumb NavXT', 'liber' ); ?></strong></p>
							<p><?php esc_html_e( 'Adds a breadcrumb navigation showing the visitor path to their current location. For details on how to use this plugin visit Breadcrumb NavXT.', 'liber' ); ?></p>

							<?php if ( is_plugin_active( 'breadcrumb-navxt/breadcrumb-navxt.php' ) ) { ?>

							<p><span class="liber-activated button"><?php esc_html_e( 'Already activated', 'liber' ); ?></span></p>

							<?php
							}
							else { ?>

							<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=breadcrumb-navxt' ), 'install-plugin_breadcrumb-navxt' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install Breadcrumb NavXT', 'liber' ); ?></a></p>

							<?php
							}

							?>
							</div>

							<div class="liber-tab-pane-half">

							<!-- Elementor -->
							<p><strong><?php esc_html_e( 'Elementor', 'liber' ); ?></strong></p>
							<p><?php esc_html_e( 'The most advanced frontend drag & drop page builder. Create high-end, pixel perfect websites at record speeds. Any theme, any page, any design.', 'liber' ); ?></p>

							<?php if ( is_plugin_active( 'elementor/elementor.php' ) ) { ?>

							<p><span class="liber-activated button"><?php esc_html_e( 'Already activated', 'liber' ); ?></span></p>

							<?php
							}
							else { ?>

							<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=elementor' ), 'install-plugin_elementor' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install Elementor', 'liber' ); ?></a></p>

							<?php
							}

							?>

							<!-- MailChimp for WordPress -->
							<p><strong><?php esc_html_e( 'MailChimp for WordPress', 'liber' ); ?></strong></p>
							<p><?php esc_html_e( 'MailChimp for WordPress by ibericode. Adds various highly effective sign-up methods to your site.', 'liber' ); ?></p>

							<?php if ( is_plugin_active( 'mailchimp-for-wp/mailchimp-for-wp.php' ) ) { ?>

							<p><span class="liber-activated button"><?php esc_html_e( 'Already activated', 'liber' ); ?></span></p>

							<?php
							}
							else { ?>

							<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=mailchimp-for-wp' ), 'install-plugin_mailchimp-for-wp' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install MailChimp for WordPress', 'liber' ); ?></a></p>

							<?php
							}

							?>

							<!-- Print-O-Matic -->
							<p><strong><?php esc_html_e( 'Print-O-Matic', 'liber' ); ?></strong></p>
							<p><?php esc_html_e( 'Shortcode that adds a printer icon, allowing the user to print the post or a specified HTML element in the post.', 'liber' ); ?></p>

							<?php if ( is_plugin_active( 'print-o-matic/print-o-matic.php' ) ) { ?>

							<p><span class="liber-activated button"><?php esc_html_e( 'Already activated', 'liber' ); ?></span></p>

							<?php
							}
							else { ?>

							<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=print-o-matic' ), 'install-plugin_print-o-matic' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install Print O Matic', 'liber' ); ?></a></p>

							<?php
							}

							?>

							<!-- Premium Soliloquy Slider -->
							<p><strong><?php esc_html_e( 'Premium Soliloquy Slider', 'liber' ); ?></strong></p>

							<?php if ( is_plugin_active( 'soliloquy/soliloquy.php' ) ) { ?>

							<p><span class="liber-activated button"><?php esc_html_e( 'Already activated', 'liber' ); ?></span></p>

							<?php
							}
							else { ?>

							<p class="bg2"><?php esc_html_e( 'Plugin & license key can be found inside the plugins folder within the main folder you downloaded', 'liber' ); ?></p>

							<?php
							}
							?>
							<!-- Custom Google Fonts Plugin -->
							<p><strong><?php esc_html_e( 'Custom Google Fonts Plugin', 'liber' ); ?></strong></p>

							<?php if ( is_plugin_active( 'anariel-design-google-fonts/Fad_gfp.php' ) ) { ?>

							<p><span class="liber-activated button"><?php esc_html_e( 'Already activated', 'liber' ); ?></span></p>

							<?php
							}
							else { ?>

							<p class="bg2">
								<a href="<?php echo esc_url('https://github.com/anarieldesign/anariel-design-google-fonts/'); ?>" target="_blank">
									<?php esc_html_e('Plugin can be downloaded here', 'liber'); ?>
								</a>
							</p>

							<?php
							}
							?>

							<!-- Custom Post Type Plugin -->
							<p><strong><?php esc_html_e( 'Custom Post Type Plugin', 'liber' ); ?></strong></p>

							<?php if ( is_plugin_active( 'liber-custom-post-type-plugin/anarielcustompostplugin.php' ) ) { ?>

							<p><span class="liber-activated button"><?php esc_html_e( 'Already activated', 'liber' ); ?></span></p>

							<?php
							}
							else { ?>

							<p class="bg2">
								<a href="<?php echo esc_url('https://github.com/anarieldesign/anariel-design-google-fonts/'); ?>" target="_blank">
									<?php esc_html_e('Plugin can be downloaded here', 'liber'); ?>
								</a>
							</p>

							<?php
							}
							?>
							</div>
						</div>
						<div class="clear"></div>
						<div class="section bg1">
							<h3>
								<?php esc_html_e('More Themes by Anariel Design', 'liber'); ?>
							</h3>
							<p class="about">
								<?php printf(esc_html__('Build Your Dream WordPress Site with Premium Niche Themes for Bloggers & Charities',  'liber'), $theme_data->Name); ?>
							</p>
							<a target="_blank" href="<?php echo esc_url('http://www.anarieldesign.com/themes/'); ?>"><img src="http://www.anarieldesign.com/themedemos/marketimages/anarieldesign-themes.jpg" alt="<?php esc_html_e('Theme Screenshot', 'liber'); ?>" /></a>
							<p>
								<a target="_blank" href="<?php echo esc_url('http://www.anarieldesign.com/themes/'); ?>" class="button button-primary advertising">
									<?php esc_html_e('More Themes', 'liber'); ?>
								</a>
							</p>
						</div>
					</div>
			</div>
			<hr>
			<div id="theme-author">
				<p>
					<?php printf(esc_html__('%1s is proudly brought to you by %2s. %3s: %4s.', 'liber'), $theme_data->Name, '<a target="_blank" href="http://www.anarieldesign.com/" title="Anariel Design">Anariel Design</a>', $theme_data->Name, '<a target="_blank" href="http://www.anarieldesign.com/themes/restaurant-bar-wordpress-theme/" title="Liber Theme Demo">' . esc_html__('Theme Demo', 'liber') . '</a>'); ?>
				</p>
			</div>
		</div><?php
	}
}

?>