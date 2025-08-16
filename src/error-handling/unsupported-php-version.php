<?php
/**
 * This file is part of WordPress plugin: Go to Post ID
 *
 * @package kravco/go-to-post-id
 * @author Matej Kravjar <matej.kravjar@gmail.com>
 * @copyright 2016 Matej Kravjar
 * @license GPLv2+
 */

defined( 'ABSPATH' ) || exit;

if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
    // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_error_log
	error_log(
		'Go to Post ID: ' .
		sprintf(
			'Plugin requires PHP version %1$s or higher, you are using PHP version %2$s.',
			'7.4',
			PHP_VERSION
		)
	);
}

add_action(
	'admin_notices',
	function () {
		?>
		<div class="notice notice-error">
			<p>
				<?php
				echo '<strong>' . esc_html__( 'Go to Post ID', 'go-to-post-id' ) . ':</strong> ';
				printf(
					/* translators: 1: required PHP version. 2: current PHP version */
					esc_html__( 'Plugin requires PHP version %1$s or higher, you are using PHP version %2$s.', 'go-to-post-id' ),
					'7.4',
					PHP_VERSION,
				);
				?>
			</p>
		</div>
		<?php
	}
);

add_filter(
	'after_plugin_row_meta',
	function ( $plugin_file ) {
		// @phpstan-ignore constant.notFound
		if ( GO_TO_POST_ID_PLUGIN_BASENAME !== $plugin_file ) {
			return;
		}
		printf(
			'<p><span class="dashicons dashicons-warning"></span> <strong>%s</strong> &bullet; %s</p>',
			esc_html__( 'This plugin does nothing at the moment', 'go-to-post-id' ),
			sprintf(
				/* translators: 1: required PHP version. 2: current PHP version */
				esc_html__( 'Plugin requires PHP version %1$s or higher, you are using PHP version %2$s.', 'go-to-post-id' ),
				'7.4',
				PHP_VERSION,
			),
		);
	}
);
