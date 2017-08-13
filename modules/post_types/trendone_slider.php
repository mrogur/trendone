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
		'supports'           => array( 'title', 'editor', 'thumbnail' )
	);

	register_post_type( 'slider', $args );


}

add_action( 'init', 'custom_bootstrap_slider' );


/**
 * Custom metaboxes
 */

function slider_add_custom_box() {
	$screens = [ 'slider' ];
	foreach ( $screens as $screen ) {
		add_meta_box(
			'trendone_custom_box_id',           // Unique ID
			'Slider button',  // Box title
			'slider_custom_box_html',  // Content callback, must be of type callable
			$screen                   // Post type
		);
	}
}

add_action( 'add_meta_boxes', 'slider_add_custom_box' );

function slider_custom_box_html( $post ) {
	$tro_button_url  = get_post_meta( $post->ID, "tro_button_url", true );
	$tro_button_text = get_post_meta( $post->ID, "tro_button_text", true );

	?>
    <div class="custom-button-metabox">
        <div class="custom-button-metabox-field-wrapper">
            <label for="tro_button_url">Slider button URL</label>
            <input type="text" name="tro_button_url" value="<?php echo $tro_button_url ?>">
        </div>
        <div class="custom-button-metabox-field-wrapper">
            <label for="tro_button_text">Slider button Text</label>
            <input type="text" name="tro_button_text" value="<?php echo $tro_button_text ?>">
        </div>
    </div>
	<?php

}


function slider_save_postdata( $post_id ) {
	if ( array_key_exists( 'tro_button_url', $_POST ) ) {
		update_post_meta(
			$post_id,
			'tro_button_url',
			$_POST['tro_button_url']
		);
	}
	if ( array_key_exists( 'tro_button_text', $_POST ) ) {
		update_post_meta(
			$post_id,
			'tro_button_text',
			$_POST['tro_button_text']
		);
	}
}

add_action( 'save_post', 'slider_save_postdata' );


