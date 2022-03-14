<a itemprop="url" href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>" <?php xtrail_select_inline_style($button_styles); ?> <?php xtrail_select_class_attribute($button_classes); ?> <?php echo xtrail_select_get_inline_attrs($button_data); ?> <?php echo xtrail_select_get_inline_attrs($button_custom_attrs); ?>>
    <span class="qodef-btn-text"><?php echo esc_html($text); ?></span>
    <span class="qodef-btn-bg-hover-holder"></span>
    <?php echo xtrail_select_icon_collections()->renderIcon($icon, $icon_pack); ?>
</a>