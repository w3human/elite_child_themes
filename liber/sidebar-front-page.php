<?php
/**
 * The sidebar containing the front page widget areas.
 * If no active widgets in either sidebar, they will be hidden completely.
 *
 * @package Liber
 */

if ( ! is_active_sidebar( 'sidebar-5' ) && ! is_active_sidebar( 'sidebar-6' ) && ! is_active_sidebar( 'sidebar-7' ) ) {
	return;
}
?>

<?php if ( is_active_sidebar( 'sidebar-5' ) || is_active_sidebar( 'sidebar-6' )) : ?>
<div class="widget-area front-widget-area front-widgets" role="complementary">
	<div class="inner">
		<?php if ( is_active_sidebar( 'sidebar-5' ) ) : ?>
		<div id="widget-area-5" class="widget-area">
			<?php dynamic_sidebar( 'sidebar-5' ); ?>
		</div><!-- widget-area-5 -->
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'sidebar-6' ) ) : ?>
		<div id="widget-area-6" class="widget-area">
			<?php dynamic_sidebar( 'sidebar-6' ); ?>
		</div><!-- widget-area-6 -->
		<?php endif; ?>
	</div><!-- .inner -->
</div><!-- #secondary -->
<?php endif;?>

<div id="instagram" class="widget-area front-widget-area">
	<?php if ( is_active_sidebar( 'sidebar-7' ) ) : ?>
		<div id="widget-area-7" class="widget-area">
			<?php dynamic_sidebar( 'sidebar-7' ); ?>
		</div><!-- #widget-area-7 -->
	<?php endif; ?>
</div><!-- .widget-area -->
