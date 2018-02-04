<?php

define("NODE_HOME", get_template_directory_uri() . "/node_modules");

/**
 * Function enqueue styles on page.
 */
function trendone_enqueue_styles()
{
    wp_register_style("trendone_bootstrap", NODE_HOME . "/bootstrap/dist/css/bootstrap.min.css");
    wp_register_style("trendone_app", get_template_directory_uri() . '/dist/css/app.css');
    wp_enqueue_style("trendone_bootstrap");
    wp_enqueue_style("trendone_app");
}

/**
 * Function enqueues scripts on page.
 */
function trendone_enqueue_scripts()
{
    $scripts = [
        "trendone_popperjs" => [NODE_HOME . "/popper.js/dist/umd/popper.min.js", [], true],
        "trendone_bootstrap" => [NODE_HOME . "/bootstrap/dist/js/bootstrap.min.js", ['jquery', 'trendone_popperjs'], true],
        "trendone_vendor" => [get_template_directory_uri() . "/dist/js/vendor.js", ['trendone_bootstrap'], true],
        "trendone_app" => [get_template_directory_uri() . "/dist/js/app.js", ['trendone_bootstrap'], true]
    ];

    wp_register_script("trendone_popperjs",
        NODE_HOME . "/popper.js/dist/umd/popper.min.js", [], false, true);
    wp_register_script("trendone_bootstrap",
        NODE_HOME . "/bootstrap/dist/js/bootstrap.min.js", [
            'jquery', 'trendone_popperjs'
        ], false, true);
    wp_register_script("trendone_vendor",
        get_template_directory_uri() . "/dist/js/vendor.js", [
            'trendone_bootstrap'
        ], false, true);
    wp_register_script("trendone_app",
        get_template_directory_uri() . "/dist/js/app.js", [
            'trendone_bootstrap'
        ], false, true);

    wp_enqueue_script("trendone_popperjs");
    wp_enqueue_script("trendone_bootstrap");
    wp_enqueue_script("trendone_vendor");
    wp_enqueue_script("trendone_app");

}

add_action('wp_enqueue_scripts', 'trendone_enqueue_styles');
add_action('wp_enqueue_scripts', 'trendone_enqueue_scripts');
