<?php
/**
 * Register a Custom post type for.
 */
function custom_bootstrap_slider() {
	$labels = array(
		'name'               => _x( 'TrendoneSlider', 'post type general name' ),
		'singular_name'      => _x( 'Trendone Slide', 'post type singular name' ),
		'menu_name'          => _x( 'TrendOne Slider', 'admin menu' ),
		'name_admin_bar'     => _x( 'Slide', 'add new on admin bar' ),
		'add_new'            => _x( 'Add New', 'Slide' ),
		'add_new_item'       => __( 'Name' ),
		'new_item'           => __( 'New Slide' ),
		'edit_item'          => __( 'Edit Slide' ),
		'view_item'          => __( 'View Slide' ),
		'all_items'          => __( 'All Slide' ),
		'featured_image'     => __( 'Featured Image', 'text_domain' ),
		'search_items'       => __( 'Search Slide' ),
		'parent_item_colon'  => __( 'Parent Slide:' ),
		'not_found'          => __( 'No Slide found.' ),
		'not_found_in_trash' => __( 'No Slide found in Trash.' ),
	);

	$args = array(
		'labels'             => $labels,
		'menu_icon'          => 'dashicons-star-half',
		'description'        => __( 'Description.' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => null,
        'taxonomies' => array('slide-category', 'slider-name'),
		'supports'   => array( 'title', 'editor', 'thumbnail' )
	);

	register_post_type( 'slider', $args );


}

function trs_register_taxonomies() {

    register_taxonomy(
        'slider-name',
        'slider',
        array(
            'label' => __( 'Slider' ),
            'rewrite' => array( 'slug' => 'slider-name' ),
            'hierarchical' => true,
        )
    );
    register_taxonomy(
        'slide-category',
        'slider',
        array(
            'label' => __( 'Category' ),
            'rewrite' => array( 'slug' => 'slide-category' ),
            'hierarchical' => true,
        )
    );
}

function trs_image_types() {
    add_image_size('trs_image_newsfeed', 840, 450, true );
    add_image_size('trs_image_ad', 840, 200, true );
}

add_action('init', 'trs_image_types');
add_action( 'init', 'trs_register_taxonomies');
add_action( 'init', 'custom_bootstrap_slider' );





