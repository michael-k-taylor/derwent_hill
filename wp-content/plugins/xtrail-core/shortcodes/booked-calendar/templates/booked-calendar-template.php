<div class="<?php echo esc_attr($holder_classes); ?>">

    <?php if (!empty($title)) : ?>
        <?php echo '<' . esc_attr($title_tag); ?> class="qodef-calendar-title" <?php echo xtrail_select_get_inline_style($title_styles); ?>>
        <?php echo wp_kses($title, array('span' => array('class' => true))); ?>
        <?php echo '</' . esc_attr($title_tag); ?>>
    <?php endif; ?>

    <?php echo do_shortcode('[booked-calendar ' . $calendar_attrs . ']'); ?>

</div>