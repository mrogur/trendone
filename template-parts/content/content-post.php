<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
$coauthorCache = trendone_get_coauthor_cache();
$coauthors = $coauthorCache->get_coauthors(get_the_ID());
?>
<div class="row">
    <div class="col-sm-4">
        <div class="d-flex h-100 align-items-center">
            <?php echo get_the_post_thumbnail(null, 'trendone_archive', ['class' => 'justify-content-center align-self-center mx-auto']); ?>
        </div>
    </div>
    <div class="col-sm-8">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <h3>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h3>
                <p class="text-light">
                    <?php the_date(); ?>
                </p>
            </header><!-- .entry-header -->
            <div class="entry-content">
                <?php
                the_excerpt();
                ?>
                <div class="coauthor">
                    <?php
                    global $category_id;
                    $coauthorStr = $coauthorCache->get_coauthors_div(get_the_ID(), $category_id);
                    echo $coauthorStr;
                    ?>
                </div>
            </div><!-- .entry-content -->

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
    </div>
</div>
