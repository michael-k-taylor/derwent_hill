<?php
$product = xtrail_select_return_woocommerce_global_variable();

if ( $product->is_on_sale() ) { ?>
	<div class="qodef-<?php echo esc_attr( $class_name ); ?>-onsale"><span><?php echo xtrail_select_get_woocommerce_sale( $product ); ?></span></div>
<?php } ?>

<?php if ( ! $product->is_in_stock() ) { ?>
	<div class="qodef-<?php echo esc_attr( $class_name ); ?>-out-of-stock"><span><?php esc_html_e( 'Sold', 'xtrail' ); ?></span></div>
<?php }

$new = get_post_meta( get_the_ID(), 'qodef_show_new_sign_woo_meta', true );

if ( $new === 'yes' ) { ?>
	<div class="qodef-<?php echo esc_attr( $class_name ); ?>-new-product"><span><?php esc_html_e( 'New', 'xtrail' ); ?></span></div>
<?php }

$product_image_size = 'woocommerce_single';
if ( $image_size === 'full' ) {
	$product_image_size = 'full';
} else if ( $image_size === 'square' ) {
	$product_image_size = 'xtrail_select_image_square';
} else if ( $image_size === 'landscape' ) {
	$product_image_size = 'xtrail_select_image_landscape';
} else if ( $image_size === 'portrait' ) {
	$product_image_size = 'xtrail_select_image_portrait';
} else if ( $image_size === 'medium' ) {
	$product_image_size = 'medium';
} else if ( $image_size === 'large' ) {
	$product_image_size = 'large';
} else if ( $image_size === 'woocommerce_thumbnail' ) {
	$product_image_size = 'woocommerce_thumbnail';
}

$fixed_image_size_meta = get_post_meta( get_the_ID(), 'qodef_product_featured_image_size', true );
if ( ! empty( $fixed_image_size_meta ) && isset( $type ) && $type === 'masonry' ) {
	if ( $fixed_image_size_meta === 'small' ) {
		$product_image_size = 'xtrail_select_image_square';
	} else if ( $fixed_image_size_meta === 'large-width' ) {
		$product_image_size = 'xtrail_select_image_landscape';
	} else if ( $fixed_image_size_meta === 'large-height' ) {
		$product_image_size = 'xtrail_select_image_portrait';
	} else if ( $fixed_image_size_meta === 'large-width-height' ) {
		$product_image_size = 'xtrail_select_image_huge';
	}
}

if ( has_post_thumbnail() ) {
	the_post_thumbnail( apply_filters( 'xtrail_select_filter_product_list_image_size', $product_image_size ) );
}