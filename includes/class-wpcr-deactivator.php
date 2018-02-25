<?php

/**
 * Fired during plugin deactivation.
 *
 * @link       http://rakibhossain.cf
 * @since      1.0.0
 * @package    wpcr
 * @subpackage wpcr/includes
 * @author     Rakib Hossain <serakib@gmail.com>
 */
class WPCR_Deactivator {

	public static function deactivate() {

		/**
		 * Delete all meta data.
		 */
		$comments = get_comments();
		foreach($comments as $comment) {
			delete_comment_meta($comment->comment_ID, 'comment_rating');
		}

	}

}
