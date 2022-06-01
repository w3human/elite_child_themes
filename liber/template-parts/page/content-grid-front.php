<?php
/**
 * Template part for displaying posts.
 *
 * @package Liber
 */

global $liber_panel;

?>

<div class="<?php echo esc_attr( liber_additional_class_page_columns( $liber_panel ) ); ?>">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">

			<?php if ( has_post_thumbnail() ) { ?>
			<div class="post-thumbnail">
			<?php if(get_theme_mod('liber_image_link'. $liber_panel)) : ?>
					<?php the_post_thumbnail(); ?>
				<?php else: ?>
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail(); ?>
					</a>
				<?php endif; ?>
			</div>
			<?php } ?>

			<?php if(get_theme_mod('liber_child_title_link'. $liber_panel)) : ?>
				<?php the_title( sprintf( '<h3 class="entry-title">', esc_url( get_permalink() ) ), '</h3>' ); ?>
			<?php else: ?>
				<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
			<?php endif; ?>

		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
				/* translators: %s: Name of current post */
				the_content( sprintf(
					wp_kses( __( 'Continue reading %s', 'liber' ), array( 'span' => array( 'class' => array() ) ) ),
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
	</article><!-- #post-## -->
</div>