<?php
namespace Home\Model;

use Think\Model;

class UserModel extends Model
{
	public function get_user_state () { //获取用户状态
	      $user = M('User');
            $map['na_user_id'] = session('user_id');
            $state = $user->field('na_user_state')->where($map)->find();
            return $state;
      }

      public function get_loginname ($username) { //判断昵称是否存在
            $user = M('User');
            $map['na_user_loginName'] = $username;
            $data = $user->where($map)->select();
            return $data;
      }

      public function add_user ($data) {
            $user = M('User');
            $flag = $user->data($data)->add();
            return $flag;
      }

      public function get_love() { //获取用户收藏列表和用户详情
            $user = M('User');
            $map['na_user_id'] = session('user_id');
            $data= $user->where($map)->find();
            return $data;
      }

      public function update_love_list ($list) { //更新用户收藏列表
            $user = M('User');
            $love = new \stdClass();
            $love->na_user_loveList = $list;
            $love->na_user_id = session('user_id');
            $flag = $user->data($love)->save();
            return $flag;
      }

      public function __toString()
      {
            // TODO: Implement __toString() method.
            return "ceshiyixia";
      }
}