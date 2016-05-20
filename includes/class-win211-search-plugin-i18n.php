<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://win211.org
 * @since      1.0.0
 *
 * @package    Win211_Search_Plugin
 * @subpackage Win211_Search_Plugin/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Win211_Search_Plugin
 * @subpackage Win211_Search_Plugin/includes
 * @author     Cory Derenburger <cory.derenburger@gmail.com>
 */
class Win211_Search_Plugin_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'win211-search-plugin',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
