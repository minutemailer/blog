<?php

/** Config */
include TEMPLATEPATH . '/config.php';

/** Customize */
include TEMPLATEPATH . '/inc/customize.php';

/** Admin settings */
include TEMPLATEPATH . '/inc/settings.php';

/** Theme Class */
include TEMPLATEPATH . '/inc/TimeToMarket.php';

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

/** Setup */
function timetomarket_setup() {

	load_theme_textdomain( 'timetomarket', DOCROOT . 'languages' );

	/** Add default posts and comments RSS feed links to head. */
	add_theme_support( 'automatic-feed-links' );

	/** Add Thumbnails support */
	add_theme_support( 'post-thumbnails' );

	/** Add image sizes */
	add_image_size( 'timetomarket-featured-listing', 700, 250, true );
	add_image_size( 'timetomarket-full-width', 700, 9999, false );

	$image_sizes = function ( $sizes ) {
		$newsizes = array_merge( $sizes, [
			'timetomarket-full-width' => __( 'Full width post image', 'timetomarket' ),
		] );

		return $newsizes;
	};

	add_filter( 'image_size_names_choose', $image_sizes );

	/** Register nav menus */
	register_nav_menus( [
		'primary'  => __( 'Main menu', 'timetomarket' ),
		'footer-1' => __( 'Footer menu 1', 'timetomarket' ),
		'footer-2' => __( 'Footer menu 2', 'timetomarket' ),
		'footer-3' => __( 'Footer menu 2', 'timetomarket' )
	] );

}

add_action( 'after_setup_theme', 'timetomarket_setup' );

/** Enqueue and register assets */
function timetomarket_assets() {
	wp_enqueue_style( 'timetomarket-style', WEBROOT . 'css/timetomarket.css', FALSE, VERSION, 'screen' );
	wp_enqueue_script( 'retinajs', WEBROOT . 'js/vendor/imulus/retina.js', FALSE, NULL, TRUE );
}

add_action( 'wp_enqueue_scripts', 'timetomarket_assets' );

/** Retina images */
add_filter( 'wp_generate_attachment_metadata', 'timetomarket_retina_support_attachment_meta', 10, 2 );

/**
 * Retina images
 *
 * This function is attached to the 'wp_generate_attachment_metadata' filter hook.
 */
function timetomarket_retina_support_attachment_meta( $metadata, $attachment_id ) {
	foreach ( $metadata as $key => $value ) {
		if ( is_array( $value ) ) {
			foreach ( $value as $image => $attr ) {
				if ( is_array( $attr ) )
					timetomarket_retina_support_create_images( get_attached_file( $attachment_id ), $attr['width'], $attr['height'], true );
				}
			}
		}
	
	return $metadata;
}

/**
 * Create retina-ready images
 *
 * Referenced via retina_support_attachment_meta().
 */
function timetomarket_retina_support_create_images( $file, $width, $height, $crop = false ) {
	if ( $width || $height ) {
		$resized_file = wp_get_image_editor( $file );
	
		if ( ! is_wp_error( $resized_file ) ) {
			$filename = $resized_file->generate_filename( $width . 'x' . $height . '@2x' );

			$resized_file->resize( $width * 2, $height * 2, $crop );
			$resized_file->save( $filename );

			$info = $resized_file->get_size();

			return array(
				'file' => wp_basename( $filename ),
				'width' => $info['width'],
				'height' => $info['height'],
			);
		}
	}
	
	return false;
}

/** Excerpt length */
if ( defined( 'EXCERPT_LENGTH' ) ) {
	function timetomarket_excerpt_length( $length ) {
		return EXCERPT_LENGTH;
	}

	add_filter( 'excerpt_length', 'timetomarket_excerpt_length', 999 );
}

/** Featured image HTML */
function timetomarket_featured_image_html( $html, $post_id, $post_image_id ) {
	$html = '<div class="featured-image">' . $html . '</div>';
	return $html;
}

add_filter( 'post_thumbnail_html', 'timetomarket_featured_image_html', 10, 3 );