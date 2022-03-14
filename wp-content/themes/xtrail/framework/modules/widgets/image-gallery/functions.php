<?php

if ( ! function_exists( 'xtrail_select_register_image_gallery_widget' ) ) {
	/**
	 * Function that register image gallery widget
	 */
	function xtrail_select_register_image_gallery_widget( $widgets ) {
		$widgets[] = 'XtrailSelectClassImageGalleryWidget';
		
		return $widgets;
	}
	
	add_filter( 'xtrail_core_filter_register_widgets', 'xtrail_select_register_image_gallery_widget' );
}