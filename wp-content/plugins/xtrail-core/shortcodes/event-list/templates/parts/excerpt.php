<?php
if ($excerpt_length !== '0' && $excerpt_length !== '' && $enable_excerpt === 'yes') {
	if ($excerpt_length > 0) {
		$excerpt = substr(get_the_excerpt(), 0, intval($excerpt_length));
	} else {
		$excerpt = get_the_excerpt();
	}
} else {
    $excerpt = '';
}

?>
<p itemprop="description" class="qodef-event-list-excerpt"><?php echo esc_html($excerpt); ?></p>
