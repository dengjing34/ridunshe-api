<?php
class Controller_Pages extends Controller_Base
{
    /**
     * 页面详情.
     */
    public function action_Pages()
    {
        $englishName = JMGetGet('english_name');
        try {
            if (empty($englishName)) {
                throw new \RpcBusinessException('无效的页面');
            }
            $englishName = rtrim($englishName, 'us');
            $row = \Model\Ridunshe\Pages::instance()->queryRowBase(array('english_name' => $englishName, 'status' => 1), 'name,english_name,content');
            if (empty($row)) {
                throw new \RpcBusinessException('页面不存在');
            }
            $row['content'] = \Config\StaticFile::replaceUrl($row['content']);
            $this->responseSuccess($row);
        } catch (Exception $e) {
            $this->responseFail($e);
        }
    }
}
