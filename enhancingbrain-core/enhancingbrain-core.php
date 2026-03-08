<?php
/**
 * Plugin Name: Enhancing Brain Core
 * Description: Companion plugin for Enhancing Brain. Adds reusable blocks, shortcodes, and editor features that should live outside the theme.
 * Version: 0.1.0
 * Author: Enhancing Brain
 * Text Domain: enhancingbrain-core
 */

defined( 'ABSPATH' ) || exit;

if ( ! defined( 'EBC_VERSION' ) ) {
	define( 'EBC_VERSION', '0.1.0' );
}
if ( ! defined( 'EBC_FILE' ) ) {
	define( 'EBC_FILE', __FILE__ );
}
if ( ! defined( 'EBC_DIR' ) ) {
	define( 'EBC_DIR', plugin_dir_path( __FILE__ ) );
}
if ( ! defined( 'EBC_URL' ) ) {
	define( 'EBC_URL', plugin_dir_url( __FILE__ ) );
}

require_once EBC_DIR . 'includes/class-ebc-core.php';

if ( class_exists( 'EBC_Core' ) ) {
	EBC_Core::boot();
}
