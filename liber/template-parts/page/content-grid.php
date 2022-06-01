<?php
/**
 * Template part for displaying posts.
 *
 * @package Liber
 */

?>

<div class="grid-item">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php if ( has_post_thumbnail() ) { ?>
			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div>
			<?php } ?>

		<div class="entry-content">
			<?php
				/* translators: %s: Name of current post */
				the_content( sprintf(
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'liber' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
			?>

				<?php edit_post_link( esc_html__( 'Edit', 'liber' ), '<span class="edit-link">', '</span>' ); ?>

			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'liber' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
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
	</article><!-- #post-## -->
</div>