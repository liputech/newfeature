<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<?php
		// Preloader	
		if ( NewfeatureTheme::$options['preloader'] ) {	
			if( !empty( NewfeatureTheme::$options['preloader_image'] ) ) {
				$pre_bg = wp_get_attachment_image_src( NewfeatureTheme::$options['preloader_image'], 'full', true );
				$preloader_img = $pre_bg[0];
				echo '<div id="preloader" style="background-image:url(' . esc_url($preloader_img) . ');"></div>';
			}else { ?>				
				<div id="preloader" class="loader">
			      	<div class="cssload-loader">
				        <div class="cssload-inner cssload-one"></div>
				        <div class="cssload-inner cssload-two"></div>
				        <div class="cssload-inner cssload-three"></div>
			      	</div>
			    </div>
			<?php }	            
		}
	?>
	<div id="page" class="site">		
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'newfeature' ); ?></a>		
		<header id="masthead" class="site-header">			
			<div id="header-<?php echo esc_attr( NewfeatureTheme::$header_style ); ?>" class="header-area">
				<?php if ( NewfeatureTheme::$top_bar == 1 ){ ?>			
				<?php get_template_part( 'template-parts/header/header-top', NewfeatureTheme::$top_bar_style ); ?>
				<?php } ?>
				<?php if ( NewfeatureTheme::$header_opt == 1 ){ ?>
				<?php get_template_part( 'template-parts/header/header', NewfeatureTheme::$header_style ); ?>
				<?php } ?>
			</div>
		</header>		
		<?php get_template_part('template-parts/header/mobile', 'menu');?>		
		<div id="content" class="site-content">			
			<?php
				if ( NewfeatureTheme::$has_banner === 1 || NewfeatureTheme::$has_banner === "on" ) { 
					get_template_part('template-parts/content', 'banner');
				}
			?>
			<div id="header-search" class="header-search">
	            <button type="button" class="close">×</button>
	            <form class="header-search-form">
	                <input type="search" value="<?php echo get_search_query(); ?>" name="s" placeholder="<?php esc_html_e( 'Type your search........', 'newfeature' ); ?>">
	                <button type="submit" class="search-btn">
	                    <i class="fas fa-search"></i>
	                </button>
	            </form>
	        </div>