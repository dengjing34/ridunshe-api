<?php
/**
 * @file \Util\Log.php
 *
 * @author chaol1 <chaol1@jumei.com>
 */

namespace Util;

class Log
{

    /**
     * 写日志.
     *
     * @param string $message  内容.
     * @param string $category 类别.
     *
     * @return void
     */
    public static function log($message, $category = '')
    {
        $path = rtrim(\Config\Log::$LOG_PATH, "/") . "/" . $category;
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $message = is_array($message) ? json_encode($message) : $message;
        $filename = date('Ymd');
        $file = $path . "/{$filename}.log";
        $message = date('Y-m-d H:i:s') . "\t $message \n";
        error_log($message, 3, $file);
    }

    /**
     * 接口异常日志.
     *
     * @param string $interface 接口.
     * @param string $message   内容.
     *
     * @return void
     */
    public static function interfaceExceptionLog($interface, $message)
    {
        $this->log($interface . "|" . $message, "mdInterfaceException");
    }
}
