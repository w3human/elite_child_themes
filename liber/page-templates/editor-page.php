<?php
/**
 * Template Name: Editor Template
 * The template for displaying about page.
 *
 * @package Liber
 */

get_header(); ?>

<div class="content-wrapper full-width <?php echo esc_attr( liber_additional_class() ); ?>">
		<div id="primary" class="content-area">
			<div id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/page/content', 'page' ); ?>

					<?php
						// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || '0' != get_comments_number() ) {
							comments_template();
						}
					?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->
	</div><!-- .content-wrapper -->

<?php get_footer(); ?>
