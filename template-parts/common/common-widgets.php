<?php if ( is_active_sidebar( 'home_right' ) ) : ?>
    <section class="trendone-page-widgets trendone-page-section">
        <div class="container trendone-frontpage-widgets">
            <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
				<?php dynamic_sidebar( 'home_right' ); ?>
            </div>
        </div>
    </section>
<?php endif; ?>