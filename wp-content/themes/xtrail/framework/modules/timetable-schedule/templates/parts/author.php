<div class="qodef-related-event-author">
    <span class="qodef-related-event-author-name">
        <?php
            if ( get_the_author_meta( 'first_name' ) != "" || get_the_author_meta( 'last_name' ) != "" ) {
                echo esc_html( get_the_author_meta( 'first_name' ) ) . " " . esc_html( get_the_author_meta( 'last_name' ) );
            } else {
                echo esc_html( get_the_author_meta( 'display_name' ) );
            }
        ?>
    </span>
</div>