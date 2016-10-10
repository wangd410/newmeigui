<?php
namespace Admin\Model;
use Think\Model;
class AdModel extends Model {
	public function addAd ($data)//添加新的广告 
	{
		$ad = M('Ad');
		$data['na_ad_time'] = date('Y-m-d H:i:s');
		$data['na_ad_uname'] = session('login'); 
		$flag = $ad->data($data)->add();
		return $flag;
	}
	
	public function getPt ($name="",$clos=9) //分页获取图文广告
	{
		$ad = M('Ad');
		$count = $ad->where($map)->count();
		$map['na_ad_name'] = array('LIKE','%'.$name.'%');
		$map['na_ad_adtype'] = "图文";
		$map['_logic'] = "and";
		$page = new \Think\Page($count,$clos);//实例化分页类
		$show = $page->show();//显示页码		
		$list = $ad->where($map)->field('na_ad_id,na_ad_name,na_ad_type,na_ad_count,na_ad_uname,na_ad_time')->limit($page->firstRow.','.$page->listRows)->order('na_ad_time desc')->select();
		$data = array('page'=>$show,'list'=>$list);
		return $data;
	}
	
	public function getVideo ($name="",$clos=9) //分页获取视频广告
	{
		$ad = M('Ad');
		$map['na_ad_name'] = array('LIKE','%'.$name.'%');
		$map['na_ad_adtype'] = "视频";
		$map['_logic'] = "and";
		$count = $ad->where($map)->count();
		$page = new \Think\Page($count,$clos);//实例化分页类
		$show = $page->show();//显示页码
		$list = $ad->field('na_ad_content,na_ad_showPath,na_ad_adtype',true)->limit($page->firstRow.','.$page->listRows)->where($map)->order('na_ad_time desc')->select();
		$data = array('page'=>$show,'list'=>$list);
		return $data;
	}
	
	public function deleteAd ($id)//删除广告信息
	{
		$ad = M('Ad');
		$flag = $ad->where(array('na_ad_id'=>$id))->delete();
		return $flag;
	}
	
	public function videoAd ($data) //视频广告添加
	{
		$ad = M('Ad');
		$data['na_ad_uname'] = session('login');
		$data['na_ad_adtype'] = "视频";
		$flag = $ad->data($data)->add();
		return $flag;
	}
	
	public function deleteV ($id) //删除视频广告信息
	{
		$ad = M('Ad');
		$flag = $ad->where(array('na_ad_id'=>$id))->delete();
		return $flag;
	}
	
	public function getPtById ($id) //根据id获取图文信息
	{
		$pt = M('Ad');
		$data = $pt->where(array('na_ad_id'=>$id))->find();
		return $data;
	}
	
	public function savePt($data) //修改图文消息
	{
		$ad = M('Ad');
		$flag = $ad->data($data)->save();
		return $flag;
	}
}