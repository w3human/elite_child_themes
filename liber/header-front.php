<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Liber
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'liber' ); ?></a>
	<?php if ( has_custom_header() ) : ?>
		<?php get_template_part( 'template-parts/header/header', 'image-front' ); ?>
	<?php endif; // End header image check. ?>
	<header id="masthead" class="site-header" role="banner">
	<?php if(get_theme_mod('liber_header_layout') == 'two-row-header' || get_theme_mod('liber_header_layout') == 'two-row-boxed-header' ) : ?>
		<div class="wrapper secondary-menu">
			<div class="header-inner">
				<div class="secondary-navigation">
					<?php if ( has_nav_menu( 'secondary' ) ) : ?>
					<nav id="site-navigation-secondary" class="main-navigation" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'secondary-menu', 'fallback_cb' => false ) ); ?>
					</nav><!-- #site-navigation -->
					<?php endif; ?>
				</div><!-- .secondary--navigation -->
				<div class="socials">
					<p class="site-info"><?php echo wp_kses_post( get_theme_mod( 'liber_header_info' ) ); ?></p>
					<?php
						if ( has_nav_menu( 'social' ) ) {
							wp_nav_menu( array( 'theme_location' => 'social', 'depth' => 1, 'link_before' => '<span class="screen-reader-text">', 'link_after' => '</span>', 'container_class' => 'social-links' ) );
						}
					?>
				</div><!-- .socials -->
			</div><!-- .header-inner -->
		</div><!-- .wrapper -->
		<div class="wrapper">
			<div class="header-inner">
				<div class="site-branding">
					<?php liber_the_custom_logo(); ?>
					<?php if ( get_theme_mod('liber_header_info' )) : ?>
					<?php endif; ?>
					<?php if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php endif; ?>
					<p class="site-description"><?php bloginfo( 'description' ); ?></p>
				</div><!-- .site-branding -->
				<?php if ( has_nav_menu( 'primary' ) ) : ?>
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'liber' ); ?></button>
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'fallback_cb' => false ) ); ?>
				</nav><!-- #site-navigation -->
				<?php endif; ?>
			</div><!-- .header-inner -->
		</div><!-- .wrapper -->
	<?php elseif(get_theme_mod('liber_header_layout') == 'center-header') : ?>
		<div class="wrapper secondary-menu">
			<div class="header-inner">
				<p class="site-info"><?php echo wp_kses_post( get_theme_mod( 'liber_header_info' ) ); ?></p>
				<div class="socials">
					<?php
						if ( has_nav_menu( 'social' ) ) {
							wp_nav_menu( array( 'theme_location' => 'social', 'depth' => 1, 'link_before' => '<span class="screen-reader-text">', 'link_after' => '</span>', 'container_class' => 'social-links' ) );
						}
					?>
				</div><!-- .socials -->
			</div><!-- .header-inner -->
		</div><!-- .wrapper -->
		<div class="site-branding">
			<?php liber_the_custom_logo(); ?>
			<?php if ( get_theme_mod('liber_header_info' )) : ?>
			<?php endif; ?>
			<?php if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php endif; ?>
			<p class="site-description"><?php bloginfo( 'description' ); ?></p>
		</div><!-- .site-branding -->
		<div class="wrapper">
			<div class="header-inner">
				<?php if ( has_nav_menu( 'primary' ) ) : ?>
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'liber' ); ?></button>
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'fallback_cb' => false ) ); ?>
				</nav><!-- #site-navigation -->
				<?php endif; ?>
			</div><!-- .header-inner -->
		</div><!-- .wrapper -->
	<?php else: ?>
		<div class="wrapper">
			<div class="header-inner">
				<div class="site-branding">
					<?php liber_the_custom_logo(); ?>
					<?php if ( get_theme_mod('liber_header_info' )) : ?>
					<p class="site-info"><?php echo wp_kses_post( get_theme_mod( 'liber_header_info' ) ); ?></p>
					<?php endif; ?>
					<?php if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php endif; ?>
					<p class="site-description"><?php bloginfo( 'description' ); ?></p>
				</div><!-- .site-branding -->
				<?php if ( has_nav_menu( 'primary' ) ) : ?>
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'liber' ); ?></button>
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'fallback_cb' => false ) ); ?>
					<?php
						if ( has_nav_menu( 'social' ) ) {
							wp_nav_menu( array( 'theme_location' => 'social', 'depth' => 1, 'link_before' => '<span class="screen-reader-text">', 'link_after' => '</span>', 'container_class' => 'social-links' ) );
						}
					?>
				</nav><!-- #site-navigation -->
				<?php endif; ?>
			</div><!-- .header-inner -->
		</div><!-- .wrapper -->
	<?php endif; ?>
	</header><!-- #masthead -->
	<div id="content" class="site-content">