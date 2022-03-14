<?php

if ( ! function_exists( 'xtrail_select_register_header_minimal_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function xtrail_select_register_header_minimal_type( $header_types ) {
		$header_type = array(
			'header-minimal' => 'XtrailSelectNamespace\Modules\Header\Types\HeaderMinimal'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'xtrail_select_init_register_header_minimal_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function xtrail_select_init_register_header_minimal_type() {
		add_filter( 'xtrail_select_filter_register_header_type_class', 'xtrail_select_register_header_minimal_type' );
	}
	
	add_action( 'xtrail_select_action_before_header_function_init', 'xtrail_select_init_register_header_minimal_type' );
}

if ( ! function_exists( 'xtrail_select_include_header_minimal_full_screen_menu' ) ) {
	/**
	 * Registers additional menu navigation for theme
	 */
	function xtrail_select_include_header_minimal_full_screen_menu( $menus ) {
		$menus['popup-navigation'] = esc_html__( 'Full Screen Navigation', 'xtrail' );
		
		return $menus;
	}
	
	if ( xtrail_select_check_is_header_type_enabled( 'header-minimal' ) ) {
		add_filter( 'xtrail_select_filter_register_headers_menu', 'xtrail_select_include_header_minimal_full_screen_menu' );
	}
}

if ( ! function_exists( 'xtrail_select_get_fullscreen_menu_icon_class' ) ) {
	/**
	 * Loads full screen menu icon class
	 */
	function xtrail_select_get_fullscreen_menu_icon_class() {
		$classes = array(
			'qodef-fullscreen-menu-opener'
		);
		
		$classes[] = xtrail_select_get_icon_sources_class( 'fullscreen_menu', 'qodef-fullscreen-menu-opener' );
		
		return $classes;
	}
}