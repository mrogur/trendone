<?php
require get_template_directory() . '/modules/sliders/ads-slider.php';
$trendoneSliderData = new TrendoneSliderData();
$trendoneSliderData->cssClasses = 'sliderAds1 mb-3';
$trendoneSliderData->name = 'drugi';
$trendoneSliderData->imageSize = 'trendone_ads_1140x200';
trendone_print_ad_slider($trendoneSliderData);


