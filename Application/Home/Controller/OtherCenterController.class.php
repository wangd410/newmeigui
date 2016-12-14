<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/13
 * Time: 21:06
 */

namespace Home\Controller;


use Think\Controller;

class OtherCenterController  extends Controller
{
    public function index () {//显示他人信息
        $id = $_GET['id'];
        $this->get_move($id);
        $this->display(index);
    }

    /*
    * 他的收藏列表
    * @return void
    * */
    public function other_loves () {
        $id = $_GET['id'];
        $collect = $this->get_collect();
        $ad_info = $this->get_ad($collect['na_user_lovelist']);
        $this->assign('page',$ad_info['page']);
        $this->assign('list',$ad_info['list']);
        $this->display('love');
    }

    /*
     * 获取用户动态
     * @param null 模型层根据用户session获取
     * @return void
     * */
    public function other_move () {
        $id = $_GET['id'];
        $move = $this->get_move($id);
        $this->assign('movepage',$move['page']);
        $this->assign('movelist',$move['list']);
        $this->display('move');
    }

    /*
    * 获取个人动态
    * @param int $id
    * @rsturn mixed 返回动态相关信息
    * */
    private function get_move ($id) {
        $comment = D('Comment');
        return $comment->get_move($id);
    }
}