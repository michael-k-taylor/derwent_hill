<?php

if ( ! function_exists( 'xtrail_select_map_post_video_meta' ) ) {
	function xtrail_select_map_post_video_meta() {
		$video_post_format_meta_box = xtrail_select_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Video Post Format', 'xtrail' ),
				'name'  => 'post_format_video_meta'
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'          => 'qodef_video_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Video Type', 'xtrail' ),
				'description'   => esc_html__( 'Choose video type', 'xtrail' ),
				'parent'        => $video_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Video Service', 'xtrail' ),
					'self'            => esc_html__( 'Self Hosted', 'xtrail' )
				)
			)
		);
		
		$qodef_video_embedded_container = xtrail_select_add_admin_container(
			array(
				'parent' => $video_post_format_meta_box,
				'name'   => 'qodef_video_embedded_container'
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'        => 'qodef_post_video_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video URL', 'xtrail' ),
				'description' => esc_html__( 'Enter Video URL', 'xtrail' ),
				'parent'      => $qodef_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'qodef_video_type_meta' => 'social_networks'
					)
				)
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'        => 'qodef_post_video_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video MP4', 'xtrail' ),
				'description' => esc_html__( 'Enter video URL for MP4 format', 'xtrail' ),
				'parent'      => $qodef_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'qodef_video_type_meta' => 'self'
					)
				)
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'        => 'qodef_post_video_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Video Image', 'xtrail' ),
				'description' => esc_html__( 'Enter video image', 'xtrail' ),
				'parent'      => $qodef_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'qodef_video_type_meta' => 'self'
					)
				)
			)
		);
	}
	
	add_action( 'xtrail_select_action_meta_boxes_map', 'xtrail_select_map_post_video_meta', 22 );
}