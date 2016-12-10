<?php
namespace Admin\Model;
use Think\Model;

class CommentModel extends Model {
	public function getComment ($cols=8)//查询所有评论信息
	{
		$comment = M('Comment');
		$map = array('a.na_comment_type'=>'评论');//类型为评论
		$count = $comment->table('na_comment a,na_user b')->where('a.na_comment_userId=b.na_user_id')->where($map)->count('a.na_comment_id');
		$Page = new \Think\Page($count,$cols);//实例化分页类
		$show = $Page->show();//分页显示输出
		$list = $comment->field('a.*,b.na_user_name,b.na_user_loginName')->table('na_comment a,na_user b')->where('a.na_comment_userId=b.na_user_id')->where($map)->order('a.na_comment_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$data = array('page'=>$show,'list'=>$list);
		return $data;
	}
	
	public function deleteComment ($id) //删除评论
	{
		$comment = M('Comment');
		$flag = $comment->where(array('na_comment_id'=>$id))->delete();
		return $flag;
	}
}
