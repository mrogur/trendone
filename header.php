<?php
/**This is TrendOne header file. */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Strzal.pl - prototyp</title>

    <?php wp_head(); ?>
</head>
<body class="p-0">
<nav class="navbar navbar-expand-lg navbar-dark bgDark">
    <div class="container"><!--start main row-->
        <!--start main container-->
        <!--first column-->
        <div class="col-sm-12 col-lg-4"><!--start logo column-->
            <div class="to-quote clYellow">

            </div>
            <div class="to-logo justify-content-between"><!--start logo-->
                <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php setup_custom_logo() ?></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#mainNav"
                        aria-controls="mainNav" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div><!--end logo-->
        </div><!--end logo column-->
        <!--first column-->
        <!-- second column -->
        <div class="col-sm-12 col-lg-8 collapse navbar-collapse justify-content-end" id="mainNav">
            <!--start search, menu column-->
            <div class="d-flex flex-column"><!--start menu-->
                <div class="d-flex flex-row "><!--start search form-->
                    <form class="form-inline my-2 my-lg-0 ml-sm-auto">
                        <a href="#"><i class="fa fa-facebook-square fa-2x px-1 clWhite" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-instagram fa-2x px-1 clWhite" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter-square fa-2x mx-1 clWhite"
                                       aria-hidden="true"></i></a>
                        <div class="d-inline-block bg-light p-1 mx-3 searchBox">
                            <label for="search"></label>
                            <input name="search" id="search" placeholder="Wyszukaj" type="text"
                                   class="form-item">
                            <a href="#">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </a>
                        </div>
                        <button class="btn bgYellow fwBold my-2 my-sm-0" type="submit">Logowanie</button>
                    </form>
                </div><!--end search form-->
                <div class="d-flex flex-row justify-content-end mb-4"><!--start row register  -->
                    <a class="clYellow fntSmall mr-3 " href="#">Zarejestruj się</a>
                </div>
                <div class="d-flex flex-row"><!--start row menu-->
                    <?php wp_nav_menu([
                        'theme_location' => 'header-menu',
                        'menu_class' => "navbar-nav ml-md-auto mainMenu",
                        'container' => false,
                        'depth' => 3,
                        'walker' => new BootstrapNavMenuWalker()
                    ]); ?>
                    <!--  <ul class="navbar-nav ml-md-auto mainMenu">
                          <li class="nav-item active">
                              <a class="nav-link" href="#">PORTAL<span class="sr-only">(current)</span></a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="#">O NAS</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="#">MAGAZYN</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="#">WYWIADY</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="#">PRAWO</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="#">REKLAMA</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link pr-0" href="#">KONTAKT</a>
                          </li>
                      </ul>-->
                </div>
            </div><!--end row menu-->
        </div><!--end menu-->
        <!--second column-->
        <!--end row-->
    </div><!--end main container-->
</nav>





