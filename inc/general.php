<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( !isset( $content_width ) ) {
	$content_width = 1200;
}

add_action('after_setup_theme', 'newfeature_setup');
if ( !function_exists( 'newfeature_setup' ) ) {
	function newfeature_setup() {
		// Language
		load_theme_textdomain( 'newfeature', NEWFEATURE_BASE_DIR . 'languages' );

		// Theme support
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		remove_theme_support('widgets-block-editor');
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
		add_theme_support( 'post-formats', array( 'aside', 'gallery', 'video', 'audio' ) );
		// for gutenberg support
		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-color-palette', array(
			array(
				'name' => esc_html__( 'Primary Color', 'newfeature' ),
				'slug' => 'newfeature-primary',
				'color' => '#0554f2',
			),
			array(
				'name' => esc_html__( 'Secondary Color', 'newfeature' ),
				'slug' => 'newfeature-secondary',
				'color' => '#14133b',
			),
			array(
				'name' => esc_html__( 'dark gray', 'newfeature' ),
				'slug' => 'newfeature-button-dark-gray',
				'color' => '#333333',
			),
			array(
				'name' => esc_html__( 'light gray', 'newfeature' ),
				'slug' => 'newfeature-button-light-gray',
				'color' => '#a5a5a5',
			),
			array(
				'name' => esc_html__( 'white', 'newfeature' ),
				'slug' => 'newfeature-button-white',
				'color' => '#ffffff',
			),
		) );
		add_theme_support( 'editor-gradient-presets', array(
			array(
				'name'     => esc_html__( 'Gradient Color', 'newfeature' ),
				'gradient' => 'linear-gradient(135deg, rgba(255, 0, 0, 1) 0%, rgba(252, 75, 51, 1) 100%)',
				'slug'     => 'newfeature_gradient_color',
			),
		));	
		add_theme_support( 'editor-font-sizes', array(
			array(
				'name' => esc_html__( 'Small', 'newfeature' ),
				'size' => 12,
				'slug' => 'small'
			),
			array(
				'name' => esc_html__( 'Normal', 'newfeature' ),
				'size' => 16,
				'slug' => 'normal'
			),
			array(
				'name' => esc_html__( 'Large', 'newfeature' ),
				'size' => 36,
				'slug' => 'large'
			),
			array(
				'name' => esc_html__( 'Huge', 'newfeature' ),
				'size' => 50,
				'slug' => 'huge'
			)
		) );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support('editor-styles');	
		
		// Image sizes
		add_image_size( 'newfeature-size1', 1170, 729, true );   	// fullimage, Blog List layout
		add_image_size( 'newfeature-size2', 550, 395, true );    	// Blog Grid layout
		add_image_size( 'newfeature-size3', 420, 450, true );    	// Case 1
		add_image_size( 'newfeature-size4', 570, 390, true );    	// Case 2
		add_image_size( 'newfeature-size5', 545, 442, true );    	// Case 3		
		add_image_size( 'newfeature-size6', 545, 663, true );    	// Team layout
		
		// Register menus
		register_nav_menus( array(
			'primary'  => esc_html__( 'Primary', 'newfeature' ),
			'topright' => esc_html__( 'Header Right', 'newfeature' ),
		) );		
	}
}

function newfeature_theme_add_editor_styles() {
	add_editor_style( get_stylesheet_uri() );
}
add_action( 'admin_init', 'newfeature_theme_add_editor_styles' );

function newfeature_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'newfeature_pingback_header' );

