<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h3>
            <a href="<?php the_permalink(); ?>">
                <?php the_title();  ?>
            </a>
        </h3>
    </header><!-- .entry-header -->
    <div class="entry-content">
		<?php
		the_excerpt();
		?>
    </div><!-- .entry-content -->

	<?php
	edit_post_link(
		sprintf(
		/* translators: %s: Name of current post */
			__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'trendone' ),
			get_the_title()
		),
		'<footer class="entry-footer"><span class="edit-link">',
		'</span></footer><!-- .entry-footer -->'
	);
	?>

</article><!-- #post-## -->
