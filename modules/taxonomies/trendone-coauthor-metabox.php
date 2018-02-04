<?php
/**
 * Custom metaboxes
 */

require_once(get_template_directory() . '/modules/taxonomies/coauthor-display-options.php');

class TrendOne_CoauthorCategoryMetadata
{
    /** @var WP_Term */
    public $category;
    /** @var string */
    public $displayOption;

    public function __construct($category, $displayOption)
    {
        $this->category = $category;
        $this->displayOption = $displayOption;
    }
}


class TrendOne_CoauthorPostMetaBox
{

    const TRENDONE_COAUTHOR_DISPLAY_OPTION = 'trendone_coauthor_display_option';

    private $hasValueFromPostCategory = false;
    private $hasMoreThanOneCategory = false;

    public function init_action()
    {
        add_action('add_meta_boxes', [$this, 'coauthor_add_custom_box']);
        add_action('save_post', [$this, 'coauthor_save_postdata']);
    }

    function coauthor_add_custom_box()
    {
        $screens = ['post', 'page'];
        foreach ($screens as $screen) {
            add_meta_box(
                'trendone_coauthor_box_id',           // Unique ID
                _('CoAuthor Display Options'),  // Box title
                [$this, 'coauthor_custom_box_html'],  // Content callback, must be of type callable
                $screen                   // Post type
            );
        }
    }


    /**
     * @param $post WP_Post
     * @return TrendOne_CoauthorCategoryMetadata[]
     */

    public function get_coauthor_category_display($post)
    {

        $cat = wp_get_post_categories($post->ID, ['fields' => 'all']);
        $categories = [];
        /** @var WP_Term $category */
        foreach ($cat as $category) {
            $term_meta = get_term_meta($category->term_id, 'display_coauthor', true);
            $categories[] = new TrendOne_CoauthorCategoryMetadata($category, $term_meta);
        }
        return $categories;

    }

    /**
     * @param $categoryDisplayOptions TrendOne_CoauthorCategoryMetadata[]
     * @return string
     */

    public function trendone_get_coauthor_display_from_category($categoryDisplayOptions)
    {
        if (count($categoryDisplayOptions) > 1) {
            $this->hasMoreThanOneCategory = true;
            $this->hasValueFromPostCategory = true;
            return "0";
        }
        return $categoryDisplayOptions[0]->displayOption;
    }

    /**
     * @param TrendOne_CoauthorCategoryMetadata[] $categoryDisplayOptions
     */
    private function print_category_display_options_table($categoryDisplayOptions = [])
    {
        ?>
        <h5><?php echo _("CoAuthor Display Options by Category") ?></h5>
        <div class="row">
            <div class="col-md-6">
                <table class="table">
                    <thead class="thead-light">
                    <tr class="">
                        <th><?php echo _('Category Name') ?></th>
                        <th><?php echo _('Display Option') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $terms = coauthor_get_display_options();
                    foreach ($categoryDisplayOptions as $catDspOpt):
                        ?>
                        <tr>
                            <td><?php echo $catDspOpt->category->name ?></td>
                            <td><?php echo !empty($catDspOpt->displayOption) ? $terms[$catDspOpt->displayOption] : "Not assigned" ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
    }


    /**
     * @param $post WP_Post
     * @param $categoryDisplayOptions TrendOne_CoauthorCategoryMetadata[]
     * @return string
     */
    private function get_selected_option_id($post, $categoryDisplayOptions)
    {
        $trendone_coauthor_display_option =
            get_post_meta($post->ID, self::TRENDONE_COAUTHOR_DISPLAY_OPTION, true);

        if (!empty($trendone_coauthor_display_option)) {
            return $trendone_coauthor_display_option;
        }
        return "0";

    }

    public function coauthor_custom_box_html($post)
    {

        ?>
        <div class="custom-coauthor-metabox">
            <?php
            $displayOptions = $this->get_coauthor_category_display($post);
            $selectedOption = $this->get_selected_option_id($post, $displayOptions);
            $disabled = $this->hasMoreThanOneCategory ? "disabled" : "";
            ?>
            <div class="custom-coauthor-metabox-field-wrapper">
                <?php if ($this->hasMoreThanOneCategory): ?>
                    <div class="text-warning">
                        <?php echo _("This post belongs to more than one category. Using category based display settings.") ?>
                    </div>

                <?php endif; ?>
                <?php $this->print_category_display_options_table($displayOptions) ?>
                <label for="trendone_coauthor_display_option">Display Coauthor by:</label>

                <input type="hidden" name="has_value_from_post_category"
                       value="<?php echo $this->hasValueFromPostCategory ?>">
                <select name="trendone_coauthor_display_option"
                        id="trendone_coauthor_display_option" <?php echo $disabled ?>>
                    <?php foreach (coauthor_get_display_options() as $value => $optionText): ?>
                        <option value="<?php echo $value ?>"
                            <?php echo ($value == $selectedOption) ? "selected" : "" ?>>
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
        if (array_key_exists('has_value_from_post_category', $_POST) && $_POST['has_value_from_post_category'] == true) {
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