// Initialize Widgets
add_action( 'widgets_init', 'newfeature_widgets_register' );
if ( !function_exists( 'newfeature_widgets_register' ) ) {
	function newfeature_widgets_register() {
		
		$footer_widget_titles1 = array(
			'1' => esc_html__( 'Footer (Style 1) 1', 'newfeature' ),
			'2' => esc_html__( 'Footer (Style 1) 2', 'newfeature' ),
			'3' => esc_html__( 'Footer (Style 1) 3', 'newfeature' ),
			'4' => esc_html__( 'Footer (Style 1) 4', 'newfeature' ),
		);	
		
		$footer_widget_titles2 = array(
			'1' => esc_html__( 'Footer (Style 2) 1', 'newfeature' ),
			'2' => esc_html__( 'Footer (Style 2) 2', 'newfeature' ),
			'3' => esc_html__( 'Footer (Style 2) 3', 'newfeature' ),
			'4' => esc_html__( 'Footer (Style 2) 4', 'newfeature' ),
		);

		$footer_widget_titles3 = array(
			'1' => esc_html__( 'Footer (Style 3) 1', 'newfeature' ),
			'2' => esc_html__( 'Footer (Style 3) 2', 'newfeature' ),
			'3' => esc_html__( 'Footer (Style 3) 3', 'newfeature' ),
			'4' => esc_html__( 'Footer (Style 3) 4', 'newfeature' ),
		);

		// Register Widget Areas ( Common )
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', 'newfeature' ),
			'id'            => 'sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="rt-widget-title-holder"><h3 class="widgettitle">',
			'after_title'   => '<span class="titleinner"></span></h3></div>',
			) );
		
		if ( class_exists( 'Newfeature_Core' ) ) {
			register_sidebar( array(
				'name'          => 'Service Sidebar',
				'id'            => 'service-sidebar',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widgettitle">',
				'after_title'   => '</h3>',
			) );			
		}
		if ( class_exists( 'WooCommerce' ) ) {
			register_sidebar( array(
				'name'          => 'Shop Sidebar',
				'id'            => 'shop-sidebar-1',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widgettitle">',
				'after_title'   => '</h3>',
			) );
		}
		
		register_sidebar( array(
			'name'          => esc_html__( 'Top Bar - Left', 'newfeature' ),
			'id'            => 'top4-left',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="hidden">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Top Bar - Right', 'newfeature' ),
			'id'            => 'top4-right',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="hidden">',
			'after_title'   => '</h3>',
		) );		
		
		if ( !empty(NewfeatureTheme::$options['footer_column_1']) ){
			$item_widget = NewfeatureTheme::$options['footer_column_1'];
		} else {
			$item_widget = 4;
		}		
		for ( $i = 1; $i <= $item_widget; $i++ ) {
			register_sidebar( array(
				'name'          => $footer_widget_titles1[$i],
				'id'            => 'footer-style-1-'. $i,
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widgettitle '. NewfeatureTheme::$footer_style .'">',
				'after_title'   => '</h3>',
			) );
		}

		if ( !empty(NewfeatureTheme::$options['footer_column_2']) ){
			$item_widget = NewfeatureTheme::$options['footer_column_2'];
		} else {
			$item_widget = 4;
		}		
		for ( $i = 1; $i <= $item_widget; $i++ ) {
			register_sidebar( array(
				'name'          => $footer_widget_titles2[$i],
				'id'            => 'footer-style-2-'. $i,
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widgettitle '. NewfeatureTheme::$footer_style .'">',
				'after_title'   => '</h3>',
			) );
		}

		if ( !empty(NewfeatureTheme::$options['footer_column_3']) ){
			$item_widget = NewfeatureTheme::$options['footer_column_3'];
		} else {
			$item_widget = 4;
		}		
		for ( $i = 1; $i <= $item_widget; $i++ ) {
			register_sidebar( array(
				'name'          => $footer_widget_titles3[$i],
				'id'            => 'footer-style-3-'. $i,
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widgettitle '. NewfeatureTheme::$footer_style .'">',
				'after_title'   => '</h3>',
			) );
		}		
		
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Style 2 (Social)', 'newfeature' ),
			'id'            => 'footer_two_social',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle '. NewfeatureTheme::$footer_style .'">',
			'after_title'   => '</h3>',
		) );
		
	}
}
/*Allow HTML for the kses post*/
function newfeature_kses_allowed_html($tags, $context) {
    switch($context) {
        case 'social':
            $tags = array(
                'a' => array('href' => array()),
                'b' => array()
            );
            return $tags;
		case 'allow_link':
            $tags = array(
                'a' => array(
                    'class' => array(),
                    'href'  => array(),
                    'rel'   => array(),
                    'title' => array(),
					'target' => array(),
                ),
				'img' => array(
                    'alt'    => array(),
                    'class'  => array(),
                    'height' => array(),
                    'src'    => array(),
                    'srcset' => array(),
                    'width'  => array(),
                ),
                'b' => array()
            );
            return $tags;
		case 'allow_title':
            $tags = array(
				'a' => array(
                    'class' => array(),
                    'href'  => array(),
                    'rel'   => array(),
                    'title' => array(),
					'target' => array(),
                ),
                'span' => array(
                    'class' => array(),
                    'style' => array(),
                ),
                'b' => array()
            );
            return $tags;
			
        case 'alltext_allow':
            $tags = array(
                'a' => array(
                    'class' => array(),
                    'href'  => array(),
                    'rel'   => array(),
                    'title' => array(),
					'target' => array(),
                ),
                'abbr' => array(
                    'title' => array(),
                ),
                'b' => array(),
                'br' => array(),
                'blockquote' => array(
                    'cite'  => array(),
                ),
                'cite' => array(
                    'title' => array(),
                ),
                'code' => array(),
                'del' => array(
                    'datetime' => array(),
                    'title' => array(),
                ),
                'dd' => array(),
                'div' => array(
                    'class' => array(),
                    'title' => array(),
                    'style' => array(),
                    'id' 	=> array(),
                ),
                'dl' => array(),
                'dt' => array(),
                'em' => array(),
                'h1' => array(),
                'h2' => array(),
                'h3' => array(),
                'h4' => array(),
                'h5' => array(),
                'h6' => array(),
                'i' => array(
					'class' => array(),
				),
                'img' => array(
                    'alt'    => array(),
                    'class'  => array(),
                    'height' => array(),
                    'src'    => array(),
                    'srcset' => array(),
                    'width'  => array(),
                ),
                'li' => array(
                    'class' => array(),
                ),
                'ol' => array(
                    'class' => array(),
                ),
                'p' => array(
                    'class' => array(),
                ),
                'q' => array(
                    'cite' => array(),
                    'title' => array(),
                ),
                'span' => array(
                    'class' => array(),
                    'title' => array(),
                    'style' => array(),
                ),
                'strike' => array(),
                'strong' => array(),
                'ul' => array(
                    'class' => array(),
                ),
            );
            return $tags;
        default:
            return $tags;
    }
}
add_filter( 'wp_kses_allowed_html', 'newfeature_kses_allowed_html', 10, 2);


