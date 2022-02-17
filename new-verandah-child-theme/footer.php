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

		<?php get_sidebar( 'front-page' ); ?>
		<?php get_sidebar( 'footer' ); ?>

		<footer id="colophon" class="site-footer" role="contentinfo">


			<div class="site-info">
				<?php
					if ( function_exists( 'the_privacy_policy_link' ) ) {
					the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
					}
				?>

				<?php
					wp_nav_menu( array(
						'theme_location'  => 'menu-2',
						'menu_id'         => 'footer-menu',
						'menu_class'      => 'menu footer-menu',
						'container_class' => 'footer-menu-container'
					) );
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

					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"> <?php echo esc_textarea ( get_theme_mod( 'liber_copyright', date('Y').' The Verandah Resort & Spa.  All Rights Reserved.' ) ); ?> </a>
				<?php } // end if ?>


				<?php if ( get_theme_mod( 'scrolltotop', true ) ) { ?>
					<a class="scroll-to-top" href="#"></a>
				<?php } ?>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<div class="popup open">

	<div class="popup-inner">

		<div id="" style="z-index: 99;">
			<div class=" ">
				<div class="bt-close">Close</div>

				<div clas ="rescnuo" style="font-weight: bold; text-align: center">
					<?php if (elite_is_euro()) : ?>
						RESERVATIONS - <a href="tel: 44 (0) 1245 45 99 06">44 (0) 1245 45 99 06</a>

					<?php else : ?>
						RESERVATIONS - <a href="tel: 800.858.4618">800.858.4618</a>
					
					<?php endif;?>

				</div>
				<div class="header__book__module" id="desktopvinetcontainer">
					<div class="form-div-stay4 form-accom">
						
						<div class="sblink link-desktop">
							<a href="javascript:sbVinetonT(true,'sbVinet-footer')" id="sbVinet4lkwf" class="t-linkb t-linka t-default">Flight + Resort</a>

							<span class="sbLinkSp">&nbsp;</span>
							
							<a href="javascript:sbVinetonT(false,'sbVinet-footer')" id="sbVinet4lkwr" class="t-linkb t-linko t-selected">Resort Only</a>
						</div>

						<div id="sbVinet-footer"></div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>



</body>
</html>
