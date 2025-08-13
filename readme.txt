=== Go to Post ID ===
Contributors: kravco
Donate link: https://buymeacoffee.com/kravco
Tags: post, ease-of-access
Requires PHP: 7.4
Requires at least: 4.4
Tested up to: 6.8
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Provide input in admin bar to jump to edit post page by post ID. Only users that can "edit_posts" will see it.

== Installation ==

1. Upload entire `go-to-post-id` directory to the `/wp-content/plugins/` directory, or install the plugin through the "Plugins" screen directly.
1. Activate the plugin through the "Plugins" screen in WordPress

== Frequently Asked Questions ==

= I enter a post ID but all I get is an error. Why? =

Either the post with given ID does not exist or post ID contains some invalid and/or invisible characters. Entered post ID is used as is, without any filtering. 

== Changelog ==

= 1.0 =
* Fix readme, update links and tested-up-to version
* Apply quality control jobs to plugin code

= 0.2 =
* Display input in admin bar. Input is displayed only to users that can "edit_posts"

