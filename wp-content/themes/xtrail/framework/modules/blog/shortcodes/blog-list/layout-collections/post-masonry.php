<?php

$params['type'] = get_post_format();

xtrail_select_get_module_template_part( 'shortcodes/blog-list/layout-collections/masonry/post', 'blog', $params['type'], $params );