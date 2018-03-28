<?php
/**
 * 输出json的.
 *
 * @author chaol1<chaol1@jumei.com>
 */

namespace Util;

/**
 * Helper_Util.
 */
class SimpleResponse
{
    private static $response = array(
        'SUCCESS'                   => array('code' => 0, 'http_code' => 200, 'message' => ''),
        'UNKNOW'                    => array('code' => 1, 'http_code' => 200, 'message' => '未知错误'),
        'FAILED'                    => array('code' => 2, 'http_code' => 200, 'message' => '系统繁忙，请稍后重试！'),
        'NO_AUTHORIZED'             => array('code' => 3, 'http_code' => 200, 'message' => '无权操作'),
        'SHUTDOWN'                  => array('code' => 1000, 'http_code' => 200, 'message' => '服务器停机维护，请稍后访问~'),
        'NOT_LOGIN'                 => array('code' => 1001, 'http_code' => 200, 'message' => '用户尚未登陆'),
        'NOT_FOUND'                 => array('code' => 1002, 'http_code' => 400, 'message' => '页面未找到'),
        'PARAMS_ERROR'              => array('code' => 1003, 'http_code' => 200, 'message' => '参数不正确'),
        'ACCESS_TOKEN_DECODE_FAIL'  => array('code' => 1004, 'http_code' => 200, 'message' => 'access_token解码失败'),
        'ACCESS_TOKEN_EXPIRED'      => array('code' => 1005, 'http_code' => 200, 'message' => 'access_token已经过期'),
        'REFRESH_TOKEN_DECODE_FAIL' => array('code' => 1006, 'http_code' => 200, 'message' => 'refresh_token解码失败'),
        'REFRESH_TOKEN_EXPIRED'     => array('code' => 1007, 'http_code' => 200, 'message' => 'refresh_token已经过期'),
        'SCAN_STOCK_LACK_ALERT'     => array('code' => 20000, 'http_code' => 200, 'message' => '', 'action' => 'alert'),
    );

    /**
     * 输出响应信息并退出.
     *
     * @param string $type    类型.
     * @param mixed  $result  结果信息.
     * @param mixed  $message 结果信息.
     * @param string $action  展示方式.
     *
     * @return void
     */
    public static function responseExit($type, $result = false, $message = false, $action = 'toast')
    {
        if (!isset(self::$response[$type])) {
            $type = 'UNKNOW';
        }
        $response = self::$response[$type];
        $code     = $response['code'];
        $httpCode = $response['http_code'];

        $message  = $message ? $message : $response['message'];

        if (isset($response['action'])) {
            $action = $response['action'];
        }
        self::outPutJsonResponse($message, $result, $code, $httpCode, $action);
    }

    /**
     * 输出json响应结果.
     *
     * @param string  $message  消息.
     * @param array   $result   数据.
     * @param string  $code     返回码.
     * @param integer $httpCode Http状态码.
     * @param string  $action   Action.
     *
     * @return void
     */
    public static function outPutJsonResponse($message, $result = array(), $code = '40001', $httpCode = 400, $action = 'toast')
    {
        $res = array(
            'code' => (string)$code,
            'action' => (string)$action,
            'message' => (string)$message,
            'data' => $result,
        );

        header("http/1.0 $httpCode");
        header("Content-type: application/json;charset=utf-8");
//        header('Access-Control-Allow-Origin: http://www.ridunshe.com');
//        header("Access-Control-Allow-Credentials: true");
//        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
//        header('Access-Control-Max-Age: 1000');
//        header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
        echo json_encode($res, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    }

}
