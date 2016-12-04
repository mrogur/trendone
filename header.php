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
    <nav class="navbar navbar-light bg-faded">
        <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-toggleable-md" id="navbarResponsive">
            <a class="navbar-brand" href="#">Navbar</a>
            <!-- <ul class="nav navbar-nav">
             <li class="nav-item active">
                   <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item">
                   <a class="nav-link" href="#">Link</a>
               </li>
               <li class="nav-item">
                   <a class="nav-link" href="#">Link</a>
               </li>
               <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="http://example.com" id="responsiveNavbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                   <div class="dropdown-menu" aria-labelledby="responsiveNavbarDropdown">
                       <a class="dropdown-item" href="#">Action</a>
                       <a class="dropdown-item" href="#">Another action</a>
                       <a class="dropdown-item" href="#">Something else here</a>
                   </div>
               </li>

            </ul>-->
                <?php wp_nav_menu( ['theme_location' => 'header-menu' ,
                    'menu_class' => "nav navbar-nav",
                    'container' => false,
                    'depth' => 2,
                    'walker' => new BootstrapNavMenuWalker()
                ]); ?>
            <form class="form-inline float-lg-right">
                <input class="form-control" type="text" placeholder="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>
</header>