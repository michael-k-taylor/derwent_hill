<div class="qodef-section-title-holder <?php echo esc_attr($holder_classes); ?>" <?php echo xtrail_select_get_inline_style($holder_styles); ?>>
	<div class="qodef-st-inner">
		<?php if(!empty($title)) { ?>
			<<?php echo esc_attr($title_tag); ?> class="qodef-st-title" <?php echo xtrail_select_get_inline_style($title_styles); ?>>
				<?php echo wp_kses($title, array('br' => true, 'span' => array('class' => true))); ?>
			</<?php echo esc_attr($title_tag); ?>>
		<?php } ?>
	    <?php if(!empty($side_title)) { ?>
            <<?php echo esc_attr($side_title_tag); ?> class="qodef-st-side-title" <?php echo xtrail_select_get_inline_style($side_title_styles); ?>>
	            <?php echo wp_kses($side_title, array('br' => true, 'span' => array('class' => true))); ?>
            </<?php echo esc_attr($side_title_tag); ?>>
        <?php } ?>
        <?php if($title_underscore === 'yes') { ?>
            <span class="qodef-st-title-underscore" <?php echo xtrail_select_get_inline_style($title_underscore_styles); ?>></span>
        <?php } ?>
		<?php if(!empty($text)) { ?>
			<<?php echo esc_attr($text_tag); ?> class="qodef-st-text" <?php echo xtrail_select_get_inline_style($text_styles); ?>>
				<?php echo wp_kses($text, array('br' => true)); ?>
			</<?php echo esc_attr($text_tag); ?>>
		<?php } ?>
	</div>
</div>