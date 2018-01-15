<?php
function trendone_register_image_sizes()
{
    add_image_size('trendone_image_newsfeed', 840, 450, true );
    add_image_size('trendone_image_adbox_1', 840, 200, true );
    add_image_size('trendone_image_adbox_2', 840, 300, true);
    add_image_size('trendone_image_adbox_3', 1140, 200, true);
    add_image_size('trendone_image_adbox_4', 1140, 300, false);
    add_image_size('img_cards_main_page', 360, 240, false);
}

add_action('init', 'trendone_register_image_sizes');