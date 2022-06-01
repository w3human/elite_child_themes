<?php
/**
 * Template part for displaying posts with excerpts
 *
 * Used in Search Results and for Recent Posts in Front Page panels.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Liber
 * @since 1.0
 * @version 1.0
 */

?>

<div class="threecolumn">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( 'liber-recent-post-image' ); ?>
		</a>

		<header class="entry-header">

			<div class="entry-meta">
				<span class="posted-on">
					<span class="month"><?php echo get_the_date('d-M'); ?></span>
				</span>
			</div><!-- .entry-meta -->

				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		</header><!-- .entry-header -->

	</article><!-- #post-## -->
</div>
