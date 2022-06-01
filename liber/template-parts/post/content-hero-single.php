<?php
/**
 * The template used for displaying hero content in page.php and page-templates.
 *
 * @package Liber
 */
?>
	<?php
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
		$page_image = $thumb['0'];
	?>
	<div id="page-hero" class="hero-quote" style="background-image: url(<?php echo esc_url( $page_image ); ?>);">

		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->

		<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
			<?php if(function_exists('bcn_display')){
				bcn_display();
			}?>
		</div>
	</div>