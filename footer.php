<footer class="footer bgDark trendone-footer">
    <div class="container ">
        <div class="row">
            <div class=" col-lg-4 footer-column-left">
                <?php wp_nav_menu(array('theme_location' => 'footer-menu-1')); ?>
            </div>
            <div class="col-lg-5 footer-column-right trendone-footer-menu">
				<?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
            </div>
            <div class="col-lg-3 footer-column-right trendone-footer-menu text-light">
                <div class="py-4"><a href="#"><i class="fa fa-facebook-square fa-2x px-1" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-instagram fa-2x px-1" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-twitter-square fa-2x mx-1"
                                   aria-hidden="true"></i></a></div>
                <?php setup_custom_logo() ?>
            </div>
        </div>
    </div>
</footer>
<?php
wp_footer();
?>
</body>
</html>


