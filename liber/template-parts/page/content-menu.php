<?php
/**
 * The template used for displaying menu content in menu-page.php
 *
 * @package Liber
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php the_title( sprintf( '<h3 class="entry-title">', esc_url( get_permalink() ) ), '</h3>' ); ?>
	</header><!-- .entry-header -->

	<?php if ( '' != get_the_content() ) : ?>
		<div class="entry-content">
		<div class="menu-content">
			<?php the_post_thumbnail( 'liber-menu-thumbnail' ); ?>
			<?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s', 'liber' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
			?>
		</div>
			<?php if( get_post_meta( $post->ID, '_menu_price', true ) ): ?>
			<span class="menu-price">
				<?php echo get_post_meta( $post->ID, '_menu_price', true ); ?>
			</span>
			<?php endif; ?>
		</div><!-- .entry-content -->
	<?php endif; ?>

</article><!-- #post-## -->