/**
 * @param Wp_Query $query
 * @return mixed
 */
function advanced_search_query($query) {
    if($query->is_search()) {
        // category terms search.
        if (isset($_GET['category']) && !empty($_GET['category'])) {
            $query->set('tax_query', array(array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => array($_GET['category']) )
            ));
        }    
    }
    return $query;
}
add_action('pre_get_posts', 'advanced_search_query', 1000);

/*social link to author profile page*/
add_action( 'show_user_profile', 'newfeature_user_social_profile_fields' );
add_action( 'edit_user_profile', 'newfeature_user_social_profile_fields' );

function newfeature_user_social_profile_fields( $user ) { ?>

	<h3><?php esc_html_e( 'User Designation' , 'newfeature' ); ?></h3>

	<table class="form-table">
		<tr>
			<th><label for="newfeature_author_designation"><?php esc_html_e( 'Author Designation' , 'newfeature' ); ?></label></th>
			<td><input type="text" name="newfeature_author_designation" id="newfeature_author_designation" value="<?php echo esc_attr( get_the_author_meta( 'newfeature_author_designation', $user->ID ) ); ?>" class="regular-text" /><br /><span class="description"><?php esc_html_e( 'Please enter your Author Designation' , 'newfeature' ); ?></span></td>
		</tr>
	</table>
	
	<h3><?php esc_html_e( 'Social profile information' , 'newfeature' ); ?></h3>

	<table class="form-table">
		<tr>
			<th><label for="facebook"><?php esc_html_e( 'Facebook' , 'newfeature' ); ?></label></th>
			<td><input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'newfeature_facebook', $user->ID ) ); ?>" class="regular-text" /><br /><span class="description"><?php esc_html_e( 'Please enter your facebook URL.' , 'newfeature' ); ?></span></td>
		</tr>
		<tr>
			<th><label for="twitter"><?php esc_html_e( 'Twitter' , 'newfeature' ); ?></label></th>
			<td><input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'newfeature_twitter', $user->ID ) ); ?>" class="regular-text" /><br /><span class="description"><?php esc_html_e( 'Please enter your Twitter username.' , 'newfeature' ); ?></span></td>
		</tr>
		<tr>
			<th><label for="linkedin"><?php esc_html_e( 'LinkedIn' , 'newfeature' ); ?></label></th>
			<td><input type="text" name="linkedin" id="linkedin" value="<?php echo esc_attr( get_the_author_meta( 'newfeature_linkedin', $user->ID ) ); ?>" class="regular-text" /><br /><span class="description"><?php esc_html_e( 'Please enter your LinkedIn Profile' , 'newfeature' ); ?></span></td>
		</tr>
		<tr>
			<th><label for="gplus"><?php esc_html_e( 'Google+' , 'newfeature' ); ?></label></th>
			<td><input type="text" name="gplus" id="gplus" value="<?php echo esc_attr( get_the_author_meta( 'newfeature_gplus', $user->ID ) ); ?>" class="regular-text" /><br /><span class="description"><?php esc_html_e( 'Please enter your google+ Profile' , 'newfeature' ); ?></span></td>
		</tr>
		<tr>
			<th><label for="pinterest"><?php esc_html_e( 'Pinterest' , 'newfeature' ); ?></label></th>
			<td><input type="text" name="pinterest" id="pinterest" value="<?php echo esc_attr( get_the_author_meta( 'newfeature_pinterest', $user->ID ) ); ?>" class="regular-text" /><br /><span class="description"><?php esc_html_e( 'Please enter your Pinterest Profile' , 'newfeature' ); ?></span></td>
		</tr>
	</table>
