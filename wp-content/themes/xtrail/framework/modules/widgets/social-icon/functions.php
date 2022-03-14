<?php

if ( ! function_exists( 'xtrail_select_register_social_icon_widget' ) ) {
	/**
	 * Function that register social icon widget
	 */
	function xtrail_select_register_social_icon_widget( $widgets ) {
		$widgets[] = 'XtrailSelectClassSocialIconWidget';
		
		return $widgets;
	}
	
	add_filter( 'xtrail_core_filter_register_widgets', 'xtrail_select_register_social_icon_widget' );
}