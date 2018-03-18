<?php
/**
 * 海淘的路由文件.
 *
 * @author Chao Su <chaos@jumei.com>
 */

// 引入配置文件
require_once(__DIR__.'/../config.inc.php');

// 引入公用(跨项目)类库加载器.
require JM_VENDOR_DIR.'Bootstrap/Autoloader.php';

Bootstrap\Autoloader::instance()->addRoot(realpath(JM_APP_ROOT . '..' . DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR)->init();

// 限流代码
// require_once(__DIR__.'/../traffic/traffic.php');

// Web路由/控制器
require_once(JM_WEB_FRAMEWORK_ROOT . 'JMFrameworkWebManagement.php');

$hosts = explode('.', $_SERVER['HTTP_HOST']);
$secondLevelDomainName = $hosts[0];

// Url >> controller 映射器
$routes = array(
    $secondLevelDomainName => array(
         // '@^pay/shopping$@'=> array('Main/Main'),//this is an example
    )
);
$subDomain = Utility_Util::getSubDomain();
JMRegistry::set('subDomain', $subDomain);
JMRegistry::set('SiteInfo', $siteConfig);
JMRegistry::set('cssConfig', $cssConfig);
JMRegistry::set('imgList', $imgList);
JMRegistry::set('jsList', $jsList);
JMRegistry::set('project', 'ridunshe');

// MNLogger客户端初始化
$MNLoggerConfig = (array) new \Config\MNLogger;
\MNLogger\TraceLogger::setUp(array('trace'=>$MNLoggerConfig['trace']));
\MNLogger\EXLogger::setUp(array('exception'=>$MNLoggerConfig['exception']));

$siteEngine = new JMSiteEngine();
$siteEngine->setRoutePathMap($routes);
$siteEngine->setSiteName(SITE_NAME);
$siteEngine->ensureMainSiteAndLearnSubDomain();
$siteEngine->setDefaultRoutePathBaseName('Index');
$siteEngine->run();
