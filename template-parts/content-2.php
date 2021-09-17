<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$thumb_size = 'newfeature-size1';

$newfeature_has_entry_meta  = ( NewfeatureTheme::$options['blog_date'] || NewfeatureTheme::$options['blog_author_name'] || NewfeatureTheme::$options['blog_comment_num'] || NewfeatureTheme::$options['blog_length'] && function_exists( 'newfeature_reading_time' ) || NewfeatureTheme::$options['blog_view'] && function_exists( 'newfeature_views' ) ) ? true : false;

$newfeature_time_html       = sprintf( '<span>%s</span><span>%s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );
$newfeature_time_html       = apply_filters( 'newfeature_single_time', $newfeature_time_html );

$newfeature_comments_number = number_format_i18n( get_comments_number() );
$newfeature_comments_html = $newfeature_comments_number == 1 ? esc_html__( 'Comment: ' , 'newfeature' ) : esc_html__( 'Comments: ' , 'newfeature' );
$newfeature_comments_html = $newfeature_comments_html . '<span class="comment-number">'. $newfeature_comments_number .'</span> ';

$id = get_the_ID();
$content = get_the_content();
$content = apply_filters( 'the_content', $content );
$content = wp_trim_words( get_the_excerpt(), NewfeatureTheme::$options['post_content_limit'], '' );

if ( empty(has_post_thumbnail() ) ) {
	$img_class ='no_image';
}else {
	$img_class ='show_image';
}

?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'blog-layout-2' ); ?>>
	<div class="blog-box <?php echo esc_attr($img_class); ?>">
		<?php if ( has_post_thumbnail() || NewfeatureTheme::$options['display_no_preview_image'] == '1'  ) { ?>
			<div class="blog-img-holder">
				<div class="blog-img">
					<a href="<?php the_permalink(); ?>" class="img-opacity-hover"><?php if ( has_post_thumbnail() ) { ?>
						<?php the_post_thumbnail( $thumb_size, ['class' => 'img-responsive'] ); ?>
						<?php } else {
							if ( NewfeatureTheme::$options['display_no_preview_image'] == '1' ) {
								if ( !empty( NewfeatureTheme::$options['no_preview_image']['id'] ) ) {
									$thumbnail = wp_get_attachment_image( NewfeatureTheme::$options['no_preview_image']['id'], $thumb_size );						
								}
								elseif ( empty( NewfeatureTheme::$options['no_preview_image']['id'] ) ) {
									$thumbnail = '<img class="wp-post-image" src="'.NEWFEATURE_IMG_URL.'noimage_870X525.jpg" alt="'. the_title_attribute( array( 'echo'=> false ) ) .'">';
								}
								echo wp_kses( $thumbnail , 'alltext_allow' );
							}
						}
					?>
					</a>
				</div>
				<?php if ( $newfeature_has_entry_meta ) { ?>
				<ul>
					<?php if ( NewfeatureTheme::$options['blog_author_name'] ) { ?>
					<li class="item-author"><i class="far fa-user"></i><?php esc_html_e( 'by ', 'newfeature' );?><?php the_author_posts_link(); ?></li>
					<?php } if ( NewfeatureTheme::$options['blog_date'] ) { ?>	
					<li class="blog-date"><i class="far fa-calendar"></i><?php echo get_the_date(); ?></li>				
					<?php } if ( NewfeatureTheme::$options['blog_comment_num'] ) { ?>
					<li class="blog-comment"><i class="far fa-comments"></i><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo wp_kses( $newfeature_comments_html , 'alltext_allow' );?></a></li>
					<?php } if ( NewfeatureTheme::$options['blog_length'] && function_exists( 'newfeature_reading_time' ) ) { ?>
					<li class="meta-reading-time meta-item"><i class="far fa-clock"></i><?php echo newfeature_reading_time(); ?></li>
					<?php } if ( NewfeatureTheme::$options['blog_view'] && function_exists( 'newfeature_views' ) ) { ?>
					<li><span class="meta-views meta-item "><i class="far fa-eye"></i><?php echo newfeature_views(); ?></span></li>
					<?php } ?>
				</ul>
				<?php } ?>
			</div>
		<?php } ?>
		<div class="entry-content">
			<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
			<?php the_excerpt();?>
			<?php if ( NewfeatureTheme::$options['blog_cats'] ) { ?>
				<span class="blog-cat"><?php echo the_category( ', ' );?></span>
			<?php } ?>
		</div>
	</div>
</div>