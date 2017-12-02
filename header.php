<?php
/**This is TrendOne header file. */
?>
<!DOCTYPE html >
<html <?php get_language_attributes() ?> >
<head>
    <title></title>
    <meta charset="<?php bloginfo('charset')?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<?php wp_head(); ?>
</head>
<body <?php body_class() ?>>
<!--<header class="site-header" role="banner">-->

<nav class="navbar navbar-expand-md navbar-light bg-light">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php setup_custom_logo() ?></a>
    <div class="collapse navbar-collapse justify-content-end mr-sm-4" id="navbarNavDropdown">

		<?php wp_nav_menu( [
			'theme_location' => 'header-menu',
			'menu_class'     => "nav navbar-nav mr-sm-5",
			'container'      => false,
			'depth'          => 3,
			'walker'         => new BootstrapNavMenuWalker()
		] ); ?>
	    <?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

        <form  action="<?php echo home_url(); ?>" method="get"  class="form-inline ml-sm-5 my-2 my-lg-0">
            <input class="form-control mr-sm-2" id="<?php echo $unique_id?>" type="search"
                   placeholder="Wyszukaj..."
                   value="<?php echo get_search_query(); ?>" name="s">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Szukaj</button>
        </form>
    </div>
</nav>
<div class="trendone-wrapper"> <!-- wrapper start -->
	<?php
	if ( is_front_page() ) {
		get_template_part( 'template-parts/header/slider', 'main' );
    }
	?>




