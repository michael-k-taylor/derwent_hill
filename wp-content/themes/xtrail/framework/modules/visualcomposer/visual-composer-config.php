<?php

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
if ( function_exists( 'vc_set_as_theme' ) ) {
	vc_set_as_theme( true );
}

/**
 * Change path for overridden templates
 */
if ( function_exists( 'vc_set_shortcodes_templates_dir' ) ) {
	$dir = SELECT_ROOT_DIR . '/vc-templates';
	vc_set_shortcodes_templates_dir( $dir );
}

if ( ! function_exists( 'xtrail_select_configure_visual_composer_frontend_editor' ) ) {
	/**
	 * Configuration for Visual Composer FrontEnd Editor
	 * Hooks on vc_after_init action
	 */
	function xtrail_select_configure_visual_composer_frontend_editor() {
		/**
		 * Remove frontend editor
		 */
		if ( function_exists( 'vc_disable_frontend' ) ) {
			vc_disable_frontend();
		}
	}
	
	add_action( 'vc_after_init', 'xtrail_select_configure_visual_composer_frontend_editor' );
}

if ( ! function_exists( 'xtrail_select_vc_row_map' ) ) {
	/**
	 * Map VC Row shortcode
	 * Hooks on vc_after_init action
	 */
	function xtrail_select_vc_row_map() {
		
		/******* VC Row shortcode - begin *******/
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_content_width',
				'heading'    => esc_html__( 'Select Row Content Width', 'xtrail' ),
				'value'      => array(
					esc_html__( 'Full Width', 'xtrail' ) => 'full-width',
					esc_html__( 'In Grid', 'xtrail' )    => 'grid'
				),
				'group'      => esc_html__( 'Select Settings', 'xtrail' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'anchor',
				'heading'     => esc_html__( 'Select Anchor ID', 'xtrail' ),
				'description' => esc_html__( 'For example "home"', 'xtrail' ),
				'group'       => esc_html__( 'Select Settings', 'xtrail' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'colorpicker',
				'param_name' => 'simple_background_color',
				'heading'    => esc_html__( 'Select Background Color', 'xtrail' ),
				'group'      => esc_html__( 'Select Settings', 'xtrail' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'attach_image',
				'param_name' => 'simple_background_image',
				'heading'    => esc_html__( 'Select Background Image', 'xtrail' ),
				'group'      => esc_html__( 'Select Settings', 'xtrail' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'background_image_position',
				'heading'     => esc_html__( 'Select Background Position', 'xtrail' ),
				'description' => esc_html__( 'Set the starting position of a background image, default value is top left', 'xtrail' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Select Settings', 'xtrail' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'dropdown',
				'param_name'  => 'disable_background_image',
				'heading'     => esc_html__( 'Select Disable Background Image', 'xtrail' ),
				'value'       => array(
					esc_html__( 'Never', 'xtrail' )        => '',
					esc_html__( 'Below 1280px', 'xtrail' ) => '1280',
					esc_html__( 'Below 1024px', 'xtrail' ) => '1024',
					esc_html__( 'Below 768px', 'xtrail' )  => '768',
					esc_html__( 'Below 680px', 'xtrail' )  => '680',
					esc_html__( 'Below 480px', 'xtrail' )  => '480'
				),
				'save_always' => true,
				'description' => esc_html__( 'Choose on which stage you hide row background image', 'xtrail' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Select Settings', 'xtrail' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'attach_image',
				'param_name' => 'parallax_background_image',
				'heading'    => esc_html__( 'Select Parallax Background Image', 'xtrail' ),
				'group'      => esc_html__( 'Select Settings', 'xtrail' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'parallax_bg_speed',
				'heading'     => esc_html__( 'Select Parallax Speed', 'xtrail' ),
				'description' => esc_html__( 'Set your parallax speed. Default value is 1.', 'xtrail' ),
				'dependency'  => array( 'element' => 'parallax_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Select Settings', 'xtrail' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'textfield',
				'param_name' => 'parallax_bg_height',
				'heading'    => esc_html__( 'Select Parallax Section Height (px)', 'xtrail' ),
				'dependency' => array( 'element' => 'parallax_background_image', 'not_empty' => true ),
				'group'      => esc_html__( 'Select Settings', 'xtrail' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'content_text_aligment',
				'heading'    => esc_html__( 'Select Content Aligment', 'xtrail' ),
				'value'      => array(
					esc_html__( 'Default', 'xtrail' ) => '',
					esc_html__( 'Left', 'xtrail' )    => 'left',
					esc_html__( 'Center', 'xtrail' )  => 'center',
					esc_html__( 'Right', 'xtrail' )   => 'right'
				),
				'group'      => esc_html__( 'Select Settings', 'xtrail' )
			)
		);

		vc_add_param( 'vc_row',
			array(
				'type'       => 'textfield',
				'param_name' => 'row_bg_text',
				'heading'    => esc_html__( 'Row Background Text', 'xtrail' ),
				'group'      => esc_html__( 'Background Text', 'xtrail' )
			)
		);

		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'row_bg_text_size',
				'heading'     => esc_html__( 'Row Background Text Size', 'xtrail' ),
				'description' => esc_html__( 'Set the background text size in px or em', 'xtrail' ),
				'dependency'  => array( 'element' => 'row_bg_text', 'not_empty' => true ),
				'group'       => esc_html__( 'Background Text', 'xtrail' )
			)
		);

		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'row_bg_text_size_1440',
				'heading'     => esc_html__( 'Row Background Text Size 1280px - 1600px', 'xtrail' ),
				'description' => esc_html__( 'Set the background text size in px or em', 'xtrail' ),
				'dependency'  => array( 'element' => 'row_bg_text', 'not_empty' => true ),
				'group'       => esc_html__( 'Background Text', 'xtrail' )
			)
		);

		vc_add_param( 'vc_row',
			array(
				'type'       => 'textfield',
				'param_name' => 'row_bg_text_size_1280',
				'heading'    => esc_html__( 'Row Background Text Size 1024px - 1280px', 'xtrail' ),
				'description' => esc_html__( 'Set the background text size in px or em', 'xtrail' ),
				'dependency' => array( 'element' => 'row_bg_text', 'not_empty' => true ),
				'group'      => esc_html__( 'Background Text', 'xtrail' )
			)
		);

		vc_add_param( 'vc_row',
			array(
				'type'       => 'colorpicker',
				'param_name' => 'row_bg_text_color',
				'heading'    => esc_html__( 'Row Background Text Color', 'xtrail' ),
				'dependency' => array( 'element' => 'row_bg_text', 'not_empty' => true ),
				'group'      => esc_html__( 'Background Text', 'xtrail' )
			)
		);

		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_bg_text_align',
				'heading'    => esc_html__( 'Row Background Text Align', 'xtrail' ),
				'value'      => array(
					esc_html__( 'Default', 'xtrail' ) => '',
					esc_html__( 'Left', 'xtrail' )    => 'left',
					esc_html__( 'Center', 'xtrail' )  => 'center',
					esc_html__( 'Right', 'xtrail' )   => 'right'
				),
				'dependency' => array( 'element' => 'row_bg_text', 'not_empty' => true ),
				'group'      => esc_html__( 'Background Text', 'xtrail' )
			)
		);

		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_bg_text_vertical_align',
				'heading'    => esc_html__( 'Row Background Text Vertical Align', 'xtrail' ),
				'value'      => array(
					esc_html__( 'Middle', 'xtrail' )   => 'middle',
					esc_html__( 'Top', 'xtrail' )      => 'top',
					esc_html__( 'Bottom', 'xtrail' )   => 'bottom'
				),
				'dependency' => array( 'element' => 'row_bg_text', 'not_empty' => true ),
				'group'      => esc_html__( 'Background Text', 'xtrail' )
			)
		);

		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'row_bg_text_vr_offset',
				'heading'     => esc_html__( 'Row Background Text Vertical Offset', 'xtrail' ),
				'description' => esc_html__( 'Set the value of vertical offset in px or %', 'xtrail' ),
				'dependency'  => array( 'element' => 'row_bg_text', 'not_empty' => true ),
				'group'       => esc_html__( 'Background Text', 'xtrail' )
			)
		);

		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'row_bg_text_hr_offset',
				'heading'     => esc_html__( 'Row Background Text Horizontal Offset', 'xtrail' ),
				'description' => esc_html__( 'Set the value of horizontal offset in px or %', 'xtrail' ),
				'dependency'  => array( 'element' => 'row_bg_text', 'not_empty' => true ),
				'group'       => esc_html__( 'Background Text', 'xtrail' )
			)
		);

        vc_add_param( 'vc_row',
            array(
                'type'        => 'textfield',
                'param_name'  => 'row_bg_text_vr_offset_1440',
                'heading'     => esc_html__( 'Row Background Text Vertical Offset 1280 - 1600', 'xtrail' ),
                'description' => esc_html__( 'Set the value of vertical offset in px or %', 'xtrail' ),
                'dependency'  => array( 'element' => 'row_bg_text', 'not_empty' => true ),
                'group'       => esc_html__( 'Background Text', 'xtrail' )
            )
        );

        vc_add_param( 'vc_row',
            array(
                'type'        => 'textfield',
                'param_name'  => 'row_bg_text_hr_offset_1440',
                'heading'     => esc_html__( 'Row Background Text Horizontal Offset 1280 - 1600', 'xtrail' ),
                'description' => esc_html__( 'Set the value of horizontal offset in px or %', 'xtrail' ),
                'dependency'  => array( 'element' => 'row_bg_text', 'not_empty' => true ),
                'group'       => esc_html__( 'Background Text', 'xtrail' )
            )
        );

        vc_add_param( 'vc_row',
            array(
                'type'        => 'textfield',
                'param_name'  => 'row_bg_text_vr_offset_1280',
                'heading'     => esc_html__( 'Row Background Text Vertical Offset 1024px - 1280', 'xtrail' ),
                'description' => esc_html__( 'Set the value of vertical offset in px or %', 'xtrail' ),
                'dependency'  => array( 'element' => 'row_bg_text', 'not_empty' => true ),
                'group'       => esc_html__( 'Background Text', 'xtrail' )
            )
        );

        vc_add_param( 'vc_row',
            array(
                'type'        => 'textfield',
                'param_name'  => 'row_bg_text_hr_offset_1280',
                'heading'     => esc_html__( 'Row Background Text Horizontal Offset 1024px - 1280', 'xtrail' ),
                'description' => esc_html__( 'Set the value of horizontal offset in px or %', 'xtrail' ),
                'dependency'  => array( 'element' => 'row_bg_text', 'not_empty' => true ),
                'group'       => esc_html__( 'Background Text', 'xtrail' )
            )
        );

		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_bg_text_animation',
				'heading'    => esc_html__( 'Animate Row Background Text', 'xtrail' ),
				'value'      => array_flip( xtrail_select_get_yes_no_select_array(false, true) ),
				'dependency' => array( 'element' => 'row_bg_text', 'not_empty' => true ),
				'description'    => esc_html__( 'Animate background text when row appears in viewport', 'xtrail' ),
				'group'      => esc_html__( 'Background Text', 'xtrail' )
			)
		);

		do_action( 'xtrail_select_action_additional_vc_row_params' );
		
		/******* VC Row shortcode - end *******/
		
		/******* VC Row Inner shortcode - begin *******/
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_content_width',
				'heading'    => esc_html__( 'Select Row Content Width', 'xtrail' ),
				'value'      => array(
					esc_html__( 'Full Width', 'xtrail' ) => 'full-width',
					esc_html__( 'In Grid', 'xtrail' )    => 'grid'
				),
				'group'      => esc_html__( 'Select Settings', 'xtrail' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'colorpicker',
				'param_name' => 'simple_background_color',
				'heading'    => esc_html__( 'Select Background Color', 'xtrail' ),
				'group'      => esc_html__( 'Select Settings', 'xtrail' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'attach_image',
				'param_name' => 'simple_background_image',
				'heading'    => esc_html__( 'Select Background Image', 'xtrail' ),
				'group'      => esc_html__( 'Select Settings', 'xtrail' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'        => 'textfield',
				'param_name'  => 'background_image_position',
				'heading'     => esc_html__( 'Select Background Position', 'xtrail' ),
				'description' => esc_html__( 'Set the starting position of a background image, default value is top left', 'xtrail' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Select Settings', 'xtrail' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'        => 'dropdown',
				'param_name'  => 'disable_background_image',
				'heading'     => esc_html__( 'Select Disable Background Image', 'xtrail' ),
				'value'       => array(
					esc_html__( 'Never', 'xtrail' )        => '',
					esc_html__( 'Below 1280px', 'xtrail' ) => '1280',
					esc_html__( 'Below 1024px', 'xtrail' ) => '1024',
					esc_html__( 'Below 768px', 'xtrail' )  => '768',
					esc_html__( 'Below 680px', 'xtrail' )  => '680',
					esc_html__( 'Below 480px', 'xtrail' )  => '480'
				),
				'save_always' => true,
				'description' => esc_html__( 'Choose on which stage you hide row background image', 'xtrail' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Select Settings', 'xtrail' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'content_text_aligment',
				'heading'    => esc_html__( 'Select Content Aligment', 'xtrail' ),
				'value'      => array(
					esc_html__( 'Default', 'xtrail' ) => '',
					esc_html__( 'Left', 'xtrail' )    => 'left',
					esc_html__( 'Center', 'xtrail' )  => 'center',
					esc_html__( 'Right', 'xtrail' )   => 'right'
				),
				'group'      => esc_html__( 'Select Settings', 'xtrail' )
			)
		);
		
		/******* VC Row Inner shortcode - end *******/
		
		/******* VC Revolution Slider shortcode - begin *******/
		
		if ( xtrail_select_is_plugin_installed( 'revolution-slider' ) ) {
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'enable_paspartu',
					'heading'     => esc_html__( 'Select Enable Passepartout', 'xtrail' ),
					'value'       => array_flip( xtrail_select_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'group'       => esc_html__( 'Select Settings', 'xtrail' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'paspartu_size',
					'heading'     => esc_html__( 'Select Passepartout Size', 'xtrail' ),
					'value'       => array(
						esc_html__( 'Tiny', 'xtrail' )   => 'tiny',
						esc_html__( 'Small', 'xtrail' )  => 'small',
						esc_html__( 'Normal', 'xtrail' ) => 'normal',
						esc_html__( 'Large', 'xtrail' )  => 'large'
					),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Select Settings', 'xtrail' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'disable_side_paspartu',
					'heading'     => esc_html__( 'Select Disable Side Passepartout', 'xtrail' ),
					'value'       => array_flip( xtrail_select_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Select Settings', 'xtrail' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'disable_top_paspartu',
					'heading'     => esc_html__( 'Select Disable Top Passepartout', 'xtrail' ),
					'value'       => array_flip( xtrail_select_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Select Settings', 'xtrail' )
				)
			);
		}
		
		/******* VC Revolution Slider shortcode - end *******/
	}
	
	add_action( 'vc_after_init', 'xtrail_select_vc_row_map' );
}