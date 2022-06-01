<?php
/**
 * The sidebar containing the footer page widget areas.
 *
 * If no active widgets in either sidebar, they will be hidden completely.
 *
 * @package Liber
 */

$footer_extra_class = '';

$sidebarbg = esc_attr( get_theme_mod( 'liber_footer_sidebar_bg' ) );
$background_style = '';

if ( !empty ( $sidebarbg ) ) {
	$background_style = "background-image:url( ' " . esc_url( $sidebarbg ) . " ' );";
}
?>

<?php
	if ( is_active_sidebar( 'sidebar-2' ) || is_active_sidebar( 'sidebar-3' ) || is_active_sidebar( 'sidebar-4' ) ) :
?>
<div id="tertiary" class="pre-footer <?php echo esc_attr( $footer_extra_class ); ?>" role="complementary" style="<?php echo $background_style; ?>">
	<div class="inner">

			<div class="widget-area footer-widget-area">
				<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
					<div id="widget-area-2" class="widget-area">
						<?php dynamic_sidebar( 'sidebar-2' ); ?>
					</div><!-- #widget-area-2 -->
				<?php endif; ?>

				<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
					<div id="widget-area-3" class="widget-area">
						<?php dynamic_sidebar( 'sidebar-3' ); ?>
					</div><!-- #widget-area-3 -->
				<?php endif; ?>

				<?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
					<div id="widget-area-4" class="widget-area">
						<?php dynamic_sidebar( 'sidebar-4' ); ?>
					</div><!-- #widget-area-3 -->
				<?php endif; ?>

			</div><!-- .footer-widget-area -->
	</div>
</div><!-- #tertiary -->
<?php endif; ?>
