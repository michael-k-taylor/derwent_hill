<?php

if ( ! function_exists( 'xtrail_select_map_post_audio_meta' ) ) {
	function xtrail_select_map_post_audio_meta() {
		$audio_post_format_meta_box = xtrail_select_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Audio Post Format', 'xtrail' ),
				'name'  => 'post_format_audio_meta'
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'          => 'qodef_audio_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Audio Type', 'xtrail' ),
				'description'   => esc_html__( 'Choose audio type', 'xtrail' ),
				'parent'        => $audio_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Audio Service', 'xtrail' ),
					'self'            => esc_html__( 'Self Hosted', 'xtrail' )
				)
			)
		);
		
		$qodef_audio_embedded_container = xtrail_select_add_admin_container(
			array(
				'parent' => $audio_post_format_meta_box,
				'name'   => 'qodef_audio_embedded_container'
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'        => 'qodef_post_audio_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio URL', 'xtrail' ),
				'description' => esc_html__( 'Enter audio URL', 'xtrail' ),
				'parent'      => $qodef_audio_embedded_container,
				'dependency' => array(
					'show' => array(
						'qodef_audio_type_meta' => 'social_networks'
					)
				)
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'        => 'qodef_post_audio_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio Link', 'xtrail' ),
				'description' => esc_html__( 'Enter audio link', 'xtrail' ),
				'parent'      => $qodef_audio_embedded_container,
				'dependency' => array(
					'show' => array(
						'qodef_audio_type_meta' => 'self'
					)
				)
			)
		);
	}
	
	add_action( 'xtrail_select_action_meta_boxes_map', 'xtrail_select_map_post_audio_meta', 23 );
}