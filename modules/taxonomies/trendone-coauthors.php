<?php
/**
 * Created by IntelliJ IDEA.
 * User: pwlazlo
 * Date: 15.01.2018
 * Time: 17:42
 */
require_once( get_template_directory() . "/lib/class-term-meta-registration.php" );

$termMetaRegistration = new TermMetaRegistration('coauthor', 'initials', 'Initials');

add_action('init', 'create_coauthor_taxonomy');
add_action('init', 'coauthor_register_terms_action');
add_action('init', [$termMetaRegistration, 'init']);



function create_coauthor_taxonomy()
{
    $labels = array(
        'name' => 'CoAuthors',
        'singular_name' => 'CoAuthor',
        'search_items' => 'Search CoAuthors',
        'all_items' => 'All CoAuthors',
        'edit_item' => 'Edit CoAuthor',
        'update_item' => 'Update CoAuthor',
        'add_new_item' => 'Add New CoAuthor',
        'new_item_name' => 'New CoAuthor Name',
        'menu_name' => 'CoAuthor',
        'view_item' => 'View CoAuthor',
        'popular_items' => 'Popular CoAuthor',
        'separate_items_with_commas' => 'Separate coAuthors with commas',
        'add_or_remove_items' => 'Add or remove coAuthors',
        'choose_from_most_used' => 'Choose from the most used coAuthors',
        'not_found' => 'No coAuthors found'
    );

    register_taxonomy(
        'coauthor',
        ['post', 'page'],
        array(
            'label' => __('CoAuthor'),
            'hierarchical' => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'show_in_menu' => true,
            'show_ui' => true,
            'show_in_quick_edit' => true,
            'labels' => $labels,
            'rewrite' => [
                'coauthor'
            ]
        )
    );
}



function coauthor_register_terms_action()
{
  do_action('coauthor_register_terms');
}

class TrendOne_CoAuthor {
    private $name;
    private $initial;

    public function __construct($name, $initial)
    {

        $this->name = $name;
        $this->initial = $initial;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getInitial()
    {
        return $this->initial;
    }
}

function trendone_coauthors_get_post_term_metadata($postId) {
    $terms = get_the_terms($postId, 'coauthor');
    $coauthors = [];
    if(empty($terms)) {
        return;
    }

    /** @var WP_Term $term */
    foreach ($terms as $term) {
        $coauthors[] = new TrendOne_CoAuthor($term->name, get_term_meta($term->term_id, 'initials', true));
    }

    return $coauthors;
}

function trendone_get_coauthors($categoryId, $postId)
{
    
}


