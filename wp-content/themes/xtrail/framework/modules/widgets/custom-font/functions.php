<?php

if ( ! function_exists( 'xtrail_select_register_custom_font_widget' ) ) {
	/**
	 * Function that register custom font widget
	 */
	function xtrail_select_register_custom_font_widget( $widgets ) {
		$widgets[] = 'XtrailSelectClassCustomFontWidget';
		
		return $widgets;
	}
	
	add_filter( 'xtrail_core_filter_register_widgets', 'xtrail_select_register_custom_font_widget' );
}