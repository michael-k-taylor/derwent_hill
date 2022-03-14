<?php

if ( ! function_exists( 'xtrail_select_search_opener_icon_size' ) ) {
	function xtrail_select_search_opener_icon_size() {
		$icon_size = xtrail_select_options()->getOptionValue( 'header_search_icon_size' );
		
		if ( ! empty( $icon_size ) ) {
			echo xtrail_select_dynamic_css( '.qodef-search-opener', array(
				'font-size' => xtrail_select_filter_px( $icon_size ) . 'px'
			) );
		}
	}
	
	add_action( 'xtrail_select_action_style_dynamic', 'xtrail_select_search_opener_icon_size' );
}

if ( ! function_exists( 'xtrail_select_search_opener_icon_colors' ) ) {
	function xtrail_select_search_opener_icon_colors() {
		$icon_color       = xtrail_select_options()->getOptionValue( 'header_search_icon_color' );
		$icon_hover_color = xtrail_select_options()->getOptionValue( 'header_search_icon_hover_color' );
		
		if ( ! empty( $icon_color ) ) {
			echo xtrail_select_dynamic_css( '.qodef-search-opener', array(
				'color' => $icon_color
			) );
		}
		
		if ( ! empty( $icon_hover_color ) ) {
			echo xtrail_select_dynamic_css( '.qodef-search-opener:hover', array(
				'color' => $icon_hover_color
			) );
		}
	}
	
	add_action( 'xtrail_select_action_style_dynamic', 'xtrail_select_search_opener_icon_colors' );
}

if ( ! function_exists( 'xtrail_select_search_opener_text_styles' ) ) {
	function xtrail_select_search_opener_text_styles() {
		$item_styles = xtrail_select_get_typography_styles( 'search_icon_text' );
		
		$item_selector = array(
			'.qodef-search-icon-text'
		);
		
		echo xtrail_select_dynamic_css( $item_selector, $item_styles );
		
		$text_hover_color = xtrail_select_options()->getOptionValue( 'search_icon_text_color_hover' );
		
		if ( ! empty( $text_hover_color ) ) {
			echo xtrail_select_dynamic_css( '.qodef-search-opener:hover .qodef-search-icon-text', array(
				'color' => $text_hover_color
			) );
		}
	}
	
	add_action( 'xtrail_select_action_style_dynamic', 'xtrail_select_search_opener_text_styles' );
}