<?php
namespace Admin\Controller;

use Think\Controller;

class CommentController extends Controller
{	
	public function __construct () {
		parent::__construct();
		if (!session('?login')&&!session('?type')) {
			showMessage('请登录~',__MODULE__.'/login/index');
		}
	}
	
	public function index() // 分页获得评论列表
	{	
		$comment = D('Comment');
		$list = $comment->getComment(10);
		$this->assign('empty',"<p style='color:red;font-size: strong 20 px; '>暂时没有评论信息</p>");
		$this->assign('page',$list['page']);
		$this->assign('list',$list['list']);
		$this->display(commentList);
	}
	
	public function deleteComment() //删除评论处理
	{
		$id = I('get.id');
		$flag = (D('Comment')->deleteComment($id)); 
		if ($flag)
    	{
    		showMessage('删除成功');
    	} else 
    	{
    		showMessage('删除失败');
    	}
	}
	
	public function userEdit () //用户禁言页面
	{
		$data = $this->getUser();
		$this->assign('empty',"<p style='color:red;font-size: strong 20 px; '>暂时没有用户信息</p>");
		$this->assign('page',$data['page']);
		$this->assign('list',$data['list']);
		$this->display();
	}
	
	public function edit () //禁止或启用评论处理
	{
		$get = I('get.');
		$state = changeState($get['type']);
		$user = D('User');
		$flag = $user->userEdit($state,$get['id']);
		if($flag)
		{
			showMessage('操作成功');
		}else 
		{
			showMessage('操作失败');
		}
	}
	
	public function searchUser () //根据用户名查找用户
	{
		$username = I('post.username');
		$user = D('User');
		$data = $user->getUserByName($username);
		$this->assign('empty',"<p style='color:red;font-size: strong 20 px; '>查询不到用户信息</p>");
		$this->assign('list',$data);
		$this->display(userEdit);
	}
	
	
	private function getUser ()//获取用户信息
	{
		$user = D('User');
		if (I('post.name'))
		{
			$data = $user->getUser(I('post.name'));
		}else 
		{
			$data = $user->getUser();
		}
		return $data;
	}
	/* public function _empty() //空操作
	{
		showMessage('非法操作',__MODULE__/'admin');
	} */
}