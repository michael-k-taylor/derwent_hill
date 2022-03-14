<?php

if ( ! function_exists( 'xtrail_select_get_hide_dep_for_header_widget_areas_meta_boxes' ) ) {
	function xtrail_select_get_hide_dep_for_header_widget_areas_meta_boxes() {
		$hide_dep_options = apply_filters( 'xtrail_select_filter_header_widget_areas_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'xtrail_select_get_hide_dep_for_header_widget_area_two_meta_boxes' ) ) {
	function xtrail_select_get_hide_dep_for_header_widget_area_two_meta_boxes() {
		$hide_dep_options = apply_filters( 'xtrail_select_filter_header_widget_area_two_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'xtrail_select_header_widget_areas_meta_options_map' ) ) {
	function xtrail_select_header_widget_areas_meta_options_map( $header_meta_box ) {
		$hide_dep_widgets 			= xtrail_select_get_hide_dep_for_header_widget_areas_meta_boxes();
		$hide_dep_widget_area_two 	= xtrail_select_get_hide_dep_for_header_widget_area_two_meta_boxes();
		
		$header_widget_areas_container = xtrail_select_add_admin_container_no_style(
			array(
				'type'       => 'container',
				'name'       => 'header_widget_areas_container',
				'parent'     => $header_meta_box,
				'dependency' => array(
					'hide' => array(
						'qodef_header_type_meta' => $hide_dep_widgets
					)
				),
				'args'       => array(
					'enable_panels_for_default_value' => true
				)
			)
		);
		
		xtrail_select_add_admin_section_title(
			array(
				'parent' => $header_widget_areas_container,
				'name'   => 'header_widget_areas',
				'title'  => esc_html__( 'Widget Areas', 'xtrail' )
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'          => 'qodef_disable_header_widget_areas_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Header Widget Areas', 'xtrail' ),
				'description'   => esc_html__( 'Enabling this option will hide widget areas from header', 'xtrail' ),
				'parent'        => $header_widget_areas_container,
			)
		);

		$header_custom_widget_areas_container = xtrail_select_add_admin_container_no_style(
			array(
				'type'       => 'container',
				'name'       => 'header_custom_widget_areas_container',
				'parent'     => $header_widget_areas_container,
				'dependency' => array(
					'hide' => array(
						'qodef_disable_header_widget_areas_meta' => 'yes'
					)
				)
			)
		);
					
		$xtrail_custom_sidebars = xtrail_select_get_custom_sidebars();
		if ( count( $xtrail_custom_sidebars ) > 0 ) {
			xtrail_select_create_meta_box_field(
				array(
					'name'        => 'qodef_custom_header_widget_area_one_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Header Widget Area One', 'xtrail' ),
					'description' => esc_html__( 'Choose custom widget area to display in header widget area one', 'xtrail' ),
					'parent'      => $header_custom_widget_areas_container,
					'options'     => $xtrail_custom_sidebars
				)
			);
		}

		if ( count( $xtrail_custom_sidebars ) > 0 ) {
			xtrail_select_create_meta_box_field(
				array(
					'name'        => 'qodef_custom_header_widget_area_two_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Header Widget Area Two', 'xtrail' ),
					'description' => esc_html__( 'Choose custom widget area to display in header widget area two', 'xtrail' ),
					'parent'      => $header_custom_widget_areas_container,
					'options'     => $xtrail_custom_sidebars,
					'dependency' => array(
						'hide' => array(
							'qodef_header_type_meta' => $hide_dep_widget_area_two
						)
					)
				)
			);
		}
		
		do_action( 'xtrail_select_header_widget_areas_additional_meta_boxes_map', $header_widget_areas_container );
	}
	
	add_action( 'xtrail_select_action_header_widget_areas_meta_boxes_map', 'xtrail_select_header_widget_areas_meta_options_map', 10, 1 );
}