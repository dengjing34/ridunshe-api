<?php
class Controller_Works extends Controller_Base
{
    /**
     * 作品详情.
     */
    public function action_Detail()
    {
        $id = JMGetGet('id');
        try {
            if (!ctype_digit((string)$id) || !$id) {
                throw new \RpcBusinessException('无效的作品ID');
            }
            $row = \Model\Ridunshe\Works::instance()->queryRowBase(array('id' => $id), 'id,title,sub_title,category_en,area,year,intro,pic,content');
            if (empty($row)) {
                throw new \RpcBusinessException('作品不存在');
            }
            $row['category_en'] = strtoupper($row['category_en'] . ' ' . 'design');
            $row['pic'] = \Config\StaticFile::staticUrl($row['pic']);
            $row['content'] = \Config\StaticFile::replaceUrl($row['content']);
            $this->responseSuccess($row);
        } catch (Exception $e) {
            $this->responseFail($e);
        }
    }

    /**
     * 作品列表.
     */
    public function action_List()
    {
        $page = JMGetGetInt('page', 1);
        $pageSize = JMGetGetInt('page_size', 18);
        $categoryId = JMGetGet('category_id');
        $condition = array();
        if (ctype_digit((string)$categoryId) && $categoryId) {
            $condition['category_id'] = $categoryId;
        }
        $op = \Model\DbOperator::instance()->order('sort DESC');
        $data = \Model\Ridunshe\Works::instance()->queryPageBase($condition, 'id,title,cover', $page, $pageSize, $op);
        foreach ($data['rows'] as &$each) {
            $each['cover'] = \Config\StaticFile::staticUrl($each['cover']);
        }
        unset($each);
        $this->responseSuccess($data);
    }

    /**
     * 作品列表.
     */
    public function action_Works()
    {
        $this->action_List();
    }
}
