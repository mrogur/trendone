<?php
/**This is TrendOne header file. */
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<?php wp_head(); ?>
</head>
<body>
<!--<header class="site-header" role="banner">-->

    <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#"><?php setup_custom_logo() ?></a>
        <div class="collapse navbar-collapse justify-content-end mr-sm-4" id="navbarNavDropdown">

			<?php wp_nav_menu( [
				'theme_location' => 'header-menu',
				'menu_class'     => "nav navbar-nav mr-sm-5",
				'container'      => false,
				'depth'          => 3,
				'walker'         => new BootstrapNavMenuWalker()
			] ); ?>
            <form class="form-inline ml-sm-5 my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Wyszukiwana fraza..">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Szukaj</button>
            </form>
        </div>
    </nav>
<div class="trendone-wrapper">
    <!--</header>-->
    <div class="trendone-slider carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
			<?php $slider = get_posts( [ 'post_type' => 'slider', 'posts_per_page' => 5 ] ) ?>
			<?php $count = 0; ?>
			<?php foreach ( $slider as $slide ): ?>
                <div class="carousel-item <?php echo $count == 0 ? 'active' : '' ?>">
                    <img class="d-block mx-auto" max-width="100%" max-height="100%"
                         src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $slide->ID ) ) ?>"
                         alt="First slide">
                    <div class="container">
                        <div class="carousel-caption d-none d-md-block text-left">
                            <h1><?php echo $slide->post_title ?></h1>
                            <p><?php echo $slide->post_content ?></p>
                            <!--                        <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>-->
                        </div>
                    </div>
                </div>
				<?php $count ++ ?>
			<?php endforeach; ?>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>




