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
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
			<?php wp_nav_menu( [
				'theme_location' => 'header-menu',
				'menu_class'     => "nav navbar-nav",
				'container'      => false,
				'depth'          => 3,
				'walker'         => new BootstrapNavMenuWalker()
			] ); ?>

        </div>


    </nav>
</header>