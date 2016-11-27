<?php
namespace Home\Controller;

use Think\Controller;

class AdRankController extends Controller
{
	public function index ()
	{
	        $ad = D('Ad');
            $user_info = $this->get_info();
            $this->assign('user_info',$user_info);
            $data = $ad->get_ad_condition(1);
            $this->assign('list',$data['list']);
            $this->display('rank');
	}

	public function get_ad_by_condition () {
	      $condition = $_POST['condition'];
            $data = $this->get_ad($condition);
            /*$this->assign('page',$data['page']);*/
            $this->assign('list',$data['list']);
            $this->display('rankList');
      }

      private function get_ad_condition($flag){//根据点击量和上传时间获取广告
            $ad = D('Ad');
            $data = $ad->get_ad_condition($flag);
            return $data;
      }

      private function get_ad_by_love ($id) {//根据用户喜爱量获取广告
            $adlove = D('Adlove');
            return $adlove->array_ad($id);
      }


      private function get_ad ($type) { //根据不同类型选择广告显示页面
            if($type=="time") {
                  $data = $this->get_ad_condition(1);
            } else if ($type=="love") {
                  $data = array('list'=>$this->get_ad_by_love(20));
            } else{
                  $data = $this->get_ad_condition(0);
            }
            return $data;
      }

      private function get_info() {//获取用户基本信息
          $user = D('User');
          return $user->get_love();
      }
}