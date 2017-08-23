<?php if ( is_active_sidebar( 'home_right' ) ) : ?>
    <section class="trendone-page-section">
        <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
            <div class="container">
				<?php dynamic_sidebar( 'home_right' ); ?>
            </div>
        </div>
    </section>
<?php endif; ?>