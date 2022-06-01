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
	<div id="hero" class="hero" style="background-image: url(<?php echo esc_url( $page_image ); ?>);">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'liber-hero-thumbnail' ); ?>
		<?php endif; ?>
	<div class="content-wrapper full-width">
		<div class="content-area">
			<div class="site-main box" role="main">
				<header class="entry-header">
					<?php the_title( '<h2>', '</h2>' ); ?>
				</header><!-- .entry-header -->
				<div class="entry-content">
					<?php the_content(); ?>
					<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'liber' ),
							'after'  => '</div>',
						) );
					?>
				</div><!-- .entry-content -->

				<footer class="entry-meta">
					<?php edit_post_link( esc_html__( 'Edit', 'liber' ), '<span class="edit-link">', '</span>' ); ?>
				</footer><!-- .entry-footer -->
			</div><!-- #content -->
		</div><!-- #primary -->
	</div><!-- .content-wrapper -->
	</div><!-- .hero -->