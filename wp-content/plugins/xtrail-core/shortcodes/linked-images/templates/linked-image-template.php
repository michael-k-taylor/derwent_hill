<?php if($image != '') {  ?>
	<div class="qodef-linked-image-holder <?php echo esc_attr($holder_classes);?>">
		<div class="qodef-linked-image-holder-inner">
			<div class="qodef-linked-image-image-holder">
				<?php if($link != '') { ?>
					<a href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($link_target); ?>">
				<?php } ?>
					<div class="qodef-linked-image-image" style="background-image: url(<?php echo esc_url($image); ?>);"></div>
					<div class="qodef-linked-image-description-wrapper">
						<?php if(($title != '') || ($subtitle != '')) { ?>
							<div class="qodef-linked-image-description-inner">
								<div class="qodef-linked-image-description">
									<?php if($title != '') { ?>
										<h2 class="qodef-linked-image-title">
											<?php echo esc_attr($title); ?>
										</h2>
									<?php } ?>
                                    <?php if($subtitle != '') { ?>
                                        <h4 class="qodef-linked-image-subtitle">
                                            <?php echo esc_attr($subtitle); ?>
                                        </h4>
                                    <?php } ?>
									<?php if($text != '') { ?>
                                        <p class="qodef-linked-image-text">
											<?php echo esc_attr($text); ?>
                                        </p>
									<?php } ?>
								</div>
							</div>
						<?php } ?>
					</div>
				<?php if($link != '') { ?>
					</a>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>