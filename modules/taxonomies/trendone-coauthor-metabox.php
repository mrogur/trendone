<?php
/**
 * Custom metaboxes
 */

require_once(get_template_directory() . '/modules/taxonomies/coauthor-display-options.php');


function coauthor_add_custom_box()
{
    $screens = ['post', 'page'];
    foreach ($screens as $screen) {
        add_meta_box(
            'trendone_coauthor_box_id',           // Unique ID
            _('CoAuthor Display Options'),  // Box title
            'coauthor_custom_box_html',  // Content callback, must be of type callable
            $screen                   // Post type
        );
    }
}

add_action('add_meta_boxes', 'coauthor_add_custom_box');

/**
 * @param $post WP_Post
 * @return string
 */
function trendone_get_coauthor_display_from_category($post)
{
    $cat = $post->post_category;
    if (empty($cat)) {
        return "1";
    }

    $foundą = "";
    $categories = array_reverse($cat);
    foreach ($categories as $categoryName) {
        $term_meta = get_term_meta($categoryName, 'display_coauthor', true);
        if (!empty($term_meta)) {
            $found = $term_meta;
            break;
        }
    }
    if (empty($found)) {
        return "1";
    }
    return $found;
}


function coauthor_custom_box_html($post)
{
    $trendone_coauthor_display_option = get_post_meta($post->ID, "trendone_coauthor_display_option", true);
    $optionSelected = empty($trendone_coauthor_display_option) ? trendone_get_coauthor_display_from_category($post) : $trendone_coauthor_display_option;
    ?>
    <div class="custom-coauthor-metabox">
        <div class="custom-coauthor-metabox-field-wrapper">
            <label for="trendone_coauthor_display_option">Display Coauthor</label>
            <select name="trendone_coauthor_display_option" id="">
                <?php foreach (coauthor_get_display_options() as $value => $optionText): ?>
                    <option value="<?php echo $value ?>"
                        <?php echo ($value == $optionSelected) ? "selected" : "" ?>>
                        <?php echo $optionText ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <?php
}


function coauthor_save_postdata($post_id)
{
    if (array_key_exists('trendone_coauthor_display_option', $_POST)) {
        if (!array_key_exists($_POST['trendone_coauthor_display_option'], array_keys(coauthor_get_display_options()))) {
            return;
        }
        update_post_meta(
            $post_id,
            'trendone_coauthor_display_option',
            $_POST['trendone_coauthor_display_option']
        );
    }
}

add_action('save_post', 'coauthor_save_postdata');