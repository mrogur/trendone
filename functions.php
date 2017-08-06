<?php
//Includes

define( "ROOT_DIR", get_template_directory() );


include( get_template_directory() . "/modules/enqueue.php" );
include( get_template_directory() . "/modules/common.php" );
include( get_template_directory() . "/lib/BootstrapNavMenuWalker.php" );
include( get_template_directory() . "/modules/post_types/trendone_slider.php" );
include( get_template_directory() . "/modules/post_types/trendone_cards.php" );
include( get_template_directory() . "/modules/customizer/hero_section.php" );

//Hooks
add_action( 'wp_enqueue_scripts', 'trendair_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'trendair_enqueue_scripts' );

/**
 * Template setup
 */
if ( ! function_exists( 'trendone_setup' ) ):
	function trendone_setup() {

		load_theme_textdomain( 'trendone' );
		add_theme_support( 'custom-logo' );
		add_theme_support( 'post-thumbnails' );

	}

endif;

add_action( 'after_setup_theme', 'trendone_setup' );


//jQuery 3.1.1
function modify_jquery_version() {
	if ( ! is_admin() ) {
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery',
			'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', false, '3' );
		wp_enqueue_script( 'jquery' );
	}
}

add_action( 'init', 'modify_jquery_version' );


function setup_custom_logo() {
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$logo           = wp_get_attachment_image_src( $custom_logo_id, 'full' );
	if ( has_custom_logo() ) {
		echo '<img src="' . esc_url( $logo[0] ) . '">';
	} else {
		echo '<h1>' . get_bloginfo( 'name' ) . '</h1>';
	}
}

add_action( 'init', 'custom_bootstrap_slider' );
add_action( 'init', 'custom_bootstrap_cards' );
