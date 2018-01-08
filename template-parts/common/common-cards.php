<!-- CARDBOX -->
<section class="bgYellow trendone-cards trendone-page-section">
	<?php $featuredPosts = get_posts( [ 'post_type' => 'post', 'posts_per_page' => 6 ] ) ?>
    <div class="container trendone-cards">
        <div class="row">
			<?php foreach ($featuredPosts as $post ): ?>
                <div class="col-lg-4 col-md-12 card-group">
                    <div class="card text-center mb-4">
                        <img class="card-img img-fluid mx-auto mt-4 w-50" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ) ?>" alt="Service">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $post->post_title ?></h4>
                            <p class="card-text"><?php echo $post->post_excerpt ?></p>
                        </div>
                        <div class="card-footer">
							<?php
							$button_url  = get_post_meta( $post->ID, "tro_button_url", true );
							$button_text = get_post_meta( $post->ID, "tro_button_text", true );
							if ( ! empty( $button_url ) && ! empty( $button_text ) ) :
								?>
                                <a href="<?php echo $button_url; ?>"
                                   class="btn btn-outline-success"><?php echo $button_text; ?></a>
							<?php endif; ?>
                        </div>

                    </div>
                </div>
			<?php endforeach; ?>
        </div>
    </div>

</section>