<?php
/**
 * Template Name: Testimonial Template
 * The template for displaying testimonial items.
 *
 * @package Liber
 */
get_header();
?>
	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'template-parts/page/content', 'hero' ); ?>

	<?php endwhile; ?>

	<?php rewind_posts(); ?>

	<div class="content-wrapper full-width">
		<div id="primary" class="content-area">
			<div id="main" class="site-main liber-panel" role="main">
					<div class="testimonials clear">
						<?php
							$testimonials = new WP_Query( array(
								'post_type'   => 'testimonials',
								'posts_per_page'      => -1,
								'ignore_sticky_posts' => true,
								'post_status' => 'publish'
							));
						?>

						<?php if ( $testimonials->have_posts() ) : ?>
							<?php
								while ( $testimonials->have_posts() ) : $testimonials->the_post();
									get_template_part( 'template-parts/page/content', 'testimonial' );
								endwhile;
								wp_reset_postdata();
							?>
						<?php endif; ?>
					</div><!-- .testimonials -->
			</div><!-- #content .site-main -->
		</div><!-- #primary .content-area -->
	</div><!-- .content-wrapper -->

<?php get_footer(); ?>
