<?php
/**
 * Created by IntelliJ IDEA.
 * User: pwlazlo
 * Date: 15.01.2018
 * Time: 17:42
 */

add_action( 'init', 'create_featbox_taxonomy' );

function create_featbox_taxonomy() {
    $labels = array(
        'name'                           => 'Featboxes',
        'singular_name'                  => 'Featbox',
        'search_items'                   => 'Search Featboxes',
        'all_items'                      => 'All Featboxes',
        'edit_item'                      => 'Edit Featbox',
        'update_item'                    => 'Update Featbox',
        'add_new_item'                   => 'Add New Featbox',
        'new_item_name'                  => 'New Featbox Name',
        'menu_name'                      => 'Featbox',
        'view_item'                      => 'View Featbox',
        'popular_items'                  => 'Popular Featbox',
        'separate_items_with_commas'     => 'Separate featboxes with commas',
        'add_or_remove_items'            => 'Add or remove featboxes',
        'choose_from_most_used'          => 'Choose from the most used featboxes',
        'not_found'                      => 'No featboxes found'
    );

    register_taxonomy(
        'featbox',
        'post',
        array(
            'label' => __( 'Featbox' ),
            'hierarchical' => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'show_in_menu' => true,
            'show_ui' => true,
            'show_in_quick_edit' => true,
            'labels' => $labels,
            'rewrite' => [
                'featbox'
            ]
        )
    );
}