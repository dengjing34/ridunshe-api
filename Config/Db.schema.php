<?php
/**
 * This file is generated automatically by ConfigurationSystem.
 * Do not change it manually in production, unless you know what you're doing and can take responsibilities for the consequences of changes you make.
 */


namespace Config;

/**
 * Class Db
 * @package Config
 */
class Db extends \Db\ConfigSchema
{
    const DB_NAME_DEFAULT = 'default';

    //是否使用长连接
    protected $persistent = true;
    public $globalDSN = array();

    public function __construct()
    {
        parent::__construct();
    }

    public $read = array(
        self::DB_NAME_DEFAULT => array(
                array(
                'dsn' => 'mysql:host=127.0.0.1;port=3306;dbname=ridunshe',
                'db' => 'ridunshe',
                'user' => 'root',
                'password' => '',
                'confirm_link' => true,
                'options' => array(
                    \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'utf8\'',
                    \PDO::ATTR_TIMEOUT => 3,
                )
            )
        ),
    );
    public $write = array(
        self::DB_NAME_DEFAULT => array(
                array(
                'dsn' => 'mysql:host=127.0.0.1;port=3306;dbname=ridunshe',
                'db' => 'ridunshe',
                'user' => 'root',
                'password' => '',
                'confirm_link' => true,
                'options' => array(
                    \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'utf8\'',
                    \PDO::ATTR_TIMEOUT => 3,
                )
            )
        ),
    );

    /**
     * 得到sql语句的log,如果线上不需要请直接把这句话删掉!
     */
    public $DEBUG = true;

    /**
     * DEBUG的等级，2要打印堆栈，1只打印sql语句
     */
    public $DEBUG_LEVEL = 1;
}
