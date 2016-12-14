<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/1
 * Time: 19:40
 */

namespace Admin\Model;


use Think\Model;

class PictureModel extends Model
{
    /*
     * 根据类型获取图片信息
     * @param String $type
     * @return array
     * */
    public function get_picture ($type) {
        $pic = M('Picture');
        $map['na_picture_type'] = $type;
        return $pic->where($map)->select();
    }

    /*
     * 更改图片信息
     * @param array $pinture_info 更改的数据值
     * @return boolean
     * */
    public function update_picture($picture_info) {
        $picture = M('Picture');
        $map['na_picture_order'] = $picture_info['na_picture_order'];
        $map['na_picture_type'] = $picture_info['na_picture_type'];
        return $picture->data($picture_info)->where($map)->save();
    }
}