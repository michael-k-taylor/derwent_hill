<?php

if ( ! function_exists( 'xtrail_select_logo_options_map' ) ) {
	function xtrail_select_logo_options_map() {
		
		xtrail_select_add_admin_page(
			array(
				'slug'  => '_logo_page',
				'title' => esc_html__( 'Logo', 'xtrail' ),
				'icon'  => 'fa fa-coffee'
			)
		);
		
		$panel_logo = xtrail_select_add_admin_panel(
			array(
				'page'  => '_logo_page',
				'name'  => 'panel_logo',
				'title' => esc_html__( 'Logo', 'xtrail' )
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'parent'        => $panel_logo,
				'type'          => 'yesno',
				'name'          => 'hide_logo',
				'default_value' => 'no',
				'label'         => esc_html__( 'Hide Logo', 'xtrail' ),
				'description'   => esc_html__( 'Enabling this option will hide logo image', 'xtrail' )
			)
		);
		
		$hide_logo_container = xtrail_select_add_admin_container(
			array(
				'parent'          => $panel_logo,
				'name'            => 'hide_logo_container',
				'dependency' => array(
					'hide' => array(
						'hide_logo'  => 'yes'
					)
				)
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'logo_image',
				'type'          => 'image',
				'default_value' => SELECT_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Default', 'xtrail' ),
				'parent'        => $hide_logo_container
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'logo_image_dark',
				'type'          => 'image',
				'default_value' => SELECT_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Dark', 'xtrail' ),
				'parent'        => $hide_logo_container
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'logo_image_light',
				'type'          => 'image',
				'default_value' => SELECT_ASSETS_ROOT . "/img/logo_white.png",
				'label'         => esc_html__( 'Logo Image - Light', 'xtrail' ),
				'parent'        => $hide_logo_container
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'logo_image_sticky',
				'type'          => 'image',
				'default_value' => SELECT_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Sticky', 'xtrail' ),
				'parent'        => $hide_logo_container
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'logo_image_mobile',
				'type'          => 'image',
				'default_value' => SELECT_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Mobile', 'xtrail' ),
				'parent'        => $hide_logo_container
			)
		);
	}
	
	add_action( 'xtrail_select_action_options_map', 'xtrail_select_logo_options_map', xtrail_select_set_options_map_position( 'logo' ) );
}