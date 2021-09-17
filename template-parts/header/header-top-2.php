<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$newfeature_socials = NewfeatureTheme_Helper::socials();
?>

<div id="tophead" class="header-top-bar align-items-center"> 
	<div class="container">
		<div class="top-bar-wrap">
			<div class="tophead-left">
				<div class="email">
				<i class="flaticon flaticon-envelope"></i><?php $header_mailus_txt = NewfeatureTheme::$options['header_mailus_txt'];
					if ( !empty( $header_mailus_txt ) ){ echo esc_html( $header_mailus_txt ); } else { esc_html_e( 'E-mail', 'newfeature' ); } ?>: <a href="mailto:<?php echo esc_attr( NewfeatureTheme::$options['email'] );?>"><?php echo wp_kses( NewfeatureTheme::$options['email'] , 'alltext_allow' );?></a></div>
				<div class="isono">
				<i class="flaticon flaticon-phone-call"></i><?php $header_hotline_txt = NewfeatureTheme::$options['header_hotline_txt'];
					if ( !empty( $header_hotline_txt ) ){ echo esc_html( $header_hotline_txt ); } else { esc_html_e( 'ISO No', 'newfeature' ); } ?>: <a href="mailto:<?php echo esc_attr( NewfeatureTheme::$options['phone'] );?>"><?php echo wp_kses( NewfeatureTheme::$options['phone'] , 'alltext_allow' );?></a></div>
			</div>
			<div class="tophead-right">
				<?php if ( $newfeature_socials ) { ?>
					<ul class="tophead-social">
						<?php foreach ( $newfeature_socials as $newfeature_social ): ?>
							<li><a target="_blank" href="<?php echo esc_url( $newfeature_social['url'] );?>"><i class="fab <?php echo esc_attr( $newfeature_social['icon'] );?>"></i></a></li>
						<?php endforeach; ?>
					</ul>
				<?php } ?>
			</div>
		</div>
	</div>
</div>

