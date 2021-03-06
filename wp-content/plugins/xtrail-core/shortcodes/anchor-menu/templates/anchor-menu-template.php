<div class="qodef-anchor-menu-outer">
	<div class="qodef-anchor-menu">
        <?php foreach($menu_items as $menu_items):?>
            <div class="qodef-anchor-menu-item">
                <a class="qodef-anchor" href="<?php echo esc_attr($menu_items['anchor']); ?>">
                    <?php if(!empty($menu_items['number'])) { ?>
                        <span class="qodef-anchor-menu-item-number">
                            <?php echo esc_attr($menu_items['number']); ?>
                        </span>
                    <?php } ?>
					<?php if(!empty($menu_items['label'])) { ?>
                        <span class="qodef-anchor-menu-item-label">
                            <?php echo esc_attr($menu_items['label']); ?>
                        </span>
                    <?php } ?>
                </a>
            </div>
        <?php endforeach; ?>
	</div>
</div>