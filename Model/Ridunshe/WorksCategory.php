<?php

namespace Model\Ridunshe;

class WorksCategory extends Base
{

    const TABLE_NAME = 'works_category';

    /**
     * Get Instance.
     *
     * @param boolean $singleton 是否单例.
     *
     * @return \Model\Ridunshe\WorksCategory
     */
    public static function instance($singleton = true)
    {
        return parent::instance($singleton);
    }
}
