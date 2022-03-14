<div class="qodef-number-with-text-holder <?php echo esc_attr($holder_classes); ?>">
    <span class="qodef-nwt-number"><?php echo esc_html($number); ?></span>
	<div class="qodef-nwt-text-holder">
        <?php if(!empty($title)) { ?>
            <h4 class="qodef-nwt-title" <?php echo xtrail_select_get_inline_style($title_styles); ?>><?php echo esc_html($title); ?></h4>
        <?php } ?>
    </div>
</div>