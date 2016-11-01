<?php
/**
 * Created by PhpStorm.
 * User: wangd
 * Date: 2016/10/25
 * Time: 15:27
 */
namespace Home\Model;
use Think\Model;
class AdloveModel extends Model
{
      public function add_love ($id) {//喜爱量+1
            $love = M('Adlove');
            $map['na_adlove_adId'] = $id;
            $flag = $love->where($map)->setInc('na_adlove_count',1);
            return $flag;
      }

      public function array_ad ($cols=4) {//根据喜爱量获取列表
            $love = M('Adlove');
            $data = $love->table('na_adlove a,na_ad b')->where('a.na_adlove_adId=b.na_ad_id')->order('a.na_adlove_count desc')->limit($cols)->select();
            return $data;
      }
}