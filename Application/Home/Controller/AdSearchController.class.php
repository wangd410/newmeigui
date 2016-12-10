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
            $year = date('Y',time());//获取当前年份
            $pic = $this->get_picture();//获取轮播图片
            $user_info = $this->get_info();//获取广告基本信息
            $data = $this->get_ad();//获得广告列表
            $typeList = $this->get_adType();//获取品牌信息
            $this->assign('year',$year);
            $this->assign('pic',$pic);
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

      private function get_picture () {//获取广告列表页面 轮播图片
          $pic = D('Picture');
          return $pic->get_picture('广告');
      }
}

