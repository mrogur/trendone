<?php
/**
 * Custom metaboxes
 */

function slider_add_custom_box() {
	$screens = [ 'slider', 'trendone-card' ];
	foreach ( $screens as $screen ) {
		add_meta_box(
			'trendone_slider_box_id',           // Unique ID
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
			<input type="url" name="tro_button_url" id="tro_button_url" value="<?php echo $tro_button_url ?>">
		</div>
		<div class="custom-button-metabox-field-wrapper">
			<label for="tro_button_text">Slider button Text</label>
			<input type="text" name="tro_button_text" id="tro_button_text" value="<?php echo $tro_button_text ?>">
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