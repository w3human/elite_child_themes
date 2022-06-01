<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Liber
 */

?>

<div class="grid-item">
<?php
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
	$page_image = $thumb['0'];
?>
<div id="page-hero" class="hero quote" style="background-image: url(<?php echo esc_url( $page_image ); ?>);">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if(!get_theme_mod('liber_entry_meta')) : ?>
		<div class="entry-meta">
			<?php liber_entry_meta(); ?>
		</div><!-- .entry-meta -->
	<?php endif; ?>

	<?php if(get_theme_mod('liber_quote_entry_header')) : ?>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->
	<?php endif; ?>

	<div class="entry-body">

		<div class="entry-content">

			<?php if(get_theme_mod('liber_post_type') == 'excerpt-lenght') : ?>
			<?php the_excerpt( sprintf(
				__( 'Continue reading %s', 'liber' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );?>

			<?php else: ?>

			<?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s', 'liber' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
			?>
			<?php endif; ?>

			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'liber' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
	</div><!-- .entry-body -->

</article><!-- #post-## -->
</div><!-- .hero -->
</div><!-- .grid-item -->
