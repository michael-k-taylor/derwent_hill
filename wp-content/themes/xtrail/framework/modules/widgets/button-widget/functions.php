<?php

if ( ! function_exists( 'xtrail_select_register_button_widget' ) ) {
	/**
	 * Function that register button widget
	 */
	function xtrail_select_register_button_widget( $widgets ) {
		$widgets[] = 'XtrailSelectClassButtonWidget';
		
		return $widgets;
	}
	
	add_filter( 'xtrail_core_filter_register_widgets', 'xtrail_select_register_button_widget' );
}