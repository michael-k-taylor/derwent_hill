<?php

if ( ! function_exists( 'xtrail_select_sidearea_options_map' ) ) {
	function xtrail_select_sidearea_options_map() {

        xtrail_select_add_admin_page(
            array(
                'slug'  => '_side_area_page',
                'title' => esc_html__('Side Area', 'xtrail'),
                'icon'  => 'fa fa-indent'
            )
        );

        $side_area_panel = xtrail_select_add_admin_panel(
            array(
                'title' => esc_html__('Side Area', 'xtrail'),
                'name'  => 'side_area',
                'page'  => '_side_area_page'
            )
        );

        xtrail_select_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'select',
                'name'          => 'side_area_type',
                'default_value' => 'side-menu-slide-from-right',
                'label'         => esc_html__('Side Area Type', 'xtrail'),
                'description'   => esc_html__('Choose a type of Side Area', 'xtrail'),
                'options'       => array(
                    'side-menu-slide-from-right'       => esc_html__('Slide from Right Over Content', 'xtrail'),
                    'side-menu-slide-with-content'     => esc_html__('Slide from Right With Content', 'xtrail'),
                    'side-area-uncovered-from-content' => esc_html__('Side Area Uncovered from Content', 'xtrail'),
                ),
            )
        );

        xtrail_select_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'text',
                'name'          => 'side_area_width',
                'default_value' => '',
                'label'         => esc_html__('Side Area Width', 'xtrail'),
                'description'   => esc_html__('Enter a width for Side Area (px or %). Default width: 405px.', 'xtrail'),
                'args'          => array(
                    'col_width' => 3,
                )
            )
        );

        $side_area_width_container = xtrail_select_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_width_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_type' => 'side-menu-slide-from-right',
                    )
                )
            )
        );

        xtrail_select_add_admin_field(
            array(
                'parent'        => $side_area_width_container,
                'type'          => 'color',
                'name'          => 'side_area_content_overlay_color',
                'default_value' => '',
                'label'         => esc_html__('Content Overlay Background Color', 'xtrail'),
                'description'   => esc_html__('Choose a background color for a content overlay', 'xtrail'),
            )
        );

        xtrail_select_add_admin_field(
            array(
                'parent'        => $side_area_width_container,
                'type'          => 'text',
                'name'          => 'side_area_content_overlay_opacity',
                'default_value' => '',
                'label'         => esc_html__('Content Overlay Background Transparency', 'xtrail'),
                'description'   => esc_html__('Choose a transparency for the content overlay background color (0 = fully transparent, 1 = opaque)', 'xtrail'),
                'args'          => array(
                    'col_width' => 3
                )
            )
        );

        xtrail_select_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'select',
                'name'          => 'side_area_icon_source',
                'default_value' => 'icon_pack',
                'label'         => esc_html__('Select Side Area Icon Source', 'xtrail'),
                'description'   => esc_html__('Choose whether you would like to use icons from an icon pack or SVG icons', 'xtrail'),
                'options'       => xtrail_select_get_icon_sources_array()
            )
        );

        $side_area_icon_pack_container = xtrail_select_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_icon_pack_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_icon_source' => 'icon_pack'
                    )
                )
            )
        );

        xtrail_select_add_admin_field(
            array(
                'parent'        => $side_area_icon_pack_container,
                'type'          => 'select',
                'name'          => 'side_area_icon_pack',
                'default_value' => 'font_elegant',
                'label'         => esc_html__('Side Area Icon Pack', 'xtrail'),
                'description'   => esc_html__('Choose icon pack for Side Area icon', 'xtrail'),
                'options'       => xtrail_select_icon_collections()->getIconCollectionsExclude(array('linea_icons', 'dripicons', 'simple_line_icons'))
            )
        );

        $side_area_svg_icons_container = xtrail_select_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_svg_icons_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_icon_source' => 'svg_path'
                    )
                )
            )
        );

        xtrail_select_add_admin_field(
            array(
                'parent'      => $side_area_svg_icons_container,
                'type'        => 'textarea',
                'name'        => 'side_area_icon_svg_path',
                'label'       => esc_html__('Side Area Icon SVG Path', 'xtrail'),
                'description' => esc_html__('Enter your Side Area icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'xtrail'),
            )
        );

        xtrail_select_add_admin_field(
            array(
                'parent'      => $side_area_svg_icons_container,
                'type'        => 'textarea',
                'name'        => 'side_area_close_icon_svg_path',
                'label'       => esc_html__('Side Area Close Icon SVG Path', 'xtrail'),
                'description' => esc_html__('Enter your Side Area close icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'xtrail'),
            )
        );

        $side_area_icon_style_group = xtrail_select_add_admin_group(
            array(
                'parent'      => $side_area_panel,
                'name'        => 'side_area_icon_style_group',
                'title'       => esc_html__('Side Area Icon Style', 'xtrail'),
                'description' => esc_html__('Define styles for Side Area icon', 'xtrail')
            )
        );

        $side_area_icon_style_row1 = xtrail_select_add_admin_row(
            array(
                'parent' => $side_area_icon_style_group,
                'name'   => 'side_area_icon_style_row1'
            )
        );

        xtrail_select_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row1,
                'type'   => 'colorsimple',
                'name'   => 'side_area_icon_color',
                'label'  => esc_html__('Color', 'xtrail')
            )
        );

		xtrail_select_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row1,
				'type'   => 'colorsimple',
				'name'   => 'side_area_icon_background_color',
				'label'  => esc_html__('Background Color', 'xtrail')
			)
		);

		xtrail_select_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row1,
				'type'   => 'textsimple',
				'name'   => 'side_area_icon_background_transparency',
				'label'  => esc_html__('Background Transparency (0-1)', 'xtrail'),
				'description' => esc_html__( 'Set background transparency for side area opener', 'xtrail' ),
			)
		);

        xtrail_select_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row1,
                'type'   => 'colorsimple',
                'name'   => 'side_area_icon_hover_color',
                'label'  => esc_html__('Hover Color', 'xtrail')
            )
        );

        $side_area_icon_style_row2 = xtrail_select_add_admin_row(
            array(
                'parent' => $side_area_icon_style_group,
                'name'   => 'side_area_icon_style_row2',
                'next'   => true
            )
        );

        xtrail_select_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row2,
                'type'   => 'colorsimple',
                'name'   => 'side_area_close_icon_color',
                'label'  => esc_html__('Close Icon Color', 'xtrail')
            )
        );


		xtrail_select_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row2,
				'type'   => 'colorsimple',
				'name'   => 'side_area_close_icon_background_color',
				'label'  => esc_html__('Close Icon Background Color', 'xtrail')
			)
		);

        xtrail_select_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row2,
                'type'   => 'colorsimple',
                'name'   => 'side_area_close_icon_hover_color',
                'label'  => esc_html__('Close Icon Hover Color', 'xtrail')
            )
        );

        xtrail_select_add_admin_field(
            array(
                'parent'      => $side_area_panel,
                'type'        => 'color',
                'name'        => 'side_area_background_color',
                'label'       => esc_html__('Background Color', 'xtrail'),
                'description' => esc_html__('Choose a background color for Side Area', 'xtrail')
            )
        );

		xtrail_select_add_admin_field(
			array(
				'parent'      => $side_area_panel,
				'type'        => 'image',
				'name'        => 'side_area_background_image',
				'label'       => esc_html__('Background Image', 'xtrail'),
				'description' => esc_html__('Choose a background image for Side Area', 'xtrail')
			)
		);

        xtrail_select_add_admin_field(
            array(
                'parent'      => $side_area_panel,
                'type'        => 'text',
                'name'        => 'side_area_padding',
                'label'       => esc_html__('Padding', 'xtrail'),
                'description' => esc_html__('Define padding for Side Area in format top right bottom left', 'xtrail'),
                'args'        => array(
                    'col_width' => 3
                )
            )
        );

        xtrail_select_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'selectblank',
                'name'          => 'side_area_aligment',
                'default_value' => '',
                'label'         => esc_html__('Text Alignment', 'xtrail'),
                'description'   => esc_html__('Choose text alignment for side area', 'xtrail'),
                'options'       => array(
                    ''       => esc_html__('Default', 'xtrail'),
                    'left'   => esc_html__('Left', 'xtrail'),
                    'center' => esc_html__('Center', 'xtrail'),
                    'right'  => esc_html__('Right', 'xtrail')
                )
            )
        );
    }

    add_action('xtrail_select_action_options_map', 'xtrail_select_sidearea_options_map', xtrail_select_set_options_map_position( 'sidearea' ) );
}