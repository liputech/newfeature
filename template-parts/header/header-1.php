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
$newfeature_top_meta  = ( NewfeatureTheme::$options['openhour'] || NewfeatureTheme::$options['phone'] || NewfeatureTheme::$options['email'] || NewfeatureTheme::$options['address'] || $newfeature_socials ) ? true : false;

?>
<?php if ( $newfeature_top_meta ) { ?>
<div class="masthead-container container-custom" id="header-top-fix">
	<div class="header-top">				
		<div class="header-address">
			<?php if ( NewfeatureTheme::$options['openhour'] ) { ?>
			<div>
				<div class="icon-left">
				<i class="flaticon flaticon-clock"></i>
				</div>
				<div class="info"><span class="info-label"><?php $header_open_txt = NewfeatureTheme::$options['header_open_txt'];
				if ( !empty( $header_open_txt ) ){ echo esc_html( $header_open_txt ); } else { esc_html_e( 'Saturday - Friday', 'newfeature' ); } ?>: </span><span class="info-text"><?php echo wp_kses( NewfeatureTheme::$options['openhour'] , 'alltext_allow' );?></span></div>
			</div>
			<?php } ?>
			<?php if ( NewfeatureTheme::$options['phone'] ) { ?>
			<div>
				<div class="icon-left">
				<i class="flaticon flaticon-phone-call"></i>
				</div>
				<div class="info"><span class="info-label"><?php $header_hotline_txt = NewfeatureTheme::$options['header_hotline_txt'];
				if ( !empty( $header_hotline_txt ) ){ echo esc_html( $header_hotline_txt ); } else { esc_html_e( 'Any Question', 'newfeature' ); } ?>: </span><span class="info-text"><a href="tel:<?php echo esc_attr( NewfeatureTheme::$options['phone'] );?>"><?php echo wp_kses( NewfeatureTheme::$options['phone'] , 'alltext_allow' );?></a></span></div>
			</div>
			<?php } ?>			
			<?php if ( NewfeatureTheme::$options['email'] ) { ?>
			<div>
				<div class="icon-left">
				<i class="flaticon flaticon-envelope"></i>
				</div>
				<div class="info"><span class="info-label"><?php $header_mailus_txt = NewfeatureTheme::$options['header_mailus_txt'];
				if ( !empty( $header_mailus_txt ) ){ echo esc_html( $header_mailus_txt ); } else { esc_html_e( 'Mail to us', 'newfeature' ); } ?>: </span><span class="info-text"><a href="mailto:<?php echo esc_attr( NewfeatureTheme::$options['email'] );?>"><?php echo wp_kses( NewfeatureTheme::$options['email'] , 'alltext_allow' );?></a></span></div>
			</div>
			<?php } ?>
			<?php if ( NewfeatureTheme::$options['address'] ) { ?>
			<div>
				<div class="icon-left">
				<i class="flaticon flaticon-location"></i>
				</div>
				<div class="info"><span class="info-label"><?php $header_location = NewfeatureTheme::$options['header_location'];
				if ( !empty( $header_location ) ){ echo esc_html( $header_location ); } else { esc_html_e( 'Our Address', 'newfeature' ); } ?>: </span><span class="info-text"><?php echo wp_kses( NewfeatureTheme::$options['address'] , 'alltext_allow' );?></span></div>
			</div>
			<?php } ?>
		</div>
		<?php if ( $newfeature_socials ) { ?>
			<ul class="header-social">
				<?php foreach ( $newfeature_socials as $newfeature_social ): ?>
					<li><a target="_blank" href="<?php echo esc_url( $newfeature_social['url'] );?>"><i class="fab <?php echo esc_attr( $newfeature_social['icon'] );?>"></i></a></li>
				<?php endforeach; ?>
			</ul>
		<?php } ?>
	</div>
</div>
<?php } ?>
<div class="header-menu mobile-menu container-custom" id="header-menu">
	<div class="menu-full-wrap">
		<div class="site-branding">
			<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $newfeature_dark_logo, 'allow_link' ); ?></a>
			<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $newfeature_light_logo, 'allow_link' ); ?></a>
		</div>
		<div class="menu-wrap">
			<div id="site-navigation" class="main-navigation">
				<?php wp_nav_menu( $nav_menu_args );?>
			</div>
		</div>
		<?php if ( NewfeatureTheme::$options['search_icon'] ) { ?>
		<div class="header-search-one">
			<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) )  ?>" class="search-form">
				<input required="" type="text" id="search-form-5f51fb188e3b0" class="search-field" placeholder="Search …" value="" name="s">
				<button class="search-button" type="submit">
					<i class="fa fa-search" aria-hidden="true"></i>
				</button>
			</form>
		</div>	
		<?php } ?>	
	</div>
</div>