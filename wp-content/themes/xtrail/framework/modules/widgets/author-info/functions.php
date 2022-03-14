<?php

if ( ! function_exists( 'xtrail_select_register_author_info_widget' ) ) {
	/**
	 * Function that register author info widget
	 */
	function xtrail_select_register_author_info_widget( $widgets ) {
		$widgets[] = 'XtrailSelectClassAuthorInfoWidget';
		
		return $widgets;
	}
	
	add_filter( 'xtrail_core_filter_register_widgets', 'xtrail_select_register_author_info_widget' );
}