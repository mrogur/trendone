<?php

define(BOWER_HOME, get_template_directory_uri() . "/bower_components");

/**
 * Function enqueue styles on page.
 */
function tair_enqueue_styles() {
	$styles = [
		"tair_bootstrap" =>  BOWER_HOME."/bootstrap/dist/css/bootstrap.min.css",
        "tair_tether" => BOWER_HOME."/tether/dist/css/tether.min.css",
		"tair_font-awesome" => BOWER_HOME."/font-awesome/css/font-awesome.css",
        "tair_trendone" => get_template_directory_uri() . '/css/trendone.css'
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
		"tair_tether" => [BOWER_HOME."/tether/dist/js/tether.min.js", ['jquery'], true],
		"tair_bootstrap" => [BOWER_HOME."/bootstrap/dist/js/bootstrap.min.js", ['tair_tether'], true]
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