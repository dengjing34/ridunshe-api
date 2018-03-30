<?php
class Controller_Index extends Controller_Base
{

    /**
     * 主页.
     */
    public function action_Index()
    {
        $this->action_Home();
    }

    /**
     * 主页.
     */
    public function action_Home()
    {
        $op = \Model\DbOperator::instance()->order('sort DESC')->limit(5);
        $banners = \Model\Ridunshe\Works::instance()->queryAllBase(array('banner_pic <>' => ''), 'id,title,banner_pic', $op);
        if (!empty($banners)) {
            foreach ($banners as &$banner) {
                $banner['banner_pic'] = \Config\StaticFile::staticUrl($banner['banner_pic']);
            }
            unset($banner);
        }
        $op->limit(4);
        $list = \Model\Ridunshe\Works::instance()->queryAllBase(array('home_pic <>' => ''), 'id,title,home_pic', $op);
        if (!empty($list)) {
            foreach ($list as &$row) {
                $row['home_pic'] = \Config\StaticFile::staticUrl($row['home_pic']);
            }
            unset($row);
        }
        $this->responseSuccess(array('banner' => $banners, 'list' => $list));
    }

    /**
     * 菜单接口.
     */
    public function action_Menu()
    {
        $menu = array();
        $op = \Model\DbOperator::instance()->order('sort DESC');
        $condition = array('status' => 1);
        $worksCategory = array(array('id' => '', 'name' => '全部', 'ename' => 'ALL', 'link' => 'all'));
        $category = \Model\Ridunshe\WorksCategory::instance()->queryAllBase($condition, 'id,name,ename', $op);
        if (!empty($category)) {
            foreach ($category as $k => $cate) {
                $category[$k]['link'] = $cate['ename'];
                $category[$k]['ename'] = strtoupper($cate['ename']);
            }
            $worksCategory = array_merge($worksCategory, $category);
        }
        $menu[] = array('name' => '作品', 'ename' => 'WORKS', 'link' => 'works', 'children' => $worksCategory);
        $menu[] = array('name' => '新闻', 'ename' => 'NEWS', 'link' => 'news');
        $pages = \Model\Ridunshe\Pages::instance()->queryAllBase(array('status' => 1), 'name,english_name as ename', $op);
        if (!empty($pages)) {
            foreach ($pages as $k => $page) {
                $pages[$k]['link'] = $page['ename'];
                if (in_array($page['name'], array('contact', 'about'))) {
                    $pages[$k]['link'] .= 'us';
                }
                $pages[$k]['ename'] = strtoupper($page['ename']);
            }
            $menu = array_merge($menu, $pages);
        }
        $this->responseSuccess($menu);
    }
}
