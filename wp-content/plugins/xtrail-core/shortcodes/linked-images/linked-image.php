<?php
namespace XtrailCore\CPT\Shortcodes\LinkedImage;

use XtrailCore\Lib;

class LinkedImage implements Lib\ShortcodeInterface{
	private $base;

	function __construct() {
		$this->base = 'qodef_linked_image';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')){
			vc_map( 
				array(
					'name' 						=> esc_html__('Linked Image', 'xtrail-core'),
					'base' 						=> $this->base,
					'as_child'					=> array('only' 	=> 'qodef_linked_images'),
					'category' 					=> esc_html__('by XTRAIL', 'xtrail-core'),
					'icon' 						=> 'icon-wpb-linked-image-item extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'					=> array(
						array(
							'type' 		    => 'attach_image',
							'heading' 	    => esc_html__('Background Image', 'xtrail-core'),
							'param_name'    => 'image',
							'value' 	    => '',
						),
						array(
	                        'type'          => 'textfield',
	                        'heading'       => esc_html__('Link', 'xtrail-core'),
	                        'param_name'    => 'link',
	                        'admin_label'   => true
	                    ),
	                    array(
	                        'type'          => 'dropdown',
	                        'heading'       => esc_html__('Link Target', 'xtrail-core'),
	                        'param_name'    => 'link_target',
	                        'value'         => array(
							    esc_html__('Self', 'xtrail-core')  => '_self',
							    esc_html__('Blank', 'xtrail-core') => '_blank'
	                        ),
	                        'admin_label'   => true,
	                        "dependency"    => array('element' => 'link', 'not_empty' => true),
	                    ),
						array(
							'type'          => 'dropdown',
							'heading'       => esc_html__('Hover Type', 'xtrail-core'),
							'param_name'    => 'hover_type',
							'value'         => array(
								esc_html__('Zoom', 'xtrail-core')       => 'zoom',
								esc_html__('Text Slide', 'xtrail-core') => 'text-slide'
							),
							'admin_label'   => true,
						),
	                    array(
	                        'type'          => 'textfield',
	                        'heading'       => esc_html__('Title', 'xtrail-core'),
	                        'param_name'    => 'title',
	                        'admin_label'   => true
	                    ),
						array(
	                        'type'        	=> 'textfield',
	                        'heading'     	=> esc_html__('Subtitle', 'xtrail-core'),
	                        'param_name'  	=> 'subtitle',
	                        'admin_label' 	=> true
	                    ),
						array(
							'type'        	=> 'textfield',
							'heading'     	=> esc_html__('Text', 'xtrail-core'),
							'param_name'  	=> 'text',
							"dependency"    => array('element' => 'hover_type', 'value' => 'text-slide'),
							'admin_label' 	=> true
						),
					)
				)
			);			
		}
	}

	public function render($atts, $content = null) {
		$args = array(
			'image' 		=> '',
			'link' 			=> '',
			'hover_type'    => 'zoom',
			'link_target'	=> '_self',
			'title' 		=> '',
			'subtitle' 		=> '',
			'text'          => ''
		);

		$params = shortcode_atts($args, $atts);

		$params['holder_classes'] = $this->getHolderClasses( $params );

		extract($params);

		if(is_numeric($params['image'])) {
			$params['image'] = wp_get_attachment_url($params['image']);
			$params['image_alt'] = esc_attr(get_post_meta($params['image'], '_wp_attachment_image_alt', true));
		}

		$html = xtrail_core_get_shortcode_module_template_part('templates/linked-image-template', 'linked-images', '', $params);

		return $html;
	}

	private function getHolderClasses( $params ) {
		$holderClasses = array();

		$holderClasses[] = ! empty( $params['hover_type'] ) ? 'qodef-li-' . $params['hover_type'] : '';

		return implode( ' ', $holderClasses );
	}
}