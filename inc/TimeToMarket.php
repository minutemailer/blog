<?php

class TimeToMarket {

	public static function menu_items( $location ) {
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

	public static function logo() {
		$theme_logo = get_theme_mod( 'minutemailer_logo' );
		$html       = '';

		if ( ! is_front_page() && ! is_home() ) {
			$html .= '<a href="' . get_bloginfo( 'url' ) . '">';
		}

		if ( $theme_logo ) {
			$html .= '<img src="' . $theme_logo . '" width="180" alt="' . get_bloginfo( 'name' ) . '">';
		} else {
			$html .= get_bloginfo( 'name' );
		}

		if ( is_front_page() && is_home() ) {
			$html .= '</a>';
		}

		return $html;
	}

}