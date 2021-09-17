<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Plugin; 


function newfeature_get_maybe_rtl( $filename ){
	$file = get_template_directory_uri() . '/assets/';
	if ( is_rtl() ) {
		return $file . 'rtl-css/' . $filename;
	}
	else {
		return $file . 'css/' . $filename;
	}
}
add_action( 'wp_enqueue_scripts','newfeature_enqueue_high_priority_scripts', 1500 );
function newfeature_enqueue_high_priority_scripts() {
	if ( is_rtl() ) {
		wp_enqueue_style( 'rtlcss', NEWFEATURE_CSS_URL . 'rtl.css', array(), NEWFEATURE_VERSION );
	}
}
//elementor animation dequeue
add_action('elementor/frontend/after_enqueue_scripts', function(){
    wp_deregister_style( 'e-animations' );
    wp_dequeue_style( 'e-animations' );
});

add_action( 'wp_enqueue_scripts', 'newfeature_register_scripts', 12 );
if ( !function_exists( 'newfeature_register_scripts' ) ) {
	function newfeature_register_scripts(){
		wp_deregister_style( 'font-awesome' );
        wp_deregister_style( 'layerslider-font-awesome' );
        wp_deregister_style( 'yith-wcwl-font-awesome' );

		/*CSS*/
		// owl.carousel CSS
		wp_register_style( 'owl-carousel',       NEWFEATURE_CSS_URL . 'owl.carousel.min.css', array(), NEWFEATURE_VERSION );
		wp_register_style( 'owl-theme-default',  NEWFEATURE_CSS_URL . 'owl.theme.default.min.css', array(), NEWFEATURE_VERSION );		
		wp_register_style( 'magnific-popup',     newfeature_get_maybe_rtl('magnific-popup.css'), array(), NEWFEATURE_VERSION );		
		wp_register_style( 'animate',        	 newfeature_get_maybe_rtl('animate.min.css'), array(), NEWFEATURE_VERSION );
		wp_register_style( 'multiscroll',        newfeature_get_maybe_rtl('jquery.multiscroll.min.css'), array(), NEWFEATURE_VERSION );

		/*JS*/
		// owl.carousel.min js
		wp_register_script( 'owl-carousel',      NEWFEATURE_JS_URL . 'owl.carousel.min.js', array( 'jquery' ), NEWFEATURE_VERSION, true );
		
		// counter js
		wp_register_script( 'rt-waypoints',      NEWFEATURE_JS_URL . 'waypoints.min.js', array( 'jquery' ), NEWFEATURE_VERSION, true );
		wp_register_script( 'counterup',         NEWFEATURE_JS_URL . 'jquery.counterup.min.js', array( 'jquery' ), NEWFEATURE_VERSION, true );
		wp_register_script( 'knob',         	 NEWFEATURE_JS_URL . 'jquery.knob.js', array( 'jquery' ), NEWFEATURE_VERSION, true );
		wp_register_script( 'appear',         	 NEWFEATURE_JS_URL . 'jquery.appear.js', array( 'jquery' ), NEWFEATURE_VERSION, true );
		
		// magnific popup
		wp_register_script( 'magnific-popup',    NEWFEATURE_JS_URL . 'jquery.magnific-popup.min.js', array( 'jquery' ), NEWFEATURE_VERSION, true );
		// hoverdir
		wp_register_script( 'jquery-hoverdir',   NEWFEATURE_JS_URL . 'jquery.hoverdir.js', array( 'jquery' ), NEWFEATURE_VERSION, true );
		wp_register_script( 'rt-modernizr',      NEWFEATURE_JS_URL . 'modernizr-3.5.0.min.js', array( 'jquery' ), NEWFEATURE_VERSION, true );

		// theia sticky
		wp_register_script( 'theia-sticky',    	 NEWFEATURE_JS_URL . 'theia-sticky-sidebar.min.js', array( 'jquery' ), NEWFEATURE_VERSION, true );
		
		// multiscroll
		wp_register_script( 'multiscroll',       NEWFEATURE_JS_URL . 'jquery.multiscroll.min.js', array( 'jquery' ), NEWFEATURE_VERSION, true );
		wp_register_script( 'rt-easings',        NEWFEATURE_JS_URL . 'jquery.easings.min.js', array( 'jquery' ), NEWFEATURE_VERSION, true );
		
		// parallax scroll js
		wp_register_script( 'parallax-scroll',   NEWFEATURE_JS_URL . 'jquery.parallax-scroll.js', array( 'jquery' ), NEWFEATURE_VERSION, true );
		
		// wow js
		wp_register_script( 'rt-wow',   		 NEWFEATURE_JS_URL . 'wow.min.js', array( 'jquery' ), NEWFEATURE_VERSION, true );
		
		// vanilla tilt js
		wp_register_script( 'vanilla-tilt',   	 NEWFEATURE_JS_URL . 'vanilla-tilt.min.js', array( 'jquery' ), NEWFEATURE_VERSION, true );

		// vanilla tilt js
		wp_register_script( 'rt-parallax',   	 NEWFEATURE_JS_URL . 'rt-parallax.js', array( 'jquery' ), NEWFEATURE_VERSION, true );
	}
}

