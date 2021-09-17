<?php
if ( post_password_required() ) {
    return;
}
?>
<div id="comments" class="comments-area single-blog-bottom">
    <?php
		if ( have_comments() ):
		$newfeature_comment_count = get_comments_number();
		$newfeature_comments_text = number_format_i18n( $newfeature_comment_count ) . ' ';
		if ( $newfeature_comment_count > 1 && $newfeature_comment_count != 0 ) {
			$newfeature_comments_text .= esc_html__( 'Comments', 'newfeature' );
		} else if ( $newfeature_comment_count == 0 ) {
			$newfeature_comments_text .= esc_html__( 'Comment', 'newfeature' );
		} else {
			$newfeature_comments_text .= esc_html__( 'Comment', 'newfeature' );
		}
	?>
		<h4><?php echo esc_html( $newfeature_comments_text );?></h4>
	<?php
		$newfeature_avatar = get_option( 'show_avatars' );
	?>
		<ul class="comment-list<?php echo empty( $newfeature_avatar ) ? ' avatar-disabled' : '';?>">
		<?php
			wp_list_comments(
				array(
					'style'             => 'ul',
					'callback'          => 'NewfeatureTheme_Helper::comments_callback',
					'reply_text'        => esc_html__( 'Reply', 'newfeature' ),
					'avatar_size'       => 105,
					'format'            => 'html5',
					)
				);
		?>
		</ul>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<nav class="pagination-area comment-navigation">
				<ul>
					<li><?php previous_comments_link( esc_html__( 'Older Comments', 'newfeature' ) ); ?></li>
					<li><?php next_comments_link( esc_html__( 'Newer Comments', 'newfeature' ) ); ?></li>
				</ul>
			</nav><!-- #comment-nav-below -->
		<?php endif; // Check for comment navigation.?>

	<?php endif; ?>

	<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'newfeature' ); ?></p>
	<?php endif;?>
	<div>
	<?php
		$newfeature_commenter = wp_get_current_commenter();
		$newfeature_req = get_option( 'require_name_email' );
		$newfeature_aria_req = ( $newfeature_req ? " required" : '' );

		$newfeature_fields =  array(
			'author' =>
			'<div class="row"><div class="col-sm-6"><div class="form-group comment-form-author"><input type="text" id="author" name="author" value="' . esc_attr( $newfeature_commenter['comment_author'] ) . '" placeholder="'. esc_attr__( 'Name', 'newfeature' ).( $newfeature_req ? ' *' : '' ).'" class="form-control"' . $newfeature_aria_req . '></div></div>',

			'email' =>
			'<div class="col-sm-6 comment-form-email"><div class="form-group"><input id="email" name="email" type="email" value="' . esc_attr(  $newfeature_commenter['comment_author_email'] ) . '" class="form-control" placeholder="'. esc_attr__( 'Email', 'newfeature' ).( $newfeature_req ? ' *' : '' ).'"' . $newfeature_aria_req . '></div></div></div>',
			);

		$newfeature_args = array(
			'class_submit'      => 'submit btn-send ghost-on-hover-btn',
			'submit_field'         => '<div class="form-group form-submit">%1$s %2$s</div>',
			'comment_field' =>  '<div class="form-group comment-form-comment"><textarea id="comment" name="comment" required placeholder="'.esc_attr__( 'Comment *', 'newfeature' ).'" class="textarea form-control" rows="10" cols="40"></textarea></div>',
			'title_reply_before' => '<h4 id="reply-title" class="comment-reply-title">',
			'title_reply_after' => '</h4>',
			'fields' => apply_filters( 'comment_form_default_fields', $newfeature_fields ),
			);

	?>
	<?php comment_form( $newfeature_args );?>
	</div>
</div>