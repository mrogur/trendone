<?php
/**
 * Created by IntelliJ IDEA.
 * User: pwlazlo
 * Date: 29.01.2018
 * Time: 17:42
 */
require_once( get_template_directory() . "/modules/taxonomies/coauthor/class-category-coauthor-display-registration.php" );

$termMetaRegistration = new TrendOne_CategoryCouathorDisplayRegistration('category', 'display_coauthor', 'Display CoAuthors');
add_action('init', [$termMetaRegistration, 'init']);

