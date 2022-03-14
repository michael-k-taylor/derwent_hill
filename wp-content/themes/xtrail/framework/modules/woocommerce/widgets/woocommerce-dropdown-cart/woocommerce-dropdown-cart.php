<?php

if ( class_exists( 'XtrailCoreClassWidget' ) ) {
	class XtrailSelectClassWoocommerceDropdownCart extends XtrailCoreClassWidget {
		public function __construct() {
			parent::__construct(
				'qodef_woocommerce_dropdown_cart',
				esc_html__('Xtrail Woocommerce Dropdown Cart', 'xtrail'),
				array('description' => esc_html__('Display a shop cart icon with a dropdown that shows products that are in the cart', 'xtrail'),)
			);
			
			$this->setParams();
		}
		
		protected function setParams() {
			$this->params = array(
				array(
					'type'        => 'textfield',
					'name'        => 'woocommerce_dropdown_cart_margin',
					'title'       => esc_html__('Icon Margin', 'xtrail'),
					'description' => esc_html__('Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'xtrail')
				),
				array(
					'type'        => 'dropdown',
					'name'        => 'enable_left_border',
					'title'       => esc_html__( 'Enable Left Border', 'xtrail' ),
					'description' => esc_html__( 'Enable this option to show left border', 'xtrail' ),
					'options'     => xtrail_select_get_yes_no_select_array()
				),
				array(
					'type'        => 'dropdown',
					'name'        => 'woocommerce_dropdown_cart_mirror',
					'title'       => esc_html__( 'Mirror Dropdown Cart', 'xtrail' ),
					'description' => esc_html__( 'Enable this option to float dropdown in mirror', 'xtrail' ),
					'options'     => xtrail_select_get_yes_no_select_array()
				)
			);
		}
		
		public function widget( $args, $instance ) {
			$icon_styles = array();

			if ( $instance['woocommerce_dropdown_cart_margin'] !== '' ) {
				$icon_styles[] = 'margin: ' . $instance['woocommerce_dropdown_cart_margin'];
			}

			$classes = '';
			if( ( $instance['enable_left_border']) == 'yes') {
				$classes .= ' qodef-shopping-cart-border';
			}
			if( ( $instance['woocommerce_dropdown_cart_mirror']) == 'yes') {
				$classes .= ' qodef-sc-dropdown-mirror';
			}

			?>
			<div class="qodef-shopping-cart-holder <?php echo esc_attr($classes) ?>" <?php xtrail_select_inline_style( $icon_styles ) ?> >
				<div class="qodef-shopping-cart-inner">
					<?php xtrail_select_get_module_template_part( 'widgets/woocommerce-dropdown-cart/templates/content', 'woocommerce' ); ?>
				</div>
			</div>
			<?php
		}
	}
}

if ( ! function_exists( 'xtrail_select_woocommerce_header_add_to_cart_fragment' ) ) {
	function xtrail_select_woocommerce_header_add_to_cart_fragment( $fragments ) {
		ob_start();
		?>
		<div class="qodef-shopping-cart-inner">
			<?php xtrail_select_get_module_template_part( 'widgets/woocommerce-dropdown-cart/templates/content', 'woocommerce' ); ?>
		</div>
		
		<?php
		$fragments['div.qodef-shopping-cart-inner'] = ob_get_clean();
		
		return $fragments;
	}
	
	add_filter( 'woocommerce_add_to_cart_fragments', 'xtrail_select_woocommerce_header_add_to_cart_fragment' );
}
?>