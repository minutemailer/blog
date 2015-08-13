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

	public static function featuredImage() {
		$size = ( is_single() ) ? 'timetomarket-full-width' : 'timetomarket-featured-listing';

		if ( has_post_thumbnail() ) {
			the_post_thumbnail( $size );
		}
	}

}