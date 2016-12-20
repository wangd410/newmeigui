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

      public function get_love($id) { //获取用户收藏列表和用户详情
            $user = M('User');
            $map['na_user_id'] = $id;
            $data= $user->where($map)->find();
            return $data;
      }

      public function update_love_list ($id,$list) { //更新用户收藏列表
            $user = M('User');
            $love = new \stdClass();
            $love->na_user_loveList = $list;
            $love->na_user_id = $id;
            $flag = $user->data($love)->save();
            return $flag;
      }

      public function __toString()
      {
            // TODO: Implement __toString() method.
            return "ceshiyixia";
      }

      public function update_info ($data) {//修改个人信息
            $user = M('User');
            $info = $data;
            $info['na_user_id'] = session('user_id');
            $flag = $user->data($info)->save();
            return $flag;
      }

      /*
       * 根据用户名获取用户信息
       * @param String $login
       * @return boolean
       * */
      public function get_user_by_loginName($login) {
            $user = M('User');
            $map['na_user_loginName'] = $login;
            $info = $user->where($map)->find();
            return $info;
      }
}