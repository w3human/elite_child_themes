<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Liber
 */

?>

	</div><!-- #content -->

		<?php get_sidebar( 'front-page' ); ?>
		<?php get_sidebar( 'footer' ); ?>

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="site-info">
				<?php
					if ( function_exists( 'the_privacy_policy_link' ) ) {
					the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
					}
				?>
				<?php if( get_theme_mod( 'hide_copyright' ) == '') { ?>
					<?php
						/**
						* Fires before the Maisha footer text for footer customization.
						*
						* @since Maisha 1.0
						*/
						do_action( 'liber_credits' );
					?>
					<?php esc_attr_e('&copy;', 'liber'); ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"> <?php echo esc_textarea ( get_theme_mod( 'liber_copyright', 'Liber Theme by Anariel Design. Proudly powered by WordPress.' ) ); ?> </a>
				<?php } // end if ?>
				<?php if ( get_theme_mod( 'scrolltotop', true ) ) { ?>
					<a class="scroll-to-top" href="#"></a>
				<?php } ?>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
