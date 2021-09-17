<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$nav_menu_args = NewfeatureTheme_Helper::nav_menu_args();

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

<div class="header-menu menu-layout5" id="header-menu">
	<div class="container">
		<div class="menu-full-wrap">
			<div class="header-logo">
				<div class="site-branding">
					<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $newfeature_dark_logo, 'allow_link' ); ?></a>
					<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $newfeature_light_logo, 'allow_link' ); ?></a>
				</div>
			</div>
			<div class="menu-wrap">
				<div id="site-navigation" class="main-navigation">
					<?php wp_nav_menu( $nav_menu_args );?>
				</div>
			</div>
			<div class="header-right-wrap">
				<?php if ( NewfeatureTheme::$options['search_icon'] ) { ?>
					<?php get_template_part( 'template-parts/header/icon', 'search' );?>
				<?php } ?>
				<?php if ( NewfeatureTheme::$options['online_button'] == '1' ) { ?>
				<div class="header-right">
					<div class="header-button">
						<a class="button-btn" target="_self" href="<?php echo esc_url( NewfeatureTheme::$options['online_button_link']  );?>"><?php echo esc_html( NewfeatureTheme::$options['online_button_text'] );?></a>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>