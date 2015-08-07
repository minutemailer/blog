<?php

/** Config */
include TEMPLATEPATH . '/config.php';

/** Disable emojis? */
if ( defined( 'DISABLE_EMOJIS' ) && DISABLE_EMOJIS ) {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
}