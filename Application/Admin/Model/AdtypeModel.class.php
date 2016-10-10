<?php
namespace Admin\Model;
use Think\Model;

class AdtypeModel extends Model {
	
	public function getType ($cols=10) //分页获得类型列表
	{
		$type = M('Adtype');
		$count = $type->count();//查询满足要求的总记录数
		$page = new \Think\Page($count,$cols);//实例化分页类
		$show = $page->show();//分页显示输出
		$list = $type->order('na_adtype_time desc')->limit($page->firstRow.','.$page->listRows)->select();//获得分页列表内容
		$data = array('page'=>$show,'list'=>$list);
		return $data;	
	}
	
	public function typeAdd ($type1) //新增类型处理
	{
		$type = M('Adtype');
		$data['na_adtype_type'] = $type1;
		$data['na_adtype_time'] = date('Y-m-d H:i:s');
		$data['na_adtype_uname'] = session('login');
		if ($flag = $type->data($data)->add()) $flag=1;
		return $flag;
	}
	
	public function typeDelete ($id) //删除类别操作
	{
		$type = M('Adtype');
		if ($type->delete($id)) $flag=1;
		return $flag;
	}
	
	public function getAdtype ()//获取所有类型
	{
		$type = M('Adtype');
		$data = $type->select();
		return $data;
	}
}