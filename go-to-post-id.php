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
 * Version: 1.1
 * License: GPLv2+
 * Text Domain: go-to-post-id
 * Domain Path: /languages
 */

// protect against direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


add_action(
	'admin_bar_menu',
	function ( $wp_admin_bar ) {
		if ( current_user_can( 'edit_posts' ) ) {
			/**
			 * Note that we do not use PHP type here, because admin bar class is filterable.
			 *
			 * @phpstan-var WP_Admin_Bar $wp_admin_bar
			 */
			$wp_admin_bar->add_node(
				[
					'id'    => 'go-to-post-id',
					'title' => '<form action="' . esc_attr( admin_url( 'post.php' ) ) . '">'
						. '<input type="text" name="post" placeholder="'
						. esc_attr( _x( 'Go to Post ID', 'input-placeholder', 'go-to-post-id' ) )
						. '" style="padding: 0 4px; min-height: 24px; height: 24px; width: '
						. esc_attr( _x( '80', 'input-width-in-px', 'go-to-post-id' ) )
						. 'px" />'
						. '<input type="hidden" name="action" value="edit" />'
						. '</form>',
				]
			);
		}
	},
	PHP_INT_MAX
);
