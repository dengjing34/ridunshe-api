<?php
class Controller_Base extends JMViewController_WebManagementBase
{

    /**
     * 接口是否需要登录
     */
    public $needLogin = false;

    /**
     * 系统全局信息初始化.
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
    }

    /**
     * 404页面.
     */
    public function action_PageNotFound()
    {
        header('HTTP/1.1 404 Not Found');
        header('Status: 404 Not Found');
        $this->displayActionTemplate(array(), '404');
    }

    /**
     * 输出响应信息.
     *
     * @param string $type    消息.
     * @param array  $result  数据.
     * @param mixed  $message 返回码.
     * @param string $action  Action.
     *
     * @return json
     */
    public function response($type, $result = array(), $message = false, $action = 'toast')
    {
        \Util\SimpleResponse::responseExit($type, $result, $message, $action);
    }

    /**
     * 输出成功json.
     *
     * @param array  $result  Data.
     * @param string $message 消息.
     * @param string $action  Action, 如toast,jump.
     *
     * @return json
     */
    public function responseSuccess($result = array(), $message = '', $action = 'toast')
    {
        $this->response("SUCCESS", $result, $message, $action);
    }

    /**
     * 输出失败json.
     *
     * @param mixed  $exception 异常信息.
     * @param string $action    Action, 如toast,jump.
     */
    public function responseFail($exception = '', $action = 'toast')
    {
        if ($exception instanceof \RpcBusinessException) {
            // 业务异常信息可以输出.
            $message = $exception->getMessage();
        } else {
            if ($exception instanceof \Exception) {
                \Util\Log::log($exception->getMessage(), "unmanned_shelf_exception");
                $message = "服务异常，请稍后重试";
            } else {
                // 其他异常信息用默认提示语.
                $message = $exception;
            }
        }
        $this->response('FAILED', array(), $message, $action);
    }
}
