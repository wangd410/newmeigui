<?php
namespace Home\Model;

use Think\Model\RelationModel;
use Org\Util\Page;
use Org\Util\AjaxPage;

class AdModel extends RelationModel
{
      protected $_link = array(
            'Comment'=>array(
                  'mapping_type' =>self::HAS_MANY,
                  'class_name'   =>'Comment',
                  'foreign_key'  =>'na_comment_adId',
                  'mapping_fields' =>'na_comment_content,na_comment_time',
                  /*'mapping_order'  =>'na_comment_time desc',*/
                  'condition'      =>"na_comment_type='评论'",
            ),
      );
      public function get_ad ($name,$place,$type,$year,$clos=20) {//分页获取广告
            $ad = M('Ad');
            $map['na_ad_name'] = array('LIKE','%'.$name.'%');
            $map['na_ad_place'] = array('LIKE','%'.$place.'%');
            $map['na_ad_type'] = array('LIKE','%'.$type.'%');
            $map['na_ad_year'] = array('LIKE','%'.$year.'%');
            $map['_logic'] = "and";
            $count = $ad->where($map)->count();//获取广告总数
            $page = new Page($count,$clos);//实例化分页类，传入分页总数与每页显示数量
            $show = $page->show();//显示分页列表
            $filed = array('na_ad_id','na_ad_name','na_ad_showPath','na_ad_introduce','na_ad_content');//设置查询字段
            $list = $ad->field($filed)->where($map)->order('na_ad_time desc')->limit($page->firstRow.",".$page->listRows)->select();//获取分页数据
            $data = array('page'=>$show,'list'=>$list);
            return $data;
      }

      public function get_ad_byId ($id) {//根据id查询用户广告详情
            $ad = M('Ad');
            $map['na_ad_id'] = $id;
            $data = $ad->where($map)->find();
            return $data;
      }

      public function add_count ($id) { //浏览次数加1
            $ad = M('Ad');
            $ad->where(array('na_ad_id'=>$id))->setInc('na_ad_count',1);
      }

      public function get_most_ad ($cols,$type="图文") { //获取广告浏览次数最多的
            $ad = M('Ad');
            $map['na_ad_adType'] = $type;
            $data = $ad->where($map)->limit($cols)->order('na_ad_count desc')->select();
            return $data;
      }

      public function get_ad_by_name ($name) { //根据姓名找广告
            $ad = M('Ad');
            $map['na_ad_name']=$name;
            $data = $ad->where($map)->find();
            return $data;
      }

      public function get_collect ($list,$cols=4) {//获取用户收藏列表信息
            $ad = M('Ad');
            $collect = explode(",",$list);
            $map['na_ad_id'] = array('in',$collect);
            $count = $ad->where($map)->count('na_ad_id');
            $page = new AjaxPage($count,$cols,"collect");
            $show = $page->show();
            $list = $ad->where($map)->limit($page->firstRow.",".$page->listRows)->order('na_ad_time desc')->select();
            return array('page'=>$show,'list'=>$list);
      }

      public function get_ad_condition ($id,$cols=16) { //根据条件获取排行版广告信息
            $ad = M('Ad');
            /*$count = $ad->count();
            $page = new  Page($count,$cols);
            $show = $page->show();*/
            if ($id==0) {
                  $list = $ad->order('na_ad_count desc')->limit($cols)->select();
            }else {
                  $list = $ad->limit($cols)->order('na_ad_time desc')->select();
            }
            return array('list'=>$list);
      }

      public function get_ad_comment ($cols=15) {//利用关联模型获取广告加评论循环列表
            $count = $this->relation('Comment')->count();
            $page = new Page($count,$cols);
            $show = $page->show();
            $list = $this->order('na_ad_time desc')->relation('Comment')->limit($page->firstRow.','.$page->listRows)->select();
            return array('list'=>$list,'page'=>$show);
      }
}