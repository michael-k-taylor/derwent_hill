<?php

if ( ! function_exists( 'xtrail_select_get_hide_dep_for_header_standard_meta_boxes' ) ) {
	function xtrail_select_get_hide_dep_for_header_standard_meta_boxes() {
		$hide_dep_options = apply_filters( 'xtrail_select_filter_header_standard_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'xtrail_select_header_standard_meta_map' ) ) {
	function xtrail_select_header_standard_meta_map( $parent ) {
		$hide_dep_options = xtrail_select_get_hide_dep_for_header_standard_meta_boxes();
		
		xtrail_select_create_meta_box_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'qodef_set_menu_area_position_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Choose Menu Area Position', 'xtrail' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'xtrail' ),
				'options'         => array(
					''       => esc_html__( 'Default', 'xtrail' ),
					'left'   => esc_html__( 'Left', 'xtrail' ),
					'right'  => esc_html__( 'Right', 'xtrail' ),
					'center' => esc_html__( 'Center', 'xtrail' )
				),
				'dependency' => array(
					'hide' => array(
						'qodef_header_type_meta'  => $hide_dep_options
					)
				)
			)
		);
	}
	
	add_action( 'xtrail_select_action_additional_header_area_meta_boxes_map', 'xtrail_select_header_standard_meta_map' );
}