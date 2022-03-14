<?php

if ( ! function_exists( 'xtrail_select_get_hide_dep_for_header_vertical_area_options' ) ) {
	function xtrail_select_get_hide_dep_for_header_vertical_area_options() {
		$hide_dep_options = apply_filters( 'xtrail_select_filter_header_vertical_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'xtrail_select_header_vertical_options_map' ) ) {
	function xtrail_select_header_vertical_options_map( $panel_header ) {
		$hide_dep_options = xtrail_select_get_hide_dep_for_header_vertical_area_options();
		
		$vertical_area_container = xtrail_select_add_admin_container_no_style(
			array(
				'parent'          => $panel_header,
				'name'            => 'header_vertical_area_container',
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				)
			)
		);
		
		xtrail_select_add_admin_section_title(
			array(
				'parent' => $vertical_area_container,
				'name'   => 'menu_area_style',
				'title'  => esc_html__( 'Vertical Area Style', 'xtrail' )
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'        => 'vertical_header_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'xtrail' ),
				'description' => esc_html__( 'Set background color for vertical menu', 'xtrail' ),
				'parent'      => $vertical_area_container
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'vertical_header_background_image',
				'type'          => 'image',
				'default_value' => '',
				'label'         => esc_html__( 'Background Image', 'xtrail' ),
				'description'   => esc_html__( 'Set background image for vertical menu', 'xtrail' ),
				'parent'        => $vertical_area_container
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'parent'        => $vertical_area_container,
				'type'          => 'yesno',
				'name'          => 'vertical_header_shadow',
				'default_value' => 'no',
				'label'         => esc_html__( 'Shadow', 'xtrail' ),
				'description'   => esc_html__( 'Set shadow on vertical header', 'xtrail' ),
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'parent'        => $vertical_area_container,
				'type'          => 'yesno',
				'name'          => 'vertical_header_border',
				'default_value' => 'no',
				'label'         => esc_html__( 'Vertical Area Border', 'xtrail' ),
				'description'   => esc_html__( 'Set border on vertical area', 'xtrail' )
			)
		);
		
		$vertical_header_shadow_border_container = xtrail_select_add_admin_container(
			array(
				'parent'          => $vertical_area_container,
				'name'            => 'vertical_header_shadow_border_container',
				'dependency' => array(
					'hide' => array(
						'vertical_header_border'  => 'no'
					)
				)
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'parent'        => $vertical_header_shadow_border_container,
				'type'          => 'color',
				'name'          => 'vertical_header_border_color',
				'default_value' => '',
				'label'         => esc_html__( 'Border Color', 'xtrail' ),
				'description'   => esc_html__( 'Set border color for vertical area', 'xtrail' ),
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'parent'        => $vertical_area_container,
				'type'          => 'yesno',
				'name'          => 'vertical_header_center_content',
				'default_value' => 'no',
				'label'         => esc_html__( 'Center Content', 'xtrail' ),
				'description'   => esc_html__( 'Set content in vertical center', 'xtrail' ),
			)
		);
		
		do_action( 'xtrail_select_header_vertical_area_additional_options', $panel_header );
	}
	
	add_action( 'xtrail_select_action_additional_header_menu_area_options_map', 'xtrail_select_header_vertical_options_map' );
}