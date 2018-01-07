<div class="container p-0 my-3">
    <div id="sliderAds1" class="carousel slide carousel-fade col-12 p-0">
        <div class="carousel-inner" role="listbox">
            <?php $slider = get_posts(['post_type' => 'slider',
                'posts_per_page' => 5,
                'tax_query' => [
                    ['taxonomy' => 'slider-name', 'field' => 'slug', 'terms' => 'slider-glowny']
                ]
            ]) ?>
            <?php $count = 0; ?>
            <?php foreach ($slider as $slide):
                $attachment_id = get_post_thumbnail_id($slide->ID);
                $size = 'trs_image_ad';
                $image = wp_get_attachment_image_src($attachment_id, $size, null);
                if (!$image) {
                    continue;
                }
                list($src, $width, $height) = $image;
                ?>
                <div class="carousel-item <?php echo $count == 0 ? 'active' : '' ?>"
                     data-slide-id="<?php echo $slide->ID ?>">
                    <img class="d-block mx-auto" width="<?php echo $width ?>"
                         src="<?php echo $src ?>"
                         alt="First slide">
                </div>
                <?php $count++ ?>
            <?php endforeach; ?>
        </div>
    </div>
