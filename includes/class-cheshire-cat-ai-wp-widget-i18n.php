<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://cheshirecat.ai
 * @since      1.0.0
 *
 * @package    Cheshire_Cat_Ai_Wp_Widget
 * @subpackage Cheshire_Cat_Ai_Wp_Widget/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Cheshire_Cat_Ai_Wp_Widget
 * @subpackage Cheshire_Cat_Ai_Wp_Widget/includes
 * @author     Cheshire Cat AI Contributors <piero@cheshirecat.ai>
 */
class Cheshire_Cat_Ai_Wp_Widget_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'cheshire-cat-ai-wp-widget',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
