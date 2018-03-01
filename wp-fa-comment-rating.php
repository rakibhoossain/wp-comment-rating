<?php
/**
 * Plugin Name:       Fa Comment Rating
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

define( 'FACR_BASE_DIR', plugin_dir_path( __FILE__ ) );

/**
 * The code that runs during plugin activation.
 */
function facr_activate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-facr-activator.php';
	FACR_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 */
function facr_deactivate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-facr-deactivator.php';
	FACR_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'facr_activate' );
register_deactivation_hook( __FILE__, 'facr_deactivate' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-facr.php';

/**
 * Begins execution of the plugin.
 *
 * @since    1.0.0
 */
function facr_run() {

	$plugin = new FACR();
	$plugin->run();

}
facr_run();
