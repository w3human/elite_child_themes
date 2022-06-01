<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Liber
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if(!get_theme_mod('liber_single_featured_image')) : ?>
		<?php liber_post_thumbnail(); ?>
	<?php endif; ?>

	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title">', esc_url( get_permalink() ) ), '</h2>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-body">
		<?php if(!get_theme_mod('liber_posted_on')) : ?>
			<div class="entry-meta">
				<?php liber_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>


		<div class="entry-content">
			<?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'liber' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
			?>

			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'liber' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<?php if(!get_theme_mod('liber_post_footer')) : ?>
			<footer class="entry-meta">
				<?php liber_entry_footer(); ?>
			</footer><!-- .entry-meta -->
		<?php endif; ?>

		<?php if(!get_theme_mod('liber_author_bio')) : ?>
			<?php get_template_part( 'author-bio' );?>
		<?php endif; ?>

		<?php if(!get_theme_mod('liber_related_post')) : ?>
			<?php
				// Related Post.
				if ( is_single()) :
					get_template_part( 'related-posts' );
				endif;
			?>
		<?php endif; ?>

	</div><!-- .entry-body -->

</article><!-- #post-## -->

