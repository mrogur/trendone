<?php get_header(); ?>
    <div class="trendone-content mt-4 mb-4">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <?php
                    while (have_posts()) :
                        the_post();
                        ?>
                        <div class="search-result mt-4">
                            <header class="entry-header">
                                <h3>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                            </header>
                            <div class="entry-content">
                                <?php
                                the_excerpt();
                                ?>
                            </div>
                        </div>
                    <?php endwhile;
                    ?>
                </div>
            </div>

        </div>
    </div>
<?php get_template_part('template-parts/common/common', 'widgets'); ?>

<?php get_footer(); ?>