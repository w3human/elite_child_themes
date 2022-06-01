<?php
/**
 * Template Name: Food Menu Classic Template
 * The template for displaying food menu items.
 *
 * @package Liber
 */
get_header();
?>
	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'template-parts/page/content', 'hero' ); ?>

	<?php endwhile; ?>

	<?php rewind_posts(); ?>

	<?php
	/*
	* Loop through Categories and Display Posts within
	*/
	$post_type = 'menu';

	// Get all the taxonomies for this post type
	$taxonomies = get_object_taxonomies( array( 'post_type' => $post_type ) );
	foreach( $taxonomies as $taxonomy ) :

	// Gets every "category" (term) in this taxonomy to get the respective posts
	$terms = get_terms( $taxonomy );

	foreach( $terms as $term ) : ?>
	<div class="category-block">
		<?php echo wp_kses_post( $term->description ); ?>
		<h2><?php echo esc_html( $term->name ); ?></h2>
	</div>
	<div class="content-wrapper full-width">
		<div class="content-area">
			<div class="site-main" role="main">
				<div class="flexcontainer">
					<?php
					$args = array(
						'post_type' => $post_type,
						'posts_per_page' => -1,  //show all posts
						'tax_query' => array(
							array(
								'taxonomy' => $taxonomy,
								'field' => 'slug',
								'terms' => $term->slug,
							)
						)
					);
					$posts = new WP_Query($args);
						if( $posts->have_posts() ): while( $posts->have_posts() ) : $posts->the_post(); ?>
						<div class="grid-item-menu two">
							<?php get_template_part( 'template-parts/page/content', 'menu-classic' );?>
						</div>
						<?php endwhile; endif; ?>
						<?php wp_reset_postdata();?>
				</div>
			</div><!-- .wrap -->
		</div><!-- .panel-content -->
	</div><!-- .panels -->
	<?php endforeach;
	endforeach; ?>
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
		<div class="special">
			<?php while ( $child_pages->have_posts() ) : $child_pages->the_post();
				get_template_part( 'template-parts/page/content', 'special' );
			endwhile;
			wp_reset_postdata();?>
		</div><!-- .child-pages -->
	<?php endif;?>

<?php get_footer(); ?>
