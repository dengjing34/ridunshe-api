<?php

namespace Model\Ridunshe;

class News extends Base
{

    const TABLE_NAME = 'news';

    /**
     * Get Instance.
     *
     * @param boolean $singleton 是否单例.
     *
     * @return \Model\Ridunshe\News
     */
    public static function instance($singleton = true)
    {
        return parent::instance($singleton);
    }
}
