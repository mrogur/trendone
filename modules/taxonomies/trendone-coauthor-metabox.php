<?php
/**
 * Custom metaboxes
 */

require_once(get_template_directory() . '/modules/taxonomies/coauthor-display-options.php');



class TrendOne_CoauthorPostMetaBox
{

    const TRENDONE_COAUTHOR_DISPLAY_OPTION = 'trendone_coauthor_display_option';

    private $hasValueFromPostCategory = false;
    private $hasMoreThanOneCategory = false;

    public function init_action() {
        add_action('add_meta_boxes', [$this,'coauthor_add_custom_box']);
        add_action('save_post', [$this,'coauthor_save_postdata']);
    }

    function coauthor_add_custom_box()
    {
        $screens = ['post', 'page'];
        foreach ($screens as $screen) {
            add_meta_box(
                'trendone_coauthor_box_id',           // Unique ID
                _('CoAuthor Display Options'),  // Box title
                [$this,'coauthor_custom_box_html'],  // Content callback, must be of type callable
                $screen                   // Post type
            );
        }
    }



    /**
     * @param $post WP_Post
     * @return string
     */
    function trendone_get_coauthor_display_from_category($post)
    {
        $cat = $post->post_category;
        if(count($cat)>1) 
        {
            $this->hasMoreThanOneCategory = true;
            $this->hasValueFromPostCategory = true;
            return "9";
        }
        if (empty($cat)) {
            return "1";
        }

        $found = "";
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
        $this->hasValueFromPostCategory = true;
        return $found;
    }


    public function coauthor_custom_box_html($post)
    {
        $trendone_coauthor_display_option = get_post_meta($post->ID, self::TRENDONE_COAUTHOR_DISPLAY_OPTION, true);
        $optionSelected = empty($trendone_coauthor_display_option) ?
            $this->trendone_get_coauthor_display_from_category($post) : $trendone_coauthor_display_option;
        $disabled = $this->hasMoreThanOneCategory ? "disabled" : "";
        ?>
        <div class="custom-coauthor-metabox">
            <div class="custom-coauthor-metabox-field-wrapper">
                <?php if($this->hasMoreThanOneCategory): ?>
                    <div class="text-warning">
                        <?php echo _("This post belongs to more than one category. Using category based display settings.") ?>
                    </div>

                <?php endif;  ?>
                <label for="trendone_coauthor_display_option">Display Coauthor</label>
                <input type="hidden" name="has_value_from_post_category" value="<?php echo $this->hasValueFromPostCategory?>">
                <select name="trendone_coauthor_display_option" id="" <?php echo $disabled ?>>
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
        if(array_key_exists('has_value_from_post_category', $_POST) && $_POST['has_value_from_post_category'] == true) {
            return;
        }
        if (array_key_exists(self::TRENDONE_COAUTHOR_DISPLAY_OPTION, $_POST)) {
            if (!array_key_exists($_POST[self::TRENDONE_COAUTHOR_DISPLAY_OPTION], array_keys(coauthor_get_display_options()))) {
                return;
            }
            update_post_meta(
                $post_id,
                self::TRENDONE_COAUTHOR_DISPLAY_OPTION,
                $_POST[self::TRENDONE_COAUTHOR_DISPLAY_OPTION]
            );
        }
    }
}

