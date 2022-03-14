<?php if(xtrail_select_options()->getOptionValue('portfolio_single_hide_date') === 'yes') : ?>
    <div class="qodef-ps-info-item qodef-ps-date">
	    <?php xtrail_core_get_cpt_single_module_template_part('templates/single/parts/info-title', 'portfolio', '', array( 'title' => esc_attr__('Date:', 'xtrail-core') ) ); ?>
        <p itemprop="dateCreated" class="qodef-ps-info-date entry-date updated"><?php the_time(get_option('date_format')); ?></p>
        <meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(xtrail_select_get_page_id()); ?>"/>
    </div>
<?php endif; ?>