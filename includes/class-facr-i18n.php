<?php

/**
 * Define the internationalization functionality
 *
 * @link       http://rakibhossain.cf
 * @since      1.0.0
 * @package    wpcr
 * @subpackage wpcr/includes
 * @author     Rakib Hossain <serakib@gmail.com>
 */

class FACR_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'comment-rating',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
