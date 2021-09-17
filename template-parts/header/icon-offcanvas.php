<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
$newfeature_socials = NewfeatureTheme_Helper::socials();
// Logo
if( !empty( NewfeatureTheme::$options['logo_light'] ) ) {
	$logo_lights = wp_get_attachment_image( NewfeatureTheme::$options['logo_light'], 'full' );
	$newfeature_light_logo = $logo_lights;
}else {
	$newfeature_light_logo = "<img width='585' height='136' src='" . NEWFEATURE_IMG_URL . 'logo-light.png' . "' alt='" . esc_attr( get_bloginfo('name') ) . "'>";
}
$newfeature_addit_info  = ( NewfeatureTheme::$options['address'] || NewfeatureTheme::$options['phone'] || NewfeatureTheme::$options['email'] ) ? true : false;

?>

<div class="additional-menu-area">
	<div class="sidenav sidecanvas">
		<div class="canvas-content">
		<a href="#" class="closebtn"><i class="far fa-times-circle"></i></a>
		<div class="additional-logo rt-anima rt-anima-one">
			<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $newfeature_light_logo, 'allow_link' ); ?></a>
		</div>
		<div class="sidenav-address">
			<?php if ( !empty ( NewfeatureTheme::$options['sidetext_label'] ) ) { ?>
			<h4 class="rt-anima rt-anima-two"><?php echo wp_kses( NewfeatureTheme::$options['sidetext_label'] , 'alltext_allow' );?></h4>
			<?php } ?>
			<span class="rt-anima rt-anima-three"><?php echo wp_kses( NewfeatureTheme::$options['sidetext'] , 'alltext_allow' );?></span>
		<div class="rt-anima rt-anima-four">
		<?php if ( !empty ( $newfeature_addit_info ) ) { ?>
			<?php if ( !empty ( NewfeatureTheme::$options['address_label'] ) ) { ?>
			<h4><?php echo wp_kses( NewfeatureTheme::$options['address_label'] , 'alltext_allow' );?></h4>
		<?php } } ?>
		<?php if ( $newfeature_addit_info ) { ?>
			<?php if ( NewfeatureTheme::$options['address'] ) { ?>
			<span><i class="fas fa-map-marker-alt list-icon"></i><?php echo wp_kses( NewfeatureTheme::$options['address'] , 'alltext_allow' );?></span>
			<?php } ?>
			<?php if ( NewfeatureTheme::$options['email'] ) { ?>
			<span><i class="fas fa-envelope list-icon"></i><a href="mailto:<?php echo esc_attr( NewfeatureTheme::$options['email'] );?>"><?php echo esc_html( NewfeatureTheme::$options['email'] );?></a></span>
			<?php } ?>			
			<?php if ( NewfeatureTheme::$options['phone'] ) { ?>
			<span><i class="fas fa-phone-alt list-icon"></i><a href="tel:<?php echo esc_attr( NewfeatureTheme::$options['phone'] );?>"><?php echo esc_html( NewfeatureTheme::$options['phone'] );?></a></span>
			<?php } ?>
		<?php } ?>
		</div>
		<?php if ( !empty ( $newfeature_socials ) ) { ?>
			<?php if ( !empty ( NewfeatureTheme::$options['social_label'] ) ) { ?>
			<h4 class="rt-anima rt-anima-five"><?php echo wp_kses( NewfeatureTheme::$options['social_label'] , 'alltext_allow' );?></h4>
		<?php } } ?>
			<?php if ( $newfeature_socials ) { ?>
				<div class="sidenav-social rt-anima rt-anima-six">
					<?php foreach ( $newfeature_socials as $newfeature_social ): ?>
						<span><a target="_blank" href="<?php echo esc_url( $newfeature_social['url'] );?>"><i class="fab <?php echo esc_attr( $newfeature_social['icon'] );?>"></i></a></span>
					<?php endforeach; ?>					
				</div>						
			<?php } ?>
		</div>
		</div>
	</div>
    <button type="button" class="side-menu-open side-menu-trigger">
        <span class="menu-btn-icon">
          <span class="line line1"></span>
          <span class="line line2"></span>
          <span class="line line3"></span>
        </span>
      </button>
</div>