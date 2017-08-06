<?php
/**
 * Register a Custom post type for.
 */
function custom_bootstrap_cards() {
	$labels = array(
		'name'               => _x( 'TrendoneCards', 'post type general name' ),
		'singular_name'      => _x( 'Trendone Cards', 'post type singular name' ),
		'menu_name'          => _x( 'TrendOne Cards', 'admin menu' ),
		'name_admin_bar'     => _x( 'Cards', 'add new on admin bar' ),
		'add_new'            => _x( 'Add New', 'Card' ),
		'add_new_item'       => __( 'Name' ),
		'new_item'           => __( 'New Card' ),
		'edit_item'          => __( 'Edit Card' ),
		'view_item'          => __( 'View Card' ),
		'all_items'          => __( 'All Card' ),
		'featured_image'     => __( 'Featured Image', 'text_domain' ),
		'search_items'       => __( 'Search Card' ),
		'parent_item_colon'  => __( 'Parent Card:' ),
		'not_found'          => __( 'No Card found.' ),
		'not_found_in_trash' => __( 'No Card found in Trash.' ),
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
		'supports'           => array( 'title', 'editor', 'thumbnail' )
	);

	register_post_type( 'trendone-card', $args );
}