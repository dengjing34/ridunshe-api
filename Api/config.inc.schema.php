<?php
// 定义项目/应用名称标识。(内部全系统通用标识)
define('JM_APP_NAME', 'WangWang');

// 开发框架所需的site命名
define('SITE_NAME', 'WangWang');

// 定义聚美公共类库根目录，请根据实际环境修改。
define('JM_VENDOR_DIR', __DIR__.'/../Vendor/');

if (!defined('DEBUG')) {
    define('DEBUG', false);
}

date_default_timezone_set('Asia/Chongqing');

define('JM_APP_ROOT', __DIR__ . DIRECTORY_SEPARATOR);
define('JM_PROJECT_ROOT', JM_APP_ROOT);
define('JM_WEB_FRAMEWORK_ROOT', JM_VENDOR_DIR.'/JMWebFramework/Lib/');

// 项目内部公用模块根目录
define('JM_COMMON', JM_PROJECT_ROOT . '../Commons/');

// 页面模板根目录
define('JM_VIEW', JM_APP_ROOT . 'View/');
define('JM_PHASE_STAGING', 'staging');

$siteConfig = array();
/*=====================================================
 cookie中分站信息的key，这个值非常重要，请保持和主站一致
=====================================================*/
$siteConfig['siteVersion'] = 'default_site_25';
$siteConfig ['Site'] ['WangWang'] ['WebDomainName'] = 'www.jumei.com';

$siteConfig ['Site']['WangWang']['FriendlyName'] = '聚美海淘';
$siteConfig['Site']['WangWang']['WebDomainName'] = 'www.jumeiglobal.com';
$siteConfig['Site']['WangWang']['WebBaseURL'] = 'http://www.jumeiglobal.com/';

// 当前站点域名.
$siteConfig['Site']['Current'] = $siteConfig['Site']['WangWang'];

// 上传文件 或css 后需要更新版本号.
$cssConfig = array('path' => 'http://s0.jmstatic.com/', 'version' => 0);
$imgList   = array('path' => 'http://s0.jmstatic.com/', 'version' => 0);
$jsList    = array('path' => 'http://s0.jmstatic.com/', 'version' => 0);

class RpcBusinessException extends Exception {}
