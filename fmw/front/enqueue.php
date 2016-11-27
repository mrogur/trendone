<?php

define(BOWER_HOME, get_template_directory_uri() . "/bower_components");

/**
 * Function enqueue styles on page.
 */
function tair_enqueue_styles() {
	$styles = [
		"tair_bootstrap" =>  BOWER_HOME."/bootstrap/dist/css/bootstrap.min.css",
		"tair_font-awesome" => BOWER_HOME."/font-awesome/css/font-awesome.css"
	];

	foreach ( $styles as $style_name => $style_path) {
		wp_register_style($style_name, $style_path);
		wp_enqueue_style($style_name);
	}

}

/**
 * Function enqueues scripts on page.
 */
function tair_enqueue_scripts() {
	$scripts = [
		"tair_bootstrap" => [BOWER_HOME."/bootstrap/js/bootstrap.min.js", true]
	];

	tair_enqueue_wp_scripts();
	foreach ( $scripts as $key => $script ) {

		$script_to_load = $script;
		$load_in_footer = false;

		if (is_array($script)) {
			$script_to_load = $script[0];
			$load_in_footer = $script[1];
		}

		wp_register_script( $key, $script_to_load, [], false, $load_in_footer );
		wp_enqueue_script($key);
	}
}

function tair_enqueue_wp_scripts() {
	wp_enqueue_script( 'jquery' );
}