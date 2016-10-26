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
}