<?php
/**
 * This file is part of WordPress plugin: Go to Post ID
 *
 * @package kravco/go-to-post-id
 * @author Matej Kravjar <matej.kravjar@gmail.com>
 * @copyright 2016 Matej Kravjar
 * @license GPLv2+
 *
 * Plugin Name: Go to Post ID
 * Plugin URI: https://github.com/kravco/go-to-post-id
 * Description: Αdds little search box into admin bar that redirects you to edit page of post of given ID. Enter the post ID and hit return to go to post edit screen—if the post exists. If it doesn't, you get a standard WordPress error page—just hit back and try again.
 * Author: Matej Kravjar
 * Author URI: https://buymeacoffee.com/kravco
 * Version: 1.0
 * License: GPLv2+
 */

// protect against direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action(
	'admin_bar_menu',
	function ( WP_Admin_Bar $wp_admin_bar ) {
		if ( current_user_can( 'edit_posts' ) ) {
			$wp_admin_bar->add_node(
				[
					'id'    => 'go-to-post-id',
					'title' => '<form action="' . esc_attr( admin_url( 'post.php' ) ) . '">'
						. '<input type="text" name="post" placeholder="Go to Post ID" style="padding: 0 4px; min-height: 24px; height: 24px; width: 80px" />'
						. '<input type="hidden" name="action" value="edit" />'
						. '</form>',
				]
			);
		}
	},
	PHP_INT_MAX
);
