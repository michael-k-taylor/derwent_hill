<div class="qodef-price-table qodef-item-space <?php echo esc_attr($holder_classes); ?>">
	<div class="qodef-pt-inner" <?php echo xtrail_select_get_inline_style($holder_styles); ?>>
		<ul>
			<li class="qodef-pt-title-holder">
                <?php if($set_active_item == 'yes') { ?>
                    <span class="qodef-pt-active-item-label"><?php echo esc_html($active_item_label); ?></span>
                <?php } ?>
                <span class="qodef-pt-title" <?php echo xtrail_select_get_inline_style($title_styles); ?>><?php echo esc_html($title); ?></span>
			</li>
			<li class="qodef-pt-prices">
				<span class="qodef-pt-value" <?php echo xtrail_select_get_inline_style($currency_styles); ?>><?php echo esc_html($currency); ?></span>
				<span class="qodef-pt-price" <?php echo xtrail_select_get_inline_style($price_styles); ?>><?php echo esc_html($price); ?></span>
			</li>
			<li class="qodef-pt-content">
				<?php echo do_shortcode($content); ?>
			</li>
			<?php 
			if(!empty($button_text)) { ?>
				<li class="qodef-pt-button">
					<?php echo xtrail_select_get_button_html(array(
						'link' => $link,
						'text' => $button_text,
						'type' => $button_type,
					)); ?>
				</li>				
			<?php } ?>
		</ul>
	</div>
    <div class="qodef-pattern-overlay"></div>
</div>