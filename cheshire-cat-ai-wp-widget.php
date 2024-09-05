<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://cheshirecat.ai
 * @since             1.0.0
 * @package           Cheshire_Cat_Ai_Wp_Widget
 *
 * @wordpress-plugin
 * Plugin Name:       Cheshire Cat AI Widget
 * Plugin URI:        https://https://github.com/cheshire-cat-ai/cheshire-cat-ai-wp-widget
 * Description:       Add a Cat widget to your WordPress website
 * Version:           1.0.0
 * Author:            Cheshire Cat AI Contributors
 * Author URI:        https://cheshirecat.ai/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       cheshire-cat-ai-wp-widget
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CHESHIRE_CAT_AI_WP_WIDGET_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-cheshire-cat-ai-wp-widget-activator.php
 */
function activate_cheshire_cat_ai_wp_widget() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-cheshire-cat-ai-wp-widget-activator.php';
	Cheshire_Cat_Ai_Wp_Widget_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-cheshire-cat-ai-wp-widget-deactivator.php
 */
function deactivate_cheshire_cat_ai_wp_widget() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-cheshire-cat-ai-wp-widget-deactivator.php';
	Cheshire_Cat_Ai_Wp_Widget_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_cheshire_cat_ai_wp_widget' );
register_deactivation_hook( __FILE__, 'deactivate_cheshire_cat_ai_wp_widget' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-cheshire-cat-ai-wp-widget.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_cheshire_cat_ai_wp_widget() {

	$plugin = new Cheshire_Cat_Ai_Wp_Widget();
	$plugin->run();

}
run_cheshire_cat_ai_wp_widget();
