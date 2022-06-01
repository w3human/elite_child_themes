<?php
/**
 * Template part for displaying pages on front page
 *
 * @package WordPress
 * @subpackage Liber
 * @since 1.0
 * @version 1.0
 */

global $liber_panel;
?>


<div class="<?php echo esc_attr( liber_additional_class_front( $liber_panel ) ); ?> <?php echo esc_attr( liber_additional_class_page_style( $liber_panel ) ); ?>">

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'liber-panel liber-panel'. esc_attr( $liber_panel ) ); ?> data-panel-title="Panel <?php echo esc_attr( $liber_panel ); ?>" >

		<?php if(get_theme_mod('liber_featured_image'. $liber_panel) == 'featured-image-background' || get_theme_mod('liber_featured_image'. $liber_panel) == 'half-width-image' || get_theme_mod('liber_featured_image'. $liber_panel) == 'half-width-image-left') : ?>
			<?php
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
				$page_image = $thumb['0'];
			?>
			<div class="hero" style="background-image: url(<?php echo esc_url( $page_image ); ?>);">
				<span class="overlay-bg"></span>
			</div>
		<?php else: ?>
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'liber-hero-thumbnail' ); ?>
			<?php endif; ?>
		<?php endif; ?>

		<div class="panels <?php echo esc_attr( liber_additional_class_testimonials( $liber_panel ) ); ?>">
			<div class="panel-content clear">
				<div class="wrap">
					<div class="page-wrap">
						<header class="entry-header">
							<?php if ( get_theme_mod('liber_title_tagline'. $liber_panel)) :?>
								<span class="title-tagline"><?php echo wp_kses_post( get_theme_mod( 'liber_title_tagline'. $liber_panel ) ); ?></span>
							<?php endif; ?>

							<?php if ( !get_theme_mod('liber_page_title'. $liber_panel)) :?>
								<?php the_title( '<h2 class="entry-title">', '</h2>' );?>
							<?php endif; ?>

						</header><!-- .entry-header -->

						<?php if ( '' != get_the_content() ) : ?>
							<div class="entry-content">
								<?php
									/* translators: %s: Name of current post */
										the_content( sprintf(
										__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'liber' ),
										get_the_title()
										) );
								?>
							</div><!-- .entry-content -->
							<?php edit_post_link( esc_html__( 'Edit', 'liber' ), '<span class="edit-link">', '</span>' ); ?>
						<?php endif; ?>
					</div><!-- .page-wrap -->

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
							<div class="child-pages columns clear">
								<?php while ( $child_pages->have_posts() ) : $child_pages->the_post();
									get_template_part( 'template-parts/page/content', 'grid-front' );
								endwhile;
								wp_reset_postdata();?>
							</div><!-- .child-pages -->
						<?php endif;?>

						<?php if ( get_theme_mod( 'liber_front_posts'. $liber_panel )): ?>

							<?php // Show most recent posts.
							$recent_posts = new WP_Query( array(
									'posts_per_page'      => get_theme_mod( 'liber_post_number'. $liber_panel ),
									'post_status'         => 'publish',
									'category_name'       => get_theme_mod( 'liber_post_category'. $liber_panel ),
									'ignore_sticky_posts' => true,
									'no_found_rows'       => true,
							) );
							?>

							<?php if ( $recent_posts->have_posts() ) : ?>
								<?php if(get_theme_mod('liber_post_style'. $liber_panel) == 'style-two') : ?>
								<div class="recent-post list clear">

									<?php
										while ( $recent_posts->have_posts() ) : $recent_posts->the_post();
											get_template_part( 'template-parts/post/content', 'excerpt-list' );
										endwhile;
										wp_reset_postdata();
									?>

								</div><!-- .child-pages -->
								<?php else: ?>
								<div class="recent-post child-pages columns clear">

									<?php
										while ( $recent_posts->have_posts() ) : $recent_posts->the_post();
											get_template_part( 'template-parts/post/content', 'excerpt' );
										endwhile;
										wp_reset_postdata();
									?>

								</div><!-- .child-pages -->
								<?php endif; ?>

							<?php endif; ?>
						<?php endif; ?>

						<?php if ( get_theme_mod( 'liber_front_menu'. $liber_panel )): ?>
							<div class="special-offer">
								<?php
									$menu = new WP_Query( array(
										'post_type'   => 'menu',
										'posts_per_page'      => get_theme_mod( 'liber_menu_post_number'. $liber_panel ),
										'menu_category'       => get_theme_mod( 'liber_menu_post_category'. $liber_panel ),
										'ignore_sticky_posts' => true,
										'post_status' => 'publish'
									));
								?>

								<?php if ( $menu->have_posts() ) : ?>
									<?php
										while ( $menu->have_posts() ) : $menu->the_post();
											get_template_part( 'template-parts/page/content', 'front-menu' );
										endwhile;
										wp_reset_postdata();
									?>
								<?php endif; ?>
							</div><!-- .special-offer -->
						<?php endif; ?>

						<?php if ( get_theme_mod( 'liber_front_testimonials'. $liber_panel )): ?>
							<div class="testimonials clear">
								<?php
									$testimonials = new WP_Query( array(
										'post_type'   => 'testimonials',
										'posts_per_page'      => get_theme_mod( 'liber_testimonials_post_number'. $liber_panel ),
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
						<?php endif; ?>


				</div><!-- .wrap -->
			</div><!-- .panel-content -->
		</div><!-- .panels -->

	</article><!-- #post-## -->

</div>