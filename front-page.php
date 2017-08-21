<?php get_header(); ?>
<div class="trendone-content">
<!-- HERO -->
	<?php if ( null != get_theme_mod( 'hero_title_setting' ) && get_theme_mod( 'hero_title_setting' ) != '' ): ?>
        <div class="jumbotron jumbotron-fluid trendone-hero">
            <div class="container">
                <h1 class="display-3"><?php echo get_theme_mod( 'hero_title_setting' ); ?></h1>
                <p class="lead"><?php echo get_theme_mod( 'hero_content_setting' ); ?></p>
            </div>
        </div>
	<?php endif; ?>

    <?php get_template_part('template-parts/common/common', 'cards'); ?>
    <?php get_template_part('template-parts/frontpage/front', 'content'); ?>
    <?php get_template_part('template-parts/common/common', 'widgets'); ?>

</div>
<?php get_footer(); ?>
