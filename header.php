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
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">Navbar</a>
             <div class="collapse navbar-collapse" id="navbarNavDropdown">
	             <?php wp_nav_menu( ['theme_location' => 'header-menu' ,
	                                 'menu_class' => "nav navbar-nav",
	                                 'container' => false,
	                                 'depth' => 3,
	                                 'walker' => new BootstrapNavMenuWalker()
	             ]); ?>
             </div>
                 <!-- 		  <ul class="navbar-nav">
							   <li class="nav-item active">
								   <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
							   </li>
							   <li class="nav-item">
								   <a class="nav-link" href="#">Features</a>
							   </li>
							   <li class="nav-item">
								   <a class="nav-link" href="#">Pricing</a>
							   </li>
							   <li class="nav-item dropdown">
								   <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									   Dropdown link
								   </a>
								   <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
									   <a class="dropdown-item" href="#">Action</a>
									   <a class="dropdown-item" href="#">Another action</a>
									   <a class="dropdown-item" href="#">Something else here</a>
								   </div>
							   </li>
						   </ul>
					   </div>
				   </nav>-->

    </nav>
</header>