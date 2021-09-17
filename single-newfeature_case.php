<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
// Layout class
if ( NewfeatureTheme::$layout == 'full-width' ) {
	$newfeature_layout_class = 'col-sm-12 col-12';
}
else{
	$newfeature_layout_class = NewfeatureTheme_Helper::has_active_widget();
}

?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<div class="container">
		<div class="row">
			<?php if ( NewfeatureTheme::$layout == 'left-sidebar' ) { get_sidebar(); } ?>
				<div class="<?php echo esc_attr( $newfeature_layout_class );?>">
					<main id="main" class="site-main">
						<?php							
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-single', 'case' );
							endwhile;						
						?>
					</main>
				</div>
			<?php if ( NewfeatureTheme::$layout == 'right-sidebar' ) { get_sidebar(); }	?>
		</div>
	</div>
</div>
<?php get_footer(); ?>