<?php

if ( ! function_exists( 'xtrail_select_register_blog_list_widget' ) ) {
	/**
	 * Function that register blog list widget
	 */
	function xtrail_select_register_blog_list_widget( $widgets ) {
		$widgets[] = 'XtrailSelectClassBlogListWidget';
		
		return $widgets;
	}
	
	add_filter( 'xtrail_core_filter_register_widgets', 'xtrail_select_register_blog_list_widget' );
}