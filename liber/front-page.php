<?php
/**
 * The front page template file.
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear. Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Liber
 */
if ( 'posts' == get_option( 'show_on_front' ) ) :

	get_template_part( 'index' );

else :

?>

	<?php get_header( 'front' ); ?>

	<?php get_sidebar( 'front-slider' ); ?>

	<?php if ( get_theme_mod( 'liber_featured_slider' )): ?>
		<div class="featured-slider">
			<?php // Show most recent posts.
				$recent_posts = new WP_Query( array(
					'posts_per_page'      => get_theme_mod( 'liber_featured-slider_post_number' ),
					'category_name'       => get_theme_mod( 'liber_featured-slider_post_category' ),
					'post_status'         => 'publish',
					'ignore_sticky_posts' => true,
					'no_found_rows'       => true,
				) );
		
			if($recent_posts-> have_posts()) : while($recent_posts-> have_posts()) : $recent_posts-> the_post();
			?>
			<div class="recent-post">
				<?php get_template_part( 'template-parts/post/content', 'slider' ); ?>
			</div>
			<?php endwhile; endif;
			wp_reset_postdata();?>
		</div>
	<?php endif; ?>

	<?php if ( !get_theme_mod( 'liber_hero_hide' )): ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<div id="primary" class="content-area front-page-content-area">
			<?php
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
				$page_image = $thumb['0'];
			?>
			<div id="hero" class="hero" style="background-image: url(<?php echo esc_url( $page_image ); ?>);">
				<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail( 'liber-hero-small-thumbnail' ); ?>
				<?php endif; ?>
				<div class="hero-container-outer">
				<div class="hero-container-inner">
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<header class="entry-header">
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						</header><!-- .entry-header -->

						<div class="entry-content">
							<?php the_content(); ?>
						</div><!-- .entry-content -->
					</article><!-- #post-## -->
				</div>
			</div>
			<?php edit_post_link( esc_html__( 'Edit', 'liber' ), '<span class="edit-link">', '</span>' ); ?>
				<span class="overlay-bg"></span>
			</div>

		</div><!-- #primary -->
	<?php endwhile; ?>
	<?php endif; ?>

	<?php
	// Get each of our panels and show the post data
		for ( $panel = 1; $panel <= 5; $panel ++ ) :
			if ( get_theme_mod( 'liber_panel' . $panel ) ) :
				$post = get_post( get_theme_mod( 'liber_panel' . $panel ) );
				// Add variable below that we will reference in the template part. It's prefixed to avoid variable clashes.
				$liber_panel = $panel;
				setup_postdata( $post );
				set_query_var( 'liber_panel', $panel );
				// Remove the number suffix since we only want to use one template.
				get_template_part( 'template-parts/page/content', 'front-page-panel' );
				wp_reset_postdata();
			endif;
		endfor;
	?>

<?php endif; ?>

<?php get_footer(); ?>
