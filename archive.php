<?php get_header(); ?>
    <div class="trendone-content trendone-blog-posts">
        <div class="container">
            <div class="row">
                <div class="col-sm-9 trendone-article-list">
                    <?php
                    $slugs = explode('/', get_query_var('category_name'));
                    /** @var WP_Term $currentCategory */
                    $currentCategory = get_category_by_slug('/'.end($slugs));
                    $category_id = $currentCategory->term_id;
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $query = new WP_Query(array('posts_per_page' => 8, 'paged' => $paged, 'category_name'=> $currentCategory->slug));

                    while ($query->have_posts()) : $query->the_post();
                        get_template_part('template-parts/content/content', 'post');
                    endwhile;

                    ?>
                    <div class="pagination float-right">
                        <?php
                        the_posts_pagination(array(
                            'mid_size' => 2,
                            'prev_text' => __('Prev', 'trendone'),
                            'next_text' => __('Next', 'trendone'),
                            'screen_reader_text' => '  ',
                        ));
                        ?>
                    </div>
                </div>
                <div class="col-sm-3 trendone-right-sidebar">
                    <?php dynamic_sidebar('sidebar-1') ?>
                </div>
            </div>
        </div>
    </div>

<?php get_footer();