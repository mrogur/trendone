<?php
function trendone_print_cards($trendoneCardData)
{
    /* @var $tcd TrendoneCardData */
    $tcd = $trendoneCardData;
    ?>
    <?php $featuredPosts = get_posts(['post_type' => $tcd->postType,
    'posts_per_page' => $tcd->postsPerPage,
    'tax_query' => [
        ['taxonomy' => 'featbox', 'field' => 'slug', 'terms' => $tcd->terms]
    ]]) ?>
    <div class="container pt-3 "<?php echo $tcd->cssClassName ?> ">
    <div class="row">
        <div class="col pl-0 pr-0">
            <div class="row">
                <?php foreach ($featuredPosts
                               as $post): ?>
                    <div class="col-md-4 card-group">

                        <div class="card mb-4 bgGreyMiddle text-light">
                            <div class="card-header py-1 font-italic">POLITYKA</div>
                            <div class="cardPresentation"
                                 style=" height: 12rem !important;">
                                <?php
                                $image = trendone_get_image_thumb("img_cards_main_page", $post->ID);
                                if (null != $image):
                                    list($src, $width, $height) = $image;
                                    ?>
                                    <img class="card-img img-fluid mx-auto"
                                         src="<?php echo $src ?>">
                                <?php endif; ?></div>
                            <div class="card-body mt-7 pl-0 h-50" style="background-color: rgba(0,0,0,0.5)">
                                <h6 class="card-title
                                    p-2 py-3"><?php echo $post->post_title ?></h6>
                            </div>
                            <div class="card-footer text-right py-1">
                                <a href="<?php echo get_permalink($post->ID) ?>" class="clYellow">Czytaj
                                    więcej</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div><!--end first column -->
    </div>
<?php }