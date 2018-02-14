<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
<section class="trendone-page-section">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="row">
<!--            <div class="col-sm-5">
                <a href="<?php /*the_permalink(); */?>">
                    <div class="d-flex h-100 align-items-center ">
                        <?php /*echo get_the_post_thumbnail(null, 'trendone_archive', ['class' => 'float-left m-1 d-inline justify-content-center align-self-center mx-auto']); */?>
                    </div>
                </a>
            </div>-->
            <div class="col-12">
                <header class="entry-header">
                    <h3>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h3>
                </header><!-- .entry-header -->
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-info text-right">
                <?php echo the_date("Y/m/d") ?>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-sm-12">
                <div class="entry-content">
                    <?php
                    the_content();

                    wp_link_pages(array(
                        'before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'trendone') . '</span>',
                        'after' => '</div>',
                        'link_before' => '<span>',
                        'link_after' => '</span>',
                        'pagelink' => '<span class="screen-reader-text">' . __('Page', 'trendone') . ' </span>%',
                        'separator' => '<span class="screen-reader-text">, </span>',
                    ));
                    ?>

                </div>
            </div>
        </div><!-- .entry-content -->
        <div class="coauthor">
            <?php
            $coauthorCache = trendone_get_coauthor_cache();
            $coauthorStr = $coauthorCache->get_coauthors_div(get_the_ID());
            echo $coauthorStr;
            ?>
        </div>
        <?php
        edit_post_link(
            sprintf(
            /* translators: %s: Name of current post */
                __('Edit<span class="screen-reader-text"> "%s"</span>', 'trendone'),
                get_the_title()
            ),
            '<footer class="entry-footer"><span class="edit-link">',
            '</span></footer><!-- .entry-footer -->'
        );
        ?>

    </article><!-- #post-## -->
</section>