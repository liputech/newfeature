<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// Layout class
if ( NewfeatureTheme::$layout == 'full-width' ) {
	$newfeature_layout_class = 'col-sm-12 col-12';
} else {
	$newfeature_layout_class = NewfeatureTheme_Helper::has_active_widget();
}
?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<div class="container">
		<div class="row">
			<?php
			if ( NewfeatureTheme::$layout == 'left-sidebar' ) {
				get_sidebar();
			}
			?>
			<div class="<?php echo esc_attr( $newfeature_layout_class );?>">
				<main id="main" class="site-main">
					<div class="rt-search-post">
						<?php if ( have_posts() ) :?>
								<?php while ( have_posts() ) : the_post();
									get_template_part( 'template-parts/content-search', 'search' );
								?>
								<?php endwhile; ?>
						<?php else:?>
							<?php get_template_part( 'template-parts/content', 'none' );?>
						<?php endif;?>
					</div>
					<?php NewfeatureTheme_Helper::pagination();?>
				</main>					
			</div>
			<?php
			if ( NewfeatureTheme::$layout == 'right-sidebar' ) {
				get_sidebar();
			}
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>