<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$nav_menu_args = NewfeatureTheme_Helper::nav_menu_args();
$newfeature_socials = NewfeatureTheme_Helper::socials();
// Logo

if( !empty( NewfeatureTheme::$options['logo'] ) ) {
	$logo_dark = wp_get_attachment_image( NewfeatureTheme::$options['logo'], 'full' );
	$newfeature_dark_logo = $logo_dark;
}else {
	$newfeature_dark_logo = "<img width='585' height='136' src='" . NEWFEATURE_IMG_URL . 'logo-dark.png' . "' alt='" . esc_attr( get_bloginfo('name') ) . "' loading='lazy'>"; 
}

if( !empty( NewfeatureTheme::$options['logo_light'] ) ) {
	$logo_lights = wp_get_attachment_image( NewfeatureTheme::$options['logo_light'], 'full' );
	$newfeature_light_logo = $logo_lights;
}else {
	$newfeature_light_logo = "<img width='585' height='136' src='" . NEWFEATURE_IMG_URL . 'logo-light.png' . "' alt='" . esc_attr( get_bloginfo('name') ) . "'>";
}

?>
<div class="masthead-container mobile-menu">
	<div class="header-menu container-custom" id="header-menu">
		<div class="container-fluid">
			<div class="menu-full-wrap">
				<div class="site-branding">
					<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $newfeature_dark_logo, 'allow_link' ); ?></a>
					<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $newfeature_light_logo, 'allow_link' ); ?></a>
				</div>				
				<div class="header-offcanvus">
					<?php get_template_part( 'template-parts/header/icon', 'menu' );?>
				</div>		
			</div>
		</div>
	</div>
</div>