<?php

if ( ! function_exists( 'xtrail_select_general_options_map' ) ) {
	/**
	 * General options page
	 */
	function xtrail_select_general_options_map() {
		
		xtrail_select_add_admin_page(
			array(
				'slug'  => '',
				'title' => esc_html__( 'General', 'xtrail' ),
				'icon'  => 'fa fa-institution'
			)
		);
		
		$panel_design_style = xtrail_select_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_design_style',
				'title' => esc_html__( 'Design Style', 'xtrail' )
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'google_fonts',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Google Font Family', 'xtrail' ),
				'description'   => esc_html__( 'Choose a default Google font for your site', 'xtrail' ),
				'parent'        => $panel_design_style
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'additional_google_fonts',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Additional Google Fonts', 'xtrail' ),
				'parent'        => $panel_design_style
			)
		);
		
		$additional_google_fonts_container = xtrail_select_add_admin_container(
			array(
				'parent'          => $panel_design_style,
				'name'            => 'additional_google_fonts_container',
				'dependency' => array(
					'show' => array(
						'additional_google_fonts'  => 'yes'
					)
				)
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'additional_google_font1',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'xtrail' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'xtrail' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'additional_google_font2',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'xtrail' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'xtrail' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'additional_google_font3',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'xtrail' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'xtrail' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'additional_google_font4',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'xtrail' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'xtrail' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'additional_google_font5',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'xtrail' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'xtrail' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'google_font_weight',
				'type'          => 'checkboxgroup',
				'default_value' => '',
				'label'         => esc_html__( 'Google Fonts Style & Weight', 'xtrail' ),
				'description'   => esc_html__( 'Choose a default Google font weights for your site. Impact on page load time', 'xtrail' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'100'  => esc_html__( '100 Thin', 'xtrail' ),
					'100i' => esc_html__( '100 Thin Italic', 'xtrail' ),
					'200'  => esc_html__( '200 Extra-Light', 'xtrail' ),
					'200i' => esc_html__( '200 Extra-Light Italic', 'xtrail' ),
					'300'  => esc_html__( '300 Light', 'xtrail' ),
					'300i' => esc_html__( '300 Light Italic', 'xtrail' ),
					'400'  => esc_html__( '400 Regular', 'xtrail' ),
					'400i' => esc_html__( '400 Regular Italic', 'xtrail' ),
					'500'  => esc_html__( '500 Medium', 'xtrail' ),
					'500i' => esc_html__( '500 Medium Italic', 'xtrail' ),
					'600'  => esc_html__( '600 Semi-Bold', 'xtrail' ),
					'600i' => esc_html__( '600 Semi-Bold Italic', 'xtrail' ),
					'700'  => esc_html__( '700 Bold', 'xtrail' ),
					'700i' => esc_html__( '700 Bold Italic', 'xtrail' ),
					'800'  => esc_html__( '800 Extra-Bold', 'xtrail' ),
					'800i' => esc_html__( '800 Extra-Bold Italic', 'xtrail' ),
					'900'  => esc_html__( '900 Ultra-Bold', 'xtrail' ),
					'900i' => esc_html__( '900 Ultra-Bold Italic', 'xtrail' )
				)
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'google_font_subset',
				'type'          => 'checkboxgroup',
				'default_value' => '',
				'label'         => esc_html__( 'Google Fonts Subset', 'xtrail' ),
				'description'   => esc_html__( 'Choose a default Google font subsets for your site', 'xtrail' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'latin'        => esc_html__( 'Latin', 'xtrail' ),
					'latin-ext'    => esc_html__( 'Latin Extended', 'xtrail' ),
					'cyrillic'     => esc_html__( 'Cyrillic', 'xtrail' ),
					'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'xtrail' ),
					'greek'        => esc_html__( 'Greek', 'xtrail' ),
					'greek-ext'    => esc_html__( 'Greek Extended', 'xtrail' ),
					'vietnamese'   => esc_html__( 'Vietnamese', 'xtrail' )
				)
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'        => 'first_color',
				'type'        => 'color',
				'label'       => esc_html__( 'First Main Color', 'xtrail' ),
				'description' => esc_html__( 'Choose the most dominant theme color. Default color is #00bbb3', 'xtrail' ),
				'parent'      => $panel_design_style
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'        => 'page_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'xtrail' ),
				'description' => esc_html__( 'Choose the background color for page content. Default color is #ffffff', 'xtrail' ),
				'parent'      => $panel_design_style
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'        => 'page_background_image',
				'type'        => 'image',
				'label'       => esc_html__( 'Page Background Image', 'xtrail' ),
				'description' => esc_html__( 'Choose the background image for page content', 'xtrail' ),
				'parent'      => $panel_design_style
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'page_background_image_repeat',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Page Background Image Repeat', 'xtrail' ),
				'description'   => esc_html__( 'Enabling this option will set the background image as a repeating pattern throughout the page, otherwise the image will appear as the cover background image', 'xtrail' ),
				'parent'        => $panel_design_style
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'        => 'selection_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Text Selection Color', 'xtrail' ),
				'description' => esc_html__( 'Choose the color users see when selecting text', 'xtrail' ),
				'parent'      => $panel_design_style
			)
		);
		
		/***************** Passepartout Layout - begin **********************/
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'boxed',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Boxed Layout', 'xtrail' ),
				'parent'        => $panel_design_style
			)
		);
		
			$boxed_container = xtrail_select_add_admin_container(
				array(
					'parent'          => $panel_design_style,
					'name'            => 'boxed_container',
					'dependency' => array(
						'show' => array(
							'boxed'  => 'yes'
						)
					)
				)
			);
		
				xtrail_select_add_admin_field(
					array(
						'name'        => 'page_background_color_in_box',
						'type'        => 'color',
						'label'       => esc_html__( 'Page Background Color', 'xtrail' ),
						'description' => esc_html__( 'Choose the page background color outside box', 'xtrail' ),
						'parent'      => $boxed_container
					)
				);
				
				xtrail_select_add_admin_field(
					array(
						'name'        => 'boxed_background_image',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'xtrail' ),
						'description' => esc_html__( 'Choose an image to be displayed in background', 'xtrail' ),
						'parent'      => $boxed_container
					)
				);
				
				xtrail_select_add_admin_field(
					array(
						'name'        => 'boxed_pattern_background_image',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Pattern', 'xtrail' ),
						'description' => esc_html__( 'Choose an image to be used as background pattern', 'xtrail' ),
						'parent'      => $boxed_container
					)
				);
				
				xtrail_select_add_admin_field(
					array(
						'name'          => 'boxed_background_image_attachment',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Attachment', 'xtrail' ),
						'description'   => esc_html__( 'Choose background image attachment', 'xtrail' ),
						'parent'        => $boxed_container,
						'options'       => array(
							''       => esc_html__( 'Default', 'xtrail' ),
							'fixed'  => esc_html__( 'Fixed', 'xtrail' ),
							'scroll' => esc_html__( 'Scroll', 'xtrail' )
						)
					)
				);
		
		/***************** Boxed Layout - end **********************/
		
		/***************** Passepartout Layout - begin **********************/
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'paspartu',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Passepartout', 'xtrail' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'xtrail' ),
				'parent'        => $panel_design_style
			)
		);
		
			$paspartu_container = xtrail_select_add_admin_container(
				array(
					'parent'          => $panel_design_style,
					'name'            => 'paspartu_container',
					'dependency' => array(
						'show' => array(
							'paspartu'  => 'yes'
						)
					)
				)
			);
		
				xtrail_select_add_admin_field(
					array(
						'name'        => 'paspartu_color',
						'type'        => 'color',
						'label'       => esc_html__( 'Passepartout Color', 'xtrail' ),
						'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'xtrail' ),
						'parent'      => $paspartu_container
					)
				);
				
				xtrail_select_add_admin_field(
					array(
						'name'        => 'paspartu_width',
						'type'        => 'text',
						'label'       => esc_html__( 'Passepartout Size', 'xtrail' ),
						'description' => esc_html__( 'Enter size amount for passepartout', 'xtrail' ),
						'parent'      => $paspartu_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
		
				xtrail_select_add_admin_field(
					array(
						'name'        => 'paspartu_responsive_width',
						'type'        => 'text',
						'label'       => esc_html__( 'Responsive Passepartout Size', 'xtrail' ),
						'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (tablets and mobiles view)', 'xtrail' ),
						'parent'      => $paspartu_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
				
				xtrail_select_add_admin_field(
					array(
						'parent'        => $paspartu_container,
						'type'          => 'yesno',
						'default_value' => 'no',
						'name'          => 'disable_top_paspartu',
						'label'         => esc_html__( 'Disable Top Passepartout', 'xtrail' )
					)
				);
		
				xtrail_select_add_admin_field(
					array(
						'parent'        => $paspartu_container,
						'type'          => 'yesno',
						'default_value' => 'no',
						'name'          => 'enable_fixed_paspartu',
						'label'         => esc_html__( 'Enable Fixed Passepartout', 'xtrail' ),
						'description' => esc_html__( 'Enabling this option will set fixed passepartout for your screens', 'xtrail' )
					)
				);
		
		/***************** Passepartout Layout - end **********************/
		
		/***************** Content Layout - begin **********************/
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'initial_content_width',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Initial Width of Content', 'xtrail' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'xtrail' ),
				'parent'        => $panel_design_style,
				'options'       => array(
                    'qodef-grid-1300' => esc_html__( '1300px - default', 'xtrail' ),
                    'qodef-grid-1200' => esc_html__( '1200px', 'xtrail' ),
					'qodef-grid-1100' => esc_html__( '1100px', 'xtrail' ),
					'qodef-grid-1000' => esc_html__( '1000px', 'xtrail' ),
					'qodef-grid-800'  => esc_html__( '800px', 'xtrail' )
				)
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'preload_pattern_image',
				'type'          => 'image',
				'label'         => esc_html__( 'Preload Pattern Image', 'xtrail' ),
				'description'   => esc_html__( 'Choose preload pattern image to be displayed until images are loaded', 'xtrail' ),
				'parent'        => $panel_design_style
			)
		);
		
		/***************** Content Layout - end **********************/
		
		$panel_settings = xtrail_select_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_settings',
				'title' => esc_html__( 'Settings', 'xtrail' )
			)
		);
		
		/***************** Smooth Scroll Layout - begin **********************/
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'page_smooth_scroll',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Smooth Scroll', 'xtrail' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth scrolling effect on every page (except on Mac and touch devices)', 'xtrail' ),
				'parent'        => $panel_settings
			)
		);
		
		/***************** Smooth Scroll Layout - end **********************/
		
		/***************** Smooth Page Transitions Layout - begin **********************/
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'smooth_page_transitions',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Smooth Page Transitions', 'xtrail' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'xtrail' ),
				'parent'        => $panel_settings
			)
		);
		
			$page_transitions_container = xtrail_select_add_admin_container(
				array(
					'parent'          => $panel_settings,
					'name'            => 'page_transitions_container',
					'dependency' => array(
						'show' => array(
							'smooth_page_transitions'  => 'yes'
						)
					)
				)
			);
		
				xtrail_select_add_admin_field(
					array(
						'name'          => 'page_transition_preloader',
						'type'          => 'yesno',
						'default_value' => 'no',
						'label'         => esc_html__( 'Enable Preloading Animation', 'xtrail' ),
						'description'   => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'xtrail' ),
						'parent'        => $page_transitions_container
					)
				);
				
				$page_transition_preloader_container = xtrail_select_add_admin_container(
					array(
						'parent'          => $page_transitions_container,
						'name'            => 'page_transition_preloader_container',
						'dependency' => array(
							'show' => array(
								'page_transition_preloader'  => 'yes'
							)
						)
					)
				);
				
					xtrail_select_add_admin_field(
						array(
							'name'   => 'smooth_pt_bgnd_color',
							'type'   => 'color',
							'label'  => esc_html__( 'Page Loader Background Color', 'xtrail' ),
							'parent' => $page_transition_preloader_container
						)
					);
					
					$group_pt_spinner_animation = xtrail_select_add_admin_group(
						array(
							'name'        => 'group_pt_spinner_animation',
							'title'       => esc_html__( 'Loader Style', 'xtrail' ),
							'description' => esc_html__( 'Define styles for loader spinner animation', 'xtrail' ),
							'parent'      => $page_transition_preloader_container
						)
					);
					
					$row_pt_spinner_animation = xtrail_select_add_admin_row(
						array(
							'name'   => 'row_pt_spinner_animation',
							'parent' => $group_pt_spinner_animation
						)
					);
					
					xtrail_select_add_admin_field(
						array(
							'type'          => 'selectsimple',
							'name'          => 'smooth_pt_spinner_type',
							'default_value' => '',
							'label'         => esc_html__( 'Spinner Type', 'xtrail' ),
							'parent'        => $row_pt_spinner_animation,
							'options'       => array(
								'xtrail_spinner'        => esc_html__( 'Xtrail Spinner', 'xtrail' ),
								'rotate_circles'        => esc_html__( 'Rotate Circles', 'xtrail' ),
								'pulse'                 => esc_html__( 'Pulse', 'xtrail' ),
								'double_pulse'          => esc_html__( 'Double Pulse', 'xtrail' ),
								'cube'                  => esc_html__( 'Cube', 'xtrail' ),
								'rotating_cubes'        => esc_html__( 'Rotating Cubes', 'xtrail' ),
								'stripes'               => esc_html__( 'Stripes', 'xtrail' ),
								'wave'                  => esc_html__( 'Wave', 'xtrail' ),
								'two_rotating_circles'  => esc_html__( '2 Rotating Circles', 'xtrail' ),
								'five_rotating_circles' => esc_html__( '5 Rotating Circles', 'xtrail' ),
								'atom'                  => esc_html__( 'Atom', 'xtrail' ),
								'clock'                 => esc_html__( 'Clock', 'xtrail' ),
								'mitosis'               => esc_html__( 'Mitosis', 'xtrail' ),
								'lines'                 => esc_html__( 'Lines', 'xtrail' ),
								'fussion'               => esc_html__( 'Fussion', 'xtrail' ),
								'wave_circles'          => esc_html__( 'Wave Circles', 'xtrail' ),
								'pulse_circles'         => esc_html__( 'Pulse Circles', 'xtrail' )
							)
						)
					);
					
					xtrail_select_add_admin_field(
						array(
							'type'          => 'colorsimple',
							'name'          => 'smooth_pt_spinner_color',
							'default_value' => '',
							'label'         => esc_html__( 'Spinner Color', 'xtrail' ),
							'parent'        => $row_pt_spinner_animation
						)
					);

					xtrail_select_add_admin_field(
						array(
							'type'          => 'image',
							'name'          => 'smooth_pt_spinner_image',
							'label'         => esc_html__( 'Preloader Image', 'xtrail' ),
							'parent'        => $row_pt_spinner_animation,
							'dependency'    => array(
								'show'  => array(
									'smooth_pt_spinner_type' => 'xtrail_spinner'
								)
							)
						)
					);
					
					xtrail_select_add_admin_field(
						array(
							'name'          => 'page_transition_fadeout',
							'type'          => 'yesno',
							'default_value' => 'no',
							'label'         => esc_html__( 'Enable Fade Out Animation', 'xtrail' ),
							'description'   => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'xtrail' ),
							'parent'        => $page_transitions_container
						)
					);
		
		/***************** Smooth Page Transitions Layout - end **********************/
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'show_back_button',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show "Back To Top Button"', 'xtrail' ),
				'description'   => esc_html__( 'Enabling this option will display a Back to Top button on every page', 'xtrail' ),
				'parent'        => $panel_settings
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'responsiveness',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Responsiveness', 'xtrail' ),
				'description'   => esc_html__( 'Enabling this option will make all pages responsive', 'xtrail' ),
				'parent'        => $panel_settings
			)
		);
		
		$panel_custom_code = xtrail_select_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_custom_code',
				'title' => esc_html__( 'Custom Code', 'xtrail' )
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'        => 'custom_js',
				'type'        => 'textarea',
				'label'       => esc_html__( 'Custom JS', 'xtrail' ),
				'description' => esc_html__( 'Enter your custom Javascript here', 'xtrail' ),
				'parent'      => $panel_custom_code
			)
		);
		
		$panel_google_api = xtrail_select_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_google_api',
				'title' => esc_html__( 'Google API', 'xtrail' )
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'        => 'google_maps_api_key',
				'type'        => 'text',
				'label'       => esc_html__( 'Google Maps Api Key', 'xtrail' ),
				'description' => esc_html__( 'Insert your Google Maps API key here. For instructions on how to create a Google Maps API key, please refer to our to our documentation.', 'xtrail' ),
				'parent'      => $panel_google_api
			)
		);
	}
	
	add_action( 'xtrail_select_action_options_map', 'xtrail_select_general_options_map', xtrail_select_set_options_map_position( 'general' ) );
}

