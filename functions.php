<?php
//Includes
//ob_start();
define( "ROOT_DIR", get_template_directory() );


include( get_template_directory() . "/modules/trendone-enqueue.php" );
include( get_template_directory() . "/modules/trendone-menus.php" );
include( get_template_directory() . "/modules/trendone-image-sizes.php" );
include( get_template_directory() . "/modules/tgm-required-plugins.php" );
include( get_template_directory() . "/lib/BootstrapNavMenuWalker.php" );
include(get_template_directory() . "/modules/metaboxes/trendone-additional-url-metabox.php");
include(get_template_directory() . "/modules/custom-post-types/trendone-slider.php");
include(get_template_directory() . "/modules/taxonomies/trendone-featboxes.php");
include(get_template_directory() . "/modules/taxonomies/trendone-coauthors.php");
//include(get_template_directory() . "/modules/taxonomies/trendone-coauthors-term-meta.php");
include(get_template_directory() . "/modules/cards/trendone-cards-shortcode.php");
include(get_template_directory() . "/modules/sliders/trendone-ads-slider-shortcode.php");


include(get_template_directory() . "/modules/trendone-register-terms.php");


//Hooks
/**
 * @param $featboxTerm - term of featbox taxonomy
 */
function trendone_print_card_section($featboxTerm) {
    $cardDataCards1 = new TrendoneCardData();
    $cardDataCards1->postType = 'post';
    $cardDataCards1->terms = $featboxTerm;
    trendone_print_cards($cardDataCards1);
}

function trendone_print_ads_slider($imageProfile, $customClasses = [])
{

}

/**
 * Template setup
 */
if ( ! function_exists( 'trendone_setup' ) ):
	function trendone_setup() {

		load_theme_textdomain( 'trendone' );
		add_theme_support( 'custom-logo' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );


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

add_action( 'wp_enqueue_scripts', 'modify_jquery_version' );


function setup_custom_logo() {
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$logo           = wp_get_attachment_image_src( $custom_logo_id, 'full' );
	if ( has_custom_logo() ) {
		echo '<img src="' . esc_url( $logo[0] ) . '">';
	} else {
		echo '<h1>' . get_bloginfo( 'name' ) . '</h1>';
	}
}

/**
 * Widget areas
 */

/**
 * Front page widgets
 */
function trendone_frontpage_widgets() {

	register_sidebar( array(
		'name'          => 'Frontpage widget area',
		'id'            => 'home_right',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'trendone_frontpage_widgets' );

/**
 * Sidebar
 */

function trendone_sidebar() {

	register_sidebar( array(
		'name'          => 'Sidebar',
		'id'            => 'sidebar-1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'trendone_sidebar' );

function new_excerpt_more($more) {
	return '';
}
add_filter('excerpt_more', 'new_excerpt_more', 21 );

function the_excerpt_more_link( $excerpt ){
	$post = get_post();
	$excerpt .= '<a href="'. get_permalink($post->ID) . '" class="read-more-link">czytaj dalej</a>';
	return $excerpt;
}
add_filter( 'the_excerpt', 'the_excerpt_more_link', 21 );

function trendone_get_image_thumb($thumbnailDimension, $postId=null) {
    $attachment_id = get_post_thumbnail_id($postId);

    return wp_get_attachment_image_src($attachment_id, $thumbnailDimension, null);
}

//ob_get_clean();

