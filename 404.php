
<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

wp_head();

if( !empty( NewfeatureTheme::$options['error_image1'] ) ) {
	$error_bg = wp_get_attachment_image( NewfeatureTheme::$options['error_image1'], 'full', true );
	$newfeature_error_img = $error_bg;
}else {
	$newfeature_error_img = "<img width='374' height='356' src='" . NEWFEATURE_IMG_URL . '404.png' . "' alt='" . esc_attr( get_bloginfo('name') ) . "'>";
}

if( !empty( NewfeatureTheme::$options['error_image2'] ) ) {
	$error_bg2 = wp_get_attachment_image( NewfeatureTheme::$options['error_image2'], 'full', true );
	$newfeature_error_img2 = $error_bg2;
}else {
	$newfeature_error_img2 = "<img width='281' height='267' src='" . NEWFEATURE_IMG_URL . '404_2.png' . "' alt='" . esc_attr( get_bloginfo('name') ) . "'>";
}

if( !empty( NewfeatureTheme::$options['error_bg'] ) ) {
	$body_bg2 = wp_get_attachment_image_url( NewfeatureTheme::$options['error_bg'], 'full', true );
	$newfeature_error_bg_img = $body_bg2;
}else {
	$newfeature_error_bg_img = NEWFEATURE_IMG_URL . 'error-bg.png';
}

?>
<div id="primary" class="content-area error-page-area" data-bg-image="<?php echo wp_kses( $newfeature_error_bg_img, 'allow_link' ); ?>" >
	<div class="container">
		<div class="error-page-content">
			<div class="item-img">
				<span class="left-img wow fadeInUp animated" data-wow-delay=".6s" data-wow-duration="1.5s"><?php echo wp_kses( $newfeature_error_img2, 'allow_link' ); ?></span>
				<span class="right-img wow fadeInDown animated" data-wow-delay=".6s" data-wow-duration="1.5s"><?php echo wp_kses( $newfeature_error_img, 'allow_link' ); ?></span>
			</div>
			<?php if ( !empty( NewfeatureTheme::$options['error_text1']) ) { ?>
			<h2 class="text-1"><?php echo wp_kses( NewfeatureTheme::$options['error_text1'] , 'alltext_allow' );?></h2>
			<?php } ?>
			<?php if ( !empty(NewfeatureTheme::$options['error_text2'])) { ?>
			<p class="text-2"><?php echo wp_kses( NewfeatureTheme::$options['error_text2'] , 'alltext_allow' );?></p>
			<?php } ?>
			<div class="go-home">
			  <a class="button-style-2 btn-common rt-animation-out" href="<?php echo esc_url( home_url( '/' ) );?>">
			  	<?php echo esc_html( NewfeatureTheme::$options['error_buttontext'] );?>
			  	<svg
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                width="34px"
                height="16px"
                viewBox="0 0 34.53 16"
                xml:space="preserve"
              >
                <rect
                  class="rt-button-line"
                  y="7.6"
                  width="34"
                  height=".4"
                ></rect>
                <g class="rt-button-cap-fake">
                  <path
                    class="rt-button-cap"
                    d="M25.83.7l.7-.7,8,8-.7.71Zm0,14.6,8-8,.71.71-8,8Z"
                  ></path>
                </g>
              </svg>
			  </a>
			</div>
		</div>
	</div>
</div>
<?php wp_footer(); ?>