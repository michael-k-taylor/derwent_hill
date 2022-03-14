<?php

if ( ! function_exists( 'xtrail_select_get_skewed_section_vc' ) ) {
	/**
	 * Loads Visual Composer Params
	 */
	function xtrail_select_get_skewed_section_vc() {
		
		vc_add_param( 'vc_row', array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Select Skewed Section Effect on Row', 'xtrail' ),
			'param_name' => 'enable_skewed_section_effect',
			'value'      => array(
				esc_html__( 'Disabled', 'xtrail' ) => 'no',
				esc_html__( 'Enabled', 'xtrail' )  => 'yes'
			),
			'group'      => esc_html__( 'Select Settings', 'xtrail' )
		) );
		
		vc_add_param( 'vc_row', array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Select Skewed Section Effect Top', 'xtrail' ),
			'param_name' => 'skewed_section_effect_top',
			'value'      => array(
				esc_html__( 'Disabled', 'xtrail' ) => 'no',
				esc_html__( 'Enabled', 'xtrail' )  => 'yes'
			),
			'dependency' => array( 'element' => 'enable_skewed_section_effect', 'value' => array( 'yes' ) ),
			'group'      => esc_html__( 'Select Settings', 'xtrail' )
		) );
		
		vc_add_param( 'vc_row', array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Select Skewed Section Effect Bottom', 'xtrail' ),
			'param_name' => 'skewed_section_effect_bottom',
			'value'      => array(
				esc_html__( 'Disabled', 'xtrail' ) => 'no',
				esc_html__( 'Enabled', 'xtrail' )  => 'yes'
			),
			'dependency' => array( 'element' => 'enable_skewed_section_effect', 'value' => array( 'yes' ) ),
			'group'      => esc_html__( 'Select Settings', 'xtrail' )
		) );
	}
	
	add_action( 'xtrail_select_action_additional_vc_row_params', 'xtrail_select_get_skewed_section_vc' );
}

if ( ! function_exists( 'xtrail_select_skewed_section_on_vc_row_top' ) ) {
	/**
	 * Loads html for skew section on top of the vc row
	 *
	 * @param $html
	 * @param $atts
	 *
	 * @return mixed
	 */
	function xtrail_select_skewed_section_on_vc_row_top( $html, $atts ) {
		$params = array();
		
		if ( isset( $atts['enable_skewed_section_effect'] ) && $atts['enable_skewed_section_effect'] === 'yes' && isset( $atts['skewed_section_effect_top'] ) && $atts['skewed_section_effect_top'] === 'yes' ) {
			// add additional class
			$params['additional_class'] = 'qodef-top-skewed-section-effect';
			
			// get style for skewed section
			$skewed_section_effect_style = array();
			if ( isset( $atts['simple_background_color'] ) && $atts['simple_background_color'] !== '' ) {
				$skewed_section_effect_style[] = 'color: ' . $atts['simple_background_color'];
			}
			
			$params['skewed_section_effect_style'] = implode( ';', $skewed_section_effect_style );
			
			// get svg code
			$params['skewed_section_svg'] = xtrail_select_skewed_section_default_svg();
			if ( xtrail_select_options()->getOptionValue( 'skewed_section_row_top_svg_path' ) !== '' ) {
				$params['skewed_section_svg'] = xtrail_select_options()->getOptionValue( 'skewed_section_row_top_svg_path' );
			}
			
			$html .= xtrail_select_get_html_module_template_part( 'templates/skewed-section-template', 'skewed-section', '', $params );
		}
		
		return $html;
	}
	
	add_filter( 'xtrail_select_filter_vc_after_wrapper_open', 'xtrail_select_skewed_section_on_vc_row_top', 10, 2 );
}

