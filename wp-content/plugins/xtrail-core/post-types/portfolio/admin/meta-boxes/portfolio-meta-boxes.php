<?php

if ( ! function_exists( 'xtrail_core_map_portfolio_meta' ) ) {
	function xtrail_core_map_portfolio_meta() {
		global $xtrail_select_global_Framework;
		
		$xtrail_pages = array();
		$pages      = get_pages();
		foreach ( $pages as $page ) {
			$xtrail_pages[ $page->ID ] = $page->post_title;
		}
		
		//Portfolio Images
		
		$xtrail_portfolio_images = new XtrailSelectClassMetaBox( 'portfolio-item', esc_html__( 'Portfolio Images (multiple upload)', 'xtrail-core' ), '', '', 'portfolio_images' );
		$xtrail_select_global_Framework->qodeMetaBoxes->addMetaBox( 'portfolio_images', $xtrail_portfolio_images );
		
		$xtrail_portfolio_image_gallery = new XtrailSelectClassMultipleImages( 'qodef-portfolio-image-gallery', esc_html__( 'Portfolio Images', 'xtrail-core' ), esc_html__( 'Choose your portfolio images', 'xtrail-core' ) );
		$xtrail_portfolio_images->addChild( 'qodef-portfolio-image-gallery', $xtrail_portfolio_image_gallery );
		
		//Portfolio Single Upload Images/Videos 
		
		$xtrail_portfolio_images_videos = xtrail_select_create_meta_box(
			array(
				'scope' => array( 'portfolio-item' ),
				'title' => esc_html__( 'Portfolio Images/Videos (single upload)', 'xtrail-core' ),
				'name'  => 'qodef_portfolio_images_videos'
			)
		);
		xtrail_select_add_repeater_field(
			array(
				'name'        => 'qodef_portfolio_single_upload',
				'parent'      => $xtrail_portfolio_images_videos,
				'button_text' => esc_html__( 'Add Image/Video', 'xtrail-core' ),
				'fields'      => array(
					array(
						'type'        => 'select',
						'name'        => 'file_type',
						'label'       => esc_html__( 'File Type', 'xtrail-core' ),
						'options' => array(
							'image' => esc_html__('Image','xtrail-core'),
							'video' => esc_html__('Video','xtrail-core'),
						)
					),
					array(
						'type'        => 'image',
						'name'        => 'single_image',
						'label'       => esc_html__( 'Image', 'xtrail-core' ),
						'dependency' => array(
							'show' => array(
								'file_type'  => 'image'
							)
						)
					),
					array(
						'type'        => 'select',
						'name'        => 'video_type',
						'label'       => esc_html__( 'Video Type', 'xtrail-core' ),
						'options'	  => array(
							'youtube' => esc_html__('YouTube', 'xtrail-core'),
							'vimeo' => esc_html__('Vimeo', 'xtrail-core'),
							'self' => esc_html__('Self Hosted', 'xtrail-core'),
						),
						'dependency' => array(
							'show' => array(
								'file_type'  => 'video'
							)
						)
					),
					array(
						'type'        => 'text',
						'name'        => 'video_id',
						'label'       => esc_html__( 'Video ID', 'xtrail-core' ),
						'dependency' => array(
							'show' => array(
								'file_type' => 'video',
								'video_type'  => array('youtube','vimeo')
							)
						)
					),
					array(
						'type'        => 'text',
						'name'        => 'video_mp4',
						'label'       => esc_html__( 'Video mp4', 'xtrail-core' ),
						'dependency' => array(
							'show' => array(
								'file_type' => 'video',
								'video_type'  => 'self'
							)
						)
					),
					array(
						'type'        => 'image',
						'name'        => 'video_cover_image',
						'label'       => esc_html__( 'Video Cover Image', 'xtrail-core' ),
						'dependency' => array(
							'show' => array(
								'file_type' => 'video',
								'video_type'  => 'self'
							)
						)
					)
				)
			)
		);
		
		//Portfolio Additional Sidebar Items
		
		$xtrail_additional_sidebar_items = xtrail_select_create_meta_box(
			array(
				'scope' => array( 'portfolio-item' ),
				'title' => esc_html__( 'Additional Portfolio Sidebar Items', 'xtrail-core' ),
				'name'  => 'portfolio_properties'
			)
		);

		xtrail_select_add_repeater_field(
			array(
				'name'        => 'qodef_portfolio_properties',
				'parent'      => $xtrail_additional_sidebar_items,
				'button_text' => esc_html__( 'Add New Item', 'xtrail-core' ),
				'fields'      => array(
					array(
						'type'        => 'text',
						'name'        => 'item_title',
						'label'       => esc_html__( 'Item Title', 'xtrail-core' ),
					),
					array(
						'type'        => 'text',
						'name'        => 'item_text',
						'label'       => esc_html__( 'Item Text', 'xtrail-core' )
					),
					array(
						'type'        => 'text',
						'name'        => 'item_url',
						'label'       => esc_html__( 'Enter Full URL for Item Text Link', 'xtrail-core' )
					)
				)
			)
		);
	}
	
	add_action( 'xtrail_select_action_meta_boxes_map', 'xtrail_core_map_portfolio_meta', 40 );
}