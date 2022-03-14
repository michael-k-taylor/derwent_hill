<li class="qodef-bl-item qodef-item-space">
	<div class="qodef-bli-inner">
		<div class="qodef-bli-heading">
			<?php
				if ( $post_info_image == 'yes' ) {
					xtrail_select_get_module_template_part( 'templates/parts/media', 'blog', '', $params );
				}
				if ( $post_info_category == 'yes' ) {
					xtrail_select_get_module_template_part( 'templates/parts/post-info/category', 'blog', '', $params );
				}
			?>
		</div>
		<div class="qodef-bli-content">
			<?php if ($post_info_top == 'yes') { ?>
                <div class="qodef-bli-info-top">
                    <?php
                        if ( $post_info_date == 'yes' ) {
                            xtrail_select_get_module_template_part( 'templates/parts/post-info/date', 'blog', '', $params );
                        }
                        if ( $post_info_author == 'yes' ) {
                            xtrail_select_get_module_template_part( 'templates/parts/post-info/author', 'blog', '', $params );
                        }
                    ?>
                </div>
            <?php } ?>
			<?php xtrail_select_get_module_template_part( 'templates/parts/title', 'blog', '', $params ); ?>
			<div class="qodef-bli-excerpt">
				<?php xtrail_select_get_module_template_part( 'templates/parts/excerpt', 'blog', '', $params ); ?>
				<?php xtrail_select_get_module_template_part( 'templates/parts/post-info/read-more', 'blog', '', $params ); ?>
			</div>
			<?php if ($post_info_bottom == 'yes') { ?>
                <div class="qodef-bli-info-bottom">
                    <?php
                        if ( $post_info_comments == 'yes' ) {
                            xtrail_select_get_module_template_part( 'templates/parts/post-info/comments', 'blog', '', $params );
                        }
                        if ( $post_info_like == 'yes' ) {
                            xtrail_select_get_module_template_part( 'templates/parts/post-info/like', 'blog', '', $params );
                        }
                        if ( $post_info_share == 'yes' ) {
                            xtrail_select_get_module_template_part( 'templates/parts/post-info/share', 'blog', '', $params );
                        }
                    ?>
                </div>
			<?php } ?>
		</div>
	</div>
</li>