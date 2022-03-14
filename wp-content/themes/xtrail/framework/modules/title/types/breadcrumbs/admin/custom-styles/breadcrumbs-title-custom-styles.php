<?php

if ( ! function_exists( 'xtrail_select_breadcrumbs_title_area_typography_style' ) ) {
	function xtrail_select_breadcrumbs_title_area_typography_style() {
		
		$item_styles = xtrail_select_get_typography_styles( 'page_breadcrumb' );
		
		$item_selector = array(
			'.qodef-title-holder .qodef-title-wrapper .qodef-breadcrumbs'
		);
		
		echo xtrail_select_dynamic_css( $item_selector, $item_styles );
		
		
		$breadcrumb_hover_color = xtrail_select_options()->getOptionValue( 'page_breadcrumb_hovercolor' );
		
		$breadcrumb_hover_styles = array();
		if ( ! empty( $breadcrumb_hover_color ) ) {
			$breadcrumb_hover_styles['color'] = $breadcrumb_hover_color;
		}
		
		$breadcrumb_hover_selector = array(
			'.qodef-title-holder .qodef-title-wrapper .qodef-breadcrumbs a:hover'
		);
		
		echo xtrail_select_dynamic_css( $breadcrumb_hover_selector, $breadcrumb_hover_styles );
	}
	
	add_action( 'xtrail_select_action_style_dynamic', 'xtrail_select_breadcrumbs_title_area_typography_style' );
}