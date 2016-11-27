<?php
//Includes
include (get_template_directory() . "/fmw/front/enqueue.php");

//Hooks
add_action('wp_enqueue_scripts', 'tair_enqueue_styles' );
add_action('wp_enqueue_scripts', 'tair_enqueue_scripts' );


