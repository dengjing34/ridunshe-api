<?php
/**
 * This file is generated automatically by ConfigurationSystem.
 * Do not change it manually in production, unless you know what you're doing and can take responsibilities for the consequences of changes you make.
 */


namespace Config;

/**
 * Contract.
 */
class Log
{

    // 文件日志的根目录.请确认php进程对此目录可写
    public $FILE_LOG_ROOT = '/home/logs/';

    // 数据库日志配置
    public $db = array(
        'logger' => 'file',
        'rotateFormat' => 'Y-m-d',
    );
}
