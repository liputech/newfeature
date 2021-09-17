<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$newfeature_theme_data = wp_get_theme();
	$action  = 'newfeature_theme_init';
	do_action( $action );

	define( 'NEWFEATURE_VERSION', ( WP_DEBUG ) ? time() : $newfeature_theme_data->get( 'Version' ) );
	define( 'NEWFEATURE_AUTHOR_URI', $newfeature_theme_data->get( 'AuthorURI' ) );
	define( 'NEWFEATURE_NAME', 'newfeature' );

	// DIR
	define( 'NEWFEATURE_BASE_DIR',    get_template_directory(). '/' );
	define( 'NEWFEATURE_INC_DIR',     NEWFEATURE_BASE_DIR . 'inc/' );
	define( 'NEWFEATURE_VIEW_DIR',    NEWFEATURE_INC_DIR . 'views/' );
	define( 'NEWFEATURE_LIB_DIR',     NEWFEATURE_BASE_DIR . 'lib/' );
	define( 'NEWFEATURE_WID_DIR',     NEWFEATURE_INC_DIR . 'widgets/' );
	define( 'NEWFEATURE_PLUGINS_DIR', NEWFEATURE_INC_DIR . 'plugins/' );
	define( 'NEWFEATURE_MODULES_DIR', NEWFEATURE_INC_DIR . 'modules/' );
	define( 'NEWFEATURE_ASSETS_DIR',  NEWFEATURE_BASE_DIR . 'assets/' );
	define( 'NEWFEATURE_CSS_DIR',     NEWFEATURE_ASSETS_DIR . 'css/' );
	define( 'NEWFEATURE_JS_DIR',      NEWFEATURE_ASSETS_DIR . 'js/' );

	// URL
	define( 'NEWFEATURE_BASE_URL',    get_template_directory_uri(). '/' );
	define( 'NEWFEATURE_ASSETS_URL',  NEWFEATURE_BASE_URL . 'assets/' );
	define( 'NEWFEATURE_CSS_URL',     NEWFEATURE_ASSETS_URL . 'css/' );
	define( 'NEWFEATURE_JS_URL',      NEWFEATURE_ASSETS_URL . 'js/' );
	define( 'NEWFEATURE_IMG_URL',     NEWFEATURE_ASSETS_URL . 'img/' );
	define( 'NEWFEATURE_LIB_URL',     NEWFEATURE_BASE_URL . 'lib/' );

	//Other Plugins active or not
	define( 'NEWFEATURE_BBPRESS_IS_ACTIVE', class_exists( 'bbPress' ) );
	
	// icon trait Plugin Activation
	require_once NEWFEATURE_INC_DIR . 'icon-trait.php';
	// Includes
	require_once NEWFEATURE_INC_DIR . 'helper-functions.php';
	require_once NEWFEATURE_INC_DIR . 'newfeature.php';
	require_once NEWFEATURE_INC_DIR . 'general.php';
	require_once NEWFEATURE_INC_DIR . 'scripts.php';
	require_once NEWFEATURE_INC_DIR . 'template-vars.php';
	require_once NEWFEATURE_INC_DIR . 'includes.php';

	// Includes Modules
	require_once NEWFEATURE_MODULES_DIR . 'rt-post-related.php';
	require_once NEWFEATURE_MODULES_DIR . 'rt-case-related.php';
	require_once NEWFEATURE_MODULES_DIR . 'rt-team-related.php';
	require_once NEWFEATURE_MODULES_DIR . 'rt-breadcrumbs.php';

	// TGM Plugin Activation
	require_once NEWFEATURE_LIB_DIR . 'class-tgm-plugin-activation.php';
	require_once NEWFEATURE_INC_DIR . 'tgm-config.php';

	add_editor_style( 'style-editor.css' );

	// Update Breadcrumb Separator
	add_action('bcn_after_fill', 'newfeature_hseparator_breadcrumb_trail', 1);
	function newfeature_hseparator_breadcrumb_trail($object){
		$object->opt['hseparator'] = '<span class="dvdr"> / </span>';
		return $object;
	}


