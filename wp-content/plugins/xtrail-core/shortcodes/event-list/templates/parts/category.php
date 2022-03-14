<?php if ($enable_category === 'yes') {
	$categories = wp_get_post_terms(get_the_ID(), 'events_category');

    if(!empty($categories)) { ?>
		<div class="qodef-event-list-category-holder">
			<?php foreach ($categories as $cat) { ?>
				<a itemprop="url" class="qodef-event-list-category" href="<?php echo esc_url(get_term_link($cat->term_id)); ?>"><?php echo esc_html($cat->name); ?></a>
			<?php } ?>
		</div>
	<?php } ?>
<?php } ?>