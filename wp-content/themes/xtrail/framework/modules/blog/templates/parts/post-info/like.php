<?php if( xtrail_select_is_plugin_installed( 'core' ) ) { ?>
    <div class="qodef-blog-like">
        <?php if( function_exists('xtrail_select_get_like') ) xtrail_select_get_like(); ?>
    </div>
<?php } ?>