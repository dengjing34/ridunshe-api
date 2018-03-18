<?php

namespace Model\Ridunshe;

class Pages extends Base
{

    const TABLE_NAME = 't_pages';

    /**
     * Get Instance.
     *
     * @param boolean $singleton 是否单例.
     *
     * @return \Model\Ridunshe\Pages
     */
    public static function instance($singleton = true)
    {
        return parent::instance($singleton);
    }
}
