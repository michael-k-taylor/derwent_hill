<?php

if ( ! function_exists( 'xtrail_select_register_recent_posts_widget' ) ) {
	/**
	 * Function that register search opener widget
	 */
	function xtrail_select_register_recent_posts_widget( $widgets ) {
		$widgets[] = 'XtrailSelectClassRecentPosts';
		
		return $widgets;
	}
	
	add_filter( 'xtrail_core_filter_register_widgets', 'xtrail_select_register_recent_posts_widget' );
}