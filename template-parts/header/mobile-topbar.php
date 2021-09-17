<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$newfeature_socials = NewfeatureTheme_Helper::socials();

$newfeature_mobile_meta  = ( NewfeatureTheme::$options['mobile_openhour'] || NewfeatureTheme::$options['mobile_phone'] || NewfeatureTheme::$options['mobile_email'] || NewfeatureTheme::$options['mobile_address'] || NewfeatureTheme::$options['mobile_social'] && $newfeature_socials || NewfeatureTheme::$options['mobile_search'] || NewfeatureTheme::$options['mobile_button'] ) ? true : false;

?>
<?php if ( $newfeature_mobile_meta ) { ?>
<div class="mobile-top-bar" id="mobile-top-fix">
	<div class="header-top">
		<?php if ( NewfeatureTheme::$options['mobile_openhour'] ) { ?>
		<div>
			<div class="icon-left">
			<i class="flaticon flaticon-clock"></i>
			</div>
			<div class="info"><span class="info-label"><?php $header_open_txt = NewfeatureTheme::$options['header_open_txt'];
			if ( !empty( $header_open_txt ) ){ echo esc_html( $header_open_txt ); } else { esc_html_e( 'Saturday - Friday', 'newfeature' ); } ?>: </span><span class="info-text"><?php echo wp_kses( NewfeatureTheme::$options['openhour'] , 'alltext_allow' );?></span></div>
		</div>
		<?php } ?>
		<?php if ( NewfeatureTheme::$options['mobile_phone'] ) { ?>
		<div>
			<div class="icon-left">
			<i class="flaticon flaticon-phone-call"></i>
			</div>
			<div class="info"><span class="info-label"><?php $header_hotline_txt = NewfeatureTheme::$options['header_hotline_txt'];
			if ( !empty( $header_hotline_txt ) ){ echo esc_html( $header_hotline_txt ); } else { esc_html_e( 'Any Question', 'newfeature' ); } ?>: </span><span class="info-text"><a href="tel:<?php echo esc_attr( NewfeatureTheme::$options['phone'] );?>"><?php echo wp_kses( NewfeatureTheme::$options['phone'] , 'alltext_allow' );?></a></span></div>
		</div>
		<?php } ?>			
		<?php if ( NewfeatureTheme::$options['mobile_email'] ) { ?>
		<div>
			<div class="icon-left">
			<i class="flaticon flaticon-envelope"></i>
			</div>
			<div class="info"><span class="info-label"><?php $header_mailus_txt = NewfeatureTheme::$options['header_mailus_txt'];
			if ( !empty( $header_mailus_txt ) ){ echo esc_html( $header_mailus_txt ); } else { esc_html_e( 'Mail to us', 'newfeature' ); } ?>: </span><span class="info-text"><a href="mailto:<?php echo esc_attr( NewfeatureTheme::$options['email'] );?>"><?php echo wp_kses( NewfeatureTheme::$options['email'] , 'alltext_allow' );?></a></span></div>
		</div>
		<?php } ?>
		<?php if ( NewfeatureTheme::$options['mobile_address'] ) { ?>
		<div>
			<div class="icon-left">
			<i class="flaticon flaticon-location"></i>
			</div>
			<div class="info"><span class="info-label"><?php $header_location = NewfeatureTheme::$options['header_location'];
			if ( !empty( $header_location ) ){ echo esc_html( $header_location ); } else { esc_html_e( 'Our Address', 'newfeature' ); } ?>: </span><span class="info-text"><?php echo wp_kses( NewfeatureTheme::$options['address'] , 'alltext_allow' );?></span></div>
		</div>
		<?php } ?>
	</div>
	<?php if ( NewfeatureTheme::$options['mobile_social'] && $newfeature_socials ) { ?>
		<ul class="header-social">
			<?php foreach ( $newfeature_socials as $newfeature_social ): ?>
				<li><a target="_blank" href="<?php echo esc_url( $newfeature_social['url'] );?>"><i class="fab <?php echo esc_attr( $newfeature_social['icon'] );?>"></i></a></li>
			<?php endforeach; ?>
		</ul>
	<?php } ?>
	<?php if ( NewfeatureTheme::$options['mobile_search'] || NewfeatureTheme::$options['mobile_button']) { ?>
	<div class="header-right-wrap">
		<?php if ( NewfeatureTheme::$options['mobile_search'] ) { ?>
			<?php get_template_part( 'template-parts/header/icon', 'search' );?>
		<?php } ?>
		<?php if ( NewfeatureTheme::$options['mobile_button'] ) { ?>
		<div class="header-right">
			<div class="header-button">
				<a class="button-btn" target="_self" href="<?php echo esc_url( NewfeatureTheme::$options['online_button_link']  );?>"><?php echo esc_html( NewfeatureTheme::$options['online_button_text'] );?></a>
			</div>
		</div>
		<?php } ?>
	</div>
	<?php } ?>
</div>
<?php } ?>