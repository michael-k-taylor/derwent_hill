<div class="qodef-sc-dropdown-items">
	<?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
		$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
		$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
		
		if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
			$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
			?>
			<div class="qodef-sc-dropdown-item">
				<div class="qodef-sc-dropdown-item-image">
					<?php
					$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
					
					if ( ! $product_permalink ) {
						echo wp_kses_post( $thumbnail );
					} else {
						printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), wp_kses_post( $thumbnail ) );
					}?>
				</div>
				<div class="qodef-sc-dropdown-item-content">
					<h6 itemprop="name" class="qodef-sc-dropdown-item-title entry-title">
						<?php if ( ! $product_permalink ) {
							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
						} else {
							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
						} ?>
					</h6>
                    <p>
                        <span class="qodef-sc-dropdown-item-quantity"><?php echo sprintf( esc_html__( '%sX', 'xtrail' ), esc_attr( $cart_item['quantity'] ) ); ?></span><span class="qodef-sc-dropdown-item-price"><?php echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); ?></span>
	                    <?php echo sprintf( '<a href="%s" class="qodef-sc-dropdown-item-remove remove" title="%s">%s</span></a>', esc_url( wc_get_cart_remove_url( $cart_item_key ) ), esc_attr__( 'Remove this item', 'xtrail' ), xtrail_select_icon_collections()->renderIcon( 'icon_close', 'font_elegant' ) ); ?>
                    </p>

				</div>
			</div>
		<?php }
	} ?>
</div>