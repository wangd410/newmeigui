<?php
namespace Admin\Model;
use Think\Model;

class UserModel extends Model 
{
	public function getUser ($name="",$clos=9) //分页查询所有用户
	{
		$user = M('User');
		$map['na_user_name'] = array('LIKE','%'.$name.'%');
		$count = $user->where($map)->count();
		$page = new \Think\Page($count,$clos);//实例化分页类
		$show = $page->show();//显示分页列表
		$list = $user->where($map)->order('na_user_state')->limit($page->firstRow.','.$page->listRows)->select();
		$data = array('page'=>$show,'list'=>$list);
		return $data;
	}
	
	public function userEdit ($state,$id)//启用或禁用用户评论
	{
		$user = M('User');
		$data['na_user_id'] = $id;
		$data['na_user_state'] = $state;
		$flag = $user->data($data)->save();
		return $flag; 
	}
}