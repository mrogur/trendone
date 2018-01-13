    <div class="container bg-secondary py-2 py-lg-0">
        <div class="row">
            <div id="sliderNews" class="carousel slide col-md-12 col-lg-9 pl-lg-0" data-ride="carousel" data-interval="20000">
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
                        $size = 'trendone_image_newsfeed';
                        $image = wp_get_attachment_image_src($attachment_id, $size, null);
                        if (!$image) {
                            continue;
                        }
                        list($src, $width, $height) = $image;
                        ?>
                        <div class="carousel-item <?php echo $count == 0 ? 'active' : '' ?>" data-slide-id="<?php echo $slide->ID ?>">
                            <img class="d-block mx-auto" width="<?php echo $width ?>"
                                 src="<?php echo $src ?>"
                                 alt="First slide">
                        </div>
                        <?php $count++ ?>
                    <?php endforeach; ?>
                    <a class="carousel-control-prev" href="#sliderNews" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#sliderNews" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <div  class="col-md-12 col-lg-3 pl-lg-0">
                <?php
                    $count = 0;
                    foreach ($slider as $slide):
                    $terms = wp_get_post_terms($slide->ID, 'slide-category');
                    $term = '';
                    if (!empty($terms)) {
                        $term = $terms[0];
                    }
                    ?>
                    <div id="<?php echo 'sliderNews' . $slide->ID ?>"  class="slide-description d-none <?php echo $count == 0 ? ' d-block' : '' ?>" >
                        <div class="bg-light p-2">
                            <h6 class="font-italic">NEWSY</h6>
                            <h5 class="font-weight-bold"><?php echo $slide->post_title ?></h5>
                            <p class="py-0">
                            <span class="small">
                                <?php echo $term->name ?>
                            </span>
                                <span class="small float-right">
                                <?php echo get_the_date("Y/m/d") ?>
                            </span>
                            </p>
                        </div>
                        <div class="p-1">
                            <?php echo $slide->post_content ?>
                        </div>
                    </div>
                <?php
                    $count++;
                    endforeach; ?>
            </div>

        </div>
    </div><!--end container-->


