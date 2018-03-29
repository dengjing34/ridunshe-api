<?php
class Controller_News extends Controller_Base
{
    /**
     * 新闻详情.
     */
    public function action_Detail()
    {
        $id = JMGetGet('id');
        try {
            if (!ctype_digit((string)$id) || !$id) {
                throw new \RpcBusinessException('无效的新闻ID');
            }
            $row = \Model\Ridunshe\News::instance()->queryRowBase(array('id' => $id), 'id,title,intro,pic,content,created_time');
            if (empty($row)) {
                throw new \RpcBusinessException('新闻不存在');
            }
            $row['pic'] = \Config\StaticFile::staticUrl($row['pic']);
            $row['created_time'] = date('M d, Y', $row['created_time']);
            $row['content'] = \Config\StaticFile::replaceUrl($row['content']);
            $this->responseSuccess($row);
        } catch (Exception $e) {
            $this->responseFail($e);
        }
    }

    /**
     * 新闻列表.
     */
    public function action_List()
    {
        $page = JMGetGetInt('page', 1);
        $pageSize = JMGetGetInt('page_size', 18);
        $condition = array();
        $op = \Model\DbOperator::instance()->order('id DESC');
        $data = \Model\Ridunshe\News::instance()->queryPageBase($condition, 'id,title,intro,pic,created_time', $page, $pageSize, $op);
        foreach ($data['rows'] as &$each) {
            $each['pic'] = \Config\StaticFile::staticUrl($each['pic']);
            $each['created_time'] = date('M d, Y', $each['created_time']);
        }
        unset($each);
        $this->responseSuccess($data);
    }

    /**
     * 作品列表.
     */
    public function action_News()
    {
        $this->action_List();
    }
}