if ( ! function_exists( 'xtrail_select_page_general_style' ) ) {
	/**
	 * Function that prints page general inline styles
	 */
	function xtrail_select_page_general_style( $style ) {
		$current_style = '';
		$page_id       = xtrail_select_get_page_id();
		$class_prefix  = xtrail_select_get_unique_page_class( $page_id );
		
		$boxed_background_style = array();
		
		$boxed_page_background_color = xtrail_select_get_meta_field_intersect( 'page_background_color_in_box', $page_id );
		if ( ! empty( $boxed_page_background_color ) ) {
			$boxed_background_style['background-color'] = $boxed_page_background_color;
		}
		
		$boxed_page_background_image = xtrail_select_get_meta_field_intersect( 'boxed_background_image', $page_id );
		if ( ! empty( $boxed_page_background_image ) ) {
			$boxed_background_style['background-image']    = 'url(' . esc_url( $boxed_page_background_image ) . ')';
			$boxed_background_style['background-position'] = 'center 0px';
			$boxed_background_style['background-repeat']   = 'no-repeat';
		}
		
		$boxed_page_background_pattern_image = xtrail_select_get_meta_field_intersect( 'boxed_pattern_background_image', $page_id );
		if ( ! empty( $boxed_page_background_pattern_image ) ) {
			$boxed_background_style['background-image']    = 'url(' . esc_url( $boxed_page_background_pattern_image ) . ')';
			$boxed_background_style['background-position'] = '0px 0px';
			$boxed_background_style['background-repeat']   = 'repeat';
		}
		
		$boxed_page_background_attachment = xtrail_select_get_meta_field_intersect( 'boxed_background_image_attachment', $page_id );
		if ( ! empty( $boxed_page_background_attachment ) ) {
			$boxed_background_style['background-attachment'] = $boxed_page_background_attachment;
		}
		
		$boxed_background_selector = $class_prefix . '.qodef-boxed .qodef-wrapper';
		
		if ( ! empty( $boxed_background_style ) ) {
			$current_style .= xtrail_select_dynamic_css( $boxed_background_selector, $boxed_background_style );
		}
		
		$paspartu_style     = array();
		$paspartu_res_style = array();
		$paspartu_res_start = '@media only screen and (max-width: 1024px) {';
		$paspartu_res_end   = '}';
		
		$paspartu_header_selector                = array(
			'.qodef-paspartu-enabled .qodef-page-header .qodef-fixed-wrapper.fixed',
			'.qodef-paspartu-enabled .qodef-sticky-header',
			'.qodef-paspartu-enabled .qodef-mobile-header.mobile-header-appear .qodef-mobile-header-inner'
		);
		$paspartu_header_appear_selector         = array(
			'.qodef-paspartu-enabled.qodef-fixed-paspartu-enabled .qodef-page-header .qodef-fixed-wrapper.fixed',
			'.qodef-paspartu-enabled.qodef-fixed-paspartu-enabled .qodef-sticky-header.header-appear',
			'.qodef-paspartu-enabled.qodef-fixed-paspartu-enabled .qodef-mobile-header.mobile-header-appear .qodef-mobile-header-inner'
		);
		
		$paspartu_header_style                   = array();
		$paspartu_header_appear_style            = array();
		$paspartu_header_responsive_style        = array();
		$paspartu_header_appear_responsive_style = array();
		
		$paspartu_color = xtrail_select_get_meta_field_intersect( 'paspartu_color', $page_id );
		if ( ! empty( $paspartu_color ) ) {
			$paspartu_style['background-color'] = $paspartu_color;
		}
		
		$paspartu_width = xtrail_select_get_meta_field_intersect( 'paspartu_width', $page_id );
		if ( $paspartu_width !== '' ) {
			if ( xtrail_select_string_ends_with( $paspartu_width, '%' ) || xtrail_select_string_ends_with( $paspartu_width, 'px' ) ) {
				$paspartu_style['padding'] = $paspartu_width;
				
				$paspartu_clean_width      = xtrail_select_string_ends_with( $paspartu_width, '%' ) ? xtrail_select_filter_suffix( $paspartu_width, '%' ) : xtrail_select_filter_suffix( $paspartu_width, 'px' );
				$paspartu_clean_width_mark = xtrail_select_string_ends_with( $paspartu_width, '%' ) ? '%' : 'px';
				
				$paspartu_header_style['left']              = $paspartu_width;
				$paspartu_header_style['width']             = 'calc(100% - ' . ( 2 * $paspartu_clean_width ) . $paspartu_clean_width_mark . ')';
				$paspartu_header_appear_style['margin-top'] = $paspartu_width;
			} else {
				$paspartu_style['padding'] = $paspartu_width . 'px';
				
				$paspartu_header_style['left']              = $paspartu_width . 'px';
				$paspartu_header_style['width']             = 'calc(100% - ' . ( 2 * $paspartu_width ) . 'px)';
				$paspartu_header_appear_style['margin-top'] = $paspartu_width . 'px';
			}
		}
		
		$paspartu_selector = $class_prefix . '.qodef-paspartu-enabled .qodef-wrapper';
		
		if ( ! empty( $paspartu_style ) ) {
			$current_style .= xtrail_select_dynamic_css( $paspartu_selector, $paspartu_style );
		}
		
		if ( ! empty( $paspartu_header_style ) ) {
			$current_style .= xtrail_select_dynamic_css( $paspartu_header_selector, $paspartu_header_style );
			$current_style .= xtrail_select_dynamic_css( $paspartu_header_appear_selector, $paspartu_header_appear_style );
		}
		
		$paspartu_responsive_width = xtrail_select_get_meta_field_intersect( 'paspartu_responsive_width', $page_id );
		if ( $paspartu_responsive_width !== '' ) {
			if ( xtrail_select_string_ends_with( $paspartu_responsive_width, '%' ) || xtrail_select_string_ends_with( $paspartu_responsive_width, 'px' ) ) {
				$paspartu_res_style['padding'] = $paspartu_responsive_width;
				
				$paspartu_clean_width      = xtrail_select_string_ends_with( $paspartu_responsive_width, '%' ) ? xtrail_select_filter_suffix( $paspartu_responsive_width, '%' ) : xtrail_select_filter_suffix( $paspartu_responsive_width, 'px' );
				$paspartu_clean_width_mark = xtrail_select_string_ends_with( $paspartu_responsive_width, '%' ) ? '%' : 'px';
				
				$paspartu_header_responsive_style['left']              = $paspartu_responsive_width;
				$paspartu_header_responsive_style['width']             = 'calc(100% - ' . ( 2 * $paspartu_clean_width ) . $paspartu_clean_width_mark . ')';
				$paspartu_header_appear_responsive_style['margin-top'] = $paspartu_responsive_width;
			} else {
				$paspartu_res_style['padding'] = $paspartu_responsive_width . 'px';
				
				$paspartu_header_responsive_style['left']              = $paspartu_responsive_width . 'px';
				$paspartu_header_responsive_style['width']             = 'calc(100% - ' . ( 2 * $paspartu_responsive_width ) . 'px)';
				$paspartu_header_appear_responsive_style['margin-top'] = $paspartu_responsive_width . 'px';
			}
		}
		
		if ( ! empty( $paspartu_res_style ) ) {
			$current_style .= $paspartu_res_start . xtrail_select_dynamic_css( $paspartu_selector, $paspartu_res_style ) . $paspartu_res_end;
		}
		
		if ( ! empty( $paspartu_header_responsive_style ) ) {
			$current_style .= $paspartu_res_start . xtrail_select_dynamic_css( $paspartu_header_selector, $paspartu_header_responsive_style ) . $paspartu_res_end;
			$current_style .= $paspartu_res_start . xtrail_select_dynamic_css( $paspartu_header_appear_selector, $paspartu_header_appear_responsive_style ) . $paspartu_res_end;
		}
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'xtrail_select_filter_add_page_custom_style', 'xtrail_select_page_general_style' );
}