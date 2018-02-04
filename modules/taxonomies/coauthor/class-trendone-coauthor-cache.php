<?php
/**
 * Created by IntelliJ IDEA.
 * User: pwlazlo
 * Date: 04.02.2018
 * Time: 13:56
 */

require_once(__DIR__ . '/data/class-trendone-coauthor.php');
require_once(__DIR__ . '/data/class-trendone-category-metadata.php');

class TrendOne_CoauthorCache
{
    private $coAuthors = [];
    private $displayOptionsCategory = [];

    const TRENDONE_COAUTHOR_DISPLAY_OPTION = 'trendone_coauthor_display_option';

    /**
     * @param $postId
     * @return TrendOne_CoAuthor[]
     */
    public function get_coauthors($postId)
    {
        $terms = get_the_terms($postId, 'coauthor');
        $coauthors = [];
        if (empty($terms)) {
            return [];
        }

        /** @var WP_Term $term */
        foreach ($terms as $term) {
            if (array_key_exists($term->term_id, $this->coAuthors)) {
                $coauthors[] = $this->coAuthors[$term->term_id];
                continue;
            }
            $cauth = new TrendOne_CoAuthor($term->name, get_term_meta($term->term_id, 'initials', true));
            $this->coAuthors[$term->term_id] = $cauth;
            $coauthors[] = $cauth;
        }

        return $coauthors;
    }

    public function get_display_options($postId)
    {

    }

    /**
     * @param $postId int
     * @param null|int $categoryId
     * @return TrendOne_CoauthorCategoryMetadata[]
     */

    public function get_coauthor_category_display($postId, $categoryId = null)
    {
        $cat = wp_get_post_categories($postId, ['fields' => 'all']);
        $categories = [];
        /** @var WP_Term $category */
        foreach ($cat as $category) {
            if (!empty($categoryId) && $categoryId != $category->term_id) {
                continue;
            }
            if (array_key_exists($category->term_id, $this->displayOptionsCategory)) {
                $categories[] = $this->displayOptionsCategory[$category->term_id];
            }
            $term_meta = get_term_meta($category->term_id, 'display_coauthor', true);
            $categories[] = new TrendOne_CoauthorCategoryMetadata($category, $term_meta);
        }
        return $categories;
    }

    /**
     * @param $postId int
     * @return string
     */
    public function get_display_option_by_post_id($postId)
    {
        $trendone_coauthor_display_option =
            get_post_meta($postId, self::TRENDONE_COAUTHOR_DISPLAY_OPTION, true);

        if (!empty($trendone_coauthor_display_option)) {
            return $trendone_coauthor_display_option;
        }
        return null;
    }

    public function get_display_option($postId, $categoryId = null)
    {
        $option_by_post_id = $this->get_display_option_by_post_id($postId);
        if (!empty($option_by_post_id)) {
            return $option_by_post_id;
        }

        $option_by_category = $this->get_coauthor_category_display($postId, $categoryId);
        if (empty($option_by_category)) {
            return "1";
        }

        return $option_by_category[0]->displayOption;
    }

    /**
     * @param $postId
     * @param null|int $categoryId
     * @return string
     */
    public function get_coauthors_div($postId, $categoryId = null)
    {
        $coauthors = $this->get_coauthors($postId);
        if (empty($coauthors)) {
            return "";
        }

        $display_option = $this->get_display_option($postId, $categoryId);
        $start_section = $display_option == "2" ? "[" : "";
        $end_section = $display_option == "2" ? "]" : "";


        ob_start();

        $author = new ArrayObject($coauthors);
        $iter = $author->getIterator();
        ?>
        <div class="coauthor-inner text-right">
            <?php
            echo $start_section;
            while ($iter->valid()):
                $coauthor = $iter->current();
                $name = $coauthor->getName();
                if ($display_option == "2") {
                    $name = $coauthor->getInitial();
                }

                $iter->next();
                ?>

                <span class="coauthor-display"><?php echo $name ?> </span>
                <?php if ($iter->valid()) {
                echo ", ";
            } ?>
            <?php endwhile;
            echo $end_section ?>
        </div>
        <?php
        $content = ob_get_contents();
        ob_get_clean();
        return $content;
    }
}