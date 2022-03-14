<?php

if ( ! function_exists( 'xtrail_select_register_icon_widget' ) ) {
	/**
	 * Function that register icon widget
	 */
	function xtrail_select_register_icon_widget( $widgets ) {
		$widgets[] = 'XtrailSelectClassIconWidget';
		
		return $widgets;
	}
	
	add_filter( 'xtrail_core_filter_register_widgets', 'xtrail_select_register_icon_widget' );
}