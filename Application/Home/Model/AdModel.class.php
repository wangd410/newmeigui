<?php
namespace Home\Model;

use Think\Model;
use Org\Util\Page;

class AdModel extends Model
{
      public function get_ad ($name,$place,$type,$year,$clos=16) {//分页获取广告
            $ad = M('Ad');
            $map['na_ad_name'] = array('LIKE','%'.$name.'%');
            $map['na_ad_place'] = array('LIKE','%'.$place.'%');
            $map['na_ad_type'] = array('LIKE','%'.$type.'%');
            $map['na_ad_year'] = array('LIKE','%'.$year.'%');
            $map['_logic'] = "and";
            $count = $ad->where($map)->count();//获取广告总数
            $page = new Page($count,$clos);//实例化分页类，传入分页总数与每页显示数量
            $show = $page->show();//显示分页列表
            $filed = array('na_ad_id','na_ad_name','na_ad_showPath','na_ad_introduce');//设置查询字段
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

      public function get_most_ad ($cols,$type) { //获取广告浏览次数最多的
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
}