<?php

/**
 * @link              https://www.area891.com
 * @since             1.0.0
 * @package           Tmpjbintw
 *
 * @wordpress-plugin
 * Plugin Name:       Intiway for WordPress
 * Plugin URI:        https://www.tomatolabs.com.com
 * Description:       WordPress plugin for Intiway ads.
 * Version:           1.0.0
 * Author:            Nicola Pagani
 * Author URI:        https://www.tomatolabs.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       tmpjbintw
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
define( 'TMPJBINTW_VERSION', '1.0.0' );

/**
Plugin dir
**/
define('VC_DIR', dirname(__FILE__));
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-tmpjbintw-activator.php
 */
function activate_tmpjbintw() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tmpjbintw-activator.php';
	Tmpjbintw_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-tmpjbintw-deactivator.php
 */
function deactivate_tmpjbintw() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tmpjbintw-deactivator.php';
	Tmpjbintw_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_tmpjbintw' );
register_deactivation_hook( __FILE__, 'deactivate_tmpjbintw' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-tmpjbintw.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_tmpjbintw() {

	$plugin = new Tmpjbintw();
	$plugin->run();

}
run_tmpjbintw();

// Include external shortcodes
function np_vc_register_shortcodes() {
	include(VC_DIR.'/shortcodes/intiway.php');
}
add_action('init', 'np_vc_register_shortcodes');

// Include external elements
if (is_admin()) {
	function np_vc_register_elements() {
		include(VC_DIR.'/elements/intiway.php');
	}
	add_action('vc_build_admin_page', 'np_vc_register_elements');
}