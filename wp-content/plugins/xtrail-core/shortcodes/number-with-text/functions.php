<?php

if ( ! function_exists( 'xtrail_core_add_number_with_text_shortcodes' ) ) {
	function xtrail_core_add_number_with_text_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'XtrailCore\CPT\Shortcodes\NumberWithText\NumberWIthText'
		);

		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );

		return $shortcodes_class_name;
	}

	add_filter( 'xtrail_core_filter_add_vc_shortcode', 'xtrail_core_add_number_with_text_shortcodes' );
}

if ( ! function_exists( 'xtrail_core_set_number_with_text_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for number with text shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function xtrail_core_set_number_with_text_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-number-with-text';

		return $shortcodes_icon_class_array;
	}

	add_filter( 'xtrail_core_filter_add_vc_shortcodes_custom_icon_class', 'xtrail_core_set_number_with_text_icon_class_name_for_vc_shortcodes' );
}