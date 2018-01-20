<?php
add_shortcode('trendone-featbox', function ($params) {
    /**
     * @var $posts_per_page number - number of posts to display
     * @var $post_type string - post type to display default 'post'
     * @var $css_classes string
     * @var $terms string
     * @var $image_profile string
     */
    extract(shortcode_atts([
        'post_type' => 'post',
        'posts_per_page' => 6,
        'css_classes' => '',
        'terms' => '',
        'image_profile' => 'img_cards_main_page',
    ], $params));

    ob_start();
    ?>
    <?php $featuredPosts = get_posts(['post_type' => $post_type,
        'posts_per_page' => $posts_per_page,
        'tax_query' => [
            ['taxonomy' => 'featbox', 'field' => 'slug', 'terms' => $terms]
        ]]) ?>
    <div class="row">
        <div class="col pl-0 pr-0">
            <div class="row">
                <?php foreach ($featuredPosts as $post): ?>
                    <div class="col-md-4 card-group">
                        <div class="card mb-3 bgGreyMiddle text-light">
                            <div class="card-body p-0">
                                <?php
                                $image = trendone_get_image_thumb($image_profile, $post->ID);
                                if (null != $image):
                                    list($src, $width, $height) = $image;
                                    ?>
                                    <a href="<?php echo get_permalink($post->ID) ?>">
                                        <img class="card-img img-fluid mx-auto" src="<?php echo $src ?>">
                                    </a>
                                <?php endif; ?>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo get_permalink($post->ID) ?>" class="text-light">
                                    <h6 class="card-title">
                                        <?php echo $post->post_title ?>
                                    </h6>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div><!--end first column -->
    </div>

<?php });