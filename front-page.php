<?php get_header(); ?>
<section class="firstSection text-justify">
    <!--Main Slider -->
    <?php get_template_part('template-parts/frontpage/slider', 'main'); ?>
    <!--Second Slider-->
    <div class="container p-0">
        <div class="col-12 p-0 mb-3">
            <?php echo
            do_shortcode('[trendone-slider css_classes="sliderAds1" terms="ads-slider-01" image_profile="trendone_ads_1140x200"]') ?>

        </div>
    </div>
    <?php /*get_template_part('template-parts/frontpage/slider', 'ads');*/ ?>
</section>

<!--First NewsBox-->
<section class="bgYellow trendone-cards">
    <div class="container pt-3">
        <?php echo do_shortcode('[trendone-featbox terms="box_up" image_profile="img_cards_main_page"]'); ?>
    </div>
</section>

<section class="bgGreyC9">
    <div class="container p-0">
        <div class="col-12 p-0">
            <?php echo
            do_shortcode('[trendone-slider css_classes="sliderAds1" terms="ads-slider-02" image_profile="trendone_ads_1140x300"]') ?>
        </div>
    </div>
</section>


<section class="bgGreyLight trendone-cards">
    <div class="container pt-3">
        <?php echo do_shortcode('[trendone-featbox terms="box_down" image_profile="img_cards_main_page"]'); ?>
    </div>
</section>

<?php get_footer();
