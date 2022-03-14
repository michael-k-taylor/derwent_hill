<?php
    $author_id         = esc_attr( get_the_author_meta( 'ID' ) );
    $author_quote      = get_the_author_meta('user_quote', $author_id) ? get_the_author_meta('user_quote', $author_id) : '';
    $author_position   = get_the_author_meta('user_position', $author_id) ? get_the_author_meta('user_position', $author_id) : '';
?>
<div class="qodef-author-description">
    <div class="qodef-author-description-inner">
        <div class="qodef-author-description-content">
            <div class="qodef-author-description-image">
                <?php echo xtrail_select_kses_img( get_avatar( get_the_author_meta( 'ID' ), 86 ) ); ?>
            </div>
            <div class="qodef-author-description-text-holder">
				<?php if ( $author_position !== "" ) { ?>
                    <span class="qodef-author-quote"><?php echo wp_kses_post( $author_quote ); ?></span>
				<?php } ?>
                <h6 class="qodef-author-name vcard author">
                    <span class="fn">
                        <?php
                        if ( get_the_author_meta( 'first_name' ) != "" || get_the_author_meta( 'last_name' ) != "" ) {
                            echo esc_html( get_the_author_meta( 'first_name' ) ) . " " . esc_html( get_the_author_meta( 'last_name' ) );
                        } else {
                            echo esc_html( get_the_author_meta( 'display_name' ) );
                        }
                        ?>,
                        <?php if ( $author_position !== "" ) { ?>
                            <span class="qodef-author-position"><?php echo wp_kses_post( $author_position ); ?></span>
                        <?php } ?>
                    </span>
                </h6>
            </div>
        </div>
    </div>
</div>