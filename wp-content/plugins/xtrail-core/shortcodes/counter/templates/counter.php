<div class="qodef-counter-holder <?php echo esc_attr($holder_classes); ?>">
	<div class="qodef-counter-inner">
		<?php if(!empty($digit)) { ?>
			<span class="qodef-counter <?php echo esc_attr($type) ?>" <?php echo xtrail_select_get_inline_style($counter_styles); ?>><?php echo esc_html($digit); ?></span>
		<?php } ?>
		<?php if(!empty($title)) { ?>
			<<?php echo esc_attr($title_tag); ?> class="qodef-counter-title" <?php echo xtrail_select_get_inline_style($counter_title_styles); ?>>
				<?php echo esc_html($title); ?>
			</<?php echo esc_attr($title_tag); ?>>
		<?php } ?>
	</div>
    <?php if(!empty($text)) { ?>
        <p class="qodef-counter-text" <?php echo xtrail_select_get_inline_style($counter_text_styles); ?>><?php echo esc_html($text); ?></p>
    <?php } ?>
</div>