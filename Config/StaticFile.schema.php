<?php
/**
 * This file is generated automatically by ConfigurationSystem.
 * Do not change it manually in production, unless you know what you're doing and can take responsibilities for the consequences of changes you make.
 */


namespace Config;

/**
 * File.
 */
class StaticFile
{

    const STATIC_DOMAIN = 'http://dengjing.static.ridunshe.com/';

    /**
     * 获取静态文件地址.
     *
     * @param string $file 文件路径.
     *
     * @return string
     */
    public static function staticUrl($file)
    {
        return self::STATIC_DOMAIN . $file;
    }

    public static function replaceUrl($content)
    {
        return preg_replace('@src="/upload/images/@', 'src="' . self::STATIC_DOMAIN . 'images/', $content);
    }
}
