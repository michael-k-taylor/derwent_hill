<?php

if ( ! function_exists( 'xtrail_select_register_header_divided_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function xtrail_select_register_header_divided_type( $header_types ) {
		$header_type = array(
			'header-divided' => 'XtrailSelectNamespace\Modules\Header\Types\HeaderDivided'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'xtrail_select_init_register_header_divided_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function xtrail_select_init_register_header_divided_type() {
		add_filter( 'xtrail_select_filter_register_header_type_class', 'xtrail_select_register_header_divided_type' );
	}
	
	add_action( 'xtrail_select_action_before_header_function_init', 'xtrail_select_init_register_header_divided_type' );
}

if ( ! function_exists( 'xtrail_select_include_header_divided_menu' ) ) {
	/**
	 * Registers additional menu navigation for theme
	 */
	function xtrail_select_include_header_divided_menu( $menus ) {
		$menus['divided-left-navigation']  = esc_html__( 'Divided Left Navigation', 'xtrail' );
		$menus['divided-right-navigation'] = esc_html__( 'Divided Right Navigation', 'xtrail' );
		
		return $menus;
	}
	
	if ( xtrail_select_check_is_header_type_enabled( 'header-divided' ) ) {
		add_filter( 'xtrail_select_filter_register_headers_menu', 'xtrail_select_include_header_divided_menu' );
	}
}

if ( ! function_exists( 'xtrail_select_get_divided_left_main_menu' ) ) {
	/**
	 * Loads main menu HTML
	 *
	 * @param string $additional_class addition class to pass to template
	 */
	function xtrail_select_get_divided_left_main_menu( $additional_class = 'qodef-default-nav' ) {
		xtrail_select_get_module_template_part( 'templates/divided-left-navigation', 'header/types/header-divided', '', array( 'additional_class' => $additional_class ) );
	}
}

if ( ! function_exists( 'xtrail_select_get_sticky_divided_left_main_menu' ) ) {
	/**
	 * Loads main menu HTML
	 *
	 * @param string $additional_class addition class to pass to template
	 */
	function xtrail_select_get_sticky_divided_left_main_menu( $additional_class = 'qodef-default-nav' ) {
		xtrail_select_get_module_template_part( 'templates/sticky-divided-left-navigation', 'header/types/header-divided', '', array( 'additional_class' => $additional_class ) );
	}
}

if ( ! function_exists( 'xtrail_select_get_divided_right_main_menu' ) ) {
	/**
	 * Loads main menu HTML
	 *
	 * @param string $additional_class addition class to pass to template
	 */
	function xtrail_select_get_divided_right_main_menu( $additional_class = 'qodef-default-nav' ) {
		xtrail_select_get_module_template_part( 'templates/divided-right-navigation', 'header/types/header-divided', '', array( 'additional_class' => $additional_class ) );
	}
}

if ( ! function_exists( 'xtrail_select_get_sticky_divided_right_main_menu' ) ) {
	/**
	 * Loads main menu HTML
	 *
	 * @param string $additional_class addition class to pass to template
	 */
	function xtrail_select_get_sticky_divided_right_main_menu( $additional_class = 'qodef-default-nav' ) {
		xtrail_select_get_module_template_part( 'templates/sticky-divided-right-navigation', 'header/types/header-divided', '', array( 'additional_class' => $additional_class ) );
	}
}