<?php get_header(); ?>
    <div class="trendone-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
					<?php
					while ( have_posts() ) : the_post();

						// Include the page content template.
						get_template_part( 'template-parts/content/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						/*if ( comments_open() || get_comments_number() ) {
							comments_template();
						}*/

						// End of the loop.
					endwhile;
					?>
                </div>
                <!--<div class="col-sm-4">
                    <?php /*dynamic_sidebar('sidebar-1') */?>
                </div>-->
            </div>

        </div>
    </div>
    <?php get_template_part('template-parts/common/common', 'widgets'); ?>

<?php get_footer(); ?>