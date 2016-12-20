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
        $encode_id = $_GET['ui'];
        $id = base64_decode($encode_id);
        if ($id==session('user_id')) {
            $this->redirect('MyInfo/index');
            exit();
        }
        $info = $this->get_info($id);//获取用户基本信息
        $move = $this->get_move($id);//获取动态信息
        $love = $this->get_love();//获取推荐列表
        $ad_info = $this->get_ad($info['na_user_lovelist']);
        $this->assign('movepage',$move['page']);
        $this->assign('love',$love);
        $this->assign('movelist',$move['list']);
        $this->assign('info',$info);
        $this->assign('page',$ad_info['page']);
        $this->assign('list',$ad_info['list']);
        $this->display('info');
    }

    /*
    * 他的收藏列表
    * @return void
    * */
    public function other_loves () {
        $id = $_GET['id'];
        $collect = $this->get_info($id);
        $ad_info = $this->get_ad($collect['na_user_lovelist']);
        $this->assign('page',$ad_info['page']);
        $this->assign('list',$ad_info['list']);
        $this->display('love');
    }

    /*
     * 获取用户动态
     * @param null 模型层根据用户id获取
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

    /*
     *获取用户基本信息
     *@param int $id 用户id
     *@return mixed
     * */
    private function get_info ($id) {
        $user  = D('User');
        return $user->get_love($id);
    }

    /*
       * 获取用户收藏列表广告
       * @param array $list
       * @return mixed
       * */
    private function get_ad ($list) {
        $ad = D('Ad');
        return $ad->get_collect($list);
    }

    /*
       * 获取个人中心推荐列表
       * @param null
       * @rsturn mixed 返回广告相关信息
       * */
    private function get_love () {
        $love = D('Adlove');
        return $love->array_ad(2);
    }
}