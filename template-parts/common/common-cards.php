<!-- CARDBOX -->
<section class="trendone-cards trendone-page-section">
	<?php $cards = get_posts( [ 'post_type' => 'trendone-card', 'posts_per_page' => 3 ] ) ?>
    <div class="container trendone-cards">
        <div class="row">
			<?php foreach ( $cards as $card ): ?>
                <div class="col-lg-4 col-md-12 card-group">
                    <div class="card text-center mb-4">
                        <img class="card-img img-fluid mx-auto mt-4 w-50" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $card->ID ) ) ?>" alt="Service">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $card->post_title ?></h4>
                            <p class="card-text"><?php echo $card->post_content ?></p>
                        </div>
                        <div class="card-footer">
							<?php
							$button_url  = get_post_meta( $card->ID, "tro_button_url", true );
							$button_text = get_post_meta( $card->ID, "tro_button_text", true );
							if ( ! empty( $button_url ) && ! empty( $button_text ) ) :
								?>
                                <a href="<?php echo $button_url; ?>"
                                   class="btn"><?php echo $button_text; ?></a>
							<?php endif; ?>
                        </div>

                    </div>
                </div>
			<?php endforeach; ?>
        </div>
    </div>

</section>