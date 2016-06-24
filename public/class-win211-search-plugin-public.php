<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://win211.org
 * @since      1.0.0
 *
 * @package    Win211_Search_Plugin
 * @subpackage Win211_Search_Plugin/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Win211_Search_Plugin
 * @subpackage Win211_Search_Plugin/public
 * @author     Cory Derenburger <cory.derenburger@gmail.com>
 */
class Win211_Search_Plugin_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Win211_Search_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Win211_Search_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/win211-search-plugin-public.css', array(), $this->version, 'all' );
		

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Win211_Search_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Win211_Search_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/win211-search-plugin-public.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'jquery-ui-autocomplete' );
		global $wp_scripts; wp_enqueue_style("jquery-ui-css", "https://ajax.googleapis.com/ajax/libs/jqueryui/{$wp_scripts->registered['jquery-ui-core']->ver}/themes/smoothness/jquery-ui.min.css");
		/* wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . '/php/demo_cities.php', array( 'jquery'), $this->version, false ); */
		/* wp_enqueue_script('citiesurl', plugin_dir_url('','win211-search-plugin') . 'win211-search-plugin/public/php/demo_cities.php'); */
		wp_enqueue_script( 'citiesurl', plugin_dir_url(__FILE__) . 'php/demo_cities.php' );
		wp_localize_script('citiesurl', 'citiesUrl', array( 'citiesUrl' => plugins_url(), )); 
	}

}
