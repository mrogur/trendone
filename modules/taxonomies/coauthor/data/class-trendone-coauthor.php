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

