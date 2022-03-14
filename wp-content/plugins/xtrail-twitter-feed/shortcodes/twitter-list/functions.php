<?php

if ( ! function_exists( 'xtrail_twitter_add_twitter_list_shortcodes' ) ) {
	function xtrail_twitter_add_twitter_list_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'XtrailTwitter\Shortcodes\TwitterList\TwitterList'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'xtrail_twitter_filter_add_vc_shortcode', 'xtrail_twitter_add_twitter_list_shortcodes' );
}

if ( ! function_exists( 'xtrail_twitter_set_twitter_list_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for twitter list shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function xtrail_twitter_set_twitter_list_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-twitter-list';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter( 'xtrail_core_filter_add_vc_shortcodes_custom_icon_class', 'xtrail_twitter_set_twitter_list_icon_class_name_for_vc_shortcodes' );
}