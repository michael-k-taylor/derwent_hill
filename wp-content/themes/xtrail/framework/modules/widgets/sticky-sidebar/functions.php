<?php

if ( ! function_exists( 'xtrail_select_register_sticky_sidebar_widget' ) ) {
	/**
	 * Function that register sticky sidebar widget
	 */
	function xtrail_select_register_sticky_sidebar_widget( $widgets ) {
		$widgets[] = 'XtrailSelectClassStickySidebar';
		
		return $widgets;
	}
	
	add_filter( 'xtrail_core_filter_register_widgets', 'xtrail_select_register_sticky_sidebar_widget' );
}