add_action( 'wp_enqueue_scripts', 'newfeature_enqueue_scripts', 15 );
if ( !function_exists( 'newfeature_enqueue_scripts' ) ) {
	function newfeature_enqueue_scripts() {
		$dep = array( 'jquery' );
		/*CSS*/
		// Google fonts
		wp_enqueue_style( 'newfeature-gfonts', 	NewfeatureTheme_Helper::fonts_url(), array(), NEWFEATURE_VERSION );
		// Bootstrap CSS  //@rtl
		wp_enqueue_style( 'bootstrap', 			newfeature_get_maybe_rtl('bootstrap.min.css'), array(), NEWFEATURE_VERSION );
		
		// Flaticon CSS
		wp_enqueue_style( 'flaticon-newfeature',    NEWFEATURE_ASSETS_URL . 'fonts/flaticon-newfeature/flaticon.css', array(), NEWFEATURE_VERSION );
		
		elementor_scripts();
		//Video popup
		wp_enqueue_style( 'magnific-popup' );
		// font-awesome CSS
		wp_enqueue_style( 'font-awesome',       NEWFEATURE_CSS_URL . 'font-awesome.min.css', array(), NEWFEATURE_VERSION );
		// animate CSS
		wp_enqueue_style( 'animate',            newfeature_get_maybe_rtl('animate.min.css'), array(), NEWFEATURE_VERSION );
		// main CSS // @rtl
		wp_enqueue_style( 'newfeature-default',    	newfeature_get_maybe_rtl('default.css'), array(), NEWFEATURE_VERSION );
		// vc modules css
		wp_enqueue_style( 'newfeature-elementor',   newfeature_get_maybe_rtl('elementor.css'), array(), NEWFEATURE_VERSION );
			
		// Style CSS
		wp_enqueue_style( 'newfeature-style',     	newfeature_get_maybe_rtl('style.css'), array(), NEWFEATURE_VERSION );
		
		// Template Style
		wp_add_inline_style( 'newfeature-style',   	newfeature_template_style() );

		/*JS*/
		// bootstrap js
		wp_enqueue_script( 'bootstrap',         NEWFEATURE_JS_URL . 'bootstrap.min.js', array( 'jquery' ), NEWFEATURE_VERSION, true );
		
		// Comments
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		
		// Countdown
		wp_enqueue_script( 'countdown',      	NEWFEATURE_JS_URL . 'jquery.countdown.min.js', array( 'jquery' ), NEWFEATURE_VERSION, true );
		
		wp_enqueue_script( 'theia-sticky' );
		wp_enqueue_script( 'magnific-popup' );
		wp_enqueue_script( 'jquery-hoverdir' );
		wp_enqueue_script( 'rt-modernizr' );
		wp_enqueue_script( 'rt-wow' );
		wp_enqueue_script( 'rt-parallax' );
		
		wp_enqueue_script( 'masonry' );
		wp_enqueue_script( 'newfeature-main',    	NEWFEATURE_JS_URL . 'main.js', $dep , NEWFEATURE_VERSION, true );
		
		if( !empty( NewfeatureTheme::$options['logo'] ) ) {
			$logo_dark = wp_get_attachment_image( NewfeatureTheme::$options['logo'], 'full' );
			$logo = $logo_dark;
		}else {
			$logo = "<img width='92' height='39' loading='lazy' class='logo-small' src='" . NEWFEATURE_IMG_URL . 'logo.png' . "' alt='" . esc_attr( get_bloginfo('name') ) . "'>"; 
		}
		
		// localize script
		$newfeature_localize_data = array(
			'stickyMenu' 	=> NewfeatureTheme::$options['sticky_menu'],
			'siteLogo'   	=> '<a href="' . esc_url( home_url( '/' ) ) . '" alt="' . esc_attr( get_bloginfo( 'title' ) ) . '">' . esc_html ( $logo ) . '</a>',
			'extraOffset' => NewfeatureTheme::$options['sticky_menu'] ? 70 : 0,
			'extraOffsetMobile' => NewfeatureTheme::$options['sticky_menu'] ? 52 : 0,
			'rtl' => is_rtl()?'yes':'no',
			
			// Ajax
			'ajaxURL' => admin_url('admin-ajax.php'),
			'nonce' => wp_create_nonce( 'newfeature-nonce' )
		);
		wp_localize_script( 'newfeature-main', 'newfeatureObj', $newfeature_localize_data );
	}	
}

