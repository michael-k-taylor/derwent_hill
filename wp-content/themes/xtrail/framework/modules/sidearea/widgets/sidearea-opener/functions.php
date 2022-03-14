<?php

if ( ! function_exists( 'xtrail_select_register_sidearea_opener_widget' ) ) {
	/**
	 * Function that register sidearea opener widget
	 */
	function xtrail_select_register_sidearea_opener_widget( $widgets ) {
		$widgets[] = 'XtrailSelectClassSideAreaOpener';
		
		return $widgets;
	}
	
	add_filter( 'xtrail_core_filter_register_widgets', 'xtrail_select_register_sidearea_opener_widget' );
}