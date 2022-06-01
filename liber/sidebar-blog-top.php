<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Liber
 */

if ( ! is_active_sidebar( 'sidebar-8' ) ) {
	return;
}
?>

<div class="top widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-8' ); ?>
</div><!-- #secondary -->
