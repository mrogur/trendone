<?php
//Includes

define("ROOT_DIR", get_template_directory());


include (get_template_directory() . "/modules/enqueue.php");
include (get_template_directory() . "/modules/common.php");
include (get_template_directory() . "/lib/BootstrapNavMenuWalker.php");

//Hooks
add_action('wp_enqueue_scripts', 'trendair_enqueue_styles' );
add_action('wp_enqueue_scripts', 'trendair_enqueue_scripts' );

//jQuery 3.1.1
function modify_jquery_version() {
	if (!is_admin()) {
		wp_deregister_script('jquery');
		wp_register_script('jquery',
			'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', false, '3');
		wp_enqueue_script('jquery');
	}
}
add_action('init', 'modify_jquery_version');