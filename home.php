<?php get_header(); ?>
    <div class="trendone-content trendone-blog-posts">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
					<?php
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content/content', 'post' );
					endwhile;

					?>
                    <div class="pagination">
						<?php
						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'trendone' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'trendone' ) . ' </span>%',
							'separator'   => '<span class="screen-reader-text">, </span>',
						) );
						?>
                    </div>

                </div>
<!--                <div class="col-sm-4">-->
<!--					--><?php //dynamic_sidebar( 'sidebar-1' ) ?>
<!--                </div>-->
            </div>
        </div>
    </div>

<?php get_footer(); ?>