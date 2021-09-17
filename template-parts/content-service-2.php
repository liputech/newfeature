<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$id = get_the_ID();
$content = get_the_content();
$content = apply_filters( 'the_content', $content );
$content = wp_trim_words( get_the_excerpt(), NewfeatureTheme::$options['service_excerpt_limit'], '' );
$newfeature_service_icon   	= get_post_meta( get_the_ID(), 'newfeature_service_icon', true );

?>
<article id="post-<?php the_ID(); ?>">
	<div class="rtin-item">
		<div class="services-item-overlay"></div>
		<div class="rtin-header">
			<i class="<?php echo wp_kses_post( $newfeature_service_icon );?>"></i>
			<h3 class="rtin-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
		</div>
		<div class="rtin-content">			
			<div class="service-text"><?php echo wp_kses( $content , 'alltext_allow' ); ?></div>	
			<?php if ( NewfeatureTheme::$options['service_ar_button'] ) { ?>
				<div class="service-button">
					<a href="<?php the_permalink(); ?>" class="button-style-1 btn-common rt-animation-out" >
						<?php esc_html_e( 'Discover Now', 'newfeature' );?>
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
			<?php } ?>			
		</div>
	</div>
</article>