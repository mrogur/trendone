<?php

function trendone_print_ad_slider($cssId, $terms, $additionalClasses) {
?>

<div class="container p-0 my-3">
    <div id="<?php echo $cssId ?>" class="carousel slide carousel-fade col-12 p-0 <?php echo $additionalClasses ?> " data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <?php $posts = get_posts(['post_type' => 'slider',
                'posts_per_page' => 5,
                'tax_query' => [
                    ['taxonomy' => 'slider-name', 'field' => 'slug', 'terms' => $terms]
                ]
            ]) ?>
            <?php $count = 0; ?>
            <?php foreach ($posts as $slide):
               /* $attachment_id = get_post_thumbnail_id($slide->ID);
                $size = 'trendone_image_adbox_1';*/
                $image = trendone_get_image_thumb('trendone_image_adbox_1', $slide->ID);
                if (!$image) {
                    continue;
                }
                list($src, $width, $height) = $image;
                ?>
                <div class="carousel-item <?php echo $count == 0 ? 'active' : '' ?>"
                     data-slide-id="<?php echo $slide->ID ?>">
                    <img class="d-block mx-auto" width="<?php echo $width ?>" height="<?php $height ?>"
                         src="<?php echo $src ?>"
                         alt="First slide">
                </div>
                <?php $count++ ?>
            <?php endforeach; ?>
        </div>
    </div>
    <?php } ?>


