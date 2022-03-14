<?php if ($enable_title === 'yes') {
	$title_tag = !empty($title_tag) ? $title_tag : 'h4';
	$title_styles = $this_object->getTitleStyles($params);
	?>
    <a itemprop="url" href="<?php echo esc_url( $this_object->getItemLink() ); ?>" target="<?php echo esc_attr( $this_object->getItemLinkTarget() ); ?>">
        <<?php echo esc_attr($title_tag); ?> itemprop="name" class="qodef-pli-title entry-title" <?php xtrail_select_inline_style($title_styles); ?>>
            <?php echo esc_attr(get_the_title()); ?>
        </<?php echo esc_attr($title_tag); ?>>
    </a>
<?php } ?>