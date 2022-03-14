<?php

if ( ! function_exists( 'xtrail_core_add_anchor_menu_shortcodes' ) ) {
	function xtrail_core_add_anchor_menu_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'XtrailCore\CPT\Shortcodes\AnchorMenu\AnchorMenu'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'xtrail_core_filter_add_vc_shortcode', 'xtrail_core_add_anchor_menu_shortcodes' );
}

if ( ! function_exists( 'xtrail_core_set_anchor_menu_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for anchor menu shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function xtrail_core_set_anchor_menu_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-anchor-menu';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter( 'xtrail_core_filter_add_vc_shortcodes_custom_icon_class', 'xtrail_core_set_anchor_menu_icon_class_name_for_vc_shortcodes' );
}


if ( ! function_exists( 'xtrail_select_anchor_body_class' ) ) {
    function xtrail_select_anchor_body_class($classes) {

        if(xtrail_select_has_shortcode( 'qodef_anchor_menu' )) {
            $classes[] = 'qodef-has-anchor-menu';
        }

        return $classes;
    }

    add_filter('body_class', 'xtrail_select_anchor_body_class');
}