<?php }

add_action( 'personal_options_update', 'newfeature_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'newfeature_extra_profile_fields' );

function newfeature_extra_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	update_user_meta( $user_id, 'newfeature_facebook', $_POST['facebook'] );
	update_user_meta( $user_id, 'newfeature_twitter', $_POST['twitter'] );
	update_user_meta( $user_id, 'newfeature_linkedin', $_POST['linkedin'] );
	update_user_meta( $user_id, 'newfeature_gplus', $_POST['gplus'] );
	update_user_meta( $user_id, 'newfeature_pinterest', $_POST['pinterest'] );
	update_user_meta( $user_id, 'newfeature_author_designation', $_POST['newfeature_author_designation'] );
}

/*find newest post/product with time*/
function newfeature_is_new( $id ) {
	$now    = time();
	$published_date = get_post_time('U');
	$diff =  $now - $published_date;
	if ( $diff < 604800 ) { ?>
		<span class="new-post"><?php esc_html_e( 'New' , 'newfeature' ); ?></span>
	<?php }
}

if( ! function_exists( 'newfeature_post_img_src' )){
	function newfeature_post_img_src( $size = 'newfeature-size1' ){
		$post_id  = get_the_ID();
		if ( has_post_thumbnail( $post_id ) ) {			
			$image_id = get_post_thumbnail_id( $post_id );			
			$image    = wp_get_attachment_image_src( $image_id, $size );
			return $image[0];
		} else {
			return;
		}
	}
}

/*Post Time & time format*/
if( ! function_exists( 'newfeature_get_time' )){

	function newfeature_get_time( $return = false ){

		$post = get_post();
		
		# Date is disabled globally ----------
		if( NewfeatureTheme::$options['time_format'] == 'none' ){
			return false;
		}
		# Human Readable Post Dates ----------
		elseif(  NewfeatureTheme::$options['time_format'] == 'modern' ){

			$time_now  = current_time( 'timestamp' );
			$post_time = get_the_time( 'U' ) ;
			$since = sprintf( esc_html__( '%s ago' , 'newfeature' ), human_time_diff( $post_time, $time_now ) );			
		}
		else{
			$since = get_the_date();
		}

		$post_time = '<span class="date meta-item"><span class="fa fa-clock-o" aria-hidden="true"></span>  <span>'.$since.'</span></span>';

		if( $return ){
			return $post_time;
		}

		echo wp_kses( $post_time , 'alltext_allow' );
	}

}

