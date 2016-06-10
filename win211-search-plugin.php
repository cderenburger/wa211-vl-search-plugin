<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://win211.org
 * @since             1.0.0
 * @package           Win211_Search_Plugin
 *
 * @wordpress-plugin
 * Plugin Name:       WIN211 Search Plugin
 * Plugin URI:        https://github.com/cderenburger/win211-search-plugin
 * Description:       Allows health and human service websites the ability to add widgets, shortcuts, or links to allow users to search for community resources on search providers utilizing the Resource House API.
 * Version:           0.4
 * Author:            Cory Derenburger
 * Author URI:        http://win211.org
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       win211-search-plugin
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-win211-search-plugin-activator.php
 */
function activate_win211_search_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-win211-search-plugin-activator.php';
	Win211_Search_Plugin_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-win211-search-plugin-deactivator.php
 */
function deactivate_win211_search_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-win211-search-plugin-deactivator.php';
	Win211_Search_Plugin_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_win211_search_plugin' );
register_deactivation_hook( __FILE__, 'deactivate_win211_search_plugin' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-win211-search-plugin.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_win211_search_plugin() {

	$plugin = new Win211_Search_Plugin();
	$plugin->run();

}
run_win211_search_plugin();
