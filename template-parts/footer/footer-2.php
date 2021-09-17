<?php
$newfeature_footer_column = NewfeatureTheme::$options['footer_column_2'];
switch ( $newfeature_footer_column ) {
	case '1':
	$newfeature_footer_class = 'col-sm-12 col-12';
	break;
	case '2':
	$newfeature_footer_class = 'col-sm-6 col-12';
	break;
	case '3':
	$newfeature_footer_class = 'col-md-4 col-12';
	break;		
	default:
	$newfeature_footer_class = 'col-lg-3 col-md-6 col-12';
	break;
}
// Logo
if( !empty( NewfeatureTheme::$options['footer_logo_light'] ) ) {
	$logo_lights = wp_get_attachment_image( NewfeatureTheme::$options['footer_logo_light'], 'full' );
	$newfeature_light_logo = $logo_lights;
}else {
	$newfeature_light_logo = "<img width='400' height='91' src='" . NEWFEATURE_IMG_URL . 'logo-light.png' . "' alt='" . esc_attr( get_bloginfo('name') ) . "'>";
}

$newfeature_socials = NewfeatureTheme_Helper::socials();

if( !empty( NewfeatureTheme::$options['fbgimg2'] ) ) {
	$f1_bg = wp_get_attachment_image_src( NewfeatureTheme::$options['fbgimg2'], 'full', true );
	$footer_bg_img = $f1_bg[0];
}else {
	$footer_bg_img = NEWFEATURE_IMG_URL . 'footer2_bg.jpg';
}

if ( NewfeatureTheme::$options['footer_bgtype2'] == 'fbgcolor2' ) {
	$newfeature_bg = NewfeatureTheme::$options['fbgcolor2'];
} else {
	$newfeature_bg = 'url(' . $footer_bg_img . ') no-repeat center bottom / cover';
}

?>

<?php if ( NewfeatureTheme::$footer_area == 1 ) { ?>	
	<div class="footer-top-area" style="background:<?php echo esc_html( $newfeature_bg ); ?>">
		<?php if ( NewfeatureTheme::$options['footer_shape2'] ) { ?>
			<ul class="shape-holder">
				<li class="shape1 wow fadeInUp" data-wow-delay="1.5s" data-wow-duration="1.5s">
					<img width="1852" height="488" loading='lazy' src="<?php echo NEWFEATURE_ASSETS_URL . 'element/footer-shape-3.png'; ?>" alt="<?php esc_html_e('footer-shape1', 'newfeature'); ?>">
				</li>
			</ul>
		<?php } ?>
		<div class="container">
			<?php if ( NewfeatureTheme::$options['footer2_logo'] || NewfeatureTheme::$options['footer2_social'] ) { ?>
			<div class="footer-logo-area">
				<?php if ( NewfeatureTheme::$options['footer2_logo'] ) { ?>
				<div class="footer-logo"><a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $newfeature_light_logo, 'allow_link' ); ?></a>
				</div>
				<?php } ?>
				<?php if ( $newfeature_socials && ( NewfeatureTheme::$options['footer2_social'] ) ) { ?>
				<ul class="footer-social">
					<?php foreach ( $newfeature_socials as $newfeature_social ): ?>
						<li><a target="_blank" href="<?php echo esc_url( $newfeature_social['url'] );?>"><i class="fab <?php echo esc_attr( $newfeature_social['icon'] );?>"></i></a></li>
					<?php endforeach; ?>
				</ul>
			<?php } ?>
			</div>
			<?php } ?>
			<div class="row">
				<?php
				for ( $i = 1; $i <= $newfeature_footer_column; $i++ ) {
					echo '<div class="' . $newfeature_footer_class . '">';
					dynamic_sidebar( 'footer-style-2-'. $i );
					echo '</div>';
				}
				?>
			</div>
		</div>		
	</div>
	<div class="footer-bottom-area">
		<div class="container">
			<div class="copyright"><?php echo wp_kses( NewfeatureTheme::$options['copyright_text'] , 'allow_link' );?></div>
		</div>
	</div>
<?php } ?>
