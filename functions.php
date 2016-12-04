<?php
//Includes

define("ROOT_DIR", get_template_directory());


include (get_template_directory() . "/trendair/front/enqueue.php");
include (get_template_directory() . "/trendair/common.php");
include (get_template_directory() . "/trendair/lib/BootstrapNavMenuWalker.php");

//Hooks
add_action('wp_enqueue_scripts', 'trendair_enqueue_styles' );
//add_action('wp_enqueue_scripts', 'trendair_enqueue_wp_scripts' );
add_action('wp_enqueue_scripts', 'trendair_enqueue_scripts' );


