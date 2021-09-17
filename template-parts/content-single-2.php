<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$newfeature_has_entry_meta  = ( NewfeatureTheme::$options['post_date'] || NewfeatureTheme::$options['post_author_name'] || NewfeatureTheme::$options['post_comment_num'] || NewfeatureTheme::$options['post_cats'] || ( NewfeatureTheme::$options['post_length'] && function_exists( 'newfeature_reading_time' ) ) || ( NewfeatureTheme::$options['post_view'] && function_exists( 'newfeature_views' ) ) ) ? true : false;

$newfeature_comments_number = number_format_i18n( get_comments_number() );
$newfeature_comments_html = $newfeature_comments_number == 1 ? esc_html__( 'Comment' , 'newfeature' ) : esc_html__( 'Comments' , 'newfeature' );
$newfeature_comments_html = '<span class="comment-number">'. $newfeature_comments_number .'</span> '. $newfeature_comments_html;
$newfeature_author_bio = get_the_author_meta( 'description' );

$newfeature_time_html       = sprintf( '<span>%s</span><span>%s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );
$newfeature_time_html       = apply_filters( 'newfeature_single_time', $newfeature_time_html );

$author = $post->post_author;

$news_author_fb = get_user_meta( $author, 'newfeature_facebook', true );
$news_author_tw = get_user_meta( $author, 'newfeature_twitter', true );
$news_author_ld = get_user_meta( $author, 'newfeature_linkedin', true );
$news_author_gp = get_user_meta( $author, 'newfeature_gplus', true );
$news_author_pr = get_user_meta( $author, 'newfeature_pinterest', true );
$newfeature_author_designation = get_user_meta( $author, 'newfeature_author_designation', true );

$post_layout_ops = get_post_meta( get_the_ID() ,'newfeature_post_layout', true );

?>
<div id="post-<?php the_ID(); ?>" <?php post_class($post_layout_ops); ?>>
	<?php if ( NewfeatureTheme::$options['post_featured_image'] == true ) { ?>
		<?php if ( has_post_thumbnail() ) { ?>
			<div class="entry-thumbnail-area"><?php the_post_thumbnail( 'newfeature-size1' , ['class' => 'img-responsive'] ); ?>
			</div>
		<?php } ?>
	<?php } ?>
	<div class="main-wrap">
	<div class="entry-header">
		<div class="entry-meta">
			<?php if ( $newfeature_has_entry_meta ) { ?>
			<ul class="post-light">
				<?php if ( NewfeatureTheme::$options['post_date'] ) { ?>	
				<li><i class="far fa-calendar-alt"></i><?php echo get_the_date(); ?></li>
				<?php } if ( NewfeatureTheme::$options['post_author_name'] ) { ?>
				<li class="item-author"><i class="far fa-user"></i><?php esc_html_e( 'by ', 'newfeature' );?><?php the_author_posts_link(); ?>
				</li>
				<?php } if ( NewfeatureTheme::$options['post_cats'] ) { ?>			
				<li class="blog-cat"><i class="far fa-folder-open"></i><?php echo the_category( ', ' );?></li>
				<?php } if ( NewfeatureTheme::$options['post_length'] && function_exists( 'newfeature_reading_time' ) ) { ?>
				<li class="meta-reading-time meta-item"><i class="far fa-clock"></i><?php echo newfeature_reading_time(); ?></li>
				<?php } if ( NewfeatureTheme::$options['post_view'] && function_exists( 'newfeature_views' ) ) { ?>
				<li><i class="far fa-eye"></i><span class="meta-views meta-item "><?php echo newfeature_views(); ?></span></li>
				<?php } if ( NewfeatureTheme::$options['post_comment_num'] ) { ?>
				<li><i class="far fa-comments"></i><?php echo wp_kses( $newfeature_comments_html , 'alltext_allow' ); ?></li>
				<?php } ?>
			</ul>
			<?php } ?>
			<?php if ( !empty(has_post_thumbnail() ) ) { ?>
				<h2 class="post-title"><?php the_title(); ?></h2>
			<?php } ?>		
			<div class="clear"></div>
		</div>
		
	</div>
	<div class="entry-content rt-single-content"><?php the_content();?>
		<?php wp_link_pages( array(
			'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'newfeature' ),
			'after'       => '</div>',
			'link_before' => '<span class="page-number">',
			'link_after'  => '</span>',
		) ); ?>
	</div>
	<?php if ( ( NewfeatureTheme::$options['post_tags'] && has_tag() ) || NewfeatureTheme::$options['post_share'] ) { ?>
	<div class="entry-footer">
		<div class="entry-footer-meta">
			<?php if ( NewfeatureTheme::$options['post_tags'] && has_tag() ) { ?>
			<div class="item-tags">
				<?php echo get_the_term_list( $post->ID, 'post_tag', '' ); ?>
			</div>	
			<?php } if ( ( NewfeatureTheme::$options['post_share'] ) && ( function_exists( 'newfeature_post_share' ) ) ) { ?>
			<div class="post-share"><ul><li><?php newfeature_post_share(); ?><a href="#" class="tag-link"><i class="fas fa-share-alt primary-text-color"></i></a></li></ul></div>
			<?php } ?>
		</div>
	</div>
	<?php } ?>
	<!-- author bio -->
	<?php if ( NewfeatureTheme::$options['post_author_bio'] == '1' ) { ?>
		<?php if ( !empty ( $newfeature_author_bio ) ) { ?>
		<div class="media about-author">
			<div class="<?php if ( is_rtl() ) { ?>pull-right<?php } else { ?>pull-left<?php } ?>">
				<?php echo get_avatar( $author, 105 ); ?>
			</div>
			<div class="media-body">
				<div class="about-author-info">
					<h3 class="author-title"><?php the_author_posts_link();?></h3>
				</div>
				<?php if ( $newfeature_author_bio ) { ?>
				<div class="author-bio"><?php echo esc_html( $newfeature_author_bio );?></div>
				<?php } ?>
				<ul class="author-box-social">
					<?php if ( ! empty( $news_author_fb ) ){ ?><li><a href="<?php echo esc_attr( $news_author_fb ); ?>"><i class="fab fa-facebook-f"></i></a></li><?php } ?>
					<?php if ( ! empty( $news_author_tw ) ){ ?><li><a href="<?php echo esc_attr( $news_author_tw ); ?>"><i class="fab fa-twitter"></i></a></li><?php } ?>
					<?php if ( ! empty( $news_author_gp ) ){ ?><li><a href="<?php echo esc_attr( $news_author_gp ); ?>"><i class="fab fa-google-plus-g"></i></a></li><?php } ?>
					<?php if ( ! empty( $news_author_ld ) ){ ?><li><a href="<?php echo esc_attr( $news_author_ld ); ?>"><i class="fab fa-linkedin-in"></i></a></li><?php } ?>
					<?php if ( ! empty( $news_author_pr ) ){ ?><li><a href="<?php echo esc_attr( $news_author_pr ); ?>"><i class="fab fa-pinterest"></i></a></li><?php } ?>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>
	<?php } ?>
	<!-- next/prev post -->
	<?php if ( NewfeatureTheme::$options['post_links'] ) { newfeature_post_links_next_prev(); } ?>
	<?php if( NewfeatureTheme::$options['show_related_post'] == '1' && is_single() && !empty ( newfeature_related_post() ) ) { ?>
		<div class="related-post">
			<?php newfeature_related_post(); ?>
		</div>
	<?php } ?>
	<?php
	if ( comments_open() || get_comments_number() ){
		comments_template();
	}
	?>	
	</div>
</div>