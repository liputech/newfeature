<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if( ! function_exists( 'newfeature_related_case' )){
	
	function newfeature_related_case(){
		$thumb_size = 'newfeature-size3';
		$post_id = get_the_id();	
		$number_of_avail_post = '';
		$current_post = array( $post_id );
		$title_length = NewfeatureTheme::$options['related_case_title_limit'] ? NewfeatureTheme::$options['related_case_title_limit'] : '';
		$related_post_number = NewfeatureTheme::$options['related_case_number'];
		
		$case_related_title  = get_post_meta( get_the_ID(), 'case_related_title', true );

		# Making ready to the Query ...
		$query_type = NewfeatureTheme::$options['related_post_query'];

		$args = array(
			'post_type'				 => 'newfeature_case',
			'post__not_in'           => $current_post,
			'posts_per_page'         => $related_post_number,
			'no_found_rows'          => true,
			'post_status'            => 'publish',
			'ignore_sticky_posts'    => true,
			'update_post_term_cache' => false,
		);

		# Checking Related Posts Order ----------
		if( NewfeatureTheme::$options['related_post_sort'] ){

			$post_order = NewfeatureTheme::$options['related_post_sort'];

			if( $post_order == 'rand' ){

				$args['orderby'] = 'rand';
			}
			elseif( $post_order == 'views' ){

				$args['orderby']  = 'meta_value_num';
				$args['meta_key'] = 'newfeature_views';
			}
			elseif( $post_order == 'popular' ){

				$args['orderby'] = 'comment_count';
			}
			elseif( $post_order == 'modified' ){

				$args['orderby'] = 'modified';
				$args['order']   = 'ASC';
			}
			elseif( $post_order == 'recent' ){

				$args['orderby'] = '';
				$args['order']   = '';
			}
		}


		# Get related posts by author ----------
		if( $query_type == 'author' ){
			$args['author'] = get_the_author_meta( 'ID' );
		}

		# Get related posts by tags ----------
		elseif( $query_type == 'tag' ){
			$tags_ids  = array();
			$post_tags = get_the_terms( $post_id, 'post_tag' );

			if( ! empty( $post_tags ) ){
				foreach( $post_tags as $individual_tag ){
					$tags_ids[] = $individual_tag->term_id;
				}

				$args['tag__in'] = $tags_ids;
			}
		}

		# Get related posts by categories ----------
		else{
			
			$terms = get_the_terms( $post_id, 'newfeature_case_category' );
			if ( $terms && ! is_wp_error( $terms ) ) {
			 
				$port_cat_links = array();
			 
				foreach ( $terms as $term ) {
					$port_cat_links[] = $term->term_id;
				}
			}
			
			$args['tax_query'] = array (
				array (
					'taxonomy' => 'newfeature_case_category',
					'field'    => 'ID',
					'terms'    => $port_cat_links,
				)
			);

		}

		# Get the posts ----------
		$related_query = new wp_query( $args );
		/*the_carousel*/
		if ( NewfeatureTheme::$layout == 'full-width' ) {
			$responsive = array(
				'0'    => array( 'items' => 1 ),
				'480'  => array( 'items' => 2 ),
				'768'  => array( 'items' => 2 ),
				'992'  => array( 'items' => 3 ),
			);
		}
		else {
			$responsive = array(
				'0'    => array( 'items' => 1 ),
				'480'  => array( 'items' => 2 ),
				'768'  => array( 'items' => 2 ),
				'992'  => array( 'items' => 3 ),
			);
		}
		
		$count_post = $related_query->post_count;
		if ( $count_post < 4 ) {
			$number_of_avail_post = false;
		} else {
			$number_of_avail_post = true;
		}
		$owl_data = array( 
			'nav'                => false,
			'dots'               => false,
			'autoplay'           => false,
			'autoplayTimeout'    => '5000',
			'autoplaySpeed'      => '200',
			'autoplayHoverPause' => true,
			'loop'               => $number_of_avail_post,
			'margin'             => 30,
			'responsive'         => $responsive
		);

		$owl_data = json_encode( $owl_data );
		wp_enqueue_style( 'owl-carousel' );
		wp_enqueue_style( 'owl-theme-default' );
		wp_enqueue_script( 'owl-carousel' );		
		
		$wrapper_class = '';
		if ( !$count_post ) {
			$wrapper_class .= ' no-nav';
		}
		
		if( $related_query->have_posts() ) { ?>
		
		<div class="case-default case-multi-layout-1 owl-wrap rt-related-post <?php echo esc_attr( $wrapper_class );?>">
			<div class="title-section">
			<?php if ( NewfeatureTheme::$options['case_related_title'] ) { ?>
			<h3 class="related-title"><?php echo wp_kses( NewfeatureTheme::$options['case_related_title'] , 'alltext_allow' );?></h3><?php } ?>
				<?php if ( $count_post > 3 ){ ?>
				<div class="owl-custom-nav owl-nav">
					<div class="owl-prev"><i class="flaticon flaticon-previous"></i></div><div class="owl-next"><i class="flaticon flaticon-next"></i></div>
				</div>
				<?php } ?>
				<div class="owl-custom-nav-bar"></div>
				<div class="clear"></div>
			</div>
			<div class="owl-theme owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr( $owl_data );?>">
				<?php
					while ( $related_query->have_posts() ) {
					$related_query->the_post();
					$trimmed_title = wp_trim_words( get_the_title(), $title_length, '' );
				?>
					<div class="rtin-item">
						<div class="rtin-figure">
							<a href="<?php the_permalink(); ?>">
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
							</a>
						</div>
						<div class="rtin-content">		
							<h3 class="rtin-title"><a href="<?php the_permalink();?>"><?php echo esc_html( $trimmed_title ); ?></a></h3>
							<div class="rtin-cat"><?php
								$i = 1;
								$term_lists = get_the_terms( get_the_ID(), 'newfeature_case_category' );
								foreach ( $term_lists as $term_list ){ 
								$link = get_term_link( $term_list->term_id, 'newfeature_case_category' ); ?><?php if ( $i > 1 ){ echo esc_html( ' / ' ); } ?><a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $term_list->name ); ?></a><?php $i++; } ?></div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
		<?php }
		wp_reset_postdata();
	}
}
?>