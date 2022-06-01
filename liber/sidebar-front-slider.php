<?php
/**
 * The sidebar containing the slider widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Liber
 */

if ( ! is_active_sidebar( 'sidebar-9' ) ) {
	return;
}
?>

<div class="top slider widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-9' ); ?>
</div><!-- #secondary -->
