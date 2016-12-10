<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/28
 * Time: 21:44
 */

namespace Home\Model;


use Think\Model;

class PictureModel extends Model
{
    public function get_picture ($type) {//根据类型获取不同页面的轮播图片
        $picture = M('Picture');
        $map = new \stdClass();
        $map->na_picture_type = $type;
        $data = $picture->where($map)->order('na_picture_order')->select();
        return $data;
    }
}