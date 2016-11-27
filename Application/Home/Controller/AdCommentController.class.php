<?php
namespace Home\Controller;

use Think\Controller;

class AdCommentController extends Controller
{
	public function index ()
	{
            $data = $this->get_adtype();
            $first = $this->get_first();
            $ad = $this->get_ad_comment();
            $user_info = $this->get_info();
            $this->assign('page',$ad['page']);
            $this->assign('list',$ad['list']);
            $this->assign('user_info',$user_info);
            $this->assign('first',$first);
            $this->assign('adtype',$data);
            $this->display('ac');
	}

	private  function get_adtype() {//获取广告类型
	      $adtype = D('Adtype');
            return $adtype->get_adType();
      }

      private function get_first () {//获取最新一条评论信息
            return D('Comment')->get_first();
      }

      private function get_ad_comment () {//获取广告加评论信息
            $ad = D('Ad');
            return $ad->get_ad_comment();
      }

      private function get_info() {//获取用户基本信息
          $user = D('User');
          return $user->get_love();
      }
}