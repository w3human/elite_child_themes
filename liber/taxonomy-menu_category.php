<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Liber
 */

get_header( 'custom' ); ?>


	<div class="category-top">
		<?php
			
			the_archive_description( '<div class="taxonomy-description">', '</div>' );
			if(get_theme_mod( 'liber_food_menu_category' )) : 
				the_archive_title( '<h1 class="category-title">', '</h1>' );
			else:
				echo '<h1 class="category-title">' . single_cat_title('',false) . '</h1>';
			endif;
		?>

		<?php if(function_exists('bcn_display')): ?>
		<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
				<?php bcn_display(); ?>
		</div>
		<?php endif;?>
	</div>

	<div id="content" class="site-content">
		<div class="content-wrapper full-width">
			<div id="primary" class="content-area">
				<div id="main" class="site-main" role="main">
					<div class="flexcontainer">
						<?php if(get_theme_mod('liber_food_menu_category_layout') == 'list-layout') : ?>
						<?php
							if( have_posts() ): while( have_posts() ) : the_post(); ?>
							<div class="grid-item-menu">
								<?php get_template_part( 'template-parts/page/content', 'menu-list' );?>
							</div>
						<?php endwhile; endif; ?>
						<?php elseif(get_theme_mod('liber_food_menu_category_layout') == 'classic-layout') : ?>
						<?php
							if( have_posts() ): while( have_posts() ) : the_post(); ?>
							<div class="grid-item-menu two">
								<?php get_template_part( 'template-parts/page/content', 'menu-classic' );?>
							</div>
						<?php endwhile; endif; ?>
						<?php else: ?>
						<?php
							if( have_posts() ): while( have_posts() ) : the_post(); ?>
							<div class="grid-item-menu">
								<?php get_template_part( 'template-parts/page/content', 'menu' );?>
							</div>
						<?php endwhile; endif; ?>
						<?php endif; ?>
					</div>
					<?php
						global $wp_query;
						$big = 999999999; // need an unlikely integer
						echo paginate_links( array(
							'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
							'format' => '?paged=%#%',
							'current' => max( 1, get_query_var('paged') ),
							'prev_text'    => esc_html__('&lang;', 'liber'),
							'next_text'    => esc_html__('&rang;', 'liber'),
							'total' => $wp_query->max_num_pages
						) );
					?>
				</div><!-- .wrap -->
			</div><!-- .panel-content -->
		</div><!-- .panels -->
	</div><!-- #content -->

<?php get_footer( 'custom' ); ?>
