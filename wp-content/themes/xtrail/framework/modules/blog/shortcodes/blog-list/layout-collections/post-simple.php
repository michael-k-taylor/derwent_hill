<li class="qodef-bl-item qodef-item-space clearfix">
	<div class="qodef-bli-inner">
		<?php if ( $post_info_image == 'yes' ) {
			xtrail_select_get_module_template_part( 'templates/parts/media', 'blog', '', $params );
		} ?>
		<div class="qodef-bli-content">
			<?php xtrail_select_get_module_template_part( 'templates/parts/post-info/date', 'blog', '', $params ); ?>
			<?php xtrail_select_get_module_template_part( 'templates/parts/title', 'blog', '', $params ); ?>
		</div>
	</div>
</li>