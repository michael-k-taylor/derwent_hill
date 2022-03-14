<?php

if ( ! function_exists( 'xtrail_core_register_widgets' ) ) {
	function xtrail_core_register_widgets() {
		$widgets = apply_filters( 'xtrail_core_filter_register_widgets', $widgets = array() );
		
		foreach ( $widgets as $widget ) {
			register_widget( $widget );
		}
	}
	
	add_action( 'widgets_init', 'xtrail_core_register_widgets' );
}