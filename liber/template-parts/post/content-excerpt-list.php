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

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="left-block">
		<?php the_post_thumbnail( 'liber-recent-post-list-image' ); ?>
	</div>
	<!-- .left-block -->

	<div class="right-block">
		<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		</header><!-- .entry-header -->
			<div class="entry-meta">
				<span class="date"><?php echo get_the_date(); ?></span><span class="author"><?php the_author(); ?> </span>
			</div><!-- .entry-meta -->

		<div class="entry-body">

			<div class="entry-content">
				<?php
					the_content( sprintf(
						/* translators: %s: Name of current post. */
						wp_kses( __( 'Continue reading %s', 'liber' ), array( 'span' => array( 'class' => array() ) ) ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					) );
				?>
			</div><!-- .entry-content -->
		</div><!-- .entry-body -->
	</div><!-- .right-block -->

</article><!-- #post-## -->
