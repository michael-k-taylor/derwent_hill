<?php

if ( ! function_exists( 'xtrail_select_reset_options_map' ) ) {
	/**
	 * Reset options panel
	 */
	function xtrail_select_reset_options_map() {
		
		xtrail_select_add_admin_page(
			array(
				'slug'  => '_reset_page',
				'title' => esc_html__( 'Reset', 'xtrail' ),
				'icon'  => 'fa fa-retweet'
			)
		);
		
		$panel_reset = xtrail_select_add_admin_panel(
			array(
				'page'  => '_reset_page',
				'name'  => 'panel_reset',
				'title' => esc_html__( 'Reset', 'xtrail' )
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'reset_to_defaults',
				'default_value' => 'no',
				'label'         => esc_html__( 'Reset to Defaults', 'xtrail' ),
				'description'   => esc_html__( 'This option will reset all Select Options values to defaults', 'xtrail' ),
				'parent'        => $panel_reset
			)
		);
	}
	
	add_action( 'xtrail_select_action_options_map', 'xtrail_select_reset_options_map', xtrail_select_set_options_map_position( 'reset' ) );
}