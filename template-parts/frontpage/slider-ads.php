<?php
require get_template_directory() . '/modules/sliders/ads-slider.php';
$trendoneSliderData = new TrendoneSliderData();
$trendoneSliderData->cssClasses = 'sliderAds1';
$trendoneSliderData->name = 'slider-glowny';
$trendoneSliderData->imageSize = 'trendone_image_adbox_1';

trendone_print_ad_slider($trendoneSliderData);


