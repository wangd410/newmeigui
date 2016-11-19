<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
          $ad = $this->get_ad();
          $love = $this->get_love();
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
}