<div class="qodef-call-to-action-holder <?php echo esc_attr($holder_classes); ?>" <?php echo xtrail_select_get_inline_style($holder_styles) ?>>
	<div class="qodef-cta-inner <?php echo esc_attr($inner_classes); ?>">
		<div class="qodef-cta-text-holder">
			<div class="qodef-cta-text"><?php echo do_shortcode($content); ?></div>
            <?php if($additional_text !== '') { ?>
			    <div class="qodef-cta-small-text"><?php echo esc_attr($additional_text); ?></div>
            <?php } ?>
		</div>
		<div class="qodef-cta-button-holder" <?php echo xtrail_select_get_inline_style($button_holder_styles); ?>>
			<div class="qodef-cta-button"><?php echo xtrail_select_get_button_html($button_parameters); ?></div>
		</div>
	</div>
    <?php if($close_button === 'yes') { ?>
        <div class="qodef-call-to-action-close">
            <span class="icon_close"></span>
        </div>
    <?php } ?>
</div>