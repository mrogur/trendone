<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
    <div class="trendone-content mt-4">
        <?php get_template_part('template-parts/common/common', 'widgets'); ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <?php the_content() ?>
                </div>
            </div>  <!--  row end-->
        </div>
    </div>
<?php endwhile; ?>

<?php get_footer(); ?>