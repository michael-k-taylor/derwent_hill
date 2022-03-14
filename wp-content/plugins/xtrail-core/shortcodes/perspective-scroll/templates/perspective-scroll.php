<div class="qodef-perspective-scroll <?php echo esc_attr( $holder_classes ); ?>">
	<div class="qodef-ps-pin-scene">
		<div class="qodef-ps-content">
			<div class="qodef-ps-text-holder">
				<p class="qodef-ps-main-text"><?php echo esc_html( $main_text ); ?></p>
				<p class="qodef-ps-bg-text"><?php echo esc_html( $bg_text ); ?></p>
			</div>
			<div class="qodef-ps-left-image">
				<?php echo wp_get_attachment_image( $left_image, 'full' ); ?>
			</div>
			<div class="qodef-ps-right-image">
				<?php echo wp_get_attachment_image( $right_image, 'full' ); ?>
			</div>
			<div class="qodef-ps-bg-image" <?php echo xtrail_select_get_inline_style($background_styles); ?>></div>
		</div>
	</div>
</div>