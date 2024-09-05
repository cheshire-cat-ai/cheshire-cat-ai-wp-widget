<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://cheshirecat.ai
 * @since      1.0.0
 *
 * @package    Cheshire_Cat_Ai_Wp_Widget
 * @subpackage Cheshire_Cat_Ai_Wp_Widget/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Cheshire_Cat_Ai_Wp_Widget
 * @subpackage Cheshire_Cat_Ai_Wp_Widget/admin
 * @author     Cheshire Cat AI Contributors <piero@cheshirecat.ai>
 */
class Cheshire_Cat_Ai_Wp_Widget_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/cheshire-cat-ai-wp-widget-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/cheshire-cat-ai-wp-widget-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function cheshire_cat_add_admin_menu() {
		add_options_page(
			'Cheshire Cat Widget Settings',
			'Cheshire Cat Widget',
			'manage_options',
			'cheshire_cat_widget',
			array( $this, 'cheshire_cat_options_page')
		);
	}

	public function cheshire_cat_settings_init() {

		register_setting('cheshire_cat_widget', 'cheshire_cat_settings');
		// Set default values if not already set
		$default_options = array(
			'cheshire_cat_url' => 'http://localhost:1865',
			'cheshire_cat_credential' => ""
		);
		if (!get_option('cheshire_cat_settings')) {
			update_option('cheshire_cat_settings', $default_options);
		}
	
		add_settings_section(
			'cheshire_cat_widget_section',
			__('Widget Settings', 'cheshire_cat'),
			array( $this, 'cheshire_cat_settings_section_callback'),
			'cheshire_cat_widget'
		);
	
		add_settings_field(
			'cheshire_cat_url',
			__('Instance URL', 'cheshire_cat'),
			array( $this, 'cheshire_cat_url_render'),
			'cheshire_cat_widget',
			'cheshire_cat_widget_section'
		);
	
		add_settings_field(
			'cheshire_cat_credential',
			__('Instance CCAT_API_KEY_WS', 'cheshire_cat'),
			array( $this, 'cheshire_cat_credential_render'),
			'cheshire_cat_widget',
			'cheshire_cat_widget_section'
		);
	}

	public function cheshire_cat_url_render() {
		$options = get_option('cheshire_cat_settings');
		?>
		<input type='text' name='cheshire_cat_settings[cheshire_cat_url]' value='<?php echo esc_url($options['cheshire_cat_url']); ?>'>
		<?php
	}

	public function cheshire_cat_credential_render() {
		$options = get_option('cheshire_cat_settings');
		?>
		<input type='text' name='cheshire_cat_settings[cheshire_cat_credential]' value='<?php echo esc_attr($options['cheshire_cat_credential']); ?>'>
		<?php
	}
	
	public function cheshire_cat_settings_section_callback() {
		echo __('Enter your Cheshire Cat instance details.', 'cheshire_cat');
	}
	
	public function cheshire_cat_options_page() {
		?>
		<form action='options.php' method='post'>
			<h1>Cheshire Cat Widget Settings</h1>
			<?php
			settings_fields('cheshire_cat_widget');
			do_settings_sections('cheshire_cat_widget');
			submit_button();
			?>
		</form>
		<?php
	}
}


