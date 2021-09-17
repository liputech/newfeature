<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

?>
<div class="header-icon-area">
	<?php	
	if ( NewfeatureTheme::$options['search_icon'] ) {
		get_template_part( 'template-parts/header/icon', 'search' );
	}
	if ( NewfeatureTheme::$options['vertical_menu_icon'] && has_nav_menu( 'topright' ) ){
		get_template_part( 'template-parts/header/icon', 'menu' );
	}
	?>
</div>