function elementor_scripts() {
	
	if ( !did_action( 'elementor/loaded' ) ) {
		return;
	}
	
	if ( \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
		// do stuff for preview
		wp_enqueue_style(  'owl-carousel' );
		wp_enqueue_style(  'owl-theme-default' );
		wp_enqueue_script( 'owl-carousel' );
		
		wp_enqueue_script( 'knob' );
		wp_enqueue_script( 'appear' );
		wp_enqueue_script( 'counterup' );
		wp_enqueue_script( 'rt-waypoints' );		
		wp_enqueue_script( 'rt-wow' );
		wp_enqueue_script( 'vanilla-tilt' );
	} 
}

add_action( 'wp_enqueue_scripts', 'newfeature_high_priority_scripts', 1500 );
if ( !function_exists( 'newfeature_high_priority_scripts' ) ) {
	function newfeature_high_priority_scripts() {
		// Dynamic style
		NewfeatureTheme_Helper::dynamic_internal_style();
	}
}

function newfeature_template_style(){
	ob_start();
	?>
	
	.entry-banner {
		<?php if ( NewfeatureTheme::$bgtype == 'bgcolor' ): ?>
			background-color: <?php echo esc_html( NewfeatureTheme::$bgcolor );?>;
		<?php else: ?>
			background: url(<?php echo esc_url( NewfeatureTheme::$bgimg );?>) no-repeat scroll center bottom / cover;
		<?php endif; ?>
	}

	.content-area {
		padding-top: <?php echo esc_html( NewfeatureTheme::$padding_top );?>px; 
		padding-bottom: <?php echo esc_html( NewfeatureTheme::$padding_bottom );?>px;
	}
	<?php if( isset( NewfeatureTheme::$pagebgimg ) && !empty( NewfeatureTheme::$pagebgimg ) ) { ?>
	#page .content-area {
		background-image: url( <?php echo NewfeatureTheme::$pagebgimg; ?> );
		background-color: <?php echo NewfeatureTheme::$pagebgcolor; ?>;
	}
	<?php } ?>
	.error-page-area {		 
		background-color: <?php echo esc_html( NewfeatureTheme::$options['error_bodybg'] );?>;
	}
	
	<?php
	return ob_get_clean();
}

function load_custom_wp_admin_script_gutenberg() {
	wp_enqueue_style( 'newfeature-gfonts', NewfeatureTheme_Helper::fonts_url(), array(), NEWFEATURE_VERSION );
	// font-awesome CSS
	wp_enqueue_style( 'font-awesome',       NEWFEATURE_CSS_URL . 'font-awesome.min.css', array(), NEWFEATURE_VERSION );
	// Flaticon CSS
	wp_enqueue_style( 'flaticon-newfeature',    NEWFEATURE_ASSETS_URL . 'fonts/flaticon-newfeature/flaticon.css', array(), NEWFEATURE_VERSION );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_script_gutenberg', 1 );

function load_custom_wp_admin_script() {
	wp_enqueue_style( 'newfeature-admin-style',  NEWFEATURE_CSS_URL . 'admin-style.css', false, NEWFEATURE_VERSION );
	wp_enqueue_script( 'newfeature-admin-main',  NEWFEATURE_JS_URL . 'admin.main.js', false, NEWFEATURE_VERSION, true );
	
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_script' );
