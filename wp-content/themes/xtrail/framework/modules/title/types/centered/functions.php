<?php

if ( ! function_exists( 'xtrail_select_set_title_centered_type_for_options' ) ) {
	/**
	 * This function set centered title type value for title options map and meta boxes
	 */
	function xtrail_select_set_title_centered_type_for_options( $type ) {
		$type['centered'] = esc_html__( 'Centered', 'xtrail' );
		
		return $type;
	}
	
	add_filter( 'xtrail_select_filter_title_type_global_option', 'xtrail_select_set_title_centered_type_for_options' );
	add_filter( 'xtrail_select_filter_title_type_meta_boxes', 'xtrail_select_set_title_centered_type_for_options' );
}