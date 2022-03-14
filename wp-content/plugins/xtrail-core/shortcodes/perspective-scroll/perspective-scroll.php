<?php
namespace XtrailCore\CPT\Shortcodes\PerspectiveScroll;

use XtrailCore\Lib;

class PerspectiveScroll implements Lib\ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'qodef_perspective_scroll';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );

	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'     => esc_html__( 'Perspective Scroll', 'xtrail-core' ),
					'base'     => $this->getBase(),
					'category' => esc_html__( 'by XTRAIL', 'xtrail-core' ),
					'icon'     => 'icon-wpb-perspective-scroll extended-custom-icon',
					'params'   => array(
						array(
							'type'       => 'textfield',
							'param_name' => 'main_text',
							'heading'    => esc_html__( 'Main Text', 'xtrail-core' ),
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'bg_text',
							'heading'    => esc_html__( 'Background Text', 'xtrail-core' ),
						),
						array(
							'type'        => 'attach_image',
							'param_name'  => 'bg_image',
							'heading'     => esc_html__( 'Background Image', 'xtrail-core' ),
							'description' => esc_html__( 'Select image from media library', 'xtrail-core' )
						),
						array(
							'type'        => 'attach_image',
							'param_name'  => 'left_image',
							'heading'     => esc_html__( 'Left Image', 'xtrail-core' ),
							'description' => esc_html__( 'Select image from media library', 'xtrail-core' )
						),
						array(
							'type'        => 'attach_image',
							'param_name'  => 'right_image',
							'heading'     => esc_html__( 'Right Image', 'xtrail-core' ),
							'description' => esc_html__( 'Select image from media library', 'xtrail-core' )
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'main_text'     => '',
			'bg_text'		=> '',
			'bg_image'	 	=> '',
			'left_image'	=> '',
			'right_image'   => '',
		);
		$params = shortcode_atts( $args, $atts );
		
		$params['holder_classes']    = $this->getHolderClasses( $params, $args );
		$params['background_styles'] = $this->getBackgroundStyles( $params );
		
		$html = xtrail_core_get_shortcode_module_template_part( 'templates/perspective-scroll', 'perspective-scroll', '', $params );
		
		return $html;
	}

	private function getBackgroundStyles( $params ) {
		$styles = array();

		if ( ! empty( $params['bg_image'] ) ) {
			$styles[] = 'background-image: url(' . wp_get_attachment_url( $params['bg_image'] ) . ')';
		}

		return implode( ';', $styles );
	}
	
	private function getHolderClasses( $params, $args ) {
		$holderClasses = array();

		// $holderClasses[] = $params['enable_phone_frame'] == "no" ? 'qodef-vs-no-frame' : '';
		
		return implode( ' ', $holderClasses );
	}

}