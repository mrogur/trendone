<?php get_header(); ?>
<section class="firstSection text-justify">
    <?php get_template_part('template-parts/frontpage/slider', 'main'); ?>
    <?php get_template_part('template-parts/frontpage/slider', 'ads'); ?>
</section>

<?php get_template_part('template-parts/common/common', 'cards'); ?>
<section class="bgGreyC9">
    <?php get_template_part('template-parts/frontpage/slider', 'ads-scnd'); ?>
</section>
<?php get_template_part('template-parts/common/common', 'cards-scnd'); ?>
<?php get_template_part('template-parts/common/common', 'widgets'); ?>

<?php get_footer(); ?>
