<?php
//Includes

define("ROOT_DIR", get_template_directory());


include (get_template_directory() . "/modules/enqueue.php");
include (get_template_directory() . "/modules/common.php");
include (get_template_directory() . "/lib/BootstrapNavMenuWalker.php");

//Hooks
add_action('wp_enqueue_scripts', 'trendair_enqueue_styles' );
add_action('wp_enqueue_scripts', 'trendair_enqueue_scripts' );


