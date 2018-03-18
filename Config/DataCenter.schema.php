<?php

namespace Config;


class DataCenter extends \Db\DataCenterRule
{
    /**
    * 机房配置 机房名=> [读写DSN]
    * dove key #{Res.MultiDC.DataCenter}
    */
    protected $dataCenter = array(
        'zw' =>
        array(
            'read' => '192.168.20.73:6603:100',
            'write' => '192.168.20.73:6603:100',
        ),
        'yz' =>
        array(
            'read' => '192.168.20.73:6613:100',
            'write' => '192.168.20.73:6613:100',
        ),
    );

    /**
     *  数据库在哪些机房可读写,如果是多个机房,则会根据库分库下标对机房个数取模计算读写在哪一个机房；
     *  dove key #{Res.MultiDC.DB2DC}
     */
    protected $db2dc = array(
        'default_read' => 'yz',
        'map' =>
        array(
            'user' =>
            array(
                0 => 'zw',
                1 => 'yz',
            ),
            'order' =>
            array(
                0 => 'zw',
                1 => 'yz',
            ),
            'activities' =>
            array(
                0 => 'zw',
                1 => 'yz',
            ),
            'jumei_encrypt' =>
            array(
                0 => 'zw',
                1 => 'yz',
            ),
            'jumei_log' =>
            array(
                0 => 'zw',
                1 => 'yz',
            ),
            'jumei_orders' =>
            array(
                0 => 'zw',
                1 => 'yz',
            ),
            'jumei_pop_orders' =>
            array(
                0 => 'zw',
                1 => 'yz',
            ),
            'jumei_product_sharding' =>
            array(
                0 => 'zw',
                1 => 'yz',
            ),
            'jumei_promocards' =>
            array(
                0 => 'zw',
                1 => 'yz',
            ),
            'jumei_shippings' =>
            array(
                0 => 'zw',
                1 => 'yz',
            ),
            'message_box' =>
            array(
                0 => 'zw',
                1 => 'yz',
            ),
            'payment_platform' =>
            array(
                0 => 'zw',
                1 => 'yz',
            ),
            'payments' =>
            array(
                0 => 'zw',
                1 => 'yz',
            ),
            'user_address' =>
            array(
                0 => 'zw',
                1 => 'yz',
            ),
            'user_giftcard' =>
            array(
                0 => 'zw',
                1 => 'yz',
            ),
            'user_point' =>
            array(
                0 => 'zw',
                1 => 'yz',
            ),
            'jumei_orders_activated' =>
            array(
                0 => 'zw',
                1 => 'yz',
            ),
        ),
    );

}