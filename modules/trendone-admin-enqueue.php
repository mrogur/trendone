<?php

//define("NODE_HOME", get_template_directory_uri() . "/node_modules");

/**
 * Function enqueue styles on page.
 */
function trendone_admin_enqueue_styles()
{
    wp_register_style("trendone_bootstrap", NODE_HOME . "/bootstrap/dist/css/bootstrap.min.css");
    wp_enqueue_style("trendone_bootstrap");
}

/**
 * Function enqueues scripts on page.
 */
function trendone_admin_enqueue_scripts()
{
    wp_register_script("trendone_popperjs",
        NODE_HOME . "/popper.js/dist/umd/popper.min.js", [], false, true);
    wp_register_script("trendone_bootstrap",
        NODE_HOME . "/bootstrap/dist/js/bootstrap.min.js", [
            'jquery', 'trendone_popperjs'
        ], false, true);

    wp_enqueue_script("trendone_popperjs");
    wp_enqueue_script("trendone_bootstrap");
}


add_action('admin_enqueue_scripts', 'trendone_admin_enqueue_styles');
add_action('admin_enqueue_scripts', 'trendone_admin_enqueue_scripts');