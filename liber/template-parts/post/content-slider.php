<?php
/**
 * Template part for displaying slider posts with excerpts
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

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<a href="<?php the_permalink(); ?>">
			<?php liber_post_thumbnail(); ?>
		</a>

		<div class="caption">
		<div class="caption-innen">
			<div class="category">
				<?php the_category( ' ' ); ?>
			</div>
			<header class="entry-header">
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			</header><!-- .entry-header -->
			<div class="author">
			<ul>
				<li><?php the_author(); ?></li> 
				<li><?php the_date(); ?></li>
			</ul>
			</div>
		</div>
		</div><!-- .caption -->
	</article><!-- #post-## -->
