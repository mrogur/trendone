<?php
function trendone_register_menus()
{
    register_nav_menu('header-menu', __('Header Menu'));
    register_nav_menu('footer-menu', __('Footer Menu'));
    register_nav_menu('footer-menu-1', __('Footer Menu First'));
}

add_action('init', 'trendone_register_menus');
