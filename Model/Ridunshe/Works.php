<?php

namespace Model\Ridunshe;

class Works extends Base
{

    const TABLE_NAME = 'works';

    /**
     * Get Instance.
     *
     * @param boolean $singleton 是否单例.
     *
     * @return \Model\Ridunshe\Works
     */
    public static function instance($singleton = true)
    {
        return parent::instance($singleton);
    }
}
