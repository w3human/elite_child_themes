<?php
/**
 * Displays header image
 *
 * @package WordPress
 * @subpackage Liber
 * @since 1.0
 * @version 1.0
 */

?>

	<?php
		$featured_image = get_theme_mod( 'liber_featured_image' );
	?>

	<div id="page-hero" class="hero" style="background-image: url(<?php echo esc_url( $featured_image ); ?>);">

		<header class="entry-header">
		<?php
		if( is_home() && get_option('page_for_posts') ) {
			$blog_page_id = get_option('page_for_posts');
			echo '<h1>'.get_post(($blog_page_id))->post_title.'</h1>';
		}
		?>
		</header><!-- .entry-header -->
		<?php if(function_exists('bcn_display')): ?>
		<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
				<?php bcn_display(); ?>
		</div>
		<?php endif;?>
	</div>