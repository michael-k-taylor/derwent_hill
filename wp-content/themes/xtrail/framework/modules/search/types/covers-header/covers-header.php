<?php

if ( ! function_exists( 'xtrail_select_search_body_class' ) ) {
	/**
	 * Function that adds body classes for different search types
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function xtrail_select_search_body_class( $classes ) {
		$classes[] = 'qodef-search-covers-header';
		
		return $classes;
	}
	
	add_filter( 'body_class', 'xtrail_select_search_body_class' );
}

if ( ! function_exists( 'xtrail_select_get_search' ) ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function xtrail_select_get_search() {
		xtrail_select_load_search_template();
	}
	
	add_action( 'xtrail_select_action_before_page_header_html_close', 'xtrail_select_get_search' );
	add_action( 'xtrail_select_action_before_mobile_header_html_close', 'xtrail_select_get_search' );
}

if ( ! function_exists( 'xtrail_select_load_search_template' ) ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function xtrail_select_load_search_template() {

		$search_in_grid   = xtrail_select_options()->getOptionValue( 'search_in_grid' ) == 'yes';
		
		$parameters = array(
			'search_in_grid'    		=> $search_in_grid,
			'search_close_icon_class' 	=> xtrail_select_get_search_close_icon_class()
		);
		
		xtrail_select_get_module_template_part( 'types/covers-header/templates/covers-header', 'search', '', $parameters );
	}
}