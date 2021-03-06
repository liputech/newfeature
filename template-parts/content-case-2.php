<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$thumb_size = 'newfeature-size5';
$id 		= get_the_ID();
$newfeature_port_no  = get_post_meta( $post->ID, 'newfeature_port_no', true );

?>
<article id="post-<?php the_ID(); ?>">
	<div class="rtin-item multi-side-hover">
		<div class="rtin-figure">
			<?php
				if ( has_post_thumbnail() ){
					the_post_thumbnail( $thumb_size, ['class' => 'img-fluid mb-10 width-100'] );
				} else {
					if ( !empty( NewfeatureTheme::$options['no_preview_image']['id'] ) ) {
						echo wp_get_attachment_image( NewfeatureTheme::$options['no_preview_image']['id'], $thumb_size );
					} else {
						echo '<img class="wp-post-image" src="' . NewfeatureTheme_Helper::get_img( 'noimage_370X328.jpg' ) . '" alt="'.get_the_title().'">';
					}
				}
			?>
			<a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" class="newfeature-popup-zoom img-popup-icon" title="<?php echo get_the_title(); ?>"><i class="fas fa-search"></i></a>
			<h3 class="rtin-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>

			<?php if ( NewfeatureTheme::$options['case_ar_category'] ) { ?>
			<span class="rtin-cat"><?php
				$i = 1;
				$term_lists = get_the_terms( get_the_ID(), 'newfeature_case_category' );
				foreach ( $term_lists as $term_list ){ 
				$link = get_term_link( $term_list->term_id, 'newfeature_case_category' ); ?><?php if ( $i > 1 ){ echo esc_html( ' / ' ); } ?><a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $term_list->name ); ?></a><?php $i++; } ?></span>
			<?php } ?>	
		</div>
		<div class="item-overlay"></div>
	</div>
</article>