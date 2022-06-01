<?php
/**
 * Displays header image
 *
 * @package WordPress
 * @subpackage Liber
 * @since 1.0
 * @version 1.0
 */

?>
<div class="custom-header">

	<div class="custom-header-image <?php echo esc_attr( liber_additional_class() ); ?>">
		<?php the_custom_header_markup(); ?>
	</div>

</div><!-- .custom-header -->