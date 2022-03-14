<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
    <div class="qodef-post-content">
        <div class="qodef-post-heading">
            <?php
			    if(xtrail_select_options()->getOptionValue('enable_different_category_style') === 'yes') {
					$part_params['custom-category'] = 'yes';

					if( $post_format === 'gallery' || $post_format === 'video' ) {
						xtrail_select_get_module_template_part('templates/parts/post-info/category', 'blog', '', $params);
                    }
				}

                xtrail_select_get_module_template_part('templates/parts/media', 'blog', $post_format, $part_params);
            ?>
        </div>
        <div class="qodef-post-text">
            <div class="qodef-post-text-inner">
                <div class="qodef-post-info-top">
                    <?php xtrail_select_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
					<?php if(xtrail_select_options()->getOptionValue('enable_different_category_style') === 'no') {
						xtrail_select_get_module_template_part('templates/parts/post-info/category', 'blog', '', $part_params);
					} ?>
                </div>
                <div class="qodef-post-text-main">
                    <?php xtrail_select_get_module_template_part('templates/parts/title', 'blog', '', $part_params); ?>
                    <?php xtrail_select_get_module_template_part('templates/parts/excerpt', 'blog', '', $part_params); ?>
                    <?php do_action('xtrail_select_action_single_link_pages'); ?>
                </div>
                <div class="qodef-post-info-bottom clearfix">
                    <div class="qodef-post-info-bottom-left">
                        <?php xtrail_select_get_module_template_part('templates/parts/post-info/comments', 'blog', '', $part_params); ?>
                        <?php xtrail_select_get_module_template_part('templates/parts/post-info/like', 'blog', '', $part_params); ?>
						<?php
						if(xtrail_select_options()->getOptionValue('show_tags_area_blog') === 'yes') {
							xtrail_select_get_module_template_part('templates/parts/post-info/tags', 'blog', '', $part_params);
						} ?>
                    </div>
                    <div class="qodef-post-info-bottom-right">
                        <?php xtrail_select_get_module_template_part('templates/parts/post-info/share', 'blog', '', $part_params); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>