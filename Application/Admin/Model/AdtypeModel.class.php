<?php
namespace Admin\Model;
use Think\Model;

class AdtypeModel extends Model {

    /*
     * 分页查询品牌信息
     * @param int $cols 每页显示条数
     * @return mixed
     * */
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


	/*
	 * 新增品牌处理
	 * @param array $type_info  品牌相关信息
	 * @return boolean
	 * */
	public function typeAdd ($type_info)
	{
		$type = M('Adtype');
		$type_info = array_merge($type_info,array('na_adtype_time'=>date('Y-m-d H:i:s'),'na_adtype_uname'=>session('login')));
		return $type->data($type_info)->add();
	}

	/*
	 *删除品牌操作
	 * @param int $id 品牌对应id值
	 * @retuen boolean
	 * */
	public function typeDelete ($id)
	{
		$type = M('Adtype');
		if ($type->delete($id)) $flag=1;
		return $flag;
	}

	/*
	 * 获取所有品牌信息
	 * @param void
	 * @return mixed $data
	 * */
	public function getAdtype ()
	{
		$type = M('Adtype');
		$data = $type->field('na_adtype_type')->select();
        return $data;
	}
}