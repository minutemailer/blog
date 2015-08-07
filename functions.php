<?php

/** Config */
include TEMPLATEPATH . '/config.php';

/** Customize */
include TEMPLATEPATH . '/inc/customize.php';

/** Disable emojis? */
if ( defined( 'DISABLE_EMOJIS' ) && DISABLE_EMOJIS ) {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
}

/** Allow SVG? */
if ( defined( 'ALLOW_SVG' ) && ALLOW_SVG ) {
	function timetomarket_allow_svg( $mimes ) {
		$mimes['svg'] = 'image/svg+xml';

		return $mimes;
	}

	add_filter('upload_mimes', 'timetomarket_allow_svg');
}