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
$newfeature_is_post_archive = is_home() || ( is_archive() && get_post_type() == 'post' ) ? true : false;

if ( is_post_type_archive( "newfeature_service" ) || is_tax( "newfeature_service_category" ) ) {
		get_template_part( 'template-parts/archive', 'service' );
	return;
}
if ( is_post_type_archive( "newfeature_case" ) || is_tax( "newfeature_case_category" ) ) {
		get_template_part( 'template-parts/archive', 'case' );
	return;
}
if ( is_post_type_archive( "newfeature_team" ) || is_tax( "newfeature_team_category" ) ) {
		get_template_part( 'template-parts/archive', 'team' );
	return;
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
					<?php
					if ( have_posts() ) { ?>
						<?php
						if ( $newfeature_is_post_archive && NewfeatureTheme::$options['blog_style'] == 'style1' ) {
							echo '<div class="row rt-masonry-grid">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-1', get_post_format() );
							endwhile;
							echo '</div>';
						} else if ( $newfeature_is_post_archive && NewfeatureTheme::$options['blog_style'] == 'style2' ) {
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-2', get_post_format() );
							endwhile;
						} else if ( class_exists( 'Newfeature_Core' ) ) {
							if ( is_tax( 'newfeature_portfolio_category' ) ) {
								echo '<div class="row rt-masonry-grid">';
								while ( have_posts() ) : the_post();
									get_template_part( 'template-parts/content-1', get_post_format() );
								endwhile;
								echo '</div>';
							}							
						}
						else {
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-1', get_post_format() );
							endwhile;
						}

						?>
						<?php NewfeatureTheme_Helper::pagination(); ?>
						
					<?php } else {?>
						<?php get_template_part( 'template-parts/content', 'none' );?>
					<?php } ?>
				</main>
			</div>
			<?php
			if( NewfeatureTheme::$layout == 'right-sidebar' ){				
				get_sidebar();
			}
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
