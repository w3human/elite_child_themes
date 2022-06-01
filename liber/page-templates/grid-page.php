<?php
/**
 * Template Name: Grid Template
 * The template for displaying about page.
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
			<div id="main" class="site-main" role="main">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/page/content', 'grid-page' ); ?>

					<?php
						// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || '0' != get_comments_number() ) {
							comments_template();
						}
					?>

				<?php endwhile; // end of the loop. ?>

					<?php
						$child_pages = new WP_Query( array(
							'post_type'      => 'page',
							'orderby'        => 'menu_order',
							'order'          => 'ASC',
							'post_parent'    => $post->ID,
							'posts_per_page' => 999,
							'no_found_rows'  => true,
						) );
					?>
					<?php if ( $child_pages->have_posts() ) :?>
						<div class="flexcontainer">
							<?php while ( $child_pages->have_posts() ) : $child_pages->the_post();
								get_template_part( 'template-parts/page/content', 'grid' );
							endwhile;
							wp_reset_postdata();?>
						</div><!-- .child-pages -->
					<?php endif;?>

			</div><!-- #content -->
		</div><!-- #primary -->
	</div><!-- .content-wrapper -->

<?php get_footer(); ?>
