<div class="qodef-post-info-author">
    <a itemprop="author" class="qodef-post-info-author-link" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>">
        <span class="qodef-blog-author-image">
            <?php echo xtrail_select_kses_img(get_avatar(get_the_author_meta( 'ID' ), 35)); ?>
        </span>
        <span class="qodef-blog-author-name">
            <?php
            if ( get_the_author_meta( 'first_name' ) != "" || get_the_author_meta( 'last_name' ) != "" ) {
                echo esc_html( get_the_author_meta( 'first_name' ) ) . " " . esc_html( get_the_author_meta( 'last_name' ) );
            } else {
                echo esc_html( get_the_author_meta( 'display_name' ) );
            }
            ?>
        </span>
    </a>
</div>