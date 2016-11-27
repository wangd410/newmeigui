<?php
/**
 * Created by PhpStorm.
 * User: wangd
 * Date: 2016/10/17
 * Time: 13:35
 */
namespace Home\Controller;
use Think\Controller;

class AdSearchController extends  Controller
{
      public function index () {
            $user_info = $this->get_info();
            $data = $this->get_ad();
            $typeList = $this->get_adType();
            $this->assign('user_info',$user_info);
            $this->assign('typeList',$typeList);
            $this->assign('page',$data['page']);
            $this->assign('list',$data['list']);
            $this->display(adSearch);
      }


      private function get_ad () { //获取广告列表
            $ad = D('Ad');
            $type = decode(I('get.type'));
            $place = I('get.place');
            $name = I('post.adName');
            $year = I('get.year');
            $data = $ad->get_ad(is_empty($name),is_empty(change_place($place)),is_empty($type),is_empty($year));
            return $data;
      }

      private function get_adType () { //获取类型列表
            $adType = D('Adtype');
            $data = $adType->get_adType();
            return $data;
      }

      private function get_info () { //获取用户信息
          $user = D('User');
          return $user->get_love();
      }
}

