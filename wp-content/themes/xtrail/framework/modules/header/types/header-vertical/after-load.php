<?php

if ( ! function_exists( 'xtrail_select_disable_behaviors_for_header_vertical' ) ) {
	/**
	 * This function is used to disable sticky header functions that perform processing variables their used in js for this header type
	 */
	function xtrail_select_disable_behaviors_for_header_vertical( $allow_behavior ) {
		return false;
	}
	
	if ( xtrail_select_check_is_header_type_enabled( 'header-vertical', xtrail_select_get_page_id() ) ) {
		add_filter( 'xtrail_select_filter_allow_sticky_header_behavior', 'xtrail_select_disable_behaviors_for_header_vertical' );
		add_filter( 'xtrail_select_filter_allow_content_boxed_layout', 'xtrail_select_disable_behaviors_for_header_vertical' );
	}
}