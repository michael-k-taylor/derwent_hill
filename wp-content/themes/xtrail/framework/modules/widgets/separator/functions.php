<?php

if ( ! function_exists( 'xtrail_select_register_separator_widget' ) ) {
	/**
	 * Function that register separator widget
	 */
	function xtrail_select_register_separator_widget( $widgets ) {
		$widgets[] = 'XtrailSelectClassSeparatorWidget';
		
		return $widgets;
	}
	
	add_filter( 'xtrail_core_filter_register_widgets', 'xtrail_select_register_separator_widget' );
}