<?php
/**
 * Created by IntelliJ IDEA.
 * User: pwlazlo
 * Date: 04.02.2018
 * Time: 13:50
 */

class TrendOne_CoAuthor
{
    private $name;
    private $initial;
    private $term;

    public function __construct($term, $name, $initial)
    {

        $this->term = $term;
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

    /**
     * @return mixed
     */
    public function getTerm()
    {
        return $this->term;
    }


}

