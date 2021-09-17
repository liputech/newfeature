<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
 
// Logo
if( !empty( NewfeatureTheme::$options['logo_light'] ) ) {
	$logo_lights = wp_get_attachment_image( NewfeatureTheme::$options['logo_light'], 'full' );
	$newfeature_light_logo = $logo_lights;
}else {
	$newfeature_light_logo = "<img width='585' height='136' src='" . NEWFEATURE_IMG_URL . 'logo-light.png' . "' alt='" . esc_attr( get_bloginfo('name') ) . "'>";
}

?>

<div class="additional-menu-area">
	<div class="sidenav sidemenu">
		<a href="#" class="closebtn"><i class="far fa-times-circle"></i></a>
		<div class="additional-logo">
			<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $newfeature_light_logo, 'allow_link' ); ?></a>
		</div>
		<?php wp_nav_menu( array( 'theme_location' => 'topright','container' => 'nav', 'container_class' => 'offscreen-navigation', 'menu_class' => 'menu' ) );?>
		
	</div>
    <button type="button" class="side-menu-open side-menu-trigger">
        <span class="menu-btn-icon">
          <span class="line line1"></span>
          <span class="line line2"></span>
          <span class="line line3"></span>
        </span>
      </button>
</div>