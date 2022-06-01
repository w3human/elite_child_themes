<?php
/**
 * Template Name: WooCommerce Shop Template
 *
 * @package Liber
 */


get_header(); ?>

	<div class="content-wrapper">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

					<?php woocommerce_breadcrumb(); ?>
					<?php woocommerce_content(); ?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<?php get_sidebar(); ?>

	</div><!-- .content_wrapper -->

<?php get_footer(); ?>