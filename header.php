<?php
/**This is TrendOne header file. */
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<?php wp_head(); ?>
</head>
<body>
<header class="site-header" role="banner">
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">Navbar</a>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">

			<?php wp_nav_menu( [
				'theme_location' => 'header-menu',
				'menu_class'     => "nav navbar-nav ",
				'container'      => false,
				'depth'          => 3,
				'walker'         => new BootstrapNavMenuWalker()
			] ); ?>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>




    </nav>
</header>