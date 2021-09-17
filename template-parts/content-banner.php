<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
 
if ( is_404() ) {
	$newfeature_title = NewfeatureTheme::$options['error_title'];
} else if ( is_search() ) {
	$newfeature_title = esc_html__( 'Search Results for : ', 'newfeature' ) . get_search_query();
} else if ( is_home() ) {
	if ( get_option( 'page_for_posts' ) ) {
		$newfeature_title = get_the_title( get_option( 'page_for_posts' ) );
	}
	else {
		$newfeature_title = apply_filters( 'theme_blog_title', esc_html__( 'All Posts', 'newfeature' ) );
	}
} else if ( is_archive() ) {
	$newfeature_title = get_the_archive_title();
} else if ( is_page() ) {
	$newfeature_title = get_the_title();
} else if ( is_single() ) {
	$newfeature_title = get_the_title();
}

if ( !empty( NewfeatureTheme::$options['post_banner_title'] ) ){
	$post_banner_title = NewfeatureTheme::$options['post_banner_title'];
} else {
	$post_banner_title = esc_html__( 'Our News' , 'newfeature' );
}

?>
<?php if ( NewfeatureTheme::$has_banner === 1 || NewfeatureTheme::$has_banner === "on" ): ?>
	<div class="entry-banner">
		<div class="container">
			<div class="entry-banner-content">
				<?php if ( is_single() ) { ?>
				<h1 class="entry-title"><?php echo wp_kses( $newfeature_title , 'alltext_allow' );?></h1>
				<?php } else if ( is_page() ) { ?>
					<h1 class="entry-title"><?php echo wp_kses( $newfeature_title , 'alltext_allow' );?></h1>
				<?php } else { ?>
					<h1 class="entry-title"><?php echo wp_kses( $newfeature_title , 'alltext_allow' );?></h1>
				<?php } ?>
				<?php if ( NewfeatureTheme::$has_breadcrumb == 1 ) { ?>
					<?php get_template_part( 'template-parts/content', 'breadcrumb' );?>
				<?php } ?>
			</div>
		</div>
	</div>
<?php endif; ?>