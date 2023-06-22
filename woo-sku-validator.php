<?php
/**
 * Plugin Name:     WooCommerce SKU Validator
 * Plugin URI:      https://www.mrkwp.com
 * Description:     A validator for your SKU Values in WooCommerce
 * Author:          Matt Knighton
 * Author URI:      https://www.mrkwp.com
 * Text Domain:     woo_sku_validator
 * Domain Path:     /languages
 * Version:         1.0.0
 *
 * @package Woo_Sku_Validator
 */

// If this file is called firectly, abort!!!
defined( 'ABSPATH' ) || die( 'No Access!' );

define( 'MRKWOOSKU_VERSION', '1.0.0' );
define( 'MRKWOOSKU_DIR', __DIR__ );
define( 'MRKWOOSKU_URL', plugins_url( '/' . basename( __DIR__ ) ) );

// Require once the Composer Autoload.
if ( file_exists( __DIR__ . '/lib/autoload.php' ) ) {
	require_once __DIR__ . '/lib/autoload.php';
}

/**
 * The code that runs during plugin activation.
 *
 * @return void
 */
function activate_woo_sku_plugin() {
	Woo_Sku_Validator\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_woo_sku_plugin' );

/**
 * The code that runs during plugin deactivation.
 *
 * @return void
 */
function deactivate_woo_sku_plugin() {
	Woo_Sku_Validator\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_woo_sku_plugin' );

/**
 * Initialize all the core classes of the plugin.
 */
if ( class_exists( 'Woo_Sku_Validator\\Init' ) ) {
	Woo_Sku_Validator\Init::register_services();
}