function widgets_scripts( $hook ) {
    if ( 'widgets.php' != $hook ) {
        return;
    }
    wp_enqueue_style( 'wp-color-picker' );
	
}
add_action( 'admin_enqueue_scripts', 'widgets_scripts' );

/*Module: Last Post update Date*/
function newfeature_last_update() { 

	$lastupdated_args = array(
		'orderby' => 'modified',
		'posts_per_page' => 1,
		'ignore_sticky_posts' => '1'
	);
 
	$lastupdated_loop = new WP_Query( $lastupdated_args );
	
	while( $lastupdated_loop->have_posts() )  {
		$lastupdated_loop->the_post();
		echo get_the_modified_date( 'M j, Y g:i a' );
	}	
	wp_reset_postdata();
}

/*
* for most use of the get_term cached 
* This is because all time it hits and single page provide data quickly
*/
function get_img( $img ){
	$img = get_stylesheet_directory_uri() . '/assets/img/' . $img;
	return $img;
}
function get_css( $file ){
	$file = get_stylesheet_directory_uri() . '/assets/css/' . $file . '.css';
	return $file;
}
function get_js( $file ){
	$file = get_stylesheet_directory_uri() . '/assets/js/' . $file . '.js';
	return $file;
}
function filter_content( $content ){
	// wp filters
	$content = wptexturize( $content );
	$content = convert_smilies( $content );
	$content = convert_chars( $content );
	$content = wpautop( $content );
	$content = shortcode_unautop( $content );

	// remove shortcodes
	$pattern= '/\[(.+?)\]/';
	$content = preg_replace( $pattern,'',$content );

	// remove tags
	$content = strip_tags( $content );

	return $content;
}

function get_current_post_content( $post = false ) {
	if ( !$post ) {
		$post = get_post();				
	}
	$content = has_excerpt( $post->ID ) ? $post->post_excerpt : $post->post_content;
	$content = filter_content( $content );
	return $content;
}

function cached_get_term_by( $field, $value, $taxonomy, $output = OBJECT, $filter = 'raw' ){
	// ID lookups are cached
	if ( 'id' == $field )
		return get_term_by( $field, $value, $taxonomy, $output, $filter );

	$cache_key = $field . '|' . $taxonomy . '|' . md5( $value );
	$term_id = wp_cache_get( $cache_key, 'get_term_by' );

	if ( false === $term_id ){
		$term = get_term_by( $field, $value, $taxonomy );
		if ( $term && ! is_wp_error( $term ) )
			wp_cache_set( $cache_key, $term->term_id, 'get_term_by' );
		else
			wp_cache_set( $cache_key, 0, 'get_term_by' ); // if we get an invalid value, let's cache it anyway
	} else {
		$term = get_term( $term_id, $taxonomy, $output, $filter );
	}

	if ( is_wp_error( $term ) )
		$term = false;

	return $term;
}

/*for avobe reason*/
function cached_get_term_link( $term, $taxonomy = null ){
	// ID- or object-based lookups already result in cached lookups, so we can ignore those.
	if ( is_numeric( $term ) || is_object( $term ) ){
		return get_term_link( $term, $taxonomy );
	}

	$term_object = cached_get_term_by( 'slug', $term, $taxonomy );
	return get_term_link( $term_object );
}


/*only to show the first category in the post - primary category*/
function newfeature_if_term_exists( $term, $taxonomy = '', $parent = null ){
	if ( null !== $parent ){
		return term_exists( $term, $taxonomy, $parent );
	}

	if ( ! empty( $taxonomy ) ){
		$cache_key = $term . '|' . $taxonomy;
	}else{
		$cache_key = $term;
	}

	$cache_value = wp_cache_get( $cache_key, 'term_exists' );

	//term_exists frequently returns null, but (happily) never false
	if ( false  === $cache_value ){
		$term_exists = term_exists( $term, $taxonomy );
		wp_cache_set( $cache_key, $term_exists, 'term_exists' );
	}else{
		$term_exists = $cache_value;
	}

	if ( is_wp_error( $term_exists ) )
		$term_exists = null;

	return $term_exists;
}


