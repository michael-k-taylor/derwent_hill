<?php

if ( ! function_exists( 'xtrail_select_set_hide_dep_options_title_centered' ) ) {
	/**
	 * This function is used to hide all containers/panels for admin options when this title type is selected
	 */
	function xtrail_select_set_hide_dep_options_title_centered( $hide_dep_options ) {
		$hide_dep_options[] = 'centered';
		
		return $hide_dep_options;
	}
	
	// hide breadcrumbs meta
	add_filter( 'xtrail_select_filter_breadcrumbs_title_hide_meta_boxes', 'xtrail_select_set_hide_dep_options_title_centered' );
}