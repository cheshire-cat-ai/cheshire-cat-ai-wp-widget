<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://cheshirecat.ai
 * @since      1.0.0
 *
 * @package    Cheshire_Cat_Ai_Wp_Widget
 * @subpackage Cheshire_Cat_Ai_Wp_Widget/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Cheshire_Cat_Ai_Wp_Widget
 * @subpackage Cheshire_Cat_Ai_Wp_Widget/public
 * @author     Cheshire Cat AI Contributors <piero@cheshirecat.ai>
 */
class Cheshire_Cat_Ai_Wp_Widget_Public {

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
		 * defined in Cheshire_Cat_Ai_Wp_Widget_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Cheshire_Cat_Ai_Wp_Widget_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/cheshire-cat-ai-wp-widget-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script(
			$this->plugin_name . "_widget",
			plugin_dir_url( __FILE__ ) . 'js/cheshire-cat-widget.js',
			array(),
			$this->version,
			true	// load at bottom page
		);
	}

	public function add_widget_html() {

		// Get settings from the options table
		$options = get_option('cheshire_cat_settings');
		$url = $options['cheshire_cat_url'];
		$credential = $options['cheshire_cat_credential'];

		printf(
			'<div id="cheshire-cat-widget" data-url="%s" data-credential="%s"></div>',
			esc_url($url),
			esc_attr($credential)
		);
	}

}
