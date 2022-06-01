<?php
/**
 * The template used for displaying menu content in menu-page.php
 *
 * @package Liber
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
	<?php if(!get_theme_mod('liber_menu_title_link'. $liber_panel)) : ?>
		<?php the_title( sprintf( '<h3 class="entry-title">', esc_url( get_permalink() ) ), '</h3>' ); ?>
		<?php else: ?>
			<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( '' != get_the_content() ) : ?>
		<div class="entry-content">
			<?php the_excerpt(); ?>
			<?php if( get_post_meta( $post->ID, '_menu_price', true ) ): ?>
			<span class="menu-price">
				<?php echo get_post_meta( $post->ID, '_menu_price', true ); ?>
			</span>
			<?php endif; ?>
		</div><!-- .entry-content -->
	<?php endif; ?>

</article><!-- #post-## -->
