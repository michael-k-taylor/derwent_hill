<?php

if ( ! function_exists( 'xtrail_select_get_hide_dep_for_header_menu_area_options' ) ) {
	function xtrail_select_get_hide_dep_for_header_menu_area_options() {
		$hide_dep_options = apply_filters( 'xtrail_select_filter_header_menu_area_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'xtrail_select_header_menu_area_options_map' ) ) {
	function xtrail_select_header_menu_area_options_map( $panel_header ) {
		$hide_dep_options = xtrail_select_get_hide_dep_for_header_menu_area_options();
		
		$menu_area_container = xtrail_select_add_admin_container_no_style(
			array(
				'parent'          => $panel_header,
				'name'            => 'menu_area_container',
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				),
			)
		);
		
		xtrail_select_add_admin_section_title(
			array(
				'parent' => $menu_area_container,
				'name'   => 'menu_area_style',
				'title'  => esc_html__( 'Menu Area Style', 'xtrail' )
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'parent'        => $menu_area_container,
				'type'          => 'yesno',
				'name'          => 'menu_area_in_grid',
				'default_value' => 'no',
				'label'         => esc_html__( 'Menu Area In Grid', 'xtrail' ),
				'description'   => esc_html__( 'Set menu area content to be in grid', 'xtrail' ),
			)
		);
		
		$menu_area_in_grid_container = xtrail_select_add_admin_container(
			array(
				'parent'          => $menu_area_container,
				'name'            => 'menu_area_in_grid_container',
				'dependency' => array(
					'hide' => array(
						'menu_area_in_grid'  => 'no'
					)
				)
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_container,
				'type'          => 'color',
				'name'          => 'menu_area_grid_background_color',
				'default_value' => '',
				'label'         => esc_html__( 'Grid Background Color', 'xtrail' ),
				'description'   => esc_html__( 'Set grid background color for menu area', 'xtrail' ),
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_container,
				'type'          => 'text',
				'name'          => 'menu_area_grid_background_transparency',
				'default_value' => '',
				'label'         => esc_html__( 'Grid Background Transparency', 'xtrail' ),
				'description'   => esc_html__( 'Set grid background transparency for menu area', 'xtrail' ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_container,
				'type'          => 'yesno',
				'name'          => 'menu_area_in_grid_shadow',
				'default_value' => 'no',
				'label'         => esc_html__( 'Grid Area Shadow', 'xtrail' ),
				'description'   => esc_html__( 'Set shadow on grid area', 'xtrail' )
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_container,
				'type'          => 'yesno',
				'name'          => 'menu_area_in_grid_border',
				'default_value' => 'no',
				'label'         => esc_html__( 'Grid Area Border', 'xtrail' ),
				'description'   => esc_html__( 'Set border on grid area', 'xtrail' )
			)
		);
		
		$menu_area_in_grid_border_container = xtrail_select_add_admin_container(
			array(
				'parent'          => $menu_area_in_grid_container,
				'name'            => 'menu_area_in_grid_border_container',
				'dependency' => array(
					'hide' => array(
						'menu_area_in_grid_border'  => 'no'
					)
				)
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_border_container,
				'type'          => 'color',
				'name'          => 'menu_area_in_grid_border_color',
				'default_value' => '',
				'label'         => esc_html__( 'Border Color', 'xtrail' ),
				'description'   => esc_html__( 'Set border color for menu area', 'xtrail' ),
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'parent'        => $menu_area_container,
				'type'          => 'color',
				'name'          => 'menu_area_background_color',
				'default_value' => '',
				'label'         => esc_html__( 'Background Color', 'xtrail' ),
				'description'   => esc_html__( 'Set background color for menu area', 'xtrail' )
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'parent'        => $menu_area_container,
				'type'          => 'text',
				'name'          => 'menu_area_background_transparency',
				'default_value' => '',
				'label'         => esc_html__( 'Background Transparency', 'xtrail' ),
				'description'   => esc_html__( 'Set background transparency for menu area', 'xtrail' ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'parent'        => $menu_area_container,
				'type'          => 'yesno',
				'name'          => 'menu_area_shadow',
				'default_value' => 'no',
				'label'         => esc_html__( 'Menu Area Shadow', 'xtrail' ),
				'description'   => esc_html__( 'Set shadow on menu area', 'xtrail' ),
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'menu_area_border',
				'default_value' => 'no',
				'label'         => esc_html__( 'Menu Area Border', 'xtrail' ),
				'description'   => esc_html__( 'Set border on menu area', 'xtrail' ),
				'parent'        => $menu_area_container
			)
		);
		
		$menu_area_border_container = xtrail_select_add_admin_container(
			array(
				'parent'          => $menu_area_container,
				'name'            => 'menu_area_border_container',
				'dependency' => array(
					'hide' => array(
						'menu_area_border'  => 'no'
					)
				)
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'type'        => 'color',
				'name'        => 'menu_area_border_color',
				'label'       => esc_html__( 'Border Color', 'xtrail' ),
				'description' => esc_html__( 'Set border color for menu area', 'xtrail' ),
				'parent'      => $menu_area_border_container
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'type'        => 'text',
				'name'        => 'menu_area_height',
				'label'       => esc_html__( 'Height', 'xtrail' ),
				'description' => esc_html__( 'Enter header height', 'xtrail' ),
				'parent'      => $menu_area_container,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'type'   => 'text',
				'name'   => 'menu_area_side_padding',
				'label'  => esc_html__( 'Menu Area Side Padding', 'xtrail' ),
				'description'   => esc_html__( 'Enter padding for menu area. Use format: top right bottom left (e.g. 10px 5px 10px 5px)', 'xtrail' ),
				'parent' => $menu_area_container,
			)
		);
		
		do_action( 'xtrail_select_header_menu_area_additional_options', $panel_header );
	}
	
	add_action( 'xtrail_select_action_header_menu_area_options_map', 'xtrail_select_header_menu_area_options_map', 10, 1 );
}