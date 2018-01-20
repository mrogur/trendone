<?php
function trendone_register_image_sizes()
{
    add_image_size('trendone_image_newsfeed', 840, 450, true );
    add_image_size('trendone_ads_1140x200', 1140, 200, true);
    add_image_size('trendone_ads_1140x300', 1140, 300, false);
    add_image_size('img_cards_main_page', 360, 240, false);
    add_image_size('trendone_archive', 250, 250, false);
}

add_action('init', 'trendone_register_image_sizes');