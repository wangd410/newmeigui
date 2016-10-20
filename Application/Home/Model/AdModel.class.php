<?php
namespace Home\Model;

use Think\Model;
use Org\Util\Page;

class AdModel extends Model
{
      public function get_ad ($name,$place,$type,$year,$clos=1) {//分页获取广告
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
}