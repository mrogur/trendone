<?php
/**
 * Created by IntelliJ IDEA.
 * User: pwlazlo
 * Date: 04.02.2018
 * Time: 14:04
 */

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