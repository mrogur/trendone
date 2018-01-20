<?php get_header(); ?>
<section class="firstSection text-justify">
    <?php get_template_part('template-parts/frontpage/slider', 'main'); ?>
    <?php get_template_part('template-parts/frontpage/slider', 'ads'); ?>
</section>

<!--First NewsBox-->
<section class="bgYellow ">
    <?php
        trendone_print_card_section('box_up');
    ?>
</section>

<section class="bgGreyC9">
    <?php get_template_part('template-parts/frontpage/slider', 'ads-scnd'); ?>
</section>


<section class="bgGreyLight ">
    <?php
    trendone_print_card_section('box_down');
    ?>
</section>

<?php /*get_template_part('template-parts/common/common', 'cards-scnd'); */?>
<?php get_template_part('template-parts/common/common', 'widgets'); ?>

<?php get_footer(); ?>
