<?php

if ( ! function_exists( 'xtrail_select_sidebar_options_map' ) ) {
	function xtrail_select_sidebar_options_map() {
		
		xtrail_select_add_admin_page(
			array(
				'slug'  => '_sidebar_page',
				'title' => esc_html__( 'Sidebar Area', 'xtrail' ),
				'icon'  => 'fa fa-indent'
			)
		);
		
		$sidebar_panel = xtrail_select_add_admin_panel(
			array(
				'title' => esc_html__( 'Sidebar Area', 'xtrail' ),
				'name'  => 'sidebar',
				'page'  => '_sidebar_page'
			)
		);
		
		xtrail_select_add_admin_field( array(
			'name'          => 'sidebar_layout',
			'type'          => 'select',
			'label'         => esc_html__( 'Sidebar Layout', 'xtrail' ),
			'description'   => esc_html__( 'Choose a sidebar layout for pages', 'xtrail' ),
			'parent'        => $sidebar_panel,
			'default_value' => 'no-sidebar',
            'options'       => xtrail_select_get_custom_sidebars_options()
		) );
		
		$xtrail_custom_sidebars = xtrail_select_get_custom_sidebars();
		if ( count( $xtrail_custom_sidebars ) > 0 ) {
			xtrail_select_add_admin_field( array(
				'name'        => 'custom_sidebar_area',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'xtrail' ),
				'description' => esc_html__( 'Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'xtrail' ),
				'parent'      => $sidebar_panel,
				'options'     => $xtrail_custom_sidebars,
				'args'        => array(
					'select2' => true
				)
			) );
		}
	}
	
	add_action( 'xtrail_select_action_options_map', 'xtrail_select_sidebar_options_map', xtrail_select_set_options_map_position( 'sidebar' ) );
}