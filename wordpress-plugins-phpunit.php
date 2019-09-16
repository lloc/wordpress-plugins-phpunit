<?php
/*
Plugin Name: WordPress Plugins PHPUnit
Plugin URI: https://github.com/lloc/wordpress-plugins-phpunit
Description: Example-code for the workshop "Unittests for WordPress plugins (without WP)"
Version: 0.1
Author: realloc
License: GPL3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Domain Path: /languages
Text Domain: wordpress-plugins-phpunit
*/

defined( 'ABSPATH' ) || die( 'Error 403: Access Denied/Forbidden!' );
define( 'WCCTA_PLUGIN_DIR', ( function_exists( 'plugin_dir_path' ) ? plugin_dir_path( __FILE__ ) : __DIR__ . '/' ) );


if ( file_exists( WCCTA_PLUGIN_DIR . 'vendor/autoload.php' ) ) {
	require_once WCCTA_PLUGIN_DIR . 'vendor/autoload.php';
}

wccta\Plugin::init();