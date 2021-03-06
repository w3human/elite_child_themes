<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Liber
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php liber_post_thumbnail(); ?>

	<?php if ( 'post' == get_post_type() ) : ?>

		<div class="entry-meta">
			<?php liber_entry_meta(); ?>
		</div><!-- .entry-meta -->

	<?php endif; ?>

	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-body">

		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->

	</div><!-- .entry-body -->

</article><!-- #post-## -->
