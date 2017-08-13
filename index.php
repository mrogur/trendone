<?php get_header(); ?>
<div class="trendone-content">
<!-- HERO -->
	<?php if ( null != get_theme_mod( 'hero_title_setting' ) && get_theme_mod( 'hero_title_setting' ) != '' ): ?>
        <div class="jumbotron jumbotron-fluid trendone-hero">
            <div class="container">
                <h1 class="display-3"><?php echo get_theme_mod( 'hero_title_setting' ); ?></h1>
                <p class="lead"><?php echo get_theme_mod( 'hero_content_setting' ); ?></p>
            </div>
        </div>
	<?php endif; ?>
    <!-- CARDBOX -->
    <section class="trendone-cards">
		<?php $cards = get_posts( [ 'post_type' => 'trendone-card', 'posts_per_page' => 3 ] ) ?>
        <div class="container trendone-cards">
            <div class="card-deck-wrapper">
                <div class="card-deck">
					<?php foreach ( $cards as $card ): ?>
                        <div class="card text-center" style="width: 30rem;">
                            <img class="card-img img-fluid mx-auto mt-4"
                                 src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $card->ID ) ) ?>"
                                 width="150px" height="150px"
                                 alt="">
                            <div class="card-block">
                                <h4 class="card-title"><?php echo $card->post_title ?></h4>
                                <p class="card-text"><?php echo $card->post_content ?></p>
                            </div>

                            <div class="card-footer">
                                <?php
                                    $button_url = get_post_meta( $card->ID, "tro_button_url", true );
                                    $button_text = get_post_meta( $card->ID, "tro_button_text", true );
                                    if(!empty($button_url) && !empty($button_text)) :
                                ?>
                                <a href="<?php echo $button_url; ?>"
                                   class="btn"><?php echo $button_text; ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
					<?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</div>
<?php get_footer(); ?>
