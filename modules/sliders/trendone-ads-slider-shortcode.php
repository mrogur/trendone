<?php

/**
 * Shortcode for ads Slider
 */
add_shortcode('trendone-slider', function ($params = []) {
    /**
     * @var $posts_per_page number
     * @var $css_id string
     * @var $css_classes string
     * @var $duration number
     * @var $terms string
     * @var $image_profile string
     * @var $random bool
     *  * */
    extract(shortcode_atts([

        'posts_per_page' => 5,
        'duration' => 3000,
        'css_id' => '',
        'css_classes' => '',
        'terms' => '',
        'image_profile' => '',
        'random' => false,
    ], $params));

    ob_start();
    ?>

    <div id="<?php echo $css_id ?>" class="carousel slide carousel-fade
        <?php echo $css_classes ?>
        " data-ride="carousel" data-interval="<?php echo $duration ?>">
        <div class="carousel-inner" role="listbox">
            <?php $posts = get_posts(['post_type' => 'slider',
                'posts_per_page' => $posts_per_page,
                'tax_query' => [
                    ['taxonomy' => 'slider-name', 'field' => 'slug', 'terms' => $terms]
                ]
            ]) ?>
            <?php $count = 0; ?>
            <?php foreach ($posts as $slide):
                $image = trendone_get_image_thumb($image_profile, $slide->ID);
                if (!$image) {
                    continue;
                }
                list($src, $width, $height) = $image;
                ?>
                <div class="carousel-item <?php echo $count == 0 ? 'active' : '' ?>"
                     data-slide-id="<?php echo $slide->ID ?>">
                    <img class="d-block mx-auto img-fluid" width="<?php echo $width ?>" height="<?php $height ?>"
                         src="<?php echo $src ?>"
                         alt="First slide">
                </div>
                <?php $count++ ?>
            <?php endforeach; ?>
        </div>
    </div>
    <?php
    $content = ob_get_contents();
    ob_get_clean();
    return $content;
});


