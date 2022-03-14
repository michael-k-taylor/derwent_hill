<?php

if ( xtrail_select_is_plugin_installed( 'contact-form-7' ) ) {
	include_once SELECT_FRAMEWORK_MODULES_ROOT_DIR . '/widgets/contact-form-7/contact-form-7.php';
	
	add_filter( 'xtrail_core_filter_register_widgets', 'xtrail_select_register_cf7_widget' );
}

if ( ! function_exists( 'xtrail_select_register_cf7_widget' ) ) {
	/**
	 * Function that register cf7 widget
	 */
	function xtrail_select_register_cf7_widget( $widgets ) {
		$widgets[] = 'XtrailSelectClassContactForm7Widget';
		
		return $widgets;
	}
}