<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://wp-styles.de
 * @since             1.0.0
 * @package           Wpip
 *
 * @wordpress-plugin
 * Plugin Name:       WP Image Color Palette
 * Plugin URI:        https://github.com/mkronenfeld/WP-Image-Color-Palette
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Marvin Kronenfeld (WP-Styles.de)
 * Author URI:        https://wp-styles.de
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wpip
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! defined( 'WPIP_FILE' ) ) {
	define( 'WPIP_FILE', __FILE__ );
}

if ( ! defined( 'WPIP_PATH' ) ) {
	define( 'WPIP_PATH', plugin_dir_path( WPIP_FILE ) );
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wpip-activator.php
 */
function activate_wpip() {
	require_once WPIP_PATH . 'includes/class-wpip-activator.php';
	Wpip_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wpip-deactivator.php
 */
function deactivate_wpip() {
	require_once WPIP_PATH . 'includes/class-wpip-deactivator.php';
	Wpip_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wpip' );
register_deactivation_hook( __FILE__, 'deactivate_wpip' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require WPIP_PATH . 'includes/class-wpip.php';

require WPIP_PATH . 'includes/wpip-functions.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wpip() {

	$plugin = new Wpip();
	$plugin->run();
}
run_wpip();
