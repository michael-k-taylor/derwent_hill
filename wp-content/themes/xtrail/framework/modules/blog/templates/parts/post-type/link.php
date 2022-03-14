<?php
$title_tag = isset($link_tag) ? $link_tag : 'h3';
$post_link_meta = get_post_meta(get_the_ID(), "qodef_post_link_link_meta", true );
$post_linked_text_meta = get_post_meta(get_the_ID(), "qodef_post_link_linked_text_meta", true);

if(xtrail_select_get_blog_module() == 'list') {
    $post_link = get_the_permalink();
} else {
    if(!empty($post_link_meta)) {
        $post_link = esc_html($post_link_meta);
    }
}
?>

<div class="qodef-post-link-holder">
    <div class="qodef-post-link-holder-inner">
        <<?php echo esc_attr($title_tag);?> itemprop="name" class="qodef-link-title qodef-post-title">
        <?php if(isset($post_link) && $post_link != '') { ?>
        <a itemprop="url" href="<?php echo esc_url($post_link); ?>" title="<?php the_title_attribute(); ?>" target="_blank">
            <?php } ?>
            <?php echo get_the_title(); ?>
            <?php if(isset($post_link) && $post_link != '') { ?>
        </a>
        <?php } ?>
        </<?php echo esc_attr($title_tag);?>>
        <h6 class="qodef-link-linked-text">
			<?php if(isset($post_link_meta) && $post_link_meta != '') { ?>
            <a itemprop="url" href="<?php echo esc_url($post_link_meta); ?>" title="<?php the_title_attribute(); ?>" target="_blank">
				<?php } ?>
				<?php echo esc_html($post_linked_text_meta); ?>
				<?php if(isset($post_link_meta) && $post_link_meta != '') { ?>
            </a>
		<?php } ?>
        </h6>
    </div>
</div>