if( ! function_exists( 'newfeature_get_primary_category' )){

	function newfeature_get_primary_category() {

		if( get_post_type() != 'post' ) {
			return;
		}

		# Get the first assigned category ----------
			$get_the_category = get_the_category();
			$primary_category = array( $get_the_category[0] );

		if( ! empty( $primary_category[0] )) {
			return $primary_category;
		}
	}
}

/*only to show the first category in the post - primary category ID*/
if( ! function_exists( 'newfeature_get_primary_category_id' )){

	function newfeature_get_primary_category_id(){

		$primary_category = newfeature_get_primary_category();

		if( ! empty( $primary_category[0]->term_id )){
			return $primary_category[0]->term_id;
		}

		return false;
	}
}

// Head Script
if( !function_exists( 'newfeature_head' ) ) {
	function newfeature_head(){
		// Hide preloader if js is disabled
		echo '<noscript><style>#preloader{display:none;}</style></noscript>';
	}	
}
add_action( 'wp_head', 'newfeature_head', 1 );

//find the post type function 
if ( ! function_exists ( 'newfeature_post_type' ) ) {
	function newfeature_post_type() {
		$newfeature_post_type_var =get_post_type( get_the_ID());
		echo esc_html( $newfeature_post_type_var );
	}
}

/*next previous post links*/
if ( !function_exists( 'newfeature_post_links_next_prev' ) ) {
	function newfeature_post_links_next_prev() { ?>
	<div class="divider post-navigation">
		<?php if ( !empty( get_next_post_link())){ ?>
			<div class="<?php if ( empty( get_previous_post_link())){ ?>-offset-md-6<?php } ?> <?php if ( is_rtl() ){ echo esc_attr( 'text-left' ); } else { echo esc_attr( 'text-left' ); } ?>">
				<div class="pad-lr-15">
				<span class="next-article"><i class="flaticon flaticon-previous"></i>
				<?php next_post_link( '%link', esc_html('Previous Post' , 'newfeature' ) );?></span>
				</div>			
			</div>
		<?php } ?>
		<div class="navigation-archive"><a href="<?php echo get_post_type_archive_link( get_post_type(get_the_ID()) ); ?>"><i class="flaticon flaticon-menu"></i></a></div>
		<?php if ( !empty( get_previous_post_link())){ ?>
			<div class="<?php if ( empty( get_next_post_link())){ ?>offset-md-6<?php } ?> <?php if ( is_rtl() ){ echo esc_attr( 'text-right' ); } else { echo esc_attr( 'text-right' ); } ?>">
				<div class="pad-lr-15">
				<span class="prev-article">
				<?php previous_post_link( '%link', esc_html('Next Post' , 'newfeature' ) );?><i class="flaticon flaticon-next"></i></span>
				</div>
			</div>
		<?php } ?>
	</div>
<?php }
}

/*Remove the archive label*/
function newfeature_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }
  
    return $title;
}
 
add_filter( 'get_the_archive_title', 'newfeature_archive_title' );

/*Case single page link*/
add_action( 'wp_ajax_newfeature_like', 'newfeature_like_callback' );
add_action( 'wp_ajax_nopriv_newfeature_like', 'newfeature_like_callback' );
function newfeature_like_callback(){
	if(!$user_id = get_current_user_id()){
		wp_send_json_error('You must be login to like this post');
	}

	if(!$post_id = !empty($_POST['post_id']) ? absint($_POST['post_id']) : 0){
		wp_send_json_error('Post is mest be selected to like this post');
	}	

	$current_likes = get_user_meta($user_id, '_newfeature_likes', true);
	$current_likes = !empty($current_likes) && is_array($current_likes) ? $current_likes : [];
	$existKey = array_search($post_id,  $current_likes);

	if($existKey !== false){
		unset($current_likes[$existKey]);
		update_user_meta($user_id, '_newfeature_likes',$current_likes);
		wp_send_json_success([
			'post_id'=> $post_id,
			'action'=> 'unliked'
		]);
	}else{
		$current_likes[]=$post_id;
		update_user_meta($user_id, '_newfeature_likes',$current_likes);
		wp_send_json_success([
			'post_id'=> $post_id,
			'action'=> 'liked'
		]);
	}

}
