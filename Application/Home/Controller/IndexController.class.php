<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
          $ad = $this->get_ad();
          $user_info = $this->get_info();
          $love = $this->get_love();
          $this->assign('user_info',$user_info);
          $this->assign('ad',$ad);
          $this->assign('love',$love);
          $this->display('index');
    }

      private function get_ad() {//获取主页显示广告信息
            $ad = D('Ad');
            return $ad->get_most_ad(3);
      }

      private function get_love() {//获取前三条最受喜爱广告
            $love = D('Adlove');
            return  $love->array_ad();
      }

      /*
       * 获取个人消息
       * @param null 根据session
       * @return  mixed
       * */
      private function get_info() {
          $id = session('user_id');
          $user = D('User');
          return $user->get_love($id);
      }
      /*private function get_comment() {//获取广告加评论
          $comment = D('Comment');
          return $comment->get_comment();
      }*/
}