<?php

if ( ! function_exists( 'xtrail_select_map_sidebar_meta' ) ) {
	function xtrail_select_map_sidebar_meta() {
		$qodef_sidebar_meta_box = xtrail_select_create_meta_box(
			array(
				'scope' => apply_filters( 'xtrail_select_filter_set_scope_for_meta_boxes', array( 'page' ), 'sidebar_meta' ),
				'title' => esc_html__( 'Sidebar', 'xtrail' ),
				'name'  => 'sidebar_meta'
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'        => 'qodef_sidebar_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Sidebar Layout', 'xtrail' ),
				'description' => esc_html__( 'Choose the sidebar layout', 'xtrail' ),
				'parent'      => $qodef_sidebar_meta_box,
                'options'       => xtrail_select_get_custom_sidebars_options( true )
			)
		);
		
		$qodef_custom_sidebars = xtrail_select_get_custom_sidebars();
		if ( count( $qodef_custom_sidebars ) > 0 ) {
			xtrail_select_create_meta_box_field(
				array(
					'name'        => 'qodef_custom_sidebar_area_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Widget Area in Sidebar', 'xtrail' ),
					'description' => esc_html__( 'Choose Custom Widget area to display in Sidebar"', 'xtrail' ),
					'parent'      => $qodef_sidebar_meta_box,
					'options'     => $qodef_custom_sidebars,
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
	}
	
	add_action( 'xtrail_select_action_meta_boxes_map', 'xtrail_select_map_sidebar_meta', 31 );
}