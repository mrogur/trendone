<?php

define("BOWER_HOME", get_template_directory_uri() . "/bower_components");

/**
 * Function enqueue styles on page.
 */
function trendair_enqueue_styles() {
	$styles = [
		"trendair_bootstrap" =>  BOWER_HOME."/bootstrap/dist/css/bootstrap.min.css",
        "trendair_tether" => BOWER_HOME."/tether/dist/css/tether.min.css",
		"trendair_font-awesome" => BOWER_HOME."/font-awesome/css/font-awesome.css",
        "trendair_trendone" => get_template_directory_uri() . '/css/trendone.min.css'
	];

	foreach ( $styles as $style_name => $style_path) {
		wp_register_style($style_name, $style_path);
		wp_enqueue_style($style_name);
	}

}

/**
 * Function enqueues scripts on page.
 */
function trendair_enqueue_scripts() {
	$scripts = [
		"trendair_tether" => [BOWER_HOME."/tether/dist/js/tether.min.js", ['jquery'], true],
		"trendair_bootstrap" => [BOWER_HOME."/bootstrap/dist/js/bootstrap.min.js", ['trendair_tether'], true]
	];

	foreach ( $scripts as $key => $script ) {

		$script_to_load = $script;
		$load_in_footer = false;
		$dependents = [];

		if (is_array($script)) {
			$script_to_load = $script[0];
			$dependents = $script[1];
			$load_in_footer = $script[2];
		}

		wp_register_script( $key, $script_to_load, $dependents, false, $load_in_footer );
		wp_enqueue_script($key);
	}
}