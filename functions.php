<?php
//Includes
include (get_template_directory() . "/trendair/front/enqueue.php");
include (get_template_directory() . "/trendair/common.php");
include (get_template_directory() . "/trendair/lib/BootstrapNavMenuWalker.php");

//Hooks
add_action('wp_enqueue_scripts', 'tair_enqueue_styles' );
//add_action('wp_enqueue_scripts', 'tair_enqueue_wp_scripts' );
add_action('wp_enqueue_scripts', 'tair_enqueue_scripts' );


