<?php xtrail_select_get_module_template_part( 'widgets/woocommerce-dropdown-cart/templates/parts/opener', 'woocommerce', '', $params ); ?>
<div class="qodef-sc-dropdown">
	<div class="qodef-sc-dropdown-inner">
		<?php if ( ! WC()->cart->is_empty() ) {
			xtrail_select_get_module_template_part( 'widgets/woocommerce-dropdown-cart/templates/parts/loop', 'woocommerce' );
			
			xtrail_select_get_module_template_part( 'widgets/woocommerce-dropdown-cart/templates/parts/order-details', 'woocommerce' );
			
			xtrail_select_get_module_template_part( 'widgets/woocommerce-dropdown-cart/templates/parts/button', 'woocommerce' );
		} else {
			xtrail_select_get_module_template_part( 'widgets/woocommerce-dropdown-cart/templates/posts-not-found', 'woocommerce' );
		} ?>
	</div>
</div>