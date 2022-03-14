<div class="qodef-eh-item <?php echo esc_attr($holder_classes); ?>" <?php echo xtrail_select_get_inline_attrs($holder_data); ?>>
	<div class="qodef-eh-item-background" <?php echo xtrail_select_get_inline_style($background_styles); ?>></div>
    <div class="qodef-eh-item-inner" <?php echo xtrail_select_get_inline_style($holder_styles); ?>>
		<div class="qodef-eh-item-content <?php echo esc_attr($holder_rand_class); ?>" <?php echo xtrail_select_get_inline_style($content_styles); ?>>
			<?php echo do_shortcode($content); ?>
		</div>
	</div>
</div>