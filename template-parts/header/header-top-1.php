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
				<div class="address">
				<i class="flaticon flaticon-location"></i><?php $header_location = NewfeatureTheme::$options['header_location'];
					if ( !empty( $header_location ) ){ echo esc_html( $header_location ); } else { esc_html_e( 'Location', 'newfeature' ); } ?>: <?php if ( NewfeatureTheme::$options['address'] ) { ?><?php echo wp_kses( NewfeatureTheme::$options['address'] , 'alltext_allow' );?><?php } ?></div>
				<div class="email">
				<i class="flaticon flaticon-envelope"></i><?php $header_mailus_txt = NewfeatureTheme::$options['header_mailus_txt'];
					if ( !empty( $header_mailus_txt ) ){ echo esc_html( $header_mailus_txt ); } else { esc_html_e( 'E-mail Us', 'newfeature' ); } ?>: <a href="mailto:<?php echo esc_attr( NewfeatureTheme::$options['email'] );?>"><?php echo wp_kses( NewfeatureTheme::$options['email'] , 'alltext_allow' );?></a></div>
			</div>
			<div class="tophead-right">
				<?php if ( NewfeatureTheme::$options['online_button'] == '1' ) { ?>
					<div class="header-button">
						<a target="_self" href="<?php echo esc_url( NewfeatureTheme::$options['online_button_link']  );?>"><i class="far fa-file-alt"></i><?php echo esc_html( NewfeatureTheme::$options['online_button_text'] );?></a>
					</div>
				<?php } ?>
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