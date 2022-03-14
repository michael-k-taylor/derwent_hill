<?php

namespace XtrailCore\CPT\Shortcodes\InteractiveImageWithText;

use XtrailCore\Lib;

class InteractiveImageWithText implements Lib\ShortcodeInterface {
	private $base;

	public function __construct() {
		$this->base = 'qodef_interactive_image_with_text';

		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map( array(
					'name'                      => esc_html__( 'Interactive Image With Text', 'xtrail-core' ),
					'base'                      => $this->base,
					'icon'                      => 'icon-wpb-interactive-image-with-text extended-custom-icon',
					'category'                  => esc_html__( 'by XTRAIL', 'xtrail-core' ),
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'textfield',
							'param_name'  => 'custom_class',
							'heading'     => esc_html__( 'Custom CSS Class', 'xtrail-core' ),
							'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'xtrail-core' )
						),
						array(
							'type'        => 'attach_image',
							'param_name'  => 'image',
							'heading'     => esc_html__( 'Image', 'xtrail-core' ),
							'description' => esc_html__( 'Select image from media library', 'xtrail-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'image_size',
							'heading'     => esc_html__( 'Image Size', 'xtrail-core' ),
							'description' => esc_html__( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size', 'xtrail-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'title',
							'heading'    => esc_html__( 'Title', 'xtrail-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'title_tag',
							'heading'     => esc_html__( 'Title Tag', 'xtrail-core' ),
							'value'       => array_flip( xtrail_select_get_title_tag( true, array('span' => 'span') ) ),
							'dependency'  => array( 'element' => 'title', 'not_empty' => true ),
							'group'      => esc_html__( 'Text Settings', 'xtrail-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'title_size',
							'heading'    => esc_html__( 'Title Size (px)', 'xtrail-core' ),
							'dependency' => array( 'element' => 'title', 'not_empty' => true ),
							'group'      => esc_html__( 'Text Settings', 'xtrail-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'title_color',
							'heading'    => esc_html__( 'Title Color', 'xtrail-core' ),
							'dependency' => array( 'element' => 'title', 'not_empty' => true ),
							'group'      => esc_html__( 'Text Settings', 'xtrail-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'title_top_margin',
							'heading'    => esc_html__( 'Title Top Margin (px)', 'xtrail-core' ),
							'dependency' => array( 'element' => 'title', 'not_empty' => true ),
							'group'      => esc_html__( 'Text Settings', 'xtrail-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'subtitle',
							'heading'    => esc_html__( 'Subtitle', 'xtrail-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'subtitle_color',
							'heading'    => esc_html__( 'Subtitle Color', 'xtrail-core' ),
							'dependency' => array( 'element' => 'subtitle', 'not_empty' => true ),
							'group'      => esc_html__( 'Text Settings', 'xtrail-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'subtitle_top_margin',
							'heading'    => esc_html__( 'Subtitle Top Margin (px)', 'xtrail-core' ),
							'dependency' => array( 'element' => 'subtitle', 'not_empty' => true ),
							'group'      => esc_html__( 'Text Settings', 'xtrail-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'separator',
							'heading'    => esc_html__( 'Enable Separator', 'xtrail-core' ),
							'value'      => array_flip( xtrail_select_get_yes_no_select_array( false, true ) ),
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'separator_position',
							'heading'    => esc_html__( 'Position', 'xtrail-core' ),
							'value'      => array(
								esc_html__( 'Default', 'xtrail-core' ) => '',
								esc_html__( 'Center', 'xtrail-core' ) => 'center',
								esc_html__( 'Left', 'xtrail-core' )   => 'left',
								esc_html__( 'Right', 'xtrail-core' )  => 'right'
							),
							'dependency' => array( 'element' => 'separator', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Separator Settings', 'xtrail-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'separator_color',
							'heading'    => esc_html__( 'Color', 'xtrail-core' ),
							'dependency' => array( 'element' => 'separator', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Separator Settings', 'xtrail-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'separator_width',
							'heading'    => esc_html__( 'Width (px or %)', 'xtrail-core' ),
							'dependency' => array( 'element' => 'separator', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Separator Settings', 'xtrail-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'separator_thickness',
							'heading'    => esc_html__( 'Thickness (px)', 'xtrail-core' ),
							'dependency' => array( 'element' => 'separator', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Separator Settings', 'xtrail-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'separator_top_margin',
							'heading'    => esc_html__( 'Top Margin (px or %)', 'xtrail-core' ),
							'dependency' => array( 'element' => 'separator', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Separator Settings', 'xtrail-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'separator_bottom_margin',
							'heading'    => esc_html__( 'Bottom Margin (px or %)', 'xtrail-core' ),
							'dependency' => array( 'element' => 'separator', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Separator Settings', 'xtrail-core' )
						),
						array(
							'type'       => 'textarea',
							'param_name' => 'text',
							'heading'    => esc_html__( 'Text', 'xtrail-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'text_color',
							'heading'    => esc_html__( 'Text Color', 'xtrail-core' ),
							'dependency' => array( 'element' => 'text', 'not_empty' => true ),
							'group'      => esc_html__( 'Text Settings', 'xtrail-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'text_top_margin',
							'heading'    => esc_html__( 'Text Top Margin (px)', 'xtrail-core' ),
							'dependency' => array( 'element' => 'text', 'not_empty' => true ),
							'group'      => esc_html__( 'Text Settings', 'xtrail-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'link',
							'heading'     => esc_html__( 'Link', 'xtrail-core' ),
							'description' => esc_html__( 'Set link around icon and title', 'xtrail-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'target',
							'heading'    => esc_html__( 'Target', 'xtrail-core' ),
							'value'      => array_flip( xtrail_select_get_link_target_array() ),
							'dependency' => array( 'element' => 'link', 'not_empty' => true ),
						)
					)
				)

			);
		}
	}

	public function render( $atts, $content = null ) {
		$default_atts = array(
			'custom_class'        => '',
			'image'               => '',
			'image_size'          => 'full',
			'title'               => '',
			'title_tag'           => 'span',
			'title_size'          => '',
			'title_color'         => '',
			'title_top_margin'    => '',
			'subtitle'            => '',
			'subtitle_color'      => '',
			'subtitle_top_margin' => '',
			'separator'           => 'yes',
			'separator_position'  => 'left',
			'separator_color'     => '',
			'separator_width'     => '',
			'separator_thickness' => '',
			'separator_top_margin' => '',
			'separator_bottom_margin' => '',
			'text'                => '',
			'text_color'          => '',
			'text_top_margin'     => '',
			'link'                => '',
			'target'              => '_self',
		);
		$params       = shortcode_atts( $default_atts, $atts );

		$params['separator_parameters'] = $this->getSeparatorParameters( $params );
		$params['holder_classes']  = $this->getHolderClasses( $params );
		$params['image']           = $this->getImage( $params );
		$params['image_size']      = $this->getImageSize( $params['image_size'] );
		$params['title_styles']    = $this->getTitleStyles( $params );
		$params['subtitle_styles'] = $this->getSubtitleStyles( $params );
		$params['text_styles']     = $this->getTextStyles( $params );
		$params['target']          = ! empty( $params['target'] ) ? $params['target'] : $default_atts['target'];

		return xtrail_core_get_shortcode_module_template_part( 'templates/interactive-image-with-text-template', 'interactive-image-with-text', '', $params );
	}

	private function getHolderClasses( $params ) {
		$holderClasses = array( 'qodef-interactive-image-with-text', 'clearfix' );

		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';

		return $holderClasses;
	}

	private function getImage( $params ) {
		$image = array();

		if ( ! empty( $params['image'] ) ) {
			$id = $params['image'];

			$image['image_id'] = $id;
			$image_original    = wp_get_attachment_image_src( $id, 'full' );
			$image['url']      = $image_original[0];
			$image['alt']      = get_post_meta( $id, '_wp_attachment_image_alt', true );
		}

		return $image;
	}

	private function getImageSize( $image_size ) {
		$image_size = trim( $image_size );
		//Find digits
		preg_match_all( '/\d+/', $image_size, $matches );
		if ( in_array( $image_size, array( 'thumbnail', 'thumb', 'medium', 'large', 'full' ) ) ) {
			return $image_size;
		} elseif ( ! empty( $matches[0] ) ) {
			return array(
				$matches[0][0],
				$matches[0][1]
			);
		} else {
			return 'thumbnail';
		}
	}

	private function getTitleStyles( $params ) {
		$styles = array();

		if ( ! empty( $params['title_size'] ) ) {
			$styles[] = 'font-size: ' . xtrail_select_filter_px( $params['title_size'] ) . 'px';
		}

		if ( ! empty( $params['title_color'] ) ) {
			$styles[] = 'color: ' . $params['title_color'];
		}

		if ( $params['title_top_margin'] !== '' ) {
			$styles[] = 'margin-top: ' . xtrail_select_filter_px( $params['title_top_margin'] ) . 'px';
		}

		return implode( ';', $styles );
	}

	private function getSubtitleStyles( $params ) {
		$styles = array();

		if ( ! empty( $params['subtitle_color'] ) ) {
			$styles[] = 'color: ' . $params['subtitle_color'];
		}

		if ( $params['subtitle_top_margin'] !== '' ) {
			$styles[] = 'margin-top: ' . xtrail_select_filter_px( $params['subtitle_top_margin'] ) . 'px';
		}

		return implode( ';', $styles );
	}

	private function getTextStyles( $params ) {
		$styles = array();

		if ( ! empty( $params['text_color'] ) ) {
			$styles[] = 'color: ' . $params['text_color'];
		}

		if ( $params['text_top_margin'] !== '' ) {
			$styles[] = 'margin-top: ' . xtrail_select_filter_px( $params['text_top_margin'] ) . 'px';
		}

		return implode( ';', $styles );
	}

	private function getSeparatorParameters( $params ) {
		$params_array = array();

		if ( ! empty( $params['separator_color'] ) ) {
			$params_array['color'] = $params['separator_color'];
		}

		if ( ! empty( $params['separator_position'] ) ) {
			$params_array['position'] = $params['separator_position'];
		}

		if ( ! empty( $params['separator_width'] ) ) {
			$params_array['width'] = $params['separator_width'];
		}

		if ( ! empty( $params['separator_thickness'] ) ) {
			$params_array['thickness'] = $params['separator_thickness'];
		}

		if ( ! empty( $params['separator_top_margin'] ) ) {
			$params_array['top_margin'] = $params['separator_top_margin'];
		}

		if ( ! empty( $params['separator_bottom_margin'] ) ) {
			$params_array['bottom_margin'] = $params['separator_bottom_margin'];
		}

		return $params_array;
	}
}