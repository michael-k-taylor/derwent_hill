<div <?php xtrail_select_class_attribute($holder_classes); ?>>

    <?php if(!empty($link)) : ?>
        <a itemprop="url" href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>"></a>
    <?php endif; ?>
    <div class="qodef-iiwt-image">
	    <?php if(is_array($image_size) && count($image_size)) : ?>
		    <?php echo xtrail_select_generate_thumbnail($image['image_id'], null, $image_size[0], $image_size[1]); ?>
	    <?php else: ?>
		    <?php echo wp_get_attachment_image($image['image_id'], $image_size); ?>
	    <?php endif; ?>
        <div class="qodef-iiwt-overlay"></div>
    </div>
	<div class="qodef-iiwt-content">
        <div class="qodef-iiwt-content-inner">
            <?php if($title != '') { ?>
                <<?php echo esc_attr($title_tag) ?> class="qodef-iiwt-title" <?php xtrail_select_inline_style($title_styles); ?>>
                    <?php echo esc_attr($title); ?>
                </<?php echo esc_attr($title_tag) ?>>
            <?php } ?>
            <?php if($subtitle != '') { ?>
                <h4 class="qodef-iiwt-subtitle" <?php xtrail_select_inline_style($subtitle_styles); ?>>
                    <?php echo esc_attr($subtitle); ?>
                </h4>
            <?php } ?>
            <?php if($separator === 'yes') { ?>
                <div class="qodef-iiwt-separator">
                    <?php echo xtrail_select_execute_shortcode('qodef_separator', $separator_parameters); ?>
                </div>
            <?php } ?>
            <?php if(!empty($text)) { ?>
                <p class="qodef-iiwt-text-text" <?php xtrail_select_inline_style($text_styles); ?>><?php echo esc_html($text); ?></p>
            <?php } ?>
        </div>
	</div>
</div>