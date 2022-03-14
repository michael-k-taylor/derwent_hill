<?php

if ( ! function_exists( 'xtrail_select_register_social_icons_widget' ) ) {
	/**
	 * Function that register social icon widget
	 */
	function xtrail_select_register_social_icons_widget( $widgets ) {
		$widgets[] = 'XtrailSelectClassClassIconsGroupWidget';
		
		return $widgets;
	}
	
	add_filter( 'xtrail_core_filter_register_widgets', 'xtrail_select_register_social_icons_widget' );
}