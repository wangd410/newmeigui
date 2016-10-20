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
}