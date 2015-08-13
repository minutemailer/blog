<?php

class TimeToMarket {

	public static function get_menu( $location ) {
		$menus          = wp_get_nav_menus();
		$menu_locations = get_nav_menu_locations();
		$found_menu     = null;

		foreach ( $menus as $menu ) {
			if ( $menu->term_id == $menu_locations[ $location ] ) {
				$found_menu = $menu;
				break;
			}
		}

		return $found_menu;
	}

	public static function menu_items( $location ) {
		$menu = self::get_menu( $location );

		if ( ! $menu ) {
			return false;
		}

		return wp_get_nav_menu_items( $menu );
	}

	public static function menu_name( $location ) {
		$menu = self::get_menu( $location );

		if ( ! $menu ) {
			return false;
		}
		
		return $menu->name;
	}

	public static function is_startpage() {
		$startpage  = is_front_page() && is_home() && ! is_paged();
		return $startpage;
	}

	public static function logo() {
		$theme_logo = get_theme_mod( 'minutemailer_logo' );
		$html       = '<a href="' . esc_url( get_option( 'ttm_company_url' ) ) . '">';

		if ( $theme_logo ) {
			$html .= '<img src="' . $theme_logo . '" width="180" alt="' . get_option( 'ttm_company_name' ) . ' logo">';
		} else {
			$html .= get_bloginfo( 'name' );
		}

		$html .= '</a>';

		return $html;
	}

	public static function blog_home_link() {
		return '<span class="blog-home"><a href="' . esc_url( home_url() ) . '">' . get_bloginfo( 'name' ) . '</a></span>';
	}

	public static function featuredImage() {
		$size = ( is_single() ) ? 'timetomarket-full-width' : 'timetomarket-featured-listing';

		if ( has_post_thumbnail() ) {
			the_post_thumbnail( $size );
		}
	}

	public static function title() {
		$html  = '<header class="section-title">';

		global $wp_query;
		
		if ( is_category() ) {
			$title = single_cat_title( '', FALSE ) . ' ' . __( 'posts', 'timetomarket' );
		} elseif ( is_author() ) {
			$author_obj = $wp_query->get_queried_object();
			$title = sprintf( __( 'Posts by % s', 'timetomarket' ), $author_obj->display_name );
		} else {
			$title = get_bloginfo( 'name' );
		}

		$html .= '<h1 class="section-title__heading">' . $title . '</h1>';

		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

		if ( $paged > 1 ) {
			$html .= '<span class="section-title__sub">' . __( 'Page', 'timetomarket' ) . ' ' . $paged . ' ' . __( 'out of', 'timetomarket' ) . ' ' . $wp_query->max_num_pages . '</span>';
		}

		$html .= '</header>';

		return $html;
	}

}