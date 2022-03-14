<div class="qodef-process-item <?php echo esc_attr( $holder_classes ); ?>">
    <div class="qodef-pi-holder">
        <div class="qodef-pi-image">
            <?php if ( !empty($image) ) { ?>
                <?php echo wp_get_attachment_image($image['image_id'], 'full'); ?>
            <?php } ?>
        </div>
        <div class="qodef-pi-content">
            <?php if(!empty($title)) { ?>
                <<?php echo esc_attr($title_tag); ?> class="qodef-pi-title" <?php echo xtrail_select_get_inline_style($title_styles); ?>><?php echo esc_html($title); ?></<?php echo esc_attr($title_tag); ?>>
            <?php } ?>
            <?php if(!empty($text)) { ?>
                <p class="qodef-pi-text" <?php echo xtrail_select_get_inline_style($text_styles); ?>><?php echo esc_html($text); ?></p>
            <?php } ?>
        </div>
    </div>
</div>