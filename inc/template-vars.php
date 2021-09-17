<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

add_action( 'template_redirect', 'newfeature_template_vars' );
if( !function_exists( 'newfeature_template_vars' ) ) {
    function newfeature_template_vars() {
        // Single Pages
        if( is_single() || is_page() ) {
            $post_type = get_post_type();
            $post_id   = get_the_id();
            switch( $post_type ) {
                case 'page':
                $prefix = 'page';
                break;
				case 'newfeature_service':
                $prefix = 'service';
                break;		  
                case 'newfeature_case':
                $prefix = 'case';
                break; 		  
                case 'newfeature_team':
                $prefix = 'team';
                break;  
                case 'product':
                $prefix = 'product';
                break;
                default:
                $prefix = 'single_post';
                break;
            }
			
			$layout_settings    = get_post_meta( $post_id, 'newfeature_layout_settings', true );
            
            NewfeatureTheme::$layout = ( empty( $layout_settings['newfeature_layout'] ) || $layout_settings['newfeature_layout']  == 'default' ) ? NewfeatureTheme::$options[$prefix . '_layout'] : $layout_settings['newfeature_layout'];
			
			NewfeatureTheme::$tr_header = ( empty( $layout_settings['newfeature_tr_header'] ) || $layout_settings['newfeature_tr_header'] == 'default' ) ? NewfeatureTheme::$options['tr_header'] : $layout_settings['newfeature_tr_header'];
            
            NewfeatureTheme::$top_bar = ( empty( $layout_settings['newfeature_top_bar'] ) || $layout_settings['newfeature_top_bar'] == 'default' ) ? NewfeatureTheme::$options['top_bar'] : $layout_settings['newfeature_top_bar'];
            
            NewfeatureTheme::$top_bar_style = ( empty( $layout_settings['newfeature_top_bar_style'] ) || $layout_settings['newfeature_top_bar_style'] == 'default' ) ? NewfeatureTheme::$options['top_bar_style'] : $layout_settings['newfeature_top_bar_style'];
			
			NewfeatureTheme::$header_opt = ( empty( $layout_settings['newfeature_header_opt'] ) || $layout_settings['newfeature_header_opt'] == 'default' ) ? NewfeatureTheme::$options['header_opt'] : $layout_settings['newfeature_header_opt'];
            
            NewfeatureTheme::$header_style = ( empty( $layout_settings['newfeature_header'] ) || $layout_settings['newfeature_header'] == 'default' ) ? NewfeatureTheme::$options['header_style'] : $layout_settings['newfeature_header'];
			
            NewfeatureTheme::$footer_style = ( empty( $layout_settings['newfeature_footer'] ) || $layout_settings['newfeature_footer'] == 'default' ) ? NewfeatureTheme::$options['footer_style'] : $layout_settings['newfeature_footer'];
			
			NewfeatureTheme::$footer_area = ( empty( $layout_settings['newfeature_footer_area'] ) || $layout_settings['newfeature_footer_area'] == 'default' ) ? NewfeatureTheme::$options['footer_area'] : $layout_settings['newfeature_footer_area'];
			
            $padding_top = ( empty( $layout_settings['newfeature_top_padding'] ) || $layout_settings['newfeature_top_padding'] == 'default' ) ? NewfeatureTheme::$options[$prefix . '_padding_top'] : $layout_settings['newfeature_top_padding'];
			
            NewfeatureTheme::$padding_top = (int) $padding_top;
            
            $padding_bottom = ( empty( $layout_settings['newfeature_bottom_padding'] ) || $layout_settings['newfeature_bottom_padding'] == 'default' ) ? NewfeatureTheme::$options[$prefix . '_padding_bottom'] : $layout_settings['newfeature_bottom_padding'];
			
            NewfeatureTheme::$padding_bottom = (int) $padding_bottom;
			
            NewfeatureTheme::$has_banner = ( empty( $layout_settings['newfeature_banner'] ) || $layout_settings['newfeature_banner'] == 'default' ) ? NewfeatureTheme::$options[$prefix . '_banner'] : $layout_settings['newfeature_banner'];
            
            NewfeatureTheme::$has_breadcrumb = ( empty( $layout_settings['newfeature_breadcrumb'] ) || $layout_settings['newfeature_breadcrumb'] == 'default' ) ? NewfeatureTheme::$options[ $prefix . '_breadcrumb'] : $layout_settings['newfeature_breadcrumb'];
            
            NewfeatureTheme::$bgtype = ( empty( $layout_settings['newfeature_banner_type'] ) || $layout_settings['newfeature_banner_type'] == 'default' ) ? NewfeatureTheme::$options[$prefix . '_bgtype'] : $layout_settings['newfeature_banner_type'];
            
            NewfeatureTheme::$bgcolor = empty( $layout_settings['newfeature_banner_bgcolor'] ) ? NewfeatureTheme::$options[$prefix . '_bgcolor'] : $layout_settings['newfeature_banner_bgcolor'];
			
			if( !empty( $layout_settings['newfeature_banner_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( $layout_settings['newfeature_banner_bgimg'], 'full', true );
                NewfeatureTheme::$bgimg = $attch_url[0];
            } elseif( !empty( NewfeatureTheme::$options[$prefix . '_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( NewfeatureTheme::$options[$prefix . '_bgimg'], 'full', true );
                NewfeatureTheme::$bgimg = $attch_url[0];
            } else {
                NewfeatureTheme::$bgimg = NEWFEATURE_IMG_URL . 'banner.jpg';
            }
			
            NewfeatureTheme::$pagebgcolor = empty( $layout_settings['newfeature_page_bgcolor'] ) ? NewfeatureTheme::$options[$prefix . '_page_bgcolor'] : $layout_settings['newfeature_page_bgcolor'];			
            
            if( !empty( $layout_settings['newfeature_page_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( $layout_settings['newfeature_page_bgimg'], 'full', true );
                NewfeatureTheme::$pagebgimg = $attch_url[0];
            } elseif( !empty( NewfeatureTheme::$options[$prefix . '_page_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( NewfeatureTheme::$options[$prefix . '_page_bgimg'], 'full', true );
                NewfeatureTheme::$pagebgimg = $attch_url[0];
            }
        }
        
        // Blog and Archive
        elseif( is_home() || is_archive() || is_search() || is_404() ) {
            if( is_search() ) {
                $prefix = 'search';
            } else if( is_404() ) {
                $prefix                                = 'error';
                NewfeatureTheme::$options[$prefix . '_layout'] = 'full-width';
            } elseif( is_post_type_archive( "newfeature_service" ) || is_tax( "newfeature_service_category" ) ) {
                $prefix = 'service_archive';            
            } elseif( is_post_type_archive( "newfeature_case" ) || is_tax( "newfeature_case_category" ) ) {
                $prefix = 'case_archive'; 
			} elseif( is_post_type_archive( "newfeature_team" ) || is_tax( "newfeature_team_category" ) ) {
                $prefix = 'team_archive'; 
			} else {
                $prefix = 'blog';
            }
            
            NewfeatureTheme::$layout         		= NewfeatureTheme::$options[$prefix . '_layout'];
            NewfeatureTheme::$tr_header      		= NewfeatureTheme::$options['tr_header'];
            NewfeatureTheme::$top_bar        		= NewfeatureTheme::$options['top_bar'];
            NewfeatureTheme::$header_opt      		= NewfeatureTheme::$options['header_opt'];
            NewfeatureTheme::$footer_area     		= NewfeatureTheme::$options['footer_area'];
            NewfeatureTheme::$top_bar_style  		= NewfeatureTheme::$options['top_bar_style'];
            NewfeatureTheme::$header_style   		= NewfeatureTheme::$options['header_style'];
            NewfeatureTheme::$footer_style   		= NewfeatureTheme::$options['footer_style'];
            NewfeatureTheme::$padding_top    		= NewfeatureTheme::$options[$prefix . '_padding_top'];
            NewfeatureTheme::$padding_bottom 		= NewfeatureTheme::$options[$prefix . '_padding_bottom'];
            NewfeatureTheme::$has_banner     		= NewfeatureTheme::$options[$prefix . '_banner'];
            NewfeatureTheme::$has_breadcrumb 		= NewfeatureTheme::$options[$prefix . '_breadcrumb'];
            NewfeatureTheme::$bgtype         		= NewfeatureTheme::$options[$prefix . '_bgtype'];
            NewfeatureTheme::$bgcolor        		= NewfeatureTheme::$options[$prefix . '_bgcolor'];
			
            if( !empty( NewfeatureTheme::$options[$prefix . '_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( NewfeatureTheme::$options[$prefix . '_bgimg'], 'full', true );
                NewfeatureTheme::$bgimg = $attch_url[0];
            } else {
                NewfeatureTheme::$bgimg = NEWFEATURE_IMG_URL . 'banner.jpg';
            }
			
            NewfeatureTheme::$pagebgcolor = NewfeatureTheme::$options[$prefix . '_page_bgcolor'];
            if( !empty( NewfeatureTheme::$options[$prefix . '_page_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( NewfeatureTheme::$options[$prefix . '_page_bgimg'], 'full', true );
                NewfeatureTheme::$pagebgimg = $attch_url[0];
            }
			
			
        }
    }
}

// Add body class
add_filter( 'body_class', 'newfeature_body_classes' );
if( !function_exists( 'newfeature_body_classes' ) ) {
    function newfeature_body_classes( $classes ) {
		
		// Header
    	if ( NewfeatureTheme::$options['sticky_menu'] == 1 ) {
			$classes[] = 'sticky-header';
		}
		
        $classes[] = 'header-style-'. NewfeatureTheme::$header_style;		
        $classes[] = 'footer-style-'. NewfeatureTheme::$footer_style;

        if ( NewfeatureTheme::$top_bar == 1 || NewfeatureTheme::$top_bar == 'on' ){
            $classes[] = 'has-topbar topbar-style-'. NewfeatureTheme::$top_bar_style;
        }
		
        if ( NewfeatureTheme::$tr_header === 1 || NewfeatureTheme::$tr_header === "on" ){
           $classes[] = 'trheader';
        }
        
        $classes[] = ( NewfeatureTheme::$layout == 'full-width' ) ? 'no-sidebar' : 'has-sidebar';
		
		$classes[] = ( NewfeatureTheme::$layout == 'left-sidebar' ) ? 'left-sidebar' : 'right-sidebar';
        
        if( isset( $_COOKIE["shopview"] ) && $_COOKIE["shopview"] == 'list' ) {
            $classes[] = 'product-list-view';
        } else {
            $classes[] = 'product-grid-view';
        }
		if ( is_singular('post') ) {
			$classes[] =  ' post-detail-' . NewfeatureTheme::$options['post_style'];
        }
        return $classes;
    }
}