<?php
/**
 * Created by IntelliJ IDEA.
 * User: pwlazlo
 * Date: 20.01.2018
 * Time: 10:41
 */

/**
 * Register terms for FeatBox
 */

function featbox_register_terms()
{
    if (wp_count_terms("featbox") > 0) {
        return;
    }

    wp_insert_term(_('First Featured Box'), 'featbox', [
        'slug' => 'box_down'
    ]);
    wp_insert_term(_('Second Featured Box'), 'featbox', [
        'slug' => 'box_up'
    ]);
}

add_action('featbox_register_terms', 'featbox_register_terms');
