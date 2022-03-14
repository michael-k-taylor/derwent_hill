<?php if(xtrail_select_options()->getOptionValue('portfolio_single_enable_categories') === 'yes') : ?>
    <?php
    $categories   = wp_get_post_terms(get_the_ID(), 'portfolio-category');
    if(is_array($categories) && count($categories)) : ?>
        <div class="qodef-ps-info-item qodef-ps-categories">
	        <?php xtrail_core_get_cpt_single_module_template_part('templates/single/parts/info-title', 'portfolio', '', array( 'title' => esc_attr__('Category:', 'xtrail-core') ) ); ?>
            <?php foreach($categories as $cat) { ?>
                <a itemprop="url" class="qodef-ps-info-category" href="<?php echo esc_url(get_term_link($cat->term_id)); ?>"><?php echo esc_html($cat->name); ?></a>
            <?php } ?>
        </div>
    <?php endif; ?>
<?php endif; ?>