if ( ! function_exists( 'xtrail_select_skewed_section_on_vc_row_bottom' ) ) {
	/**
	 * Loads html for skew section on bottom of the vc row
	 *
	 * @param $html
	 * @param $atts
	 *
	 * @return mixed
	 */
	function xtrail_select_skewed_section_on_vc_row_bottom( $html, $atts ) {

		if ( isset( $atts['enable_skewed_section_effect'] ) && $atts['enable_skewed_section_effect'] === 'yes' && isset( $atts['skewed_section_effect_bottom'] ) && $atts['skewed_section_effect_bottom'] === 'yes' ) {

			// add additional class
			$params['additional_class'] = 'qodef-bottom-skewed-section-effect';

			// get style for skewed section
			$skewed_section_effect_style = array();
			if ( isset( $atts['simple_background_color'] ) && $atts['simple_background_color'] !== '' ) {
				$skewed_section_effect_style[] = 'color: ' . $atts['simple_background_color'];
			}
			
			$params['skewed_section_effect_style'] = implode( ';', $skewed_section_effect_style );

			// get svg code
			$params['skewed_section_svg'] = xtrail_select_skewed_section_default_svg();
			if ( xtrail_select_options()->getOptionValue( 'skewed_section_row_bottom_svg_path' ) !== '' ) {
				$params['skewed_section_svg'] = xtrail_select_options()->getOptionValue( 'skewed_section_row_bottom_svg_path' );
			}
			
			$html .= xtrail_select_get_html_module_template_part( 'templates/skewed-section-template', 'skewed-section', '', $params );
		}

		return $html;
	}

	add_filter( 'xtrail_select_filter_vc_before_wrapper_close', 'xtrail_select_skewed_section_on_vc_row_bottom', 10, 2 );
}

if ( ! function_exists( 'xtrail_select_skewed_section_on_title' ) ) {
	/**
	 * Print html for skew section on title area
	 *
	 * @return mixed
	 */
	function xtrail_select_skewed_section_on_title() {
		$id                   = xtrail_select_get_page_id();
		$title_skewed_section = xtrail_select_get_meta_field_intersect( 'enable_skewed_section_on_title_area', $id );

		if ( $title_skewed_section === 'yes' ) {
			$params = array();

			// add additional class
			$params['additional_class'] = 'qodef-title-skewed-section-effect';

			// inset or outline class - only for title
			if ( xtrail_select_get_meta_field_intersect( 'title_area_skewed_section_type', $id ) === 'inset' ) {
				$params['additional_class'] .= ' qodef-title-inset-section-effect';
			}

			// get style for skewed section
			$skewed_section_effect_style = array();
			$title_skewed_section_color  = xtrail_select_get_meta_field_intersect( 'title_area_skewed_section_svg_color', $id );
			if ( $title_skewed_section_color !== '' ) {
				$skewed_section_effect_style[] = 'color: ' . $title_skewed_section_color;
			}
			
			$params['skewed_section_effect_style'] = implode( ';', $skewed_section_effect_style );

			// get svg code
			$params['skewed_section_svg'] = xtrail_select_skewed_section_default_svg();
			$title_skewed_section_svg     = xtrail_select_options()->getOptionValue( 'title_area_skewed_section_svg_path' );
			
			if ( $title_skewed_section_svg !== '' ) {
				$params['skewed_section_svg'] = $title_skewed_section_svg;
			}

			xtrail_select_get_module_template_part( 'templates/skewed-section-template', 'skewed-section', '', $params );
		}
	}

	add_action( 'xtrail_select_action_after_page_title', 'xtrail_select_skewed_section_on_title' );
}

if ( ! function_exists( 'xtrail_select_skewed_section_on_header' ) ) {
	/**
	 * Print html for skew section on title area
	 *
	 * @return mixed
	 */
	function xtrail_select_skewed_section_on_header() {
		$id                    = xtrail_select_get_page_id();
		$header_skewed_section = xtrail_select_get_meta_field_intersect( 'enable_skewed_section_on_header_area', $id );

		if ( $header_skewed_section === 'yes' ) {
			$params = array();

			// add additional class
			$params['additional_class'] = 'qodef-header-skewed-section-effect';

			// get style for skewed section
			$skewed_section_effect_style = array();
			$header_skewed_section_color = xtrail_select_get_meta_field_intersect( 'header_area_skewed_section_svg_color', $id );
			
			if ( $header_skewed_section_color !== '' ) {
				$skewed_section_effect_style[] = 'color: ' . $header_skewed_section_color;
			}
			
			$params['skewed_section_effect_style'] = implode( ';', $skewed_section_effect_style );

			// get svg code
			$params['skewed_section_svg'] = xtrail_select_skewed_section_default_svg();
			$header_skewed_section_svg    = xtrail_select_options()->getOptionValue( 'header_area_skewed_section_svg_path' );
			
			if ( $header_skewed_section_svg !== '' ) {
				$params['skewed_section_svg'] = $header_skewed_section_svg;
			}

			xtrail_select_get_module_template_part( 'templates/skewed-section-template', 'skewed-section', '', $params );
		}
	}

	add_action( 'xtrail_select_action_before_page_header_html_close', 'xtrail_select_skewed_section_on_header' );
}