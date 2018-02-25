<?php
/**
 * Plugin Name:       Comment Rating
 * Plugin URI:        www.rakibhossain.cf/comment-rating
 * Description:       Adds an awesome rating field in comment form
 * Version:           1.0.0
 * Author:            Rakib Hossain
 * Author URI:        www.rakibhossain.cf
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       comment-rating
 * Domain Path:       /languages
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'PLUGIN_NAME_BASE_DIR', plugin_dir_path( __FILE__ ) );

/**
 * The code that runs during plugin activation.
 */
function activate_wpcr() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpcr-activator.php';
	WPCR_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 */
function deactivate_wpcr() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpcr-deactivator.php';
	WPCR_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wpcr' );
register_deactivation_hook( __FILE__, 'deactivate_wpcr' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wpcr.php';

/**
 * Begins execution of the plugin.
 *
 * @since    1.0.0
 */
function run_wpcr() {

	$plugin = new Comment_Rating();
	$plugin->run();

}
run_wpcr();
